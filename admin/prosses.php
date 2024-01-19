<?php
    include "fungsi.php";
    session_start();
    if(isset($_POST['aksi'])){
        //tambah data
        if($_POST['aksi'] == 'add'){
            
            $berhasil = tambah_data($_POST, $_FILES);
            if($berhasil){
                $_SESSION['tambah'] = "Data berhasil ditambahkan!";
                header("location: data_user.php");
            }else{
                echo $berhasil;
            }
        
        //edit data
        }else if($_POST['aksi'] == 'ubah'){

            $berhasil = ubah_data($_POST, $_FILES);
            if($berhasil){
                $_SESSION['edit'] = "Data berhasil diubah!";
                header("location: data_user.php");
            }else{
                echo $berhasil;
            }
        }
    }

    //hapus data
    if(isset($_GET['hapus'])){

        $berhasil = hapus($_GET);
        if($berhasil){
            $_SESSION['delete'] = "Data berhasil dihapus!";
            header("location: data_user.php");
        }else{
            header("location: data_user");
        }
    }
?>