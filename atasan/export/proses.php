<?php
// Load file koneksi.php
include "koneksi.php";

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('AndL')
					   ->setLastModifiedBy('AndL')
					   ->setTitle("Data Nilai")
					   ->setSubject("Siswa")
					   ->setDescription("Import Data Kelas")
					   ->setKeywords("Data Kelas");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);


// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row2 = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);
$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B1', "ID"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C1', "Nama"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('D1', "NIRM"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('E1', "NUTS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('F1', "NT"); // Set kolom E3 dengan tulisan "TELEPON"
$excel->setActiveSheetIndex(0)->setCellValue('G1', "NP"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('H1', "NH"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('I1', "NUAS"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('J1', "NA"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('K1', "Huruf"); // Set kolom F3 dengan tulisan "ALAMAT"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($connect, "SELECT * FROM tes");

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['id']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['nama']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['nirm']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nuts']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['nt']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['np']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['nh']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['nuas']);
	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "=SUM(E".$numrow.":I".$numrow.")/5");
	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, "=IF(J".$numrow.">3.49,\"A\",IF(J".$numrow.">2.49,\"B\",IF(J".$numrow.">1.49,\"C\",IF(J".$numrow.">0.49,\"D\",\"F\"))))");
	"=((E".$numrow." / 100) * 15) + ((F".$numrow." / 100) * 20) + ((G".$numrow." / 100) * 20) + ((H".$numrow." / 100) * 15) + ((I".$numrow." / 100) * 30)"
	
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row2);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->getNumberFormat()->setFormatCode('#.##');
	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row2);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(0); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(7); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(7); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(7); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(7); // Set width kolom G
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(7); // Set width kolom G
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(7); // Set width kolom G
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(8); // Set width kolom G

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
$excel->setActiveSheetIndex(0);

// // Proses file excel
// header('Content-Type: application/xls');
// header('Content-Disposition: attachment; filename=Data Siswa.xls');
// header('Cache-Control: max-age=0');

// $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
// $write->save('php://output');
// Redirect output to a client’s web browser (Excel5) 
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="Limesurvey_Results.xls"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5'); 
$objWriter->save('php://output');
?>
