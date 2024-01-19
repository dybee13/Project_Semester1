<?php
session_start();
    include "../layouts/header.php";
    include "../layouts/navbar.php";
    include "../db.php";

    //echo '<pre>';
    //print_r($_SESSION);
    //echo '</pre>';
    if(isset($_POST['cek'])){
        
        $_SESSION['total'] = $_POST['harga'];
        foreach ($_SESSION['keranjang'] as $prod => $jumlah){
            $query = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang = $prod");
            $sql = mysqli_fetch_assoc($query);

            $_SESSION['sub'] = $sql['harga']*$jumlah;
            $usrme = $_SESSION['user'];
            $_SESSION['nabar'] = $sql['nama'];
            $_SESSION['qty'] = $jumlah;
            $_SESSION['fotbar'] = $sql['foto'];
        }
        echo "<script>
            window.location = 'cek.php';
            </script>";
    }
?>
<div class="content-wrapper">
<form action="" method="post" enctype="multipart/form-data">
  <!-- Main content -->
  <div class="content mt-4">
    <div class="container-fluid">
        
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="col-md-12">
            
                <div class="card">
                    <div class="card-body">
                        <?php 
                        if(empty($_SESSION['keranjang']) | !isset($_SESSION['keranjang'])){
                        ?>
                        <center>
                            <img src="../Assets/empty.png" width="200px" alt="">
                            <h2>anda belum menambahkan apapun kedalam keranjang :)</h2>
                        </center>
                        <?php }else{ ?>
                    
                        <div class="row">
                            <div class="col-md-9">
                            <?php foreach ($_SESSION['keranjang'] as $prod => $jumlah): ?>
                            <?php 
                            $query = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang = $prod");
                            $sql = mysqli_fetch_assoc($query);
                            $sub = $sql['harga']*$jumlah;
                            ?>
                            <center>
                            <div class="card mb-3 mt-3 shadow">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                    <input type="hidden" value="<?php echo $sql['foto']; ?>" name="foto">
                                    <img src="../Assets/img_barang/<?php echo $sql['foto']; ?>" class="img-fluid rounded-start" alt="" width="400px">
                                    </div>
                                    <div class="col-md-7">
                                    <div class="card-body border-2">
                                        <input type="hidden" value="<?php echo $sql['nama']; ?>" name="barang">
                                        <h5 class="card-title"><?php echo $sql['nama']; ?></h5>
                                        <p class="card-text text-left">Qty: </p>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="hidden" name="update" value="1">
                                                <input type="number" min="1" name="qty" value="<?php echo $jumlah; ?>" style="width: 8rem;">
                                            </div>
                                            <div class="col-md-2 offset-2">
                                            <a type="submit" href="cart.php?ubah=1" class="btn btn-success"><i class="fa fa-arrow-up" aria-hidden="true"></i></i></a>
                                            </div>
                                            <div class="col-md-2">
                                                <a type="submit" id="del" href="hapus.php?hapus=<?php echo $sql['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Remove product from the cart?')"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            </center><a href="home.php" class="btn btn-secondary d-block btn-sm">Continue shopping</a>
                           <?php } ?>
                            
                            </div>
                            <?php 
                            if(empty($_SESSION['keranjang']) | !isset($_SESSION['keranjang'])){
                            ?>
                        <?php }else{ ?>
                            <div class="col-md-3">
                            <div class="card shadow">
                            <?php $grand=0; ?>
                            <?php foreach ($_SESSION['keranjang'] as $prod => $jumlah): ?>
                            <?php 
                            $query = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang = $prod");
                            $sql = mysqli_fetch_assoc($query);
                            $sub = $sql['harga']*$jumlah;
                            ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm border-1">
                                <div>
                                <h6><strong><?php echo $sql['nama']; ?></h6>
                                <small class="text-body-secondary">Quantity: <?php echo $jumlah; ?>x</small>
                                </div>
                                <input type="hidden" value="<?php echo $sub; ?>" name="sub">
                                <span class="text-body-secondary">Rp.<?php echo number_format($sub); ?>,-</span>
                            </li>
                            <?php $grand = $grand+$sub; endforeach ?>
                                
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6"><h6><strong>Grand total: </strong></h6></div>
                                        <div class="col-md-6">
                                        <input type="hidden" value="<?php echo $grand; ?>" name="harga">
                                        <span class="text-body-secondary">Rp.<?php echo number_format($grand); ?>,-</span>
                                        </div>
                                    </div>
                                    <button style="width: 270px;" name="cek" class="btn btn-primary d-block btn-sm">Checkout</button>
                                    </div> 
                                </div>
                            </li>
                            <?php } ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<?php
    include "../layouts/footer.php";
?>