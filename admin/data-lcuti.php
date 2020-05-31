<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Data Laporan Cuti';
kicked("admin");


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
                <h5 class="breadcrumbs-title">Laporan Cuti</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'admin/'; ?>">Dashboard</a></li>
                  <!-- <li><a href="#">Tables</a></li> -->
                  <li class="active">Laporan Cuti</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <!--start container-->
        <div class="container">
          <div class="row">
            <!-- Form with validation -->
            <form method="POST" class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Laporan cuti karyawan</h4>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col m6">
                        <i class="material-icons prefix">chevron_right</i>
                        <input id="nik" type="text" name="NIK" class="validate" value="<?= isset($_POST['NIK']) ? $_POST["NIK"] : ""; ?>">
                        <label for="nik">NIK</label>
                      </div>

                      <div class="row">
                        <div class="input-field col s12 m6">
                          <button class="btn blue waves-effect waves-light" type="submit" name="Cari" data-action="search-cuti">Cari <i class="material-icons right">search</i></button>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 inline-flex">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nama" type="text" name="nama" class="validate" value="<?= isset($_POST['nama']) ? $_POST["nama"] : ""; ?>">
                        <label for="nama">Nama</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col m6 inline-flex">
                        <i class="material-icons prefix">today</i>
                        <input id="tgl-mulai" type="text" name="periode" class="datepicker" value="<?= isset($_POST['periode']) ? $_POST["periode"] : ""; ?>">
                        <label for="tgl-mulai">Periode</label>
                      </div>

                      <div class="input-field col m6 inline-flex">
                        <i class="material-icons prefix">today</i>
                        <input id="tgl-akhir" type="text" name="sampai" class="datepicker" value="<?= isset($_POST['sampai']) ? $_POST["sampai"] : ""; ?>">
                        <label for="tgl-akhir">Sampai</label>
                      </div>
                    </div>

                    <!-- <div class="row">
                        <div class="input-field col s12">
                          <button class="btn blue waves-effect waves-light right" type="submit" name="action">Simpan
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div> -->
                  </form>
                </div>
                <form method="POST" action="export/export.php" class="row">

                  <?php
                  echo isset($_POST['NIK']) && $_POST['NIK'] != '' ? "<input type='hidden' name='NIK' value='$_POST[NIK]'>" : "";
                  echo isset($_POST['nama']) && $_POST['nama'] != '' ? "<input type='hidden' name='nama' value='$_POST[nama]'>" : "";
                  echo isset($_POST['periode']) && $_POST['periode'] != '' ? "<input type='hidden' name='periode' value='$_POST[periode]'>" : "";
                  echo isset($_POST['sampai']) && $_POST['sampai'] != '' ? "<input type='hidden' name='sampai' value='$_POST[sampai]'>" : "";
                  ?>
                  <div class="input-field col s12 center">
                    <button class="btn blue waves-effect waves-light" type="submit" name="action">Print
                      <i class="material-icons right">picture_as_pdf</i>
                    </button>
                  </div>
                </form>

                <div id="responsive-table">
                  <div class="row">
                    <div class="col s12">
                      <table class="responsive-table highlight centered">
                        <thead>
                          <tr>
                            <th data-field="no">No</th>
                            <th data-field="nama">Nama Karyawan</th>
                            <th data-field="jenis_cuti">Jenis cuti</th>
                            <th data-field="tgl-mulai">Tanggal mulai</th>
                            <th data-field="tgl-selesai">Tanggal selesai</th>
                            <th data-field="ket-cuti">Keterangan</th>
                            <th data-field="status-cuti">Status cuti</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $cari_nik = isset($_POST['NIK']) && $_POST['NIK'] != '' ? " AND NIK LIKE '%$_POST[NIK]%'" : "";
                          $cari_nm_karyawan = isset($_POST['nama']) && $_POST['nama'] != '' ? " AND nm_karyawan LIKE '%$_POST[nama]%'" : "";
                          $cari_tgl_mulai = isset($_POST['periode']) && $_POST['periode'] != '' ? " AND tgl_mulai>='$_POST[periode]'" : "";
                          $cari_tgl_selesai = isset($_POST['sampai']) && $_POST['sampai'] != '' ? " AND tgl_selesai<='$_POST[sampai]'" : "";

                          $sql = mysqli_query($conn, "SELECT * FROM cuti WHERE stt_cuti!='proses' $cari_nik $cari_nm_karyawan $cari_tgl_mulai $cari_tgl_selesai");
                          for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                            <tr>
                              <td><?= $i; ?></td>
                              <td><?= $Data['nm_karyawan']; ?></td>
                              <td><?= $Data['nm_jc']; ?></td>
                              <td><?= $Data['tgl_mulai']; ?></td>
                              <td><?= $Data['tgl_selesai']; ?></td>
                              <td><?= $Data['ket']; ?></td>
                              <td>
                                <?php if ($Data['stt_cuti'] == 'terima') { ?>
                                  <a class="waves-effect waves-light btn green lighten-1">Terima</a>
                                <?php } else { ?>
                                  <a class="waves-effect waves-light btn red darken-1">Tolak</a>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                      <!-- <div class="row">
                          <div class="input-field col s12 center">
                            <button class="btn blue waves-effect waves-light" type="submit" name="action">Print
                              <i class="material-icons right">picture_as_pdf</i>
                            </button>
                          </div>
                        </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </form>
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