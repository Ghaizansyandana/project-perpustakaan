@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Transaksi</h3>

    <p><b>Kode:</b> {{ $transaksi->kode_pinjam }}</p>
    <p><b>Nama Peminjam:</b> {{ $transaksi->nama_peminjam }}</p>
    <p><b>Tanggal Pinjam:</b> {{ $transaksi->tanggal_pinjam }}</p>
    <p><b>Tanggal Kembali:</b> {{ $transaksi->tanggal_kembali }}</p>

    <h5>Daftar Buku</h5>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($transaksi->detail as $i => $d)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $d->buku->judul }}</td>
            <td>{{ $d->jumlah }}</td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
