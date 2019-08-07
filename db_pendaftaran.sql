-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 12:32 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `id_daftar` char(13) NOT NULL,
  `no_antrian` varchar(2) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_berobat` date NOT NULL,
  `id_pasien` char(6) NOT NULL,
  `id_dtljadwal` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `no_antrian`, `tgl_daftar`, `tgl_berobat`, `id_pasien`, `id_dtljadwal`) VALUES
('2124231710088', '01', '2017-10-08', '2017-10-30', '000001', '1709220048228');

-- --------------------------------------------------------

--
-- Table structure for table `detil_jadwal`
--

CREATE TABLE IF NOT EXISTS `detil_jadwal` (
  `id_dtljadwal` char(13) NOT NULL,
  `id_jadwal` char(4) NOT NULL,
  `id_dokter` char(4) NOT NULL,
  `ruang` varchar(5) NOT NULL,
  `id_poli` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_jadwal`
--

INSERT INTO `detil_jadwal` (`id_dtljadwal`, `id_jadwal`, `id_dokter`, `ruang`, `id_poli`) VALUES
('1709220048228', 'J001', '0001', 'r01', '01'),
('1709220048300', 'J001', '0002', 'r02', '01'),
('1709220048428', 'J001', '0003', 'r03', '02'),
('1709241232325', 'J002', '0003', 'icu', '03');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` char(4) NOT NULL,
  `nm_dokter` varchar(50) NOT NULL,
  `alm_dokter` text NOT NULL,
  `telp_dokter` varchar(15) NOT NULL,
  `spesialis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nm_dokter`, `alm_dokter`, `telp_dokter`, `spesialis`) VALUES
('0001', 'Purwo', 'Bintaro', '085680809090', 'Anak'),
('0002', 'Aji', 'Tangerang', '081811112222', 'Mata'),
('0003', 'gau', 'cilandak', '085690901111', 'kandungan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` char(4) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum''at','Sabtu','Minggu') NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_pegawai` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `id_pegawai`) VALUES
('J001', 'Senin', '8.30 - 20.00', 'P01'),
('J002', 'Selasa', '8.00 - 22.00', 'P01'),
('J003', 'Rabu', '8.00 - 22.00', 'P01'),
('J004', 'Kamis', '8.00 - 22.00', 'P01'),
('J005', 'Kamis', '6.15 - 15.45', 'P01');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` char(6) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `alm_pasien` text NOT NULL,
  `telp_pasien` varchar(15) NOT NULL,
  `pass_pasien` varchar(12) NOT NULL,
  `jk_pasien` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nm_pasien`, `alm_pasien`, `telp_pasien`, `pass_pasien`, `jk_pasien`) VALUES
('000001', 'baron', 'cilandak', '081890901111', 'test', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` char(3) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `alm_pegawai` text NOT NULL,
  `telp_pegawai` varchar(15) NOT NULL,
  `pass_pegawai` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nm_pegawai`, `alm_pegawai`, `telp_pegawai`, `pass_pegawai`) VALUES
('P01', 'Arch', 'Tangerang', '081866661111', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE IF NOT EXISTS `poliklinik` (
  `id_poli` char(2) NOT NULL,
  `nm_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nm_poli`) VALUES
('01', 'mata'),
('02', 'kulit'),
('03', 'tht');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `FK_daftar_pasien` (`id_pasien`),
  ADD KEY `FK_daftar_dokter` (`id_dtljadwal`),
  ADD KEY `id_dtljadwal` (`id_dtljadwal`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `detil_jadwal`
--
ALTER TABLE `detil_jadwal`
  ADD PRIMARY KEY (`id_dtljadwal`),
  ADD KEY `FK_detil_jadwal_dokter` (`id_dokter`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `daftar_ibfk_2` FOREIGN KEY (`id_dtljadwal`) REFERENCES `detil_jadwal` (`id_dtljadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_jadwal`
--
ALTER TABLE `detil_jadwal`
  ADD CONSTRAINT `FK_detil_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_jadwal_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_jadwal_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
