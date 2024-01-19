<?php
    session_start();
    include "../layouts/header.php";
    include "../layouts/navbar.php";
    include "../db.php";
    
    $query = mysqli_query($konek, "SELECT * FROM login_user");
    $sql = mysqli_fetch_array($query);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="profile.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                        <?php 
                        if(isset($_SESSION['user'])){
                        ?>
                                    <h5>
                                        <?php echo $_SESSION['user']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $_SESSION['kerja']; ?>
                                    </h6>
                        <?php } 
                        elseif(!isset($_SESSION['user'])){
                        ?>
                                    <h5>Hello USER!</h5>
                                    <h6>Please Login or Signup for display your information!</h6>
                        <?php 
                        }
                        ?>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="edit.php" class="btn btn-outline-secondary mb-3">Edit Profile</a>
                        <?php 
                        if(!isset($_SESSION['user'])){
                        ?>
                        <a href="../Login/login.php" class="btn btn-outline-secondary">Login</a>
                        <a href="../Login/signup.php" class="btn btn-outline-secondary">Sign Up</a>
                        <?php 
                        }elseif(isset($_SESSION['user'])){
                        ?>
                        <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                        <?php 
                        if(isset($_SESSION['user'])){
                        ?>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                <p><?php echo $_SESSION['nama']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['nohp']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['kerja']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Adress</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['alamat']; ?></p>
                                            </div>
                                        </div>
                            </div>
                        <?php 
                            }elseif(!isset($_SESSION['user'])){
                        ?>
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Adress</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>-</p>
                                            </div>
                                        </div>
                            </div>
                        <?php 
                            }
                        ?>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-dark">Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="text-dark">Your Bio</label><br/>
                                        <p>Your detail description</p>
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