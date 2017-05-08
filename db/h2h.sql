-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 03:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h2h`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloud_pembayaran`
--

CREATE TABLE `cloud_pembayaran` (
  `pembayaranId` bigint(20) NOT NULL COMMENT 'keterangan table: Table untuk menyimpan bukti pembayaran dari Mandiri',
  `pembayaranTagihanId` bigint(20) NOT NULL COMMENT 'Id berdasar tagihan',
  `pembayaranNominal` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT 'nominal pembayaran',
  `pembayaranNoTransaksi` varchar(100) NOT NULL DEFAULT '' COMMENT 'nomor transaksi dari mandiri',
  `pembayaranKanal` varchar(30) NOT NULL DEFAULT '' COMMENT 'dilakukan pembayaran di kanal mana',
  `pembayaranTerminal` varchar(30) NOT NULL DEFAULT '' COMMENT 'keterangan terminal',
  `pembayaranTglBayar` datetime DEFAULT NULL COMMENT 'tanggal pembayaran',
  `pembayaranTanggalBayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp saat pengiriman data pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cloud_tagihan`
--

CREATE TABLE `cloud_tagihan` (
  `tagihanId` bigint(20) NOT NULL COMMENT 'Keterangan table: Table untuk menyimpan tagihan',
  `tagihanNomor` varchar(20) NOT NULL COMMENT 'billing nomor',
  `tagihanMahasiswaId` varchar(20) DEFAULT '' COMMENT 'nim/notest/nopendaftaran',
  `tagihanMahasiswaNama` varchar(50) NOT NULL DEFAULT '' COMMENT 'nama',
  `tagihanFakultas` varchar(50) NOT NULL DEFAULT '' COMMENT 'fakultas',
  `tagihanProdi` varchar(50) NOT NULL COMMENT 'prodi',
  `tagihanPeriode` int(11) DEFAULT NULL COMMENT 'periode. ex: 20131',
  `tagihanJnsPembayaran` varchar(30) DEFAULT NULL COMMENT 'Label pembayaran. ex: Spp',
  `tagihanTotal` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT 'total bayar',
  `tagihanStatusTagihan` enum('aktif','tidak') NOT NULL DEFAULT 'tidak' COMMENT 'akan di ambil yang aktif',
  `tagihanTanggalAwalPembayaran` datetime DEFAULT NULL COMMENT 'tanggal awal pembayaran',
  `tagihanTanggalAkhirPembayaran` datetime DEFAULT NULL COMMENT 'tanggal akhir pembayaran',
  `tagihanTanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tanggal ubah / tanggal tambah di sistem',
  `tagihanUser` varchar(100) DEFAULT NULL COMMENT 'User yang setup tagihan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloud_tagihan`
--

INSERT INTO `cloud_tagihan` (`tagihanId`, `tagihanNomor`, `tagihanMahasiswaId`, `tagihanMahasiswaNama`, `tagihanFakultas`, `tagihanProdi`, `tagihanPeriode`, `tagihanJnsPembayaran`, `tagihanTotal`, `tagihanStatusTagihan`, `tagihanTanggalAwalPembayaran`, `tagihanTanggalAkhirPembayaran`, `tagihanTanggal`, `tagihanUser`) VALUES
(1234567890, '2', '1', 'fulan1', 'Fakultas Teknik', 'Pend. Teknik Informatika & Komputer (S1)', NULL, NULL, '9300000.00', 'tidak', '2017-05-04 00:00:00', '2017-05-06 00:00:00', '2017-05-04 08:26:26', NULL),
(1234567891, '1', '2', 'Oncom Suroncom', 'Fakultas Ilmu Pendidikan', 'Teknologi Pendidikan (S1)', NULL, NULL, '4000000.00', 'tidak', '2017-05-04 00:00:00', '2017-05-06 00:00:00', '2017-05-04 08:24:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloud_pembayaran`
--
ALTER TABLE `cloud_pembayaran`
  ADD PRIMARY KEY (`pembayaranId`),
  ADD UNIQUE KEY `noTransaksi` (`pembayaranNoTransaksi`),
  ADD UNIQUE KEY `tagihan` (`pembayaranTagihanId`,`pembayaranNoTransaksi`);

--
-- Indexes for table `cloud_tagihan`
--
ALTER TABLE `cloud_tagihan`
  ADD PRIMARY KEY (`tagihanId`),
  ADD UNIQUE KEY `NomorTagihan` (`tagihanNomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloud_pembayaran`
--
ALTER TABLE `cloud_pembayaran`
  MODIFY `pembayaranId` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'keterangan table: Table untuk menyimpan bukti pembayaran dari Mandiri', AUTO_INCREMENT=10094;
--
-- AUTO_INCREMENT for table `cloud_tagihan`
--
ALTER TABLE `cloud_tagihan`
  MODIFY `tagihanId` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Keterangan table: Table untuk menyimpan tagihan', AUTO_INCREMENT=1234567892;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cloud_pembayaran`
--
ALTER TABLE `cloud_pembayaran`
  ADD CONSTRAINT `FK_cloud_pembayaran_tagihan` FOREIGN KEY (`pembayaranTagihanId`) REFERENCES `cloud_tagihan` (`tagihanId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
