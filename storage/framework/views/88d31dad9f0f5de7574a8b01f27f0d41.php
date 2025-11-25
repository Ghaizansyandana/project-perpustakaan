

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Tambah Pengarang</h3>

    <form action="<?php echo e(route('pengarang.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Nama Pengarang</label>
            <input type="text" name="nama_pengarang" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('pengarang.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/pengarang/create.blade.php ENDPATH**/ ?>