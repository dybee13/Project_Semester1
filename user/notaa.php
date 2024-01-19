<?php 
session_start();
include "../layouts/header.php";
include "../layouts/navbar.php";
include "../db.php";

$id = $_GET['nota'];

$query = mysqli_query($konek, "SELECT * FROM transaksi WHERE id = '$id'");
$sql = mysqli_fetch_assoc($query);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-12">
          <center><h1 class="">Detail Pembelian</h1></center>
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
            <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Kode Invoice</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $sql['kode_inv']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['user']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="name"><?php echo $sql['name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="email"><?php echo $sql['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="nohp"><?php echo $sql['nohp']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="nohp"><?php echo $sql['alamat']; ?></p>
                                            </div>
                                        </div>
              <div class="card mb-3 mt-3 shadow">
                  <div class="row g-0">
                      <div class="col-md-3">
                        <img src="../Assets/img_barang/<?php echo $sql['foto']; ?>" class="img-fluid rounded-start" alt="" width="400px">
                      </div>
                  <div class="col-md-7">
                  <div class="card-body border-2">
                      <h5 class="card-title"><?php echo $sql['nama_barang']; ?></h5>
                      <p class="card-text text-left">Quantity: 1</p>                 
                  </div>
                  </div>
                </div>
              </div>
              <div class="alert alert-info" role="alert">
              <h5>Silahkan melakukan pembayaran sebesar Rp.<?php echo number_format($sql['total']); ?></h5><br>
              <h6><b>BANK BCA 122-130307 AN. <?php echo $sql['name']; ?></b></h6>
              </div>
              <a href="checkout.php?detail=<?=$id?>" class="btn btn-primary">Kembali</a>
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

<?php 
include "../layouts/footer.php";
?>