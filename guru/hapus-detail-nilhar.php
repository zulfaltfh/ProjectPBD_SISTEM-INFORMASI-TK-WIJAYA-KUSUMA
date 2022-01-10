<?php
// include database connection file
include_once("../config/config.php");
 
// Get id from URL to delete that user
 
// Delete user row from table based on given id
$result = mysqli_query($connect, "DELETE FROM terdiri WHERE id_nilai_harian = '".$_GET['id']."'");
 
// After delete redirect to Home, so that latest user list will be displayed.
  // echo "<script>alert('Hapus berhasil!'); </script>";
  echo "<script>location.href='detail-nilhar.php';</script>";
?>