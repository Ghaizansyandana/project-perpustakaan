@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h3>Edit Pengarang</h3>

    <form action="{{ route('pengarang.update', $pengarang->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Pengarang</label>
            <input type="text" name="nama_pengarang" value="{{ $pengarang->nama_pengarang }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('pengarang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
