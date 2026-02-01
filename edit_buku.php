<?php
session_start();
if($_SESSION['admin_status'] != "login") header("location:login.php");
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$b = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    $sql = "UPDATE buku SET 
            judul='$judul', 
            pengarang='$pengarang', 
            stok='$stok' 
            WHERE id_buku='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Data buku berhasil diperbarui'); window.location='buku.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
        }

        .page-container {
            max-width: 600px;
            margin: 60px auto;
        }

        .card {
            border: none;
            border-radius: 6px;
        }

        .card-header {
            background-color: #ffffff;
            font-size: 16px;
            font-weight: 600;
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
            Edit Data & Stok Buku
        </div>
        <div class="card-body">

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul" class="form-control"
                           value="<?= $b['judul']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pengarang</label>
                    <input type="text" name="pengarang" class="form-control"
                           value="<?= $b['pengarang']; ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Jumlah Stok</label>
                    <input type="number" name="stok" class="form-control"
                           value="<?= $b['stok']; ?>" min="0" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="update" class="btn btn-primary w-100">
                        Simpan Perubahan
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
