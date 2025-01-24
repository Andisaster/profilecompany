<?php
require "config.php" ;
session_start() ;
function register($mysqli){
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $status = $_POST['status'];

        if ($status !== 'admin' && $status !== 'user') {
            echo "<script>
            alert('Pilih status yang valid (admin/user).');
        </script>";
            return;
        }

        $checkQuery = "SELECT * FROM pelanggan WHERE username = '$username'";
        $result = mysqli_query($mysqli, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
            alert('Username sudah digunakan. Pilih username lain.');
        </script> ";
            return;
        }

        $insertQuery = "INSERT INTO pelanggan (username, password, status) VALUES ('$username', '$password', '$status')";
        $insertResult = mysqli_query($mysqli, $insertQuery);

        if ($insertResult) {
            echo "
                <script>
                    alert('Register Berhasil, Silahkan login!');
                    window.location.href = 'login.php';
                </script> 
            ";
        } else {
            echo "<script>
            alert('Register Gagal, Silahkan coba lagi!');
                  </script> ";
        }
    }
}

register($mysqli);
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
    .login-form input[type="password"], 
    .login-form select {
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
    }

    .btn-content .btn {
        display: inline-block;
        text-align: center;
        text-decoration: none;
    }

    .login-form select {
        color: #999;
    }
    .login-form option[disabled]:checked {
        color: #999; /* Warna teks ketika opsi yang tidak dapat dipilih terpilih */
            background-color: #f9f9f9;
    }
    .login-form option:checked {
            color: #333; /* Warna teks ketika opsi terpilih */
        }
    </style>
</head>

<body>
    <div class="login-form">
        <h2>Register</h2>
        <form method="post" action="">
            <input type="text" placeholder="Username" required name="username">
            <input type="password" placeholder="Password" required name="password">
            <select name="status" id="status" class="optional" required>
                <option value="" disabled selected>Select Status</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit" name="submit">Register</button>
        </form>
        <hr>
        <div class="btn-content">
            <a class="btn" href="login.php">Pergi ke halaman Login</a>

        </div>
    </div>

</body>

</html>