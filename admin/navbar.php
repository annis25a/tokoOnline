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
                    <a class="nav-link" href="data_penjualan.php">Sales Data</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="data_produk.php">Product Data</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="data_pelanggan.php">User Data</a>
                </li>

                
            
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['status_login_admin'])):?>
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
