

<?php $__env->startSection('content'); ?>
<script src="https://unpkg.com/html5-qrcode"></script>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3>Daftar Buku</h3>
        </div>
        <div class="col-md-6">
            <form action="<?php echo e(route('buku.index')); ?>" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari judul atau tahun..." value="<?php echo e(request('search')); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <div class="mb-3">
        <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary">➕ Tambah Buku</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data->firstItem() + $key); ?></td>
                    <td><?php echo e($buku->judul); ?></td>
                    <td><?php echo e($buku->kategori->nama); ?></td>
                    <td>
                        <?php $__currentLoopData = $buku->pengarang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengarang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($pengarang->nama); ?><?php if(!$loop->last): ?>, <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                        <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>" method="POST" class="d-inline">
                            <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo e($data->appends(['search' => request('search')])->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/buku/index.blade.php ENDPATH**/ ?>