-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.21 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for projekta
CREATE DATABASE IF NOT EXISTS `projekta` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projekta`;

-- Dumping structure for table projekta.balik_nama
CREATE TABLE IF NOT EXISTS `balik_nama` (
  `no_pengajuan` int NOT NULL AUTO_INCREMENT,
  `tgl_pengajuan` date DEFAULT NULL,
  `id_klien` int DEFAULT NULL,
  `jenis_pengajuan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_kk` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_sppt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_surat_tanah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biaya_pembuatan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_pembayaran` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pengguna` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`no_pengajuan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.balik_nama: 1 rows
/*!40000 ALTER TABLE `balik_nama` DISABLE KEYS */;
INSERT INTO `balik_nama` (`no_pengajuan`, `tgl_pengajuan`, `id_klien`, `jenis_pengajuan`, `syarat_ktp`, `syarat_kk`, `syarat_sppt`, `syarat_surat_tanah`, `biaya_pembuatan`, `jenis_pembayaran`, `status_pembayaran`, `id_pengguna`, `updated_at`, `created_at`) VALUES
	(3, '1988-12-06', NULL, 'jns pengajuan', 'syarat ktp', 'syatrat kk', 'sayart sppt', 'sarat surat tanah', 'bayar pembuatan', 'jns pembuatan', 'status pembayaran', NULL, '2022-07-04 13:55:14', NULL);
/*!40000 ALTER TABLE `balik_nama` ENABLE KEYS */;

-- Dumping structure for table projekta.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.companies: 4 rows
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `email`, `address`, `created_at`, `updated_at`) VALUES
	(2, 'cykytus@mailinator.com', 'pyzakaxam@mailinator.com', 'Facilis voluptates i', '2022-07-01 10:22:39', '2022-07-01 10:42:33'),
	(3, 'tinumuw@mailinator.com', 'qesuvy@mailinator.com', 'Libero anim mollitia', '2022-07-01 10:24:11', '2022-07-01 10:24:11'),
	(4, 'coba2@mailinator.com', 'zalatedix@mailinator.com', 'Aliquip ullamco cons', '2022-07-01 10:24:24', '2022-07-02 03:33:44'),
	(8, 'holijatiw@mailinator.com', 'behufy@mailinator.com', 'Cupiditate officiis', '2022-07-02 06:32:40', '2022-07-02 06:32:40');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table projekta.detail jurnal
