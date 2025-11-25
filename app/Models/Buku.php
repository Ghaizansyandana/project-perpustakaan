<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';  // Tambahkan baris ini
    protected $fillable = ['judul', 'stok', 'tahun', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_id');
    }

    public function pengarang()
    {
        return $this->belongsToMany(Pengarang::class, 'buku_pengarang', 'buku_id', 'pengarang_id');
    }
}