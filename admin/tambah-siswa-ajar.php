<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout-admin/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();


    $siswa      = "SELECT * FROM siswa WHERE noinduk_siswa NOT IN (SELECT noinduk_siswa FROM tergabung_dalam)";
    $db         = mysqli_query($connect,$siswa);
    
	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>

<body>

    <div id="app">
        <?php include '../layout-admin/sidebar.php' ?>

        <div id="main" class='layout-navbar'>
            <?php include '../layout-admin/navbar.php' ?>

            <div id="main-content">
              <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Siswa Ajar</h3>
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
                                                            <label for="tgl_ambil_nilai"><b>Kelompok Belajar</b></label>
                                                            <input type="text" id="tgl_ambil_nilai" class="form-control" 
                                                            name="kelompokbel" readonly value="<?php echo $_GET['id']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="noinduk_siswa"><b>NIS Siswa</b></label>
                                                            <fieldset class="form-group">
                                                              <select id="e1" style="width:100%;" name="noinduk_siswa" 
                                                                class="form-select" id="noinduk_siswa" required>
                                                                    <option value="">---- Pilih Siswa ----</option>
                                                                    <?php 
                                                                        while ($data=mysqli_fetch_array($db)) {
                                                                    ?>
                                                                        <option value="<?php echo $data['noinduk_siswa']; ?>">
                                                                            <?php echo $data['noinduk_siswa']; ?>
                                                                        </option>
                                                                    <?php
                                                                        }
                                                                    ?>                                                                
                                                              </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end mt-5">
                                                        <button type="submit" class="btn btn-primary me-2 mb-1" 
                                                        name="submitt" value="submitt">Tambah</button>
                                                        <button type="button" class="btn btn-secondary me-2 mb-1" 
                                                        onclick="self.history.back()">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php

                                          if(isset($_POST['submitt'])){

                                            $noinduk_siswa = $_POST['noinduk_siswa'];
                                            $kelbel        = $_POST['kelompokbel'];

                                            $insert = "INSERT INTO tergabung_dalam VALUES ('$noinduk_siswa','$kelbel')";
                                            $db = mysqli_query($connect, $insert);

                                            echo "<script>alert('Siswa berhasil ditambahkan !');</script>";
                                            echo "<script>location.href='detail-kelas.php?id=$kelbel'</script>";
                                          }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
              </div>
              <?php include '../layout-admin/footer.php'?>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
    <!-- Include Choices JavaScript -->
    <script src="../assets/vendors/choices.js/choices.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</body>
</html>
<?php
} else {
    header('location: ../index.php');
}
?>