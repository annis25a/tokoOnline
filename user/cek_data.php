    <?php
        session_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        < <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Keranjang</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
        <link  rel="stylesheet" href="./css/cekData.css">
        <link  rel="stylesheet" href="./css/navbarUser.css">
        <!-- Kit Font Awesome -->
        <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
            include "../connection.php";

        ?>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h1>Pembelian</h1>
                    <br><br>

                    <h6>Alamat Pengiriman</h6>
                    <p><?=$_SESSION['alamat']?></p>
                    <br>

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
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $grandtotal=array();
                        foreach (@$_SESSION['cart'] as $key => $value) : 
                            
                            $grandtotal[]=$value["harga"]*$value['qty'];
                            include '../connection.php';
                            $foto = mysqli_query($conn, 'SELECT * FROM produk WHERE id_produk = "'.$value['id_produk'].'" ');
                            $dt_foto = mysqli_fetch_array($foto);
                            ?>
                        <tr>
                            <td><?=($key+1)?></td>
                            <td><img src="../admin/img/<?=$dt_foto['foto_produk']?>" class="img-fluid rounded-start" alt="..." height="100px"></td>
                            <td><?=$value['nama_produk']?></td>
                            <td> <?php echo $value["harga"]; ?></td>
                            <td><?=$value['qty']?></td>
                            <td> <?php echo number_format($value["qty"] * $value["harga"], 2);?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <br>
                <?php 
                $ongkir = 15000;
                echo "Total : ". number_format(array_sum($grandtotal));
                echo "<br>";
                echo "ongkos Kirim ". number_format($ongkir);
                echo "<br>";
                $totalBarang = array_sum($grandtotal);
                $totalBarang += $ongkir;
                echo "Total Keseluruhan : ". number_format($totalBarang);
            ?>
                <br><br>
                <?php if(isset($_SESSION['status_login_user'])):?>
                <a href="transfer.php " ><button class="btn1">Buy</button></a>
                <?php else: ?>
                <a href="login_user.php"><button class="btn1">checkout</button></a>
                <?php endif ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </body> 
    </html>