-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 06:58 AM
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
-- Database: `db_simulasi_ti_1d_afrizalnurditya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(255) NOT NULL,
  `asal_sekolah` varchar(155) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Budi Santoso', 'SMA Negeri 1 Cilacap', '85.50', '200000.00', 'Reguler', 'Informatika', 'Kampus Pusat', NULL, NULL, NULL, NULL),
(2, 'Ahmad Faizal', 'SMK Negeri 2 Purwokerto', '79.25', '200000.00', 'Reguler', 'Teknik Mesin', 'Kampus Pusat', NULL, NULL, NULL, NULL),
(3, 'Rina Wijaya', 'SMA Negeri 3 Cilacap', '91.00', '200000.00', 'Reguler', 'Akuntansi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'SMA Swasta Kristen Cilacap', '82.40', '200000.00', 'Reguler', 'Teknik Elektro', 'Kampus Pusat', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMK Negeri 1 Binangun', '75.80', '200000.00', 'Reguler', 'Informatika', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugroho', 'SMA Negeri 1 Maos', '88.15', '200000.00', 'Reguler', 'Manajemen Bisnis', 'Kampus Pusat', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMA Negeri 2 Cilacap', '84.60', '200000.00', 'Reguler', 'Teknik Sipil', 'Kampus Pusat', NULL, NULL, NULL, NULL),
(8, 'Siti Aminah', 'MAN 2 Banyumas', '78.00', '150000.00', 'Prestasi', NULL, NULL, 'Juara 1 Lomba Sains KMNR', 'Nasional', NULL, NULL),
(9, 'Hendra Wijaya', 'SMA Negeri 1 Kroya', '80.50', '150000.00', 'Prestasi', NULL, NULL, 'Juara 2 O2SN Bulutangkis', 'Provinsi', NULL, NULL),
(10, 'Indah Cahyani', 'SMA Negeri 1 Cilacap', '85.00', '150000.00', 'Prestasi', NULL, NULL, 'Juara 1 FLS2N Seni Tari', 'Nasional', NULL, NULL),
(11, 'Kevin Sanjaya', 'SMK Komputama Jeruklegi', '76.20', '150000.00', 'Prestasi', NULL, NULL, 'Juara 3 LKS Web Technologies', 'Provinsi', NULL, NULL),
(12, 'Lestari Putri', 'SMA Negeri 1 Sidareja', '83.90', '150000.00', 'Prestasi', NULL, NULL, 'Juara 1 Lomba Pidato Bahasa Inggris', 'Kabupaten', NULL, NULL),
(13, 'Muhammad Rizky', 'SMA Muhammadiyah 1 Cilacap', '79.40', '150000.00', 'Prestasi', NULL, NULL, 'Juara 1 Olimpiade Matematika', 'Provinsi', NULL, NULL),
(14, 'Nadia Utami', 'MAN 1 Cilacap', '82.10', '150000.00', 'Prestasi', NULL, NULL, 'Hafiz Quran 20 Juz', 'Nasional', NULL, NULL),
(15, 'Rian Hidayat', 'SMK Negeri 2 Purwokerto', '92.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIKNAS-2026/01', 'Kementerian Perhubungan'),
(16, 'Oki Dermawan', 'SMA Negeri 1 Sampang', '89.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-PEMKAB-CLP/2026', 'Pemerintah Daerah Cilacap'),
(17, 'Putri Rahayu', 'SMA Negeri 1 Cilacap', '94.10', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-BUMN-PLN/IX', 'PT PLN (Persero)'),
(18, 'Qori Ananda', 'SMK Negeri 1 Cilacap', '87.30', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIKNAS-2026/04', 'Kementerian Perhubungan'),
(19, 'Rizka Amelia', 'SMA Negeri 3 Cilacap', '90.80', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DISKOMINFO/02', 'Dinas Komunikasi dan Informatika'),
(20, 'Setyo Nugraha', 'SMA Negeri 1 Kawunganten', '86.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-PEMKAB-CLP/2027', 'Pemerintah Daerah Cilacap'),
(21, 'Taufik Hidayat', 'SMK Boedi Oetomo Cilacap', '91.20', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-BUMN-TELK/05', 'PT Telkom Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
