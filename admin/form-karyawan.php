<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Form Karyawan';
kicked("admin");




if (isset($_GET['nik'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM tbl_karyawan where NIK = '$_GET[nik]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tidak
  if (mysqli_num_rows($cekdata) > 0) {
    $isi_nik = $ada['NIK'];
    $isi_jbt = $ada['id_jbt'];
    $isi_nama = $ada['nm_karyawan'];
    $isi_tmpt_lahir = $ada['tmpt_lahir'];
    $isi_tgl_lahir = $ada['tgl_lahir'];
    $isi_almt = $ada['alamat'];
    $isi_jk = $ada['gender'];
    $isi_stt_nikah = $ada['status_nikah'];
    $isi_agama = $ada['agama'];
    $isi_stt_karyawan = $ada['status_karyawan'];
    $isi_pt = $ada['Pend_Terakhir'];
    $isi_email = $ada['Email'];
    $isi_password = $ada['Password'];

    if (isset($_POST["Simpan"])) {
      $_POST = tambahSlashKiriman($_POST);
      $query = mysqli_query($conn, "UPDATE `tbl_karyawan` SET `id_jbt`='$_POST[jbt]', `nm_karyawan`='$_POST[nama]', `tmpt_lahir`='$_POST[tmpt_lahir]', `tgl_lahir`='$_POST[tgl_lahir]', `alamat`='$_POST[almt]', `gender`='$_POST[jk]', `status_nikah`='$_POST[stt_nikah]', `agama`='$_POST[agama]', `status_karyawan`='$_POST[stt_karyawan]', `Pend_Terakhir`='$_POST[pt]', `Email`='$_POST[email]', `Password`='$_POST[password]' WHERE `NIK` = '$_GET[nik]'");
      if (!$query) {
        header("location:" . $df['host'] . "admin/data-karyawan.php");
      }
    }
  }
} else if (isset($_GET['dnik'])) {
  $isi_fdokumen = '';

  $query = mysqli_query($conn, "DELETE FROM `tbl_karyawan` WHERE `NIK` = '$_GET[dnik]'");
  if (!$query) {
    echo "gratis";
  } else {
    header("location:" . $df['host'] . "admin/data-karyawan.php");
    exit();
  }
} else {
  $isi_nik = '';
  $isi_jbt = '';
  $isi_nama = '';
  $isi_tmpt_lahir = '';
  $isi_tgl_lahir = '';
  $isi_almt = '';
  $isi_jk = '';
  $isi_stt_nikah = '';
  $isi_agama = '';
  $isi_stt_karyawan = '';
  $isi_pt = '';
  $isi_email = '';
  $isi_password = '';

  if (isset($_POST["Simpan"])) {

    $_POST = tambahSlashKiriman($_POST);
    $query = mysqli_query($conn, "INSERT INTO `tbl_karyawan` (`NIK`, `id_jbt`, `nm_karyawan`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `gender`, `status_nikah`, `agama`, `status_karyawan`, `Pend_Terakhir`, `Email`, `Password`) VALUES ('$_POST[nik]', '$_POST[jbt]', '$_POST[nama]', '$_POST[tmpt_lahir]', '$_POST[tgl_lahir]', '$_POST[almt]', '$_POST[jk]', '$_POST[stt_nikah]', '$_POST[agama]', '$_POST[stt_karyawan]', '$_POST[pt]', '$_POST[email]', '$_POST[password]')");
    if (!$query) {
      echo "hai";
    } else {
      header("location:" . $df['host'] . "admin/data-karyawan.php");
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
                <h5 class="breadcrumbs-title">Data Karyawan</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'admin/'; ?>">Dashboard</a></li>
                  <!-- <li><a href="#">Tables</a></li> -->
                  <li><a href="<?= $df['host'] . 'admin/data-karyawan.php'; ?>">Data Karyawan</a></li>
                  <li class="active">Tambah Data Karyawan</li>
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
                <h4 class="header2">Tambah data karyawan</h4>
                <div class="row">
                  <form method="POST" class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">chevron_right</i>
                        <input id="name4" type="text" name="nik" class="validate" value="<?= $isi_nik; ?>">
                        <label for="first_name">NIK</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name4" type="text" name="nama" class="validate" value="<?= $isi_nama; ?>">
                        <label for="first_name">Nama</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">people</i>
                        <select name="jbt">
                          <option value="" disabled selected>Pilih Jabatan</option>
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM jabatan");
                          for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                            <option value="<?= $Data['id_jbt']; ?>" <?php if ($isi_jbt == $Data['id_jbt']) {
                                                                      echo "selected";
                                                                    } ?>><?= $Data['nm_jbt'] . ' - ' . $Data['nm_dpt']; ?></option>
                          <?php } ?>
                        </select>
                        <label>Pilih Jabatan</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">stars</i>
                        <select name="stt_karyawan">
                          <option value="" disabled selected>Pilih Status Karyawan</option>
                          <option <?php if ($isi_stt_karyawan == "Active") {
                                    echo "selected";
                                  } ?>>Active</option>
                          <option <?php if ($isi_stt_karyawan == "Non-Active") {
                                    echo "selected";
                                  } ?>>Non-Active</option>
                        </select>
                        <label>Pilih Status Karyawan</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">bookmark</i>
                        <input id="tl" type="text" name="tmpt_lahir" class="validate" value="<?= $isi_tmpt_lahir; ?>">
                        <label for="tl">Tempat lahir</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">today</i>
                        <input id="ttl" type="date" name="tgl_lahir" class="" value="<?= $isi_tgl_lahir; ?>" required>
                        <!-- <label for="ttl">Tanggal Lahir</label> -->
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">wc</i>
                        <select name="jk">
                          <option value="" disabled selected>Pilih Jenis Kelamin</option>
                          <option <?php if ($isi_jk == "Pria") {
                                    echo "selected";
                                  } ?>>Pria</option>
                          <option <?php if ($isi_jk == "Wanita") {
                                    echo "selected";
                                  } ?>>Wanita</option>
                        </select>
                        <label>Pilih Jenis Kelamin</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">home</i>
                        <input id="address" type="text" name="almt" class="validate" value="<?= $isi_tgl_lahir; ?>">
                        <label for="address">Alamat</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">all_inclusive</i>
                        <select name="stt_nikah">
                          <option value="" disabled selected>Pilih Status nikah</option>
                          <option <?php if ($isi_stt_nikah == "Menikah") {
                                    echo "selected";
                                  } ?>>Menikah</option>
                          <option <?php if ($isi_stt_nikah == "Belum") {
                                    echo "selected";
                                  } ?>>Belum menikah</option>
                        </select>
                        <label>Pilih Status nikah</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">brightness_3</i>
                        <select name="agama">
                          <option value="" disabled selected>Pilih Agama</option>
                          <option <?php if ($isi_agama == "Islam") {
                                    echo "selected";
                                  } ?>>Islam</option>
                          <option <?php if ($isi_agama == "Protestan") {
                                    echo "selected";
                                  } ?>>Protestan</option>
                          <option <?php if ($isi_agama == "Katolik") {
                                    echo "selected";
                                  } ?>>Katolik</option>
                          <option <?php if ($isi_agama == "Hindu") {
                                    echo "selected";
                                  } ?>>Hindu</option>
                          <option <?php if ($isi_agama == "Budha") {
                                    echo "selected";
                                  } ?>>Budha</option>
                        </select>
                        <label>Pilih Agama</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">local_library</i>
                        <select name="pt">
                          <option value="" disabled selected>Pilih Pendidikan terakhir</option>
                          <option <?php if ($isi_pt == "SD") {
                                    echo "selected";
                                  } ?>>SD</option>
                          <option <?php if ($isi_pt == "SMP") {
                                    echo "selected";
                                  } ?>>SMP</option>
                          <option <?php if ($isi_pt == "SMA/SMK") {
                                    echo "selected";
                                  } ?>>SMA/SMK</option>
                          <option <?php if ($isi_pt == "D1") {
                                    echo "selected";
                                  } ?>>D1</option>
                          <option <?php if ($isi_pt == "D2") {
                                    echo "selected";
                                  } ?>>D2</option>
                          <option <?php if ($isi_pt == "D3") {
                                    echo "selected";
                                  } ?>>D3</option>
                          <option <?php if ($isi_pt == "D4") {
                                    echo "selected";
                                  } ?>>D4</option>
                          <option <?php if ($isi_pt == "S1") {
                                    echo "selected";
                                  } ?>>S1</option>
                          <option <?php if ($isi_pt == "S2") {
                                    echo "selected";
                                  } ?>>S2</option>
                          <option <?php if ($isi_pt == "S3") {
                                    echo "selected";
                                  } ?>>S3</option>
                        </select>
                        <label>Pilih Pendidikan terakhir</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="email4" type="email" name="email" class="validate" value="<?= $isi_email; ?>">
                        <label for="email">Email</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password5" type="password" name="password" class="validate" value="<?= $isi_password; ?>">
                        <label for="password">Password</label>
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