<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin_status'] = "login";
        header("location:index.php");
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - SIPERPUS RIYA</title>
    <style>
        body {
            background: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;    
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            width: 320px;
            text-align: center;
        }
        .login-card input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
            box-sizing: border-box;
        }
        .login-card button {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .login-card h2 {
            margin-bottom: 25px;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    
    <div class="login-card">
        <h2>ADMIN LOGIN</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username Admin" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">MASUK KE SISTEM</button>
        </form>
    </div>

</body>
</html>