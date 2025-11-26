<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['judul', 'kategori_id', 'stok', 'tahun'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_id');
    }

    public function pengarang()
    {
        return $this->belongsToMany(Pengarang::class, 'buku_pengarang', 'buku_id', 'pengarang_id');
    }
}