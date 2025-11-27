@extends('layouts.dashboard')

@section('content')
<script src="https://unpkg.com/html5-qrcode"></script>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3>Daftar Buku</h3>
        </div>
        <div class="col-md-6">
            <form action="{{ route('buku.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari judul atau tahun..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="mb-3">
        <a href="{{ route('buku.create') }}" class="btn btn-primary">➕ Tambah Buku</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>
            @foreach($data as $key => $buku)
                <tr>
                    <td>{{ $data->firstItem() + $key }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->kategori->nama_kategori ?? 'N/A' }}</td>
                    <td>
                        @if($buku->pengarang)
                            {{ $buku->pengarang->nama_pengarang ?? 'N/A' }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $buku->stok }}</td>
                    <td>{{ $buku->tahun }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach      
    </table>

    {{ $data->appends(['search' => request('search')])->links() }}
</div>
@endsection
