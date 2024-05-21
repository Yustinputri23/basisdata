<!DOCTYPE html

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale-1.0">

<title>Dashboard - Produk</title>

</head>

<body>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-

labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>

<button type="button" class="btn-close" data-bs-

dismiss="modal" aria-label="Close"></button>
</div>
</div>

<form action="../produk_function/produk_insert.php" method="POST">
<div class="modal-body">
    <div class="form-group mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="NamaProduk" id="exampleFormControlInput1" placeholdet="Masukkan nama produk">
    </div>
    <div class="form-group mb-3">
    <label for="exampleForm ControlInput3" class="form-label">Kode produk</label> 
    <input type="number" class="form-control" name="kode_produk" id="exampleFormControlInput3" placeholder="Masukkan kode produk">
</div>
<div class="form-group mb-3">
    <label for="exampleForm ControlInput3" class="form-label">Harga produk</label> 
    <input type="number" class="form-control" name="kode_produk" id="exampleFormControlInput3" placeholder="Masukkan Harga produk">
</div>
<div class="form-group mb-3">
    <label for="exampleForm ControlInput3" class="form-label">stok produk</label> 
    <input type="number" class="form-control" name="kode_produk" id="exampleFormControlInput3" placeholder="Masukkan stok produk">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-
dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save
changes</button>
</div>
</form>
</div>
</div>
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-
target="#exampleModal">
Tambah Produk
</button>
<table class="table table-striped">
<thead>
<tr>

<th scope="col">#</th>

<th scope="col">Kode Produk</th>

<th scope="col">Produk</th>

<th scope="col">Harga</th>

<th scope="col">Stok</th>

<th scope="col">Action</th>

</tr>

</thead>

<?php

include '../koneksi.php';

$no = 1;

$sql="SELECT * FROM produk ORDER BY ProdukId DESC";

$query = mysqli_query($koneksi, $sql);

?>

<tbody>

<?php foreach ($query as $data): ?>

<tr>

<th scope="row"><?php echo $no++; ?></th>

<td><?= $data['kode_produk'] ?></td>

<td><?= $data['NamaProduk'] ?></td>

<td>Rp. <?= number_format($data['Harga'], 0, ',','.') ?></td>

<td><?= $data['Stok'] ?></td>

<td>

<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"

href="../produk_function/produk_delete_produk.php?ProdukID=<?= $data['ProdukID'] ?>" class="btn btn-danger">Delete</a>

<button href="#" class="btn btn-warning" data-bs-

toggle="nodal" data-bs-target="#editModal<?= $data['ProdukID'] ?>">Edit</button>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>
<?php foreach ($query as $data): ?>

<div class="modal fade" id="editModalLabel<? $data['ProdukID'] ?>"

tabindex="-1" aria-labelledby="editModalLabel<?= $data['ProdukID'] ?>" aria- hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Produk</h1>


<button type="button" class="btn-close" data-bs-
dismiss="modal" aria-label="Close"></button>
</div>
<form

actions"../produk_function/produk_edit_produk.php?ProdukID=<?= $data ['ProdukID'] ?>" method="POST">

<div class="modal-body">

<input type="hidden" name="Produk ID" value="<?=$data['ProdukID'] ?>">

<div class="form-group mb-3">

<label for="exampleFormControlInput1"

class="form-label">Kode Produk</label>

<input type="text" name="kode_produk" value="<?=

$data['kode_produk'] ?>" class="form-control" required>

</div>

<div class="form-group mb-3">

<label for="exampleFormControlInput1"

class="form-label">Nama Produk</label> 
<input type="text" name="NamaProduk" value="<?= $data['NamaProduk'] ?>" class="form-control" required>

</div>

<div class="form-group mb-3">

<label for="exampleFormControlInput2"

class="form-label">Harga Produk</label>

<input type="number" name="Harga" value="<?=

$data['Harga'] ?>" class="form-control" required>

</div>

<div class="form-group mb-3">

<label for="exampleFormControlInput3"

class="form-label">Stok Produk</label> 
<input type="number" name="Stok" value="<?= $data['Stok'] ?>" class="form-control" required> </div>
</div>
</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-

bs-dismiss="modal">Close</button>
<button type="submit" name="editData" class="btn btn-

primary">Save changes</button>

</div>

</form>

</div>

</div>

</div>

<?php endforeach; ?>

</body>
</html>