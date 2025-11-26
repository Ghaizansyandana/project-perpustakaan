<?php

namespace App\Http\Controllers;

use PDF;
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
            'buku_id' => 'required|array',
            'jumlah' => 'required|array'
        ]);

        // Set dates
        $tanggalPinjam = now();
        $tanggalKembali = now()->addDays(7);

        try {
            DB::beginTransaction();

            $kode = "TRX-" . now()->format('YmdHis');

            // Create the loan record
            $transaksi = Peminjaman::create([
                'kode_pinjam' => $kode,
                'nama_peminjam' => $request->nama_peminjam,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => 'Pinjam'
            ]);

            // Process each book in the request
            foreach ($request->buku_id as $i => $buku_id) {
                $jumlah_pinjam = $request->jumlah[$i];

                // Validate book stock
                $buku = Buku::findOrFail($buku_id);
                
                if ($buku->stok < $jumlah_pinjam) {
                    throw new \Exception("Stok buku {$buku->judul} tidak mencukupi. Stok tersedia: {$buku->stok}");
                }

                // Update book stock
                $buku->stok -= $jumlah_pinjam;
                $buku->save();

                // Save loan details
                PeminjamanDetail::create([
                    'peminjaman_id' => $transaksi->id,
                    'buku_id' => $buku_id,
                    'jumlah' => $jumlah_pinjam,
                    'denda' => 0 // Initialize fine as 0
                ]);
            }

            DB::commit();

            return redirect()->route('peminjaman.index')
                ->with('success', 'Transaksi peminjaman berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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

    public function exportPdf()
    {
        $data = Peminjaman::with('detail.buku')->get();
        $pdf = PDF::loadView('peminjaman.laporan_pdf', compact('data'));
        return $pdf->download('laporan_peminjaman.pdf');
    }

 public function keranjang()
    {
        $bukuIds = session('keranjang_pinjam', []);
        $buku = Buku::whereIn('id', $bukuIds)->get();
        $siswa = Siswa::all();

        return view('peminjaman.keranjang', compact('buku', 'siswa'));
    }

    public function checkout(Request $request)
    {
        $request->validate(['siswa_id' => 'required']);
        $bukuIds = session('keranjang_pinjam', []);

        DB::transaction(function () use ($request, $bukuIds) {
            $kode = 'TRX' . date('YmdHis');

            $trans = Peminjaman::create([
                'kode_pinjam' => $kode,
                'siswa_id' => $request->siswa_id,
                'tanggal_pinjam' => today(),
                'status' => 'dipinjam'
            ]);

            foreach ($bukuIds as $id) {
                PeminjamanDetail::create([
                    'peminjaman_id' => $trans->id,
                    'buku_id' => $id,
                    'jumlah' => 1
                ]);

                Buku::where('id', $id)->decrement('stok');
            }
        });

        session()->forget('keranjang_pinjam');

        return redirect()->route('peminjaman.index')->with('success', 'Transaksi berhasil!');
    }

    public function remove($id)
    {
        $keranjang = session('keranjang_pinjam', []);
        $keranjang = array_filter($keranjang, fn($b) => $b != $id);
        session(['keranjang_pinjam' => $keranjang]);

        return back()->with('success', 'Buku dihapus dari keranjang');
    }


}

