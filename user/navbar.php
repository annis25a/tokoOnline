<?php
    session_start();
?>

    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="home.php"> somethinc </a>
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="product.php">Product</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item mt-2">
                <div class="searchbar">
                    <form method="POST" action="product.php" class="d-flex">
                        <input class="search px-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-sm">Search</button>
                    </form>
                </div>
            </li>

            <?php if(isset($_SESSION['status_login_user'])):?>
                <li class="nav-item mt-2">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></i></a>
                </li>
                <li class="nav-item mt-1">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif ?>
        </ul>
        </div>
    </div>
    </nav>
