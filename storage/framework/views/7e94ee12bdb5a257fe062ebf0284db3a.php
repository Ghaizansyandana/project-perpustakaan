<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Transaksi Peminjaman</h3>

    <form action="<?php echo e(route('peminjaman.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>

        <div class="alert alert-info">
            <strong>Catatan:</strong><br>
            - Tanggal pinjam: <?php echo e(now()->format('d/m/Y')); ?><br>
            - Batas pengembalian: <?php echo e(now()->addDays(7)->format('d/m/Y')); ?>

        </div>

        <hr>
        <h5>Daftar Buku</h5>

        <div id="buku-wrapper">
            <div class="row mb-2">
                <div class="col-md-6">
                    <select name="buku_id[]" class="form-control" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($b->id); ?>"><?php echo e($b->judul); ?> (stok: <?php echo e($b->stok); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="tambah-buku">+ Tambah Buku</button>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo e(route('peminjaman.index')); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        // Add book row
        $('#tambah-buku').click(function() {
            const newRow = `
                <div class="row mb-2">
                    <div class="col-md-6">
                        <select name="buku_id[]" class="form-control" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($b->id); ?>"><?php echo e($b->judul); ?> (stok: <?php echo e($b->stok); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                    </div>
                </div>
            `;
            $('#buku-wrapper').append(newRow);
        });

        // Remove book row
        $(document).on('click', '.btn-remove', function() {
            if ($('#buku-wrapper .row').length > 1) {
                $(this).closest('.row').remove();
            } else {
                alert('Minimal harus ada satu buku');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/peminjaman/create.blade.php ENDPATH**/ ?>