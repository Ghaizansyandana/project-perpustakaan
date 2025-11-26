@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h3>Tambah Buku</h3>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select id="kategori_id" name="kategori_id" class="form-select" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pengarang_id" class="form-label">Pengarang</label>
            <select id="pengarang_id" name="pengarang_id" class="form-select" required>
                @foreach($pengarang as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pengarang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" id="stok" name="stok" class="form-control" required min="0">
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" id="tahun" name="tahun" class="form-control" required min="0">
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
