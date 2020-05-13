<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Home Karyawan';
kicked("karyawan");


$ada = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_cuti) AS hasil FROM tbl_cuti WHERE NIK='$_SESSION[NIK]' AND stt_cuti='proses'"));
$isi_stt_cuti = $ada['hasil'];

$ada = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_cuti) AS hasil FROM tbl_cuti WHERE NIK='$_SESSION[NIK]'"));
$isi_cuti = $ada['hasil'];
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
  <?php include $backurl . 'karyawan/config/header.php'; ?>
  <!-- END HEADER -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <?php include $backurl . 'karyawan/config/sidebar.php'; ?>
      <!-- END LEFT SIDEBAR NAV-->
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <section id="content">
        <!--start container-->
        <div class="container">
          <!--card stats start-->
          <div id="card-stats">
            <div class="row mt-1">

              <div class="col s12 m6 ">
                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">card_travel</i>
                      <p>Status Cuti</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0"><?= $isi_stt_cuti; ?></h5>
                      <p class="no-margin">Pengajuan</p>
                      <!-- <p>1,12,900</p> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col s12 m6 ">
                <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">people</i>
                      <p>Riwayat Cuti</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0"><?= $isi_cuti; ?></h5>
                      <p class="no-margin">Pengajuan</p>
                      <!-- <p>$25,000</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
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