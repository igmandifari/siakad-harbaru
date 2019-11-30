-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2019 at 11:32 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.11-1+ubuntu16.04.1+deb.sury.org+1

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
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
('5de15e4e0de9d', 'Zam Zam Saeful Bahtiar', 'bekerz18', 'c7625d1ad74993a30b16c81148f141e1', '5de15e4e0de9d.jpeg'),
('5de15e8a9ead8', 'Igman Difari', 'igman', '827ccb0eea8a706c4c34a16891f84e7b', '5de15e8a9ead8.jpg'),
('5de1e955158af', 'Intan', 'intanhartiwan', 'd41d8cd98f00b204e9800998ecf8427e', '5de1e955158af.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` varchar(100) NOT NULL,
  `jadwal_hari` varchar(15) NOT NULL,
  `tutor_id` varchar(100) NOT NULL,
  `matpel_id` varchar(100) NOT NULL,
  `kelas_id` varchar(100) NOT NULL,
  `jadwal_jam_mulai` varchar(10) NOT NULL,
  `jadwal_jam_berakhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `jadwal_hari`, `tutor_id`, `matpel_id`, `kelas_id`, `jadwal_jam_mulai`, `jadwal_jam_berakhir`) VALUES
('5ddcd4551c97f', 'Jum\'at', '5dd7f98bc4245', '5ddcd276be772', '5ddb9cf0d13fc', '13:00', '14:00'),
('5ddd1084114ea', 'Jum\'at', '5dd7f94d53468', '5ddcd276be772', '5ddb9cf8d41fd', '15:00', '16:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` varchar(100) NOT NULL,
  `kelas_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
('5ddb9cf0d13fc', 'Kelas XII'),
('5ddb9cf8d41fd', 'Kelas XI'),
('5ddb9d0159e37', 'Kelas X'),
('5ddb9d12213ba', 'Kelas VII'),
('5ddb9d1c026c3', 'Kelas VIII'),
('5ddb9d21eb254', 'Kelas 68');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `matpel_id` varchar(100) NOT NULL,
  `matpel_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`matpel_id`, `matpel_nama`) VALUES
('5ddcd276be772', 'Matematika'),
('5ddcd27ce80cd', 'Bahasa Indonesiah');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` varchar(100) NOT NULL,
  `siswa_nis` int(11) NOT NULL,
  `siswa_nisn` int(11) NOT NULL,
  `siswa_nama` varchar(90) NOT NULL,
  `siswa_nik` varchar(30) NOT NULL,
  `siswa_jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `siswa_tempat_lahir` varchar(50) DEFAULT NULL,
  `siswa_tanggal_lahir` date DEFAULT NULL,
  `siswa_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `siswa_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `siswa_alamat_jalan` varchar(40) DEFAULT NULL,
  `siswa_alamat_rtrw` varchar(40) DEFAULT NULL,
  `siswa_alamat_desa` varchar(30) DEFAULT NULL,
  `siswa_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `siswa_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `siswa_alamat_provinsi` varchar(30) DEFAULT NULL,
  `siswa_alamat_kodepos` varchar(10) DEFAULT NULL,
  `siswa_foto` varchar(50) DEFAULT NULL,
  `siswa_password` varchar(100) NOT NULL,
  `kelas_id` varchar(100) DEFAULT NULL,
  `orangtua_ayah_nama` varchar(90) DEFAULT NULL,
  `orangtua_ayah_nik` varchar(30) NOT NULL,
  `orangtua_ayah_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `orangtua_ayah_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `orangtua_ayah_pendidikan_terakhir` varchar(10) DEFAULT NULL,
  `orangtua_ayah_pekerjaan` varchar(20) DEFAULT NULL,
  `orangtua_ayah_alamat_jalan` varchar(40) DEFAULT NULL,
  `orangtua_ayah_alamat_rtrw` varchar(40) DEFAULT NULL,
  `orangtua_ayah_alamat_desa` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_provinsi` varchar(30) DEFAULT NULL,
  `orangtua_ayah_alamat_kodepos` varchar(10) DEFAULT NULL,
  `orangtua_ibu_nama` varchar(90) DEFAULT NULL,
  `orangtua_ibu_nik` varchar(30) NOT NULL,
  `orangtua_ibu_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `orangtua_ibu_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `orangtua_ibu_pendidikan_terakhir` varchar(10) DEFAULT NULL,
  `orangtua_ibu_pekerjaan` varchar(20) DEFAULT NULL,
  `orangtua_ibu_alamat_jalan` varchar(40) DEFAULT NULL,
  `orangtua_ibu_alamat_rtrw` varchar(40) DEFAULT NULL,
  `orangtua_ibu_alamat_desa` varchar(30) DEFAULT NULL,
  `orangtua_ibu_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `orangtua_ibu_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `orangtua_ibu_alamat_provinsi` varchar(30) DEFAULT NULL,
  `orangtua_ibu_alamat_kodepos` varchar(10) DEFAULT NULL,
  `orangtua_wali_nama` varchar(90) DEFAULT NULL,
  `orangtua_wali_nik` varchar(30) NOT NULL,
  `orangtua_wali_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `orangtua_wali_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `orangtua_wali_pendidikan_terakhir` varchar(10) DEFAULT NULL,
  `orangtua_wali_pekerjaan` varchar(20) DEFAULT NULL,
  `orangtua_wali_alamat_jalan` varchar(40) DEFAULT NULL,
  `orangtua_wali_alamat_rtrw` varchar(40) DEFAULT NULL,
  `orangtua_wali_alamat_desa` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_provinsi` varchar(30) DEFAULT NULL,
  `orangtua_wali_alamat_kodepos` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa'),
