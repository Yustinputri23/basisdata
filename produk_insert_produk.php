<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $namaProduk = $_POST['NamaProduk'];
    $harga = $_POST['harga'];
    $stok= $_POST['NamaProduk'];
    $kode_produk = $_POST['kode_produk'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO produk (NamaProduk, harga, stok, kode_produk) VALUES (?,?,?,?)");

    mysqli_stmt_bind_param($stmt, "siii", $namaProduk, $harga, $stok, $kode_produk);

    if (mysqli_stmt_execute($stmt)){
        header('Location:../admin/admin.php?url=produk');
    } else {
        echo "Error :" .mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($koneksi);
?>