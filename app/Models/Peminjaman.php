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
}
