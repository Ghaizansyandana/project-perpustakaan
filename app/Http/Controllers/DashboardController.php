<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_buku = Buku::count();
        $jumlah_pengarang = Pengarang::count();
        $jumlah_kategori = KategoriBuku::count();
        $jumlah_peminjaman = Peminjaman::count();

        // Grafik peminjaman per bulan
        $peminjaman_per_bulan = Peminjaman::select(DB::raw("DATE_FORMAT(tanggal_pinjam, '%M') AS bulan"), DB::raw("COUNT(*) AS total"))
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        // Grafik buku paling sering dipinjam
        $buku_terbanyak = Buku::select('judul', DB::raw('SUM(peminjaman_detail.jumlah) AS total'))
            ->join('peminjaman_detail', 'buku.id', '=', 'peminjaman_detail.buku_id')
            ->groupBy('judul')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->pluck('total', 'judul');

        return view('dashboard.index', compact(
            'jumlah_buku',
            'jumlah_pengarang',
            'jumlah_kategori',
            'jumlah_peminjaman',
            'peminjaman_per_bulan',
            'buku_terbanyak'
        ));
    }
}
