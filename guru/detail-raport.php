<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();
    
    //ambil data dari db
    $query = "SELECT * FROM siswa_vu WHERE noinduk_siswa = '".$_GET['id']."'";
    $db = mysqli_query($connect, $query);
    $counter = 1;

    // $kriteria = mysqli_query($connect, "SELECT p.tgl_ambil_nilai, k.id_kriteria_harian, k.nama_kriteria_harian, p.nilai_kkm, p.nilai_har 
    //                             FROM penilaian_har p, kriteria_nilai_harian k 
    //                             WHERE k.id_kriteria_harian = p.id_kriteria_harian 
    //                             AND p.noinduk_siswa = '".$_GET['id']."'");
    // $noinduk = $_GET['id'];
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
                                <h3>Riwayat Raport Siswa</h3>
                            </div>
                            <div class="col-12 col-md order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">..</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a href="raport.php">Raport</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Riwayat Rapot SIswa</li>
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
                                            <div class="table-responsive-sm">
                                                <?php 
                                                    while($row = mysqli_fetch_array($db)) {  
                                                ?>
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 5%;"><b>NIS</b></td>
                                                            <td class="text-center" style="width: 0%;"><b>:</b></td>
                                                            <td class="text-bold-500"><?php echo $row['noinduk_siswa']; ?></td>
                                                            <td style="width: 15%;"><b>Tahun Ajaran</b></td>
                                                            <td class="text-center" style="width: 0%;"><b>:</b></td>
                                                            <td class="text-bold-500"><?php echo $row['tahunajar']; ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 5%;"><b>Nama</b></td>
                                                            <td class="text-center" style="width: 0%;"><b>:</b></td>
                                                            <td class="text-bold-500"><?php echo $row['nama_siswa']; ?></td>
                                                            <td style="width: 15%;"><b>Tingkat TK</b></td>
                                                            <td class="text-center" style="width: 0%;"><b>:</b></td>
                                                            <td class="text-bold-500"><?php echo $row['tingkatTK']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 5%;"><b>Kelas</b></td>
                                                            <td class="text-center" style="width: 0%;"><b>:</b></td>
                                                            <td class="text-bold-500"><?php echo $row['nama_ruang_kelas']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php } ?>
                                            </div>
                                            <hr> <!-- Divider -->
                                            <?php
                                                $db1 = mysqli_query($connect, "SELECT * FROM raport WHERE noinduk_siswa = '".$_GET['id']."'");
                                                
                                            ?>
                                            <div class="d-flex flex-row mb-4">
                                                <a href="tambah-nilhar.php?id=<?php echo $_GET['id'];?>" class="btn btn-sm btn-primary">+ Tambah</a>
                                            </div>
                                            <table class="table table-striped" id="table1">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Tanggal Ambil</th>
                                                        <th>Catatan Rapor</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        while($result = mysqli_fetch_assoc($db1)) {  
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $result['tgl_ambil']; ?></td>
                                                            <td><?php echo $result['cat_rapor']; ?></td>
                                                            <td><a href="edit-raport.php?id=<?php echo $result['id_rapor']; ?>" class="btn btn-sm btn-info">Edit</a></td>
                                                        </tr>
                                                    <?php
                                                        $counter++; 
                                                        } 
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
                
                <?php include "../layout/footer.php" ?>
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