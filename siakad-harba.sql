-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2019 at 10:01 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.12-1+ubuntu16.04.1+deb.sury.org+1

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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
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
  `matpel_id` varchar(100) NOT NULL,
  `kelas_id` varchar(100) NOT NULL,
  `jadwal_waktu` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `jadwal_tipe_pembelajaran`, `jadwal_hari`, `matpel_id`, `kelas_id`, `jadwal_waktu`, `created_at`, `updated_at`) VALUES
('5df4e405df2a4', 'Tatap Muka', 'Sabtu', '5df4e3ca31a5c', '5df3b87c5b9f1', '13:00-14:00', '2019-12-14 20:30:45', '2019-12-15 03:52:37'),
('5df55eadd490d', 'Tatap Muka', 'Jum\'at', '5df4e3ca31a5c', '5df3b8828ef3f', '13:00-14:00', '2019-12-15 05:14:05', '0000-00-00 00:00:00'),
('5df55ef07c125', 'Tatap Muka', 'Minggu', '5df4e3ca31a5c', '5df3b8828ef3f', '16:00-17:00', '2019-12-15 05:15:12', '2019-12-15 05:18:01'),
('5df55f201c07c', 'Tatap Muka', 'Jum\'at', '5df4e3ca31a5c', '5df3b887206bf', '13:00-14:00', '2019-12-15 05:16:00', '0000-00-00 00:00:00'),
('5df55f4142ac0', 'Tatap Muka', 'Sabtu', '5df4e3dfc0268', '5df3b87c5b9f1', '14:00-15:00', '2019-12-15 05:16:33', '0000-00-00 00:00:00'),
('5df6eb73ae944', 'Tutorial', NULL, '5df4e3dfc0268', '5df3b87c5b9f1', NULL, '2019-12-16 09:26:59', '0000-00-00 00:00:00');

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
('5df3b87c5b9f1', 'Kelas IX', '2019-12-13 23:12:44', '2019-12-13 23:13:13'),
('5df3b8828ef3f', 'Kelas XI', '2019-12-13 23:12:50', NULL),
('5df3b887206bf', 'Kelas XII', '2019-12-13 23:12:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `matpel_id` varchar(100) NOT NULL,
  `matpel_nama` varchar(50) NOT NULL,
  `tutor_id` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`matpel_id`, `matpel_nama`, `tutor_id`, `created_at`, `updated_at`) VALUES
('5df4e3ca31a5c', 'Matematika', '5ded0e21b5aea', '0000-00-00 00:00:00', NULL),
('5df4e3dfc0268', 'Bahasa Indonesia', '5df4f42689c9e', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `pimpinan_id` varchar(100) NOT NULL,
  `pimpinan_username` varchar(25) NOT NULL,
  `pimpinan_nama` varchar(100) NOT NULL,
  `pimpinan_foto` varchar(100) DEFAULT NULL,
  `pimpinan_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`pimpinan_id`, `pimpinan_username`, `pimpinan_nama`, `pimpinan_foto`, `pimpinan_password`) VALUES
('5ded07350f828', 'iyep', 'Iyep Saepumilah SH.I, M.Ag', '5ded07350f828.jpg', 'd93a5def7511da3d0f2d171d9c344e91');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `tahunajaran_id` varchar(100) NOT NULL,
  `tahunajaran_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`tahunajaran_id`, `tahunajaran_nama`) VALUES
