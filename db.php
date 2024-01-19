<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "musik";

    $konek = mysqli_connect($host, $user, $pass, $db);

    mysqli_select_db($konek, $db);
?>