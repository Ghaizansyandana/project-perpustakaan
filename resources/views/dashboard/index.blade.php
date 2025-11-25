@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h3 class="mb-4">Dashboard Perpustakaan</h3>

    <div class="row mb-4">
        <div class="col-md-3"><div class="card p-3">Total Buku: <h2>{{ $jumlah_buku }}</h2></div></div>
        <div class="col-md-3"><div class="card p-3">Total Pengarang: <h2>{{ $jumlah_pengarang }}</h2></div></div>
        <div class="col-md-3"><div class="card p-3">Total Kategori: <h2>{{ $jumlah_kategori }}</h2></div></div>
        <div class="col-md-3"><div class="card p-3">Total Peminjaman: <h2>{{ $jumlah_peminjaman }}</h2></div></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <canvas id="chartPeminjaman"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="chartBuku"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Grafik Peminjaman per Bulan
new Chart(document.getElementById('chartPeminjaman'), {
    type: 'line',
    data: {
        labels: {!! json_encode($peminjaman_per_bulan->keys()) !!},
        datasets: [{
            label: 'Jumlah Peminjaman',
            data: {!! json_encode($peminjaman_per_bulan->values()) !!},
            borderWidth: 2
        }]
    }
});

// Grafik Buku Paling Banyak Dipinjam
new Chart(document.getElementById('chartBuku'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($buku_terbanyak->keys()) !!},
        datasets: [{
            label: 'Total Dipinjam',
            data: {!! json_encode($buku_terbanyak->values()) !!},
            borderWidth: 2
        }]
    }
});
</script>
@endsection
