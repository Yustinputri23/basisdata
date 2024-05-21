<?php 
include '../koneksi.php';
session_start();

$Stok = $_POST['Stok'];
$cart = $_SESSION['cart'];

foreach ($cart as $key => $value) {
// Mengambil id barang dari cart
$idbarang = $value['ProdukID'];

// Query untuk mendapatkan stok barang dari database
 $query="SELECT Stok FROM produk WHERE ProdukId = '$idbarang'";
$result=mysqli_query($koneksi, $query);
$row=mysqli_fetch_assoc($result);
$stok_produk=$row['Stok'];

// Pengecekan apakah stok yang dimasukkan user melebihi stok yang ada di database
if ($Stok[$key] > $stok_produk) {

// Jika melebihi, redirect kembali ke halaman dengan pesan error 
$_SESSION['flash_message']="Stok yang ada hanya $stok_produk"; 
header('location:../admin/transaksi.php');

exit; // Keluar dari skrip untuk menghentikan eksekusi lebih lanjut

}

// Mengupdate stok dalam session
$_SESSION['cart'][$key] ['Stok'] = $Stok[$key];



 header('location:../admin/transaksi.php');


}
