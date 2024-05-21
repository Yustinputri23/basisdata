<?php
include '../koneksi.php';
function deleteProduct($produkID){
    global $koneksi;

    $produkID = mysqli_real_escape_string($koneksi, $produkID);
    $sql = "DELETE FROM produk WHERE ProdukID = '$produkID'";

    if (mysqli_query($koneksi, $sql)){
        return true;
    } else {
        return false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ProdukID'])) {
    $produkIDToDelete = $_GET['ProdukID'];

    if (deleteProduct($produkIDToDelete)){
        header('Location:../admin/admin.php?url=produk');
    } else {
        echo "Error deleting product.";
    }
}
mysqli_close($koneksi);
?>