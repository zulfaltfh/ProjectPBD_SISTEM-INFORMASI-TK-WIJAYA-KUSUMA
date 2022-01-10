<?php

    include_once('../config/config.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //proses tambah nilai harian
    if (isset($_POST['tambah'])){

        $noinduk_siswa          = $_POST['noinduk_siswa'];
        $tgl_ambil              = $_POST['tgl_ambil_nilai'];

        
        $insert = "INSERT INTO nilai_harian VALUES (null,'$noinduk_siswa','$tgl_ambil')";
        $hasil  = mysqli_query($connect, $insert);

        echo "<script>alert('Nilai berhasil ditambahkan !');</script>";
        echo "<script>location.href='../nilhar-siswa.php?id=$noinduk_siswa'</script>"; 
    }

    //proses tambah detail nilai harian
    if (isset($_POST['tambah1'])){

        $id_nilai_harian    = $_POST['id_nilai_harian'];
        $id_kriteria_harian = $_POST['id_kriteria_harian'];
        $nilai_kkm          = $_POST['nilai_kkm'];
        $nilai_har          = $_POST['nilai_har'];

        
        $insert = "INSERT INTO terdiri VALUES ('$id_nilai_harian','$id_kriteria_harian','$nilai_kkm','$nilai_har')";
        $hasil  = mysqli_query($connect, $insert);

        echo "<script>alert('Nilai berhasil ditambahkan !');</script>";
        echo "<script>location.href='detail-nilhar.php?id=$id_nilai_harian'</script>"; 
    }
    if (isset($_POST['add'])){

        $noinduk_siswa          = $_POST['noinduk_siswa'];
        $tgl_ambil              = $_POST['tgl_ambil_nilai'];
        $id_kriteria_bulanan    = $_POST['id_kriteria_bulanan'];
        $nilai_kkm              = $_POST['nilai_kkm'];
        $nilai_bul              = $_POST['nilai_bul'];

        
        $insert = "INSERT INTO penilaian_bul VALUES ('$noinduk_siswa','$id_kriteria_bulanan','$nilai_kkm','$nilai_bul','$tgl_ambil')";
        $hasil  = mysqli_query($connect, $insert);

        echo "<script>alert('Nilai berhasil ditambahkan !');</script>";
        echo "<script>location.href='../detail-nilbul.php?id=". $noinduk_siswa .".php'</script>"; 
    }
?>