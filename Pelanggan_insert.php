<?php
include '../koneksi';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $NamaPelanggann = $_POST['NamaPelanggan'];
    $Alamat = $_POST['Alamat'];
    $NomorTelepon = $_POST['NomorTelepon'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $NamaPelanggan, $Alamat, $NomorTelepon);

    if (mysqli_stmt_execute($stmt)){
        header ('Location:../admin/admin.php?url=pelanggan');
    }else{
        echo "Error :" . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($koneksi);