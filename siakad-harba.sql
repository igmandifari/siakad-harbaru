-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 03:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` int(11) NOT NULL,
  `siswa_nisn` varchar(30) NOT NULL,
  `siswa_nama` varchar(90) NOT NULL,
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
  `orangtua_ayah_nama` varchar(90) DEFAULT NULL,
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

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_nisn`, `siswa_nama`, `siswa_jenis_kelamin`, `siswa_tempat_lahir`, `siswa_tanggal_lahir`, `siswa_agama`, `siswa_kewarganegaraan`, `siswa_alamat_jalan`, `siswa_alamat_rtrw`, `siswa_alamat_desa`, `siswa_alamat_kecamatan`, `siswa_alamat_kabupaten`, `siswa_alamat_provinsi`, `siswa_alamat_kodepos`, `siswa_foto`, `orangtua_ayah_nama`, `orangtua_ayah_agama`, `orangtua_ayah_kewarganegaraan`, `orangtua_ayah_pendidikan_terakhir`, `orangtua_ayah_pekerjaan`, `orangtua_ayah_alamat_jalan`, `orangtua_ayah_alamat_rtrw`, `orangtua_ayah_alamat_desa`, `orangtua_ayah_alamat_kecamatan`, `orangtua_ayah_alamat_kabupaten`, `orangtua_ayah_alamat_provinsi`, `orangtua_ayah_alamat_kodepos`, `orangtua_ibu_nama`, `orangtua_ibu_agama`, `orangtua_ibu_kewarganegaraan`, `orangtua_ibu_pendidikan_terakhir`, `orangtua_ibu_pekerjaan`, `orangtua_ibu_alamat_jalan`, `orangtua_ibu_alamat_rtrw`, `orangtua_ibu_alamat_desa`, `orangtua_ibu_alamat_kecamatan`, `orangtua_ibu_alamat_kabupaten`, `orangtua_ibu_alamat_provinsi`, `orangtua_ibu_alamat_kodepos`, `orangtua_wali_nama`, `orangtua_wali_agama`, `orangtua_wali_kewarganegaraan`, `orangtua_wali_pendidikan_terakhir`, `orangtua_wali_pekerjaan`, `orangtua_wali_alamat_jalan`, `orangtua_wali_alamat_rtrw`, `orangtua_wali_alamat_desa`, `orangtua_wali_alamat_kecamatan`, `orangtua_wali_alamat_kabupaten`, `orangtua_wali_alamat_provinsi`, `orangtua_wali_alamat_kodepos`) VALUES
(1, 151707032, '9822508997', 'Pipit', 'Wanita', 'Tasikmalaya', '1998-02-03', 'Islam', 'WNI', 'Genteng', '003/001', 'Cilamajang', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', NULL, 'Enceng', 'Islam', 'WNI', 'SD', 'Buruh', 'Genteng', '003/001', 'Cilamajang', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', 'Rohayah', 'Islam', 'WNI', NULL, 'Buruh', 'Genteng', '003/001', 'Cilamajang', 'Kawalu', 'Kota Tasikmalaya', 'Jawa Barat', '46182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Database Siswa', 'siswa', '', 0),
(2, 'Database Guru', 'guru', '', 0),
(8, 'Data Sekolah', 'sekolah', '', 0),
(9, 'Data Master', '#', '', 0),
(10, 'Mata Pelajaran', 'mapel', '', 9),
(11, 'Ruangan Kelas', 'ruangan', '', 9),
(12, 'Jurusan', 'jurusan', '', 9),
(13, 'Tahun Akademik', 'tahunakademik', '', 9),
(14, 'Jadwal Pelajaran', 'jadwal', '', 0),
(15, 'Rombongan Belajar', 'rombel', '', 9),
(16, 'Laporan Nilai', 'nilai', '', 0),
(17, 'Pengguna sistem', 'users', '', 0),
(19, 'Kurikulum', 'kurikulum', '', 9),
(20, 'Wali Kelas', 'walikelas', '', 0),
(21, 'form pembayaran', 'keuangan/form', '', 0),
(22, 'Peserta Didik', 'siswa/siswa_aktif', '', 0),
(23, 'jenis pembayaran', 'jenis_pembayaran', '', 0),
(24, 'setup biaya', 'keuangan/setup', '', 0),
(25, 'Raport Online', 'raport', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` int(11) NOT NULL,
  `tutor_nip` int(11) NOT NULL,
  `tutor_nama` varchar(90) DEFAULT NULL,
  `tutor_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') DEFAULT NULL,
  `tutor_kewarganegaraan` enum('WNA','WNI') DEFAULT NULL,
  `tutor_pendidikan_terakhir` varchar(10) DEFAULT NULL,
  `tutor_pekerjaan` varchar(20) DEFAULT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
