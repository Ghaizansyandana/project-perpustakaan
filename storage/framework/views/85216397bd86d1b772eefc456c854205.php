

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Detail Transaksi</h3>

    <p><b>Kode:</b> <?php echo e($transaksi->kode_pinjam); ?></p>
    <p><b>Nama Peminjam:</b> <?php echo e($transaksi->nama_peminjam); ?></p>
    <p><b>Tanggal Pinjam:</b> <?php echo e($transaksi->tanggal_pinjam); ?></p>
    <p><b>Tanggal Kembali:</b> <?php echo e($transaksi->tanggal_kembali); ?></p>

    <h5>Daftar Buku</h5>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Jumlah</th>
        </tr>
        <?php $__currentLoopData = $transaksi->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($i + 1); ?></td>
            <td><?php echo e($d->buku->judul); ?></td>
            <td><?php echo e($d->jumlah); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <a href="<?php echo e(route('peminjaman.index')); ?>" class="btn btn-secondary">Kembali</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/peminjaman/show.blade.php ENDPATH**/ ?>