('5deece94c9ee3', '2017/2018'),
('5df697e059583', '2018/2019'),
('5df69814bc6c1', '2019/2020'),
('5df69834a6584', '2016/2017');

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
  `tutor_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `tutor_nomor_induk`, `tutor_nama`, `tutor_jenis_kelamin`, `tutor_tempat_lahir`, `tutor_tanggal_lahir`, `tutor_agama`, `tutor_kewarganegaraan`, `tutor_pendidikan_terakhir`, `tutor_alamat_jalan`, `tutor_alamat_rtrw`, `tutor_alamat_desa`, `tutor_alamat_kecamatan`, `tutor_alamat_kabupaten`, `tutor_alamat_provinsi`, `tutor_alamat_kodepos`, `tutor_foto`, `tutor_password`) VALUES
('5ded0e21b5aea', '982032', 'Zam Zam Saeful Bahtiar', 'Pria', 'Tasikmalaya', '1999-05-18', 'Islam', 'WNI', 'SLTA Sederajat', 'Cihonje', '002/002', 'Karanganyar', 'Kawalu', 'Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', 'b5be1ec647cc6d4786921e92e34eee1a'),
('5df4f42689c9e', '191212121', 'Ir. Code Igniter', 'Wanita', 'Tasikmalaya', '2019-06-06', 'Islam', 'WNI', 'SLTA Sederajat', 'Cibeutui', '02/02', 'Cibeuti', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', '49ae1756b829cea3969be0ad484b1129'),
('5df69881a9a58', '5999999', 'Dewi Fortuna Kamila', 'Wanita', 'Tasikmalaya', '1999-12-16', 'Islam', 'WNI', 'SLTA Sederajat', 'Cijerah', '003/005', 'Karanganyar', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'default.jpg', 'b3aa34645bc463218f17d9364d4c204e');

-- --------------------------------------------------------

--
-- Table structure for table `wargabelajar`
--

CREATE TABLE `wargabelajar` (
  `wargabelajar_id` varchar(100) NOT NULL,
  `wargabelajar_nomor_induk` varchar(15) NOT NULL,
  `wargabelajar_nisn` varchar(15) NOT NULL,
  `wargabelajar_nama` varchar(90) NOT NULL,
  `wargabelajar_nik` varchar(30) NOT NULL,
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
  `kelas_id` varchar(100) NOT NULL,
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

INSERT INTO `wargabelajar` (`wargabelajar_id`, `wargabelajar_nomor_induk`, `wargabelajar_nisn`, `wargabelajar_nama`, `wargabelajar_nik`, `wargabelajar_jenis_kelamin`, `wargabelajar_tempat_lahir`, `wargabelajar_tanggal_lahir`, `wargabelajar_agama`, `wargabelajar_kewarganegaraan`, `wargabelajar_alamat_jalan`, `wargabelajar_alamat_rtrw`, `wargabelajar_alamat_desa`, `wargabelajar_alamat_kecamatan`, `wargabelajar_alamat_kabupaten`, `wargabelajar_alamat_provinsi`, `wargabelajar_alamat_kodepos`, `wargabelajar_kejar`, `wargabelajar_kejar_alamat`, `wargabelajar_sttb`, `wargabelajar_masuk`, `tahunajaran_id`, `wargabelajar_status`, `kelas_id`, `wargabelajar_foto`, `wargabelajar_password`, `orangtua_ayah_nama`, `orangtua_ayah_pekerjaan`, `orangtua_ayah_alamat_jalan`, `orangtua_ayah_alamat_rtrw`, `orangtua_ayah_alamat_desa`, `orangtua_ayah_alamat_kecamatan`, `orangtua_ayah_alamat_kabupaten`, `orangtua_ayah_alamat_provinsi`, `orangtua_ayah_alamat_kodepos`, `orangtua_ibu_nama`, `orangtua_wali_nama`, `orangtua_wali_pekerjaan`, `orangtua_wali_alamat_jalan`, `orangtua_wali_alamat_rtrw`, `orangtua_wali_alamat_desa`, `orangtua_wali_alamat_kecamatan`, `orangtua_wali_alamat_kabupaten`, `orangtua_wali_alamat_provinsi`, `orangtua_wali_alamat_kodepos`) VALUES
('5de73cb301e5e', '181910027', '2928013602', 'Agit Apriyanto', '3278050804920005', 'Pria', 'Tasikmalaya', '1992-08-04', 'Islam', NULL, 'Picungremuk', '002/010', 'Gununggede', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', '', '', '', '0000-00-00', '5deece94c9ee3', 'Aktif', '5df3b8828ef3f', '5de73cb301e5e.jpg', '1e0e0a4c9faa61fab181a23a20161bd4', 'Enceng', 'Buruh', 'Picungremuk', '002/010', 'Gununggede', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Rohimah', '', '', '', '', '', '', '', '', ''),
('5de8aed595502', '181910028', '2887216215', 'Agus Agustin', '3278050804920005', 'Pria', 'Tasikmalaya', '1988-08-16', 'Islam', NULL, 'Sindangsuka', '001/009', 'Gununggede', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', '', '', '', '0000-00-00', '5deece94c9ee3', 'Aktif', '5df3b887206bf', 'default.jpg', 'bd831c57c8c6eaf78b66fe8884ccd025', 'Sutisna', 'Buruh', 'Sindangsuka', '001/009', 'Gununggede', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Siti Maryam', '', '', '', '', '', '', '', '', '');

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
  ADD KEY `jadwal_kelas` (`kelas_id`),
  ADD KEY `jadwal_matpel` (`matpel_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`matpel_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`pimpinan_id`),
  ADD UNIQUE KEY `pimpinan_username` (`pimpinan_username`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`tahunajaran_id`);

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
  ADD KEY `tahun_ajaran_id_masuk` (`tahunajaran_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_matpel` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`matpel_id`) ON UPDATE CASCADE;

--
-- Constraints for table `matpel`
--
ALTER TABLE `matpel`
  ADD CONSTRAINT `tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `wargabelajar`
--
ALTER TABLE `wargabelajar`
  ADD CONSTRAINT `kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tahun_masuk_ajaran` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tahunajaran` (`tahunajaran_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;