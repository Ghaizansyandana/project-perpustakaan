@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3>Transaksi Peminjaman</h3>
        </div>
        <div class="col-md-6">
            <form action="{{ route('peminjaman.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari nama peminjam atau kode..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="mb-3">
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">➕ Tambah Transaksi</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Denda</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $row)
            <tr>
                <td>{{ $data->firstItem() + $i }}</td>
                <td>{{ $row->kode_pinjam }}</td>
                <td>{{ $row->nama_peminjam }}</td>
                <td>{{ $row->tanggal_pinjam }}</td>
                <td>{{ $row->tanggal_kembali }}</td>
                @if ($row->status == 'Pinjam')
                    <td><span class="badge bg-danger">Belum Kembali</span></td>
                @else
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                @endif
                <td>Rp {{ number_format($row->total_denda) }}</td>
                <td>
                    <a href="{{ route('peminjaman.show', $row->id) }}" class="btn btn-sm btn-info">Detail</a>

                    @if ($row->status == 'Pinjam')
                        <a href="{{ route('peminjaman.kembali', $row->id) }}" class="btn btn-sm btn-success"
                        onclick="return confirm('Konfirmasi pengembalian buku?')">Kembalikan</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->appends(['search' => request('search')])->links() }}
</div>
@endsection
