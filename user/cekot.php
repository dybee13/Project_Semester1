<?php 
session_start();
include "../layouts/header.php";
include "../layouts/navbar.php";
include "../db.php";

    $id = $_GET['beli'];
    $nota = mysqli_query($konek, "SELECT * FROM transaksi");
    $sq = mysqli_fetch_assoc($nota);
    $query = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang = '$id'");
    $ongkir = mysqli_query($konek, "SELECT * FROM ongkir");
    $sql = mysqli_fetch_array($query);

    if(!isset($_SESSION['user'])){
      echo "<script>
            alert('Please Log in first!')
            window.location = '../Login/login.php';
            </script>";
    }

?>

<div class="content-wrapper">
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
  <form action="" method="post">
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
                <div class="col-md-12">
                    <div class="row">
                        
                    <p>Home > Detail > <b>Checkout</b></p>
                        <hr style="background-color: black;">
                    </div>
                    <div class="row">
                        <div class="col-md-7" style="border-right: 1px solid black;">
                            
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <?php 
                                    if(isset($_SESSION['user'])){
                                    ?>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Userame</label>
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
                                                <p name="name"><?php echo $_SESSION['nama']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="email"><?php echo $_SESSION['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="nohp"><?php echo $_SESSION['nohp']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p name="nohp"><?php echo $_SESSION['alamat']; ?></p>
                                            </div>
                                        </div>
                                    <?php }?>
                            <div class="col-12 mb-2">
                            <label for="address2" class="form-label">Address 2 <span>(Optional)</span></label>
                            <input type="text" name="alamat2" class="form-control" id="address2" placeholder="Apartment or suite">
                            </div>
                            <input name="check" class="w-100 btn btn-primary mt-3" value="Continue" type="submit">
                            <a href="../user/home.php" class="w-100 btn btn-secondary mt-3" type="submit">Cancel checkout</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                <img src="../Assets/img_barang/<?php echo $sql['foto']; ?>" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="col-8 mt-3">
                                <h4><?php echo $sql['nama']; ?></h4>
                                <h6 class="text-body-secondary">Quantity: 1x</h6>
                                </div>
                            </div>
                        </div>
                        <hr style="background-color: black;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8 mt-3 mb-3">
                                <input type="text" class="form-control-lg" id="address" placeholder="Input your promo code.">
                                </div>
                                <div class="col-4 mt-3 mb-3">
                                <a href="" class="w-100 btn btn-success btn-lg" type="submit">Apply</a>
                                </div>
                            </div>
                            <div class="row">
                            <select name="kirim" class="form-select form-select-lg" aria-label="Default select example" requiered>
                                <option selected>Choose Delivery</option>
                                <?php while($ong = mysqli_fetch_array($ongkir)){ ?>
                                    <option value="<?php echo $ong['id']; ?>"><?php echo $ong['nama']; ?>-Rp.<?php echo number_format($ong['harga']); ?>-Estimation <?php echo $ong['estimasi']; ?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>
                        <hr style="background-color: black;">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="text-dark ml-2">Subtotal</label>
                            </div>
                            <div class="col-md-6 mt-2">
                                <p style="text-align: right;">Rp.<?php echo number_format($sql['harga']); ?></p>
                            </div>
                        </div>
                        <hr style="background-color: black;">
                        
                    </div>
                </div>
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
  </form>
<?php 
if(isset($_POST['check'])){
    $inv = rand();
    $_SESSION['inv'] = $inv;
    $foto = $sql['foto'];
    $_SESSION['barang'] = $sql['nama'];
    $_SESSION['foto'] = $sql['foto'];
    $id = $_SESSION['id_user'];
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
    $nohp = $_SESSION['nohp'];
    $alamat = $_SESSION['alamat'];
    $barang = $sql['nama'];
    $jumlah = 1;
    $tgl = date("Y-m-d H:i:s");
    $kirim = $_POST['kirim'];
    $barangg = $sql['id_barang'];
    $_SESSION['cekot']=$sql['id_barang'];
    $ambil = mysqli_query($konek, "SELECT * FROM ongkir WHERE id='$kirim'");
    $asoc = mysqli_fetch_assoc($ambil);

    $kirimm = $asoc['nama']; 
    $total = $sql['harga']+$asoc['harga'];
    $_SESSION['harga'] = $total;

    $masuk = mysqli_query($konek, "INSERT INTO transaksi(kode_inv,name,email,alamat,nohp,nama_barang,jumlah,pengiriman,Status,tgl_transaksi,total,foto,id_barang,id_user) VALUES('$inv','$nama','$email','$alamat','$nohp','$barang','$jumlah','$kirimm','Belum dibayar','$tgl','$total','$foto','$barangg','$id')");
    echo "<script>
            alert('Berhasil Pesan!')
            window.location = 'nota.php';
            </script>";
}
?>
<?php 
include "../layouts/footer.php";
?>