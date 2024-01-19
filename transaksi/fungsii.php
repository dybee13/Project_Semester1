<?php
    include "../db.php";
    function tambah_data($data, $files){

            $id = $data['id'];
            $nama = $data['nama'];
            $desk = $data['desk'];
            $jenis = $data['jenis'];
            $harga = $data['harga'];
            $stok  =$data['stok'];

            $split = explode(".", $files['foto']['name']);
            $ekstensi = $split[count($split)-1];
            $foto = $nama.'.'.$ekstensi;

            $dir = "C:/laragon/www/project/Assets/img_barang/";
            $tmpFiles = $files['foto']['tmp_name'];

            move_uploaded_file($tmpFiles, $dir.$foto);

            $query = "INSERT INTO barang VALUES(null, '$nama', '$desk', '$harga', '$jenis', '$foto', '$stok')";
            $sql = mysqli_query($GLOBALS['konek'], $query);

            return true;
    }

    function ubah_data($data, $files){

            $id = $data['id'];
            $nama = $data['nama'];
            $desk = $data['desk'];
            $jenis = $data['jenis'];
            $harga = $data['harga'];
            $stok  = $data['stok'];

            $queryy = "SELECT * FROM barang WHERE id = '$id'";
            $sqll = mysqli_query($GLOBALS['konek'], $queryy);
            $result = mysqli_fetch_assoc($sqll);
            

            if($files['foto']['name'] == ""){
                $foto = $result['foto'];
                header("location: data_user.php");
            }else{
                $split = explode(".", $files['foto']['name']);
                $ekstensi = $split[count($split)-1];
                $foto = $data['nama'].'.'.$ekstensi;
                unlink("C:/laragon/www/project/Assets/img_barang/".$result['foto']);
                move_uploaded_file($files['foto']['tmp_name'], "C:/laragon/www/project/Assets/img_barang/".$foto);
                header("location: data_user.php");
            }

            $queryy = "UPDATE barang SET nama='$nama', desk='$desk', harga='$harga', jenis='$jenis', foto='$foto', stok='$stok' WHERE id='$id'";
            $sqll = mysqli_query($GLOBALS['konek'], $queryy);

            return true;
    }

    function hapus($data){
        $id = $data['hapus'];

        $queryy = "SELECT * FROM admin WHERE id = '$id'";
        $sqll = mysqli_query($GLOBALS['konek'], $queryy);
        $result = mysqli_fetch_assoc($sqll);

        unlink("C:/laragon/www/project/Assets/img_barang/".$result['foto']);

        $query = "DELETE FROM barang WHERE id = '$id';";
        $sql = mysqli_query($GLOBALS['konek'], $query);

        return true;
    }
?>