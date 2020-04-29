-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2014 at 10:56 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--

--
CREATE DATABASE IF NOT EXISTS `absensi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `absensi`;

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(4) NOT NULL,
  `id_semester` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `absen` varchar(1) NOT NULL,
  PRIMARY KEY (`id_absen`),
  KEY `id_semester` (`id_semester`) USING BTREE,
  KEY `nis` (`nis`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nis`, `id_semester`, `tanggal`, `absen`) VALUES
(2, '1001', 1, '2014-01-02', 'S'),
(3, '1005', 1, '2014-03-04', 'I'),
(4, '1008', 1, '2014-03-03', 'A'),
(5, '1010', 1, '2014-02-06', 'T'),
(6, '1123', 1, '2014-03-18', 'I'),
(7, '1115', 1, '2014-03-15', 'S'),
(8, '1078', 1, '2014-03-13', 'I'),
(9, '1016', 1, '2014-03-20', 'T'),
(10, '1098', 1, '2014-03-17', 'A'),
(11, '1088', 1, '2014-03-10', 'A'),
(12, '1055', 1, '2014-03-04', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` varchar(2) NOT NULL,
  `kelas` varchar(32) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
('01', 'X'),
('02', 'XI'),
('03', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id_semester` int(1) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `status`) VALUES
(1, 'Y'),
(2, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` varchar(2) NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `id_kelas`) VALUES
('1001', 'ABIMANYU KURNIADI', '03'),
('1002', 'ADININGSIH KARTIKA SARI', '03'),
('1003', 'ANDRI PURNOMO', '03'),
('1004', 'ARISMA BINTI AWALIYAH', '03'),
('1005', 'BETRI ARISTA OVIANA', '03'),
('1006', 'BRIANRAKA SONY MEI SEGA', '03'),
('1007', 'DEWI KARMILA', '03'),
('1008', 'DIMAS ESA DEWA', '03'),
('1009', 'DIMAS SEPTIAN EKA PUTRA', '03'),
('1010', 'DWI SISKA ANGGRAENI', '03'),
('1011', 'FAHMI ALFARIS HIDAYATULLAH', '03'),
('1012', 'FARIH YAHYA', '03'),
('1013', 'FATHCHUR ROJI', '03'),
('1014', 'FATHURROHMAH MAULIDAH', '03'),
('1015', 'FATOLA RUDIANZA', '03'),
('1016', 'FITRIANING WAHYU NUR SYAHADAH', '03'),
('1017', 'INDARTININGSIH', '03'),
('1018', 'INDRI RAHMAWATI', '03'),
('1019', 'KIKY FLORESTA BUNGA KIRANA', '03'),
('1020', 'MASRULI', '03'),
('1021', 'MEVINA MARSELLA LAUSANI', '03'),
('1022', 'NIKMATUL FITRIYAH', '03'),
('1023', 'NOVI DWI ARINTA', '03'),
('1024', 'NURINI WULANDARI', '03'),
('1025', 'RATNA FURI HANDAYANI', '03'),
('1026', 'RESTINING ANDITASARI', '03'),
('1027', 'RIESKA ELIAN ZULFIDA', '03'),
('1028', 'RIZAL AFANDY', '03'),
('1029', 'ROFY ANGGI PRATIWI', '03'),
('1030', 'SITI AISYA', '03'),
('1031', 'SITI ISMATUN ROHMANIYAH', '03'),
('1032', 'SITI KHOLIFAH', '03'),
('1033', 'TEGUH NOVRIYANTO', '03'),
('1034', 'TIKA MULYA RAHMAN', '03'),
('1035', 'ULIA NUR WULAN', '03'),
('1036', 'WAHYU PRATAMA', '03'),
('1037', 'WIDAHANA ARISAKTI OKTAVIA', '03'),
('1038', 'YONGKI DWI CAHYADI', '03'),
('1039', 'ZENY KURNIAWAN', '03'),
('1040', 'ZETTA KUSUMA PRAMUDITA', '03'),
('1041', 'DIMAS AGUNG PUJI ISWORO', '02'),
('1042', 'ADI SINDHU NURCAHYA', '02'),
('1043', 'AGUS SUPRIYANTO', '02'),
('1044', 'AJI SLAMET RAHARJO', '02'),
('1045', 'ALBASIT BHEKTI FIRMANSYAH', '02'),
('1046', 'AMANDA NIKE DWINTASARI', '02'),
('1047', 'ANDI MAHENDRA', '02'),
('1048', 'ARDHI KURNIAWAN', '02'),
('1049', 'DADANG SETIYOJADI', '02'),
('1050', 'DEWI SEPTIANI WULANDARI', '02'),
('1051', 'DIA WINDANA PUTRI', '02'),
('1052', 'DINI NURMAHA LENTRA', '02'),
('1053', 'DONI SAIFUL ARIFIN', '02'),
('1054', 'EBBY MAHENDRA PUTRA', '02'),
('1055', 'EKA KUSUMA WARDHANA', '02'),
('1056', 'EKA MARGARETA', '02'),
('1057', 'EKO PRASETYO', '02'),
('1058', 'FEBRIANTIKA CAHYA LESTARI', '02'),
('1059', 'FIRDA DWI ANGGRAENI', '02'),
('1060', 'FRANITHA FIDRIASTUTI BAWON', '02'),
('1061', 'IKE WULANDARI', '02'),
('1062', 'JANUAR GANGSAR SURYONO', '02'),
('1063', 'LINDA RIANI', '02'),
('1064', 'MOCHAMAD ARIF WICAKSONO', '02'),
('1065', 'MUH. CAHYA AFANDO', '02'),
('1066', 'MUHAMMAD SHOLEH', '02'),
('1067', 'NUR ARIFIN', '02'),
('1068', 'NUR LIYA AGUSTIN', '02'),
('1069', 'PRISKA MEIDYAN ANGGRAENI', '02'),
('1070', 'RATIH INGE ARYUNAH', '02'),
('1071', 'RENNDY PURNOMO', '02'),
('1072', 'RESTU WIDIASTANINGRUM', '02'),
('1073', 'RIKY INDARTA', '02'),
('1074', 'RILA NUR HANILAH', '02'),
('1075', 'RYAN NUR RAHMATULLAH', '02'),
('1076', 'SALSABILA', '02'),
('1077', 'SEPTIAN BAGUS LAKSONO', '02'),
('1078', 'SERLY ANDRIYANI', '02'),
('1079', 'TRI MARTINASARI', '02'),
('1080', 'WERDI CANDRA PRASETYO', '02'),
('1081', 'YOGA KOMARA PUTRA', '02'),
('1082', 'YULI DWI LESTARI', '02'),
('1083', 'ZAINURI HAPPY DWI ARISANDI', '02'),
('1084', 'ABDUL ROSYID ALFIANSYAH', '01'),
('1085', 'AKHMAD FANANI', '01'),
('1086', 'ANDI FAHMI MOCHTAR', '01'),
('1087', 'ARIS WAHYUDI', '01'),
('1088', 'ARTHA ADI NUGRAHA', '01'),
('1089', 'CHOIROTUN NISAH', '01'),
('1090', 'CHUSNUL KHOTIMAH', '01'),
('1091', 'DHENNY DWI HARIANTO P.', '01'),
('1092', 'DIANA DWI KUSUMANING TYAS', '01'),
('1093', 'EFA KHUSRINA', '01'),
('1094', 'EKA SRI WULANDARI', '01'),
('1095', 'FIRIDI OKTAVILUN ROCHMAN', '01'),
('1096', 'FUAD MUBAROK', '01'),
('1097', 'HATTA AGUSTA MAHARDIKA', '01'),
('1098', 'HERLI DWI WULAN', '01'),
('1099', 'IBNU JAMIL FAISHAL', '01'),
('1100', 'IMAM SANDI ROBI', '01'),
('1101', 'JEFRILYA', '01'),
('1102', 'KHOIRUN NIKMAH', '01'),
('1103', 'KIKI KURNIAWAN', '01'),
('1104', 'LINDA WAHYUNING UTAMI', '01'),
('1105', 'MUHAMMAD ROIS', '01'),
('1106', 'NOVIA YULISTIA INDRIANSYAH', '01'),
('1107', 'NOVITASARI', '01'),
('1108', 'NUR ENDAH PERMATASARI', '01'),
('1109', 'NURHAEMI ROHMAH', '01'),
('1110', 'PUPUT WULAN MANDIRI', '01'),
('1111', 'RANI INDAH DWIJAYANTI', '01'),
('1112', 'ROZY YUDHA YUDISTIRA', '01'),
('1113', 'SETYA SISWILUJENG', '01'),
('1114', 'SITI NURHIDAYAH', '01'),
('1115', 'SITI NURWIJAYANTI', '01'),
('1116', 'SWIT IVINTEN GIMIARCI', '01'),
('1117', 'SYAM HIDAYAT JATI', '01'),
('1118', 'SYLVIA RINJI WIDYANINGTYAS', '01'),
('1119', 'TITA TARWATI PURNAMASARI', '01'),
('1120', 'TRI ANI RESTUNINGSIH', '01'),
('1121', 'TUTUT IMAWULANDARI', '01'),
('1122', 'ULUL LAILATUL MARDIYAH', '01'),
('1123', 'VIKY FARISTIKA', '01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(1) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `fk_absen_semester` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_absen_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
