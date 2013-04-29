-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2013 at 01:32 PM
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
('install', 'yes');

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
(1, 'Bus Besar', 5000, 0, 0, 0, 0),
(2, 'Bus Sedang', 2500, 0, 0, 0, 0),
(3, 'Truk Besar', 2500, 0, 0, 0, 0),
(4, 'Truk Sedang', 2500, 0, 0, 0, 0),
(5, 'Truk Gandeng', 2500, 0, 0, 0, 0),
(6, 'Sepeda Motor', 2500, 0, 0, 0, 0),
(7, 'Mobil', 2500, 0, 0, 0, 0),
(8, 'Sepeda', 2500, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_bulan`
--

CREATE TABLE IF NOT EXISTS `laporan_bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_karcis` int(11) NOT NULL,
  `stok_kw1_awal` int(11) NOT NULL,
  `stok_kw2_awal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bulan` (`bulan`,`tahun`,`id_karcis`),
  KEY `id_karcis` (`id_karcis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_sirkulasi_gudang`
--

CREATE TABLE IF NOT EXISTS `laporan_sirkulasi_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_karcis` int(11) NOT NULL,
  `stok_kw1_awal` int(11) NOT NULL,
  `stok_kw2_awal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_karcis` (`id_karcis`,`bulan`,`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_bulan`
--
ALTER TABLE `laporan_bulan`
  ADD CONSTRAINT `laporan_bulan_ibfk_1` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION;

--
-- Constraints for table `laporan_sirkulasi_gudang`
--
ALTER TABLE `laporan_sirkulasi_gudang`
  ADD CONSTRAINT `laporan_sirkulasi_gudang_ibfk_1` FOREIGN KEY (`id_karcis`) REFERENCES `jenis_karcis` (`id_karcis`) ON UPDATE NO ACTION;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
