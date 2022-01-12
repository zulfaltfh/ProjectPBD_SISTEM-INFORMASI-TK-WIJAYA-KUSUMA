<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout-admin/header.php' ?>
</head>
<?php 
	  include "../config/config.php";
    session_start();

    //ambil data dari db
    $query = "SELECT * FROM pegawai";
    $db = mysqli_query($connect, $query);
    $counter = 1;

	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>
<body>
    <div id="app">
        <?php include "../layout-admin/sidebar.php" ?>

        <div id="main" class='layout-navbar'>
            <?php include "../layout-admin/navbar.php" ?>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Pegawai</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Email</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($db as $guru): ?>
                                            <tr>
                                                <td><?php echo $guru['nip_peg']?></td>
                                                <td><?php echo $guru['nama_peg']?></td>
                                                <td class="text-center"><?php echo $guru['jk_peg']==0?"L":"P"?></td>
                                                <td><?php echo $guru['alamat_peg']?></td>
                                                <td><?php echo $guru['notelp_peg']?></td>
                                                <td><?php echo $guru['email_peg']?></td>
                                                <td><?php echo $guru['tglmasuk_peg']?></td>
                                                <td><?php echo $guru['role']?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                
                <?php include "../layout-admin/footer.php" ?>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="../assets/js/main.js"></script>
</body>
</html>
<?php
} else {
    header('location: ../index.php');
}
?>