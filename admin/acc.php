<?php
    if ($_GET['id_transaksi']) {
        include "../connection.php";
        $id = $_GET['id_transaksi'];
        $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '".$id."'");
        $data = mysqli_fetch_array($cek);
        if ($data['status'] == "New") {
            $newstatus = 'Confirm';
        } elseif ($data['status'] == "Confirm") {
            $newstatus = 'process'; 
        } elseif ($data['status'] == "Process") {
            $newstatus = 'Done';
        } elseif ($data['status'] == "Done"){
            echo "<script>alert('Oke');</script>";
        }
        
        $acc= mysqli_query ($conn, "UPDATE transaksi set status='".$newstatus."' where id_transaksi = '".$id."'") or die (mysqli_error($conn));

        if ($acc && $newstatus == "Confirm") {
            echo "<script>alert('Berhasil Confirm Produk');location.href='data_penjualan.php';</script>";
        } elseif ($acc && $newstatus == "Pxrocess") {
            echo "<script>alert('Berhasil Process Produk');location.href='data_penjualan.php';</script>";   
        } elseif ($acc && $newstatus == "Done") {
            echo "<script>alert('Produk Terkirim');location.href='data_penjualan.php';</script>";   
        }else{
                echo "<script>alert('Pengiriman Produk Gagal');location.href='data_penjualan.php';</script>";
        }
    }
?>