<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout-admin/header.php' ?>
</head>
<?php 
	include "../config/config.php";

    //ambil data dari db
    $query = "SELECT * FROM pembayaran_vu WHERE status_bayar = '0'";
    $db = mysqli_query($connect, $query);
    $counter = 1;

    session_start();
 
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
                                <h3>Data Pembayaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
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
                                            <th>No Bayar</th>
                                            <th>NIS</th>
                                            <th>Jenis</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($db as $pembayaran): ?>
                                            <tr>
                                                <td><?php echo $pembayaran['no_bayar']?></td>
                                                <td><?php echo $pembayaran['noinduk_siswa']?></td>
                                                <td><?php echo $pembayaran['nama_jenis']?></td>
                                                <td><?php echo $pembayaran['tgl_bayar']?></td>
                                                <td><?php echo $pembayaran['jumlah_bayar']?></td>
                                                <td>
                                                    <a href="verif.php?id=<?php echo $pembayaran['no_bayar'];?>" 
                                                    class="btn btn-success btn-block btn-sm shadow-lg mt-0 ">VERIFY</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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