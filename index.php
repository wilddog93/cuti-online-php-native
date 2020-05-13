  <?php
  $backurl = './';
  require_once($backurl . 'config/conn.php');
  require_once($backurl . 'config/function.php');
  $jh = 'Login';

  if (isset($_POST["login"])) {
    $email = anti_injection($conn, $_POST["email"]);
    $pass     = anti_injection($conn, md5($_POST["password"]));
    if (!$email or !$pass) {
    } else {
      $login = mysqli_query($conn, "SELECT * FROM login WHERE Email LIKE '$email' AND password LIKE '$pass'");
      $ketemu = mysqli_num_rows($login);
      if ($ketemu > 0) {
        $r = mysqli_fetch_array($login);
        $_SESSION["NIK"] = $r['NIK'];
        $_SESSION["Nama"] = $r['nm_karyawan'];
        $_SESSION["Posisi"] = $r['nm_jbt'];
        $_SESSION["departemen"] = $r['id_dept'];
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $pass;
        if ($r["status_karyawan"] != 'Active') {
          echo "eror";
        } else if ($r["lvl_jbt"] == 'Admin') {
          header('location:./admin/');
        } else if ($r["lvl_jbt"] == 'Atasan') {
          header('location:./atasan/');
        } else if ($r["lvl_jbt"] == 'Karyawan') {
          header('location:./karyawan/');
        }
      } else {
        $_SESSION['notifikasi'] = 'NOT01';
      }
    }
  }

  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php include $backurl . 'config/head.php'; ?>
    <style type="text/css">
      body {
        background-image: url("assets/images/logo/parallax.png");
        background-size: cover;
      }

      .ikon {
        margin-top: 125px;
      }
    </style>
  </head>


  <body>

    <section>
      <div class="container">
        <h5 class="center ikon" style="margin-top: 10px; "><img src="assets/images/logo/logo.png"></h5>
        <div class="col m6 push-m3 s12">
          <div class="row">
            <div class="col m6 push-m3 s12">
              <div class="card-panel center">
                <h4 class="header2">welcome</h4>
                <div class="row">
                  <form method="POST" class="col s12">
                    <!-- <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="name4" type="text" class="validate">
                          <label for="first_name">Name</label>
                        </div>
                      </div -->
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="email4" type="email" name="email" class="validate">
                        <label for="email">Email</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password5" type="password" name="password" class="validate">
                        <label for="password">Password</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn blue waves-effect waves-light center" type="submit" name="login">Log In
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- <footer class="page-footer white darken-3">
            <div class="container blue-text text-center">
                Copyright 2019 © Jumakri Ridho Fauzi. All rights reserved.
            </div>
      </footer> -->

    <!-- ================================================
      Scripts
      ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="assets/vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="assets/js/custom-script.js"></script>
  </body>

  </html>