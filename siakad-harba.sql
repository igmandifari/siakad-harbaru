-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2020 at 07:36 AM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawaluki_sh`
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
('5de15e4e0de9d', 'Zam Zam Saeful Bahtiar', 'bekerz18', 'a31c86d61e1c1773167ca7b5bf023f98', 'default.jpg', NULL, NULL),
('5de15e8a9ead8', 'Igman Difari', 'igman', 'b714337aa8007c433329ef43c7b8252c', 'default.jpg', NULL, NULL);

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
('5dfc9d620f773', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b5f4c607', '5dfc9a88e27cb', '5dfc397184367', '16:00-17:00', '2019-12-20 17:07:30', '2020-03-07 02:03:41'),
('5dfc9da09b91e', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5df84e99f335f', '5df69881a9a58', '5dfc397184367', '13:00-14:00', '2019-12-20 17:08:32', '0000-00-00 00:00:00'),
('5dfc9e164dcf0', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5dfc9b8d1a405', '5df69881a9a58', '5dfc397184367', '14:00-15:00', '2019-12-20 17:10:30', '0000-00-00 00:00:00'),
('5e09494499b1d', 'Tatap Muka', 'Sabtu', '5dfc3970e4387', '5dfc9b3db0980', '5dfc9a88e27cb', '5dfc397155e30', '14:00-15:00', '2019-12-30 07:48:04', '0000-00-00 00:00:00'),
('5e54f5c72eb82', 'Mandiri', NULL, '5dfc3970e4387', '5df84e99f335f', '5df69881a9a58', '5dfc397184367', NULL, '2020-02-25 17:24:07', '0000-00-00 00:00:00'),
('5e5b913fde20d', 'Tutorial', 'Minggu', '5dfc3970e4387', '5df84eb0476f9', '5ded0e21b5aea', '5dfc397184367', '16:00-17:00', '2020-03-01 17:41:03', '2020-03-07 00:06:58'),
('5e617de11c2ed', 'Tatap Muka', 'Jum\'at', '5dfc3966f0b29', '5dfc9b5f4c607', '5dfc9a88e27cb', '5e617d681e1d3', '13:00-14:00', '2020-03-06 05:32:01', '0000-00-00 00:00:00'),
('5e6180634f9a9', 'Mandiri', NULL, '5dfc3966f0b29', '5dfc9c2a3f68d', '5dfc9bafd6bb6', '5e617d681e1d3', NULL, '2020-03-06 05:42:43', '0000-00-00 00:00:00'),
('5e6302264f101', 'Mandiri', NULL, '5dfc3970e4387', '5dfc9c2a3f68d', '5dfc9bafd6bb6', '5dfc397184367', NULL, '2020-03-07 02:08:38', '0000-00-00 00:00:00'),
('5e6302bc9762c', 'Mandiri', NULL, '5dfc3970e4387', '5e6302a5c3168', '5e630292e06d1', '5dfc397184367', NULL, '2020-03-07 02:11:08', '0000-00-00 00:00:00'),
('5e63403fc1da4', 'Tatap Muka', 'Minggu', '5dfc3970e4387', '5df84e99f335f', '5dfc9a88e27cb', '5dfc397155e30', '13:00-14:00', '2020-03-07 06:33:35', '0000-00-00 00:00:00');

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
(1, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:03:14', 'Firefox 73.0', 'Linux'),
(2, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:03:14', 'Firefox 73.0', 'Linux'),
(3, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.72.236.165', '2020-03-06 04:03:23', 'Firefox 73.0', 'Linux'),
(4, NULL, NULL, NULL, 'auth///', '36.72.236.165', '2020-03-06 04:03:23', 'Firefox 73.0', 'Linux'),
(5, NULL, NULL, NULL, '///', '140.213.19.7', '2020-03-06 04:07:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(6, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:08:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(7, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 04:08:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(8, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:08:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(9, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:08:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(10, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:08:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(11, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 04:12:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(12, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 04:12:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(13, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 04:12:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(14, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 04:12:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(15, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:13:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(16, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:13:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(17, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.19.7', '2020-03-06 04:15:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(18, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.19.7', '2020-03-06 04:15:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(19, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(20, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(21, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(22, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(23, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(24, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(25, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(26, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(27, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(28, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(29, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(30, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(31, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(32, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(33, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9c4b29ca8', '140.213.19.7', '2020-03-06 04:16:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(34, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9c4b29ca8', '140.213.19.7', '2020-03-06 04:16:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(35, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', '///', '36.72.236.165', '2020-03-06 04:16:28', 'Firefox 73.0', 'Linux'),
(36, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:16:28', 'Firefox 73.0', 'Linux'),
(37, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:16:28', 'Firefox 73.0', 'Linux'),
(38, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(39, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(40, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.19.7', '2020-03-06 04:16:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(41, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.19.7', '2020-03-06 04:16:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(42, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.72.236.165', '2020-03-06 04:16:39', 'Firefox 73.0', 'Linux'),
(43, NULL, NULL, NULL, 'auth///', '36.72.236.165', '2020-03-06 04:16:39', 'Firefox 73.0', 'Linux'),
(44, NULL, NULL, NULL, 'auth/cek_login//', '36.72.236.165', '2020-03-06 04:16:44', 'Firefox 73.0', 'Linux'),
(45, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '36.72.236.165', '2020-03-06 04:16:44', 'Firefox 73.0', 'Linux'),
(46, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '36.72.236.165', '2020-03-06 04:16:44', 'Firefox 73.0', 'Linux'),
(47, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(48, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(49, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '36.72.236.165', '2020-03-06 04:16:47', 'Firefox 73.0', 'Linux'),
(50, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '36.72.236.165', '2020-03-06 04:16:47', 'Firefox 73.0', 'Linux'),
(51, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9d36a3f25', '140.213.19.7', '2020-03-06 04:16:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(52, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9d36a3f25', '140.213.19.7', '2020-03-06 04:16:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(53, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(54, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:16:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(55, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '36.72.236.165', '2020-03-06 04:16:53', 'Firefox 73.0', 'Linux'),
(56, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '36.72.236.165', '2020-03-06 04:16:53', 'Firefox 73.0', 'Linux'),
(57, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(58, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.19.7', '2020-03-06 04:16:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(59, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9e164dcf0', '36.72.236.165', '2020-03-06 04:16:56', 'Firefox 73.0', 'Linux'),
(60, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9e164dcf0', '36.72.236.165', '2020-03-06 04:16:56', 'Firefox 73.0', 'Linux'),
(61, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:17:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(62, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:17:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(63, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e617de11c2ed', '140.213.19.7', '2020-03-06 04:17:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(64, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e617de11c2ed', '140.213.19.7', '2020-03-06 04:17:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(65, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:17:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(66, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:17:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(67, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:17:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(68, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 04:17:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(69, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:17:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(70, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:17:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(71, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.19.7', '2020-03-06 04:17:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(72, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.19.7', '2020-03-06 04:17:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(73, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '36.72.236.165', '2020-03-06 04:17:26', 'Firefox 73.0', 'Linux'),
(74, NULL, NULL, NULL, 'auth///', '36.72.236.165', '2020-03-06 04:17:27', 'Firefox 73.0', 'Linux'),
(75, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '140.213.19.7', '2020-03-06 04:17:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(76, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 04:17:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(77, NULL, NULL, NULL, 'auth/cek_login//', '36.72.236.165', '2020-03-06 04:17:36', 'Firefox 73.0', 'Linux'),
(78, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:17:36', 'Firefox 73.0', 'Linux'),
(79, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:17:36', 'Firefox 73.0', 'Linux'),
(80, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/logs//', '36.72.236.165', '2020-03-06 04:17:43', 'Firefox 73.0', 'Linux'),
(81, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:17:58', 'Firefox 73.0', 'Linux'),
(82, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.72.236.165', '2020-03-06 04:17:58', 'Firefox 73.0', 'Linux'),
(83, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:18:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(84, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.19.7', '2020-03-06 04:18:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(85, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.19.7', '2020-03-06 04:18:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(86, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.72.236.165', '2020-03-06 04:18:19', 'Firefox 73.0', 'Linux'),
(87, NULL, NULL, NULL, 'auth///', '36.72.236.165', '2020-03-06 04:18:19', 'Firefox 73.0', 'Linux'),
(88, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '140.213.19.7', '2020-03-06 04:20:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(89, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 04:20:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(90, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:20:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(91, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:20:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(92, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:20:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(93, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 04:20:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(94, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 04:20:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(95, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 04:22:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(96, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 04:22:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(97, NULL, NULL, NULL, '///', '140.213.19.7', '2020-03-06 04:23:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(98, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:23:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(99, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:23:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(100, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:23:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(101, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:23:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(102, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 04:23:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(103, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '140.213.19.7', '2020-03-06 04:24:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(104, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 04:24:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(105, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:24:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(106, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 04:24:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(107, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 04:24:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(108, '5de15e8a9ead8', 0, 'Igman Difari', 'panduan///', '140.213.19.7', '2020-03-06 04:24:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(109, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:25:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(110, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 04:25:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(111, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '140.213.19.7', '2020-03-06 04:25:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(112, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 04:25:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(113, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 04:25:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(114, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 04:25:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(115, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 04:25:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(116, NULL, NULL, NULL, '///', '140.213.19.7', '2020-03-06 08:57:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(117, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 08:58:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(118, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 08:58:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(119, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 08:58:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(120, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 08:58:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(121, '5de15e8a9ead8', 0, 'Igman Difari', 'panduan///', '140.213.19.7', '2020-03-06 09:04:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(122, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:04:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(123, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:04:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(124, '5de15e8a9ead8', 0, 'Igman Difari', 'admin///', '140.213.19.7', '2020-03-06 09:08:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(125, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 09:08:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(126, '5de15e8a9ead8', 0, 'Igman Difari', 'admin///', '140.213.19.7', '2020-03-06 09:08:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(127, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:08:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(128, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:08:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(129, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 09:08:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(130, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:13:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(131, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:13:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(132, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 09:13:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(133, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 09:13:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(134, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:14:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(135, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:14:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(136, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 09:14:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(137, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:18:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(138, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:18:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(139, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.19.7', '2020-03-06 09:18:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(140, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.19.7', '2020-03-06 09:19:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(141, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5dfc3f1b90991/', '140.213.19.7', '2020-03-06 09:19:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(142, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor///', '140.213.19.7', '2020-03-06 09:19:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(143, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor/tambah//', '140.213.19.7', '2020-03-06 09:19:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(144, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.19.7', '2020-03-06 09:19:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(145, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel///', '140.213.19.7', '2020-03-06 09:19:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(146, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.19.7', '2020-03-06 09:19:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(147, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.19.7', '2020-03-06 09:20:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(148, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.19.7', '2020-03-06 09:20:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(149, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.19.7', '2020-03-06 09:20:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(150, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.19.7', '2020-03-06 09:20:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(151, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel///', '140.213.19.7', '2020-03-06 09:20:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(152, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel/tambah//', '140.213.19.7', '2020-03-06 09:20:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(153, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.19.7', '2020-03-06 09:20:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(154, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.19.7', '2020-03-06 09:20:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(155, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/tambah_rombel//', '140.213.19.7', '2020-03-06 09:21:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(156, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.19.7', '2020-03-06 09:21:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(157, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/tambah//', '140.213.19.7', '2020-03-06 09:21:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(158, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.19.7', '2020-03-06 09:21:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(159, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.19.7', '2020-03-06 09:21:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(160, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 09:21:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(161, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 09:21:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(162, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:21:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(163, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:21:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(164, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.19.7', '2020-03-06 09:21:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(165, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e323535e9d5c', '140.213.19.7', '2020-03-06 09:22:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(166, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.19.7', '2020-03-06 09:22:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(167, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/presensi_baru//', '140.213.19.7', '2020-03-06 09:22:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(168, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e621644d5460', '140.213.19.7', '2020-03-06 09:22:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(169, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:22:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(170, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:22:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(171, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '140.213.19.7', '2020-03-06 09:22:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(172, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/matpel/5dfc9da09b91e/5df8c9b8e20e9', '140.213.19.7', '2020-03-06 09:22:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(173, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getnilais/5e2a1c8343b8b/', '140.213.19.7', '2020-03-06 09:22:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(174, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/countNilai/5e2a1c8343b8b/', '140.213.19.7', '2020-03-06 09:22:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(175, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:23:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(176, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:23:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(177, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '140.213.19.7', '2020-03-06 09:23:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(178, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/', '140.213.19.7', '2020-03-06 09:23:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(179, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'jadwalmengajar///', '140.213.19.7', '2020-03-06 09:23:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(180, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '140.213.19.7', '2020-03-06 09:23:53', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(181, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'jadwalmengajar///', '140.213.19.7', '2020-03-06 09:24:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(182, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(183, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(184, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.19.7', '2020-03-06 09:24:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(185, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 09:24:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(186, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 09:24:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(187, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(188, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(189, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.19.7', '2020-03-06 09:24:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(190, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.19.7', '2020-03-06 09:24:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(191, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(192, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(193, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.19.7', '2020-03-06 09:24:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(194, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.19.7', '2020-03-06 09:24:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(195, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(196, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:24:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(197, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '140.213.19.7', '2020-03-06 09:24:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(198, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '140.213.19.7', '2020-03-06 09:24:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(199, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.19.7', '2020-03-06 09:24:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(200, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.19.7', '2020-03-06 09:25:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(201, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 09:25:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(202, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 09:25:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(203, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:25:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(204, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.19.7', '2020-03-06 09:25:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(205, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan///', '140.213.19.7', '2020-03-06 09:25:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(206, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.19.7', '2020-03-06 09:25:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(207, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.19.7', '2020-03-06 09:25:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(208, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.19.7', '2020-03-06 09:25:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(209, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 09:25:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(210, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 09:25:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(211, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:25:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(212, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.19.7', '2020-03-06 09:25:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(213, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.19.7', '2020-03-06 09:25:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(214, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.19.7', '2020-03-06 09:25:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(215, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 09:25:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(216, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 09:25:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(217, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:25:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(218, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:25:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(219, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.19.7', '2020-03-06 09:25:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(220, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '140.213.19.7', '2020-03-06 09:25:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(221, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'masukan///', '140.213.19.7', '2020-03-06 09:26:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(222, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'masukan/history_masukan//', '140.213.19.7', '2020-03-06 09:26:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(223, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '140.213.19.7', '2020-03-06 09:26:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(224, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:26:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(225, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.19.7', '2020-03-06 09:26:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(226, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.19.7', '2020-03-06 09:26:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(227, NULL, NULL, NULL, 'auth///', '140.213.19.7', '2020-03-06 09:26:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(228, NULL, NULL, NULL, 'auth/cek_login//', '140.213.19.7', '2020-03-06 09:26:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(229, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 09:26:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(230, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.19.7', '2020-03-06 09:26:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(231, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 09:26:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(232, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 09:26:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(233, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 09:26:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(234, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 09:26:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(235, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 09:26:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(236, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 09:26:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(237, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 09:26:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(238, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.19.7', '2020-03-06 09:26:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(239, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 09:26:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(240, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 09:26:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(241, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.19.7', '2020-03-06 09:27:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(242, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.19.7', '2020-03-06 09:27:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(243, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.19.7', '2020-03-06 09:27:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(244, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.19.7', '2020-03-06 09:27:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(245, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'panduan///', '140.213.19.7', '2020-03-06 09:27:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(246, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'pengaturan///', '140.213.19.7', '2020-03-06 09:27:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(247, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 09:27:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(248, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.19.7', '2020-03-06 09:27:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(249, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 09:27:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(250, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.19.7', '2020-03-06 09:27:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(251, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 09:27:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(252, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.19.7', '2020-03-06 09:27:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(253, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-06 15:01:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(254, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:03:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(255, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:03:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(256, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:03:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(257, '5de15e8a9ead8', 0, 'Igman Difari', '///', '140.213.17.148', '2020-03-06 15:04:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(258, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:04:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(259, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:04:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(260, '5de15e8a9ead8', 0, 'Igman Difari', 'panduan///', '140.213.17.148', '2020-03-06 15:06:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(261, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-06 15:07:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(262, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5dfc3f1b90991/', '140.213.17.148', '2020-03-06 15:07:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(263, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-06 15:08:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(264, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-06 15:09:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(265, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor///', '140.213.17.148', '2020-03-06 15:09:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(266, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-06 15:09:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(267, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/cetak/xlsx/', '140.213.17.148', '2020-03-06 15:09:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(268, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/cetak/pdf/', '140.213.17.148', '2020-03-06 15:09:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(269, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/cetak/pdf/', '140.213.17.148', '2020-03-06 15:09:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(270, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor///', '140.213.17.148', '2020-03-06 15:10:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(271, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor/ubah/5dfc9b297a427/', '140.213.17.148', '2020-03-06 15:10:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(272, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.17.148', '2020-03-06 15:10:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(273, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/ubah/5e4b452603afd/', '140.213.17.148', '2020-03-06 15:11:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(274, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.17.148', '2020-03-06 15:11:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(275, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/tambah//', '140.213.17.148', '2020-03-06 15:11:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(276, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:11:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(277, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-06 15:11:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(278, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_simpan//', '140.213.17.148', '2020-03-06 15:11:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(279, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-06 15:11:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(280, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-06 15:11:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(281, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:11:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(282, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5dfc397184367/', '140.213.17.148', '2020-03-06 15:12:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(283, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_det_hapus/12/5dfc397184367', '140.213.17.148', '2020-03-06 15:12:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(284, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5dfc397184367/', '140.213.17.148', '2020-03-06 15:12:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(285, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.17.148', '2020-03-06 15:12:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(286, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/ubah/5df888c17d8f0/', '140.213.17.148', '2020-03-06 15:12:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(287, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.17.148', '2020-03-06 15:12:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(288, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:12:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(289, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397155e30/', '140.213.17.148', '2020-03-06 15:12:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(290, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:12:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(291, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5e617d5ea2d2f/', '140.213.17.148', '2020-03-06 15:12:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(292, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:12:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(293, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5dfc397184367/', '140.213.17.148', '2020-03-06 15:13:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(294, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:13:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(295, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-06 15:13:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(296, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_simpan//', '140.213.17.148', '2020-03-06 15:13:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(297, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-06 15:13:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(298, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-06 15:13:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(299, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5dfc397184367/', '140.213.17.148', '2020-03-06 15:13:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(300, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_det_hapus/13/5dfc397184367', '140.213.17.148', '2020-03-06 15:13:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(301, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5dfc397184367/', '140.213.17.148', '2020-03-06 15:13:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(302, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel///', '140.213.17.148', '2020-03-06 15:13:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(303, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel/ubah/5df84e99f335f/', '140.213.17.148', '2020-03-06 15:13:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(304, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel///', '140.213.17.148', '2020-03-06 15:13:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(305, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel/tambah//', '140.213.17.148', '2020-03-06 15:13:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(306, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-06 15:13:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(307, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-06 15:14:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(308, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:14:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(309, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:14:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(310, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-06 15:14:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(311, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel///', '140.213.17.148', '2020-03-06 15:14:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(312, '5de15e8a9ead8', 0, 'Igman Difari', 'matpel/ubah/5df84e99f335f/', '140.213.17.148', '2020-03-06 15:14:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(313, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-06 15:14:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(314, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:14:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(315, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:14:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(316, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-06 15:14:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(317, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-06 15:14:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(318, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/ubah/5dfc3970e4387/5dfc9c4b29ca8', '140.213.17.148', '2020-03-06 15:14:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(319, '5de15e8a9ead8', 0, 'Igman Difari', 'admin///', '140.213.17.148', '2020-03-06 15:14:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(320, '5de15e8a9ead8', 0, 'Igman Difari', 'admin/ubah/5de15e8a9ead8/', '140.213.17.148', '2020-03-06 15:14:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(321, '5de15e8a9ead8', 0, 'Igman Difari', 'tahunajaran///', '140.213.17.148', '2020-03-06 15:15:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(322, '5de15e8a9ead8', 0, 'Igman Difari', 'tahunajaran/tambah//', '140.213.17.148', '2020-03-06 15:15:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(323, '5de15e8a9ead8', 0, 'Igman Difari', 'tahunajaran///', '140.213.17.148', '2020-03-06 15:15:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(324, '5de15e8a9ead8', 0, 'Igman Difari', 'rekapmasukan///', '140.213.17.148', '2020-03-06 15:15:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(325, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-06 15:15:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(326, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:15:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(327, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:15:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(328, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:15:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(329, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:15:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(330, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:15:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(331, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:15:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(332, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:15:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(333, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:15:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(334, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:16:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(335, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:16:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(336, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:16:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(337, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:16:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(338, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.17.148', '2020-03-06 15:16:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(339, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e621644d5460', '140.213.17.148', '2020-03-06 15:16:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(340, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(341, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(342, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(343, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(344, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(345, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(346, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(347, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:46', 'Chrome 80.0.3987.132', 'Windows 8.1');
INSERT INTO `logs` (`id`, `users`, `level`, `name`, `url`, `ip`, `times`, `browser`, `os`) VALUES
(348, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(349, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-06 15:16:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(350, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'jadwalmengajar///', '140.213.17.148', '2020-03-06 15:16:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(351, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'jadwalmengajar///', '140.213.17.148', '2020-03-06 15:17:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(352, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-06 15:17:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(353, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '140.213.17.148', '2020-03-06 15:17:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(354, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-06 15:17:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(355, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-06 15:17:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(356, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:17:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(357, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:18:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(358, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:18:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(359, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:18:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(360, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan///', '140.213.17.148', '2020-03-06 15:18:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(361, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-06 15:18:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(362, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-06 15:18:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(363, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-06 15:18:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(364, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-06 15:18:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(365, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-06 15:18:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(366, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-06 15:18:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(367, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-06 15:19:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(368, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-06 15:19:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(369, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-06 15:19:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(370, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:19:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(371, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:19:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(372, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:19:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(373, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-06 15:19:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(374, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-06 15:19:23', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(375, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getWargaBelajars/5dfc9da09b91e/', '140.213.17.148', '2020-03-06 15:19:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(376, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/matpel/5dfc9da09b91e/5df8c9b8e20e9', '140.213.17.148', '2020-03-06 15:19:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(377, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getnilais/5e2a1c8343b8b/', '140.213.17.148', '2020-03-06 15:19:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(378, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/countNilai/5e2a1c8343b8b/', '140.213.17.148', '2020-03-06 15:19:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(379, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getnilai/38/', '140.213.17.148', '2020-03-06 15:19:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(380, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '140.213.17.148', '2020-03-06 15:20:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(381, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'pengaturan///', '140.213.17.148', '2020-03-06 15:20:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(382, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-06 15:20:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(383, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:20:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(384, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:20:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(385, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(386, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(387, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(388, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(389, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:20:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(390, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:20:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(391, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(392, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(393, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:20:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(394, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-06 15:20:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(395, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(396, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:20:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(397, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '140.213.17.148', '2020-03-06 15:21:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(398, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:21:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(399, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:21:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(400, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '140.213.17.148', '2020-03-06 15:21:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(401, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '140.213.17.148', '2020-03-06 15:21:53', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(402, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-06 15:22:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(403, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-06 15:22:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(404, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:22:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(405, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:22:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(406, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:22:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(407, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-06 15:22:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(408, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan///', '140.213.17.148', '2020-03-06 15:22:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(409, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-06 15:22:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(410, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-06 15:22:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(411, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-06 15:22:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(412, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-06 15:22:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(413, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-06 15:22:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(414, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:22:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(415, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:22:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(416, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:22:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(417, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-06 15:22:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(418, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-06 15:22:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(419, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '140.213.17.148', '2020-03-06 15:22:53', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(420, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-06 15:23:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(421, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'pengaturan///', '140.213.17.148', '2020-03-06 15:23:05', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(422, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-06 15:23:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(423, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-06 15:23:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(424, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-06 15:23:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(425, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-06 15:23:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(426, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-06 15:23:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(427, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.17.148', '2020-03-06 15:23:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(428, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.17.148', '2020-03-06 15:23:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(429, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-06 15:23:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(430, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-06 15:23:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(431, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'panduan///', '140.213.17.148', '2020-03-06 15:23:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(432, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:23:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(433, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:23:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(434, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.17.148', '2020-03-06 15:23:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(435, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.17.148', '2020-03-06 15:23:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(436, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:23:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(437, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:23:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(438, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.17.148', '2020-03-06 15:23:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(439, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.17.148', '2020-03-06 15:23:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(440, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:24:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(441, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:24:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(442, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.17.148', '2020-03-06 15:24:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(443, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.17.148', '2020-03-06 15:24:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(444, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-06 15:24:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(445, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-06 15:24:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(446, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:24:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(447, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-06 15:24:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(448, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.17.148', '2020-03-06 15:24:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(449, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.17.148', '2020-03-06 15:24:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(450, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'panduan///', '140.213.17.148', '2020-03-06 15:24:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(451, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'pengaturan///', '140.213.17.148', '2020-03-06 15:24:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(452, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-06 15:24:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(453, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-06 15:24:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(454, NULL, NULL, NULL, '///', '36.79.253.224', '2020-03-06 21:03:11', 'Chrome 80.0.3987.87', 'Linux'),
(455, NULL, NULL, NULL, '///', '36.79.253.224', '2020-03-06 21:04:26', 'Chrome 80.0.3987.87', 'Linux'),
(456, NULL, NULL, NULL, '///', '36.79.253.224', '2020-03-06 21:05:50', 'Chrome 80.0.3987.87', 'Linux'),
(457, NULL, NULL, NULL, 'favicon.ico///', '36.79.253.224', '2020-03-06 21:06:00', 'Chrome 80.0.3987.87', 'Linux'),
(458, NULL, NULL, NULL, '///', '36.79.253.224', '2020-03-06 21:19:54', 'Chrome 80.0.3987.87', 'Linux'),
(459, NULL, NULL, NULL, '///', '36.79.253.224', '2020-03-06 21:19:57', 'Chrome 80.0.3987.87', 'Linux'),
(460, NULL, NULL, NULL, 'auth/cek_login//', '36.79.253.224', '2020-03-06 21:21:16', 'Chrome 80.0.3987.87', 'Linux'),
(461, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.224', '2020-03-06 21:21:16', 'Chrome 80.0.3987.87', 'Linux'),
(462, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.224', '2020-03-06 21:21:16', 'Chrome 80.0.3987.87', 'Linux'),
(463, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:21:39', 'Chrome 80.0.3987.87', 'Linux'),
(464, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5ded0e21b5aea/', '36.79.253.224', '2020-03-06 21:21:50', 'Chrome 80.0.3987.87', 'Linux'),
(465, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5ded0e21b5aea/', '36.79.253.224', '2020-03-06 21:22:01', 'Chrome 80.0.3987.87', 'Linux'),
(466, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah_password//', '36.79.253.224', '2020-03-06 21:22:59', 'Chrome 80.0.3987.87', 'Linux'),
(467, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:22:59', 'Chrome 80.0.3987.87', 'Linux'),
(468, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5dfc9bafd6bb6/', '36.79.253.224', '2020-03-06 21:23:03', 'Chrome 80.0.3987.87', 'Linux'),
(469, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah_password//', '36.79.253.224', '2020-03-06 21:23:08', 'Chrome 80.0.3987.87', 'Linux'),
(470, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:23:08', 'Chrome 80.0.3987.87', 'Linux'),
(471, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5dfc9b297a427/', '36.79.253.224', '2020-03-06 21:23:13', 'Chrome 80.0.3987.87', 'Linux'),
(472, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah_password//', '36.79.253.224', '2020-03-06 21:23:20', 'Chrome 80.0.3987.87', 'Linux'),
(473, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:23:20', 'Chrome 80.0.3987.87', 'Linux'),
(474, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5dfc9aab6ada9/', '36.79.253.224', '2020-03-06 21:23:23', 'Chrome 80.0.3987.87', 'Linux'),
(475, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah_password//', '36.79.253.224', '2020-03-06 21:23:29', 'Chrome 80.0.3987.87', 'Linux'),
(476, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:23:29', 'Chrome 80.0.3987.87', 'Linux'),
(477, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5dfc9a88e27cb/', '36.79.253.224', '2020-03-06 21:23:38', 'Chrome 80.0.3987.87', 'Linux'),
(478, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah_password//', '36.79.253.224', '2020-03-06 21:23:46', 'Chrome 80.0.3987.87', 'Linux'),
(479, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:23:46', 'Chrome 80.0.3987.87', 'Linux'),
(480, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5df69881a9a58/', '36.79.253.224', '2020-03-06 21:23:51', 'Chrome 80.0.3987.87', 'Linux'),
(481, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah_password//', '36.79.253.224', '2020-03-06 21:23:57', 'Chrome 80.0.3987.87', 'Linux'),
(482, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.224', '2020-03-06 21:23:57', 'Chrome 80.0.3987.87', 'Linux'),
(483, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.253.224', '2020-03-06 21:25:36', 'Chrome 80.0.3987.87', 'Linux'),
(484, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5ded0e21b5aea/', '36.79.253.224', '2020-03-06 21:25:57', 'Chrome 80.0.3987.87', 'Linux'),
(485, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5ded0e21b5aea/', '36.79.253.224', '2020-03-06 21:26:05', 'Chrome 80.0.3987.87', 'Linux'),
(486, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.253.224', '2020-03-06 21:26:12', 'Chrome 80.0.3987.87', 'Linux'),
(487, NULL, NULL, NULL, 'auth///', '36.79.253.224', '2020-03-06 21:26:12', 'Chrome 80.0.3987.87', 'Linux'),
(488, NULL, NULL, NULL, 'auth/cek_login//', '36.79.253.224', '2020-03-06 21:26:16', 'Chrome 80.0.3987.87', 'Linux'),
(489, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '36.79.253.224', '2020-03-06 21:26:16', 'Chrome 80.0.3987.87', 'Linux'),
(490, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '36.79.253.224', '2020-03-06 21:26:16', 'Chrome 80.0.3987.87', 'Linux'),
(491, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '36.79.253.224', '2020-03-06 21:26:24', 'Chrome 80.0.3987.87', 'Linux'),
(492, NULL, NULL, NULL, 'auth///', '36.79.253.224', '2020-03-06 21:26:24', 'Chrome 80.0.3987.87', 'Linux'),
(493, NULL, NULL, NULL, 'auth/cek_login//', '36.79.253.224', '2020-03-06 21:28:07', 'Chrome 80.0.3987.87', 'Linux'),
(494, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.224', '2020-03-06 21:28:07', 'Chrome 80.0.3987.87', 'Linux'),
(495, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.224', '2020-03-06 21:28:07', 'Chrome 80.0.3987.87', 'Linux'),
(496, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.253.224', '2020-03-06 21:28:18', 'Chrome 80.0.3987.87', 'Linux'),
(497, NULL, NULL, NULL, 'auth///', '36.79.253.224', '2020-03-06 21:28:18', 'Chrome 80.0.3987.87', 'Linux'),
(498, NULL, NULL, NULL, '///', '36.79.253.129', '2020-03-07 00:01:21', 'Chrome 80.0.3987.87', 'Linux'),
(499, NULL, NULL, NULL, 'auth/cek_login//', '36.79.253.129', '2020-03-07 00:01:27', 'Chrome 80.0.3987.87', 'Linux'),
(500, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:01:27', 'Chrome 80.0.3987.87', 'Linux'),
(501, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:01:27', 'Chrome 80.0.3987.87', 'Linux'),
(502, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.253.129', '2020-03-07 00:01:36', 'Chrome 80.0.3987.87', 'Linux'),
(503, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:05:21', 'Chrome 80.0.3987.87', 'Linux'),
(504, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:05:21', 'Chrome 80.0.3987.87', 'Linux'),
(505, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.253.129', '2020-03-07 00:05:30', 'Chrome 80.0.3987.87', 'Linux'),
(506, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.253.129', '2020-03-07 00:05:36', 'Chrome 80.0.3987.87', 'Linux'),
(507, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5ded0e21b5aea/', '36.79.253.129', '2020-03-07 00:05:39', 'Chrome 80.0.3987.87', 'Linux'),
(508, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/ubah/5ded0e21b5aea/', '36.79.253.129', '2020-03-07 00:05:45', 'Chrome 80.0.3987.87', 'Linux'),
(509, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '36.79.253.129', '2020-03-07 00:05:49', 'Chrome 80.0.3987.87', 'Linux'),
(510, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.253.129', '2020-03-07 00:05:53', 'Chrome 80.0.3987.87', 'Linux'),
(511, NULL, NULL, NULL, 'auth///', '36.79.253.129', '2020-03-07 00:05:53', 'Chrome 80.0.3987.87', 'Linux'),
(512, NULL, NULL, NULL, 'auth/cek_login//', '36.79.253.129', '2020-03-07 00:06:01', 'Chrome 80.0.3987.87', 'Linux'),
(513, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:06:02', 'Chrome 80.0.3987.87', 'Linux'),
(514, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:06:02', 'Chrome 80.0.3987.87', 'Linux'),
(515, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel//', '36.79.253.129', '2020-03-07 00:06:07', 'Chrome 80.0.3987.87', 'Linux'),
(516, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel_lihat/5dfc397184367/', '36.79.253.129', '2020-03-07 00:06:10', 'Chrome 80.0.3987.87', 'Linux'),
(517, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel_tambah/5dfc397184367/', '36.79.253.129', '2020-03-07 00:06:13', 'Chrome 80.0.3987.87', 'Linux'),
(518, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel_simpan//', '36.79.253.129', '2020-03-07 00:06:16', 'Chrome 80.0.3987.87', 'Linux'),
(519, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel_tambah/5dfc397184367/', '36.79.253.129', '2020-03-07 00:06:16', 'Chrome 80.0.3987.87', 'Linux'),
(520, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:06:37', 'Chrome 80.0.3987.87', 'Linux'),
(521, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.253.129', '2020-03-07 00:06:37', 'Chrome 80.0.3987.87', 'Linux'),
(522, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '36.79.253.129', '2020-03-07 00:06:43', 'Chrome 80.0.3987.87', 'Linux'),
(523, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '36.79.253.129', '2020-03-07 00:06:45', 'Chrome 80.0.3987.87', 'Linux'),
(524, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/ubah/5dfc3970e4387/5e5b913fde20d', '36.79.253.129', '2020-03-07 00:06:50', 'Chrome 80.0.3987.87', 'Linux'),
(525, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/ubah/5dfc3970e4387/5e5b913fde20d', '36.79.253.129', '2020-03-07 00:06:58', 'Chrome 80.0.3987.87', 'Linux'),
(526, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '36.79.253.129', '2020-03-07 00:07:00', 'Chrome 80.0.3987.87', 'Linux'),
(527, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/ubah/5dfc3970e4387/5e54f5c72eb82', '36.79.253.129', '2020-03-07 00:07:07', 'Chrome 80.0.3987.87', 'Linux'),
(528, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '36.79.253.129', '2020-03-07 00:07:10', 'Chrome 80.0.3987.87', 'Linux'),
(529, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '36.79.253.129', '2020-03-07 00:07:12', 'Chrome 80.0.3987.87', 'Linux'),
(530, NULL, NULL, NULL, '///', '64.233.173.125', '2020-03-07 01:44:58', 'Chrome 76.0.3809.132', 'Android'),
(531, NULL, NULL, NULL, '///', '64.233.173.104', '2020-03-07 01:45:33', 'Chrome 76.0.3809.132', 'Android'),
(532, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 01:46:34', 'Chrome 76.0.3809.132', 'Android'),
(533, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '64.233.173.101', '2020-03-07 01:46:34', 'Chrome 76.0.3809.132', 'Android'),
(534, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '64.233.173.101', '2020-03-07 01:46:34', 'Chrome 76.0.3809.132', 'Android'),
(535, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '64.233.173.104', '2020-03-07 01:46:39', 'Chrome 76.0.3809.132', 'Android'),
(536, NULL, NULL, NULL, 'auth///', '64.233.173.102', '2020-03-07 01:46:39', 'Chrome 76.0.3809.132', 'Android'),
(537, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 01:46:52', 'Chrome 76.0.3809.132', 'Android'),
(538, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '64.233.173.104', '2020-03-07 01:46:52', 'Chrome 76.0.3809.132', 'Android'),
(539, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '64.233.173.104', '2020-03-07 01:46:52', 'Chrome 76.0.3809.132', 'Android'),
(540, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '64.233.173.101', '2020-03-07 01:48:46', 'Chrome 76.0.3809.132', 'Android'),
(541, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '64.233.173.101', '2020-03-07 01:48:46', 'Chrome 76.0.3809.132', 'Android'),
(542, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '64.233.173.104', '2020-03-07 01:48:54', 'Chrome 76.0.3809.132', 'Android'),
(543, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-07 01:54:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(544, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 01:54:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(545, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 01:54:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(546, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 01:54:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(547, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 01:55:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(548, NULL, NULL, NULL, '///', '114.124.236.230', '2020-03-07 01:57:26', 'Chrome 80.0.3987.87', 'Linux'),
(549, NULL, NULL, NULL, 'auth/cek_login//', '114.124.236.230', '2020-03-07 01:57:40', 'Chrome 80.0.3987.87', 'Linux'),
(550, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '114.124.236.230', '2020-03-07 01:57:40', 'Chrome 80.0.3987.87', 'Linux'),
(551, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '114.124.236.230', '2020-03-07 01:57:40', 'Chrome 80.0.3987.87', 'Linux'),
(552, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran///', '114.124.236.230', '2020-03-07 01:57:50', 'Chrome 80.0.3987.87', 'Linux'),
(553, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran/ubah/5dfc3970e4387/', '114.124.236.230', '2020-03-07 01:57:53', 'Chrome 80.0.3987.87', 'Linux'),
(554, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran/ubah/5dfc3970e4387/', '114.124.236.230', '2020-03-07 01:58:00', 'Chrome 80.0.3987.87', 'Linux'),
(555, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran///', '114.124.236.230', '2020-03-07 01:58:02', 'Chrome 80.0.3987.87', 'Linux'),
(556, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran/ubah/5dfc3966f0b29/', '114.124.236.230', '2020-03-07 01:58:05', 'Chrome 80.0.3987.87', 'Linux'),
(557, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran/ubah/5dfc3966f0b29/', '114.124.236.230', '2020-03-07 01:58:12', 'Chrome 80.0.3987.87', 'Linux'),
(558, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '114.124.236.230', '2020-03-07 01:58:16', 'Chrome 80.0.3987.87', 'Linux'),
(559, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/ubah/5dfc3f1b90991/', '114.124.207.95', '2020-03-07 01:59:43', 'Chrome 80.0.3987.87', 'Linux'),
(560, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '114.124.207.95', '2020-03-07 01:59:53', 'Chrome 80.0.3987.87', 'Linux'),
(561, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '114.124.207.95', '2020-03-07 01:59:58', 'Chrome 80.0.3987.87', 'Linux'),
(562, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:00:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(563, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:00:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(564, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:00:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(565, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/ubah/5dfc3970e4387/5dfc9d620f773', '114.124.207.95', '2020-03-07 02:03:31', 'Chrome 80.0.3987.87', 'Linux'),
(566, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/ubah/5dfc3970e4387/5dfc9d620f773', '114.124.207.95', '2020-03-07 02:03:41', 'Chrome 80.0.3987.87', 'Linux'),
(567, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '114.124.207.95', '2020-03-07 02:03:43', 'Chrome 80.0.3987.87', 'Linux'),
(568, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '114.124.207.95', '2020-03-07 02:04:12', 'Chrome 80.0.3987.87', 'Linux'),
(569, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/tambah_tutorial_mandiri/5dfc3970e4387/', '114.124.207.95', '2020-03-07 02:04:43', 'Chrome 80.0.3987.87', 'Linux'),
(570, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '114.124.207.95', '2020-03-07 02:04:43', 'Chrome 80.0.3987.87', 'Linux'),
(571, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '114.124.207.95', '2020-03-07 02:04:50', 'Chrome 80.0.3987.87', 'Linux'),
(572, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '114.124.207.95', '2020-03-07 02:04:55', 'Chrome 80.0.3987.87', 'Linux'),
(573, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:05:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(574, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:05:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(575, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:06:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(576, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/tambah_tutorial_mandiri/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:08:38', 'Chrome 80.0.3987.87', 'Linux'),
(577, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:08:38', 'Chrome 80.0.3987.87', 'Linux'),
(578, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '114.124.236.230', '2020-03-07 02:09:22', 'Chrome 80.0.3987.87', 'Linux'),
(579, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/tambah//', '114.124.236.230', '2020-03-07 02:09:36', 'Chrome 80.0.3987.87', 'Linux'),
(580, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:09:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(581, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:09:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(582, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:09:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(583, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:10:05', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(584, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:10:16', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(585, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/tambah//', '114.124.236.230', '2020-03-07 02:10:26', 'Chrome 80.0.3987.87', 'Linux'),
(586, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '114.124.236.230', '2020-03-07 02:10:27', 'Chrome 80.0.3987.87', 'Linux'),
(587, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel///', '114.124.236.230', '2020-03-07 02:10:33', 'Chrome 80.0.3987.87', 'Linux'),
(588, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel/tambah//', '114.124.236.230', '2020-03-07 02:10:39', 'Chrome 80.0.3987.87', 'Linux'),
(589, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel/tambah//', '114.124.236.230', '2020-03-07 02:10:45', 'Chrome 80.0.3987.87', 'Linux'),
(590, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'matpel///', '114.124.236.230', '2020-03-07 02:10:45', 'Chrome 80.0.3987.87', 'Linux'),
(591, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '114.124.236.230', '2020-03-07 02:10:49', 'Chrome 80.0.3987.87', 'Linux'),
(592, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:10:56', 'Chrome 80.0.3987.87', 'Linux'),
(593, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/tambah_tutorial_mandiri/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:11:08', 'Chrome 80.0.3987.87', 'Linux'),
(594, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:11:08', 'Chrome 80.0.3987.87', 'Linux'),
(595, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:11:36', 'Chrome 80.0.3987.87', 'Linux'),
(596, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '114.124.236.230', '2020-03-07 02:11:42', 'Chrome 80.0.3987.87', 'Linux'),
(597, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '114.124.236.230', '2020-03-07 02:11:47', 'Chrome 80.0.3987.87', 'Linux'),
(598, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:12:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(599, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:17:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(600, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:17:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(601, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-07 02:18:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(602, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:18:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(603, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:19:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(604, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:23:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(605, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:26:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(606, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:26:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(607, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:26:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(608, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:29:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(609, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:29:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(610, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:29:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(611, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:33:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(612, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:33:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(613, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 02:43:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(614, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 02:43:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(615, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 02:43:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(616, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 02:43:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(617, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 02:43:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(618, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 02:43:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(619, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 02:43:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(620, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 02:43:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(621, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 02:43:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(622, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 02:43:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(623, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 02:44:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(624, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:44:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(625, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:44:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(626, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor///', '140.213.17.148', '2020-03-07 02:44:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(627, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 02:44:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(628, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 02:44:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(629, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 02:44:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(630, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:44:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(631, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:44:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(632, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-07 02:44:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(633, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '140.213.17.148', '2020-03-07 02:44:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(634, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 02:44:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(635, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '140.213.17.148', '2020-03-07 02:44:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(636, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 02:44:38', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(637, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e621644d5460', '140.213.17.148', '2020-03-07 02:44:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(638, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 02:44:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(639, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'panduan///', '140.213.17.148', '2020-03-07 02:44:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(640, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-07 02:44:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(641, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:44:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(642, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:44:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(643, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 02:45:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(644, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 02:45:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(645, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:45:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(646, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:45:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(647, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 02:45:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(648, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 02:45:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(649, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:45:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(650, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:45:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(651, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:48:21', 'Chrome 80.0.3987.87', 'Linux'),
(652, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:48:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(653, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 02:48:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(654, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-07 02:48:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(655, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 02:48:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(656, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 02:48:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(657, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:48:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(658, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:48:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(659, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 02:49:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(660, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 02:49:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(661, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor/tambah//', '140.213.17.148', '2020-03-07 02:49:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(662, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-07 02:49:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(663, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:49:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(664, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-07 02:49:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(665, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:49:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(666, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/ubah/5dfc3970e4387/5e6302bc9762c', '140.213.17.148', '2020-03-07 02:49:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(667, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:49:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(668, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:49:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(669, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/tambah_tutorial_mandiri/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:50:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(670, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-07 02:50:09', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(671, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:50:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(672, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 02:50:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(673, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 03:14:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(674, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:14:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(675, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:14:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(676, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 03:14:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(677, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 03:14:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(678, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '140.213.17.148', '2020-03-07 03:14:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(679, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 03:14:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(680, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/pdf', '140.213.17.148', '2020-03-07 03:14:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(681, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/pdf', '140.213.17.148', '2020-03-07 03:14:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(682, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/xlsx', '140.213.17.148', '2020-03-07 03:14:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(683, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-07 03:14:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(684, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 03:14:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(685, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/pdf', '140.213.17.148', '2020-03-07 03:14:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(686, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/pdf', '140.213.17.148', '2020-03-07 03:14:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(687, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/xlsx', '140.213.17.148', '2020-03-07 03:14:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(688, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '140.213.17.148', '2020-03-07 03:15:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(689, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-07 03:15:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(690, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:15:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(691, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:16:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(692, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:16:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(693, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:16:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(694, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 03:17:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(695, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:17:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(696, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:17:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(697, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 03:17:48', 'Chrome 80.0.3987.132', 'Windows 8.1');
INSERT INTO `logs` (`id`, `users`, `level`, `name`, `url`, `ip`, `times`, `browser`, `os`) VALUES
(698, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 03:17:48', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(699, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-07 03:17:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(700, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 03:17:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(701, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-07 03:17:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(702, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:17:56', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(703, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:17:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(704, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:17:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(705, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:17:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(706, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:18:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(707, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/xlsx/', '140.213.17.148', '2020-03-07 03:18:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(708, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'favicon.ico///', '140.213.17.148', '2020-03-07 03:18:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(709, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:18:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(710, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/pdf/', '140.213.17.148', '2020-03-07 03:18:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(711, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/pdf/', '140.213.17.148', '2020-03-07 03:18:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(712, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/xlsx/', '140.213.17.148', '2020-03-07 03:18:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(713, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'favicon.ico///', '140.213.17.148', '2020-03-07 03:18:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(714, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:18:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(715, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '140.213.17.148', '2020-03-07 03:18:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(716, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi/cetak/xlsx/', '140.213.17.148', '2020-03-07 03:18:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(717, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 03:21:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(718, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:21:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(719, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:21:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(720, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-07 03:21:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(721, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-07 03:21:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(722, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 03:21:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(723, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 03:21:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(724, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.17.148', '2020-03-07 03:21:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(725, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.17.148', '2020-03-07 03:21:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(726, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 03:21:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(727, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 03:21:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(728, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.17.148', '2020-03-07 03:21:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(729, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5e09494499b1d', '140.213.17.148', '2020-03-07 03:21:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(730, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 03:21:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(731, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 03:21:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(732, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.17.148', '2020-03-07 03:22:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(733, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.17.148', '2020-03-07 03:22:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(734, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.17.148', '2020-03-07 03:22:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(735, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.17.148', '2020-03-07 03:22:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(736, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.17.148', '2020-03-07 03:22:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(737, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/presensi/5dfc9da09b91e', '140.213.17.148', '2020-03-07 03:22:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(738, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-07 03:22:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(739, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-07 03:22:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(740, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.17.148', '2020-03-07 03:22:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(741, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.17.148', '2020-03-07 03:22:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(742, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '140.213.17.148', '2020-03-07 03:22:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(743, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:22:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(744, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:22:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(745, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 03:22:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(746, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 03:22:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(747, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-07 03:23:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(748, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-07 03:23:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(749, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:23:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(750, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:24:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(751, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:24:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(752, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:24:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(753, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:24:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(754, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/pdf/', '140.213.17.148', '2020-03-07 03:24:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(755, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:24:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(756, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/xlsx/', '140.213.17.148', '2020-03-07 03:24:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(757, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:24:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(758, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', '///', '140.213.17.148', '2020-03-07 03:24:17', 'Chrome 80.0.3987.87', 'Linux'),
(759, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.17.148', '2020-03-07 03:24:18', 'Chrome 80.0.3987.87', 'Linux'),
(760, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.17.148', '2020-03-07 03:24:18', 'Chrome 80.0.3987.87', 'Linux'),
(761, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '140.213.17.148', '2020-03-07 03:24:31', 'Chrome 80.0.3987.87', 'Linux'),
(762, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-07 03:24:35', 'Chrome 80.0.3987.87', 'Linux'),
(763, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-07 03:24:35', 'Chrome 80.0.3987.87', 'Linux'),
(764, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:24:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(765, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/pdf/', '140.213.17.148', '2020-03-07 03:24:44', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(766, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-07 03:24:44', 'Chrome 80.0.3987.87', 'Linux'),
(767, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-07 03:24:44', 'Chrome 80.0.3987.87', 'Linux'),
(768, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai/cetak/pdf/', '140.213.17.148', '2020-03-07 03:24:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(769, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:24:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(770, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '64.233.173.102', '2020-03-07 03:26:04', 'Chrome 76.0.3809.132', 'Android'),
(771, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '64.233.173.104', '2020-03-07 03:26:07', 'Chrome 76.0.3809.132', 'Android'),
(772, NULL, NULL, NULL, 'auth///', '64.233.173.101', '2020-03-07 03:26:07', 'Chrome 76.0.3809.132', 'Android'),
(773, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 03:26:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(774, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:26:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(775, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:26:34', 'Chrome 76.0.3809.132', 'Android'),
(776, NULL, NULL, NULL, 'auth///', '64.233.173.104', '2020-03-07 03:26:34', 'Chrome 76.0.3809.132', 'Android'),
(777, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:26:55', 'Chrome 76.0.3809.132', 'Android'),
(778, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 03:26:56', 'Chrome 76.0.3809.132', 'Android'),
(779, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 03:26:56', 'Chrome 76.0.3809.132', 'Android'),
(780, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.101', '2020-03-07 03:27:05', 'Chrome 76.0.3809.132', 'Android'),
(781, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e621644d5460', '64.233.173.102', '2020-03-07 03:27:10', 'Chrome 76.0.3809.132', 'Android'),
(782, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.104', '2020-03-07 03:27:28', 'Chrome 76.0.3809.132', 'Android'),
(783, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/presensi_baru//', '140.213.17.148', '2020-03-07 03:27:35', 'Chrome 76.0.3809.132', 'Android'),
(784, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e6314a0a95b2', '64.233.173.102', '2020-03-07 03:27:35', 'Chrome 76.0.3809.132', 'Android'),
(785, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 03:27:44', 'Chrome 76.0.3809.132', 'Android'),
(786, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 03:27:45', 'Chrome 76.0.3809.132', 'Android'),
(787, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 03:27:46', 'Chrome 76.0.3809.132', 'Android'),
(788, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 03:27:47', 'Chrome 76.0.3809.132', 'Android'),
(789, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 03:27:48', 'Chrome 76.0.3809.132', 'Android'),
(790, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e6314a0a95b2', '64.233.173.104', '2020-03-07 03:27:55', 'Chrome 76.0.3809.132', 'Android'),
(791, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.104', '2020-03-07 03:28:03', 'Chrome 76.0.3809.132', 'Android'),
(792, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:29:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(793, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:29:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(794, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:29:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(795, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:29:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(796, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63004943285/', '140.213.17.148', '2020-03-07 03:29:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(797, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:29:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(798, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:29:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(799, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5dfc3f1b90991/', '140.213.17.148', '2020-03-07 03:29:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(800, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:29:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(801, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:29:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(802, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8ce3c7570f/', '140.213.17.148', '2020-03-07 03:29:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(803, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:29:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(804, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:29:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(805, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63004943285/', '140.213.17.148', '2020-03-07 03:29:53', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(806, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:00', 'Chrome 80.0.3987.87', 'Linux'),
(807, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:30:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(808, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:01', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(809, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 03:30:02', 'Chrome 80.0.3987.87', 'Linux'),
(810, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '140.213.17.148', '2020-03-07 03:30:11', 'Chrome 80.0.3987.87', 'Linux'),
(811, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:30:11', 'Chrome 80.0.3987.87', 'Linux'),
(812, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63016cef1c7/', '140.213.17.148', '2020-03-07 03:30:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(813, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:30:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(814, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:15', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(815, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63004943285/', '140.213.17.148', '2020-03-07 03:30:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(816, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:30:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(817, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(818, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5dfc3f1b90991/', '140.213.17.148', '2020-03-07 03:30:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(819, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:30:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(820, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(821, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8ce3c7570f/', '140.213.17.148', '2020-03-07 03:30:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(822, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:30:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(823, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(824, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8ce3c7570f/', '140.213.17.148', '2020-03-07 03:30:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(825, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:30:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(826, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:30:54', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(827, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8cc7a68b47/', '140.213.17.148', '2020-03-07 03:30:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(828, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:31:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(829, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:31:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(830, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8cbbfd492d/', '140.213.17.148', '2020-03-07 03:31:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(831, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:31:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(832, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:31:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(833, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8c9b8e20e9/', '140.213.17.148', '2020-03-07 03:31:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(834, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:31:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(835, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:31:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(836, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8c2b2d14b8/', '140.213.17.148', '2020-03-07 03:31:29', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(837, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:31:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(838, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:31:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(839, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8c9b8e20e9/', '140.213.17.148', '2020-03-07 03:31:41', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(840, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:31:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(841, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:31:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(842, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:31:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(843, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:31:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(844, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:43:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(845, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 03:43:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(846, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:43:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(847, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:43:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(848, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:43:51', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(849, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:44:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(850, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:44:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(851, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:44:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(852, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:44:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(853, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8c9b8e20e9/', '140.213.17.148', '2020-03-07 03:44:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(854, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:44:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(855, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:44:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(856, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 03:44:21', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(857, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:44:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(858, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:44:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(859, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:44:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(860, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:44:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(861, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 03:44:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(862, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '140.213.17.148', '2020-03-07 03:44:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(863, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'jadwalbelajar///', '140.213.17.148', '2020-03-07 03:54:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(864, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 03:54:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(865, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:54:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(866, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:54:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(867, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:54:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(868, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 03:54:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(869, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 03:54:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(870, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:54:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(871, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:54:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(872, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:54:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(873, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 03:54:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(874, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:54:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(875, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-07 03:55:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(876, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:55:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(877, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:55:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(878, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:55:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(879, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:55:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(880, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e6306f57a824/', '140.213.17.148', '2020-03-07 03:55:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(881, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:55:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(882, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:55:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(883, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:55:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(884, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'dasbor///', '140.213.17.148', '2020-03-07 03:55:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(885, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'dasbor///', '140.213.17.148', '2020-03-07 03:55:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(886, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'auth/logout//', '140.213.17.148', '2020-03-07 03:55:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(887, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:55:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(888, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63043c991e8/', '140.213.17.148', '2020-03-07 03:55:39', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(889, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:55:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(890, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:55:43', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(891, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e630273c2208/', '140.213.17.148', '2020-03-07 03:55:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(892, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:55:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(893, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:55:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(894, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63016cef1c7/', '140.213.17.148', '2020-03-07 03:55:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(895, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:55:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(896, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:55:58', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(897, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63004943285/', '140.213.17.148', '2020-03-07 03:56:04', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(898, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:56:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(899, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:56:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(900, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5dfc3f1b90991/', '140.213.17.148', '2020-03-07 03:56:13', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(901, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:56:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(902, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:56:18', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(903, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8ce3c7570f/', '140.213.17.148', '2020-03-07 03:56:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(904, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:56:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(905, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:56:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(906, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8cc7a68b47/', '140.213.17.148', '2020-03-07 03:56:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(907, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:56:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(908, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:56:36', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(909, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8cbbfd492d/', '140.213.17.148', '2020-03-07 03:56:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(910, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:56:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(911, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:56:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(912, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8cbbfd492d/', '140.213.17.148', '2020-03-07 03:56:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(913, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:56:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(914, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:56:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(915, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8c2b2d14b8/', '140.213.17.148', '2020-03-07 03:57:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(916, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:57:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(917, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:57:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(918, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:57:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(919, '5df8c2b2d14b8', 1, 'Ikhwan Sopyan', 'dasbor///', '140.213.17.148', '2020-03-07 03:57:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(920, '5df8c2b2d14b8', 1, 'Ikhwan Sopyan', 'dasbor///', '140.213.17.148', '2020-03-07 03:57:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(921, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:57:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(922, '5df8c2b2d14b8', 1, 'Ikhwan Sopyan', 'auth/logout//', '140.213.17.148', '2020-03-07 03:57:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(923, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:57:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(924, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:57:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(925, '5e63004943285', 1, 'Budi Rahmat', 'dasbor///', '140.213.17.148', '2020-03-07 03:57:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(926, '5e63004943285', 1, 'Budi Rahmat', 'dasbor///', '140.213.17.148', '2020-03-07 03:57:27', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(927, '5e63004943285', 1, 'Budi Rahmat', 'auth/logout//', '140.213.17.148', '2020-03-07 03:57:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(928, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:57:33', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(929, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:57:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(930, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:57:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(931, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e63016cef1c7/', '140.213.17.148', '2020-03-07 03:57:42', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(932, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 03:57:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(933, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 03:57:46', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(934, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:57:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(935, '5e63016cef1c7', 1, 'Ani Suryani', 'dasbor///', '140.213.17.148', '2020-03-07 03:57:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(936, '5e63016cef1c7', 1, 'Ani Suryani', 'dasbor///', '140.213.17.148', '2020-03-07 03:57:50', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(937, '5e63016cef1c7', 1, 'Ani Suryani', 'auth/logout//', '140.213.17.148', '2020-03-07 03:57:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(938, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:57:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(939, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:58:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(940, '5e63043c991e8', 1, 'Ei Jamaludin', 'dasbor///', '140.213.17.148', '2020-03-07 03:58:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(941, '5e63043c991e8', 1, 'Ei Jamaludin', 'dasbor///', '140.213.17.148', '2020-03-07 03:58:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(942, '5e63043c991e8', 1, 'Ei Jamaludin', 'auth/logout//', '140.213.17.148', '2020-03-07 03:58:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(943, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:58:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(944, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 03:58:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(945, '5e630273c2208', 1, 'Ayuna Rahayu', 'dasbor///', '140.213.17.148', '2020-03-07 03:58:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(946, '5e630273c2208', 1, 'Ayuna Rahayu', 'dasbor///', '140.213.17.148', '2020-03-07 03:58:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(947, '5e630273c2208', 1, 'Ayuna Rahayu', 'auth/logout//', '140.213.17.148', '2020-03-07 03:58:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(948, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 03:58:24', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(949, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 03:58:30', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(950, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 03:59:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(951, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 04:00:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(952, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 04:00:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(953, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 04:00:11', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(954, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:00:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(955, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:00:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(956, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:00:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(957, '5e631c47b9677', 1, 'Sobirin', 'dasbor///', '140.213.17.148', '2020-03-07 04:00:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(958, '5e631c47b9677', 1, 'Sobirin', 'dasbor///', '140.213.17.148', '2020-03-07 04:00:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(959, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/hapus/5e631c47b9677/', '140.213.17.148', '2020-03-07 04:01:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(960, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 04:01:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(961, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:01:49', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(962, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:01:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(963, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'dasbor///', '140.213.17.148', '2020-03-07 04:01:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(964, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'dasbor///', '140.213.17.148', '2020-03-07 04:01:52', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(965, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'auth/logout//', '140.213.17.148', '2020-03-07 04:01:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(966, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:01:55', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(967, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(968, '5e63043c991e8', 1, 'Ei Jamaludin', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(969, '5e63043c991e8', 1, 'Ei Jamaludin', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:00', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(970, '5e63043c991e8', 1, 'Ei Jamaludin', 'auth/logout//', '140.213.17.148', '2020-03-07 04:02:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(971, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:03', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(972, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(973, '5e630273c2208', 1, 'Ayuna Rahayu', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(974, '5e630273c2208', 1, 'Ayuna Rahayu', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:08', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(975, '5e630273c2208', 1, 'Ayuna Rahayu', 'auth/logout//', '140.213.17.148', '2020-03-07 04:02:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(976, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:12', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(977, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(978, '5e63016cef1c7', 1, 'Ani Suryani', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(979, '5e63016cef1c7', 1, 'Ani Suryani', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(980, '5e63016cef1c7', 1, 'Ani Suryani', 'auth/logout//', '140.213.17.148', '2020-03-07 04:02:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(981, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(982, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(983, '5e63004943285', 1, 'Budi Rahmat', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(984, '5e63004943285', 1, 'Budi Rahmat', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:22', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(985, '5e63004943285', 1, 'Budi Rahmat', 'auth/logout//', '140.213.17.148', '2020-03-07 04:02:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(986, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:25', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(987, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(988, '5dfc3f1b90991', 1, 'Amat Rustendi', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(989, '5dfc3f1b90991', 1, 'Amat Rustendi', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:31', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(990, '5dfc3f1b90991', 1, 'Amat Rustendi', 'auth/logout//', '140.213.17.148', '2020-03-07 04:02:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(991, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(992, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(993, '5df8ce3c7570f', 1, 'Nia Kurniawati', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(994, '5df8ce3c7570f', 1, 'Nia Kurniawati', 'dasbor///', '140.213.17.148', '2020-03-07 04:02:40', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(995, '5df8ce3c7570f', 1, 'Nia Kurniawati', 'auth/logout//', '140.213.17.148', '2020-03-07 04:02:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(996, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:45', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(997, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(998, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:47', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(999, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:02:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1000, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:02:57', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1001, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5df8cc7a68b47/', '140.213.17.148', '2020-03-07 04:02:59', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1002, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah_password//', '140.213.17.148', '2020-03-07 04:03:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1003, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 04:03:02', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1004, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:03:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1005, '5df8cc7a68b47', 1, 'Nanang Nurdiana', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1006, '5df8cc7a68b47', 1, 'Nanang Nurdiana', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:06', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1007, '5df8cc7a68b47', 1, 'Nanang Nurdiana', 'auth/logout//', '140.213.17.148', '2020-03-07 04:03:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1008, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:03:14', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1009, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:03:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1010, '5df8cbbfd492d', 1, 'Muhammad Ramadhani', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1011, '5df8cbbfd492d', 1, 'Muhammad Ramadhani', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1012, '5df8cbbfd492d', 1, 'Muhammad Ramadhani', 'auth/logout//', '140.213.17.148', '2020-03-07 04:03:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1013, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:03:20', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1014, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:03:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1015, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1016, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:26', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1017, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 04:03:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1018, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:03:32', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1019, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 04:03:34', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1020, '5df8c2b2d14b8', 1, 'Ikhwan Sopyan', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1021, '5df8c2b2d14b8', 1, 'Ikhwan Sopyan', 'dasbor///', '140.213.17.148', '2020-03-07 04:03:35', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1022, '5df8c2b2d14b8', 1, 'Ikhwan Sopyan', 'auth/logout//', '140.213.17.148', '2020-03-07 04:03:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1023, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:03:37', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1024, '5de15e8a9ead8', 0, 'Igman Difari', 'index.html///', '140.213.17.148', '2020-03-07 04:04:07', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1025, '5de15e8a9ead8', 0, 'Igman Difari', 'index.html///', '140.213.17.148', '2020-03-07 04:04:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1026, '5de15e8a9ead8', 0, 'Igman Difari', '///', '140.213.17.148', '2020-03-07 04:04:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1027, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 04:04:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1028, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 04:04:17', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1029, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor/logs//', '140.213.17.148', '2020-03-07 04:07:10', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1030, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 04:07:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1031, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 04:07:28', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1032, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.104', '2020-03-07 04:20:30', 'Chrome 76.0.3809.132', 'Android'),
(1033, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:20:38', 'Chrome 76.0.3809.132', 'Android'),
(1034, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:20:38', 'Chrome 76.0.3809.132', 'Android'),
(1035, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-07 04:25:19', 'Chrome 71.0.3578.141', 'Android'),
(1036, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:25:29', 'Chrome 76.0.3809.132', 'Android'),
(1037, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:25:29', 'Chrome 76.0.3809.132', 'Android'),
(1038, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:39:25', 'Chrome 76.0.3809.132', 'Android'),
(1039, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:39:25', 'Chrome 76.0.3809.132', 'Android'),
(1040, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'jadwalmengajar///', '64.233.173.102', '2020-03-07 04:40:01', 'Chrome 76.0.3809.132', 'Android'),
(1041, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.102', '2020-03-07 04:40:05', 'Chrome 76.0.3809.132', 'Android'),
(1042, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.104', '2020-03-07 04:40:13', 'Chrome 76.0.3809.132', 'Android'),
(1043, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e6314a0a95b2', '64.233.173.102', '2020-03-07 04:40:25', 'Chrome 76.0.3809.132', 'Android'),
(1044, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:40:31', 'Chrome 76.0.3809.132', 'Android'),
(1045, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:40:33', 'Chrome 76.0.3809.132', 'Android'),
(1046, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '64.233.173.102', '2020-03-07 04:40:39', 'Chrome 76.0.3809.132', 'Android'),
(1047, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.101', '2020-03-07 04:41:04', 'Chrome 76.0.3809.132', 'Android'),
(1048, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.101', '2020-03-07 04:41:09', 'Chrome 76.0.3809.132', 'Android'),
(1049, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e6314a0a95b2', '64.233.173.101', '2020-03-07 04:41:13', 'Chrome 76.0.3809.132', 'Android'),
(1050, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:16', 'Chrome 76.0.3809.132', 'Android'),
(1051, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:17', 'Chrome 76.0.3809.132', 'Android'),
(1052, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:17', 'Chrome 76.0.3809.132', 'Android');
INSERT INTO `logs` (`id`, `users`, `level`, `name`, `url`, `ip`, `times`, `browser`, `os`) VALUES
(1053, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:18', 'Chrome 76.0.3809.132', 'Android'),
(1054, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:18', 'Chrome 76.0.3809.132', 'Android'),
(1055, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:19', 'Chrome 76.0.3809.132', 'Android'),
(1056, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:20', 'Chrome 76.0.3809.132', 'Android'),
(1057, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:20', 'Chrome 76.0.3809.132', 'Android'),
(1058, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:21', 'Chrome 76.0.3809.132', 'Android'),
(1059, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:22', 'Chrome 76.0.3809.132', 'Android'),
(1060, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/update_presensi_det//', '140.213.17.148', '2020-03-07 04:41:23', 'Chrome 76.0.3809.132', 'Android'),
(1061, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.102', '2020-03-07 04:41:23', 'Chrome 76.0.3809.132', 'Android'),
(1062, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/details/5dfc9da09b91e/', '64.233.173.101', '2020-03-07 04:41:27', 'Chrome 76.0.3809.132', 'Android'),
(1063, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.102', '2020-03-07 04:42:11', 'Chrome 76.0.3809.132', 'Android'),
(1064, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:19', 'Chrome 76.0.3809.132', 'Android'),
(1065, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:19', 'Chrome 76.0.3809.132', 'Android'),
(1066, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.102', '2020-03-07 04:42:19', 'Chrome 76.0.3809.132', 'Android'),
(1067, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:23', 'Chrome 76.0.3809.132', 'Android'),
(1068, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:23', 'Chrome 76.0.3809.132', 'Android'),
(1069, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.101', '2020-03-07 04:42:23', 'Chrome 76.0.3809.132', 'Android'),
(1070, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:34', 'Chrome 76.0.3809.132', 'Android'),
(1071, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:34', 'Chrome 76.0.3809.132', 'Android'),
(1072, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.104', '2020-03-07 04:42:34', 'Chrome 76.0.3809.132', 'Android'),
(1073, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:38', 'Chrome 76.0.3809.132', 'Android'),
(1074, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:38', 'Chrome 76.0.3809.132', 'Android'),
(1075, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.102', '2020-03-07 04:42:39', 'Chrome 76.0.3809.132', 'Android'),
(1076, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:49', 'Chrome 76.0.3809.132', 'Android'),
(1077, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:49', 'Chrome 76.0.3809.132', 'Android'),
(1078, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi///', '64.233.173.102', '2020-03-07 04:42:49', 'Chrome 76.0.3809.132', 'Android'),
(1079, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.104', '2020-03-07 04:42:55', 'Chrome 76.0.3809.132', 'Android'),
(1080, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:59', 'Chrome 76.0.3809.132', 'Android'),
(1081, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 04:42:59', 'Chrome 76.0.3809.132', 'Android'),
(1082, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.102', '2020-03-07 04:42:59', 'Chrome 76.0.3809.132', 'Android'),
(1083, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.101', '2020-03-07 04:43:01', 'Chrome 76.0.3809.132', 'Android'),
(1084, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.101', '2020-03-07 04:43:01', 'Chrome 76.0.3809.132', 'Android'),
(1085, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:44:40', 'Chrome 76.0.3809.132', 'Android'),
(1086, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.104', '2020-03-07 04:44:40', 'Chrome 76.0.3809.132', 'Android'),
(1087, NULL, NULL, NULL, '///', '114.124.212.230', '2020-03-07 04:55:08', 'Chrome 79.0.3945.136', 'Android'),
(1088, NULL, NULL, NULL, 'auth/cek_login//', '114.124.213.95', '2020-03-07 04:55:17', 'Chrome 79.0.3945.136', 'Android'),
(1089, NULL, NULL, NULL, 'auth///', '114.124.213.95', '2020-03-07 04:55:17', 'Chrome 79.0.3945.136', 'Android'),
(1090, NULL, NULL, NULL, 'auth/cek_login//', '114.124.212.230', '2020-03-07 04:55:24', 'Chrome 79.0.3945.136', 'Android'),
(1091, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '114.124.212.230', '2020-03-07 04:55:24', 'Chrome 79.0.3945.136', 'Android'),
(1092, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '114.124.212.230', '2020-03-07 04:55:24', 'Chrome 79.0.3945.136', 'Android'),
(1093, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-07 05:52:48', 'Chrome 80.0.3987.87', 'Linux'),
(1094, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-07 06:26:40', 'Chrome 80.0.3987.87', 'Linux'),
(1095, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:26:59', 'Chrome 80.0.3987.87', 'Linux'),
(1096, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 06:26:59', 'Chrome 80.0.3987.87', 'Linux'),
(1097, '5de15e8a9ead8', 0, 'Igman Difari', 'dasbor///', '140.213.17.148', '2020-03-07 06:26:59', 'Chrome 80.0.3987.87', 'Linux'),
(1098, '5de15e8a9ead8', 0, 'Igman Difari', 'panduan///', '140.213.17.148', '2020-03-07 06:28:03', 'Chrome 80.0.3987.87', 'Linux'),
(1099, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 06:28:28', 'Chrome 80.0.3987.87', 'Linux'),
(1100, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/ubah/5e6306f57a824/', '140.213.17.148', '2020-03-07 06:28:43', 'Chrome 80.0.3987.87', 'Linux'),
(1101, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 06:29:02', 'Chrome 80.0.3987.87', 'Linux'),
(1102, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 06:29:05', 'Chrome 80.0.3987.87', 'Linux'),
(1103, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/cetak/pdf/', '140.213.17.148', '2020-03-07 06:29:16', 'Chrome 80.0.3987.87', 'Linux'),
(1104, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 06:29:30', 'Chrome 80.0.3987.87', 'Linux'),
(1105, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 06:30:56', 'Chrome 80.0.3987.87', 'Linux'),
(1106, '5de15e8a9ead8', 0, 'Igman Difari', 'wargabelajar///', '140.213.17.148', '2020-03-07 06:30:56', 'Chrome 80.0.3987.87', 'Linux'),
(1107, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor///', '140.213.17.148', '2020-03-07 06:31:02', 'Chrome 80.0.3987.87', 'Linux'),
(1108, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor/ubah/5e630292e06d1/', '140.213.17.148', '2020-03-07 06:31:14', 'Chrome 80.0.3987.87', 'Linux'),
(1109, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas///', '140.213.17.148', '2020-03-07 06:31:33', 'Chrome 80.0.3987.87', 'Linux'),
(1110, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/tambah//', '140.213.17.148', '2020-03-07 06:31:49', 'Chrome 80.0.3987.87', 'Linux'),
(1111, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-07 06:31:57', 'Chrome 80.0.3987.87', 'Linux'),
(1112, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-07 06:32:05', 'Chrome 80.0.3987.87', 'Linux'),
(1113, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_simpan//', '140.213.17.148', '2020-03-07 06:32:17', 'Chrome 80.0.3987.87', 'Linux'),
(1114, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-07 06:32:17', 'Chrome 80.0.3987.87', 'Linux'),
(1115, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_simpan//', '140.213.17.148', '2020-03-07 06:32:26', 'Chrome 80.0.3987.87', 'Linux'),
(1116, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_tambah/5dfc397184367/', '140.213.17.148', '2020-03-07 06:32:26', 'Chrome 80.0.3987.87', 'Linux'),
(1117, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel//', '140.213.17.148', '2020-03-07 06:32:36', 'Chrome 80.0.3987.87', 'Linux'),
(1118, '5de15e8a9ead8', 0, 'Igman Difari', 'kelas/rombel_lihat/5dfc397184367/', '140.213.17.148', '2020-03-07 06:32:40', 'Chrome 80.0.3987.87', 'Linux'),
(1119, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal///', '140.213.17.148', '2020-03-07 06:32:57', 'Chrome 80.0.3987.87', 'Linux'),
(1120, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 06:33:08', 'Chrome 80.0.3987.87', 'Linux'),
(1121, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 06:33:35', 'Chrome 80.0.3987.87', 'Linux'),
(1122, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-07 06:33:35', 'Chrome 80.0.3987.87', 'Linux'),
(1123, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_tambah/5dfc3970e4387/', '140.213.17.148', '2020-03-07 06:33:48', 'Chrome 80.0.3987.87', 'Linux'),
(1124, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/tambah_tutorial_mandiri/5dfc3970e4387/', '140.213.17.148', '2020-03-07 06:34:01', 'Chrome 80.0.3987.87', 'Linux'),
(1125, '5de15e8a9ead8', 0, 'Igman Difari', 'jadwal/matpel_lihat/5dfc3970e4387/', '140.213.17.148', '2020-03-07 06:34:01', 'Chrome 80.0.3987.87', 'Linux'),
(1126, '5de15e8a9ead8', 0, 'Igman Difari', 'admin///', '140.213.17.148', '2020-03-07 06:34:19', 'Chrome 80.0.3987.87', 'Linux'),
(1127, '5de15e8a9ead8', 0, 'Igman Difari', 'pimpinan///', '140.213.17.148', '2020-03-07 06:34:29', 'Chrome 80.0.3987.87', 'Linux'),
(1128, '5de15e8a9ead8', 0, 'Igman Difari', 'tahunajaran///', '140.213.17.148', '2020-03-07 06:34:39', 'Chrome 80.0.3987.87', 'Linux'),
(1129, '5de15e8a9ead8', 0, 'Igman Difari', 'pengaturan///', '140.213.17.148', '2020-03-07 06:34:46', 'Chrome 80.0.3987.87', 'Linux'),
(1130, '5de15e8a9ead8', 0, 'Igman Difari', 'tutor///', '140.213.17.148', '2020-03-07 06:35:35', 'Chrome 80.0.3987.87', 'Linux'),
(1131, '5de15e8a9ead8', 0, 'Igman Difari', 'auth/logout//', '140.213.17.148', '2020-03-07 06:35:43', 'Chrome 80.0.3987.87', 'Linux'),
(1132, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 06:35:43', 'Chrome 80.0.3987.87', 'Linux'),
(1133, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:35:45', 'Chrome 80.0.3987.87', 'Linux'),
(1134, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 06:35:45', 'Chrome 80.0.3987.87', 'Linux'),
(1135, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '140.213.17.148', '2020-03-07 06:35:45', 'Chrome 80.0.3987.87', 'Linux'),
(1136, NULL, NULL, NULL, '///', '64.233.173.104', '2020-03-07 06:36:13', 'Chrome 76.0.3809.132', 'Android'),
(1137, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 06:36:18', 'Chrome 80.0.3987.87', 'Linux'),
(1138, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:36:18', 'Chrome 76.0.3809.132', 'Android'),
(1139, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.102', '2020-03-07 06:36:18', 'Chrome 76.0.3809.132', 'Android'),
(1140, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '64.233.173.102', '2020-03-07 06:36:18', 'Chrome 76.0.3809.132', 'Android'),
(1141, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e323535e9d5c', '140.213.17.148', '2020-03-07 06:36:24', 'Chrome 80.0.3987.87', 'Linux'),
(1142, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '64.233.173.104', '2020-03-07 06:36:26', 'Chrome 76.0.3809.132', 'Android'),
(1143, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e6314a0a95b2', '64.233.173.101', '2020-03-07 06:36:32', 'Chrome 76.0.3809.132', 'Android'),
(1144, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 06:36:46', 'Chrome 80.0.3987.87', 'Linux'),
(1145, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/presensi_baru//', '140.213.17.148', '2020-03-07 06:36:48', 'Chrome 80.0.3987.87', 'Linux'),
(1146, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'presensi/jadwal/5dfc9da09b91e/5e6340feb02a0', '140.213.17.148', '2020-03-07 06:36:48', 'Chrome 80.0.3987.87', 'Linux'),
(1147, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai///', '140.213.17.148', '2020-03-07 06:36:58', 'Chrome 80.0.3987.87', 'Linux'),
(1148, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getWargaBelajars/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 06:37:04', 'Chrome 80.0.3987.87', 'Linux'),
(1149, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/matpel/5dfc9da09b91e/5df8c9b8e20e9', '140.213.17.148', '2020-03-07 06:37:07', 'Chrome 80.0.3987.87', 'Linux'),
(1150, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getnilais/5e2a1c8343b8b/', '140.213.17.148', '2020-03-07 06:37:08', 'Chrome 80.0.3987.87', 'Linux'),
(1151, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/countNilai/5e2a1c8343b8b/', '140.213.17.148', '2020-03-07 06:37:08', 'Chrome 80.0.3987.87', 'Linux'),
(1152, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/insertnilai//', '140.213.17.148', '2020-03-07 06:37:28', 'Chrome 80.0.3987.87', 'Linux'),
(1153, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/getnilais/5e2a1c8343b8b/', '140.213.17.148', '2020-03-07 06:37:28', 'Chrome 80.0.3987.87', 'Linux'),
(1154, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/countNilai/5e2a1c8343b8b/', '140.213.17.148', '2020-03-07 06:37:28', 'Chrome 80.0.3987.87', 'Linux'),
(1155, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '140.213.17.148', '2020-03-07 06:37:37', 'Chrome 80.0.3987.87', 'Linux'),
(1156, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '140.213.17.148', '2020-03-07 06:38:04', 'Chrome 80.0.3987.87', 'Linux'),
(1157, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 06:38:04', 'Chrome 80.0.3987.87', 'Linux'),
(1158, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:38:07', 'Chrome 80.0.3987.87', 'Linux'),
(1159, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 06:38:07', 'Chrome 80.0.3987.87', 'Linux'),
(1160, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 06:38:07', 'Chrome 80.0.3987.87', 'Linux'),
(1161, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekappresensi///', '140.213.17.148', '2020-03-07 06:38:25', 'Chrome 80.0.3987.87', 'Linux'),
(1162, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 06:38:38', 'Chrome 80.0.3987.87', 'Linux'),
(1163, NULL, NULL, NULL, '///', '140.213.17.148', '2020-03-07 06:38:53', 'Chrome 80.0.3987.87', 'Linux'),
(1164, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:38:59', 'Chrome 80.0.3987.87', 'Linux'),
(1165, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.17.148', '2020-03-07 06:38:59', 'Chrome 80.0.3987.87', 'Linux'),
(1166, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.17.148', '2020-03-07 06:38:59', 'Chrome 80.0.3987.87', 'Linux'),
(1167, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '140.213.17.148', '2020-03-07 06:39:03', 'Chrome 80.0.3987.87', 'Linux'),
(1168, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_permission//', '140.213.17.148', '2020-03-07 06:39:07', 'Chrome 80.0.3987.87', 'Linux'),
(1169, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '140.213.17.148', '2020-03-07 06:39:07', 'Chrome 80.0.3987.87', 'Linux'),
(1170, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 06:39:09', 'Chrome 80.0.3987.87', 'Linux'),
(1171, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 06:39:26', 'Chrome 80.0.3987.87', 'Linux'),
(1172, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor/setTahunajaran//', '140.213.17.148', '2020-03-07 06:39:26', 'Chrome 80.0.3987.87', 'Linux'),
(1173, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'rekapnilai///', '140.213.17.148', '2020-03-07 06:39:26', 'Chrome 80.0.3987.87', 'Linux'),
(1174, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'masukan///', '140.213.17.148', '2020-03-07 06:39:32', 'Chrome 80.0.3987.87', 'Linux'),
(1175, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'masukan/history_masukan//', '140.213.17.148', '2020-03-07 06:39:33', 'Chrome 80.0.3987.87', 'Linux'),
(1176, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'masukan/kirim_masukan//', '140.213.17.148', '2020-03-07 06:39:42', 'Chrome 80.0.3987.87', 'Linux'),
(1177, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'masukan/history_masukan//', '140.213.17.148', '2020-03-07 06:39:42', 'Chrome 80.0.3987.87', 'Linux'),
(1178, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 06:39:48', 'Chrome 80.0.3987.87', 'Linux'),
(1179, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'dasbor///', '140.213.17.148', '2020-03-07 06:39:48', 'Chrome 80.0.3987.87', 'Linux'),
(1180, '5df8c9b8e20e9', 1, 'Maulana Sabirin', 'auth/logout//', '140.213.17.148', '2020-03-07 06:39:51', 'Chrome 80.0.3987.87', 'Linux'),
(1181, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 06:39:51', 'Chrome 80.0.3987.87', 'Linux'),
(1182, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:39:57', 'Chrome 80.0.3987.87', 'Linux'),
(1183, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-07 06:39:57', 'Chrome 80.0.3987.87', 'Linux'),
(1184, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '140.213.17.148', '2020-03-07 06:39:57', 'Chrome 80.0.3987.87', 'Linux'),
(1185, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.17.148', '2020-03-07 06:40:03', 'Chrome 80.0.3987.87', 'Linux'),
(1186, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/wargabelajar//', '140.213.17.148', '2020-03-07 06:40:03', 'Chrome 80.0.3987.87', 'Linux'),
(1187, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-07 06:40:05', 'Chrome 80.0.3987.87', 'Linux'),
(1188, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/tutor//', '140.213.17.148', '2020-03-07 06:40:05', 'Chrome 80.0.3987.87', 'Linux'),
(1189, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:40:06', 'Chrome 80.0.3987.87', 'Linux'),
(1190, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:40:06', 'Chrome 80.0.3987.87', 'Linux'),
(1191, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e63403fc1da4', '140.213.17.148', '2020-03-07 06:40:14', 'Chrome 80.0.3987.87', 'Linux'),
(1192, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e63403fc1da4', '140.213.17.148', '2020-03-07 06:40:14', 'Chrome 80.0.3987.87', 'Linux'),
(1193, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:40:21', 'Chrome 80.0.3987.87', 'Linux'),
(1194, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:40:21', 'Chrome 80.0.3987.87', 'Linux'),
(1195, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.17.148', '2020-03-07 06:40:39', 'Chrome 80.0.3987.87', 'Linux'),
(1196, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5dfc9da09b91e', '140.213.17.148', '2020-03-07 06:40:39', 'Chrome 80.0.3987.87', 'Linux'),
(1197, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:40:48', 'Chrome 80.0.3987.87', 'Linux'),
(1198, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:40:48', 'Chrome 80.0.3987.87', 'Linux'),
(1199, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e63403fc1da4', '140.213.17.148', '2020-03-07 06:40:51', 'Chrome 80.0.3987.87', 'Linux'),
(1200, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e63403fc1da4', '140.213.17.148', '2020-03-07 06:40:51', 'Chrome 80.0.3987.87', 'Linux'),
(1201, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:41:15', 'Chrome 80.0.3987.87', 'Linux'),
(1202, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:41:15', 'Chrome 80.0.3987.87', 'Linux'),
(1203, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.17.148', '2020-03-07 06:41:18', 'Chrome 80.0.3987.87', 'Linux'),
(1204, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas/nilai/5e09494499b1d', '140.213.17.148', '2020-03-07 06:41:18', 'Chrome 80.0.3987.87', 'Linux'),
(1205, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:41:21', 'Chrome 80.0.3987.87', 'Linux'),
(1206, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor/kelas//', '140.213.17.148', '2020-03-07 06:41:21', 'Chrome 80.0.3987.87', 'Linux'),
(1207, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '140.213.17.148', '2020-03-07 06:42:23', 'Chrome 80.0.3987.87', 'Linux'),
(1208, NULL, NULL, NULL, 'auth///', '140.213.17.148', '2020-03-07 06:42:23', 'Chrome 80.0.3987.87', 'Linux'),
(1209, NULL, NULL, NULL, 'auth/cek_login//', '140.213.17.148', '2020-03-07 06:42:28', 'Chrome 80.0.3987.87', 'Linux'),
(1210, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.17.148', '2020-03-07 06:42:28', 'Chrome 80.0.3987.87', 'Linux'),
(1211, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '140.213.17.148', '2020-03-07 06:42:28', 'Chrome 80.0.3987.87', 'Linux'),
(1212, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 06:45:06', 'Chrome 80.0.3987.87', 'Linux'),
(1213, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '140.213.17.148', '2020-03-07 06:48:13', 'Chrome 80.0.3987.87', 'Linux'),
(1214, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '140.213.17.148', '2020-03-07 06:49:54', 'Chrome 80.0.3987.87', 'Linux'),
(1215, NULL, NULL, NULL, '///', '140.213.44.240', '2020-03-07 06:51:24', 'Chrome 55.0.2883.91', 'Android'),
(1216, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tahunajaran///', '140.213.17.148', '2020-03-07 06:51:28', 'Chrome 80.0.3987.87', 'Linux'),
(1217, NULL, NULL, NULL, 'auth/cek_login//', '140.213.44.240', '2020-03-07 06:51:36', 'Chrome 55.0.2883.91', 'Android'),
(1218, NULL, NULL, NULL, 'auth///', '140.213.44.240', '2020-03-07 06:51:37', 'Chrome 55.0.2883.91', 'Android'),
(1219, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'rekapmasukan///', '140.213.17.148', '2020-03-07 06:53:00', 'Chrome 80.0.3987.87', 'Linux'),
(1220, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '140.213.17.148', '2020-03-07 06:54:07', 'Chrome 80.0.3987.87', 'Linux'),
(1221, NULL, NULL, NULL, '///', '64.233.173.104', '2020-03-07 07:06:03', 'Chrome 76.0.3809.132', 'Android'),
(1222, NULL, NULL, NULL, '///', '64.233.173.104', '2020-03-07 07:20:25', 'Chrome 76.0.3809.132', 'Android'),
(1223, NULL, NULL, NULL, 'auth///', '140.213.18.220', '2020-03-08 08:58:11', 'Chrome 55.0.2883.91', 'Android'),
(1224, NULL, NULL, NULL, '///', '36.79.254.218', '2020-03-08 10:47:34', 'Chrome 80.0.3987.87', 'Linux'),
(1225, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:47:43', 'Chrome 80.0.3987.87', 'Linux'),
(1226, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 10:47:43', 'Chrome 80.0.3987.87', 'Linux'),
(1227, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 10:47:43', 'Chrome 80.0.3987.87', 'Linux'),
(1228, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '36.79.254.218', '2020-03-08 10:48:09', 'Chrome 80.0.3987.87', 'Linux'),
(1229, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_active//', '36.79.254.218', '2020-03-08 10:48:17', 'Chrome 80.0.3987.87', 'Linux'),
(1230, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '36.79.254.218', '2020-03-08 10:48:17', 'Chrome 80.0.3987.87', 'Linux'),
(1231, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_active//', '36.79.254.218', '2020-03-08 10:48:21', 'Chrome 80.0.3987.87', 'Linux'),
(1232, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '36.79.254.218', '2020-03-08 10:48:21', 'Chrome 80.0.3987.87', 'Linux'),
(1233, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_active//', '36.79.254.218', '2020-03-08 10:48:21', 'Chrome 80.0.3987.87', 'Linux'),
(1234, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '36.79.254.218', '2020-03-08 10:48:21', 'Chrome 80.0.3987.87', 'Linux'),
(1235, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.254.218', '2020-03-08 10:48:24', 'Chrome 80.0.3987.87', 'Linux'),
(1236, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 10:48:30', 'Chrome 80.0.3987.87', 'Linux'),
(1237, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '36.79.254.218', '2020-03-08 10:48:34', 'Chrome 80.0.3987.87', 'Linux'),
(1238, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.254.218', '2020-03-08 10:48:37', 'Chrome 80.0.3987.87', 'Linux'),
(1239, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.254.218', '2020-03-08 10:49:14', 'Chrome 80.0.3987.87', 'Linux'),
(1240, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 10:49:14', 'Chrome 80.0.3987.87', 'Linux'),
(1241, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 10:49:17', 'Chrome 80.0.3987.87', 'Linux'),
(1242, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:49:17', 'Chrome 80.0.3987.87', 'Linux'),
(1243, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:49:23', 'Chrome 80.0.3987.87', 'Linux'),
(1244, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:49:23', 'Chrome 80.0.3987.87', 'Linux'),
(1245, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:49:31', 'Chrome 80.0.3987.87', 'Linux'),
(1246, '5e64cdaab0c04', 1, 'zam', 'dasbor///', '36.79.254.218', '2020-03-08 10:49:31', 'Chrome 80.0.3987.87', 'Linux'),
(1247, '5e64cdaab0c04', 1, 'zam', 'dasbor///', '36.79.254.218', '2020-03-08 10:49:31', 'Chrome 80.0.3987.87', 'Linux'),
(1248, '5e64cdaab0c04', 1, 'zam', 'auth/logout//', '36.79.254.218', '2020-03-08 10:49:34', 'Chrome 80.0.3987.87', 'Linux'),
(1249, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:49:34', 'Chrome 80.0.3987.87', 'Linux'),
(1250, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:49:41', 'Chrome 80.0.3987.87', 'Linux'),
(1251, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 10:49:41', 'Chrome 80.0.3987.87', 'Linux'),
(1252, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 10:49:41', 'Chrome 80.0.3987.87', 'Linux'),
(1253, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.254.218', '2020-03-08 10:49:53', 'Chrome 80.0.3987.87', 'Linux'),
(1254, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor/tambah//', '36.79.254.218', '2020-03-08 10:49:58', 'Chrome 80.0.3987.87', 'Linux'),
(1255, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '36.79.254.218', '2020-03-08 10:50:08', 'Chrome 80.0.3987.87', 'Linux'),
(1256, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '36.79.254.218', '2020-03-08 10:50:10', 'Chrome 80.0.3987.87', 'Linux'),
(1257, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/presensi/5dfc9d36a3f25', '36.79.254.218', '2020-03-08 10:50:16', 'Chrome 80.0.3987.87', 'Linux'),
(1258, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/presensi/5dfc9d36a3f25', '36.79.254.218', '2020-03-08 10:50:16', 'Chrome 80.0.3987.87', 'Linux'),
(1259, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '36.79.254.218', '2020-03-08 10:50:16', 'Chrome 80.0.3987.87', 'Linux'),
(1260, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/presensi/5dfc9da09b91e', '36.79.254.218', '2020-03-08 10:50:21', 'Chrome 80.0.3987.87', 'Linux'),
(1261, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/presensi/5dfc9da09b91e', '36.79.254.218', '2020-03-08 10:50:21', 'Chrome 80.0.3987.87', 'Linux'),
(1262, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5dfc9da09b91e', '36.79.254.218', '2020-03-08 10:50:23', 'Chrome 80.0.3987.87', 'Linux'),
(1263, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5dfc9da09b91e', '36.79.254.218', '2020-03-08 10:50:23', 'Chrome 80.0.3987.87', 'Linux'),
(1264, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '36.79.254.218', '2020-03-08 10:50:39', 'Chrome 80.0.3987.87', 'Linux'),
(1265, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3966f0b29/', '36.79.254.218', '2020-03-08 10:50:42', 'Chrome 80.0.3987.87', 'Linux'),
(1266, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/presensi/5e617de11c2ed', '36.79.254.218', '2020-03-08 10:50:46', 'Chrome 80.0.3987.87', 'Linux'),
(1267, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/presensi/5e617de11c2ed', '36.79.254.218', '2020-03-08 10:50:46', 'Chrome 80.0.3987.87', 'Linux'),
(1268, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3966f0b29/', '36.79.254.218', '2020-03-08 10:50:46', 'Chrome 80.0.3987.87', 'Linux'),
(1269, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5e617de11c2ed', '36.79.254.218', '2020-03-08 10:50:50', 'Chrome 80.0.3987.87', 'Linux'),
(1270, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5e617de11c2ed', '36.79.254.218', '2020-03-08 10:50:50', 'Chrome 80.0.3987.87', 'Linux'),
(1271, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:50:54', 'Chrome 80.0.3987.87', 'Linux'),
(1272, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:50:54', 'Chrome 80.0.3987.87', 'Linux'),
(1273, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5e617de11c2ed', '36.79.254.218', '2020-03-08 10:51:06', 'Chrome 80.0.3987.87', 'Linux'),
(1274, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5e617de11c2ed', '36.79.254.218', '2020-03-08 10:51:06', 'Chrome 80.0.3987.87', 'Linux'),
(1275, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:52:30', 'Chrome 80.0.3987.87', 'Linux'),
(1276, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:52:30', 'Chrome 80.0.3987.87', 'Linux'),
(1277, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 10:52:52', 'Chrome 80.0.3987.87', 'Linux'),
(1278, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 10:52:52', 'Chrome 80.0.3987.87', 'Linux'),
(1279, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:52:58', 'Chrome 80.0.3987.87', 'Linux'),
(1280, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:52:58', 'Chrome 80.0.3987.87', 'Linux'),
(1281, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:53:55', 'Chrome 80.0.3987.87', 'Linux'),
(1282, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas//', '36.79.254.218', '2020-03-08 10:53:55', 'Chrome 80.0.3987.87', 'Linux'),
(1283, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 10:54:01', 'Chrome 80.0.3987.87', 'Linux'),
(1284, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:54:01', 'Chrome 80.0.3987.87', 'Linux'),
(1285, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:54:06', 'Chrome 80.0.3987.87', 'Linux'),
(1286, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:54:06', 'Chrome 80.0.3987.87', 'Linux'),
(1287, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:54:16', 'Chrome 80.0.3987.87', 'Linux'),
(1288, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:54:16', 'Chrome 80.0.3987.87', 'Linux'),
(1289, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 10:54:22', 'Chrome 80.0.3987.87', 'Linux'),
(1290, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '36.79.254.218', '2020-03-08 10:54:22', 'Chrome 80.0.3987.87', 'Linux'),
(1291, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'dasbor///', '36.79.254.218', '2020-03-08 10:54:22', 'Chrome 80.0.3987.87', 'Linux'),
(1292, '5ded07350f828', 2, 'Iyep Saepumilah SH.I, M.Pd.I', 'auth/logout//', '36.79.254.218', '2020-03-08 10:54:29', 'Chrome 80.0.3987.87', 'Linux'),
(1293, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 10:54:29', 'Chrome 80.0.3987.87', 'Linux'),
(1294, NULL, NULL, NULL, '///', '36.79.254.218', '2020-03-08 11:06:35', 'Chrome 80.0.3987.87', 'Linux'),
(1295, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:06:54', 'Chrome 80.0.3987.87', 'Linux'),
(1296, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.254.218', '2020-03-08 11:06:54', 'Chrome 80.0.3987.87', 'Linux'),
(1297, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.254.218', '2020-03-08 11:07:52', 'Chrome 80.0.3987.87', 'Linux'),
(1298, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:08:03', 'Chrome 80.0.3987.87', 'Linux'),
(1299, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:08:03', 'Chrome 80.0.3987.87', 'Linux'),
(1300, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/import/tutor/', '36.79.254.218', '2020-03-08 11:08:09', 'Chrome 80.0.3987.87', 'Linux'),
(1301, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.254.218', '2020-03-08 11:08:10', 'Chrome 80.0.3987.87', 'Linux'),
(1302, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/import/wargabelajar/', '36.79.254.218', '2020-03-08 11:09:23', 'Chrome 80.0.3987.87', 'Linux'),
(1303, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.254.218', '2020-03-08 11:09:23', 'Chrome 80.0.3987.87', 'Linux'),
(1304, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/wargabelajar//', '36.79.254.218', '2020-03-08 11:09:42', 'Chrome 80.0.3987.87', 'Linux'),
(1305, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/wargabelajar//', '36.79.254.218', '2020-03-08 11:09:42', 'Chrome 80.0.3987.87', 'Linux'),
(1306, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:09:43', 'Chrome 80.0.3987.87', 'Linux'),
(1307, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:09:43', 'Chrome 80.0.3987.87', 'Linux'),
(1308, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 11:09:57', 'Chrome 80.0.3987.87', 'Linux'),
(1309, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/ubah/5e633fa06b2f5/', '36.79.254.218', '2020-03-08 11:10:06', 'Chrome 80.0.3987.87', 'Linux'),
(1310, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 11:10:12', 'Chrome 80.0.3987.87', 'Linux'),
(1311, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:10:12', 'Chrome 80.0.3987.87', 'Linux'),
(1312, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:10:19', 'Chrome 80.0.3987.87', 'Linux'),
(1313, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:10:19', 'Chrome 80.0.3987.87', 'Linux'),
(1314, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:10:19', 'Chrome 80.0.3987.87', 'Linux'),
(1315, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 11:10:30', 'Chrome 80.0.3987.87', 'Linux'),
(1316, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/ubah/5e6306f57a824/', '36.79.254.218', '2020-03-08 11:10:36', 'Chrome 80.0.3987.87', 'Linux'),
(1317, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 11:10:40', 'Chrome 80.0.3987.87', 'Linux'),
(1318, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:10:41', 'Chrome 80.0.3987.87', 'Linux'),
(1319, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:11:02', 'Chrome 80.0.3987.87', 'Linux'),
(1320, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:11:02', 'Chrome 80.0.3987.87', 'Linux'),
(1321, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:23:58', 'Chrome 80.0.3987.87', 'Linux'),
(1322, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:23:58', 'Chrome 80.0.3987.87', 'Linux'),
(1323, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:23:58', 'Chrome 80.0.3987.87', 'Linux'),
(1324, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/import/wargabelajar/', '36.79.254.218', '2020-03-08 11:24:07', 'Chrome 80.0.3987.87', 'Linux'),
(1325, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.254.218', '2020-03-08 11:24:08', 'Chrome 80.0.3987.87', 'Linux'),
(1326, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/import/tutor/', '36.79.254.218', '2020-03-08 11:24:12', 'Chrome 80.0.3987.87', 'Linux'),
(1327, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'favicon.ico///', '36.79.254.218', '2020-03-08 11:24:13', 'Chrome 80.0.3987.87', 'Linux'),
(1328, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:24:17', 'Chrome 80.0.3987.87', 'Linux'),
(1329, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:24:17', 'Chrome 80.0.3987.87', 'Linux'),
(1330, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 11:24:27', 'Chrome 80.0.3987.87', 'Linux'),
(1331, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/hapus/5e64cdaab0c04/', '36.79.254.218', '2020-03-08 11:24:33', 'Chrome 80.0.3987.87', 'Linux'),
(1332, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 11:24:33', 'Chrome 80.0.3987.87', 'Linux'),
(1333, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/ubah/5e6306f57a824/', '36.79.254.218', '2020-03-08 11:24:39', 'Chrome 80.0.3987.87', 'Linux'),
(1334, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 11:24:44', 'Chrome 80.0.3987.87', 'Linux'),
(1335, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:24:44', 'Chrome 80.0.3987.87', 'Linux'),
(1336, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:25:02', 'Chrome 80.0.3987.87', 'Linux'),
(1337, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'dasbor///', '36.79.254.218', '2020-03-08 11:25:02', 'Chrome 80.0.3987.87', 'Linux'),
(1338, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'dasbor///', '36.79.254.218', '2020-03-08 11:25:02', 'Chrome 80.0.3987.87', 'Linux'),
(1339, '5e6306f57a824', 1, 'Fia Milhatunnisa', 'auth/logout//', '36.79.254.218', '2020-03-08 11:25:06', 'Chrome 80.0.3987.87', 'Linux'),
(1340, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:25:06', 'Chrome 80.0.3987.87', 'Linux'),
(1341, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:25:12', 'Chrome 80.0.3987.87', 'Linux'),
(1342, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:25:12', 'Chrome 80.0.3987.87', 'Linux'),
(1343, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:25:12', 'Chrome 80.0.3987.87', 'Linux'),
(1344, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.254.218', '2020-03-08 11:25:24', 'Chrome 80.0.3987.87', 'Linux'),
(1345, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 11:25:30', 'Chrome 80.0.3987.87', 'Linux'),
(1346, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:25:30', 'Chrome 80.0.3987.87', 'Linux'),
(1347, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:25:38', 'Chrome 80.0.3987.87', 'Linux'),
(1348, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:25:38', 'Chrome 80.0.3987.87', 'Linux'),
(1349, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:25:38', 'Chrome 80.0.3987.87', 'Linux'),
(1350, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.254.218', '2020-03-08 11:25:49', 'Chrome 80.0.3987.87', 'Linux'),
(1351, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 11:25:53', 'Chrome 80.0.3987.87', 'Linux'),
(1352, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:25:53', 'Chrome 80.0.3987.87', 'Linux'),
(1353, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 11:26:03', 'Chrome 80.0.3987.87', 'Linux'),
(1354, '5ded0e21b5aea', 3, 'Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:26:03', 'Chrome 80.0.3987.87', 'Linux'),
(1355, '5ded0e21b5aea', 3, 'Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 11:26:03', 'Chrome 80.0.3987.87', 'Linux'),
(1356, '5ded0e21b5aea', 3, 'Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 11:26:07', 'Chrome 80.0.3987.87', 'Linux'),
(1357, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 11:26:07', 'Chrome 80.0.3987.87', 'Linux'),
(1358, NULL, NULL, NULL, 'auth///', '140.213.24.88', '2020-03-08 13:06:19', 'Chrome 80.0.3987.132', 'Windows 8.1'),
(1359, NULL, NULL, NULL, '///', '36.79.254.218', '2020-03-08 23:13:56', 'Chrome 80.0.3987.87', 'Linux'),
(1360, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 23:14:02', 'Chrome 80.0.3987.87', 'Linux'),
(1361, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 23:14:03', 'Chrome 80.0.3987.87', 'Linux'),
(1362, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor///', '36.79.254.218', '2020-03-08 23:14:03', 'Chrome 80.0.3987.87', 'Linux'),
(1363, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 23:14:17', 'Chrome 80.0.3987.87', 'Linux'),
(1364, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/hapus/5e633fa06b2f5/', '36.79.254.218', '2020-03-08 23:14:23', 'Chrome 80.0.3987.87', 'Linux'),
(1365, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 23:14:23', 'Chrome 80.0.3987.87', 'Linux'),
(1366, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '36.79.254.218', '2020-03-08 23:14:27', 'Chrome 80.0.3987.87', 'Linux'),
(1367, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/set_active//', '36.79.254.218', '2020-03-08 23:14:31', 'Chrome 80.0.3987.87', 'Linux'),
(1368, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan/status_permission//', '36.79.254.218', '2020-03-08 23:14:31', 'Chrome 80.0.3987.87', 'Linux'),
(1369, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 23:14:33', 'Chrome 80.0.3987.87', 'Linux'),
(1370, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.254.218', '2020-03-08 23:14:38', 'Chrome 80.0.3987.87', 'Linux'),
(1371, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/tambah//', '36.79.254.218', '2020-03-08 23:17:35', 'Chrome 80.0.3987.87', 'Linux'),
(1372, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 23:17:35', 'Chrome 80.0.3987.87', 'Linux'),
(1373, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel//', '36.79.254.218', '2020-03-08 23:21:18', 'Chrome 80.0.3987.87', 'Linux'),
(1374, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'kelas/rombel_tambah/5dfc397184367/', '36.79.254.218', '2020-03-08 23:21:22', 'Chrome 80.0.3987.87', 'Linux'),
(1375, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'pengaturan///', '36.79.254.218', '2020-03-08 23:25:25', 'Chrome 80.0.3987.87', 'Linux'),
(1376, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar///', '36.79.254.218', '2020-03-08 23:27:16', 'Chrome 80.0.3987.87', 'Linux'),
(1377, NULL, NULL, NULL, '///', '36.79.254.218', '2020-03-08 23:46:55', 'Chrome 79.0.3945.136', 'Android'),
(1378, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'wargabelajar/ubah/5e657d0f159b6/', '36.79.254.218', '2020-03-08 23:47:12', 'Chrome 80.0.3987.87', 'Linux'),
(1379, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 23:47:37', 'Chrome 79.0.3945.136', 'Android'),
(1380, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'dasbor///', '36.79.254.218', '2020-03-08 23:47:37', 'Chrome 79.0.3945.136', 'Android'),
(1381, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'dasbor///', '36.79.254.218', '2020-03-08 23:47:37', 'Chrome 79.0.3945.136', 'Android'),
(1382, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'index.html///', '36.79.254.218', '2020-03-08 23:47:53', 'Chrome 79.0.3945.136', 'Android'),
(1383, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'dasbor///', '36.79.254.218', '2020-03-08 23:47:55', 'Chrome 79.0.3945.136', 'Android'),
(1384, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'dasbor///', '36.79.254.218', '2020-03-08 23:47:55', 'Chrome 79.0.3945.136', 'Android'),
(1385, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'masukan///', '36.79.254.218', '2020-03-08 23:47:59', 'Chrome 79.0.3945.136', 'Android'),
(1386, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'masukan/history_masukan//', '36.79.254.218', '2020-03-08 23:48:00', 'Chrome 79.0.3945.136', 'Android'),
(1387, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'dasbor///', '36.79.254.218', '2020-03-08 23:48:58', 'Chrome 79.0.3945.136', 'Android'),
(1388, '5e657d0f159b6', 1, 'Maulana Malik Ibrahim', 'dasbor///', '36.79.254.218', '2020-03-08 23:48:58', 'Chrome 79.0.3945.136', 'Android'),
(1389, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal///', '36.79.254.218', '2020-03-08 23:52:57', 'Chrome 80.0.3987.87', 'Linux'),
(1390, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'jadwal/matpel_lihat/5dfc3970e4387/', '36.79.254.218', '2020-03-08 23:53:01', 'Chrome 80.0.3987.87', 'Linux'),
(1391, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5dfc9da09b91e', '36.79.254.218', '2020-03-08 23:53:09', 'Chrome 80.0.3987.87', 'Linux'),
(1392, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'dasbor/kelas/nilai/5dfc9da09b91e', '36.79.254.218', '2020-03-08 23:53:09', 'Chrome 80.0.3987.87', 'Linux'),
(1393, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'tutor///', '36.79.254.218', '2020-03-08 23:54:01', 'Chrome 80.0.3987.87', 'Linux'),
(1394, '5de15e4e0de9d', 0, 'Zam Zam Saeful Bahtiar', 'auth/logout//', '36.79.254.218', '2020-03-08 23:54:08', 'Chrome 80.0.3987.87', 'Linux'),
(1395, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-08 23:54:08', 'Chrome 80.0.3987.87', 'Linux'),
(1396, NULL, NULL, NULL, 'auth/cek_login//', '36.79.254.218', '2020-03-08 23:54:15', 'Chrome 80.0.3987.87', 'Linux'),
(1397, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '36.79.254.218', '2020-03-08 23:54:15', 'Chrome 80.0.3987.87', 'Linux'),
(1398, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'dasbor///', '36.79.254.218', '2020-03-08 23:54:15', 'Chrome 80.0.3987.87', 'Linux'),
(1399, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/', '36.79.254.218', '2020-03-08 23:54:20', 'Chrome 80.0.3987.87', 'Linux'),
(1400, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'nilai/rekap/5dfc9da09b91e/pdf', '36.79.254.218', '2020-03-08 23:54:24', 'Chrome 80.0.3987.87', 'Linux'),
(1401, '5df69881a9a58', 3, 'Dewi Fortuna Kamila', 'auth/logout//', '36.79.254.218', '2020-03-09 00:14:21', 'Chrome 80.0.3987.87', 'Linux'),
(1402, NULL, NULL, NULL, 'auth///', '36.79.254.218', '2020-03-09 00:14:21', 'Chrome 80.0.3987.87', 'Linux'),
(1403, NULL, NULL, NULL, '///', '114.124.244.132', '2020-03-09 05:51:27', 'Chrome 79.0.3945.136', 'Android');

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
('5e6341ae9a9f0', 'Butuh kipas angin!', '0', '5dfc3966f0b29', '5df8c9b8e20e9', '2020-03-07 06:39:42');

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
('5dfc9c2a3f68d', 'Pendidikan Agama Islam', '2019-12-20 17:02:18', NULL),
('5e6302a5c3168', 'Penjasorkes', '2020-03-07 02:10:45', NULL);

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
(40, '5e2a1c8343b8b', 'Harian', 2, '2020-02-25 10:36:58', '0000-00-00 00:00:00'),
(41, '5e2a1c8343b8b', 'PAT', 100, '2020-03-07 06:37:28', '0000-00-00 00:00:00');

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
('5ded07350f828', 'iyep', 'Iyep Saepumilah SH.I, M.Pd.I', '.jpg', '8843028fefce50a6de50acdf064ded27', '0000-00-00 00:00:00', '2020-02-22 20:41:19');

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
('5e513bb5a5186', '5dfc9da09b91e', '2020-02-22', '2020-02-22 21:33:30', '0000-00-00 00:00:00'),
('5e621644d5460', '5dfc9da09b91e', '2020-03-06', '2020-03-06 09:22:14', '0000-00-00 00:00:00'),
('5e6314a0a95b2', '5dfc9da09b91e', '2020-03-07', '2020-03-07 03:27:35', '0000-00-00 00:00:00'),
('5e6340feb02a0', '5dfc9da09b91e', '2020-03-07', '2020-03-07 06:36:48', '0000-00-00 00:00:00');

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
(80, '5e513bb5a5186', '5dfc3f1b90991', 'A', '2020-02-22 21:33:30'),
(81, '5e621644d5460', '5df8c9b8e20e9', 'H', '2020-03-06 15:16:43'),
(82, '5e621644d5460', '5df8cbbfd492d', 'H', '2020-03-06 15:16:45'),
(83, '5e621644d5460', '5df8cc7a68b47', 'H', '2020-03-06 15:16:46'),
(84, '5e621644d5460', '5df8ce3c7570f', 'H', '2020-03-06 15:16:47'),
(85, '5e621644d5460', '5dfc3f1b90991', 'H', '2020-03-06 15:16:48'),
(86, '5e6314a0a95b2', '5df8c9b8e20e9', 'H', '2020-03-07 04:41:19'),
(87, '5e6314a0a95b2', '5df8cbbfd492d', 'I', '2020-03-07 04:41:21'),
(88, '5e6314a0a95b2', '5df8cc7a68b47', 'H', '2020-03-07 04:41:22'),
(89, '5e6314a0a95b2', '5df8ce3c7570f', 'H', '2020-03-07 04:41:23'),
(90, '5e6314a0a95b2', '5dfc3f1b90991', 'I', '2020-03-07 04:41:16'),
(91, '5e6340feb02a0', '5df8c9b8e20e9', 'A', '2020-03-07 06:36:48'),
(92, '5e6340feb02a0', '5df8cbbfd492d', 'A', '2020-03-07 06:36:48'),
(93, '5e6340feb02a0', '5df8cc7a68b47', 'A', '2020-03-07 06:36:48'),
(94, '5e6340feb02a0', '5df8ce3c7570f', 'A', '2020-03-07 06:36:48'),
(95, '5e6340feb02a0', '5dfc3f1b90991', 'A', '2020-03-07 06:36:48'),
(96, '5e6340feb02a0', '5e63004943285', 'A', '2020-03-07 06:36:48');

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
(11, '5e617d681e1d3', '5dfc3f1b90991', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '5dfc397184367', '5e63004943285', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `tahunajaran_id` varchar(100) NOT NULL,
  `tahunajaran_nama` varchar(50) NOT NULL,
  `open_nilai` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`tahunajaran_id`, `tahunajaran_nama`, `open_nilai`, `is_active`, `created_at`, `updated_at`) VALUES
('5dfc3966f0b29', '2018/2019', 0, 1, '0000-00-00 00:00:00', '2020-03-07 01:58:12'),
('5dfc3970e4387', '2019/2020', 1, 0, '0000-00-00 00:00:00', '2020-03-07 01:58:00');

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
('5ded0e21b5aea', '322260005400001006', 'Bahtiar', 'Pria', 'Tasikmalaya', '1999-05-18', 'Islam', 'WNI', 'SLTA Sederajat', 'Cihonje', '002/002', 'Karanganyar', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', 'd36f5470ad7584b896a97251b4792c0c', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5df69881a9a58', '322260005400001001', 'Dewi Fortuna Kamila', 'Wanita', 'Tasikmalaya', '1999-12-16', 'Islam', 'WNI', 'SLTA Sederajat', 'Cijerah', '003/005', 'Karanganyar', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', '1ca5477c916384a252fbae12fe03ac57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9a88e27cb', '322260005400001002', 'Neneng', 'Wanita', 'Tasikmalaya', '1989-10-20', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', '5b16e37576a513d53e94b9d346ce3653', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9aab6ada9', '322260005400001003', 'Syamsul Azis S.Pd', 'Pria', 'Tasikmalaya', '1993-08-08', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', 'b472bdc634ec331a16d8080b6a556c28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9b297a427', '322260005400001004', 'Wildan Rahmah Hakim, S.Pd', 'Wanita', 'Tasikmalaya', '1987-11-05', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', '1c7a6562f5d3cd9f46df770c7075fea9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dfc9bafd6bb6', '322260005400001005', 'Hendra', 'Pria', 'Tasikmalaya', '1978-10-02', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', '614e1c8a1dd2e2339e897451b5459612', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5e630292e06d1', '322260005400001007', 'Yosep, S.Pd', 'Pria', 'Tasikmalaya', '1984-05-24', 'Islam', 'WNI', 'S1', '', '', '', '', '', '', '', 'default.jpg', '3c099a6e8c6b2b4d0d8c91501a1cb67b', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('5df8c2b2d14b8', '181907010', '9999744534', 'Ikhwan Sopyan', 'Pria', 'Kota Tasikmalaya', '1999-02-08', 'Islam', 'WNI', 'Sukagenah', '003/004', 'Sambongjaya', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'SDN Sambong Permai', 'Sambong Permai', 'DN-02 Dd 0447031', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', 'cefac8a611f2c0fd05320f7ef6d65161', 'Yayan Sopyan', 'Wiraswasta', 'Sukagenah', '003/004', 'Sambongjaya', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Ika Sumartika', '', '', '', '', '', '', '', '', ''),
('5df8c9b8e20e9', '181907011', '0001162375', 'Maulana Sabirin', 'Pria', 'Tasikmalaya', '2000-01-25', 'Islam', 'WNI', 'Citamiang', '004/008', 'Tanjung', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'SDN Tanjung I', '', 'DN-02 Dd 0743335', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '447f9643353e2f2bd0d0886d18f079a0', 'E. Sutisna', 'Buruh', 'Citamiang', '004/008', 'Tanjung', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Empay', '', '', '', '', '', '', '', '', ''),
('5df8cbbfd492d', '181907012', '0028750718', 'Muhammad Ramadhani', 'Pria', 'Ciamis', '2002-11-18', 'Islam', NULL, 'Ciherang', '021/008', 'Sukasenang', 'Sindangkasih', 'Kabupaten Ciamis', 'Jawa Barat', '', 'SDN 2 Sukasenang', '', 'DN-02 Dd 0393525', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '588820d64b6ce91c6497b38a72e2bf8f', 'Sopyan Saori', 'Buruh', 'Ciherang', '021/008', 'Sukasenang', 'Sindangkasih', 'Kabupaten Ciamis', 'Jawa Barat', '', 'Nunung Nurjanah', '', '', '', '', '', '', '', '', ''),
('5df8cc7a68b47', '181907013', '9957772263', 'Nanang Nurdiana', 'Pria', 'Tasikmalaya', '1995-10-17', 'Islam', NULL, 'Gargadung', '003/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'SDN Cigantang II', '', 'DN-02Dd 0652357', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '6fc2cd68d118fcb92895058f587958da', 'Juju', 'Buruh', 'Gargadung', '003/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'Maesaroh', '', '', '', '', '', '', '', '', ''),
('5df8ce3c7570f', '181907014', '9809430487', 'Nia Kurniawati', 'Wanita', 'Tasikmalaya', '1980-07-06', 'Islam', NULL, 'Gargadung', '001/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'SDN Sambongpari', '', '02 0A oa 0684123', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '7ee5c7547f57cd4b6d645628e4d65edb', 'Ano Karno', 'Buruh', 'Gargadung', '001/004', 'Cigantang', 'Mangkubumi', 'Kota Tasikmalaya', 'Jawa Barat', '46181', 'Maryati', '', '', '', '', '', '', '', '', ''),
('5dfc3f1b90991', '181907015', '9980731840', 'Amat Rustendi', 'Pria', 'Tasikmalaya', '2018-07-16', 'Islam', '', '', '', '', '', '', '', '', 'SMPN 20 Tasikmalaya', '', 'DN-02 DI 0117579/14 Juni 2014', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '9dde9607502c92f5e326eea4c8d5b168', 'Amatan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5e63004943285', '181907016', '9892049792', 'Budi Rahmat', 'Pria', 'Tasikmalaya', '1989-08-20', 'Islam', '', 'Saguling Cihonje', 'RT. 002 RW', 'Sambongjaya', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '', '', '', 'DN-02 PB 0005150 / 2 Juni 2017', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '61feea8a01dd3a12bc883a255d4d7e46', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5e63016cef1c7', '181907017', '9997740152', 'Ani Suryani', 'Wanita', 'Bojonggambir', '1991-10-30', 'Islam', '', 'Logokmuncang', 'RT 004 / R', 'Wandasari', 'Bojonggambir', 'Tasikmalaya', 'Jawa Barat', '46197', '', '', 'DN - 02 DI 0382717/ Juni 2000', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '3263a3c70087144b5e2b2bc1c97e409b', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5e630273c2208', '181907018', '0000413455', 'Ayuna Rahayu', 'Wanita', 'Tasikmalaya', '2000-05-06', 'Islam', '', 'Asta Lebak', 'RT 002 /RW', 'Cibeuti', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '', '', '', 'MTs 1200234541 / 10 Juni 2015', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', 'c9c8d273134fbb745e5c517c839bf04d', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5e63043c991e8', '181907019', '9758616030', 'Ei Jamaludin', 'Pria', 'Tasikmalaya', '1976-02-02', 'Islam', '', 'Cihonje', 'RT 002 / R', 'Cilamajang', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '', '', '', 'DN - 02 PB 0005105/ 2 Juni 2017', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '739f26ee8855dc1d8a8d8f1f13e4df81', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5e6306f57a824', '181907020', '9958442559', 'Fia Milhatunnisa', 'Wanita', 'Tasikmalaya', '1995-08-26', 'Islam', NULL, 'Cigantang', 'RT 002 / R', 'Mangkubumi', 'Mangkubumi', 'Tasikmalaya', 'Jawa Barat', '', '', '', 'MTs 100112377 / 4 jUNI 2011', '2018-07-18', '5dfc3966f0b29', 'Aktif', 'default.jpg', '83c123c6777c5f0ec46875ae359c04a7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5e657d0f159b6', '181907021', '', 'Maulana Malik Ibrahim', 'Pria', 'Tasikmalaya', '1985-03-05', 'Islam', '', 'Ciherang', '021/008', 'Sukasenang', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'SMPN 20 Tasikmalaya', 'Kawalu', '', '2018-07-06', '5dfc3966f0b29', 'Aktif', 'default.jpg', 'c736c7e3600485ea58a574c63307ad28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1404;

--
-- AUTO_INCREMENT for table `nilai_details`
--
ALTER TABLE `nilai_details`
  MODIFY `nilai_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `presensi_details`
--
ALTER TABLE `presensi_details`
  MODIFY `presensi_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `rombel_details`
--
ALTER TABLE `rombel_details`
  MODIFY `rombel_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;