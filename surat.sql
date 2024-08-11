-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2023 at 12:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bpbd`
--

CREATE TABLE `data_bpbd` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `anggaran` int DEFAULT NULL,
  `realisasi` int DEFAULT NULL,
  `sisa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_bpbd`
--

INSERT INTO `data_bpbd` (`id`, `description`, `anggaran`, `realisasi`, `sisa`) VALUES
(1, 'Penanganan Keadaan Mendesak', 410400000, 410100000, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `data_bpk`
--

CREATE TABLE `data_bpk` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `anggaran` int DEFAULT NULL,
  `realisasi` int DEFAULT NULL,
  `sisa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_bpk`
--

INSERT INTO `data_bpk` (`id`, `description`, `anggaran`, `realisasi`, `sisa`) VALUES
(1, 'Memberikan Insentif dan Fasilitasi Linmas Desa', 72000000, 71000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `data_bpm`
--

CREATE TABLE `data_bpm` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `anggaran` int DEFAULT NULL,
  `realisasi` int DEFAULT NULL,
  `sisa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_bpm`
--

INSERT INTO `data_bpm` (`id`, `description`, `anggaran`, `realisasi`, `sisa`) VALUES
(1, 'Peningkatan Produksi Tanaman Pangan', 21832000, 17800000, 4032000);

-- --------------------------------------------------------

--
-- Table structure for table `data_bppd`
--

CREATE TABLE `data_bppd` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `anggaran` int DEFAULT NULL,
  `realisasi` int DEFAULT NULL,
  `sisa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_bppd`
--

INSERT INTO `data_bppd` (`id`, `description`, `anggaran`, `realisasi`, `sisa`) VALUES
(1, 'Peningkatan Produksi Tanaman Pangan', 21832000, 17500000, 4332000);

-- --------------------------------------------------------

--
-- Table structure for table `data_dana`
--

CREATE TABLE `data_dana` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dana` int DEFAULT NULL,
  `realisasi` int DEFAULT NULL,
  `sisa` int DEFAULT NULL,
  `pendapatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_dana`
--

