<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout-guru/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();

    // $kriteria   = "SELECT * FROM kriteria_nilai_bulanan";
    // $db2        = mysqli_query($connect,$kriteria);

    $query      = "SELECT * FROM siswa_vu WHERE noinduk_siswa = '".$_GET['id']."'";
    $db         = mysqli_query($connect,$query);
    $siswa      = $db->fetch_assoc();
    $id         = $siswa['noinduk_siswa'];

	// cek apakah yang mengakses halaman ini sudah login
    if (isset($_SESSION['user_logged'])) {
?>

<body>

    <div id="app">
        <?php include '../layout-guru/sidebar.php' ?>

        <div id="main" class='layout-navbar'>
            <?php include '../layout-guru/navbar.php' ?>

            <div id="main-content">
              <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Nilai Bulanan</h3>
                        </div>
                        <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../guru/dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Tugas</li>
                                    <li class="breadcrumb-item"><a href="../guru/tugas.php">Tugas Prakarya</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Tugas</li>
                                </ol>
                            </nav>
                        </div> -->
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
                                        <form class="form form-vertical" action="proses-tambah.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tgl_ambil_nilai"><b>NIS</b></label>
                                                            <input type="text" id="tgl_ambil_nilai" class="form-control" name="noinduk_siswa" readonly value="<?php echo $id; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tgl_ambil_nilai"><b>Tanggal</b></label>
                                                            <input type="date" id="tgl_ambil_nilai" class="form-control" name="tgl_ambil_nilai">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="nama_kriteria_bulanan"><b>Kriteria Nilai</b></label>
                                                            <fieldset class="form-group">
                                                              <select id="e1" style="width:100%;" name="id_kriteria_bulanan" class="form-select" id="nama_kriteria_bulanan" required>
                                                                  <option value="">---- Pilih Kriteria Penilaian ----</option>
                                                                  <?php 
                                                                      $kriteria = $connect->query("SELECT * FROM kriteria_nilai_bulanan");
                                                                      while ($data=mysqli_fetch_array($kriteria)) {
                                                                  ?>
                                                                    <option value="<?php echo $data['id_kriteria_bulanan']; ?>"><?php echo $data['nama_kriteria_bulanan']; ?></option>
                                                                  <?php
                                                                      }
                                                                  ?>                                                                
                                                              </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="nilai_kkm"><b>KKM</b></label>
                                                            <input type="text" id="nilai_kkm" class="form-control" name="nilai_kkm">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="nilai_bul"><b>Skor</b></label>
                                                            <input type="text" id="nilai_bul" class="form-control" name="nilai_bul">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end mt-5">
                                                        <button type="submit" class="btn btn-primary me-2 mb-1" name="tambah2" value="tambah2">Tambah</button>
                                                        <button type="button" class="btn btn-secondary me-2 mb-1" onclick="self.history.back()">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
              </div>
              <?php include '../layout-guru/footer.php'?>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
    <!-- Include Choices JavaScript -->
    <script src="assets/vendors/choices.js/choices.min.js"></script>

    <script src="../assets/js/main.js"></script>
</body>
</body>
</html>
<?php
} else {
    header('location: ../index.php');
}
?>