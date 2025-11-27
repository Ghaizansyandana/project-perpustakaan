<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3>Transaksi Peminjaman</h3>
        </div>
        <div class="col-md-6">
            <form action="<?php echo e(route('peminjaman.index')); ?>" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari nama peminjam atau kode..." value="<?php echo e(request('search')); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="mb-3">
        <a href="<?php echo e(route('peminjaman.create')); ?>" class="btn btn-primary">➕ Tambah Transaksi</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Denda</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->firstItem() + $i); ?></td>
                <td><?php echo e($row->kode_pinjam); ?></td>
                <td><?php echo e($row->nama_peminjam); ?></td>
                <td><?php echo e($row->tanggal_pinjam); ?></td>
                <td><?php echo e($row->tanggal_kembali); ?></td>
                <?php if($row->status == 'Pinjam'): ?>
                    <td><span class="badge bg-danger">Belum Kembali</span></td>
                <?php else: ?>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                <?php endif; ?>
                <td>Rp <?php echo e(number_format($row->total_denda)); ?></td>
                <td>
                    <a href="<?php echo e(route('peminjaman.show', $row->id)); ?>" class="btn btn-sm btn-info">Detail</a>

                    <?php if($row->status == 'Pinjam'): ?>
                        <a href="<?php echo e(route('peminjaman.kembali', $row->id)); ?>" class="btn btn-sm btn-success"
                        onclick="return confirm('Konfirmasi pengembalian buku?')">Kembalikan</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($data->appends(['search' => request('search')])->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>