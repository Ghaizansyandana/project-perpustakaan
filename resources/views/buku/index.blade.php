@extends('layouts.dashboard')

@section('content')
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
        @foreach ($data as $i => $row)
        <tr>
            <td>{{ $data->firstItem() + $i }}</td>
            <td>{{ $row->judul }}</td>
            <td>{{ $row->kategori->nama_kategori }}</td>
            <td>
                @foreach($row->pengarang as $p)
                    <span class="badge bg-success">{{ $p->nama_pengarang }}</span><br>
                @endforeach
            </td>
            <td>{{ $row->stok }}</td>
            <td>{{ $row->tahun }}</td>
            <td>
                <a href="{{ route('buku.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('buku.destroy', $row->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $data->appends(['search' => request('search')])->links() }}
</div>
@endsection
