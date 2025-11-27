<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Tambah Kategori</h3>
    <form action="<?php echo e(route('kategori.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/kategori/create.blade.php ENDPATH**/ ?>