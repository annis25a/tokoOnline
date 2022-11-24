    <?php 
        // /* Cek Cookie */
        // if( isset($_COOKIE['id_pelanggan']) && isset($_COOKIE['key'])){
        //     /* Ambil id dan key */
        //     $id_pelanggan = $_COOKIE['id_pelanggan'];
        //     $key = $_COOKIE['key'];

        //     /* Ambil username berdasarkan id */
        //     $qry_login = mysqli_query($conn, "SELECT username FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
        //     /* kita ambil array dari hasil */
        //     $dt_login = mysqli_fetch_assoc($qry_login);

        //     /* Cek cookue dan username */
        //     if ($key === hash('sha256', $dt_login['username'])){
        //         /* jika benar boleh login */
        //         $_SESSION['status_login_user'] = true;
        //     }
        // }

        /* Cek apakah tombol login sudah ditekan atau belum */
        if (isset($_POST["login"])){
            
            /* Menamngkap Data  */
            $username = $_POST["username"];
            $password = $_POST["password"];

            /* Menghubungkan ke database */
            require  "../connection.php";


            /* Cek apakah ada username ditabase dengan username yang diinputkan */
            $qry_login=mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username'");

            /* Cek username */
            if(mysqli_num_rows($qry_login) > 0){
                /* Jalankan session */
                session_start();
            
                /* 
                mysqli_num_row : ada berapa baris dari fungsi SELECT. jika hasil = 1 cek password dibawah
                */

                /* Cek Password */
                /* Mengambil isi database */
                $dt_login=mysqli_fetch_assoc($qry_login);

                /* Menyamakan data */
                $_SESSION["id_pelanggan"]=$dt_login["id_pelanggan"];
                $_SESSION["nama"]=$dt_login["nama"];
                $_SESSION["username"]=$dt_login["username"];
                $_SESSION["alamat"]=$dt_login["alamat"];
                $_SESSION["telp"]=$dt_login["telp"];
                $_SESSION["status_login_user"]=true;


                header("location: home.php");

                
                // if(password_verify($password, $dt_login["password"])){
                //      /* 
                //     password_veify : cek sebuah string sama atau tidak dengan hash (StringBelumAcak, StringSudahAcak) 
                //     */

                //     /* Set session  */
                //     /* supaya user tidak dapat ke halaman lain sebelum login */
                //     $_SESSION["status_login_user"]=true;
                //     // jika berhasil login = true maka kita session dulu

                //     /* Cek Remember Me */
                //     if( isset($_POST['remember'])){
                //         /* Buat Cookie */
                //         setcookie('id_pelanggan', $dt_login['id_pelanggan'], time()+60);
                //         /* Mengambil id_pelanggan di tabel pelanggan */

                //         setcookie('key', hash('sha256', $dt_login['username']), time()+60);
                //         /* Hash Enkrpsi */
                //     }
                //      /* Jiak seleksi benar lempar ke home.php */
                //      header("Location: home.php");
                //      /* Memberhentikan script */
                //      exit;

                // } else{
                // echo "<script>alert('username dan password tidak benar'); location.href='login_user.php';</script>";
                // }
            } else{
                echo "<script>alert('username dan password tidak benar'); location.href='login.php';</script>";
        
            }
        }
        
    ?>