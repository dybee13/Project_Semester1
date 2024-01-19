<?php
    session_start();
    include "../layouts/header.php";
    include "../layouts/navbar.php";
    include "../db.php";

    $query = "SELECT * FROM barang";
    $sql = mysqli_query($konek, $query);

    if(isset($_POST['cart'])){
        $_SESSION['keranjang'];
    }
?>
<form action="detail.php" method="post" >
    
  <!-- Main content -->
  <div class="content mt-4">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
        <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <img class="rounded-4 mb-3" src="../Assets/bgg.jpg" style="width: 100%;">
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide shadow-lg">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="../Assets/promo1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="../Assets/promo1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="Assets/promo1.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="col-12 buton">
                        <div class="row">
                            <h1 class="kat fw-bold">Kategori</h1>
                        </div>
                        <div class="row">
                        <div class="container cont text-center">
                            <a class="btn btnn btn1"><h3 class="pt-2 text-light fw-bold text-lg-left">Gitar Akustik</h3></a>
                            <a class="btn btnn btn2"><h3 class="pt-2 text-light fw-bold text-lg-left">Gitar Elektrik</h3></a>
                            <a class="btn btnn btn3"><h3 class="pt-2 text-light fw-bold text-lg-left">Bass</h3></a>
                            <a class="btn btnn btn4"><h3 class="pt-2 text-light fw-bold text-lg-left">Keyboard</h3></a>
                            <a class="btn btnn btn5"><h3 class="pt-2 text-light fw-bold text-lg-left">Drum</h3></a>
                            <a class="btn btnn btn6"><h3 class="pt-2 text-light fw-bold text-lg-left">Drum Elektrik</h3></a>
                        </div>
                        </div>
                    </div>
                    <h2 class="text-center" style="font-family:cursive">Our Collections</h2>
                    <p class="text-center mx-auto w-50 fw-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia illum et quibusdam reprehenderit cumque, nihil at iusto natus dolore rem soluta quis quae accusamus placeat?</p>
                </div>
                <div class="row row-cols-md-3 row-cols-sm-2 p-5">
            <!-- Item -->
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="col-md-3 col-sm-2 mb-5">
                <div class="card shadow" style="width: 15rem;">
                    <img style="width: 15rem; height: 15rem;" src="../Assets/img_barang/<?php echo $result['foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $result['nama']; ?></h5>
                        <p class="card-text">Rp.<?php echo number_format($result['harga']); ?>,-</p>
                        <a href="detail.php?detail=<?php echo $result['id_barang']; ?>" class="btn btn-primary btn-sm d-block">Detail</a>
                        <a href="cartt.php?cart=<?php echo $result['id_barang']; ?>" name="cart" class="btn btn-warning btn-sm d-block mt-2">Cart</a>
                    </div>
                </div>
                </div>
            <?php 
                }
            ?>
            </div>
            

            <div class="px-4 py-4 bg-secondary text-center">
                <div class="mx-auto w-50">
                    <h3 style="font-family: cursive;">About Us</h3>
                    <p class="text-center"><img src="../Assets/images/about-us.png" align="left" width="100px" class="me-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ipsum quaerat molestiae perferendis voluptatibus sint, odio, quas aliquam reiciendis saepe ratione doloribus a error vel perspiciatis maxime sapiente. Modi, molestias?</p>
                </div>
            </div>
            <div class="px-4 py-4 bg-primary text-center mb-3">
                <div class="mx-auto w-50">
                    <h3 style="font-family: cursive; color: black;">How To Order</h3>
                    <p class="text-center text-dark"><img src="../Assets/images/order.png" align="right" width="100px" class="me-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ipsum quaerat molestiae perferendis voluptatibus sint, odio, quas aliquam reiciendis saepe ratione doloribus a error vel perspiciatis maxime sapiente. Modi, molestias?</p>
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
</form>

<?php
    include "../layouts/footer.php";
?>