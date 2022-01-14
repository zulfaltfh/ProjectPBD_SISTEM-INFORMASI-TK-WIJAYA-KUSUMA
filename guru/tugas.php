<?php 
	include "../config/config.php";
    session_start();
    
    //ambil data dari db
    $db = mysqli_query($connect, "SELECT * FROM tugas_prakarya ORDER BY id_tugasprak");
    $counter = 1;

	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>

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
                                <h3>Daftar Tugas Prakarya</h3>
                            </div>
                            <div class="col-12 col-md order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../guru/dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Tugas</li>
                                        <li class="breadcrumb-item active" aria-current="page">Tugas Prakarya</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row-reverse mb-4">
                                    <a href="tambah-tugas.php" class="btn btn-sm btn-primary">+ Tambah Tugas</a>
                                </div>
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Tugas</th>
                                            <th>Nama Tugas</th>
                                            <th>Deskripsi Tugas</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                               while($result = mysqli_fetch_assoc($db)) {     
                                        ?>
                                            <tr>
                                                <td><?php echo $result['id_tugasprak']; ?></td>
                                                <td><?php echo $result['nama_tugasprak']; ?></td>
                                                <td><?php echo $result['deskripsi_tugasprak']; ?></td>
                                                <td><?php echo $result['start_tugas']; ?></td>
                                                <td><?php echo $result['end_tugas']; ?></td>
                                                <td>
                                                    <a href="edit-tugas.php?id_tugasprak=<?php echo $result['id_tugasprak']; ?>" 
                                                        class="btn btn-sm btn-info">Edit
                                                    </a>
                                                    <a href="hapus-tugas.php?id=<?php echo $result['id_tugasprak']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                    </a>
                                                </td>
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