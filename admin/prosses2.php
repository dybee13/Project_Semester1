<?php
    include "fungsi2.php";
    session_start();
    
    if(isset($_POST['aksi'])){
       if($_POST['aksi'] == 'edit'){

            $berhasil = ubah_data($_POST);
            if($berhasil){
                header("location: data.php");
            }
        }
    }
    
    //hapus data
    if(isset($_GET['hapus'])){

        $berhasil = hapus($_GET);
        if($berhasil){
            $_SESSION['delete'] = "Data berhasil dihapus!";
            header("Location: data.php");
        }else{
            header("Location: data.php");
        }
    }
?>