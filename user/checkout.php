<?php 
session_start();
include "../layouts/header.php";
include "../layouts/navbar.php";
include "../db.php";

$id = $_SESSION['id_user'];
$query = "SELECT * FROM transaksi WHERE id_user='$id'";
$sql = mysqli_query($konek, $query);

if(!isset($_SESSION['user'])){
  echo "<script>
        alert('Please Log in first!')
        window.location = 'home.php';
        </script>";
}

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-12">
          <center><h1 class="">Riwayat Pembelian</h1></center>
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
            <div class="row row-cols-md-3 row-cols-sm-2 p-5">
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
                <div class="col-md-3 col-sm-2 mb-5">
                    <div class="card shadow" style="width: 15rem;">
                    <img style="width: 15rem; height: 15rem;" src="../Assets/img_barang/<?php echo $result['foto']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $result['nama_barang']; ?></h5>
                        <p class="card-text">Rp.<?php echo number_format($result['total']); ?>,-</p>
                        <?php if($result['Status']=='Belum dibayar'){
                          /* Mengambil waktu yang sekarang.*/
                          $date = new DateTime($result['tgl_transaksi']);
                          $dte = $result['tgl_transaksi'];
                          /* Menjumlahkan waktu dari awal dengan penambahan waktu yang telah ditentukan.*/
                          $batas = $date->add(new DateInterval('P1D'));
                          $now = date('Y-m-d H:i:s');
                          /* Menampilkan waktu akhir.*/
                          echo "Batas waktu pemayaran: " .$date->format('Y-m-d').", ".$date->format('H:i:s');

                          /*if($now <= $batas){
                            $tgl = mysqli_query($konek, "SELECT * FROM transaksi WHERE tgl_transaksi = $date");
                            $trans = mysqli_fetch_assoc($tgl);
                            $idtrans = $trans["id"];
                            
                          }*/
                          ?>
                          <a href="notaa.php?nota=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm d-block">Lanjutkan Pembayaran</a>
                        <?php  }elseif($result['Status']=='Sedang diproses'){ ?>
                          <h5>Menunggu diproses penjual</h5>
                        <?php }elseif($result['Status']=='Sedang dikirim'){?>
                          <h5>Barang sedang diantar oleh kurir</h5><br>
                          <p>Klik tombol dibawah jika sudah menerima barang</p>
                          <a href="konfir.php?konfirmasi=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm d-block" onclick="return confirm('Apakah anda sudah menerima barang?')">Konfirmasi</a>
                        <?php }else{?>
                          <h5>Barang sudah diterima</h5><br>
                        <?php }?>
                        </div>
                    </div>
                </div>
            <?php 
                }
            ?>
            </div>
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

<?php 
include "../layouts/footer.php";
?>