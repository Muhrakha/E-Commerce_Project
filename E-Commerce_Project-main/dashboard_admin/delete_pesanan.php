<?php
require_once '../dbkoneksi.php';
$_delete=$_GET['delete'];
$sql = "DELETE from pesanan WHERE id=?";
$st = $dbh -> prepare($sql);
$st->execute([$_delete]);
header('location:daftar_pesanan.php');
?>