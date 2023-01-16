<?php
include '../../koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
mysqli_query($koneksi, $sql);
header("Location: ./akun_warga.php");