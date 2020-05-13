<aside id="left-sidebar-nav">
  <ul id="slide-out" class="side-nav fixed leftside-navigation">
    <li class="user-details cyan darken-2">
      <div class="row">
        <div class="col col s4 m4 l4">
          <img src="../assets/images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
        </div>
        <div class="col col s8 m8 l8">
          <ul id="profile-dropdown-nav" class="dropdown-content">
            <li>
              <a href="<?= $df['host'] . 'logout.php'; ?>" class="grey-text text-darken-1">
                <i class="material-icons">keyboard_tab</i> Logout</a>
            </li>
          </ul>
          <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?= $_SESSION["Nama"]; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
          <p class="user-roal"><?= $_SESSION["Posisi"]; ?></p>
        </div>
      </div>
    </li>
    <li class="no-padding">
      <ul class="collapsible" data-collapsible="accordion">
        <li class="bold  <?= cekActive($df['host'] . 'karyawan/'); ?>">
          <a href="<?= $df['host'] . 'karyawan/'; ?>" class="waves-effect waves-cyan">
            <i class="material-icons">home</i>
            <span class="nav-text">Dashboard</span>
          </a>
        </li>

        <!-- dropdown sidebar -->
        <li class="bold <?= cekActive($df['host'] . 'karyawan/riwayat-cuti.php'); ?> <?= cekActive($df['host'] . 'karyawan/sisa-cuti.php'); ?> <?= cekActive($df['host'] . 'karyawan/pengajuan-cuti.php'); ?>">
          <a class="dropdown-button waves-effect waves-cyan" href="#" data-activates="cuti-dropdown">Data Cuti<i class="material-icons">card_travel</i></a>
          <ul id="cuti-dropdown" class="dropdown-content">
            <li class="bold <?= cekActive($df['host'] . 'karyawan/riwayat-cuti.php'); ?>">
              <a href="<?= $df['host'] . 'karyawan/riwayat-cuti.php'; ?>" class="grey-text text-darken-1">
                <i class="material-icons">today</i> Riwayat cuti</a>
            </li>
            <li class="bold <?= cekActive($df['host'] . 'karyawan/sisa-cuti.php'); ?>">
              <a href="<?= $df['host'] . 'karyawan/sisa-cuti.php'; ?>" class="grey-text text-darken-1">
                <i class="material-icons">stars</i> Sisa cuti</a>
            </li>
            <li class="bold <?= cekActive($df['host'] . 'karyawan/pengajuan-cuti.php'); ?>">
              <a href="<?= $df['host'] . 'karyawan/pengajuan-cuti.php'; ?>" class="grey-text text-darken-1">
                <i class="material-icons">add_shopping_cart</i> Pengajuan cuti</a>
            </li>
            <li class="divider"></li>
          </ul>
        </li>
        <!-- dropdown end -->
      </ul>
    </li>
  </ul>
  <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
    <i class="material-icons">menu</i>
  </a>
</aside>