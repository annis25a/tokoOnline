
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Pembelian</title>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
      <link  rel="stylesheet" href="./css/navbarUser.css">
      <link  rel="stylesheet" href="./css/pembelian.css">

        <!-- Kit Font Awesome -->
        <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
  </head>
  <body>
      <?php
          include "navbar.php";
      ?>
      <section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="row g-0">
              <div class="col-md-4 gradient-custom text-center text-white"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <i class="far fa-edit mb-5"></i>
              </div>
              <div class="col-md-8">
              <?php 
                  include "../connection.php";
              ?>
                <div class="card-body p-4">
                  <h6>Information <?=$_SESSION['username']?></h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Name</h6>
                      <p class="text-muted"><?=$_SESSION['nama']?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Alamat</h6>
                      <p class="text-muted"><?=$_SESSION['alamat']?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Telephone</h6>
                      <p class="text-muted"><?=$_SESSION['telp']?></p>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

      <br></br>
      <div class="container">
          <div class="card">
              <div class="card-header">
                  <h3>History Pembelian Produk</h3>
              </div>
              <div class="card-body">
              <table class="table">
                  <thead>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal Transaksi</th>
                      <th scope="col">Tanggal Kedatangan</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga Satuan</th>
                      <th scope="col">Subtotal</th>
                      <th scope="col">Total Bayar</th>
                      <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                      include "../connection.php";
                      $query_pembelian = mysqli_query($conn, "SELECT * FROM transaksi 
                      where id_pelanggan = '".$_SESSION['id_pelanggan']."' ORDER BY id_transaksi DESC");
                      $no=0;
                      while($data_pembelian=mysqli_fetch_array($query_pembelian)){
                          $no++;
                      ?>
                      <tr>
                          <td><?=$no?></td>
                          <td><?=$data_pembelian['tgl_transaksi']?></td>
                          <td><?=$data_pembelian['tgl_datang']?></td>
                          <td>
                              <ol>
                              <?php
                              include "../connection.php";
                              $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                              JOIN produk p ON p.id_produk = d.id_produk WHERE
                                              id_transaksi = '".$data_pembelian['id_transaksi']."'");
                              while($data_detail = mysqli_fetch_array($query_detail)){
                                  echo "<li>".$data_detail['nama_produk']."</li>";
                              }
                              ?>
                              </ol>
                          </td>
                          <td>
                              <ul style="list-style: none;">
                              <?php
                              include "../connection.php";
                              $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                              JOIN produk p ON p.id_produk = d.id_produk WHERE
                                              id_transaksi = '".$data_pembelian['id_transaksi']."'");
                              while($data_detail = mysqli_fetch_array($query_detail)){
                                  echo "<li>".$data_detail['qty']."<li>";
                              }
                              ?>
                              </ul>
                          </td>
                          <td>
                              <ul style="list-style: none;">
                              <?php
                              include "../connection.php";
                              $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                              JOIN produk p ON p.id_produk = d.id_produk WHERE
                                              id_transaksi = '".$data_pembelian['id_transaksi']."'");
                              while($data_detail = mysqli_fetch_array($query_detail)){
                                  echo "<li>".($data_detail['subtotal']/$data_detail['qty'])."<li>";
                              }
                              ?>
                              </ul>
                          </td>
                          <td>
                              <ul style="list-style: none;">
                              <?php
                              include "../connection.php";
                              $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                              JOIN produk p ON p.id_produk = d.id_produk WHERE
                                              id_transaksi = '".$data_pembelian['id_transaksi']."'");
                              while($data_detail = mysqli_fetch_array($query_detail)){
                                  echo "<li>".$data_detail['subtotal']."</li>";
                              }
                              ?>
                              </ul>
                          </td>
                          <td>
                          <?php
                              include "../connection.php";
                              $query_bayar = mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                              WHERE id_transaksi = '".$data_pembelian['id_transaksi']."'");
                              $data_bayar = mysqli_fetch_array($query_bayar);
                              echo "<label class='alert alert-secondary'>Rp. ".$data_bayar['total']."</label>";
                              ?>
                          </td>
                          <?php
                          if ($data_pembelian['status'] == "New"):
                              ?>
                              <td><div class="alert alert-primary" role="alert"><?= $data_pembelian['status'] ?></div></td>
                          <?php
                          elseif ($data_pembelian['status'] == "Confirm"):
                              ?>
                              <td><div class="alert alert-info" role="alert"><?= $data_pembelian['status'] ?></div></td>
                          <?php
                          elseif ($data_pembelian['status'] == "Process"):
                              ?>
                              <td><div class="alert alert-warning" role="alert"><?= $data_pembelian['status'] ?></div></td>
                          <?php
                          elseif ($data_pembelian['status'] == "Done"):
                              ?>
                              <td><div class="alert alert-success" role="alert"><?= $data_pembelian['status'] ?></div></td>
                              <?php
                          elseif ($data_pembelian['status'] == "Receive"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_pembelian ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_pembelian['status'] ?></a>
                                </td>
                          <?php endif; ?>
                              <?php
                              include "../connection.php";
                              ?>

                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
              </div>
          </div>
      </div>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <br><br><br>
  </body>
  </html>

  <?php 
          include "footer.php";
  ?>