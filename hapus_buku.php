<?php
session_start();
if($_SESSION['admin_status'] != "login") header("location:login.php");

include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");

if($query){
    echo "<script>alert('Buku berhasil dihapus!'); window.location='buku.php';</script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>