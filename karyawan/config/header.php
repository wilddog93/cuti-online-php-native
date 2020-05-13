<header id="header" class="page-topbar">
  <!-- start header nav-->
  <div class="navbar-fixed">
    <nav class="navbar-color gradient-45deg-light-white-indigo">
      <div class="nav-wrapper">
        <ul class="left">
          <li>
            <h1 class="logo-wrapper">
              <a href="<?= $df['host'] . 'karyawan/'; ?>" class="brand-logo darken-1">
                <img src="<?= $df['host'] . 'assets/images/logo/logo-aei.png'; ?>" alt="materialize logo">
                <!-- <span class="logo-text hide-on-med-and-down">Angkasa Engineers</span> -->
              </a>
            </h1>
          </li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-light profile-button" data-activates="profile-dropdown">
              <span class="avatar-status avatar-online">
                <img src="../assets/images/avatar/avatar-7.png" alt="avatar">
                <i></i>
              </span>
            </a>
          </li>

        </ul>
        <!-- profile-dropdown -->
        <ul id="profile-dropdown" class="dropdown-content">
          <li>
            <a href="<?= $df['host'] . 'logout.php'; ?>" class="grey-text text-darken-1">
              <i class="material-icons">keyboard_tab</i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- end header nav-->
</header>