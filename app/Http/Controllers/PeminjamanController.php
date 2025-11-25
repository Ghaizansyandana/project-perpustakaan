<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::query();
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_peminjam', 'like', "%{$search}%")
                  ->orWhere('kode_pinjam', 'like', "%{$search}%");
        }
        
        $data = $query->orderBy('id', 'DESC')->paginate(10);
        return view('peminjaman.index', compact('data'));
    }

    public function create()
    {
        $buku = Buku::where('stok', '>', 0)->get();
        return view('peminjaman.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'buku_id' => 'required|array',
            'jumlah' => 'required|array'
        ]);

        DB::transaction(function () use ($request) {

            $kode = "TRX-" . now()->format('YmdHis');

            $transaksi = Peminjaman::create([
                'kode_pinjam' => $kode,
                'nama_peminjam' => $request->nama_peminjam,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
            ]);

            foreach ($request->buku_id as $i => $buku_id) {
                $jumlah_pinjam = $request->jumlah[$i];

                // Kurangi stok buku
                $buku = Buku::find($buku_id);
                $buku->stok -= $jumlah_pinjam;
                $buku->save();

                // Simpan detail
                PeminjamanDetail::create([
                    'peminjaman_id' => $transaksi->id,
                    'buku_id' => $buku_id,
                    'jumlah' => $jumlah_pinjam
                ]);
            }
        });

        return redirect()->route('peminjaman.index')->with('success', 'Transaksi berhasil');
    }

    public function show($id)
    {
        $transaksi = Peminjaman::with('detail.buku')->findOrFail($id);
        return view('peminjaman.show', compact('transaksi'));
    }

    public function pengembalian($id)
    {
        $transaksi = Peminjaman::with('detail.buku')->findOrFail($id);

        // Jika sudah dikembalikan, jangan proses lagi
        if ($transaksi->status == 'Kembali') {
            return back()->with('warning', 'Transaksi sudah pernah dikembalikan.');
        }

        foreach ($transaksi->detail as $d) {
            $buku = $d->buku;
            $buku->stok += $d->jumlah;
            $buku->save();
        }

        $transaksi->status = 'Kembali';
        $transaksi->save();

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan & stok diperbarui.');
    }

}

