<?php
session_start();
require "config.php" ;

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['status'] !== 'admin' ) {
    error_log("Redirecting to login.php");
    header("Location: login.php");
    exit;
}
$paket_test = mysqli_query($mysqli,"SELECT * FROM paket") ;
$paket = [] ;
while($rot = mysqli_fetch_assoc($paket_test)){
    $paket[] = $rot ;
}

$i = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_offer"])) {
    $package_id = $_POST["package_id"];

    $file_path = "laporan_penawaran.txt";
    $laporan_content = "Package ID: $package_id\n";

    file_put_contents($file_path, $laporan_content, FILE_APPEND);

    header("Location: admin.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;700&display=swap" rel="stylesheet">
    <title>admin</title>
    <style>
    * {
        font-family: 'poppins';
    }

    body {
        margin: 0;
        padding: 0;
    }


    .header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
        position: relative;
        width: 100%;
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
    }

    .header p {
        margin: 5px 0;
        font-size: 16px;
    }

    .navbar {
        background-color: #333;
        padding: 10px;
        display: flex;
        justify-content: center;
    }

    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .navbar li {
        margin-right: 20px;
    }

    .navbar li:last-child {
        margin-right: 0;
    }

    .navbar a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        padding: 8px;
        transition: color 0.3s ease;
    }

    .navbar a:hover {
        color: #4CAF50;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-left: -15px;
        margin-right: -15px;
        border: 1px solid lightgray;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    td {
        border-bottom: 1px solid #ddd;
    }

    .center {
        text-align: center;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
        margin-top: 50px;
        width: 100%;
    }

    .footer p {
        margin: 0;
        font-size: 14px;
    }

    .btn-add {
        display: inline-block;
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .btn-add:hover {
        background-color: #45a049;
    }

    .button {
        display: inline-block;
        width: 100px;
        text-align: center;
        padding-block: 8px;
        font-size: 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        cursor: pointer;
        color: white;
        margin-bottom: 10px;
    }

    .button-delete {
        background-color: #ff4444;
        border: none;
    }

    .button-delete:hover {
        background-color: #cc0000;
    }

    .button-edit {
        background-color: #33b5e5;
        border: none;
    }

    .button-edit:hover {
        background-color: #0099cc;
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>Pengeditan Paket</h1>
        <p>DIK STUDIO</p>

        <div class="navbar">

        </div>

    </div>
    <div class="container">
        <div style="display:flex;">
            <div>
                <a class="btn-add" href="tambah.php">Tambah Data</a>
            </div>
            <div style="margin-left:10px;">
                <a class="btn-add" href="index.php">Halaman Utama</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>no</th>
                    <th>jenis</th>
                    <th>fungsi</th>
                    <th>harga</th>
                    <th>include</th>
                    <th>gambar</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($paket as $r) :?>
                <tr>
                    <td><?= $i ;?></td>
                    <?php $i++ ;?>
                    <td><?= $r['jenis'] ;?></td>
                    <td><?= $r['fungsi'] ;?></td>
                    <td><?= $r['harga'] ;?></td>
                    <td><?= $r['include'] ;?></td>
                    <td>
                        <img src="<?= $r['gambar'] ;?>" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td><?= $r['status_penjualan'] ;?></td>
                    <td>
                        <a class="button button-delete" href="hapus.php?id=<?= $r['id'] ;?>">hapus</a>
                        <a class="button button-edit" href="ubah.php?id=<?= $r['id'] ;?>">ubah</a>
                    </td>
                </tr>
                <?php endforeach ;?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <a class="btn-add" href="login.php">Kembali</a>
</body>

</html>