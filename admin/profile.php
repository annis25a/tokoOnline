
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
      <link  rel="stylesheet" href="./css/navbar.css">
      <link  rel="stylesheet" href="./css/pembelian.css">

        <!-- Kit Font Awesome -->
        <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
  </head>
  <body>
      <?php
          include "navbar.php";
      ?>
      <section class="vh-100" style="background-color: #white;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="row g-0">
              <div class="col-md-4 gradient-custom text-center text-white"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .8rem;">
                <img src="./assets/profil.png"
                  alt="Avatar" class="img-fluid my-5" style="width: 150px;" />
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
  </html>