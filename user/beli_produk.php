<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/navbarUser.css">
    <link rel="stylesheet" href="./css/beliProduk.css">
</head>
<body>
    <?php
        include "navbar.php";
        include "../connection.php";
        $query_detail_produk = mysqli_query($conn, "SELECT * FROM produk where id_produk = '".$_GET['id_produk']."'");
        $data_produk= mysqli_fetch_array($query_detail_produk);
    ?>
    <main class="container">
    <section class="text-center container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1>Detail Produk</h1>
        </div>
    </section>

    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4 mt-4 pt-1 mx-2">
            <img src="../admin/img/<?=$data_produk['foto_produk']?>" class="img-fluid rounded-start" alt="..." >
            </div>
            <div class="col-md-7">
            <div class="card-body">
            <form action="insert_keranjang.php?" method="POST">
                <input type="hidden" name="id_produk" value="<?=$data_produk['id_produk']?>">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama Produk</td>
                            <td><?=$data_produk['nama_produk']?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><?=$data_produk['deskripsi']?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><?=$data_produk['kategori']?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><?=$data_produk['harga']?></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td><input type="number" name="jumlah_beli" value="1"></td>
                        </tr>
                    </tbody>
                </table>
                <td colspan="2"><button type="submit" class="btn1">Beli</button></td>
            </form>
            </div>
            </div>
        </div>
    </div>

    </main>
</body>
</html>