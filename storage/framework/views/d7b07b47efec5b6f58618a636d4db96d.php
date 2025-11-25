

<?php $__env->startSection('content'); ?>
<div class="container">

    <h3 class="mb-4">Dashboard Perpustakaan</h3>

    <div class="row mb-4">
        <div class="col-md-3"><div class="card p-3">Total Buku: <h2><?php echo e($jumlah_buku); ?></h2></div></div>
        <div class="col-md-3"><div class="card p-3">Total Pengarang: <h2><?php echo e($jumlah_pengarang); ?></h2></div></div>
        <div class="col-md-3"><div class="card p-3">Total Kategori: <h2><?php echo e($jumlah_kategori); ?></h2></div></div>
        <div class="col-md-3"><div class="card p-3">Total Peminjaman: <h2><?php echo e($jumlah_peminjaman); ?></h2></div></div>
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
        labels: <?php echo json_encode($peminjaman_per_bulan->keys()); ?>,
        datasets: [{
            label: 'Jumlah Peminjaman',
            data: <?php echo json_encode($peminjaman_per_bulan->values()); ?>,
            borderWidth: 2
        }]
    }
});

// Grafik Buku Paling Banyak Dipinjam
new Chart(document.getElementById('chartBuku'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($buku_terbanyak->keys()); ?>,
        datasets: [{
            label: 'Total Dipinjam',
            data: <?php echo json_encode($buku_terbanyak->values()); ?>,
            borderWidth: 2
        }]
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/dashboard/index.blade.php ENDPATH**/ ?>