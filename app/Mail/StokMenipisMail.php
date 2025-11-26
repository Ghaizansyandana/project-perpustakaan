<?php

namespace App\Mail;

use App\Models\Buku;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StokMenipisMail extends Mailable
{
    use Queueable, SerializesModels;

    public $buku;

    public function __construct(Buku $buku)
    {
        $this->buku = $buku;
    }

    public function build()
    {
        return $this->subject('⚠ Stok Buku Menipis')
            ->view('email.stok_menipis');
    }
}
