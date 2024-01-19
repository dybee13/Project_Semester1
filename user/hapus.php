<?php 
session_start();
$id = $_GET['hapus'];
unset($_SESSION['keranjang'][$id]);
header("Location:cart.php");
echo "<script>
            alert('Successfully remove product from the cart!');
    </script>";
?>