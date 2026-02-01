<?php
session_start();
if($_SESSION['admin_status'] != "login") header("location:login.php");
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");
$a = mysqli_fetch_array($query);

if(isset($_POST['update'])){
    $nis    = mysqli_real_escape_string($conn, $_POST['nis']);
    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas  = mysqli_real_escape_string($conn, $_POST['kelas']);

    $sql = "UPDATE anggota SET nis='$nis', nama='$nama', kelas='$kelas' WHERE id_anggota='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Data Anggota Berhasil Diperbarui!'); window.location='anggota.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota - SIPERPUS RIYA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-anggota">
    
    <div class="container">
        <div class="card-form" style="max-width: 500px; margin: 50px auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <h2 style="text-align: center; color: #2c3e50; margin-bottom: 20px;">Edit Profil Anggota</h2>
            
            <form method="POST">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">NIS</label>
                <input type="text" name="nis" value="<?php echo $a['nis']; ?>" required 
                       style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nama Lengkap</label>
                <input type="text" name="nama" value="<?php echo $a['nama']; ?>" required 
                       style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Kelas</label>
                <input type="text" name="kelas" value="<?php echo $a['kelas']; ?>" required 
                       style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                
                <button type="submit" name="update" class="btn-anggota" 
                        style="background: #27ae60; width: 100%; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 16px;">
                    Simpan Perubahan
                </button>
                
                <div style="text-align: center; margin-top: 15px;">
                    <a href="anggota.php" style="color: #666; text-decoration: none; font-size: 14px;">← Batal dan Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>