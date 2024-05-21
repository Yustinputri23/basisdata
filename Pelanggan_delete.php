<?php
include '../koneksi.php';

function deleteProduk($PelangganID) {
    global $koneksi;

    $PelangganID = mysqli_real_escape_string ($koneksi, $PelangganID);
    $sql = "DELETE FROM pelanggan WHERE PelangganID '$PelangganID' ";

    if (mysqli_query($koneksi, $sql)){
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" &&  isset ($_GET['PelangganID'])){
    $PelangganIDToDelete = $_GET ['PelangganID'];

    if (deleteProduct($PelangganIDToDelete)){
        header('Location:../admin/admin.php?url=pelanggan');
    } else {
        echo "Error deleting product.";
    }
}

mysqli_close($koneksi);
?>