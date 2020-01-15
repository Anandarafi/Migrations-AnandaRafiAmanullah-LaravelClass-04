-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 08:53 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) UNSIGNED NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(1, 'Supriyadi', 'Malang', '08123456789', '2020-01-15 06:49:39', NULL),
(2, 'Bambang', 'Kediri', '081234567888', '2020-01-15 06:49:39', NULL),
(3, 'ALex', 'Surabaya', '0812415123161551', '2020-01-15 06:49:39', NULL),
(4, 'Supriyadi', 'Malang', '08123456789', '2020-01-15 06:49:47', NULL),
(5, 'Bambang', 'Kediri', '081234567888', '2020-01-15 06:49:47', NULL),
(6, 'ALex', 'Surabaya', '0812415123161551', '2020-01-15 06:49:47', NULL),
(7, 'Supriyadi', 'Malang', '08123456789', '2020-01-15 06:56:07', NULL),
(8, 'Bambang', 'Kediri', '081234567888', '2020-01-15 06:56:07', NULL),
(9, 'ALex', 'Surabaya', '0812415123161551', '2020-01-15 06:56:07', NULL),
(10, 'Supriyadi', 'Malang', '08123456789', '2020-01-15 06:58:14', NULL),
(11, 'Bambang', 'Kediri', '081234567888', '2020-01-15 06:58:14', NULL),
(12, 'ALex', 'Surabaya', '0812415123161551', '2020-01-15 06:58:14', NULL),
(13, 'Supriyadi', 'Malang', '08123456789', '2020-01-15 06:58:32', NULL),
(14, 'Bambang', 'Kediri', '081234567888', '2020-01-15 06:58:32', NULL),
(15, 'ALex', 'Surabaya', '0812415123161551', '2020-01-15 06:58:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penerbit`, `pengarang`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'ThingSpeak', 'Alex', 'SupriyadiMedia', 'thing.jpg', '2020-01-15 07:24:59', NULL),
(2, 'Hello Gaes', 'Supriyadi', 'AlexMedia', 'hello.jpg', '2020-01-15 07:24:59', NULL),
(3, 'The Hell', 'Bambang', 'TokoMedia', 'hell.jpg', '2020-01-15 07:24:59', NULL),
(4, 'A6 ', 'Asshiap', 'AhhaBledeg', 'A6.jpg', '2020-01-15 07:24:59', NULL),
(5, 'Asus Gaming Nvidia', 'School', 'GamingMedia', 'asus.jpg', '2020-01-15 07:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(10) UNSIGNED NOT NULL,
  `id_peminjaman` int(10) UNSIGNED NOT NULL,
  `id_buku` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2020_01_14_062906_create_anggota_table', 1),
(15, '2020_01_14_063750_create_petugas_table', 1),
(16, '2020_01_14_064047_create_buku_table', 1),
(17, '2020_01_14_064325_create_peminjaman_table', 1),
(18, '2020_01_14_065658_create_detailpeminjaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(10) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` int(10) UNSIGNED NOT NULL,
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `tgl_tempo` date NOT NULL,
  `denda` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `telp`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rafi', 'Probolinggo', '082231954774', 'anndrf_', 'wolffire1', '2020-01-15 06:58:32', NULL),
(2, 'Faiz', 'Malang', '08123456789', 'faiz1', 'wolffire1', '2020-01-15 06:58:32', NULL),
(3, 'Faseh', 'Kediri', '082231954774', 'faseh1', 'wolffire1', '2020-01-15 07:16:00', NULL),
(4, 'Juri', 'Malang', '08123456789', 'juri1', 'wolffire1', '2020-01-15 07:16:00', NULL),
(5, 'Bayu', 'Bekasi', '08123456789', 'bayu1', 'wolffire1', '2020-01-15 07:16:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `detail_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_id_anggota_foreign` (`id_anggota`),
  ADD KEY `peminjaman_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
