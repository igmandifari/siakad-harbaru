-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 10:58 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.15-3+ubuntu16.04.1+deb.sury.org+1

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
('5de15e4e0de9d', 'Zam Zam Saeful Bahtiar', 'bekerz18', 'a31c86d61e1c1773167ca7b5bf023f98', '5de15e4e0de9d.jpg', NULL, NULL),
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
  `tutor_id` varchar(100) NOT NULL,
  `rombel_id` varchar(100) NOT NULL,
  `jadwal_waktu` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `jadwal_tipe_pembelajaran`, `jadwal_hari`, `tahunajaran_id`, `matpel_id`, `tutor_id`, `rombel_id`, `jadwal_waktu`, `created_at`, `updated_at`) VALUES
('5dfc9c4b29ca8', 'Tatap Muka', 'Jum\'at', '5dfc3970e4387', '5dfc9b6d70641', '5dfc9b297a427', '5dfc397184367', '13:00-14:00', '2019-12-20 17:02:51', '0000-00-00 00:00:00'),
('5dfc9d1b7968b', 'Tatap Muka', 'Jum\'at', '5dfc3970e4387', '5dfc9b3db0980', '5dfc9a88e27cb', '5dfc397184367', '14:00-15:00', '2019-12-20 17:06:19', '0000-00-00 00:00:00'),
('5dfc9d36a3f25', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b496c0f2', '5dfc9aab6ada9', '5dfc397184367', '13:00-14:00', '2019-12-20 17:06:46', '2020-03-01 17:35:32'),
('5dfc9d620f773', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b5f4c607', '5dfc9a88e27cb', '5dfc397184367', '14:00-15:00', '2019-12-20 17:07:30', '0000-00-00 00:00:00'),
('5dfc9da09b91e', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5df84e99f335f', '5df69881a9a58', '5dfc397184367', '13:00-14:00', '2019-12-20 17:08:32', '0000-00-00 00:00:00'),
('5dfc9e164dcf0', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5dfc9b8d1a405', '5df69881a9a58', '5dfc397184367', '14:00-15:00', '2019-12-20 17:10:30', '0000-00-00 00:00:00'),
('5e09494499b1d', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b3db0980', '5dfc9a88e27cb', '5dfc397155e30', '14:00-15:00', '2019-12-30 07:48:04', '0000-00-00 00:00:00'),
('5e54f5c72eb82', 'Mandiri', NULL, '5dfc3970e4387', '5df84e99f335f', '5df69881a9a58', '5dfc397184367', NULL, '2020-02-25 17:24:07', '0000-00-00 00:00:00'),
('5e5b913fde20d', 'Tutorial', NULL, '5dfc3970e4387', '5df84eb0476f9', '5ded0e21b5aea', '5dfc397184367', NULL, '2020-03-01 17:41:03', '0000-00-00 00:00:00'),
('5e617de11c2ed', 'Tatap Muka', 'Jum\'at', '5dfc3966f0b29', '5dfc9b5f4c607', '5dfc9a88e27cb', '5e617d681e1d3', '13:00-14:00', '2020-03-06 05:32:01', '0000-00-00 00:00:00'),
('5e6180634f9a9', 'Mandiri', NULL, '5dfc3966f0b29', '5dfc9c2a3f68d', '5dfc9bafd6bb6', '5e617d681e1d3', NULL, '2020-03-06 05:42:43', '0000-00-00 00:00:00');

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
('5df888b63addd', 'Kelas IX', '2019-12-17 14:50:14', NULL),
('5df888c17d8f0', 'Kelas XI', '2019-12-17 14:50:25', NULL),
('5e4b45170cbf0', 'Kelas X', '2020-02-18 08:59:51', NULL),
('5e4b452603afd', 'Kelas XII', '2020-02-18 09:00:06', NULL),
('5e4b453121502', 'Kelas VII', '2020-02-18 09:00:17', NULL),
('5e4b45398dee1', 'Kelas VIII', '2020-02-18 09:00:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `users` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `times` datetime NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `users`, `level`, `name`, `url`, `ip`, `times`, `browser`, `os`) VALUES
(1, '5de15e4e0de9d', 0, NULL, 'admin///', '127.0.0.1', '0000-00-00 00:00:00', '73.0', 'Linux'),
(2, '5de15e4e0de9d', 0, NULL, 'admin///', '127.0.0.1', '2020-03-06 09:30:09', 'Firefox 73.0', 'Linux'),
(3, '5de15e4e0de9d', 0, NULL, 'matpel///', '127.0.0.1', '2020-03-06 09:37:30', 'Firefox 73.0', 'Linux'),
(4, '5de15e4e0de9d', 0, NULL, 'matpel/tambah//', '127.0.0.1', '2020-03-06 09:37:40', 'Firefox 73.0', 'Linux'),
(5, '5de15e4e0de9d', 0, NULL, 'kiri///', '127.0.0.1', '2020-03-06 09:40:54', 'Firefox 73.0', 'Linux'),
(6, '5de15e4e0de9d', 0, NULL, 'auth/logout//', '127.0.0.1', '2020-03-06 09:41:48', 'Firefox 73.0', 'Linux'),
(7, NULL, NULL, NULL, 'auth/logout//', '127.0.0.1', '2020-03-06 09:43:06', 'Firefox 73.0', 'Linux'),
(8, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 09:43:06', 'Firefox 73.0', 'Linux'),
(9, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 09:45:27', 'Firefox 73.0', 'Linux'),
(10, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 09:45:27', 'Firefox 73.0', 'Linux'),
(11, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '127.0.0.1', '2020-03-06 09:45:46', 'Firefox 73.0', 'Linux'),
(12, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '127.0.0.1', '2020-03-06 09:45:53', 'Firefox 73.0', 'Linux'),
(13, '5de15e4e0de9d', 0, NULL, 'kelas///', '127.0.0.1', '2020-03-06 09:45:56', 'Firefox 73.0', 'Linux'),
(14, '5de15e4e0de9d', 0, NULL, 'kelas/rombel//', '127.0.0.1', '2020-03-06 09:45:58', 'Firefox 73.0', 'Linux'),
(15, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel///', '127.0.0.1', '2020-03-06 09:46:00', 'Firefox 73.0', 'Linux'),
(16, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel/tambah//', '127.0.0.1', '2020-03-06 09:46:03', 'Firefox 73.0', 'Linux'),
(17, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '127.0.0.1', '2020-03-06 09:46:04', 'Firefox 73.0', 'Linux'),
(18, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'admin///', '127.0.0.1', '2020-03-06 09:46:08', 'Firefox 73.0', 'Linux'),
(19, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'admin/tambah//', '127.0.0.1', '2020-03-06 09:46:10', 'Firefox 73.0', 'Linux'),
(20, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pimpinan///', '127.0.0.1', '2020-03-06 09:46:13', 'Firefox 73.0', 'Linux'),
(21, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pimpinan/tambah//', '127.0.0.1', '2020-03-06 09:46:19', 'Firefox 73.0', 'Linux'),
(22, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran///', '127.0.0.1', '2020-03-06 09:46:22', 'Firefox 73.0', 'Linux'),
(23, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran/tambah//', '127.0.0.1', '2020-03-06 09:46:24', 'Firefox 73.0', 'Linux'),
(24, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'rekapmasukan///', '127.0.0.1', '2020-03-06 09:46:26', 'Firefox 73.0', 'Linux'),
(25, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'panduan///', '127.0.0.1', '2020-03-06 09:46:35', 'Firefox 73.0', 'Linux'),
(26, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '127.0.0.1', '2020-03-06 09:46:46', 'Firefox 73.0', 'Linux'),
(27, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '127.0.0.1', '2020-03-06 09:46:52', 'Firefox 73.0', 'Linux'),
(28, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '127.0.0.1', '2020-03-06 09:46:57', 'Firefox 73.0', 'Linux'),
(29, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 09:46:57', 'Firefox 73.0', 'Linux'),
(30, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 09:47:01', 'Firefox 73.0', 'Linux'),
(31, '5dfc3f1b90991', 1, 'Amat Rustendi', 'dasbor///', '127.0.0.1', '2020-03-06 09:47:01', 'Firefox 73.0', 'Linux'),
(32, '5dfc3f1b90991', 1, 'Amat Rustendi', 'jadwalbelajar///', '127.0.0.1', '2020-03-06 09:47:04', 'Firefox 73.0', 'Linux'),
(33, '5dfc3f1b90991', 1, 'Amat Rustendi', 'rekappresensi///', '127.0.0.1', '2020-03-06 09:47:06', 'Firefox 73.0', 'Linux'),
(34, '5dfc3f1b90991', 1, 'Amat Rustendi', 'rekapnilai///', '127.0.0.1', '2020-03-06 09:47:08', 'Firefox 73.0', 'Linux'),
(35, '5dfc3f1b90991', 1, 'Amat Rustendi', 'panduan///', '127.0.0.1', '2020-03-06 09:47:10', 'Firefox 73.0', 'Linux'),
(36, '5dfc3f1b90991', 1, 'Amat Rustendi', 'pengaturan///', '127.0.0.1', '2020-03-06 09:47:13', 'Firefox 73.0', 'Linux'),
(37, '5dfc3f1b90991', 1, 'Amat Rustendi', 'auth/logout//', '127.0.0.1', '2020-03-06 09:47:16', 'Firefox 73.0', 'Linux'),
(38, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 09:47:16', 'Firefox 73.0', 'Linux'),
(39, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 09:47:22', 'Firefox 73.0', 'Linux'),
(40, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '127.0.0.1', '2020-03-06 09:47:22', 'Firefox 73.0', 'Linux'),
(41, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'jadwalmengajar///', '127.0.0.1', '2020-03-06 09:47:24', 'Firefox 73.0', 'Linux'),
(42, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '127.0.0.1', '2020-03-06 09:47:26', 'Firefox 73.0', 'Linux'),
(43, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'panduan///', '127.0.0.1', '2020-03-06 09:47:29', 'Firefox 73.0', 'Linux'),
(44, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'pengaturan///', '127.0.0.1', '2020-03-06 09:47:34', 'Firefox 73.0', 'Linux'),
(45, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '127.0.0.1', '2020-03-06 09:47:37', 'Firefox 73.0', 'Linux'),
(46, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 09:47:37', 'Firefox 73.0', 'Linux'),
(47, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 09:52:53', 'Firefox 73.0', 'Linux'),
(48, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 09:52:53', 'Firefox 73.0', 'Linux'),
(49, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 09:53:07', 'Firefox 73.0', 'Linux'),
(50, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 09:56:21', 'Firefox 73.0', 'Linux'),
(51, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 09:58:39', 'Firefox 73.0', 'Linux'),
(52, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:01:43', 'Firefox 73.0', 'Linux'),
(53, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:02:04', 'Firefox 73.0', 'Linux'),
(54, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:02:45', 'Firefox 73.0', 'Linux'),
(55, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:02:55', 'Firefox 73.0', 'Linux'),
(56, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:03:04', 'Firefox 73.0', 'Linux'),
(57, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:04:32', 'Firefox 73.0', 'Linux'),
(58, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:04:52', 'Firefox 73.0', 'Linux'),
(59, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:09:42', 'Firefox 73.0', 'Linux'),
(60, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:13:13', 'Firefox 73.0', 'Linux'),
(61, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:29:01', 'Firefox 73.0', 'Linux'),
(62, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:30:46', 'Firefox 73.0', 'Linux'),
(63, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:30:58', 'Firefox 73.0', 'Linux'),
(64, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:33:04', 'Firefox 73.0', 'Linux'),
(65, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:34:11', 'Firefox 73.0', 'Linux'),
(66, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:34:33', 'Firefox 73.0', 'Linux'),
(67, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/logs//', '127.0.0.1', '2020-03-06 10:35:23', 'Firefox 73.0', 'Linux'),
(68, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/logs//', '127.0.0.1', '2020-03-06 10:35:27', 'Firefox 73.0', 'Linux'),
(69, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '127.0.0.1', '2020-03-06 10:36:20', 'Firefox 73.0', 'Linux'),
(70, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'admin///', '127.0.0.1', '2020-03-06 10:38:32', 'Firefox 73.0', 'Linux'),
(71, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'admin///', '127.0.0.1', '2020-03-06 10:39:19', 'Firefox 73.0', 'Linux'),
(72, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'admin/tambah//', '127.0.0.1', '2020-03-06 10:40:07', 'Firefox 73.0', 'Linux'),
(73, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'admin/tambah//', '127.0.0.1', '2020-03-06 10:40:21', 'Firefox 73.0', 'Linux'),
(74, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:41:31', 'Firefox 73.0', 'Linux'),
(75, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:41:31', 'Firefox 73.0', 'Linux'),
(76, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:41:44', 'Firefox 73.0', 'Linux'),
(77, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:41:44', 'Firefox 73.0', 'Linux'),
(78, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:41:47', 'Firefox 73.0', 'Linux'),
(79, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:41:47', 'Firefox 73.0', 'Linux'),
(80, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:42:00', 'Firefox 73.0', 'Linux'),
(81, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:42:00', 'Firefox 73.0', 'Linux'),
(82, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '127.0.0.1', '2020-03-06 10:42:06', 'Firefox 73.0', 'Linux'),
(83, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '127.0.0.1', '2020-03-06 10:43:40', 'Firefox 73.0', 'Linux'),
(84, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '127.0.0.1', '2020-03-06 10:43:45', 'Firefox 73.0', 'Linux'),
(85, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '127.0.0.1', '2020-03-06 10:44:40', 'Firefox 73.0', 'Linux'),
(86, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '127.0.0.1', '2020-03-06 10:44:52', 'Firefox 73.0', 'Linux'),
(87, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel/tambah//', '127.0.0.1', '2020-03-06 10:45:08', 'Firefox 73.0', 'Linux'),
(88, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel///', '127.0.0.1', '2020-03-06 10:45:11', 'Firefox 73.0', 'Linux'),
(89, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '127.0.0.1', '2020-03-06 10:45:17', 'Firefox 73.0', 'Linux'),
(90, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '127.0.0.1', '2020-03-06 10:45:20', 'Firefox 73.0', 'Linux'),
(91, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/ubah/5dfc3970e4387/5dfc9e164dcf0', '127.0.0.1', '2020-03-06 10:45:24', 'Firefox 73.0', 'Linux'),
(92, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas///', '127.0.0.1', '2020-03-06 10:46:19', 'Firefox 73.0', 'Linux'),
(93, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/tambah//', '127.0.0.1', '2020-03-06 10:47:01', 'Firefox 73.0', 'Linux'),
(94, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel//', '127.0.0.1', '2020-03-06 10:47:18', 'Firefox 73.0', 'Linux'),
(95, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/tambah//', '127.0.0.1', '2020-03-06 10:47:20', 'Firefox 73.0', 'Linux'),
(96, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel//', '127.0.0.1', '2020-03-06 10:47:48', 'Firefox 73.0', 'Linux'),
(97, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas///', '127.0.0.1', '2020-03-06 10:47:52', 'Firefox 73.0', 'Linux'),
(98, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel///', '127.0.0.1', '2020-03-06 10:47:56', 'Firefox 73.0', 'Linux'),
(99, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'rekapmasukan///', '127.0.0.1', '2020-03-06 10:48:42', 'Firefox 73.0', 'Linux'),
(100, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'panduan///', '127.0.0.1', '2020-03-06 10:50:10', 'Firefox 73.0', 'Linux'),
(101, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '127.0.0.1', '2020-03-06 10:50:48', 'Firefox 73.0', 'Linux'),
(102, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '127.0.0.1', '2020-03-06 10:50:52', 'Firefox 73.0', 'Linux'),
(103, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 10:50:52', 'Firefox 73.0', 'Linux'),
(104, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 10:50:57', 'Firefox 73.0', 'Linux'),
(105, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '127.0.0.1', '2020-03-06 10:50:57', 'Firefox 73.0', 'Linux'),
(106, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '127.0.0.1', '2020-03-06 10:50:57', 'Firefox 73.0', 'Linux'),
(107, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '127.0.0.1', '2020-03-06 10:51:26', 'Firefox 73.0', 'Linux'),
(108, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '127.0.0.1', '2020-03-06 10:51:26', 'Firefox 73.0', 'Linux'),
(109, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '127.0.0.1', '2020-03-06 10:52:10', 'Firefox 73.0', 'Linux'),
(110, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'panduan///', '127.0.0.1', '2020-03-06 10:53:08', 'Firefox 73.0', 'Linux'),
(111, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'panduan///', '127.0.0.1', '2020-03-06 10:53:59', 'Firefox 73.0', 'Linux'),
(112, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'pengaturan///', '127.0.0.1', '2020-03-06 10:54:01', 'Firefox 73.0', 'Linux'),
(113, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '127.0.0.1', '2020-03-06 10:54:05', 'Firefox 73.0', 'Linux'),
(114, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/', '127.0.0.1', '2020-03-06 10:54:08', 'Firefox 73.0', 'Linux'),
(115, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '127.0.0.1', '2020-03-06 10:54:13', 'Firefox 73.0', 'Linux'),
(116, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 10:54:13', 'Firefox 73.0', 'Linux'),
(117, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 10:54:17', 'Firefox 73.0', 'Linux'),
(118, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:54:17', 'Firefox 73.0', 'Linux'),
(119, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:54:17', 'Firefox 73.0', 'Linux'),
(120, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '127.0.0.1', '2020-03-06 10:55:21', 'Firefox 73.0', 'Linux'),
(121, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:55:24', 'Firefox 73.0', 'Linux'),
(122, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:55:24', 'Firefox 73.0', 'Linux'),
(123, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '127.0.0.1', '2020-03-06 10:55:32', 'Firefox 73.0', 'Linux'),
(124, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:55:35', 'Firefox 73.0', 'Linux'),
(125, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:55:35', 'Firefox 73.0', 'Linux'),
(126, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '127.0.0.1', '2020-03-06 10:55:39', 'Firefox 73.0', 'Linux'),
(127, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '127.0.0.1', '2020-03-06 10:55:42', 'Firefox 73.0', 'Linux'),
(128, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '127.0.0.1', '2020-03-06 10:55:44', 'Firefox 73.0', 'Linux'),
(129, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'panduan///', '127.0.0.1', '2020-03-06 10:55:46', 'Firefox 73.0', 'Linux'),
(130, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '127.0.0.1', '2020-03-06 10:55:48', 'Firefox 73.0', 'Linux'),
(131, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'panduan///', '127.0.0.1', '2020-03-06 10:55:53', 'Firefox 73.0', 'Linux'),
(132, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '127.0.0.1', '2020-03-06 10:55:55', 'Firefox 73.0', 'Linux'),
(133, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:56:01', 'Firefox 73.0', 'Linux'),
(134, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:56:01', 'Firefox 73.0', 'Linux'),
(135, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '127.0.0.1', '2020-03-06 10:56:14', 'Firefox 73.0', 'Linux'),
(136, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:56:16', 'Firefox 73.0', 'Linux'),
(137, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:56:17', 'Firefox 73.0', 'Linux'),
(138, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '127.0.0.1', '2020-03-06 10:56:21', 'Firefox 73.0', 'Linux'),
(139, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '127.0.0.1', '2020-03-06 10:56:45', 'Firefox 73.0', 'Linux'),
(140, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'panduan///', '127.0.0.1', '2020-03-06 10:56:46', 'Firefox 73.0', 'Linux'),
(141, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:56:50', 'Firefox 73.0', 'Linux'),
(142, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '127.0.0.1', '2020-03-06 10:56:50', 'Firefox 73.0', 'Linux'),
(143, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '127.0.0.1', '2020-03-06 10:56:52', 'Firefox 73.0', 'Linux'),
(144, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 10:56:52', 'Firefox 73.0', 'Linux'),
(145, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 10:56:55', 'Firefox 73.0', 'Linux'),
(146, NULL, NULL, NULL, 'auth/cek_login//', '127.0.0.1', '2020-03-06 10:57:00', 'Firefox 73.0', 'Linux'),
(147, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:57:00', 'Firefox 73.0', 'Linux'),
(148, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '127.0.0.1', '2020-03-06 10:57:00', 'Firefox 73.0', 'Linux'),
(149, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '127.0.0.1', '2020-03-06 10:57:17', 'Firefox 73.0', 'Linux'),
(150, NULL, NULL, NULL, 'auth///', '127.0.0.1', '2020-03-06 10:57:17', 'Firefox 73.0', 'Linux');

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

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `matpel_id` varchar(100) NOT NULL,
  `matpel_nama` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`matpel_id`, `matpel_nama`, `created_at`, `updated_at`) VALUES
('5df84e99f335f', 'Bahasa Indonesia', '2019-12-17 10:42:17', NULL),
('5df84eb0476f9', 'Teknologi Informasi dan Komunikasi', '2019-12-17 10:42:40', NULL),
('5dfc9b3db0980', 'Geografi', '2019-12-20 16:58:21', NULL),
('5dfc9b496c0f2', 'Matematika', '2019-12-20 16:58:33', NULL),
('5dfc9b5f4c607', 'Sosiologi', '2019-12-20 16:58:55', NULL),
('5dfc9b6d70641', 'Ekonomi', '2019-12-20 16:59:09', NULL),
('5dfc9b8d1a405', 'Pendidikan Pancasila dan Kewarganegaraan', '2019-12-20 16:59:41', NULL),
('5dfc9c2a3f68d', 'Pendidikan Agama Islam', '2019-12-20 17:02:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` varchar(100) NOT NULL,
  `jadwal_id` varchar(100) NOT NULL,
  `wargabelajar_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `jadwal_id`, `wargabelajar_id`, `created_at`, `updated_at`) VALUES
('5e29cff0e4096', '5dfc9e164dcf0', '5df8cc7a68b47', '2020-01-23 23:55:12', '0000-00-00 00:00:00'),
('5e29dbf32d70c', '5dfc9da09b91e', '5df8cc7a68b47', '2020-01-24 00:46:27', '0000-00-00 00:00:00'),
('5e2a1c8343b8b', '5dfc9da09b91e', '5df8c9b8e20e9', '2020-01-24 05:21:55', '0000-00-00 00:00:00'),
('5e2a2428288a2', '5dfc9da09b91e', '5df8cc7a68b47', '2020-01-24 05:54:32', '0000-00-00 00:00:00'),
('5e355a36107e3', '5dfc9da09b91e', '5df8ce3c7570f', '2020-02-01 18:00:06', '0000-00-00 00:00:00'),
('5e43af91e612c', '5dfc9da09b91e', '5df8c9b8e20e9', '2020-02-12 14:56:01', '0000-00-00 00:00:00'),
('5e43afa2cc669', '5dfc9da09b91e', '5df8ce3c7570f', '2020-02-12 14:56:18', '0000-00-00 00:00:00'),
('5e54f1860cb0f', '5dfc9e164dcf0', '5df8c9b8e20e9', '2020-02-25 17:05:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_details`
--

CREATE TABLE `nilai_details` (
  `nilai_details_id` int(11) NOT NULL,
  `nilai_id` varchar(100) NOT NULL,
  `nilai_details_jenis` enum('Tugas','Harian','PTS','PAS','PAT') NOT NULL,
  `nilai_details_nilai` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_details`
--

INSERT INTO `nilai_details` (`nilai_details_id`, `nilai_id`, `nilai_details_jenis`, `nilai_details_nilai`, `created_at`, `updated_at`) VALUES
(12, '5e29dbf32d70c', 'Tugas', 100, '2020-02-02 10:50:54', '0000-00-00 00:00:00'),
(27, '5e29dbf32d70c', 'Harian', 100, '2020-02-17 11:02:26', '0000-00-00 00:00:00'),
(33, '5e2a1c8343b8b', 'Tugas', 100, '2020-02-25 10:27:57', '0000-00-00 00:00:00'),
(34, '5e2a1c8343b8b', 'Harian', 100, '2020-02-25 10:28:03', '0000-00-00 00:00:00'),
(35, '5e2a1c8343b8b', 'PTS', 100, '2020-02-25 10:28:08', '0000-00-00 00:00:00'),
(36, '5e2a1c8343b8b', 'PAS', 100, '2020-02-25 10:28:30', '0000-00-00 00:00:00'),
(37, '5e2a1c8343b8b', 'PAT', 100, '2020-02-25 10:28:40', '0000-00-00 00:00:00'),
(38, '5e2a1c8343b8b', 'PTS', 100, '2020-02-25 10:34:35', '0000-00-00 00:00:00'),
(39, '5e2a1c8343b8b', 'Tugas', 100, '2020-02-25 10:36:12', '0000-00-00 00:00:00'),
(40, '5e2a1c8343b8b', 'Harian', 2, '2020-02-25 10:36:58', '0000-00-00 00:00:00');

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
('5ded07350f828', 'iyep', 'Iyep Saepumilah SH.I, M.Pd.I', '5ded07350f828.jpg', '8843028fefce50a6de50acdf064ded27', '0000-00-00 00:00:00', '2020-02-22 20:41:19');

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
('5e1ec915beb0b', '5dfc9c4b29ca8', '2020-01-15', '2020-01-15 15:11:04', '0000-00-00 00:00:00'),
('5e1f9a9a7c99f', '5dfc9d1b7968b', '2020-01-16', '2020-01-16 06:05:00', '0000-00-00 00:00:00'),
('5e323535e9d5c', '5dfc9da09b91e', '2020-01-30', '2020-01-30 08:45:29', '0000-00-00 00:00:00'),
('5e42317f07c45', '5dfc9da09b91e', '2020-02-11', '2020-02-11 11:45:53', '0000-00-00 00:00:00'),
('5e43936cb8a48', '5dfc9da09b91e', '2020-02-12', '2020-02-12 12:55:58', '0000-00-00 00:00:00'),
('5e43994e2182d', '5dfc9c4b29ca8', '2020-02-12', '2020-02-12 13:21:03', '0000-00-00 00:00:00'),
('5e43a00761aad', '5dfc9d1b7968b', '2020-02-12', '2020-02-12 13:49:45', '0000-00-00 00:00:00'),
('5e513bb5a5186', '5dfc9da09b91e', '2020-02-22', '2020-02-22 21:33:30', '0000-00-00 00:00:00');

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
(36, '5e1ec915beb0b', '5df8c9b8e20e9', 'A', '2020-02-12 13:20:08'),
(37, '5e1ec915beb0b', '5df8cbbfd492d', 'H', '0000-00-00 00:00:00'),
(38, '5e1ec915beb0b', '5df8cc7a68b47', 'H', '0000-00-00 00:00:00'),
(39, '5e1ec915beb0b', '5df8ce3c7570f', 'A', '0000-00-00 00:00:00'),
(40, '5e1ec915beb0b', '5dfc3f1b90991', 'H', '0000-00-00 00:00:00'),
(41, '5e1f9a9a7c99f', '5df8c9b8e20e9', 'S', '0000-00-00 00:00:00'),
(42, '5e1f9a9a7c99f', '5df8cbbfd492d', 'I', '0000-00-00 00:00:00'),
(43, '5e1f9a9a7c99f', '5df8cc7a68b47', 'H', '0000-00-00 00:00:00'),
(44, '5e1f9a9a7c99f', '5df8ce3c7570f', 'S', '0000-00-00 00:00:00'),
(45, '5e1f9a9a7c99f', '5dfc3f1b90991', 'H', '0000-00-00 00:00:00'),
(46, '5e323535e9d5c', '5df8c9b8e20e9', 'H', '2020-02-11 15:22:59'),
(47, '5e323535e9d5c', '5df8cbbfd492d', 'I', '2020-01-30 08:45:33'),
(48, '5e323535e9d5c', '5df8cc7a68b47', 'A', '2020-01-30 08:45:29'),
(49, '5e323535e9d5c', '5df8ce3c7570f', 'A', '2020-01-30 08:45:29'),
(50, '5e323535e9d5c', '5dfc3f1b90991', 'A', '2020-01-30 08:45:29'),
(56, '5e42317f07c45', '5df8c9b8e20e9', 'S', '2020-02-11 15:22:52'),
(57, '5e42317f07c45', '5df8cbbfd492d', 'S', '2020-02-11 11:45:58'),
(58, '5e42317f07c45', '5df8cc7a68b47', 'H', '2020-02-11 11:45:59'),
(59, '5e42317f07c45', '5df8ce3c7570f', 'A', '2020-02-11 11:45:54'),
(60, '5e42317f07c45', '5dfc3f1b90991', 'A', '2020-02-11 11:45:54'),
(61, '5e43936cb8a48', '5df8c9b8e20e9', 'H', '2020-02-12 12:56:00'),
(62, '5e43936cb8a48', '5df8cbbfd492d', 'I', '2020-02-13 23:28:14'),
(63, '5e43936cb8a48', '5df8cc7a68b47', 'S', '2020-02-13 23:28:16'),
(64, '5e43936cb8a48', '5df8ce3c7570f', 'H', '2020-02-13 23:28:17'),
(65, '5e43936cb8a48', '5dfc3f1b90991', 'A', '2020-02-13 23:28:18'),
(66, '5e43994e2182d', '5df8c9b8e20e9', 'A', '2020-02-12 13:21:04'),
(67, '5e43994e2182d', '5df8cbbfd492d', 'A', '2020-02-12 13:21:04'),
(68, '5e43994e2182d', '5df8cc7a68b47', 'A', '2020-02-12 13:21:04'),
(69, '5e43994e2182d', '5df8ce3c7570f', 'A', '2020-02-12 13:21:04'),
(70, '5e43994e2182d', '5dfc3f1b90991', 'A', '2020-02-12 13:21:04'),
(71, '5e43a00761aad', '5df8c9b8e20e9', 'A', '2020-02-12 13:49:45'),
(72, '5e43a00761aad', '5df8cbbfd492d', 'A', '2020-02-12 13:49:45'),
(73, '5e43a00761aad', '5df8cc7a68b47', 'A', '2020-02-12 13:49:45'),
(74, '5e43a00761aad', '5df8ce3c7570f', 'A', '2020-02-12 13:49:45'),
(75, '5e43a00761aad', '5dfc3f1b90991', 'A', '2020-02-12 13:49:45'),
(76, '5e513bb5a5186', '5df8c9b8e20e9', 'I', '2020-02-27 10:55:08'),
(77, '5e513bb5a5186', '5df8cbbfd492d', 'S', '2020-02-22 21:33:34'),
(78, '5e513bb5a5186', '5df8cc7a68b47', 'A', '2020-02-22 21:33:30'),
(79, '5e513bb5a5186', '5df8ce3c7570f', 'A', '2020-02-22 21:33:30'),
(80, '5e513bb5a5186', '5dfc3f1b90991', 'A', '2020-02-22 21:33:30');

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
('5dfc397155e30', '5dfc3970e4387', '5df888b63addd', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5dfc397184367', '5dfc3970e4387', '5df888c17d8f0', '2019-12-20 10:01:05', '0000-00-00 00:00:00'),
('5e617d550cac4', '5dfc3966f0b29', '5df888b63addd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5e617d5ea2d2f', '5dfc3966f0b29', '5df888c17d8f0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5e617d681e1d3', '5dfc3966f0b29', '5e4b45170cbf0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(6, '5dfc397184367', '5dfc3f1b90991', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '5e617d681e1d3', '5df8c9b8e20e9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '5e617d681e1d3', '5df8cbbfd492d', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '5e617d681e1d3', '5df8cc7a68b47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '5e617d681e1d3', '5df8ce3c7570f', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '5e617d681e1d3', '5dfc3f1b90991', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `tahunajaran_id` varchar(100) NOT NULL,
  `tahunajaran_nama` varchar(50) NOT NULL,
  `open_nilai` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`tahunajaran_id`, `tahunajaran_nama`, `open_nilai`, `created_at`, `updated_at`) VALUES
('5dfc3966f0b29', '2017/2018', 0, '0000-00-00 00:00:00', '2020-01-28 16:57:19'),
('5dfc3970e4387', '2018/2019', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('5ded0e21b5aea', '1', 'Zam Zam Saeful Bahtiar', 'Pria', 'Tasikmalaya', '1999-05-18', 'Islam', 'WNI', 'SLTA Sederajat', 'Cihonje', '002/002', 'Karanganyar', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', 'b5be1ec647cc6d4786921e92e34eee1a', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
('5df8c9b8e20e9', '171807011', '0001162375', 'Maulana Sabirin', 'Pria', 'Tasikmalaya', '2000-01-25', 'Islam', 'WNI', 'Citamiang', '004/008', 'Tanjung', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'SDN Tanjung I', '', 'DN-02 Dd 0743335', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '4338659c44507ea7b7301a80c43d0a0f', 'E. Sutisna', 'Buruh', 'Citamiang', '004/008', 'Tanjung', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Empay', '', '', '', '', '', '', '', '', ''),
('5df8cbbfd492d', '171807012', '0028750718', 'Muhammad Ramadhani', 'Pria', 'Ciamis', '2002-11-18', 'Islam', NULL, 'Ciherang', '021/008', 'Sukasenang', 'Sindangkasih', 'Kabupaten Ciamis', 'Jawa Barat', '', 'SDN 2 Sukasenang', '', 'DN-02 Dd 0393525', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '45ede21366872bb60b670250d89d4201', 'Sopyan Saori', 'Buruh', 'Ciherang', '021/008', 'Sukasenang', 'Sindangkasih', 'Kabupaten Ciamis', 'Jawa Barat', '', 'Nunung Nurjanah', '', '', '', '', '', '', '', '', ''),
('5df8cc7a68b47', '171807013', '9957772263', 'Nanang Nurdiana', 'Pria', 'Tasikmalaya', '1995-10-17', 'Islam', NULL, 'Gargadung', '003/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'SDN Cigantang II', '', 'DN-02Dd 0652357', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '0f3b918d7abe4e7c8edcb4507560f1d3', 'Juju', 'Buruh', 'Gargadung', '003/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'Maesaroh', '', '', '', '', '', '', '', '', ''),
('5df8ce3c7570f', '171807014', '9809430487', 'Nia Kurniawati', 'Wanita', 'Tasikmalaya', '1980-07-06', 'Islam', NULL, 'Gargadung', '001/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'SDN Sambongpari', '', '02 0A oa 0684123', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '44337d85ba7d91db906c26c47ab99ed6', 'Ano Karno', 'Buruh', 'Gargadung', '001/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'Maryati', '', '', '', '', '', '', '', '', ''),
('5dfc3f1b90991', '171807015', '9980731840', 'Amat Rustendi', 'Pria', 'Tasikmalaya', '2018-07-16', 'Islam', '', '', '', '', '', '', '', '', 'SMPN 20 Tasikmalaya', '', 'DN-02 DI 0117579/14 Juni 2014', '2017-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '065f88a9a7f82a0baec5a6e337ed5a8a', 'Amatan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  ADD KEY `tahunajaran_id` (`tahunajaran_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD UNIQUE KEY `kelas_nama` (`kelas_nama`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `matpel_nama` (`matpel_nama`);

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
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `nilai_details`
--
ALTER TABLE `nilai_details`
  MODIFY `nilai_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `presensi_details`
--
ALTER TABLE `presensi_details`
  MODIFY `presensi_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `rombel_details`
--
ALTER TABLE `rombel_details`
  MODIFY `rombel_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `from rombel to jadwal` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`rombel_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `from thn to jadwal` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tahunajaran` (`tahunajaran_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_matpel` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`matpel_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`) ON UPDATE CASCADE;

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