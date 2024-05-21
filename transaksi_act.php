<?php
include '../koneksi.php';
session_start();
$bayar = preg_replace('/\D/','',$_POST['bayar']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_PPOST['total'];
$kembali = $bayar - $total;

//insert ke lanel transaksi
mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, tanggal_waktu,nomor,total,bayar,kembali) VALUES (NULL,'$tanggal_waktu','$nomor','$total','$bayar','$kembali')");

//mendapatkan id transaksi baru
$id_transaksi = mysqli_insert_id($koneksi);

//insert ke detail transaksi
foreach ($_SESSION['cart'] as $key => $value){
    $id_barang = $value['ProdukID'];
    $harga = $value['Harga'];
    $stok = $value['Stok'];
    $tot =$harga * $Stok;

    //kurangi stok  produk di data base
    mysqli_query($koneksi, "UPDATE produk SET Stok = stok - $Stok WHERE
    PodukID = $id_barang");

    mysqli_query($koneksi,"INSERT INTO transaksi_detail(id_transaksi_detail,id_transaksi,ProdukID,harga,Stok,total) VALUES
    (NULL,'$id_transaksi','$id_barang','$harga','$stok','$tot')");
}

$_SESSION['cart'] = [];

//redirect ke halaman transaksi selesai
header("location:../admin/transaksi_selesai.php?idtrx=".$id_transaksi);
?>