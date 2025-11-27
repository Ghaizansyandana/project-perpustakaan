<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4 text-danger">Daftar Buku Stok Menipis</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="table-danger">
                <td><?php echo e($item->judul); ?></td>
                <td><?php echo e($item->stok); ?></td>
                <td>
                    <a href="<?php echo e(route('buku.edit', $item->id)); ?>" class="btn btn-primary btn-sm">Tambah Stok</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="text-center">Tidak ada buku stok menipis</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($buku->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/buku/stok_menipis.blade.php ENDPATH**/ ?>