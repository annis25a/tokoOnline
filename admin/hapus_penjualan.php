<?php
    if ($_GET['id_transaksi']) {
        include "../connection.php";
        $qry_hapus=mysqli_query($conn, "delete from transaksi where id_transaksi='".$_GET['id_transaksi']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus penjualan'); location.href='data_penjualan.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus penjualan'); location.href='data_penjualan.php';</script>";
        }
    }
?> 