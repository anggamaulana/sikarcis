-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2013 at 06:14 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karcis`
--
CREATE DATABASE `karcis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `karcis`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('install', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_karcis`
--

CREATE TABLE IF NOT EXISTS `jenis_karcis` (
  `id_karcis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_karcis` varchar(30) NOT NULL,
  `harga_bundel` int(11) NOT NULL,
  `stok_kw1` int(11) NOT NULL,
  `stok_kw2` int(11) NOT NULL,
  `stok_kw1_gudang` int(11) NOT NULL,
  `stok_kw2_gudang` int(11) NOT NULL,
  PRIMARY KEY (`id_karcis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jenis_karcis`
--

INSERT INTO `jenis_karcis` (`id_karcis`, `jenis_karcis`, `harga_bundel`, `stok_kw1`, `stok_kw2`, `stok_kw1_gudang`, `stok_kw2_gudang`) VALUES
(1, 'Bus Besar', 5000, 780, 780, 110, 110),
(2, 'Bus Sedang', 2500, 780, 780, 110, 110),
(3, 'Truk Besar', 2500, 780, 780, 110, 110),
(4, 'Truk Sedang', 2500, 780, 780, 110, 110),
(5, 'Truk Gandeng', 2500, 780, 780, 110, 110),
(6, 'Sepeda Motor', 2500, 780, 780, 29, 29),
(7, 'Mobil', 2500, 780, 780, 29, 28),
(8, 'Sepeda', 2500, 601, 609, 28, 20);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `id_operator` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL,
  `nama_operator` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_operator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_karcis`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_karcis` (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_karcis` int(11) NOT NULL,
  `nama_penyetor` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `bundel_kw1` int(11) NOT NULL,
  `bundel_kw2` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_pengeluaran`),
  KEY `id_karcis` (`id_karcis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengeluaran_karcis`
--

INSERT INTO `pengeluaran_karcis` (`id_pengeluaran`, `waktu`, `id_karcis`, `nama_penyetor`, `kode`, `bundel_kw1`, `bundel_kw2`, `total`) VALUES
(2, '2013-04-29 12:28:07', 8, 'dfgdfg', 'fgdfgdfg', 9, 9, 18),
(3, '2013-04-30 06:23:49', 8, 'angga', 'asdfs-fsdfsdf', 70, 70, 140),
(4, '2013-05-01 04:49:12', 8, 'angga', 'dterg-dfgdfgd', 100, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `stok_gudang`
--

CREATE TABLE IF NOT EXISTS `stok_gudang` (
  `id_stok_gudang` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_penyetor` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `ganti_gudang` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_stok_gudang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stok_gudang`
--

INSERT INTO `stok_gudang` (`id_stok_gudang`, `waktu`, `nama_penyetor`, `bulan`, `tahun`, `ganti_gudang`) VALUES
(1, '2013-04-29 11:59:09', 'angga', 0, 2013, 1),
(2, '2013-04-29 12:00:54', 'angga', 4, 2013, 0),
(3, '2013-04-29 12:02:54', 'angga', 4, 2013, 1),
(4, '2013-06-03 08:15:49', 'ahmad', 6, 2013, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_gudang_sub`
--

CREATE TABLE IF NOT EXISTS `stok_gudang_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stok_gudang` int(11) NOT NULL,
  `id_karcis` int(11) NOT NULL,
  `total_kw1` int(11) NOT NULL,
  `total_kw2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_stok_gudang` (`id_stok_gudang`),
  KEY `id_karcis` (`id_karcis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `stok_gudang_sub`
--

INSERT INTO `stok_gudang_sub` (`id`, `id_stok_gudang`, `id_karcis`, `total_kw1`, `total_kw2`) VALUES
(1, 1, 1, 900, 900),
(2, 1, 2, 900, 900),
(3, 1, 3, 900, 900),
(4, 1, 4, 900, 900),
(5, 1, 5, 900, 900),
(6, 1, 6, 900, 900),
(7, 1, 7, 900, 900),
(8, 1, 8, 900, 900),
(9, 2, 1, 80, 80),
(10, 2, 2, 80, 80),
(11, 2, 3, 90, 90),
(12, 2, 4, 90, 90),
(13, 2, 5, 90, 90),
(14, 2, 6, 90, 90),
(15, 2, 7, 90, 90),
(16, 2, 8, 90, 90),
(17, 3, 1, 800, 800),
(18, 3, 2, 800, 800),
(19, 3, 3, 800, 800),
(20, 3, 4, 800, 800),
(21, 3, 5, 800, 800),
(22, 3, 6, 800, 800),
(23, 3, 7, 800, 800),
(24, 3, 8, 800, 800),
(25, 4, 1, 90, 90),
(26, 4, 2, 90, 90),
(27, 4, 3, 90, 90),
(28, 4, 4, 90, 90),
(29, 4, 5, 90, 90),
(30, 4, 6, 9, 9),
(31, 4, 7, 9, 8),
(32, 4, 8, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `stok_karcis`
--

CREATE TABLE IF NOT EXISTS `stok_karcis` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_penyetok` varchar(30) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stok_karcis`
--

INSERT INTO `stok_karcis` (`id_stok`, `waktu`, `nama_penyetok`, `bulan`, `tahun`) VALUES
(1, '2013-04-29 11:59:56', 'angga', 4, 2013),
(2, '2013-04-29 12:26:52', 'angga', 4, 2013),
(3, '2013-04-30 06:22:23', 'angga', 4, 2013),
(4, '2013-04-30 06:27:36', 'angga', 4, 2013);

-- --------------------------------------------------------

--
-- Table structure for table `stok_sub_karcis`
--

CREATE TABLE IF NOT EXISTS `stok_sub_karcis` (
  `id_sub_stok` int(11) NOT NULL AUTO_INCREMENT,
  `id_stok` int(11) NOT NULL,
  `id_karcis` int(11) NOT NULL,
  `total_kw1` int(11) NOT NULL,
  `total_kw2` int(11) NOT NULL,
  PRIMARY KEY (`id_sub_stok`),
  KEY `id_stok` (`id_stok`),
  KEY `id_karcis` (`id_karcis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `stok_sub_karcis`
--

INSERT INTO `stok_sub_karcis` (`id_sub_stok`, `id_stok`, `id_karcis`, `total_kw1`, `total_kw2`) VALUES
(1, 1, 1, 80, 80),
(2, 1, 2, 80, 80),
(3, 1, 3, 80, 80),
(4, 1, 4, 80, 80),
(5, 1, 5, 80, 80),
(6, 1, 6, 80, 80),
(7, 1, 7, 80, 80),
(8, 1, 8, 80, 80),
(9, 2, 1, 80, 80),
(10, 2, 2, 80, 80),
(11, 2, 3, 80, 80),
(12, 2, 4, 80, 80),
(13, 2, 5, 80, 80),
(14, 2, 6, 80, 80),
(15, 2, 7, 80, 80),
(16, 2, 8, 80, 8),
(17, 3, 1, 0, 0),
(18, 3, 2, 0, 0),
(19, 3, 3, 0, 0),
(20, 3, 4, 0, 0),
(21, 3, 5, 0, 0),
(22, 3, 6, 0, 0),
(23, 3, 7, 0, 0),
(24, 3, 8, 0, 80),
(25, 4, 1, 700, 700),
(26, 4, 2, 700, 700),
(27, 4, 3, 700, 700),
(28, 4, 4, 700, 700),
(29, 4, 5, 700, 700),
(30, 4, 6, 700, 700),
(31, 4, 7, 700, 700),
(32, 4, 8, 700, 700);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_porporasi`
--

CREATE TABLE IF NOT EXISTS `transaksi_porporasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_karcis` int(11) NOT NULL,
  `stok_kw1_awal` int(11) NOT NULL,
  `stok_kw2_awal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bulan` (`bulan`,`tahun`,`id_karcis`),
  KEY `id_karcis` (`id_karcis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `transaksi_porporasi`
--

INSERT INTO `transaksi_porporasi` (`id`, `bulan`, `tahun`, `id_karcis`, `stok_kw1_awal`, `stok_kw2_awal`) VALUES
(1, 4, 2013, 1, 780, 780),
(2, 4, 2013, 2, 780, 780),
(3, 4, 2013, 3, 780, 780),
(4, 4, 2013, 4, 780, 780),
(5, 4, 2013, 5, 780, 780),
(6, 4, 2013, 6, 780, 780),
(7, 4, 2013, 7, 780, 780),
(8, 4, 2013, 8, 780, 788),
(9, 5, 2013, 1, 780, 780),
(10, 5, 2013, 2, 780, 780),
(11, 5, 2013, 3, 780, 780),
(12, 5, 2013, 4, 780, 780),
(13, 5, 2013, 5, 780, 780),
(14, 5, 2013, 6, 780, 780),
(15, 5, 2013, 7, 780, 780),
(16, 5, 2013, 8, 701, 709),
(17, 6, 2013, 1, 780, 780),
(18, 6, 2013, 2, 780, 780),
(19, 6, 2013, 3, 780, 780),
(20, 6, 2013, 4, 780, 780),
(21, 6, 2013, 5, 780, 780),
(22, 6, 2013, 6, 780, 780),
(23, 6, 2013, 7, 780, 780),
(24, 6, 2013, 8, 601, 609);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sirkulasi_gudang`
--

CREATE TABLE IF NOT EXISTS `transaksi_sirkulasi_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_karcis` int(11) NOT NULL,
  `stok_kw1_awal` int(11) NOT NULL,
  `stok_kw2_awal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_karcis` (`id_karcis`,`bulan`,`tahun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `transaksi_sirkulasi_gudang`
--

INSERT INTO `transaksi_sirkulasi_gudang` (`id`, `bulan`, `tahun`, `id_karcis`, `stok_kw1_awal`, `stok_kw2_awal`) VALUES
(1, 4, 2013, 1, 800, 800),
(2, 4, 2013, 2, 800, 800),
(3, 4, 2013, 3, 800, 800),
(4, 4, 2013, 4, 800, 800),
(5, 4, 2013, 5, 800, 800),
(6, 4, 2013, 6, 800, 800),
(7, 4, 2013, 7, 800, 800),
(8, 4, 2013, 8, 800, 800),
(9, 5, 2013, 1, 20, 20),
(10, 5, 2013, 2, 20, 20),
(11, 5, 2013, 3, 20, 20),
(12, 5, 2013, 4, 20, 20),
(13, 5, 2013, 5, 20, 20),
(14, 5, 2013, 6, 20, 20),
(15, 5, 2013, 7, 20, 20),
(16, 5, 2013, 8, 20, 12),
(17, 6, 2013, 1, 20, 20),
(18, 6, 2013, 2, 20, 20),
(19, 6, 2013, 3, 20, 20),
(20, 6, 2013, 4, 20, 20),
(21, 6, 2013, 5, 20, 20),
(22, 6, 2013, 6, 20, 20),
(23, 6, 2013, 7, 20, 20),
(24, 6, 2013, 8, 20, 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengeluaran_karcis`
--
ALTER TABLE `pengeluaran_karcis`
  ADD CONSTRAINT `pengeluaran_karcis_ibfk_2` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION;

--
-- Constraints for table `stok_gudang_sub`
--
ALTER TABLE `stok_gudang_sub`
  ADD CONSTRAINT `stok_gudang_sub_ibfk_1` FOREIGN KEY (`id_stok_gudang`) REFERENCES `stok_gudang` (`id_stok_gudang`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `stok_gudang_sub_ibfk_2` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION;

--
-- Constraints for table `stok_sub_karcis`
--
ALTER TABLE `stok_sub_karcis`
  ADD CONSTRAINT `stok_sub_karcis_ibfk_1` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `stok_sub_karcis_ibfk_2` FOREIGN KEY (`id_stok`) REFERENCES `stok_karcis` (`id_stok`) ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_porporasi`
--
ALTER TABLE `transaksi_porporasi`
  ADD CONSTRAINT `transaksi_porporasi_ibfk_1` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_sirkulasi_gudang`
--
ALTER TABLE `transaksi_sirkulasi_gudang`
  ADD CONSTRAINT `transaksi_sirkulasi_gudang_ibfk_1` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
