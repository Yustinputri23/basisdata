<?php
include '../koneksi.php';
session_start();

$id_trx = $_GET['idtrx'];

$data =mysqli_query($koneksi, "SELECT * FROM transaksi WHERE
id_transaksi='$id_trx'");
$trx = mysqli_fetch_assoc($data);

$detail = mysqli_query($koneksi, "SELECT transaksi_detail.*, produk.NamaProduk
FROM transaksi_detail INNER JOIN produk ON transaksi_detail.produkID = produk.ProdukID WHERE transaksi_detail.id_transaksi='$id_trx' ");

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir selesai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <style type="text/css">
        body{
            color: #a7a7a7;
        }
    </style>
</head>


    <body onload="window.print(); self.close();">
<div align="center">
    <table width="500" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <th>Toko Cihuyyy<br>
        Jl Perdana Square<br>
    Pontianak, Kalimantan Barat, 782626</th>
        </tr>
        <tr align="center">
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td>#<?= $trx['nomor'] ?> <?=date('d-m-Y H:i:s',
           strtotime($trx['tanggal_waktu'])) ?> Kasir Cihuyyy </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
    </table>
    <table width="500" border="0" cellpadding="3" cellspacing="0">
      <?php while ($row = mysqli_fetch_array($detail)) { ?>
        <tr>
            <td valign="top">
                <?=$row['NamaProduk']?>
            </td>
            <td valign="top"><?=$row['stok']?></td>
            <td valign="top" align="right"><?= number_format($row['harga']) ?></td>
            <td valign="top" align="right">
                <?= number_format($row['total'])?>
            </td>
        </tr>
            <?php } ?>
            <tr>
                <td colspan="4">
                    <hr>
            </td>
        </tr>  
        <tr>
            <td align="right" colspan="3">Total</td>
            <td align="right"><?=number_format($trx['total'])?></td>
        </tr>
        <tr>
            <td align="right" colspan="3">Bayar</td>
            <td align="right"><?=number_format($trx['bayar'])?></td>
        </tr>
        <tr>
            <td align="right" colspan="3">Kembali</td>
            <td align="right"><?=number_format($trx['kembali'])?></td>
        </tr>
    </table>
    <table width="500" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr class="d-flex justify-content-center">
            <th>Terimaksih, Selamat Belanja Kembali</th>
        </tr>
        <tr class="d-flex justify-content-center">
            <th>====Layanan Konsumen====</th>
        </tr>
        <tr class="d-flex justify-content-center">
            <th>SMS/CALL 08979395303</th>
        </tr>
    </table>
</div>
</body>
    

</html>