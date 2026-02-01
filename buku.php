<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
            color: #212529;
        }

        .page-wrapper {
            max-width: 1100px;
            margin: 40px auto;
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .box {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 20px;
        }

        table th {
            background: #f1f3f5;
            font-weight: 600;
            font-size: 13px;
        }

        table td {
            vertical-align: middle;
        }

        .btn-sm {
            padding: 4px 10px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <div class="d-flex justify-content-between align-items-center">
        <div class="page-title">Data Buku</div>
        <a href="tambah_buku.php" class="btn btn-primary btn-sm">
            Tambah Buku
        </a>
    </div>

    <div class="box mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th width="80">Stok</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM buku");
                while($d = mysqli_fetch_array($data)){
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['judul']; ?></td>
                        <td><?= $d['pengarang']; ?></td>
                        <td><?= $d['stok']; ?></td>
                        <td>
                            <a href="edit_buku.php?id=<?= $d['id_buku']; ?>" class="btn btn-outline-secondary btn-sm">
                                Edit
                            </a>
                            <a href="hapus_buku.php?id=<?= $d['id_buku']; ?>"
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
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
            max-width: 1200px;
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
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        /* status */
        .status {
            padding: 4px 10px;
            font-size: 13px;
            border-radius: 4px;
            font-weight: 500;
            display: inline-block;
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

        .btn-kembali {
            font-size: 13px;
            padding: 4px 10px;
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
                    <th width="120" class="text-center">Aksi</th>
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
                    <td class="text-center">
                        <?php if($d['status'] == 'Dipinjam'){ ?>
                            <a href="kembali.php?id=<?= $d['id_pinjam']; ?>"
                               class="btn btn-sm btn-outline-primary btn-kembali"
                               onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                Kembalikan
                            </a>
                        <?php } else { ?>
                            <span class="text-muted">-</span>
                        <?php } ?>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
