<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout-admin/header.php' ?>
</head>
<?php 
	include "../config/config.php";
  session_start();

  //ambil data dari db
  $query = "SELECT * FROM siswa WHERE noinduk_siswa = '".$_GET['id']."'";
  $db = mysqli_query($connect, $query);
  $counter = 1;

  $data = $db->fetch_assoc();
 
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
                                <h3>Detail Siswa</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="kelas-ajar.php">Kelas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Siswa</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section id="multiple-column-form">
                      <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">NIS</label>
                                                        <input type="text" id="first-name-column" class="form-control" 
                                                        name="noinduk_siswa" readonly value="<?php echo $data['noinduk_siswa'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">NIK Wali Murid</label>
                                                        <input type="text" id="last-name-column" class="form-control" 
                                                        name="NIK_walmur" readonly value="<?php echo $data['NIK_walmur'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Nama Siswa</label>
                                                        <input type="text" id="last-name-column" class="form-control" 
                                                        name="nama_siswa" readonly value="<?php echo $data['nama_siswa'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Tanggal Lahir</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="tgllahir" readonly value="<?php echo $data['tgllahir'];?>"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Jenis Kelamin</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="jenis_kelamin" readonly value="<?php echo $data['jenis_kelamin']==0?"L":"P";?>"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Masuk</label>
                                                        <input type="text" id="email-id-column" class="form-control"
                                                            name="tgl_masuk" readonly value="<?php echo $data['tgl_masuk'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Alamat</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="alamat" readonly value="<?php echo $data['alamat'];?>"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Lulus</label>
                                                        <input type="text" id="email-id-column" class="form-control"
                                                            name="tgl_masuk" readonly value="<?php echo $data['tgl_lulus']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Anak ke</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="anak_ke" readonly value="<?=$data['anak_ke'];?>"> 
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
                <?php include "../layout-admin/footer.php" ?>
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