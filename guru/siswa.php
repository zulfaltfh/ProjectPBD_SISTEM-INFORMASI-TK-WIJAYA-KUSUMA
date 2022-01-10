<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	include "../config/config.php";

    //ambil data dari db
    $query = "SELECT * FROM siswa";
    $db = mysqli_query($connect, $query);
    $counter = 1;

    session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>
<body>
    <div id="app">
        <?php include "../layout/sidebar.php" ?>

        <div id="main" class='layout-navbar'>
            <?php include "../layout/navbar.php" ?>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Siswa</h3>
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
                                            <th>NIS</th>
                                            <th>Walimurid</th>
                                            <th>Nama Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Lahir</th>
                                            <th>Masuk</th>
                                            <th>Lulus</th>
                                            <th>Alamat</th>
                                            <th>Anak ke</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($db as $siswa): ?>
                                            <tr>
                                                <td class="text-wrap"><?php echo $siswa['noinduk_siswa']?></td>
                                                <td><?php echo $siswa['NIK_walmur']?></td>
                                                <td><?php echo $siswa['nama_siswa']?></td>
                                                <td><?php echo $siswa['jenis_kelamin']==0?"L":"P"?></td>
                                                <td><?php echo $siswa['tgllahir']?></td>
                                                <td><?php echo $siswa['tgl_masuk']?></td>
                                                <td><?php echo $siswa['tgl_lulus']?></td>
                                                <td><?php echo $siswa['alamat']?></td>
                                                <td class="text-center"><?php echo $siswa['anak_ke']?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
                
                <?php include "../layout/footer.php" ?>
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