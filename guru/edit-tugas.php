<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/header.php' ?>
</head>
<?php 
	require "../config/config.php";
    session_start();
    
    $id_tugasprak = $_GET['id_tugasprak'];
    $sql = "SELECT * FROM tugas_prakarya WHERE id_tugasprak = '$id_tugasprak'";
    $conn = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($conn);

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
                            <h3>Edit Data Tugas Prakarya</h3>
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
                                        <form class="form form-vertical" method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="nama_tugasprak">Nama Tugas</label>
                                                            <input type="text" id="nama_tugasprak"
                                                                class="form-control" name="nama_tugasprak" 
                                                                value="<?php echo $row['nama_tugasprak'];?>" 
                                                                maxlength="20" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="deskripsi_tugasprak">Deskripsi Tugas</label>
                                                            <textarea class="form-control" id="deskripsi_tugasprak"
                                                                name="deskripsi_tugasprak" value="" 
                                                                rows="6" maxlength="50" required>
                                                                <?php echo $row['deskripsi_tugasprak'];?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="start_tugas">Tanggal Mulai</label>
                                                            <input type="date" id="start_tugas"
                                                                class="form-control" name="start_tugas" 
                                                                value="<?php echo $row['start_tugas'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="end_tugas">Tanggal Selesai</label>
                                                            <input type="date" id="end_tugas"
                                                                class="form-control" name="end_tugas" 
                                                                value="<?php echo $row['end_tugas'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end mt-5">
                                                        <button type="submit"class="btn btn-primary me-2 mb-1" 
                                                        name="submit" value="submit">Simpan</button>
                                                        <button type="button" class="btn btn-secondary me-2 mb-1" 
                                                        onclick="self.history.back()">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php 
                                            //syntax update
                                            if(isset($_POST['submit']))
                                            {
                                                // $id_tugasprak           = $_POST['id_tugasprak'];
                                                $nama_tugasprak         = $_POST['nama_tugasprak'];
                                                $deskripsi_tugasprak    = $_POST['deskripsi_tugasprak'];
                                                $start_tugas            = $_POST['start_tugas'];
                                                $end_tugas              = $_POST['end_tugas'];
                                                
                                                $query = "UPDATE tugas_prakarya
                                                        SET 
                                                            nama_tugasprak          = '$nama_tugasprak',
                                                            deskripsi_tugasprak     = '$deskripsi_tugasprak',
                                                            start_tugas             = '$start_tugas',
                                                            end_tugas               = '$end_tugas'
                                                        WHERE id_tugasprak = '$id_tugasprak'";

                                                $hasil = mysqli_query($connect, $query);

                                                echo "<script>alert('Tugas berhasil diperbarui !');</script>";
                                                echo "<script>location.href='tugas.php'</script>"; 
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