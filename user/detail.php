<?php
session_start();
    include "../layouts/header.php";
    include "../layouts/navbar.php";
    include "../db.php";
    
    $id = $_GET['detail'];
    $query = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang = '$id'");
    $sql = mysqli_fetch_array($query);
    
?>
<div class="content-wrapper" style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);">
<!-- Main content -->
<form action="cart.php" method="post" enctype="multipart/form-data">
    <div class="content">
        <div class="container-fluid py-5">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                            <img src="../Assets/img_barang/<?php echo $sql['foto']; ?>" class="w-100 shadow-lg">
                        </div>
                        <div class="col-md-6 offset-md-1">
                            <h1><?php echo $sql['nama']; ?></h1>
                            <p class="fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem tempora delectus, libero cupiditate odit quasi quod dolores, provident odio accusamus alias consequatur. Nostrum quae quis cumque! Explicabo voluptas nostrum aliquam eligendi laudantium voluptates nam quidem.</p>
                            <h4 style="color: darkred;">Rp.<?php echo number_format($sql['harga']); ?>,-</h4>
                            <h5>Stok: <b><?php echo $sql['stok']; ?></b></h5><br>
                            
                            <div class="row">
                                <div class="col-md-2">
                                <input type="number" min="1" name="jumlah" placeholder=" Jumlah Beli">
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-2 mt-5">
                            <a href="home.php" type="submit" class="btn btn-secondary"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
                            </div>
                            <div class="col-md-2 offset-md-3 mt-5">
                            <input type="hidden" value="<?php echo $sql['nama']; ?>" name="nama">
                            <input type="hidden" value="<?php echo $sql['harga']; ?>" name="harga">
                            <input type="hidden" value="<?php echo $sql['foto']; ?>" name="foto">
                            </div>
                            <div class="col-md-2 offset-md-3 mt-5">
                            <a href="cekot.php?beli=<?php echo $sql['id_barang']; ?>" type="submit" class="btn btn-primary">Purchase</a>
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