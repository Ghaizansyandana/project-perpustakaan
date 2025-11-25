<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model {
    protected $table = 'pengarang';
    protected $fillable = ['nama_pengarang'];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'buku_pengarang');
    }
}