(4, 'Kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` varchar(100) NOT NULL,
  `tutor_nip` varchar(20) NOT NULL,
  `tutor_nama` varchar(90) DEFAULT NULL,
  `tutor_jenis_kelamin` enum('Pria','Wanita','','') NOT NULL,
  `tutor_tempat_lahir` varchar(50) DEFAULT NULL,
  `tutor_tanggal_lahir` date DEFAULT NULL,
  `tutor_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `tutor_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `tutor_pendidikan_terakhir` varchar(10) DEFAULT NULL,
  `tutor_alamat_jalan` varchar(40) DEFAULT NULL,
  `tutor_alamat_rtrw` varchar(40) DEFAULT NULL,
  `tutor_alamat_desa` varchar(30) DEFAULT NULL,
  `tutor_alamat_kecamatan` varchar(30) DEFAULT NULL,
  `tutor_alamat_kabupaten` varchar(30) DEFAULT NULL,
  `tutor_alamat_provinsi` varchar(30) DEFAULT NULL,
  `tutor_alamat_kodepos` varchar(10) DEFAULT NULL,
  `tutor_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `tutor_nip`, `tutor_nama`, `tutor_jenis_kelamin`, `tutor_tempat_lahir`, `tutor_tanggal_lahir`, `tutor_agama`, `tutor_kewarganegaraan`, `tutor_pendidikan_terakhir`, `tutor_alamat_jalan`, `tutor_alamat_rtrw`, `tutor_alamat_desa`, `tutor_alamat_kecamatan`, `tutor_alamat_kabupaten`, `tutor_alamat_provinsi`, `tutor_alamat_kodepos`, `tutor_foto`) VALUES
('5dd5c21752159', '11', 'ada', 'Pria', '', '0000-00-00', 'Islam', 'WNA', '0', '    fsf', 'fsfq', 'f', 'wf', 'fwfw', 'f', 'f', NULL),
('5dd7f94d53468', '0', 'sdfaasd', '', ' ds', NULL, '', NULL, '0', 'fdf', 'ada', 'ada', 'ada', 'ada', 'ada', '', NULL),
('5dd7f98bc4245', '0', 'teuing', '', 'dada', NULL, '', NULL, '0', '', 'da', 'ada', 'ada', '', 'ada', 'adaa', NULL);

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
  ADD KEY `jadwaLtutor` (`tutor_id`),
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
  ADD PRIMARY KEY (`matpel_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_matpel` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`matpel_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `kelas_siswa` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;