<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();
    
    //ambil data dari db
    $nip = $_SESSION['nip'];
    $query = "SELECT * FROM siswa_vu WHERE nip_peg = '$nip'";

    $db = mysqli_query($connect, $query);
    $counter = 1;

	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>
<body>
    <div id="app">
        <?php include "../layout/sidebar.php" ?>

        <div id="main" class='layout-navbar'>
            <?php include "../layout/navbar.php"; ?>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Daftar Raport Siswa</h3>
                            </div>
                            <div class="col-12 col-md order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Raport</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead class="text-center">
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Tingkat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($result = mysqli_fetch_array($db)) {  
                                        ?>
                                            <tr>
                                                <td><?php echo $result['noinduk_siswa']; ?></td>
                                                <td><?php echo $result['nama_siswa']; ?></td>
                                                <td><?php echo $result['nama_ruang_kelas']; ?></td>
                                                <td><?php echo $result['tahunajar']; ?></td>
                                                <td><?php echo $result['tingkatTK']; ?></td>
                                                <td><a href="detail-raport.php?id=<?php echo $result['noinduk_siswa']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
                                            </tr>
                                        <?php } ?>
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

    <!-- Include Choices JavaScript -->
    <!-- <script src="../assets/vendors/choices.js/choices.min.js"></script> -->

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