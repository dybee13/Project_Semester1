<?php
    include "../db.php";
function ubah_data($data){
        $id = $data['id'];
        $status = $data['status'];

        $queryy = "SELECT * FROM transaksi WHERE id = '$id'";
        $sqll = mysqli_query($GLOBALS['konek'], $queryy);
        $result = mysqli_fetch_assoc($sqll);

        $query = "UPDATE transaksi SET Status='$status' WHERE id = '$id';";
        $sql = mysqli_query($GLOBALS['konek'], $query);

        return true;
    }

    function hapus($data){
        $id = $data['hapus'];

        $queryy = "SELECT * FROM transaksi WHERE id = '$id'";
        $sql = mysqli_query($GLOBALS['konek'], $queryy);
        $result = mysqli_fetch_assoc($sql);

        $query = "DELETE FROM transaksi WHERE id = '$id';";
        $sql = mysqli_query($GLOBALS['konek'], $query);

        return true;
    }
?>