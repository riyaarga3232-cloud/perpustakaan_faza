<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
        }

        .page-container {
            max-width: 520px;
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
            font-size: 14px;
            height: 42px;
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
            Tambah Anggota
        </div>
        <div class="card-body">

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="simpan" class="btn btn-primary w-100">
                        Simpan
                    </button>
                    <a href="anggota.php" class="btn btn-light w-100 border">
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
if (isset($_POST['simpan'])) {
    $nis   = $_POST['nis'];
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = "INSERT INTO anggota (nis, nama, kelas) VALUES ('$nis', '$nama', '$kelas')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data anggota berhasil ditambahkan'); window.location='anggota.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>
