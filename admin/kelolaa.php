<!DOCTYPE html>

<?php
   include "../db.php"; 
   $nama = '';
   $email = '';
   $alamat = '';
   $nohp = '';
   $barang = '';
   $jumlah = '';
   $pengiriman = '';
   $status = '';
   $tgl = '';

  if(isset($_GET['ubah'])){
    $id = $_GET['ubah'];
    
    $query = "SELECT * FROM transaksi WHERE id = '$id'";
    $sql = mysqli_query($konek, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['name'];
    $alamat = $result['alamat'];
    $email = $result['email'];
    $nohp = $result['nohp'];
    $barang = $result['nama_barang'];
    $jumlah = $result['jumlah'];
    $pengiriman = $result['pengiriman'];
    $status = $result['Status'];
    $tgl = $result['tgl_transaksi'];

    //var_dump($result);
    //die();
  }
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>D'music</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../assets_copy/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../Assets/font-awesome/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets_copy/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav bg-secondary">
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
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="pengguna.php" class="dropdown-item">Data Admin</a></li>
              <li><a href="transaksi.php" class="dropdown-item">Data Transaksi</a></li>
            </ul>
          </li>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
        <i class="fa fa-user" aria-hidden="true"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</nav>
<div class="content-wrapper bg-secondary">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
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
            <div class="card-body">
                <center><h2 class="mb-3">Update Data Transaksi</h2></center>
          <form action="prosses2.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="mb-3 row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                <p><?php echo $nama; ?></p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <p><?php echo $email; ?></p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputNohp" class="col-sm-2 col-form-label">No Handphone</label>
                <div class="col-sm-10">
                <p><?php echo $nohp; ?></p>                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputUmur" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <p><?php echo $alamat; ?></p>               
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10">
                <p><?php echo $barang; ?></p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                <p><?php echo $jumlah; ?></p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Pengiriman</label>
                <div class="col-sm-10">
                <p><?php echo $pengiriman; ?></p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-10">
                <p><?php echo $tgl; ?></p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputKelamin" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <select required class="form-select" aria-label="Default select example" name="status" value="<?php echo $status; ?>">
                    <option>Pilih Status</option>
                    <option <?php if($status == 'belum dibayar'){echo "selected";} ?> value="Belum dibayar">Belum dibayar</option>
                    <option <?php if($status == 'diproses'){echo "selected";} ?> value="Sedang diproses">Sedang diproses</option>
                    <option <?php if($status == 'dikirim'){echo "selected";} ?> value="Sedang dikirim">Sedang dikirim</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                <a href="data.php" type="submit" class="btn btn-warning ml-3 mb-3" onclick="return confirm('Apakah anda ingin kembali?')"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
                </div>
            
                <div class="col-2 offset-8">
                <button type="submit" name="aksi" value="edit" class="btn btn-success ml-3 mb-3"><i class="fa fa-share-square-o" aria-hidden="true"></i> Simpan</button>
                </div>
            </div>
          </form>
            </div>
            <!--<div class="card-header">
              <h5 class="card-title m-0">Featured</h5>
            </div>-->
            
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>