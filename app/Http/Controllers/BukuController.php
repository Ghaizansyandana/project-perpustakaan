<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Pengarang;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'stok' => 'required|integer|min:1',
            'tahun' => 'required|integer',
            'kategori_id' => 'required',
            'pengarang_id' => 'required|array'
        ]);

        $buku = Buku::create($request->only(['judul', 'stok', 'tahun', 'kategori_id']));
        $buku->pengarang()->sync($request->pengarang_id);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
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

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->pengarang()->detach();
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
