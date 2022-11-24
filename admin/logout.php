<?php 
    /*Jalankan Session */
    session_start();

    /*    */
    $_SESSION = [];

    /* Menghilangkan session */
    session_unset();

    /* Berhentikan Session  */
    session_destroy();


    /* Set cookie */
    setcookie('id', '', time() - 3600);
    /* set cookie dengan nama yang sama dengan nilai yang sama dengan waktu expiredwaktu yang  */
    setcookie('key', '', time() - 3600);


    /* Lempar user ke login jika user logout  */
    header("Location: login.php");
    exit;
?>