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
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_pinjam }}</td>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>Rp {{ number_format($item->denda) }}</td>
                    <td>
                        <ul>
                            @foreach ($item->detail as $d)
                                <li>{{ $d->buku->judul }} (x{{ $d->jumlah }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
