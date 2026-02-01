<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pinjam Buku</title>
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

        .card-title {
            font-size: 18px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="page-container">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="card-title mb-4">Form Peminjaman Buku</div>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Pilih Buku</label>
                    <select name="id_buku" class="form-select" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php
                        $buku = mysqli_query($conn, "SELECT * FROM buku");
                        while($b = mysqli_fetch_array($buku)){
                            echo "<option value='$b[id_buku]'>$b[judul] (Stok: $b[stok])</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Pilih Anggota</label>
                    <select name="id_anggota" class="form-select" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php
                        $anggota = mysqli_query($conn, "SELECT * FROM anggota");
                        while($a = mysqli_fetch_array($anggota)){
                            echo "<option value='$a[id_anggota]'>$a[nama]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" name="pinjam" class="btn btn-primary px-4">
                        Pinjam Buku
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php
if(isset($_POST['pinjam'])){
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_pinjam = date('Y-m-d');
    $cek_stok = mysqli_query($conn, "SELECT stok FROM buku WHERE id_buku = '$id_buku'");
    $s = mysqli_fetch_array($cek_stok);

    if($s['stok'] <= 0) {
        echo "<script>
            alert('Maaf, stok buku ini sedang habis!');
            window.location='pinjam.php';
        </script>";
    } else {
        $sql_pinjam = "INSERT INTO peminjaman (id_buku, id_anggota, tangal_pinjam, status) 
                       VALUES ('$id_buku', '$id_anggota', '$tgl_pinjam', 'Dipinjam')";
        
        $sql_stok = "UPDATE buku SET stok = stok - 1 WHERE id_buku = '$id_buku'";

        if(mysqli_query($conn, $sql_pinjam) && mysqli_query($conn, $sql_stok)){
            echo "<script>
                alert('Peminjaman berhasil!');
                window.location='laporan_pinjam.php';
            </script>";
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
