<?php
session_start();
include('../config/config.php');

$verif = mysqli_query($connect, "UPDATE pembayaran 
                                SET status_bayar = '1' 
                                WHERE no_bayar='".$_GET['id']."'");

if($verif){
  echo "<script>alert('Verifikasi berhasil!'); </script>";
  echo "<script>location.href='histori_bayar.php';</script>";
}else{
  echo "<script>alert('Verifikasi gagal!'); </script>";
  echo "<script>location.href='bayar.php'; </script>";
}

?>