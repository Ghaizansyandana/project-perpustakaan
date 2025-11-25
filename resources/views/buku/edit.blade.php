@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h3>Edit Buku</h3>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $k->id == $buku->kategori_id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Pengarang</label>
            <select name="pengarang_id[]" multiple class="form-control" required>
                @foreach($pengarang as $p)
                    <option value="{{ $p->id }}" {{ $buku->pengarang->contains($p->id) ? 'selected' : '' }}>
                        {{ $p->nama_pengarang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $buku->stok }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" value="{{ $buku->tahun }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
