<?php
$backurl = '../../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
require $backurl . 'assets/vendors/PhpSpreadSheet/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();




$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama Karyawan');
$sheet->setCellValue('C1', 'Jenis cuti');
$sheet->setCellValue('D1', 'Tanggal mulai');
$sheet->setCellValue('E1', 'Tanggal selesai');
$sheet->setCellValue('F1', 'Keterangan');
$sheet->setCellValue('G1', 'Status cuti');




$no = 1;
$numrow = 2;
$cari_nik = isset($_POST['NIK']) && $_POST['NIK'] != '' ? " AND NIK LIKE '%$_POST[NIK]%'" : "";
$cari_nm_karyawan = isset($_POST['nama']) && $_POST['nama'] != '' ? " AND nm_karyawan LIKE '%$_POST[nama]%'" : "";
$cari_tgl_mulai = isset($_POST['periode']) && $_POST['periode'] != '' ? " AND tgl_mulai>='$_POST[periode]'" : "";
$cari_tgl_selesai = isset($_POST['sampai']) && $_POST['sampai'] != '' ? " AND tgl_selesai<='$_POST[sampai]'" : "";

$sql = mysqli_query($conn, "SELECT * FROM cuti WHERE stt_cuti!='proses' $cari_nik $cari_nm_karyawan $cari_tgl_mulai $cari_tgl_selesai");
while ($data = mysqli_fetch_array($sql)) {
  $sheet->setCellValue('A' . $numrow, $no);
  $sheet->setCellValue('B' . $numrow, $data['nm_karyawan']);
  $sheet->setCellValue('C' . $numrow, $data['nm_jc']);
  $sheet->setCellValue('D' . $numrow, $data['tgl_mulai']);
  $sheet->setCellValue('E' . $numrow, $data['tgl_selesai']);
  $sheet->setCellValue('F' . $numrow, $data['ket']);
  $sheet->setCellValue('G' . $numrow, $data['stt_cuti']);

  $no++;
  $numrow++;
}



$filename = 'simple';

$spreadsheet->getProperties()->setCreator('AndL')->setLastModifiedBy('AndL')->setTitle($filename)->setSubject("Siswa")->setDescription("Import Data Kelas")->setKeywords("Data Kelas");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
