<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from users where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_array($login);

    // cek jika user login sebagai admin
    if ($data['role'] == "Admin") {

        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "Admin";
        $_SESSION['nama'] = $nama;
        // alihkan ke halaman dashboard admin
        header("location: ../pages/admin/index_admin.php");

        // cek jika user login sebagai pegawai
    } else if ($data['role'] == "User") {
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "User";
        // alihkan ke halaman dashboard pegawai
        header("location: ../pages/user/index_user.php");

        // cek jika user login sebagai pengurus
    } else {

        // alihkan ke halaman login kembali
        header("location: ../index.php?pesan=gagal");
    }
} else {
    header("location: ../index.php?pesan=gagal");
}