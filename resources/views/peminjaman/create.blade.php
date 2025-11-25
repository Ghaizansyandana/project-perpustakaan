@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h3>Transaksi Peminjaman</h3>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>

        <hr>
        <h5>Daftar Buku</h5>

        <div id="buku-wrapper">
            <div class="row mb-2">
                <div class="col-md-6">
                    <select name="buku_id[]" class="form-control" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach($buku as $b)
                            <option value="{{ $b->id }}">{{ $b->judul }} (stok: {{ $b->stok }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" class="form-control" min="1" required placeholder="Jumlah">
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-danger remove-field d-none">❌</button>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-success mb-3" id="add-field">➕ Tambah Buku</button>
        <br>

        <button class="btn btn-primary">Simpan Transaksi</button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
document.getElementById('add-field').addEventListener('click', function () {
    let field = document.querySelector('#buku-wrapper .row').cloneNode(true);
    field.querySelector('.remove-field').classList.remove('d-none');
    field.querySelector('input').value = '';
    document.getElementById('buku-wrapper').appendChild(field);
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-field')) {
        e.target.parentElement.parentElement.remove();
    }
});
</script>
@endsection
