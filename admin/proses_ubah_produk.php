<?php
    if ($_POST) {
        include "../connection.php";
        $id_produk=$_POST["id_produk"];
        $nama_produk = $_POST["nama_produk"];
        $deskripsi = $_POST ["deskripsi"];
        $harga = $_POST ["harga"];
        if ($_FILES['foto_produk']['tmp_name']) {
            $file_tmp = $_FILES['foto_produk']['tmp_name'];
            $file_name=rand(0,9999).$_FILES['foto_produk']['name'];
            $file_size= $_FILES['foto_produk']['size'];
            $file_type= $_FILES['foto_produk']['type'];
            $folder="img/";
            $sql=mysqli_query($conn, "select * from produk where id_produk='$id_produk'");
            $produk=mysqli_fetch_array($sql);
            $path=$folder.$produk["foto_produk"];
            if(file_exists($path)){
                unlink($path); 
            }
            if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png" or $file_type == "image/jpg")){
                move_uploaded_file($file_tmp, $folder.$file_name);
                $update= mysqli_query ($conn, "update produk set nama_produk='".$nama_produk."', deskripsi='".$deskripsi."', foto_produk='".$file_name  ."', harga='".$harga."' where id_produk='".$id_produk."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update produk'); location.href='data_produk.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update produk'); location.href='data_produk.php' ; </script>";
                } 
            }
            else{
                echo "<script>alert('file tidak sesuai');location.href='data_produk.php';</script>";
            }
        }
        else{
            $update= mysqli_query ($conn, "update produk set nama_produk='".$nama_produk."', deskripsi='".$deskripsi."', harga='".$harga."' where id_produk='".$id_produk."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update produk'); location.href='data_produk.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update produk'); location.href='data_produk.php' ; </script>";
                } 
        }
    }
?>