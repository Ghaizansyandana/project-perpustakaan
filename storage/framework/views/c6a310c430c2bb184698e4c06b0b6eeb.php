

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Edit Buku</h3>

    <form action="<?php echo e(route('buku.update', $buku->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?php echo e($buku->judul); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k->id); ?>" <?php echo e($k->id == $buku->kategori_id ? 'selected' : ''); ?>>
                        <?php echo e($k->nama_kategori); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Pengarang</label>
            <select name="pengarang_id[]" multiple class="form-control" required>
                <?php $__currentLoopData = $pengarang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($p->id); ?>" <?php echo e($buku->pengarang->contains($p->id) ? 'selected' : ''); ?>>
                        <?php echo e($p->nama_pengarang); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="<?php echo e($buku->stok); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" value="<?php echo e($buku->tahun); ?>" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/buku/edit.blade.php ENDPATH**/ ?>