INSERT INTO `data_dana` (`id`, `description`, `dana`, `realisasi`, `sisa`, `pendapatan`) VALUES
(8, 'Pembangunan', 20000000, 199999, 19800001, 'Pendapatan Asli Desa'),
(9, 'Pengaspalan', 20000000, 3000000, 17000000, 'Pendapatan Transfer'),
(10, 'Minum', 2000000, 100000, 1900000, 'Pendapatan Transfer'),
(11, 'Maintance', 121313, 12131, 109182, 'Pendapatan Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `data_ppd`
--

CREATE TABLE `data_ppd` (
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `anggaran` int DEFAULT NULL,
  `realisasi` int DEFAULT NULL,
  `sisa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_ppd`
--

INSERT INTO `data_ppd` (`id`, `description`, `anggaran`, `realisasi`, `sisa`) VALUES
(1, 'Minum', 1000000, 300000, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skbm`
--

CREATE TABLE `data_request_skbm` (
  `id_request_skbm` int NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_photo` text,
  `scan_pernyataan` text,
  `keperluan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) DEFAULT 'BELUM MENIKAH',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_skbm`
--

INSERT INTO `data_request_skbm` (`id_request_skbm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_photo`, `scan_pernyataan`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(16, '1', '2023-06-21 01:38:02', '1_.jpg', '1_.jpg', '1_.jpg', 'buat nikah', 'Surat dicetak, bisa diambil!', 'BELUM MENIKAH', 3, '2023-06-21'),
(17, '123', '2023-06-21 15:40:20', '123_.jpg', '123_.jpg', '123_.jpg', 'saya rama belum menikah', 'Surat dicetak, bisa diambil!', 'BELUM MENIKAH', 3, '2023-06-22'),
(18, '123', '2023-06-22 13:02:16', '758901469_1.jpg', '693174590_.jpg', '693174590_1.jpg', 'robbert nikah lama', 'Surat dicetak, bisa diambil!', 'BELUM MENIKAH', 3, '2023-06-22'),
(19, '123', '2023-06-22 13:03:00', '2084291865_1.jpg', '1320755702_1.jpg', '1320755702_1.jpg', 'tiger ga nikah', 'Data sedang diperiksa oleh Staf', 'BELUM MENIKAH', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skc`
--

CREATE TABLE `data_request_skc` (
  `id_request_skc` int NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_kk` text,
  `scan_akta` text,
  `scan_foto` text,
  `keperluan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) DEFAULT 'CERAI',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_skc`
--

INSERT INTO `data_request_skc` (`id_request_skc`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `scan_akta`, `scan_foto`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(19, '1', '2023-06-21 09:06:31', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'Cerai cerai cerai', 'Surat dicetak, bisa diambil!', 'CERAI', 3, '2023-06-21'),
(20, '1', '2023-06-21 14:39:11', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'cerai saya atas nama rowan', 'Surat dicetak, bisa diambil!', 'CERAI', 3, '2023-06-21'),
(21, '1', '2023-06-21 14:48:42', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'cerai riski dan randy', 'Data sedang diperiksa oleh Staf', 'CERAI', 0, NULL),
(22, '123', '2023-06-21 15:46:52', '123_.jpg', '123_.jpg', '123_.jpg', '123_.jpg', 'rama cerai dengan diki', 'Surat sedang dalam proses cetak', 'CERAI', 2, '2023-06-21'),
(23, '123', '2023-06-22 13:07:09', '930175037_1.jpg', '990665900_1.jpg', '370067524_1.jpg', '446821196_1.jpg', 'cerai dengan boa', 'Surat dicetak, bisa diambil!', 'CERAI', 3, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skd`
--

CREATE TABLE `data_request_skd` (
  `id_request_skd` int NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_kk` text,
  `keperluan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(50) DEFAULT 'DOMISILI',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_skd`
--

INSERT INTO `data_request_skd` (`id_request_skd`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(1, '1', '2023-06-21 01:34:02', '1_.jpg', '1_.jpg', 'Domisili', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2023-06-21'),
(2, '123', '2023-06-21 15:26:48', '123_.jpg', '123_.jpg', 'pindah ke air', 'Data sedang diperiksa oleh Staf', 'DOMISILI', 0, NULL),
(6, '123', '2023-06-22 13:24:33', '157800901_1.jpg', '1304059653_1.jpg', 'banjarmasin', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2023-06-22'),
(7, '123', '2023-06-22 14:06:56', '1382935147_1.jpg', '589974567_1.jpg', 'pindah ke durian runtuh', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2023-06-22'),
(8, '123', '2023-06-22 14:23:10', '1414734067_1.jpg', '1650664476_1.jpg', 'pindah ke banjarbaru', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skk`
--

CREATE TABLE `data_request_skk` (
  `id_request_skk` int NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_kk` text,
  `scan_skk` text,
  `keperluan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) DEFAULT 'KELAHIRAN',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_skk`
--

INSERT INTO `data_request_skk` (`id_request_skk`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `scan_skk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(6, '1', '2023-06-21 01:37:37', '1_.jpg', '1_.jpg', '1_.jpg', 'buat kelahiran anak', 'Surat dicetak, bisa diambil!', 'KELAHIRAN', 3, '2023-06-21'),
(7, '1', '2023-06-21 14:58:47', '1_.jpg', '1_.jpg', '1_.jpg', 'bima lahir', 'Data sedang diperiksa oleh Staf', 'KELAHIRAN', 1, NULL),
(8, '123', '2023-06-22 12:55:15', '1747768197_1.jpg', '1372805480_1.jpg', '1372805480_1.jpg', 'dmaksdjawerjwidjafhwiofawnlkfjafhnafhaiosfnaiowudf2143125243', 'Surat dicetak, bisa diambil!', 'KELAHIRAN', 3, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skm`
--

CREATE TABLE `data_request_skm` (
  `id_request_skm` int NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_kk` text,
  `scan_akta` text,
  `scan_foto` text,
  `keperluan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) DEFAULT 'MENIKAH',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_skm`
--

INSERT INTO `data_request_skm` (`id_request_skm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `scan_akta`, `scan_foto`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(21, '1', '2023-06-21 09:20:25', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'Menkahhhhh', 'Surat dicetak, bisa diambil!', 'MENIKAH', 3, '2023-06-21'),
(22, '1', '2023-06-21 14:37:43', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'nikahh', 'Data sedang diperiksa oleh Staf', 'MENIKAH', 1, NULL),
(23, '1', '2023-06-21 14:47:27', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'menikah ridha dan riski', 'Data sedang diperiksa oleh Staf', 'MENIKAH', 1, NULL),
(24, '1', '2023-06-21 14:56:49', '1_.jpg', '1_.jpg', '1_.jpg', '1_.jpg', 'rama dan riski', 'Data sedang diperiksa oleh Staf', 'MENIKAH', 1, NULL),
(25, '123', '2023-06-21 15:02:52', '123 - ramadhan_.jpg', '123 - ramadhan_.jpg', '123 - ramadhan_.jpg', '123 - ramadhan_.jpg', 'rama dan ridho', 'Data sedang diperiksa oleh Staf', 'MENIKAH', 1, NULL),
(26, '123', '2023-06-22 13:05:54', '1908044123_1.jpg', '74213153_1.jpg', '882968005_1.jpg', '331210144_1.jpg', 'nikah dengan boa hancock', 'Surat dicetak, bisa diambil!', 'MENIKAH', 3, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skp`
--

CREATE TABLE `data_request_skp` (
  `id_request_skp` int NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_kk` text,
  `keperluan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(100) DEFAULT 'IZIN USAHA',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_skp`
--

INSERT INTO `data_request_skp` (`id_request_skp`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(1, '1', '2023-06-21 01:36:32', '1_.jpg', '1_.jpg', 'usaha', 'Surat dicetak, bisa diambil!', 'IZIN USAHA', 3, '2023-06-21'),
(2, '123', '2023-06-21 15:28:10', '123_.jpg', '123_.jpg', 'membuat burger mozatidakrela', 'Surat sedang dalam proses cetak', 'IZIN USAHA', 2, '2023-06-21'),
(3, '123', '2023-06-22 12:45:40', '1720989929_1.jpg', '1278994481_.jpg', 'koint', 'Surat dicetak, bisa diambil!', 'IZIN USAHA', 3, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sktm`
--

CREATE TABLE `data_request_sktm` (
  `id_request_sktm` int NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `tanggal_request` timestamp(5) NULL DEFAULT CURRENT_TIMESTAMP(5),
  `scan_ktp` text,
  `scan_kk` text,
  `keperluan` varchar(255) DEFAULT NULL,
  `request` varchar(100) DEFAULT 'TIDAK MAMPU',
  `keterangan` varchar(255) DEFAULT 'Data sedang diperiksa oleh Staf',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_sktm`
--

INSERT INTO `data_request_sktm` (`id_request_sktm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `request`, `keterangan`, `status`, `acc`) VALUES
(8, '1', '2023-06-21 01:37:16.36513', '1_.jpg', '1_.jpg', 'buat bayar sekolah anak', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2023-06-21'),
(9, '123', '2023-06-21 15:07:12.52629', '123_.jpg', '123_.jpg', 'rama tidak mampu beli buku', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '2023-06-22'),
(10, '123', '2023-06-22 12:51:16.48234', '1097232030_1.jpg', '620702087_1.jpg', 'dasdnjasjdhaskdjhnqwedwqeqwd', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2023-06-22'),
(11, '123', '2023-06-22 12:51:48.43807', '1783928424_1.jpg', '1640999622_1.jpg', 'asdasdasfe2qsdq2131sq', 'TIDAK MAMPU', 'Data sedang diperiksa oleh Staf', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sku`
--

CREATE TABLE `data_request_sku` (
  `id_request_sku` int NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `tanggal_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp` text,
  `scan_kk` text,
  `usaha` varchar(30) DEFAULT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) DEFAULT 'USAHA',
  `status` int DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_request_sku`
--

INSERT INTO `data_request_sku` (`id_request_sku`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `usaha`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(2, '1', '2023-06-21 01:36:58', '1_.jpg', '1_.jpg', 'usaha', 'buat bangun usaha', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2023-06-21'),
(3, '123', '2023-06-22 12:47:40', '1388724822_1.jpg', '710116536_.jpg', 'kont', 'aknsdjahnd', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2023-06-22'),
(4, '123', '2023-06-22 12:48:31', '952877210_1.jpg', '1770847854_.jpg', 'mdsfkjefjeiofjwmp', 'mfsldfjeiofjseifujsoef', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL),
(5, '123', '2023-06-22 12:50:20', '1102410648_1.jpg', '2076655048_1.jpg', 'dasdasdasdasdasda', 'sadqwaeqeqsdasfa afasfd', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int NOT NULL,
  `nik` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jekel` varchar(50) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `status_warga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`) VALUES
(1, '1', 'w', 'Pemohon', 'Yudistira', '2023-06-13', 'www', 'Laki-Laki', 'Islam', '                      Banjarbaru', '082919292911', 'Sekolah'),
(2, '10', '1', 'Lurah', 'Bagus', '2023-06-13', 'www', 'Laki-Laki', 'Islam', 'Banjarbaru', '082919292911', 'Belum Bekerja'),
(3, '11', '1', 'Staf', 'Satyo', '2023-06-13', 'www', 'Laki-Laki', 'Islam', 'Banjarbaru', '082919292911', 'Belum Bekerja'),
(4, '637201292919', '12345', 'Pemohon', 'Tiger', '2023-06-14', 'Baruh', 'Laki-Laki', NULL, NULL, NULL, NULL),
(5, '123', '1', 'Pemohon', 'ramadhan', '2023-06-21', 'handil', 'Laki-Laki', 'Islam', '             atlantis', '081999626394', 'Kerja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bpbd`
--
ALTER TABLE `data_bpbd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bpk`
--
ALTER TABLE `data_bpk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bpm`
--
ALTER TABLE `data_bpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bppd`
--
ALTER TABLE `data_bppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dana`
--
ALTER TABLE `data_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ppd`
--
ALTER TABLE `data_ppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_request_skbm`
--
ALTER TABLE `data_request_skbm`
  ADD PRIMARY KEY (`id_request_skbm`);

--
-- Indexes for table `data_request_skc`
--
ALTER TABLE `data_request_skc`
  ADD PRIMARY KEY (`id_request_skc`);

--
-- Indexes for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`);

--
-- Indexes for table `data_request_skk`
--
ALTER TABLE `data_request_skk`
  ADD PRIMARY KEY (`id_request_skk`);

--
-- Indexes for table `data_request_skm`
--
ALTER TABLE `data_request_skm`
  ADD PRIMARY KEY (`id_request_skm`);

--
-- Indexes for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD PRIMARY KEY (`id_request_skp`);

--
-- Indexes for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD PRIMARY KEY (`id_request_sktm`);

--
-- Indexes for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bpbd`
--
ALTER TABLE `data_bpbd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_bpk`
--
ALTER TABLE `data_bpk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_bpm`
--
ALTER TABLE `data_bpm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_bppd`
--
ALTER TABLE `data_bppd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_dana`
--
ALTER TABLE `data_dana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_ppd`
--
ALTER TABLE `data_ppd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_request_skbm`
--
ALTER TABLE `data_request_skbm`
  MODIFY `id_request_skbm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_request_skc`
--
ALTER TABLE `data_request_skc`
  MODIFY `id_request_skc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_request_skk`
--
ALTER TABLE `data_request_skk`
  MODIFY `id_request_skk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_request_skm`
--
ALTER TABLE `data_request_skm`
  MODIFY `id_request_skm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  MODIFY `id_request_skp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  MODIFY `id_request_sktm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
