<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$cart = $_SESSION['cart'];

$filtered_cart = array_filter($cart, function ($item, $key) use ($id) {
return $key == $id;
}, ARRAY_FILTER_USE_BOTH);

if (!empty($filtered_cart)){
unset($_SESSION['cart'][key($filtered_card)]);

$_SESSION['cart'] = array_values($_SESSION['cart']);
}

header('location:../admin/transaksi.php');
?>