<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
        h3 {
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h3>Laporan Peminjaman Buku</h3>

    <table width="100%">
        <thead>
            <tr>
                <th>Kode Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Detail Buku</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->kode_pinjam); ?></td>
                    <td><?php echo e($item->nama_peminjam); ?></td>
                    <td><?php echo e($item->tanggal_pinjam); ?></td>
                    <td><?php echo e($item->tanggal_kembali); ?></td>
                    <td>Rp <?php echo e(number_format($item->denda)); ?></td>
                    <td>
                        <ul>
                            <?php $__currentLoopData = $item->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($d->buku->judul); ?> (x<?php echo e($d->jumlah); ?>)</li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</body>
</html>
<?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/peminjaman/laporan_pdf.blade.php ENDPATH**/ ?>