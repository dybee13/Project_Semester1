<?php 
    include "../db.php";
    session_start();

    $query = "SELECT * FROM barang";
    $sql = mysqli_query($konek, $query);
    $no = 0;
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
            <a href="../admin/admin.php" class="nav-link">Home</a>
          </li>
          <!--Dropdown Menu -->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="../admin/data_user.php" class="dropdown-item">Data Admin</a></li>
              <li><a href="data_barang.php" class="dropdown-item">Data Barang</a></li>
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
      <div class="row mb-2">
        <div class="col-md-11">
          <center><h1 class="m-0 text-dark"><i class="fa fa-cubes" aria-hidden="true"></i></i>Data Barang</h1></center>
        </div>
        <div class="col-md-1">
        <a href="../cetak/barang.php" class="btn btn-app"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
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
            <form action="prossess.php" method="post">
              <a href="kelolaa.php" type="submit" class="btn btn-default ml-3 mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
              
                  <div class="table-responsive bg-light ">
                    <table class="table table-bordered table-hover table-striped" id="table">
                      <thead>
                        <tr>
                          <center><th>No. </th></center>
                          <center><th>Nama Barang</th></center>
                          <center><th>Deskripsi</th></center>
                          <center><th>Jenis</th></center>
                          <center><th>Harga</th></center>
                          <center><th>Foto</th></center>
                          <center><th>Stok Barang</th></center>
                          <center><th>Aksi</th></center>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($result = mysqli_fetch_assoc($sql)){
                      ?>
                        <tr>
                          <center><td><?php echo ++$no; ?></td></center>
                          <center><td><?php echo $result['nama']; ?></td></center>
                          <center><td><?php echo $result['desk']; ?></td></center>
                          <center><td><?php echo $result['jenis']; ?></td></center>
                          <center><td>Rp.<?php echo number_format($result['harga']); ?>,-</td></center>
                          <center><td><img src="../Assets/img_barang/<?php echo $result['foto']; ?>" alt="" style="width: 150px;"></td></center>
                          <center><td><?php echo $result['stok']; ?></td></center>
                          <center><td>
                          <a href="kelolaa.php?ubah=<?php echo $result['id_barang']; ?>" type="submit" class="btn btn-default mb-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <a href="prossess.php?hapus=<?php echo $result['id_barang']; ?>" type="submit" class="btn btn-default" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td></center>
                        </tr>
                        <?php
                          }
                        ?>
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
<!-- Bootstrap 5 -->
<script src="../assets_copy/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_copy/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>