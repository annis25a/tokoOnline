<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="./css/cart.css">
    <link  rel="stylesheet" href="./css/navbarUser.css">
    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br></br>
    <div class="container mb-5">
        <div class="card">
            <div class="card-header">
                <h3>Keranjang</h3>
            </div>
            <div class="card-body">
            <?php 
            if (@$_SESSION['cart'] == null) {
                echo "Keranjang kosong";
            }
            else {
            ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (@$_SESSION['cart'] as $key => $value) : 
                        ?>
                    <tr>
                        <td><?=($key+1)?></td>
                        <td><?=$value['nama_produk']?></td>
                        <td> <?=number_format($value["harga"]); ?></td>
                        <td><?=$value['qty']?></td>
                        <td> <?= number_format($value["qty"] * $value["harga"], 2);?></td>
                        <td><a href="delete_cart.php?id=<?=$key?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><button class="btn2">Hapus</button></a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <br><br>            
            <a href="cek_data.php"><button class="btn1">checkout</button></a>
            <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>