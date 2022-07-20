-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6260
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table rental_mobil.detail_jurnal
CREATE TABLE IF NOT EXISTS `detail_jurnal` (
  `no_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkiraan` int(11) DEFAULT NULL,
  `no_trans` varchar(50) DEFAULT NULL,
  `nama_trans` varchar(50) DEFAULT NULL,
  `debet` varchar(50) DEFAULT NULL,
  `kredit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_jurnal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.detail_jurnal: 0 rows
/*!40000 ALTER TABLE `detail_jurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_jurnal` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.detail_kembali
CREATE TABLE IF NOT EXISTS `detail_kembali` (
  `no_kembali` int(11) NOT NULL AUTO_INCREMENT,
  `denda_telat` varchar(50) NOT NULL DEFAULT '0',
  `denda_kondisi` varchar(50) NOT NULL DEFAULT '0',
  `kondisi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_kembali`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.detail_kembali: 0 rows
/*!40000 ALTER TABLE `detail_kembali` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_kembali` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.detail_sewa
CREATE TABLE IF NOT EXISTS `detail_sewa` (
  `no_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mobil` int(11) NOT NULL DEFAULT 0,
  `kd_tarif` int(11) NOT NULL DEFAULT 0,
  `tgl_sewa` timestamp NULL DEFAULT NULL,
  `jam_sewa` varchar(50) NOT NULL DEFAULT '0',
  `lama_sewa` varchar(50) NOT NULL DEFAULT '0',
  `tgl_kembali` timestamp NULL DEFAULT NULL,
  `jam_kembali` varchar(50) NOT NULL DEFAULT '0',
  `supir` varchar(50) DEFAULT NULL,
  `subtotal` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_sewa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.detail_sewa: 1 rows
/*!40000 ALTER TABLE `detail_sewa` DISABLE KEYS */;
INSERT INTO `detail_sewa` (`no_sewa`, `kd_mobil`, `kd_tarif`, `tgl_sewa`, `jam_sewa`, `lama_sewa`, `tgl_kembali`, `jam_kembali`, `supir`, `subtotal`) VALUES
	(1, 1, 2, '2022-07-17 17:14:31', '0', '0', NULL, '0', NULL, '0');
/*!40000 ALTER TABLE `detail_sewa` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.jurnal
CREATE TABLE IF NOT EXISTS `jurnal` (
  `no_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_jurnal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.jurnal: 0 rows
/*!40000 ALTER TABLE `jurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jurnal` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.kembali
CREATE TABLE IF NOT EXISTS `kembali` (
  `no_kembali` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_trans` date DEFAULT NULL,
  `jmlh_mobil` int(11) DEFAULT NULL,
  `total_bayar` varchar(50) DEFAULT NULL,
  `status_kembali` varchar(50) DEFAULT NULL,
  `no_sewa` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_kembali`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.kembali: 0 rows
/*!40000 ALTER TABLE `kembali` DISABLE KEYS */;
/*!40000 ALTER TABLE `kembali` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.kondisi
CREATE TABLE IF NOT EXISTS `kondisi` (
  `kd_kondisi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mobil` int(11) NOT NULL DEFAULT 0,
  `bensin` int(11) NOT NULL DEFAULT 0,
  `kilometer` int(11) NOT NULL DEFAULT 0,
  `depan` varchar(50) NOT NULL DEFAULT '0',
  `belakang` varchar(50) NOT NULL DEFAULT '0',
  `kanan` varchar(50) NOT NULL DEFAULT '0',
  `kiri` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_kondisi`)
) ENGINE=MyISAM AUTO_INCREMENT=936740 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.kondisi: 3 rows
/*!40000 ALTER TABLE `kondisi` DISABLE KEYS */;
INSERT INTO `kondisi` (`kd_kondisi`, `kd_mobil`, `bensin`, `kilometer`, `depan`, `belakang`, `kanan`, `kiri`) VALUES
	(2, 5, 5, 5, 'depan', 'belakang', 'kanan', 'kiri'),
	(3, 11, 1, 2, 'ppO7Gss7Fm', 'hap7CbIdA3', 'wJuq7iYkPB', 'HXRAIxCZlG'),
	(936739, 11, 5, 5, 'test', '0SsIrsRpVF', 'fwygDDOWZF', 'bwcAhHWkq9');
/*!40000 ALTER TABLE `kondisi` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.mobil
CREATE TABLE IF NOT EXISTS `mobil` (
  `kd_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `tahun` varchar(50) DEFAULT '0',
  `no_polisi` varchar(50) DEFAULT '0',
  `no_rangka` varchar(50) DEFAULT '0',
  `no_mesin` varchar(50) DEFAULT '0',
  `biaya` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_mobil`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.mobil: 3 rows
/*!40000 ALTER TABLE `mobil` DISABLE KEYS */;
INSERT INTO `mobil` (`kd_mobil`, `jenis`, `type`, `warna`, `tahun`, `no_polisi`, `no_rangka`, `no_mesin`, `biaya`, `status`) VALUES
	(1, 458557, '3SBwRDFeqd', 'z5N0nkUNG0', 'JBjC4daDeY', 'CD8GMad4sn', 'wMDJyjvRDj', 'BDcqvMWON3', 'RJfX59Ihct', 'M8qyvMbOsq'),
	(10, 673621, 'asd', 'kuning', 'LI0uUD7Ht2', 'hdorGpLcVf', 'QmKIcG0Edt', 'zBIy2Zzq4F', 'BgyaY9bqNj', 'v5vHIKtgNo'),
	(11, 618857, '5anUDOaCnY', 'ZfUccmPCSX', 'Efu6DOmXcD', 'GuHBqx6Bdd', '2GyPld6agT', 'fhdLSRf9si', '123', 'htNGarxy7K');
/*!40000 ALTER TABLE `mobil` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.penyewa
CREATE TABLE IF NOT EXISTS `penyewa` (
  `nik` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `jml_sewa` tinyint(4) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM AUTO_INCREMENT=112714 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.penyewa: 1 rows
/*!40000 ALTER TABLE `penyewa` DISABLE KEYS */;
INSERT INTO `penyewa` (`nik`, `nama`, `telp`, `alamat`, `jml_sewa`, `keterangan`) VALUES
	(112713, 'test12345', '123456', 'apa aja', NULL, NULL);
/*!40000 ALTER TABLE `penyewa` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.perkiraan
CREATE TABLE IF NOT EXISTS `perkiraan` (
  `kd_perkiraan` int(11) NOT NULL AUTO_INCREMENT,
  `jns_perkiraan` varchar(50) DEFAULT NULL,
  `nm_perkiraan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_perkiraan`)
) ENGINE=MyISAM AUTO_INCREMENT=107483 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.perkiraan: 2 rows
/*!40000 ALTER TABLE `perkiraan` DISABLE KEYS */;
INSERT INTO `perkiraan` (`kd_perkiraan`, `jns_perkiraan`, `nm_perkiraan`) VALUES
	(1, 'jns prk', 'nm prk'),
	(107482, 'efgh', 'abcd');
/*!40000 ALTER TABLE `perkiraan` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.sewa
CREATE TABLE IF NOT EXISTS `sewa` (
  `no_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` timestamp NULL DEFAULT NULL,
  `jml_mobil` int(11) DEFAULT NULL,
  `dp` varchar(50) DEFAULT NULL,
  `kurang` varchar(50) DEFAULT NULL,
  `status_sewa` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_sewa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.sewa: 1 rows
/*!40000 ALTER TABLE `sewa` DISABLE KEYS */;
INSERT INTO `sewa` (`no_sewa`, `tgl_transaksi`, `jml_mobil`, `dp`, `kurang`, `status_sewa`, `nik`, `id_user`) VALUES
	(1, '2022-07-04 00:00:00', 10, '12', '862975', '517312', '045945', 384252);
/*!40000 ALTER TABLE `sewa` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.tarif
CREATE TABLE IF NOT EXISTS `tarif` (
  `kd_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `daerah` varchar(50) DEFAULT NULL,
  `tarif` varchar(50) DEFAULT '0',
  PRIMARY KEY (`kd_tarif`)
) ENGINE=MyISAM AUTO_INCREMENT=663402 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.tarif: 2 rows
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
INSERT INTO `tarif` (`kd_tarif`, `daerah`, `tarif`) VALUES
	(12, 'asd', '123123123'),
	(663401, 'test', '123500');
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;

-- Dumping structure for table rental_mobil.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(250) DEFAULT NULL,
  `hak_akses` enum('operasional','direktur') DEFAULT NULL,
  `no_ktp` bigint(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `jenkel` varchar(50) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `almt` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.user: 2 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `password`, `hak_akses`, `no_ktp`, `name`, `jenkel`, `telpon`, `almt`) VALUES
	(1, '$2y$10$8IRatmFFYXwU.irSL8al2eHvRZPfAyG6Tl5gJ3sfV596G1pweT5UO', 'operasional', 123, 'operasional', 'P', '123', 'asd'),
	(2, '$2y$10$F4dDK7EwUAjqAyvrD9vLH.SjrmKyYaAs.ZpwrH5bUzGMg6Z0mTvEq', 'direktur', 123, 'direktur', 'Perempuan', '123', 'asd');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
