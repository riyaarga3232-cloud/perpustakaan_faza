<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
        }

        .page-container {
            max-width: 700px;
            margin: 60px auto;
        }

        .card {
            border: none;
            border-radius: 6px;
        }

        .card-header {
            background-color: #ffffff;
            font-weight: 600;
            font-size: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
        }

        .form-control {
            height: 42px;
            font-size: 14px;
        }

        .btn {
            height: 42px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="page-container">
    <div class="card shadow-sm">
        <div class="card-header">
            Tambah Data Buku
        </div>
        <div class="card-body">

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pengarang</label>
                    <input type="text" name="pengarang" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="simpan" class="btn btn-primary w-100">
                        Simpan
                    </button>
                    <a href="buku.php" class="btn btn-light w-100 border">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['simpan'])){
    mysqli_query($conn,"INSERT INTO buku 
        VALUES (
            NULL,
            '$_POST[judul]',
            '$_POST[pengarang]',
            '$_POST[penerbit]',
            '$_POST[tahun]',
            '$_POST[stok]'
        )"
    );
    header("Location:buku.php");
}
?>
