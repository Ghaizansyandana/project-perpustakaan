<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    
    protected $fillable = ['kode_pinjam', 'nama_peminjam', 'tanggal_pinjam', 'tanggal_kembali', 'status'];

    public function detail()
    {
        return $this->hasMany(PeminjamanDetail::class);
    }

    public function getDendaAttribute()
    {
        $hariTerlambat = 0;
        $today = now();
        $tanggalKembali = \Carbon\Carbon::parse($this->tanggal_kembali);

        if ($today->gt($tanggalKembali)) {
            $hariTerlambat = $today->diffInDays($tanggalKembali);
        }

        $dendaPerHari = 1000; // bisa dipindah ke konfigurasi
        return $hariTerlambat * $dendaPerHari;
    }

}
