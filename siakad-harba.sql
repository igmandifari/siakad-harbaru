-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2020 at 08:38 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.13-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad-harba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(100) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_username` varchar(35) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`, `created_at`, `updated_at`) VALUES
('5de15e4e0de9d', 'Zam Zam Saeful Bahtiar', 'bekerz18', 'a31c86d61e1c1773167ca7b5bf023f98', '5de15e4e0de9d.jpeg', NULL, NULL),
('5de15e8a9ead8', 'Igman Difari', 'igman', 'b714337aa8007c433329ef43c7b8252c', '5de15e8a9ead8.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` varchar(100) NOT NULL,
  `jadwal_tipe_pembelajaran` enum('Tatap Muka','Mandiri','Tutorial') NOT NULL,
  `jadwal_hari` varchar(15) DEFAULT NULL,
  `tahunajaran_id` varchar(100) NOT NULL,
  `matpel_id` varchar(100) NOT NULL,
  `rombel_id` varchar(100) NOT NULL,
  `jadwal_waktu` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `jadwal_tipe_pembelajaran`, `jadwal_hari`, `tahunajaran_id`, `matpel_id`, `rombel_id`, `jadwal_waktu`, `created_at`, `updated_at`) VALUES
('5dfc9c4b29ca8', 'Tatap Muka', 'Jum\'at', '5dfc3970e4387', '5dfc9b6d70641', '5dfc397184367', '13:00-14:00', '2019-12-20 17:02:51', '0000-00-00 00:00:00'),
('5dfc9d1b7968b', 'Tatap Muka', 'Jum\'at', '5dfc3970e4387', '5dfc9b3db0980', '5dfc397184367', '14:00-15:00', '2019-12-20 17:06:19', '0000-00-00 00:00:00'),
('5dfc9d36a3f25', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b496c0f2', '5dfc397184367', '13:00-14:00', '2019-12-20 17:06:46', '0000-00-00 00:00:00'),
('5dfc9d620f773', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b5f4c607', '5dfc397184367', '14:00-15:00', '2019-12-20 17:07:30', '0000-00-00 00:00:00'),
('5dfc9da09b91e', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5df84e99f335f', '5dfc397184367', '13:00-14:00', '2019-12-20 17:08:32', '0000-00-00 00:00:00'),
('5dfc9dd11bb3f', 'Mandiri', NULL, '5dfc3970e4387', '5dfc9c2a3f68d', '5dfc397184367', NULL, '2019-12-20 17:09:21', '0000-00-00 00:00:00'),
('5dfc9ded08c0c', 'Tutorial', NULL, '5dfc3970e4387', '5df84eb0476f9', '5dfc397184367', NULL, '2019-12-20 17:09:49', '0000-00-00 00:00:00'),
('5dfc9e164dcf0', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5dfc9b8d1a405', '5dfc397184367', '14:00-15:00', '2019-12-20 17:10:30', '0000-00-00 00:00:00'),
('5e09494499b1d', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b3db0980', '5dfc397155e30', '14:00-15:00', '2019-12-30 07:48:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` varchar(100) NOT NULL,
  `kelas_nama` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`, `created_at`, `updated_at`) VALUES
('5df888a6aba4d', 'Kelas VII', '2019-12-17 14:49:58', NULL),
('5df888aea0fba', 'Kelas VIII', '2019-12-17 14:50:06', NULL),
('5df888b63addd', 'Kelas IX', '2019-12-17 14:50:14', NULL),
('5df888bcc9c18', 'Kelas X', '2019-12-17 14:50:20', NULL),
('5df888c17d8f0', 'Kelas XI', '2019-12-17 14:50:25', NULL),
('5df888c9667b5', 'Kelas XII', '2019-12-17 14:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `masukan_id` varchar(100) NOT NULL,
  `masukan` text NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `tahunajaran_id` varchar(100) NOT NULL,
  `wargabelajar_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`masukan_id`, `masukan`, `status`, `tahunajaran_id`, `wargabelajar_id`, `created_at`) VALUES
('5e1e590242e1c', 'Tolong tambahkan fitur ganti foto profil dong', '0', '5dfc3970e4387', '5df8c2b2d14b8', '2020-01-15 07:12:50'),
('5e1fa61501b8b', 'Tolong adakan kipas angin...', '0', '5dfc3970e4387', '5df8c9b8e20e9', '2020-01-16 06:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `matpel_id` varchar(100) NOT NULL,
  `matpel_nama` varchar(50) NOT NULL,
  `tutor_id` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`matpel_id`, `matpel_nama`, `tutor_id`, `created_at`, `updated_at`) VALUES
('5df84e99f335f', 'Bahasa Indonesia', '5df69881a9a58', '2019-12-17 10:42:17', NULL),
('5df84eb0476f9', 'Teknologi Informasi dan Komunikasi', '5ded0e21b5aea', '2019-12-17 10:42:40', NULL),
('5dfc9b3db0980', 'Geografi', '5dfc9a88e27cb', '2019-12-20 16:58:21', NULL),
('5dfc9b496c0f2', 'Matematika', '5dfc9aab6ada9', '2019-12-20 16:58:33', NULL),
('5dfc9b5f4c607', 'Sosiologi', '5dfc9a88e27cb', '2019-12-20 16:58:55', NULL),
('5dfc9b6d70641', 'Ekonomi', '5dfc9b297a427', '2019-12-20 16:59:09', NULL),
('5dfc9b8d1a405', 'Pendidikan Pancasila dan Kewarganegaraan', '5df69881a9a58', '2019-12-20 16:59:41', NULL),
('5dfc9c2a3f68d', 'Pendidikan Agama Islam', '5dfc9bafd6bb6', '2019-12-20 17:02:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` varchar(100) NOT NULL,
  `jadwal_id` varchar(100) NOT NULL,
  `wargabelajar_id` varchar(100) NOT NULL,
  `nilai_semester` enum('ganjil','genap') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `jadwal_id`, `wargabelajar_id`, `nilai_semester`, `created_at`, `updated_at`) VALUES
('5e29cff0e4096', '5dfc9e164dcf0', '5df8cc7a68b47', 'ganjil', '2020-01-23 23:55:12', '0000-00-00 00:00:00'),
('5e29dbf32d70c', '5dfc9da09b91e', '5df8cc7a68b47', 'ganjil', '2020-01-24 00:46:27', '0000-00-00 00:00:00'),
('5e2a1c8343b8b', '5dfc9da09b91e', '5df8c9b8e20e9', 'ganjil', '2020-01-24 05:21:55', '0000-00-00 00:00:00'),
('5e2a2428288a2', '5dfc9da09b91e', '5df8cc7a68b47', 'genap', '2020-01-24 05:54:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_details`
--

CREATE TABLE `nilai_details` (
  `nilai_details_id` int(11) NOT NULL,
  `nilai_id` varchar(100) NOT NULL,
  `nilai_details_jenis` enum('Tugas','Harian','UTS','UAS') NOT NULL,
  `nilai_details_nilai` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_details`
--

INSERT INTO `nilai_details` (`nilai_details_id`, `nilai_id`, `nilai_details_jenis`, `nilai_details_nilai`, `created_at`, `updated_at`) VALUES
(6, '5e29dbf32d70c', 'Tugas', 100, '2020-01-24 07:20:37', '0000-00-00 00:00:00'),
(7, '5e29dbf32d70c', 'Harian', 80, '2020-01-24 07:21:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `pimpinan_id` varchar(100) NOT NULL,
  `pimpinan_username` varchar(25) NOT NULL,
  `pimpinan_nama` varchar(100) NOT NULL,
  `pimpinan_foto` varchar(100) DEFAULT NULL,
  `pimpinan_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`pimpinan_id`, `pimpinan_username`, `pimpinan_nama`, `pimpinan_foto`, `pimpinan_password`, `created_at`, `updated_at`) VALUES
('5ded07350f828', 'iyep', 'Iyep Saepumilah SH.I, M.Ag', '5ded07350f828.jpg', 'd93a5def7511da3d0f2d171d9c344e91', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `presensi_id` varchar(100) NOT NULL,
  `jadwal_id` varchar(100) NOT NULL,
  `presensi_tanggal` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`presensi_id`, `jadwal_id`, `presensi_tanggal`, `created_at`, `updated_at`) VALUES
('5e044c4414491', '5dfc9da09b91e', '2019-12-26', '2019-12-26 13:03:12', '0000-00-00 00:00:00'),
('5e045396c1109', '5dfc9da09b91e', '2019-12-26', '2019-12-26 13:30:58', '0000-00-00 00:00:00'),
('5e1ced951caa1', '5dfc9da09b91e', '2020-01-14', '2020-01-14 05:22:41', '0000-00-00 00:00:00'),
('5e1ec915beb0b', '5dfc9c4b29ca8', '2020-01-15', '2020-01-15 15:11:04', '0000-00-00 00:00:00'),
('5e1f9a9a7c99f', '5dfc9d1b7968b', '2020-01-16', '2020-01-16 06:05:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_details`
--

CREATE TABLE `presensi_details` (
  `presensi_det_id` int(11) NOT NULL,
  `presensi_id` varchar(100) NOT NULL,
  `wargabelajar_id` varchar(100) NOT NULL,
  `presensi_det_ket` enum('A','H','I','S') NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_details`
--

INSERT INTO `presensi_details` (`presensi_det_id`, `presensi_id`, `wargabelajar_id`, `presensi_det_ket`, `updated_at`) VALUES
(21, '5e044c4414491', '5df8c9b8e20e9', 'I', '0000-00-00 00:00:00'),
(22, '5e044c4414491', '5df8cbbfd492d', 'I', '0000-00-00 00:00:00'),
(23, '5e044c4414491', '5df8cc7a68b47', 'I', '0000-00-00 00:00:00'),
(24, '5e044c4414491', '5df8ce3c7570f', 'I', '0000-00-00 00:00:00'),
(25, '5e044c4414491', '5dfc3f1b90991', 'A', '0000-00-00 00:00:00'),
(26, '5e045396c1109', '5df8c9b8e20e9', 'H', '0000-00-00 00:00:00'),
(27, '5e045396c1109', '5df8cbbfd492d', 'I', '0000-00-00 00:00:00'),
(28, '5e045396c1109', '5df8cc7a68b47', 'S', '0000-00-00 00:00:00'),
(29, '5e045396c1109', '5df8ce3c7570f', 'H', '0000-00-00 00:00:00'),
(30, '5e045396c1109', '5dfc3f1b90991', 'I', '0000-00-00 00:00:00'),
(31, '5e1ced951caa1', '5df8c9b8e20e9', 'S', '0000-00-00 00:00:00'),
(32, '5e1ced951caa1', '5df8cbbfd492d', 'H', '0000-00-00 00:00:00'),
(33, '5e1ced951caa1', '5df8cc7a68b47', 'A', '0000-00-00 00:00:00'),
(34, '5e1ced951caa1', '5df8ce3c7570f', 'S', '0000-00-00 00:00:00'),
(35, '5e1ced951caa1', '5dfc3f1b90991', 'I', '0000-00-00 00:00:00'),
(36, '5e1ec915beb0b', '5df8c9b8e20e9', 'A', '0000-00-00 00:00:00'),
(37, '5e1ec915beb0b', '5df8cbbfd492d', 'H', '0000-00-00 00:00:00'),
(38, '5e1ec915beb0b', '5df8cc7a68b47', 'H', '0000-00-00 00:00:00'),
(39, '5e1ec915beb0b', '5df8ce3c7570f', 'A', '0000-00-00 00:00:00'),
(40, '5e1ec915beb0b', '5dfc3f1b90991', 'H', '0000-00-00 00:00:00'),
(41, '5e1f9a9a7c99f', '5df8c9b8e20e9', 'S', '0000-00-00 00:00:00'),
(42, '5e1f9a9a7c99f', '5df8cbbfd492d', 'I', '0000-00-00 00:00:00'),
(43, '5e1f9a9a7c99f', '5df8cc7a68b47', 'H', '0000-00-00 00:00:00'),
(44, '5e1f9a9a7c99f', '5df8ce3c7570f', 'S', '0000-00-00 00:00:00'),
(45, '5e1f9a9a7c99f', '5dfc3f1b90991', 'H', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `rombel_id` varchar(100) NOT NULL,
  `tahunajaran_id` varchar(100) NOT NULL,
  `kelas_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`rombel_id`, `tahunajaran_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
('5dfc396714d60', '5dfc3966f0b29', '5df888a6aba4d', '2019-12-20 10:00:55', '0000-00-00 00:00:00'),
('5dfc3967257d5', '5dfc3966f0b29', '5df888aea0fba', '2019-12-20 10:00:55', '0000-00-00 00:00:00'),
('5dfc396733282', '5dfc3966f0b29', '5df888b63addd', '2019-12-20 10:00:55', '0000-00-00 00:00:00'),
('5dfc39676ef18', '5dfc3966f0b29', '5df888c17d8f0', '2019-12-20 10:00:55', '0000-00-00 00:00:00'),
('5dfc39677f441', '5dfc3966f0b29', '5df888c9667b5', '2019-12-20 10:00:55', '0000-00-00 00:00:00'),
('5dfc39711aace', '5dfc3970e4387', '5df888a6aba4d', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc397145b65', '5dfc3970e4387', '5df888aea0fba', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc397155e30', '5dfc3970e4387', '5df888b63addd', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc397173d8b', '5dfc3970e4387', '5df888bcc9c18', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc397184367', '5dfc3970e4387', '5df888c17d8f0', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc39718f162', '5dfc3970e4387', '5df888c9667b5', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc43248a286', '5dfc3966f0b29', '5df888bcc9c18', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rombel_details`
--

CREATE TABLE `rombel_details` (
  `rombel_details_id` bigint(20) NOT NULL,
  `rombel_id` varchar(100) NOT NULL,
  `wargabelajar_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel_details`
--

INSERT INTO `rombel_details` (`rombel_details_id`, `rombel_id`, `wargabelajar_id`, `created_at`, `updated_at`) VALUES
(2, '5dfc397184367', '5df8c9b8e20e9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '5dfc397184367', '5df8cbbfd492d', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '5dfc397184367', '5df8cc7a68b47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5dfc397184367', '5df8ce3c7570f', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '5dfc397184367', '5dfc3f1b90991', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `tahunajaran_id` varchar(100) NOT NULL,
  `tahunajaran_nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`tahunajaran_id`, `tahunajaran_nama`, `created_at`, `updated_at`) VALUES
('5dfc3966f0b29', '2017/2018', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc3970e4387', '2018/2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` varchar(100) NOT NULL,
  `tutor_nomor_induk` varchar(20) NOT NULL,
  `tutor_nama` varchar(90) DEFAULT NULL,
  `tutor_jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tutor_tempat_lahir` varchar(50) DEFAULT NULL,
  `tutor_tanggal_lahir` date DEFAULT NULL,
  `tutor_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `tutor_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `tutor_pendidikan_terakhir` varchar(25) DEFAULT NULL,
  `tutor_alamat_jalan` varchar(40) DEFAULT NULL,
  `tutor_alamat_rtrw` varchar(40) DEFAULT NULL,
  `tutor_alamat_desa` varchar(30) DEFAULT NULL,
  `tutor_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `tutor_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `tutor_alamat_provinsi` varchar(30) DEFAULT NULL,
  `tutor_alamat_kodepos` varchar(10) DEFAULT NULL,
  `tutor_foto` varchar(100) DEFAULT NULL,
  `tutor_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `tutor_nomor_induk`, `tutor_nama`, `tutor_jenis_kelamin`, `tutor_tempat_lahir`, `tutor_tanggal_lahir`, `tutor_agama`, `tutor_kewarganegaraan`, `tutor_pendidikan_terakhir`, `tutor_alamat_jalan`, `tutor_alamat_rtrw`, `tutor_alamat_desa`, `tutor_alamat_kecamatan`, `tutor_alamat_kabupaten`, `tutor_alamat_provinsi`, `tutor_alamat_kodepos`, `tutor_foto`, `tutor_password`, `created_at`, `updated_at`) VALUES
('5ded0e21b5aea', '982032', 'Zam Zam Saeful Bahtiar', 'Pria', 'Tasikmalaya', '1999-05-18', 'Islam', 'WNI', 'SLTA Sederajat', 'Cihonje', '002/002', 'Karanganyar', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', 'b5be1ec647cc6d4786921e92e34eee1a', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5df69881a9a58', '5999999', 'Dewi Fortuna Kamila', 'Wanita', 'Tasikmalaya', '1999-12-16', 'Islam', 'WNI', 'SLTA Sederajat', 'Cijerah', '003/005', 'Karanganyar', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', 'b3aa34645bc463218f17d9364d4c204e', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9a88e27cb', '0923092', 'Neneng', 'Wanita', 'Tasikmalaya', '1989-10-20', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', '5bca3ef34535aa78d0deb95a9441e018', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9aab6ada9', '023920', 'Syamsul Azis S.Pd', 'Pria', 'Tasikmalaya', '1993-08-08', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', '0c986e38ec013846cc6fdfb84e0618d0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9b297a427', '92302184104', 'Wildan Rahmah Hakim, S.Pd', 'Wanita', 'Tasikmalaya', '1987-11-05', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', 'd995862d22262d60114145c621020a64', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9bafd6bb6', '903284093', 'Hendra', 'Pria', 'Tasikmalaya', '1978-10-02', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', 'be0ca000923be805c0e10a7419786dfa', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wargabelajar`
--

CREATE TABLE `wargabelajar` (
  `wargabelajar_id` varchar(100) NOT NULL,
  `wargabelajar_nomor_induk` varchar(15) NOT NULL,
  `wargabelajar_nisn` varchar(15) NOT NULL,
  `wargabelajar_nama` varchar(90) NOT NULL,
  `wargabelajar_jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `wargabelajar_tempat_lahir` varchar(50) DEFAULT NULL,
  `wargabelajar_tanggal_lahir` date DEFAULT NULL,
  `wargabelajar_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `wargabelajar_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `wargabelajar_alamat_jalan` varchar(40) DEFAULT NULL,
  `wargabelajar_alamat_rtrw` varchar(10) DEFAULT NULL,
  `wargabelajar_alamat_desa` varchar(30) DEFAULT NULL,
  `wargabelajar_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `wargabelajar_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `wargabelajar_alamat_provinsi` varchar(30) DEFAULT NULL,
  `wargabelajar_alamat_kodepos` varchar(10) DEFAULT NULL,
  `wargabelajar_kejar` varchar(50) DEFAULT NULL,
  `wargabelajar_kejar_alamat` varchar(150) DEFAULT NULL,
  `wargabelajar_sttb` varchar(150) DEFAULT NULL,
  `wargabelajar_masuk` date DEFAULT NULL,
  `tahunajaran_id` varchar(100) NOT NULL,
  `wargabelajar_status` enum('Aktif','Tidak') NOT NULL,
  `wargabelajar_foto` varchar(100) DEFAULT NULL,
  `wargabelajar_password` varchar(255) NOT NULL,
  `orangtua_ayah_nama` varchar(90) DEFAULT NULL,
  `orangtua_ayah_pekerjaan` varchar(20) DEFAULT NULL,
  `orangtua_ayah_alamat_jalan` varchar(40) DEFAULT NULL,
  `orangtua_ayah_alamat_rtrw` varchar(40) DEFAULT NULL,
  `orangtua_ayah_alamat_desa` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_provinsi` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_kodepos` varchar(10) DEFAULT NULL,
  `orangtua_ibu_nama` varchar(90) DEFAULT NULL,
  `orangtua_wali_nama` varchar(90) DEFAULT NULL,
  `orangtua_wali_pekerjaan` varchar(20) DEFAULT NULL,
  `orangtua_wali_alamat_jalan` varchar(40) DEFAULT NULL,
  `orangtua_wali_alamat_rtrw` varchar(40) DEFAULT NULL,
  `orangtua_wali_alamat_desa` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_provinsi` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_kodepos` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wargabelajar`
--

INSERT INTO `wargabelajar` (`wargabelajar_id`, `wargabelajar_nomor_induk`, `wargabelajar_nisn`, `wargabelajar_nama`, `wargabelajar_jenis_kelamin`, `wargabelajar_tempat_lahir`, `wargabelajar_tanggal_lahir`, `wargabelajar_agama`, `wargabelajar_kewarganegaraan`, `wargabelajar_alamat_jalan`, `wargabelajar_alamat_rtrw`, `wargabelajar_alamat_desa`, `wargabelajar_alamat_kecamatan`, `wargabelajar_alamat_kabupaten`, `wargabelajar_alamat_provinsi`, `wargabelajar_alamat_kodepos`, `wargabelajar_kejar`, `wargabelajar_kejar_alamat`, `wargabelajar_sttb`, `wargabelajar_masuk`, `tahunajaran_id`, `wargabelajar_status`, `wargabelajar_foto`, `wargabelajar_password`, `orangtua_ayah_nama`, `orangtua_ayah_pekerjaan`, `orangtua_ayah_alamat_jalan`, `orangtua_ayah_alamat_rtrw`, `orangtua_ayah_alamat_desa`, `orangtua_ayah_alamat_kecamatan`, `orangtua_ayah_alamat_kabupaten`, `orangtua_ayah_alamat_provinsi`, `orangtua_ayah_alamat_kodepos`, `orangtua_ibu_nama`, `orangtua_wali_nama`, `orangtua_wali_pekerjaan`, `orangtua_wali_alamat_jalan`, `orangtua_wali_alamat_rtrw`, `orangtua_wali_alamat_desa`, `orangtua_wali_alamat_kecamatan`, `orangtua_wali_alamat_kabupaten`, `orangtua_wali_alamat_provinsi`, `orangtua_wali_alamat_kodepos`) VALUES
('5df8c2b2d14b8', '171807010', '9999744534', 'Ikhwan Sopyan', 'Pria', 'Kota Tasikmalaya', '1999-02-08', 'Islam', 'WNI', 'Sukagenah', '003/004', 'Sambongjaya', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'SDN Sambong Permai', 'Sambong Permai', 'DN-02 Dd 0447031', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '00e51f91c99fb69891a4614539199541', 'Yayan Sopyan', 'Wiraswasta', 'Sukagenah', '003/004', 'Sambongjaya', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Ika Sumartika', '', '', '', '', '', '', '', '', ''),
('5df8c9b8e20e9', '171807011', '0001162375', 'Maulana Sabirin', 'Pria', 'Tasikmalaya', '2000-01-25', 'Islam', NULL, 'Citamiang', '004/008', 'Tanjung', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'SDN Tanjung I', '', 'DN-02 Dd 0743335', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '4338659c44507ea7b7301a80c43d0a0f', 'E. Sutisna', 'Buruh', 'Citamiang', '004/008', 'Tanjung', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Empay', '', '', '', '', '', '', '', '', ''),
('5df8cbbfd492d', '171807012', '0028750718', 'Muhammad Ramadhani', 'Pria', 'Ciamis', '2002-11-18', 'Islam', NULL, 'Ciherang', '021/008', 'Sukasenang', 'Sindangkasih', 'Kabupaten Ciamis', 'Jawa Barat', '', 'SDN 2 Sukasenang', '', 'DN-02 Dd 0393525', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '45ede21366872bb60b670250d89d4201', 'Sopyan Saori', 'Buruh', 'Ciherang', '021/008', 'Sukasenang', 'Sindangkasih', 'Kabupaten Ciamis', 'Jawa Barat', '', 'Nunung Nurjanah', '', '', '', '', '', '', '', '', ''),
('5df8cc7a68b47', '171807013', '9957772263', 'Nanang Nurdiana', 'Pria', 'Tasikmalaya', '1995-10-17', 'Islam', NULL, 'Gargadung', '003/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'SDN Cigantang II', '', 'DN-02Dd 0652357', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '0f3b918d7abe4e7c8edcb4507560f1d3', 'Juju', 'Buruh', 'Gargadung', '003/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'Maesaroh', '', '', '', '', '', '', '', '', ''),
('5df8ce3c7570f', '171807014', '9809430487', 'Nia Kurniawati', 'Wanita', 'Tasikmalaya', '1980-07-06', 'Islam', NULL, 'Gargadung', '001/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'SDN Sambongpari', '', '02 0A oa 0684123', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '44337d85ba7d91db906c26c47ab99ed6', 'Ano Karno', 'Buruh', 'Gargadung', '001/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'Maryati', '', '', '', '', '', '', '', '', ''),
('5dfc3f1b90991', '171807015', '9980731840', 'Amat Rustendi', 'Pria', 'Tasikmalaya', '2018-07-16', 'Islam', '', '', '', '', '', '', '', '', 'SMPN 20 Tasikmalaya', '', 'DN-02 DI 0117579/14 Juni 2014', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '065f88a9a7f82a0baec5a6e337ed5a8a', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `jadwal_kelas` (`rombel_id`),
  ADD KEY `jadwal_matpel` (`matpel_id`),
  ADD KEY `tahunajaran_id` (`tahunajaran_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD UNIQUE KEY `kelas_nama` (`kelas_nama`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`masukan_id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`matpel_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `wargabelajar_id` (`wargabelajar_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indexes for table `nilai_details`
--
ALTER TABLE `nilai_details`
  ADD PRIMARY KEY (`nilai_details_id`),
  ADD KEY `nilai_id` (`nilai_id`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`pimpinan_id`),
  ADD UNIQUE KEY `pimpinan_username` (`pimpinan_username`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`presensi_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indexes for table `presensi_details`
--
ALTER TABLE `presensi_details`
  ADD PRIMARY KEY (`presensi_det_id`),
  ADD KEY `presensi_id` (`presensi_id`),
  ADD KEY `wargabelajar_id` (`wargabelajar_id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`rombel_id`),
  ADD KEY `tahunajaran_id` (`tahunajaran_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `rombel_details`
--
ALTER TABLE `rombel_details`
  ADD PRIMARY KEY (`rombel_details_id`),
  ADD KEY `rombel_id` (`rombel_id`),
  ADD KEY `wargabelajar_id` (`wargabelajar_id`),
  ADD KEY `wargabelajar_id_2` (`wargabelajar_id`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`tahunajaran_id`),
  ADD UNIQUE KEY `tahunajaran_nama` (`tahunajaran_nama`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `wargabelajar`
--
ALTER TABLE `wargabelajar`
  ADD PRIMARY KEY (`wargabelajar_id`),
  ADD UNIQUE KEY `wargabelajar_nisn` (`wargabelajar_nisn`),
  ADD UNIQUE KEY `wargabelajar_nomor_induk` (`wargabelajar_nomor_induk`),
  ADD KEY `tahun_ajaran_id_masuk` (`tahunajaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_details`
--
ALTER TABLE `nilai_details`
  MODIFY `nilai_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `presensi_details`
--
ALTER TABLE `presensi_details`
  MODIFY `presensi_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `rombel_details`
--
ALTER TABLE `rombel_details`
  MODIFY `rombel_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `from rombel to jadwal` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`rombel_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `from thn to jadwal` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tahunajaran` (`tahunajaran_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_matpel` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`matpel_id`) ON UPDATE CASCADE;

--
-- Constraints for table `matpel`
--
ALTER TABLE `matpel`
  ADD CONSTRAINT `tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `ke wargabelajar` FOREIGN KEY (`wargabelajar_id`) REFERENCES `wargabelajar` (`wargabelajar_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai_details`
--
ALTER TABLE `nilai_details`
  ADD CONSTRAINT `ke nilai` FOREIGN KEY (`nilai_id`) REFERENCES `nilai` (`nilai_id`) ON UPDATE CASCADE;

--
-- Constraints for table `presensi_details`
--
ALTER TABLE `presensi_details`
  ADD CONSTRAINT `presensi` FOREIGN KEY (`presensi_id`) REFERENCES `presensi` (`presensi_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wargabelajar` FOREIGN KEY (`wargabelajar_id`) REFERENCES `wargabelajar` (`wargabelajar_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tahunajaran` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tahunajaran` (`tahunajaran_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rombel_details`
--
ALTER TABLE `rombel_details`
  ADD CONSTRAINT `intab` FOREIGN KEY (`wargabelajar_id`) REFERENCES `wargabelajar` (`wargabelajar_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rombel` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`rombel_id`) ON UPDATE CASCADE;

--
-- Constraints for table `wargabelajar`
--
ALTER TABLE `wargabelajar`
  ADD CONSTRAINT `x` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tahunajaran` (`tahunajaran_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;