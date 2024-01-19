<?php 
include "../db.php";

$id = $_GET['konfirmasi'];

$query = mysqli_query($konek, "UPDATE transaksi SET Status='Sudah diterima' WHERE id = '$id'");
echo "<script>
        window.location = 'checkout.php';
    </script>";

?>