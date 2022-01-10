<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();
    
    //ambil data dari db
    // $db1    = mysqli_query($connect, "SELECT * FROM nilai_harian WHERE id_nilai_harian = '".$_GET['id']."'");
    // $counter = 1;

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
                                <h3>Detail Nilai Siswa</h3>
                            </div>
                            <div class="col-12 col-md order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">..</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a href="index_nilhar.php">Penilaian Harian</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Nilai Harian Siswa</li>
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
                                                
                                                $db     = mysqli_query($connect, "SELECT * FROM detnilhar_vu WHERE id_nilai_harian = '".$_GET['id']."'");
                                                // $getID = $_GET['id'];
                                                $counter = 1;

                                            ?>
                                            <!-- <div class="table-responsive-sm">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <?php while($row = mysqli_fetch_array($db)) { ?>
                                                        <tr>
                                                            <td style="width: 5%;"><b>NIS</b></td>
                                                            <td class="text-center" style="width: 0%;"><b>:</b></td>
                                                            <td class="text-bold-500"><?php echo $row['noinduk_siswa']; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>  -->
                                            <!--Divider -->
                                            <div class="d-flex flex-row mb-4">
                                                <a href="tambah-detail-nilhar.php?id=<?php echo $getID;?>" class="btn btn-sm btn-primary">+ Tambah</a>
                                            </div>
                                            <table class="table table-striped" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kriteria Nilai</th>
                                                        <th>KKM</th>
                                                        <th>Skor</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($result = mysqli_fetch_array($db)) { ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo $result['nama_kriteria_harian']; ?></td>
                                                        <td><?php echo $result['nilai_kkm']; ?></td>
                                                        <td><?php echo $result['nilai_har']; ?></td>
                                                        <?php
                                                            if ($result['nilai_kkm'] <= $result['nilai_har']) {
                                                        ?>
                                                        <td class="btn-azure">Tuntas</td>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <td class="btn-azure">Tidak Tuntas</td>
                                                        <?php
                                                            } 
                                                        ?>
                                                        <td>
                                                            <a href="edit-detail-nilhar.php?id=<?php echo $result['id_kriteria_harian']; ?>" class="btn btn-sm btn-info">Edit</a>
                                                            <a href="hapus-detail-nilhar.php?id=<?php echo $result['id_nilai_harian']; ?>">
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                            </a>
                                                        </td>
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