<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	include "../config/config.php";
    session_start();

    $id_rapor = $_GET['id'];
    $query      = "SELECT * FROM raport WHERE id_rapor = '$id_rapor'";
    $db         = mysqli_query($connect,$query);

    $row = mysqli_fetch_assoc($db);
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
                            <h3>Edit Isi Raport</h3>
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
                                                            <label for="tgl_ambil_nilai"><b>No Raport</b></label>
                                                            <input type="text" id="tgl_ambil_nilai" class="form-control" 
                                                            name="id_rapor" readonly value="<?php echo $id_rapor; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tgl_ambil_nilai"><b>NIS</b></label>
                                                            <input type="text" id="tgl_ambil_nilai" class="form-control" 
                                                            name="noinduk_siswa" readonly value="<?php echo $row['noinduk_siswa']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tgl_ambil_nilai"><b>Tanggal Ambil</b></label>
                                                            <input type="date" id="tgl_ambil_nilai" class="form-control" 
                                                            name="tgl_ambil" value="<?php echo $row['tgl_ambil']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="dark"><b>Catatan Raport</b></label>
                                                            <textarea class="form-control" id="cat_rapor" name="cat_rapor" rows="3" 
                                                            maxlength="100" required><?php echo $row['cat_rapor']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end mt-5">
                                                        <button type="submit" class="btn btn-primary me-2 mb-1" name="simpan" value="simpan">Simpan</button>
                                                        <button type="button" class="btn btn-secondary me-2 mb-1" onclick="self.history.back()">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                          if(isset($_POST['simpan'])){

                                            $noinduk_siswa = $_POST['noinduk_siswa'];
                                            $catatan = $_POST['cat_rapor'];
                                            $tanggal = $_POST['tgl_ambil'];
                                            
                                            $update = "UPDATE raport
                                                        SET
                                                            cat_rapor = '$catatan',
                                                            tgl_ambil = '$tanggal'
                                                        WHERE id_rapor = '$id_rapor'";
                                            $hasil = mysqli_query($connect,$update);

                                            echo "<script>alert('Raport berhasil diperbarui !');</script>";
                                            echo "<script>location.href='detail-raport.php?id=$noinduk_siswa'</script>";
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
    <script src="../assets/vendors/jquery/jquery.min.js"></script>
    <script src="../assets/vendors/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendors/tinymce/plugins/code/plugin.min.js"></script>
    <script>
        tinymce.init({ selector: '#default' });
        tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
    </script>

    <script src="../assets/js/main.js"></script>
</body>
</body>
</html>
<?php
} else {
    header('location: ../index.php');
}
?>