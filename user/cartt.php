<?php 
session_start();
include "../db.php";

$prod = $_GET['cart'];
$_SESSION['id'] = $prod;

if(isset($_SESSION['keranjang'][$prod])){
    $_SESSION['keranjang'][$prod]+=1;
}else{
    $_SESSION['keranjang'][$prod]=1;
}


//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';

echo "<script>
        alert('Successfully added product to cart!')
        window.location = 'home.php';
    </script>";
?>
