<?php

session_start();
require_once('conn.php');

function anti_injection($sasdsa, $data)
{
  $hasilnya = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
  $filter = mysqli_real_escape_string($sasdsa, $hasilnya);
  return $filter;
}

function tambahSlashKiriman($kiriman)
{
  foreach ($kiriman as $key => $value) {
    $kiriman[$key] = stripslashes($value);
  }
  return $kiriman;
}

function cekActive($kiriman)
{

  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if ($kiriman == $actual_link) {

    return 'active';
  } else {
    return '';
  }
}

function kicked($akses)
{
  global $conn;
  global $df;
  $cekdata = mysqli_query($conn, "SELECT * FROM login WHERE Email LIKE '$_SESSION[email]' AND password LIKE '$_SESSION[password]' AND status_karyawan='Active' AND lvl_jbt='$akses'");
  if (mysqli_num_rows($cekdata) <= 0) {
    header("location:" . $df['host']);
  }
}
