<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_pinjam = $_GET['id'];
    $tgl_kembali = date('Y-m-d');

    $data = mysqli_query($conn, "SELECT id_buku FROM peminjaman WHERE id_pinjam = '$id_pinjam'");
    $r = mysqli_fetch_array($data);
    $id_buku = $r['id_buku'];

    $update_pinjam = "UPDATE peminjaman SET status = 'Kembali', tangal_kembali = '$tgl_kembali' 
                      WHERE id_pinjam = '$id_pinjam'";
    
    $update_stok = "UPDATE buku SET stok = stok + 1 WHERE id_buku = '$id_buku'";

    if (mysqli_query($conn, $update_pinjam) && mysqli_query($conn, $update_stok)) {
        echo "<script>alert('Buku Kembali! Stok otomatis bertambah.'); window.location='laporan_pinjam.php';</script>";
    }
}
?>