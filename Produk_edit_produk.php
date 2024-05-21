<?php
//fungsi untuk mendapatkan data berdasarkan ID
function getDataById($id)
{
    //Gantilah ini dengankoneksi database anda
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);


    $query = "SELECT * FROM pelanggan WHERE PelangganID = $id";
    $result = mysqli_query($koneksi, $query);

    if($result){
        $data = mysqli_fetch_assoc($result);
        return $data;
    }else{
        return false;
    }
}

//funsi untuk mengupdate data
function updateData($id, $namaPelanggan, $alamat, $nomorTelpon)
{
    //Gantilah ini dengan koneksi database anda
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);
    $namaPelanggan = mysqli_real_escape_string($koneksi, $namaPelanggan);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);
    $nomorTelpon = mysqli_real_escape_string($koneksi, $nomorTelpon);

    $query = "UPDATE pelanggan SET namaPelanggan = '$namaPelanggan',Alamat =
    '$alamat', 'NomorTelpon' WHERE PelangganID =$id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        return true;
    }else{
        return false;
    }
}

// menggunakan data yanag dikirim dari from edit
if (isset($_POST['editData'])){
    $id = $_POST['pelangganID'];
    $namaPelanggan = $_POST['NamaPelanggan'];
    $alamat = $_POST['Alamat'];
    $nomorTelponan = $_POST["nomorTelpon"];

    //Memanggil funsi updateData
    if(updateData($id, $namaPelanggan, $alamat, $nomorTelpon)){
        header('location: ../admin/admin.php?url=pelanggan');
    }else{
        echo "Gagal mengupdate data";
    }
}
?>