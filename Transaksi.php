<?php
include '../KONEKSI.php';
session_start();
$barang = mysqli_query($KONEKSI, 'SELECT FROM produk');
// print_r($_SESSION);
$sum = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
    $sum += ($value['Harga'] * $value['Stok']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
<title>Dashboard - Transaksi</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384- T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GASXEV/Dwwykc2MPK8M2HN"
crossorigin="anonymous">
</head>
<body>
<?php include '../component/Navbar.php'; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Transaksi</h1>
<a href="../transaksi_function/Keranjang_reset.php">Reset Keranjang</a>
</div>
<hr>
<div class="row">
<div class="col-md-8">
<form method="post" action="../transaksi_function/Keranjang-act.php">
<div class="form-group d-flex flex-direction-column gap-2">
<input type="text" name="kode_produk" class="form-control" placeholder="Masukkan Kode Produk" autofocus>
<button class="btn btn-primary" type="submit">Search</button>
</div>
</form>
<br>
<?php
if (isset($_SESSION['flash_message'])) {
echo '<div class="alert alert-warning">'.
$_SESSION['flash_message']. '</div>';
// Clear the flash message
unset($_SESSION['flash_message']);
}
?>
<br>
<form method="post" action="../transaksi_function/Keranjang_update.php">
<table class="table table-bordered">
<tr>
<th>Nama Produk</th>
<th>Harga</th>
<th>Qty</th>
<th>Sub Total</th>
<th>Action</th>
</tr>
<?php if (isset($_SESSION['cart'])): ?>
<?php foreach ($_SESSION['cart'] as $key => $value) {
?>
<tr>
<td>
<?= $value['Nama Produk'] ?>
</td>
<td align="right"><?= number_format($value['Harga'])?></td>

<td class = "col-mid-md-2"></td>
<input type="number" name="Stok[<?= $key ?>]" value="<?= $value['Stok'] ?>" class="form-control">
</td>
<td align="right"><?=number_format($value['Harga'] * $value['Stok']) ?></td>
<td><a
href="../transaksi_function/Keranjang_hapus.php?id=<?= $key ?>" class="btn btn- danger">X</a></td>
</tr>

<?php } ?>
<?php endif; ?>
</table>
<button type="submit" class="btn btn-success">Perbaruhi</button>
</form>
</div>
<div class="col-md-4">
<h3>Total Rp. <?= number_format($sum) ?></h3>
<form action="../transaksi_function/Transaksi_act.php" method="POST">
<input type="hidden" name="total" value="<?= $sum ?>">
<div class="form-group">
<label>Bayar</label>
<input type="text" id="bayar" name="bayar" class="form-control">
</div>
<button type="submit" class="btn btn-primary mt-2">Selesai</button>
</form>
</div>
</div>
</div>
<script type="text/javascript">
    //inisialisasi inputan
    var bayar = document.getElementById('bayar');
    bayar.addEventListener('keyup', function(e) {
    bayar.value = formatRupiah (this.value, 'Rp. ');
    // harga = cleanRupiah (dengan_rupiah.value);
    // calculate(harga, service.value);
});
//generate dari inputan angka menjadi format rupiah
function formatRupiah (angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g,'').toString(), 
    split = number_string.split(','), 
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa), 
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
if (ribuan) { 
    separator = sisa?'.':''; 
    rupiah += separator + ribuan.join('.'); 
}
    rupiah = split[1] != undefined? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
//generate dari inpucan rupiah menjadi angka
function cleanRupiah (rupiah) {
    var clean = rupiah.replace(/\D/g,'');
    return clean;
    // console.log(clean);
}
    </script>
</body>

</html>