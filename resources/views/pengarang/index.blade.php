@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3>Daftar Pengarang</h3>
        </div>
        <div class="col-md-6">
            <form action="{{ route('pengarang.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari nama pengarang..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="mb-3">
        <a href="{{ route('pengarang.create') }}" class="btn btn-primary">➕ Tambah Pengarang</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Pengarang</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $i => $row)
        <tr>
            <td>{{ $data->firstItem() + $i }}</td>
            <td>{{ $row->nama_pengarang }}</td>
            <td>
                <a href="{{ route('pengarang.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pengarang.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $data->links() }}
</div>
@endsection
