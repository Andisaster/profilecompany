<?php
require "config.php" ;
session_start() ;
function login($username, $password)
{
    global $mysqli;

    $username = mysqli_real_escape_string($mysqli, $username);
    $password = mysqli_real_escape_string($mysqli, $password);

    $query = "SELECT * FROM pelanggan WHERE username='$username'";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die('Error in the query: ' . mysqli_error($mysqli));
    }    

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
        
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['status'] = $row['status'];

            // Redirect ke halaman sesuai peran
            if ($row['status'] === 'admin') {
                echo "Redirecting to admin.php";
                header("Location: admin.php");
                exit;
            } elseif ($row['status'] === 'user') {
                echo "Redirecting to index.php";
                header("Location: index.php");
                exit;
            }
        }
    }

    return false;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (login($username, $password)) {
        // Login berhasil
        echo "<script>alert('Login berhasil!'); window.location.href = 'index.php';</script>";
        exit;
    } else {
        // Login gagal
        echo "<script>alert('Login gagal! Periksa kembali username dan password Anda.'); window.location.href = 'login.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Login</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(#2980b9, #6dd5fa);
        font-family: Arial, sans-serif;
    }

    .login-form {
        background-color: #fff;
        border-radius: 8px;
        padding: 100px 30px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    .login-form button[type="submit"] {
        width: 100%;
        padding: 15px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .login-form button[type="submit"]:hover {
        background-color: #45a049;
    }

    .btn {
        width: 100%;
        padding: 15px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .btn-content {
        width: 100%;
        display: flex;
        align-items: center;
        margin-top: 5px;
    }

    .btn-content .btn {
        display: inline-block;
        text-align: center;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="login-form">
        <h2>Login</h2>
        <form method="post" action="">
            <input type="text" placeholder="Username" required name="username">
            <input type="password" placeholder="Password" required name="password">
            <button type="submit" name="submit">Login</button>
        </form>
        <hr>
        <div class="btn-content" id="regist">
            <a class="btn" href="register.php">Register</a>
        </div>
        <!-- <div class="btn-content">
            <a class="btn" href="index.php">Beranda</a>
        </div> -->
    </div>




</body>

</html>