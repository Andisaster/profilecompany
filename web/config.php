<?php
$host = 'localhost';
$username = 'root';
$password ='';
$name = 'paket';

$mysqli = new mysqli($host,$username,$password,$name);



function tambah($data){
    global $mysqli ;
    $jenis = $data['jenis'] ;
    $fungsi = $data['fungsi'] ;
    $harga = $data['harga'] ;
    $include = $data['include'] ;
    $gambar = $data['gambar'] ;
    // $status_penjualan = $data['status_penjualan'] ;
    $status_penjualan = isset($data['status_penjualan']) ? $data['status_penjualan'] : '';


    $query = "
        INSERT INTO paket (jenis, fungsi, harga, include, gambar, status_penjualan)
        VALUES('$jenis','$fungsi','$harga','$include','$gambar','$status_penjualan')
    
    " ;
        mysqli_query($mysqli,$query) ;

    return mysqli_affected_rows($mysqli) ;
}

function ubahdata($data){
    global $mysqli ;
    $jenis = $data['jenis'] ;
    $fungsi = $data['fungsi'] ;
    $harga = $data['harga'] ;
    $include = $data['include'] ;
    $gambar = $data['gambar'] ;
    // $status_penjualan = $data['status_penjualan'] ;
    $status_penjualan = isset($data['status_penjualan']) ? $data['status_penjualan'] : '';
    $id = $_POST['id'] ;
    $query = "
    UPDATE paket SET
    jenis = '$jenis',
    fungsi = '$fungsi',
    harga = $harga,
    include = '$include',
    gambar = '$gambar',
    status_penjualan = '$status_penjualan'
    WHERE id = $id
" ;


mysqli_query($mysqli,$query) ;
    


return mysqli_affected_rows($mysqli) ;
}




function hapusdata($id){
    global $mysqli ;
    mysqli_query($mysqli,"DELETE FROM paket WHERE id = $id") ;
return mysqli_affected_rows($mysqli) ;
}

function ubahStatusTerjual($id)
{
    global $mysqli;
    $query = "UPDATE paket SET status_penjualan = 'terjual' WHERE id = $id";
    mysqli_query($mysqli, $query);

    return mysqli_affected_rows($mysqli);
}




?>