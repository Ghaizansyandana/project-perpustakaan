

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3>Daftar Pengarang</h3>
        </div>
        <div class="col-md-6">
            <form action="<?php echo e(route('pengarang.index')); ?>" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari nama pengarang..." value="<?php echo e(request('search')); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="mb-3">
        <a href="<?php echo e(route('pengarang.create')); ?>" class="btn btn-primary">➕ Tambah Pengarang</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Pengarang</th>
            <th>Aksi</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($data->firstItem() + $i); ?></td>
            <td><?php echo e($row->nama_pengarang); ?></td>
            <td>
                <a href="<?php echo e(route('pengarang.edit', $row->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="<?php echo e(route('pengarang.destroy', $row->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo e($data->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/pengarang/index.blade.php ENDPATH**/ ?>