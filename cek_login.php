<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include ('config/config.php');

if (isset($_SESSION['user_logged'])) {
	header('location: admin/dashboard.php');
}

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query 	= mysqli_query($connect, "SELECT * FROM pegawai WHERE nip_peg = '" . $username . "' AND password = '" . $password . "'");

	if (mysqli_num_rows($query) > 0) {
		$pegawai = mysqli_fetch_assoc($query);
		$nama = $pegawai['nama_peg'];
		$nip	= $pegawai['nip_peg'];
		$role = $pegawai['role'];

		$_SESSION['user_logged'] = true;
		$_SESSION['user_name'] = $pegawai['username'];
		$_SESSION['user_role'] = $pegawai['role'];
		$_SESSION['nama'] = $nama;
		$_SESSION['nip'] = $nip;

		if ($pegawai['role'] == 'guru') {
			header('location:guru/dashboard.php');
		} elseif ($pegawai['role'] == 'admin') {
			header('location:admin/dashboard.php');
		}

		
	} else {
		echo "<script>alert('Username atau Password anda salah!');history.go(-1);</script>";
	}
}
?>