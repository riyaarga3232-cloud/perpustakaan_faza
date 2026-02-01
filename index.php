<?php 
session_start();
if($_SESSION['admin_status'] != "login") header("location:login.php");
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama - PERPUSTAKAAN FAZA</title>
    <style>
        body { 
            background: #f4f7f6; 
            font-family: 'Segoe UI', sans-serif; 
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-section { text-align: center; margin-bottom: 40px; }
        .main-menu { display: flex; justify-content: center; gap: 40px; padding: 20px; }
        .menu-card {
            background: white; width: 280px; padding: 40px 20px; border-radius: 15px;
            text-align: center; text-decoration: none; color: #2c3e50;
            transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .menu-card:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .icon-box { width: 100px; height: 100px; line-height: 100px; border-radius: 50%; margin: 0 auto 25px; font-size: 50px; color: white; }
        .bg-buku { background: linear-gradient(135deg, #3498db, #2980b9); }
        .bg-anggota { background: linear-gradient(135deg, #27ae60, #219150); }
        h3 { margin: 10px 0; font-size: 24px; color: #333; }
        p { color: #7f8c8d; font-size: 14px; line-height: 1.6; }
        
        .btn-logout-simple {
            margin-top: 50px;
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #e74c3c;
            padding: 8px 20px;
            border-radius: 20px;
            transition: 0.3s;
        }
        .btn-logout-simple:hover { background: #e74c3c; color: white; }
    </style>
</head>
<body>

    <div class="welcome-section">
        <h1 style="color: #2c3e50; font-size: 36px; margin: 0;">SIPERPUS RIYA</h1>
        <p style="font-size: 18px; color: #7f8c8d;">Selamat Datang, Admin. Silakan pilih menu utama:</p>
    </div>

    <div class="main-menu">
    <a href="buku.php" class="menu-card">
        <div class="icon-box bg-buku">📖</div>
        <h3>Data Buku</h3>
        <p>Kelola koleksi, cek stok, dan tambah buku baru.</p>
    </a>

    <a href="pinjam.php" class="menu-card card-pinjam">
        <div class="icon-box bg-pinjam">✍️</div>
        <h3>Pinjam Buku</h3>
        <p>Proses peminjaman baru untuk siswa/anggota.</p>
    </a>

    <a href="anggota.php" class="menu-card">
        <div class="icon-box bg-anggota">👨‍🎓</div>
        <h3>Data Anggota</h3>
        <p>Kelola data siswa, NIS, dan info kelas.</p>
    </a>
</div>

<style>
    .bg-pinjam { background: linear-gradient(135deg, #f39c12, #e67e22); }
    .card-pinjam:hover { border: 2px solid #f39c12; }
    .main-menu { gap: 20px; max-width: 1000px; }
</style>

    <a href="logout.php" class="btn-logout-simple">Keluar Sistem</a>

</body>
</html>