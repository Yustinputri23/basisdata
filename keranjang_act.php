<?php

include '../koneksi.php';
 session_start();

if (!isset($_SESSION['cart'])) { 
    $_SESSION['cart'] = array();

}

if (isset($_POST['kode_produk'])) { 
    $kode_produk = $_POST['kode_produk'];
     $Stok = 1;


$query= mysqli_query($koneksi, "SELECT FROM produk WHERE kode_produk='$kode_produk");


 if (mysqli_num_rows($query) > 0) { 
    $b=mysqli_fetch_assoc($query);

$barang = [

'ProdukID' => $b['ProdukID'],

'NamaProduk' => $b['NamaProduk'], 
'Harga' => $b['Harga'],
'Stok' => $Stok,

];

$_SESSION['cart'][] = $barang;

header('location:../admin/transaksi.php');

} else {

// Produk tidak ditemukan, atur flash message
 $_SESSION['flash_message'] = "Produk tidak ditemukan dalam database.";
  header('location:../admin/transaksi.php');
}
}
?>