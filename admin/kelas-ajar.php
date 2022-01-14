<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout-admin/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();
    
    if (isset($_SESSION['user_logged'])) {
?>
<body>
    <div id="app">
        <?php include "../layout-admin/sidebar.php" ?>

        <div id="main" class='layout-navbar'>
            <?php include "../layout-admin/navbar.php"; ?>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Daftar Kelompok Belajar</h3>
                            </div>
                            <div class="col-12 col-md order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a href="index_nilhar.php">Kelompok Belajar</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Borderless table start -->
                    <section class="section">
                        <div class="row" id="table-borderless">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <?php
                                                $db     = mysqli_query($connect, "SELECT * FROM kel_bel");
                                                $counter = 1;
                                            ?>
                                            <table class="table table-striped" id="table1">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Kelompok</th>
                                                        <th>Ruang Kelas</th>
                                                        <th>Pengajar</th>
                                                        <th>Tahun Ajaran</th>
                                                        <th>Tingkat TK</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($db as $result) :?>
                                                    <tr>
                                                        <td><?php echo $result['kelompokbel']; ?></td>
                                                        <td><?php echo $result['nama_ruang_kelas']; ?></td>
                                                        <td><?php echo $result['nama_peg']; ?></td>
                                                        <td><?php echo $result['tahunajar']; ?></td>
                                                        <td><?php echo $result['tingkatTK']; ?></td>
                                                        <td>
                                                            <a href="detail-kelas.php?id=<?php echo $result['kelompokbel'];?>"
                                                             class="btn btn-sm btn-primary">Lihat
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $counter++;
                                                        endforeach 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- table with no border -->
                                        
                                    </div>
                                </div>
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

    <!-- Include Choices JavaScript -->
    <script src="../assets/vendors/choices.js/choices.min.js"></script>

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