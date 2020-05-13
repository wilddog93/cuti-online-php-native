<?php
//this is admin base structured - CRUD
$db = array(
  'host'   => 'localhost',
  'user'   => 'root',
  'pass'   => '',
  'db'   => 'cuti_db'
);

$df = array(
  'host'          => 'http://localhost/cuti-aei/',
  'head'          => 'PT Angkasa Engineers Indonesia',
  'description'   => 'AADC',
  // 'image'         => 'http://localhost/cuti/assets/images/logo-aei.png'
);

// Create connection
$conn = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['db']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
