<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StokMenipisMail;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::with('kategori', 'pengarang');
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('tahun', 'like', "%{$search}%");
        }
        
        $data = $query->orderBy('id', 'DESC')->paginate(10);
        return view('buku.index', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriBuku::all();
        $pengarang = Pengarang::all();
        return view('buku.create', compact('kategori', 'pengarang'));
    }

    public function store(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'pengarang_id' => 'required|exists:pengarang,id',
            'stok' => 'required|integer|min:0',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            
        ]);

        // Create the book
        $buku = Buku::create($validated);

        // Attach the author
        $buku->pengarang()->attach($request->pengarang_id);

        $buku->update($request->all());

        // Jika stok <= 1
        if ($buku->stok <= 1) {
            Mail::to('admin@gmail.com')->send(new StokMenipisMail($buku));
        }

        LogActivity::add("Edit Buku", "Mengedit buku: " . $buku->judul);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = KategoriBuku::all();
        $pengarang = Pengarang::all();
        return view('buku.edit', compact('buku', 'kategori', 'pengarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'stok' => 'required|integer|min:1',
            'tahun' => 'required|integer',
            'kategori_id' => 'required',
            'pengarang_id' => 'required|array'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->only(['judul', 'stok', 'tahun', 'kategori_id']));
        $buku->pengarang()->sync($request->pengarang_id);

        // Jika stok <= 1
        if ($buku->stok <= 1) {
            Mail::to('admin@gmail.com')->send(new StokMenipisMail($buku));
        }

        LogActivity::add("Edit Buku", "Mengedit buku: " . $buku->judul);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->pengarang()->detach();
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

    public function stokMenipis()
    {
        $stok_minimal = 3;
        $buku = Buku::where('stok', '<=', $stok_minimal)->paginate(10);

        return view('buku.stok_menipis', compact('buku'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'kode_qr' => 'required'
        ]);

        $kode = $request->kode_qr;
        $buku = Buku::where('kode_qr', $kode)->first();

        if (!$buku) {
            return response()->json(['status' => false, 'msg' => 'Buku tidak ditemukan']);
        }

        // Cek apakah buku sedang dipinjam
        $transaksi = Transaksi::where('buku_id', $buku->id)
            ->where('status', 'dipinjam')
            ->first();

        if ($transaksi) {
            // Jika buku sedang dipinjam, kembalikan info peminjaman
            return response()->json([
                'status' => true,
                'buku' => $buku,
                'status_pinjam' => 'dipinjam',
                'peminjaman' => $transaksi
            ]);
        }

        // Jika buku tersedia, tambahkan ke keranjang
        $keranjang = session()->get('keranjang', []);
        if (!in_array($buku->id, $keranjang)) {
            session()->push('keranjang', $buku->id);
        }

        return response()->json([
            'status' => true, 
            'buku' => $buku,
            'status_pinjam' => 'tersedia'
        ]);
    }

}