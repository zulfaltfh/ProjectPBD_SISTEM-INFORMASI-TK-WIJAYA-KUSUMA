<?php
// include database connection file
include_once("../config/config.php");

if(isset($_GET['id'])){
  // Delete user row from table based on given id
  $result = mysqli_query($connect, "DELETE FROM terdiri WHERE id_kriteria_harian = '".$_GET['id']."'");
 
  // After delete redirect to Home, so that latest user list will be displayed.
  echo "<script>location.href='index_nilhar.php';</script>";
}
?>