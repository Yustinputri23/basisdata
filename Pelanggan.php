<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pelanggan</title>
</head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Member Baru/h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="../pelanggan_function/Pelanggan_insert.php" method="POST">
<div class="modal-body">
<div class="form-group mb-3">
<label for="exampleFormControlInput1" class="form-label">Nama Member</label>
<input type="text" class="form-control"
name="NamaPelanggan" id="exampleFormControlInput1" placeholder="Masukkan nama member">
</div>
<div class="form-group mb-3">
<label for="exampleFormControlInput2" class="form-label">Alamat Member</label>
<input type="text" class="form-control" name="Alamat" id="exampleFormControlInput2" placeholder="Masukkan alamat member">
</div>
<div class="form-group mb-3">
<label for="exampleFormControlInput3" class="form-label">Nomor Telpon Member</label>
<input type="number" class="form-control"
name="Nomor Telepon" id="exampleFormControlInput3" placeholder="Masukkan nomor telepon member">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs- dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save Changes</button>
</div>
</form>
</div>
</div>
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs- target="#exampleModal">Tambah Member
</button>
<table class="table table-striped">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nama Member</th>
<th scope="col">Alamat</th>
<th scope="col">Nomor Telepon</th>
<th scope="col">Action</th>
</tr>
</thead>
<?php
include '../koneksi.php';
$no = 1;
$sql = "SELECT FROM pelanggan ORDER BY PelangganID DESC";
$query= mysqli_query($KONEKSI, $sql); ?>
<tbody>
<?php foreach ($query as $data): ?>
<tr>
<th scope="row"><?php echo $no++; ?></th>
<td><?= $data['NamaPelanggan'] ?></td>
<td><?= $data['Alamat'] ?></td>
<td><?= $data['Nomor Telepon'] ?></td> <td>
<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" 
href="../pelanggan_function/Pelanggan_delete.php?PelangganID=<?= $data['PelangganID'] ?>" class="btn btn- danger">Delete</a>
<button href="#" class="btn btn-warning" data-bs- toggle="modal" 
data-bs-target="#editModal<?= $data['PelangganID'] ?>">Edit</button>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php foreach ($query as $data): ?>
<div class="modal fade" id="editModal<?= $data['PelangganID'] ?>" tabindex="-1" 
aria-labelledby="editModalLabel<?= $data['PelangganID'] ?>" aria- hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Members/h1>
<div class="modal-header">
<button type="button" class="btn-close" data-bs- dismiss="modal" aria-label="Close"></button>
</div>
<form action="../pelanggan_function/Pelanggan_edit.php?PelangganID=<? $data['PelangganID'] ?>" method="POST">
<div class="modal-body">
<input type="hidden" name="PelangganID" value="<?= $data['PelangganID'] ?>">
<div class="form-group mb-3">
<label for="exampleFormControlInput1" class="form-label">Nama Member</label>
<input type="text" name="NamaPelanggan" value="<?= $data['NamaPelanggan'] ?>" class="form-control" required>
</div>
<div class="form-group mb-3"> 
<label for="exampleFormControlInput2" class="form-label">Alamat</label>
<input type="text" name="Alamat" value="<? $data['Alamat'] ?>" class="form-control" required>
</div>
<div class="form-group mb-3">
<label for="exampleFormControlInput3">Produk</label>
<input type="number" name="NomorTelepon" value="<?= $data['NomorTelepon'] ?>" class="form-control" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" name="editData" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>
<?php endforeach; ?>
</body>
</html>