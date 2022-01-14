<?php
    $connect = mysqli_connect('localhost','root','','db_prakarya');

    if (!$connect) {
        die("Gagal koneksi ke database : ".mysqli_connect_error());
    }
?>