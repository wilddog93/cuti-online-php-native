<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Form Departement';
kicked("admin");




if (isset($_GET['iddpt'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM tbl_dpt where id_dpt = '$_GET[iddpt]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tidak
  if (mysqli_num_rows($cekdata) > 0) {
    $isi_nm_dept = $ada['nm_dpt'];

    if (isset($_POST["Simpan"])) {
      $_POST = tambahSlashKiriman($_POST);
      $query = mysqli_query($conn, "UPDATE `tbl_dpt` SET `nm_dpt`='$_POST[nm_dept]' WHERE `id_dpt` = '$_GET[iddpt]'");
      if ($query) {
        header("location:" . $df['host'] . "admin/data-dept.php");
      }
    }
  }
} else if (isset($_GET['diddpt'])) {
  $query = mysqli_query($conn, "DELETE FROM `tbl_dpt` WHERE `id_dpt` = '$_GET[diddpt]'");
  if (!$query) {
    echo "gratis";
  } else {
    header("location:" . $df['host'] . "admin/data-dept.php");
    exit();
  }
} else {
  $isi_nm_dept = '';

  if (isset($_POST["Simpan"])) {

    $_POST = tambahSlashKiriman($_POST);
    $query = mysqli_query($conn, "INSERT INTO `tbl_dpt` (`id_dpt`, `nm_dpt`) VALUES (NULL, '$_POST[nm_dept]')");
    if ($query) {
      header("location:" . $df['host'] . "admin/data-dept.php");
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->

<head>
  <?php include $backurl . 'config/head.php'; ?>
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START HEADER -->
  <?php include $backurl . 'admin/config/header.php'; ?>
  <!-- END HEADER -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <?php include $backurl . 'admin/config/sidebar.php'; ?>
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <section id="content">
        <!-- breadcrumbs start -->
        <div id="breadcrumbs-wrapper">
          <!-- Search for small screen -->
          <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
          </div>
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">Data Department</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'admin/'; ?>">Dashboard</a></li>
                  <!-- <li><a href="#">Tables</a></li> -->
                  <li><a href="<?= $df['host'] . 'admin/data-dept.php'; ?>">Data Department</a></li>
                  <li class="active">Tambah Data Department</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <div class="container">
          <div class="row">
            <!-- Form with validation -->
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Tambah data department</h4>
                <div class="row">
                  <form method="POST" class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">domain</i>
                        <input id="nama_dept" type="text" name="nm_dept" class="validate" value="<?= $isi_nm_dept; ?>">
                        <label for="nama_dept">Department</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn blue waves-effect waves-light right" type="submit" name="Simpan">Simpan
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Form end -->
          </div>
          <!-- //////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->
  </div>
  <!-- END MAIN -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START FOOTER -->
  <?php include_once($backurl . 'config/footer.php'); ?>
  <!-- END FOOTER -->
  <!-- ================================================
    Scripts
    ================================================ -->
  <!-- jQuery Library -->
  <script type="text/javascript" src="../assets/vendors/jquery-3.2.1.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="../assets/js/plugins.js"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="../assets/js/custom-script.js"></script>
</body>

</html>