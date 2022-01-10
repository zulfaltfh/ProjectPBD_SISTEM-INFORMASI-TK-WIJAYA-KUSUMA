<?php
session_start();
include('../config/config.php');

$verif = mysqli_query($connect, "UPDATE siswa
                                SET status_daftar = '1' 
                                WHERE noinduk_siswa='".$_GET['id']."'");

if($verif){
  echo "<script>alert('Verifikasi berhasil!'); </script>";
  echo "<script>location.href='siswa.php';</script>";
}else{
  echo "<script>alert('Verifikasi gagal!'); </script>";
  echo "<script>location.href='registrasi.php'; </script>";
}

?>