<?php
$server = "localhost";
$username = "root";
$pw = "";
$db = "kasrt";


$koneksi = mysqli_connect($server, $username, $pw, $db) or die(mysqli_connect_error());