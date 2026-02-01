<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
        }

        .page-container {
            max-width: 1100px;
            margin: 40px auto;
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .table th {
            background-color: #f1f3f5;
            font-size: 13px;
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
        }

        .status {
            padding: 4px 10px;
            font-size: 13px;
            border-radius: 4px;
            display: inline-block;
            font-weight: 500;
        }

        .status-dipinjam {
            background-color: #fff3cd;
            color: #664d03;
        }

        .status-dikembalikan {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .status-terlambat {
            background-color: #f8d7da;
            color: #842029;
        }
    </style>
</head>
<body>

<div class="page-container">

    <div class="page-title">Laporan Peminjaman Buku</div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th width="140">Tanggal Pinjam</th>
                    <th width="140">Tanggal Kembali</th>
                    <th width="140">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $query = "SELECT peminjaman.*, anggota.nama, buku.judul 
                      FROM peminjaman 
                      JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                      JOIN buku ON peminjaman.id_buku = buku.id_buku 
                      ORDER BY id_pinjam DESC";

            $data = mysqli_query($conn, $query);

            while($d = mysqli_fetch_array($data)){
                
                if ($d['status'] == 'Dipinjam') {
                    $statusClass = 'status-dipinjam';
                } elseif ($d['status'] == 'Dikembalikan') {
                    $statusClass = 'status-dikembalikan';
                } else {
                    $statusClass = 'status-terlambat';
                }
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['judul']; ?></td>
                    <td><?= $d['tangal_pinjam']; ?></td>
                    <td><?= $d['tangal_kembali'] ? $d['tangal_kembali'] : '-'; ?></td>
                    <td>
                        <span class="status <?= $statusClass; ?>">
                            <?= $d['status']; ?>
                        </span>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
