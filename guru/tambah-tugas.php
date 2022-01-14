<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	require "../config/config.php";
    session_start();

    $query_tugas = "SELECT * FROM tugas_prakarya";
    $tabel_tugas = mysqli_query($connect, $query_tugas);
	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>

<body>

    <div id="app">
        <?php include '../layout/sidebar.php' ?>

        <div id="main" class='layout-navbar'>
            <?php include '../layout/navbar.php' ?>

            <div id="main-content">
              <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Tugas Prakarya</h3>
                        </div>
                    </div>
                </div>
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- <form class="form form-vertical" action="../proses/create/tambah-tugas-proses.php" method="POST"> -->
                                        <form class="form form-vertical" method="POST" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="nama_tugasprak">Nama Tugas</label>
                                                            <input type="text" id="nama_tugasprak" class="form-control" 
                                                            name="nama_tugasprak" maxlength="20" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="deskripsi_tugasprak">Deskripsi Tugas</label>
                                                            <textarea class="form-control" id="deskripsi_tugasprak" 
                                                            name="deskripsi_tugasprak" rows="3"
                                                             maxlength="50" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="start_tugas">Start Tugas</label>
                                                            <input type="date" id="start_tugas" 
                                                            class="form-control" name="start_tugas">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="end_tugas">Due Date</label>
                                                            <input type="date" id="end_tugas" 
                                                            class="form-control" name="end_tugas">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end mt-5">
                                                        <button type="submit" class="btn btn-primary me-2 mb-1" 
                                                            name="tambah" value="tambah">Tambah</button>
                                                        <button type="button" class="btn btn-secondary me-2 mb-1" 
                                                            onclick="self.history.back()">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if (isset($_POST['tambah'])){

                                                //values
                                                $nama_tugasprak         = $_POST['nama_tugasprak'];
                                                $deskripsi_tugasprak    = $_POST['deskripsi_tugasprak'];
                                                $start_tugas            = $_POST['start_tugas'];
                                                $end_tugas              = $_POST['end_tugas'];
                                            
                                                $sql = "INSERT INTO tugas_prakarya VALUES 
                                                    (null,'$nama_tugasprak','$deskripsi_tugasprak',
                                                    '$start_tugas','$end_tugas')";

                                                $hasil = mysqli_query($connect, $sql);

                                                if($hasil)
                                                {
                                                    echo "<script>alert('Tugas berhasil ditambahkan !');</script>";
                                                    echo "<script>location.href='tugas.php'</script>"; 
                                                }
                                                else 
                                                {
                                                    echo "<script>alert('Tugas gagal ditambahkan !');</script>";
                                                    echo "<script>window.location.href='tambah-tugas.php'</script>"; 
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
              </div>
              <?php include '../layout/footer.php'?>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/main.js"></script>
</body>
</body>
</html>
<?php
} else {
    header('location: ../index.php');
}
?>