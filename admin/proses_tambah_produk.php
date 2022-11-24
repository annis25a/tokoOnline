<?php
    if($_POST){
        $nama_produk=$_POST['nama_produk'];
        $deskripsi=$_POST['deskripsi'];
        $kategori=$_POST['kategori'];
        $harga=$_POST['harga'];
        $file_tmp = $_FILES['foto_produk']['tmp_name'];
        $file_name=rand(0,9999).$_FILES['foto_produk']['name'];
        $file_size= $_FILES['foto_produk']['size'];
        $file_type= $_FILES['foto_produk']['type'];

        include "../connection.php";
        if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png" or $file_type == "image/jpg")){
            move_uploaded_file($file_tmp, 'img/'.$file_name);
            $insert=mysqli_query($conn,"insert into produk (nama_produk, deskripsi, kategori, harga, foto_produk) value ('".$nama_produk."', '".$deskripsi."', '".$kategori."', '".$harga."', '".$file_name."')") or die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses menambahkan produk');location.href='data_produk.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
            } 
        }else{
            echo "<script>alert('file tidak sesuai : file foto format jpeg, jpg and png');location.href='tambah_produk.php';</script>";
        }  
    }
    
?>