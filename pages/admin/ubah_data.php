<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role'] == "User") {
  header("location: ../index.php?pesan=gagal");
}
?>
<?php
include '../../koneksi.php';
$sql = "SELECT max(id) AS last_id FROM users LIMIT 1";
$query1 = mysqli_query($koneksi, $sql);
$dt = mysqli_fetch_array($query1);
$last_id = $dt['last_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TAMBAH WARGA | ADMIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./index_admin.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../logout.php" class="nav-link"><strong>LogOut</strong></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KAS RT</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['email']; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="./index_admin.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../index_admin.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  DATA WARGA
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/admin/akun_warga.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Akun Warga</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./data_warga.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Warga</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./warga.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Warga</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../index_admin.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  TRANSAKSI IURAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/admin/data_iuran.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Kas Warga</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/admin/tambah_iuran.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Iuran Warga</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../index_admin.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  TRANSAKSI IURAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/admin/laporan_kas.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Kas</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>UBAH AKUN WARGA</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index_admin.php">HOME</a></li>
                <li class="breadcrumb-item active">Ubah Akun Warga</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Akun Warga</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php
                include '../../koneksi.php';
                $id = $_GET['id'];
                $qry = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$id");
                $data = mysqli_fetch_array($qry);

                if (isset($_POST['submit'])) {
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $nama = $_POST['nama'];
                  $email = $_POST['email'];
                  $status = $_POST['status'];
                  $role = $_POST['role'];

                  $quer = "UPDATE users SET username='$username', password='$password', nama='$nama', email='$email', status='$status', role='$role' WHERE id='$id'";
                  $aksi = mysqli_query($koneksi, $quer);
                }
                ?>
                <form action="" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="Masukan Username" value="<?php echo $data['id'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukan Password" value="<?php echo $data['password'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?php echo $data['nama'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Masukan E-mail" value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option disabled selected hidden>Status Sekarang: <?php echo $data['status'] ?></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <select class="form-control" name="role">
                        <option disabled selected hidden>Status Sekarang: <?php echo $data['role'] ?></option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">UBAH DATA</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; Arif Fernanda</a>.</strong>
      TI.21.B1 - 312110047
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>