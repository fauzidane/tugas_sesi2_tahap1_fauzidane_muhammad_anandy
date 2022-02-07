-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 03:24 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `kodedkt` varchar(15) NOT NULL,
  `namadkt` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `tarif` int(11) NOT NULL,
  `id_med` int(11) NOT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `id_med` (`id_med`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `kodedkt`, `namadkt`, `alamat`, `telepon`, `tarif`, `id_med`) VALUES
(5, 'DKT-101906', 'hari haru', 'surakarta', '085600929282', 150000, 7),
(6, 'DKT-101933', 'yanto pelet', 'sukoharjo', '081326530217', 175000, 9),
(7, 'DKT-125100', 'adi', 'jakarta', '087889997654', 240000, 8),
(8, 'DKT-125124', 'desi', 'palembang', '086778987654', 210000, 10),
(9, 'DKT-100555', 'latief', 'jakarta', '087654345678', 230000, 11),
(10, 'DKT-100623', 'nada asmara', 'palembang', '089998765678', 340000, 12),
(11, 'DKT-101846', 'rahmayani', 'surabaya', '086554345678', 240000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `medis`
--

CREATE TABLE IF NOT EXISTS `medis` (
  `id_med` int(11) NOT NULL AUTO_INCREMENT,
  `med` varchar(20) NOT NULL,
  `kodemed` varchar(15) NOT NULL,
  PRIMARY KEY (`id_med`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `medis`
--

INSERT INTO `medis` (`id_med`, `med`, `kodemed`) VALUES
(7, 'Jantung', 'MED-001539'),
(8, 'Gigi', 'MED-001546'),
(9, 'Kulit', 'MED-001550'),
(10, 'Mata', 'MED-001553'),
(11, 'Tht', 'MED-004404'),
(12, 'Saraf', 'MED-004420');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `kodeobat` varchar(20) NOT NULL,
  `namaobat` varchar(50) NOT NULL,
  `jenisobat` varchar(15) NOT NULL,
  `stok` int(10) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kodeobat`, `namaobat`, `jenisobat`, `stok`, `ket`) VALUES
(1, 'OBT-001320', 'paramex', 'generik', 5, ''),
(2, 'OBT-001516', 'dextro', 'non-generik', 8, ''),
(3, 'OBT-001546', 'paracetamol', 'generik', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `kodepsn` varchar(15) NOT NULL,
  `namapsn` varchar(50) NOT NULL,
  `alamatpsn` text NOT NULL,
  `genderpsn` varchar(1) NOT NULL,
  `umurpsn` int(11) NOT NULL,
  `teleponpsn` varchar(13) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `kodepsn`, `namapsn`, `alamatpsn`, `genderpsn`, `umurpsn`, `teleponpsn`) VALUES
(2, 'PSN-294034', 'jono', 'surakarta', 'L', 12, '089765145267'),
(3, 'PSN-294058', 'hadi', 'jakarta', 'L', 19, '08876538893'),
(4, 'PSN-302445', 'putri', 'palembang', 'P', 19, '086778996554'),
(5, 'PSN-303749', 'jodi', 'solo', 'L', 19, '087889887665'),
(6, 'PSN-050106', 'salsa', 'karangasem', 'P', 17, '089889998765'),
(7, 'PSN-120436', 'tono', 'sukoharjo', 'L', 25, '089998765677'),
(8, 'PSN-120517', 'adinda', 'surakarta', 'P', 27, '087654321234'),
(9, 'PSN-120554', 'heni', 'boyolali', 'P', 24, '089765456789');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dokter` varchar(20) NOT NULL,
  `pasien` varchar(20) NOT NULL,
  `med` varchar(20) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_pendaftaran`),
  KEY `id_dokter` (`dokter`),
  KEY `id_pasien` (`pasien`),
  KEY `id_med` (`med`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `tanggal_daftar`, `dokter`, `pasien`, `med`, `ket`) VALUES
(5, '2017-12-16 01:01:01', 'hari haru', 'adinda', 'Jantung', ''),
(6, '2017-12-16 01:01:25', 'desi', 'jono', 'Mata', ''),
(7, '2017-12-16 01:18:17', 'adi', 'jodi', 'Gigi', ''),
(8, '2017-12-16 01:37:49', 'adi', 'putri', 'Gigi', ''),
(9, '2017-12-16 01:37:53', 'latief', 'heni', 'Tht', ''),
(10, '2017-12-16 01:37:58', 'rahmayani', 'tono', 'Jantung', ''),
(11, '2017-12-16 01:38:05', 'adi', 'hadi', 'Gigi', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
