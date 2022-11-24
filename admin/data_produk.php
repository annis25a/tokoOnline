
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/dataProduk.css">
    <link rel="stylesheet" href="./css/navbar.css">

    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center mt-2 mb-3">Data Produk<h3>
                <form action="data_produk.php" method="post">
                    <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered fs-5 fw-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../connection.php";
                            if (isset($_POST["cari"])) {
                                // jika ada keyword pencarian 
                                $cari=$_POST['cari'];
                                $query_produk= mysqli_query($conn,"SELECT * FROM produk WHERE id_produk LIKE '%$cari%' OR nama_produk LIKE '%$cari%' OR kategori LIKE '%$cari%'");
                            }else{
                                //jika tidak ada keyword pencarian
                                $query_produk= mysqli_query($conn," SELECT * FROM produk");
                            }
                            while($data_produk= mysqli_fetch_assoc($query_produk)) { ?>
                                <tr>
                                    <td><?= $data_produk["nama_produk"]; ?></td>
                                    <td><?= $data_produk["deskripsi"]; ?></td>
                                    <td><?= $data_produk["kategori"]; ?></td>
                                    <td><?= $data_produk["harga"]; ?></td>
                                    <td><img src="<?= "img/".$data_produk['foto_produk']; ?>" width='150' height='150'></td>
                                    <td> <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" ><i class="fa-solid fa-pen-to-square"></i></a> | <a href="hapus_produk.php?id_produk=<?=$data_produk['id_produk']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" ><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <a href="tambah_produk.php"><button >Tambah Produk</button></a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>