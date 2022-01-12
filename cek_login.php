<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include ('config/config.php');

if (isset($_SESSION['user_logged'])) {
	header('location: admin/dashboard.php');
}

if (isset($_POST['login'])) {
	$username= $_POST['username'];
	$password = $_POST['password'];

	$query 	= mysqli_query($connect, "SELECT * FROM pegawai WHERE nip_peg = '" . $username . "' AND password = '" . $password . "'");

	if (mysqli_num_rows($query) > 0) {
		$user = mysqli_fetch_assoc($query);
		$nama = $user['nama_peg'];
		$nip	= $user['nip_peg'];
		$role = $user['role'];

		$_SESSION['user_logged'] = true;
		$_SESSION['user_name'] = $user['username'];
		$_SESSION['user_role'] = $user['role'];
		$_SESSION['nama'] = $nama;
		$_SESSION['nip'] = $nip;
		$_SESSION['role'] = $role;

		if ($user['role'] == 'guru') {
			header('location:guru/dashboard.php');
		} elseif ($user['role'] == 'admin') {
			header('location:admin/dashboard.php');
		}

		
	} else {
		echo "<script>alert('Username atau Password anda salah!');history.go(-1);</script>";
	}
}
?>