<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Sisa Cuti';
kicked("karyawan");

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
          <!-- breadcrumbs start -->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Sisa Cuti</h5>
                  <ol class="breadcrumbs">
                    <li><a href="<?= $df['host'] . 'karyawan/'; ?>">Dashboard</a></li>
                    <!-- <li><a href="#">Tables</a></li> -->
                    <li class="active">Sisa Cuti</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
        </div>
        <!--end container-->
        <!--start container-->
        <div class="container">
          <!--Responsive Table-->
          <div class="divider"></div>
          <div id="responsive-table">
            <div class="row">
              <div class="col s12">
                <table class="responsive-table highlight centered">
                  <thead>
                    <tr>
                      <th data-field="no">No</th>
                      <th data-field="nama">Nama lengkap</th>
                      <th data-field="jenis-cuti">Jenis cuti</th>
                      <th data-field="tgl-pengajuan">Cuti Diambil</th>
                      <th data-field="tgl-pengajuan">Sisa cuti</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM sisa_cuti  WHERE NIK='$_SESSION[NIK]'");
                    for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>


                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $Data['nm_karyawan']; ?></td>
                        <td><?= $Data['nm_jc']; ?></td>
                        <td><?= $Data['lama_cuti']; ?></td>
                        <td><?= $Data['sisa_cuti']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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