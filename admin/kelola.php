<!DOCTYPE html>

<?php
   include "../db.php"; 
   $nama = '';
   $alamat = '';
   $email = '';
   $nohp = '';
   $umur = '';
   $kelamin = '';

  if(isset($_GET['ubah'])){
    $id = $_GET['ubah'];
    
    $query = "SELECT * FROM admin WHERE id = '$id'";
    $sql = mysqli_query($konek, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $alamat = $result['alamat'];
    $email = $result['email'];
    $nohp = $result['no_hp'];
    $umur = $result['umur'];
    $kelamin = $result['kelamin'];

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
                <center><h2 class="mb-3">Tambah Data Admin</h2></center>
          <form action="prosses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="mb-3 row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="nama" placeholder="Ketik disini..." value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="email" placeholder="Ketik disini..." value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputNohp" class="col-sm-2 col-form-label">No Handphone</label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="nohp" placeholder="Ketik disini..." value="<?php echo $nohp; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputUmur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                <input required type="text" class="form-control" name="umur" placeholder="Ketik disini..." value="<?php echo $umur; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <textarea required class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" placeholder="Ketik disini..." ><?php echo $alamat; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                <select required class="form-select" aria-label="Default select example" name="kelamin" value="<?php echo $kelamin; ?>">
                    <option>Pilih Jenis Kelamin</option>
                    <option <?php if($kelamin == 'Laki-laki'){echo "selected";} ?> value="Laki-laki">Laki-laki</option>
                    <option <?php if($kelamin == 'Perempuan'){echo "selected";} ?> value="Perempuan">Perempuan</option>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputFoto" class="col-sm-2 col-form-label">Tambahkan foto Anda</label>
                <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control" name="foto" type="file" id="formFile" accept="image/">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                <a href="data_user.php" type="submit" class="btn btn-warning ml-3 mb-3" onclick="return confirm('Apakah anda ingin kembali?')"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
                </div>
            <?php
                if(isset($_GET['ubah'])){
            ?>
                <div class="col-2 offset-8">
                <button type="submit" name="aksi" value="ubah" class="btn btn-success ml-3 mb-3"><i class="fa fa-share-square-o" aria-hidden="true"></i> Simpan</button>
                </div>
            <?php 
                } else{
            ?>
                <div class="col-2 offset-8">
                <button type="submit" name="aksi" value="add" class="btn btn-primary ml-3 mb-3"><i class="fa fa-share-square-o" aria-hidden="true"></i> Tambahkan</button>
                </div>
            <?php 
                }
            ?>
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