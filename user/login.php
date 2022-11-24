<?php 
  /* Jalankan session */
  session_start();
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
    <link rel="stylesheet" href="./css/loginUser.css">

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

                <form method="POST" action="proses_login.php">
                  <p class="login">LOGIN ACCOUNT</p>

                  <!-- Username -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Username</label>
                    <input type="text" id="form2Example11" class="form-control"placeholder="username" name="username" required>
                  </div>

                  <!-- Password -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" class="form-control" name="password" required>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                  </div>

                  <!-- Button -->
                  <div class="text-center pt-1 mb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 " type="submit" name="login">Login</button>
                    <br>
                  </div>

                  <div class="d-flex align-items-center justify-content-center ">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="register.php">Create New</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 ">
              <img src="./assets/niacemide.jpeg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
