<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Form Cuti';
kicked("admin");




if (isset($_GET['idjc'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM tbl_jc where id_jc = '$_GET[idjc]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tidak
  if (mysqli_num_rows($cekdata) > 0) {
    $isi_jns_cuti = $ada['nm_jc'];
    $isi_jml_cuti = $ada['jml_jc'];

    if (isset($_POST["Simpan"])) {
      $_POST = tambahSlashKiriman($_POST);
      $query = mysqli_query($conn, "UPDATE `tbl_jc` SET `nm_jc`='$_POST[jns_cuti]', `jml_jc`='$_POST[jml_cuti]' WHERE `id_jc` = '$_GET[idjc]'");
      if ($query) {
        header("location:" . $df['host'] . "admin/data-cuti.php");
      }
    }
  }
} else if (isset($_GET['didjc'])) {
  $query = mysqli_query($conn, "DELETE FROM `tbl_jc` WHERE `id_jc` = '$_GET[didjc]'");
  if (!$query) {
    echo "gratis";
  } else {
    header("location:" . $df['host'] . "admin/data-cuti.php");
    exit();
  }
} else {
  $isi_jns_cuti = '';
  $isi_jml_cuti = '';

  if (isset($_POST["Simpan"])) {

    $_POST = tambahSlashKiriman($_POST);
    $query = mysqli_query($conn, "INSERT INTO `tbl_jc` (`id_jc`, `nm_jc`, `jml_jc`) VALUES (NULL, '$_POST[jns_cuti]', '$_POST[jml_cuti]')");
    if (!$query) {
      echo "hai";
    } else {
      $_SESSION['notifikasi'] = 'NOT03';
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
      <!-- END LEFT SIDEBAR NAV-->
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
                <h5 class="breadcrumbs-title">Data Cuti</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'admin/'; ?>">Dashboard</a></li>
                  <!-- <li><a href="#">Tables</a></li> -->
                  <li><a href="<?= $df['host'] . 'admin/data-cuti.php'; ?>">Data Cuti</a></li>
                  <li class="active">Tambah Jenis Cuti</li>
                </ol>
              </div>
              <!-- <div class="col s2 m6 l6">
                  <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-activates="dropdown1">
                      <i class="material-icons hide-on-med-and-up">settings</i>
                      <span class="hide-on-small-onl">Settings</span>
                      <i class="material-icons right">arrow_drop_down</i>
                    </a>
                  <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!" class="grey-text text-darken-2">Access<span class="badge">1</span></a>
                    </li>
                    <li><a href="#!" class="grey-text text-darken-2">Profile<span class="new badge">2</span></a>
                    </li>
                    <li><a href="#!" class="grey-text text-darken-2">Notifications</a>
                    </li>
                  </ul>
                </div> -->
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
                <h4 class="header2">Tambah jenis cuti</h4>
                <div class="row">
                  <form method="POST" class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">domain</i>
                        <input id="name4" type="text" name="jns_cuti" class="validate" value="<?= $isi_jns_cuti; ?>">
                        <label for="jcuti">Jenis Cuti</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">add_circle</i>
                        <input id="total_cuti" type="number" name="jml_cuti" class="validate" value="<?= $isi_jml_cuti; ?>">
                        <label for="total_cuti">Jumlah cuti</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn blue waves-effect waves-light right" type="submit" name="Simpan">Submit
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
  <footer class="page-footer gradient-45deg-light-blue">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright ©
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> <a class="grey-text text-lighten-2" href="#" target="_blank">PT Angkasa Engineers Indonesia</a> All rights reserved.</span>
        <span class="right hide-on-small-only"> Design and Developed by <a class="grey-text text-lighten-2" href="#">Jumakri Ridho Fauzi</a></span>
      </div>
    </div>
  </footer>
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