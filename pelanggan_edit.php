<?php
function getDataByIdId($id)
{
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);

    $query = "SELECT * FROM pelanggan WHERE PelangganID = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return false;
    }
}
function updateData($id, $namaPelanggan, $nomor_telepon){
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);
    $namaPelanggan = mysqli_real_escape_string($koneksi, $namaPelanggan);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);
    $nomor_telepon = mysqli_real_escape_string($koneksi, $nomor_telepon);

    $query = "UPDATE pelanggan SET NamaPelanggan = '$namaPelanggan', Alamat = '$alamat', NomorTelepon = '$nomorTelepon' WHERE PelangganID = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result){
        return true;
    } else {
        return false;
    }
}
if (isset($_POST['editData'])) {
    $id = $_POST['PelangganID'];
    $namaPelanggan = $_POST['NamaPelanggan'];
    $alamat = $_POST['alamat'];
    $nomorTelepon = $_POST['nomorTelepon'];

    if(updateData($id, $namaPelanggan, $alamat, $nomorTelepon)){
        header ('location : ../admin/admin.php?url=pelanggan');
    } else {
        echo "gagal mengupdate data.";
    }
}
?>