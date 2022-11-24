<?php 
    /* Cek jika tombol regrister sudah ditekan */
    if( isset($_POST["register"])){

        if(($_POST) > 0){
            echo "<script>
                    alert('user baru berhasil ditambahkan');
                    location.href='login.php';
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login User</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/RegisterUser.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap" rel="stylesheet">
</head>
<body >
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="./assets/logo somethinc2.jpeg" style="width: 185px;" alt="logo">
                    <div class= "judul">
                      <h4 class="mt-1 mb-5 pb-1">somethinc</h4>
                    </div>
                </div>

                <form method="POST" action="proses_register.php">
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- name -->
                  <input type="text" class="form-control my-2 p-2" name="nama" placeholder="Name" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- alamat -->
                  <textarea name="alamat" class="form-control my-2 p-2" rows="3" placeholder="Address" required></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- No.telp -->
                  <input type="tel" class="form-control my-2 p-2" name="telp" placeholder="Telp" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- Username -->
                  <input type="text" class="form-control my-2 p-2" name="username" placeholder="Username" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- Password -->
                  <input type="password" class="form-control my-2 p-2" name="password" placeholder="********" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- Password -->
                  <input type="password" class="form-control my-2 p-2" name="password2" placeholder="********" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <!-- button -->
                  <button type="submit" class="btn1 mb-4">Register</button>
                </div>
              </div>
              <p>have an account?<a href="login.php">Login</a></p>
            </form>

              </div>
            </div>
            <div class="col-lg-6 ">
              <img src="./assets/login1.webp" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
