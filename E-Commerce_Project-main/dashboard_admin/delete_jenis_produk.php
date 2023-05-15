<?php
require_once '../dbkoneksi.php';
$_delete=$_GET['delete'];
$sql = "DELETE from merk WHERE id=?";
$st = $dbh -> prepare($sql);
$st->execute([$_delete]);
header('location:list_jenis_produk.php');
?>