<?php 
    include "../db.php";
    session_start();

    $query = "SELECT * FROM transaksi";
    $sql = mysqli_query($konek, $query);
    $no = 1;
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>D'music</title>
   <!-- Data Tables -->
  <link rel="stylesheet" href="../datatables/datatables.min.css">
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../assets_copy/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../Assets/font-awesome/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets_copy/dist/css/adminlte.min.css">
</head>
<script>
  $(document).ready(function(){
    $('#table').DataTable();
  }
  
  )
</script>
<body class="hold-transition layout-top-nav bg-secondary">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="#" class="navbar-brand">
      <img src="../Assets/dmusic.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="35px">
      <span class="brand-text font-weight-light">D'music</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
            <a href="admin.php" class="nav-link">Home</a>
          </li>
          <!--Dropdown Menu -->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="../admin/data_user.php" class="dropdown-item">Data Admin</a></li>
              <li><a href="../barang/data_barang.php" class="dropdown-item">Data Barang</a></li>
              <li><a href="../admin/data.php" class="dropdown-item">Data Transaksi</a></li>
            </ul>
          </li>
      </ul>
    </div>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
        <i class="fa fa-user" aria-hidden="true"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-1">
        <a href="../admin/data.php" type="submit" class="btn btn-app ml-3 mb-3" onclick="return confirm('Apakah anda ingin kembali?')"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
        </div>
        <div class="col-md-10">
          <h1 style="text-align: center;" class="m-0 text-dark"><i class="fa fa-address-book" aria-hidden="true"></i>Data Transaksi</h1>
        </div>
        <div class="col-md-1">
        <button type="submit" onclick="window.print()" class="btn btn-app"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card">
            <!--<div class="card-header">
              <h5 class="card-title m-0">Featured</h5>
            </div>-->
            <div class="card-body">
            <form action="prosses2.php" method="post">
              
                  <div class="table-responsive table-hover table-bordered bg-light">
    <table class="table">
      <thead>
        <tr>
          <center><th>No. </th></center>
          <center><th>Nama Lengkap</th></center>
          <center><th>Alamat</th></center>
          <center><th>Email</th></center>
          <center><th>No Handphone</th></center>
          <center><th>Barang</th></center>
          <center><th>Jumlah Beli</th></center>
          <center><th>Jenis Pengiriman</th></center>
          <center><th>Status</th></center>
          <center><th>Tanggal Transaksi</th></center>
        </tr>
      </thead>
      <tbody>
      <?php
        while($result = mysqli_fetch_assoc($sql)){
      ?>
        <tr>
          <center><td><?php echo $no++; ?></td></center>
          <center><td><?php echo $result['name']; ?></td></center>
          <center><td><?php echo $result['alamat']; ?></td></center>
          <center><td><?php echo $result['email']; ?></td></center>
          <center><td><?php echo $result['nohp']; ?></td></center>
          <center><td><?php echo $result['nama_barang']; ?></td></center>
          <center><td><?php echo $result['jumlah']; ?></td></center>
          <center><td><?php echo $result['pengiriman']; ?></td></center>
          <center><td><?php echo $result['Status']; ?></td></center>
          <center><td><?php echo $result['tgl_transaksi']; ?></td></center>
      <?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
            </form>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

   
<!--footer-->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
	</div>
	<!-- Default to the left -->
	<strong> &copy; <a href="">D'music</a>.</strong>Life is about music
</footer>
</div>
<script src="../assets_copy/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets_copy/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_copy/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="../Assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>