CREATE TABLE IF NOT EXISTS `detail jurnal` (
  `no_jurnal` int NOT NULL AUTO_INCREMENT,
  `kode_akun` int DEFAULT NULL,
  `nama_akun` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `debet` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kredit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_jurnal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.detail jurnal: 0 rows
/*!40000 ALTER TABLE `detail jurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail jurnal` ENABLE KEYS */;

-- Dumping structure for table projekta.jurnal
CREATE TABLE IF NOT EXISTS `jurnal` (
  `no_jurnal` int NOT NULL AUTO_INCREMENT,
  `tgl_jurnal` date DEFAULT NULL,
  `no_reff` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pengguna` int DEFAULT NULL,
  PRIMARY KEY (`no_jurnal`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.jurnal: 1 rows
/*!40000 ALTER TABLE `jurnal` DISABLE KEYS */;
INSERT INTO `jurnal` (`no_jurnal`, `tgl_jurnal`, `no_reff`, `keterangan`, `id_pengguna`) VALUES
	(2, '2022-07-09', '123456', 'keterangan', 1);
/*!40000 ALTER TABLE `jurnal` ENABLE KEYS */;

-- Dumping structure for table projekta.klien
CREATE TABLE IF NOT EXISTS `klien` (
  `id_klien` int NOT NULL AUTO_INCREMENT,
  `nama_klien` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nik_klien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir_klien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_lahir_klien` date DEFAULT NULL,
  `jenis_kelamin_klien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pekerjaan_klien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nlamat_klien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_tlp_klien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_klien`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.klien: 2 rows
/*!40000 ALTER TABLE `klien` DISABLE KEYS */;
INSERT INTO `klien` (`id_klien`, `nama_klien`, `nik_klien`, `tempat_lahir_klien`, `tgl_lahir_klien`, `jenis_kelamin_klien`, `pekerjaan_klien`, `nlamat_klien`, `no_tlp_klien`, `updated_at`, `created_at`) VALUES
	(10, 'test 10', 'ini id 10', 'Aperiam placeat odi', '1973-09-07', 'Beatae dolore quo vo', 'Libero do qui neque', 'alamat10', '1234567', NULL, NULL),
	(12, 'In odit ducimus est mollitia dolorem corporis ra', 'Quo laboris quo officiis qui deserunt hic nihil et', 'Quidem vel maiores o', '2015-08-27', 'Odio sint elit mini', 'Vel quidem elit omn', 'Cupiditate quaerat m', 'Exercitation ex susc', NULL, NULL);
/*!40000 ALTER TABLE `klien` ENABLE KEYS */;

-- Dumping structure for table projekta.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `no_pembayaran` int NOT NULL AUTO_INCREMENT,
  `no_pengajuan` int DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `jumlah_pembayaran` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pengguna` int DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_pembayaran`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.pembayaran: 3 rows
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`no_pembayaran`, `no_pengajuan`, `tgl_pembayaran`, `jumlah_pembayaran`, `id_pengguna`, `keterangan`) VALUES
	(3, 0, '2022-07-03', 'jumlah pembayaran', NULL, 'keterangan'),
	(4, NULL, '2022-07-05', NULL, NULL, NULL),
	(5, 12345678, '2022-07-06', 'bayar 123', NULL, 'keterangan 1233');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- Dumping structure for table projekta.pengajuan_balik_nama
CREATE TABLE IF NOT EXISTS `pengajuan_balik_nama` (
  `no_pengajuan` int NOT NULL AUTO_INCREMENT,
  `tgl_pengajuan` date DEFAULT NULL,
  `id_klien` int DEFAULT NULL,
  `jenis_pengajuan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_ktp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_kk` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_sppt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_surat_tanah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biaya_pembuatan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_pembayaran` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pengguna` int DEFAULT NULL,
  PRIMARY KEY (`no_pengajuan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.pengajuan_balik_nama: 0 rows
/*!40000 ALTER TABLE `pengajuan_balik_nama` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajuan_balik_nama` ENABLE KEYS */;

-- Dumping structure for table projekta.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `hak_akses` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`),
  UNIQUE KEY `nama_pengguna` (`nama_pengguna`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.pengguna: 5 rows
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `hak_akses`) VALUES
	(1, 'admin1', '$2y$10$8IRatmFFYXwU.irSL8al2eHvRZPfAyG6Tl5gJ3sfV596G1pweT5UO', 'admin'),
	(3, 'keuangan1', '$2y$10$F4dDK7EwUAjqAyvrD9vLH.SjrmKyYaAs.ZpwrH5bUzGMg6Z0mTvEq', 'keuangan'),
	(4, 'notaris1', '$2y$10$F4dDK7EwUAjqAyvrD9vLH.SjrmKyYaAs.ZpwrH5bUzGMg6Z0mTvEq', 'notaris'),
	(8, 'admin2', '$2y$10$KCdBD1uI5a8./Gz5ciqmxO/LFl/JEO9QDhxM2o1XMn2M3P706hRB.', NULL),
	(10, 'user1', '1973-10-28', 'admin');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table projekta.perkiraan
CREATE TABLE IF NOT EXISTS `perkiraan` (
  `kode_akun` int NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_akun` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo_normal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`kode_akun`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table projekta.perkiraan: 1 rows
/*!40000 ALTER TABLE `perkiraan` DISABLE KEYS */;
INSERT INTO `perkiraan` (`kode_akun`, `nama_akun`, `jenis_akun`, `saldo_normal`) VALUES
	(1, 'nama akun1', 'jns akun1', 'saldo jurnal1');
/*!40000 ALTER TABLE `perkiraan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
