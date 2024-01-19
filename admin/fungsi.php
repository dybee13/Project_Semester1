<?php
    include "../db.php";
    function tambah_data($data, $files){

        $nama = $data['nama'];
            $id = $data['id'];
            $alamat = $data['alamat'];
            $email = $data['email'];
            $nohp = $data['nohp'];
            $umur = $data['umur'];
            $kelamin = $data['kelamin'];

            $split = explode(".", $files['foto']['name']);
            $ekstensi = $split[count($split)-1];
            $foto = $nama.'.'.$ekstensi;

            $dir = "C:/laragon/www/project/Assets/img/";
            $tmpFiles = $files['foto']['tmp_name'];

            move_uploaded_file($tmpFiles, $dir.$foto);

            $query = "INSERT INTO admin VALUES(null, '$nama', '$alamat', '$email', '$nohp', '$umur', '$kelamin', '$foto')";
            $sql = mysqli_query($GLOBALS['konek'], $query);

            return true;
    }

    function ubah_data($data, $files){
        $id = $data['id'];
            $nama = $data['nama'];
            $alamat = $data['alamat'];
            $email = $data['email'];
            $nohp = $data['nohp'];
            $umur = $data['umur'];
            $kelamin = $data['kelamin'];

            $queryy = "SELECT * FROM admin WHERE id = '$id'";
            $sqll = mysqli_query($GLOBALS['konek'], $queryy);
            $result = mysqli_fetch_assoc($sqll);
            

            if($files['foto']['name'] == ""){
                $foto = $result['foto'];
                header("location: data_user.php");
            }else{
                $split = explode(".", $files['foto']['name']);
                $ekstensi = $split[count($split)-1];
                $foto = $data['nama'].'.'.$ekstensi;
                unlink("C:/laragon/www/project/Assets/img/".$result['foto']);
                move_uploaded_file($files['foto']['tmp_name'], "C:/laragon/www/project/Assets/img/".$foto);
                header("location: data_user.php");
            }

            $queryy = "UPDATE admin SET nama='$nama', alamat='$alamat', email='$email', no_hp='$nohp', umur='$umur', kelamin='$kelamin', foto='$foto' WHERE id='$id'";
            $sqll = mysqli_query($GLOBALS['konek'], $queryy);

            return true;
    }

    function hapus($data){
        $id = $data['hapus'];

        $queryy = "SELECT * FROM admin WHERE id = '$id'";
        $sqll = mysqli_query($GLOBALS['konek'], $queryy);
        $result = mysqli_fetch_assoc($sqll);

        unlink("C:/laragon/www/project/Assets/img/".$result['foto']);

        $query = "DELETE FROM admin WHERE id = '$id';";
        $sql = mysqli_query($GLOBALS['konek'], $query);

        return true;
    }
?>