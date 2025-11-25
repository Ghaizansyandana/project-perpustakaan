@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h3>Tambah Pengarang</h3>

    <form action="{{ route('pengarang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Pengarang</label>
            <input type="text" name="nama_pengarang" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengarang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
