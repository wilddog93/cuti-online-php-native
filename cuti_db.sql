-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2020 pada 04.45
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti_db`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `cuti`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `cuti` (
`id_cuti` int(11)
,`NIK` varchar(20)
,`nm_karyawan` varchar(50)
,`id_dept` int(11)
,`id_jc` int(11)
,`nm_jc` varchar(50)
,`tgl_pengajuan` date
,`tgl_mulai` date
,`tgl_selesai` date
,`lama_cuti` int(8)
,`ket` text
,`stt_cuti` enum('terima','tolak','proses')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jabatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jabatan` (
`id_jbt` int(11)
,`nm_jbt` varchar(50)
,`id_dept` int(11)
,`nm_dpt` varchar(50)
,`lvl_jbt` enum('Atasan','Admin','Karyawan')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `login`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `login` (
`NIK` varchar(20)
,`nm_karyawan` varchar(50)
,`Email` varchar(30)
,`password` varchar(32)
,`status_karyawan` enum('Active','Non-Active')
,`lvl_jbt` enum('Atasan','Admin','Karyawan')
,`nm_jbt` varchar(50)
,`id_dept` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sisa_cuti`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sisa_cuti` (
`NIK` varchar(20)
,`nm_karyawan` varchar(50)
,`id_jc` int(11)
,`nm_jc` varchar(50)
,`lama_cuti` varbinary(33)
,`sisa_cuti` double
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(11) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `id_jc` int(11) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `stt_cuti` enum('terima','tolak','proses') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `NIK`, `id_jc`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `ket`, `stt_cuti`) VALUES
(1, 'user', 1, '2020-01-19', '2020-01-01', '2020-01-02', NULL, 'terima'),
(2, 'user', 3, '2020-01-19', '2020-01-19', '2020-01-23', '123456', 'tolak'),
(4, 'user', 3, '2020-01-19', '2020-01-19', '2020-01-23', NULL, 'terima'),
(5, 'NIK090909', 1, '2020-01-19', '2020-01-28', '2020-01-29', 'liburan', 'terima'),
(6, 'AEI-2549', 1, '2020-01-20', '2020-01-23', '2020-01-25', 'balik kampung', 'terima'),
(7, 'AEI-1578', 1, '2020-01-21', '2020-01-22', '2020-01-23', 'Malas kerja', 'proses'),
(8, 'AEI-2549', 1, '2020-01-21', '2020-01-26', '2020-01-27', 'ekstra balik kampung', 'terima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dpt`
--

CREATE TABLE `tbl_dpt` (
  `id_dpt` int(11) NOT NULL,
  `nm_dpt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dpt`
--

INSERT INTO `tbl_dpt` (`id_dpt`, `nm_dpt`) VALUES
(1, 'Accounting Department'),
(4, 'Human Resource Department');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jbt`
--

CREATE TABLE `tbl_jbt` (
  `id_jbt` int(11) NOT NULL,
  `nm_jbt` varchar(50) DEFAULT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `lvl_jbt` enum('Atasan','Admin','Karyawan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jbt`
--

INSERT INTO `tbl_jbt` (`id_jbt`, `nm_jbt`, `id_dept`, `lvl_jbt`) VALUES
(5, 'HR Executive', 4, 'Atasan'),
(6, 'IT Support', 4, 'Admin'),
(7, 'Cleaning Service', 4, 'Karyawan'),
(8, 'Accounting', 4, 'Karyawan'),
(9, 'RU', 4, 'Karyawan'),
(10, 'Payroll', 1, 'Karyawan'),
(11, 'Finance Manager', 1, 'Atasan'),
(12, 'Assistant Accounting', 1, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jc`
--

CREATE TABLE `tbl_jc` (
  `id_jc` int(11) NOT NULL,
  `nm_jc` varchar(50) DEFAULT NULL,
  `jml_jc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jc`
--

INSERT INTO `tbl_jc` (`id_jc`, `nm_jc`, `jml_jc`) VALUES
(1, 'Tahunan', 12),
(3, 'tambahan', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `NIK` varchar(20) NOT NULL,
  `id_jbt` int(11) DEFAULT NULL,
  `nm_karyawan` varchar(50) DEFAULT NULL,
  `tmpt_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `status_nikah` enum('Menikah','Belum Menikah') DEFAULT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Budha') DEFAULT NULL,
  `status_karyawan` enum('Active','Non-Active') DEFAULT NULL,
  `Pend_Terakhir` enum('SD','SMP','SMA/SMK','D1','D2','D3','D4','S1','S2','S3') DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`NIK`, `id_jbt`, `nm_karyawan`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `gender`, `status_nikah`, `agama`, `status_karyawan`, `Pend_Terakhir`, `Email`, `Password`, `Foto`) VALUES
('AEI-1578', 10, 'Fredi Efendi', '', '1992-10-16', 'Perum Pondok Pelamgi Blok A2 No.21 Rt.007/Rw.007 Tiban Indah Sekupang Batam', 'Pria', 'Belum Menikah', 'Islam', 'Active', '', 'frediefendi@gmail.com', 'fredi', NULL),
('AEI-197', 11, 'Sushilkumar Parambikkadan Sahadevan', '', '1978-04-10', 'Cluster Sevilla No.8B Taman Duta Mas, Kelurahan Baloi Permai Kecamatan Batam Kota', 'Pria', 'Menikah', 'Hindu', 'Active', '', 'sushilkumar@gmai.com', 'sushilkumar', NULL),
('AEI-214', 5, 'Masari', '', '1985-12-16', 'Bengkong Laut', 'Pria', 'Menikah', 'Islam', 'Active', 'S1', 'masari@gmail.com', 'masari', NULL),
('AEI-2548', 6, 'Ngadiman', '', '1989-06-16', 'Simpang raya gabana Blk E1 No 17 Rt, 05/012 Kel, Belian Kec Batam kota', 'Pria', 'Menikah', 'Islam', 'Active', '', 'ngadiman@gmail.com', 'ngadiman', NULL),
('AEI-2549', 7, 'Fitriana', '', '1990-04-30', 'Kampung Cunting Rt/Rw. 001/001, Tg. Uncang ', 'Wanita', 'Belum Menikah', 'Islam', 'Active', '', 'fitriana@gmail.com', 'fitriana', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_karyawan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_karyawan` (
`NIK` varchar(20)
,`nm_karyawan` varchar(50)
,`id_jbt` int(11)
,`nm_jbt` varchar(50)
,`id_dept` int(11)
,`nm_dpt` varchar(50)
,`lvl_jbt` enum('Atasan','Admin','Karyawan')
,`tmpt_lahir` varchar(50)
,`tgl_lahir` date
,`alamat` text
,`gender` enum('Pria','Wanita')
,`status_nikah` enum('Menikah','Belum Menikah')
,`agama` enum('Islam','Protestan','Katolik','Hindu','Budha')
,`status_karyawan` enum('Active','Non-Active')
,`Pend_Terakhir` enum('SD','SMP','SMA/SMK','D1','D2','D3','D4','S1','S2','S3')
,`Email` varchar(30)
,`Password` varchar(30)
,`Foto` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `cuti`
--
DROP TABLE IF EXISTS `cuti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuti`  AS  (select `tbl_cuti`.`id_cuti` AS `id_cuti`,`tbl_cuti`.`NIK` AS `NIK`,`v_karyawan`.`nm_karyawan` AS `nm_karyawan`,`v_karyawan`.`id_dept` AS `id_dept`,`tbl_cuti`.`id_jc` AS `id_jc`,`tbl_jc`.`nm_jc` AS `nm_jc`,`tbl_cuti`.`tgl_pengajuan` AS `tgl_pengajuan`,`tbl_cuti`.`tgl_mulai` AS `tgl_mulai`,`tbl_cuti`.`tgl_selesai` AS `tgl_selesai`,to_days(`tbl_cuti`.`tgl_selesai`) - to_days(`tbl_cuti`.`tgl_mulai`) + 1 AS `lama_cuti`,`tbl_cuti`.`ket` AS `ket`,`tbl_cuti`.`stt_cuti` AS `stt_cuti` from ((`tbl_cuti` join `v_karyawan`) join `tbl_jc`) where `tbl_cuti`.`NIK` = `v_karyawan`.`NIK` and `tbl_cuti`.`id_jc` = `tbl_jc`.`id_jc`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `jabatan`
--
DROP TABLE IF EXISTS `jabatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jabatan`  AS  (select `tbl_jbt`.`id_jbt` AS `id_jbt`,`tbl_jbt`.`nm_jbt` AS `nm_jbt`,`tbl_jbt`.`id_dept` AS `id_dept`,`tbl_dpt`.`nm_dpt` AS `nm_dpt`,`tbl_jbt`.`lvl_jbt` AS `lvl_jbt` from (`tbl_jbt` join `tbl_dpt`) where `tbl_jbt`.`id_dept` = `tbl_dpt`.`id_dpt`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  (select `v_karyawan`.`NIK` AS `NIK`,`v_karyawan`.`nm_karyawan` AS `nm_karyawan`,`v_karyawan`.`Email` AS `Email`,md5(`v_karyawan`.`Password`) AS `password`,`v_karyawan`.`status_karyawan` AS `status_karyawan`,`v_karyawan`.`lvl_jbt` AS `lvl_jbt`,`v_karyawan`.`nm_jbt` AS `nm_jbt`,`v_karyawan`.`id_dept` AS `id_dept` from `v_karyawan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sisa_cuti`
--
DROP TABLE IF EXISTS `sisa_cuti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sisa_cuti`  AS  (select `tbl_karyawan`.`NIK` AS `NIK`,`tbl_karyawan`.`nm_karyawan` AS `nm_karyawan`,`tbl_jc`.`id_jc` AS `id_jc`,`tbl_jc`.`nm_jc` AS `nm_jc`,coalesce(sum(`cuti`.`lama_cuti`),'0') AS `lama_cuti`,`tbl_jc`.`jml_jc` - coalesce(sum(`cuti`.`lama_cuti`),'0') AS `sisa_cuti` from ((`tbl_karyawan` join `tbl_jc`) left join `cuti` on(`tbl_jc`.`id_jc` = `cuti`.`id_jc` and `tbl_karyawan`.`NIK` = `cuti`.`NIK` and year(`cuti`.`tgl_pengajuan`) = year(current_timestamp()))) group by `tbl_karyawan`.`NIK`,`tbl_jc`.`id_jc`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_karyawan`
--
DROP TABLE IF EXISTS `v_karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_karyawan`  AS  (select `tbl_karyawan`.`NIK` AS `NIK`,`tbl_karyawan`.`nm_karyawan` AS `nm_karyawan`,`tbl_karyawan`.`id_jbt` AS `id_jbt`,`jabatan`.`nm_jbt` AS `nm_jbt`,`jabatan`.`id_dept` AS `id_dept`,`jabatan`.`nm_dpt` AS `nm_dpt`,`jabatan`.`lvl_jbt` AS `lvl_jbt`,`tbl_karyawan`.`tmpt_lahir` AS `tmpt_lahir`,`tbl_karyawan`.`tgl_lahir` AS `tgl_lahir`,`tbl_karyawan`.`alamat` AS `alamat`,`tbl_karyawan`.`gender` AS `gender`,`tbl_karyawan`.`status_nikah` AS `status_nikah`,`tbl_karyawan`.`agama` AS `agama`,`tbl_karyawan`.`status_karyawan` AS `status_karyawan`,`tbl_karyawan`.`Pend_Terakhir` AS `Pend_Terakhir`,`tbl_karyawan`.`Email` AS `Email`,`tbl_karyawan`.`Password` AS `Password`,`tbl_karyawan`.`Foto` AS `Foto` from (`tbl_karyawan` join `jabatan`) where `tbl_karyawan`.`id_jbt` = `jabatan`.`id_jbt`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `tbl_dpt`
--
ALTER TABLE `tbl_dpt`
  ADD PRIMARY KEY (`id_dpt`);

--
-- Indeks untuk tabel `tbl_jbt`
--
ALTER TABLE `tbl_jbt`
  ADD PRIMARY KEY (`id_jbt`);

--
-- Indeks untuk tabel `tbl_jc`
--
ALTER TABLE `tbl_jc`
  ADD PRIMARY KEY (`id_jc`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`NIK`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_dpt`
--
ALTER TABLE `tbl_dpt`
  MODIFY `id_dpt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jbt`
--
ALTER TABLE `tbl_jbt`
  MODIFY `id_jbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_jc`
--
ALTER TABLE `tbl_jc`
  MODIFY `id_jc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
