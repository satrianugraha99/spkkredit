-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 11:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkkredit`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajuan`
--

CREATE TABLE `detail_pengajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `ket_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pengajuan`
--

INSERT INTO `detail_pengajuan` (`id`, `pengajuan_id`, `kriteria_id`, `nilai`, `ket_nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '1000000', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(2, 1, 2, 3, '40 tahun', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(3, 1, 3, 3, 'PNS', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(4, 1, 4, 2, '1000000', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(5, 1, 5, 3, 'Modal usaha', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(6, 1, 6, 2, '≥ 12 bulan - ≤ 24 bulan', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(7, 1, 7, 2, 'BPKB', '2021-05-17 00:08:36', '2021-05-17 00:08:36'),
(8, 2, 1, 3, '4500000', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(9, 2, 2, 2, '45 tahun', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(10, 2, 3, 3, 'PNS', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(11, 2, 4, 1, '6000000', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(12, 2, 5, 2, 'Investasi', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(13, 2, 6, 3, '< 12 bulan', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(14, 2, 7, 1, 'Slip gaji', '2021-05-17 00:10:48', '2021-05-17 00:10:48'),
(15, 3, 1, 2, '1500000', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(16, 3, 2, 3, '40 tahun', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(17, 3, 3, 2, 'Wiraswasta', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(18, 3, 4, 1, '5000000', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(19, 3, 5, 3, 'Modal usaha', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(20, 3, 6, 2, '≥ 12 bulan - ≤ 24 bulan', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(21, 3, 7, 2, 'BPKB', '2021-05-17 00:11:24', '2021-05-17 00:11:24'),
(22, 4, 1, 2, '2500000', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(23, 4, 2, 3, '35 tahun', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(24, 4, 3, 2, 'Wiraswasta', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(25, 4, 4, 1, '3500000', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(26, 4, 5, 2, 'Investasi', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(27, 4, 6, 1, '≥ 24 bulan - ≤ 36 bulan', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(28, 4, 7, 3, 'Sertifikat tanah', '2021-05-17 00:12:01', '2021-05-17 00:12:01'),
(29, 5, 1, 1, '900000', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(30, 5, 2, 2, '60 tahun', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(31, 5, 3, 1, 'Pekerja tidak tetap', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(32, 5, 4, 1, '5000000', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(33, 5, 5, 1, 'Konsumtif', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(34, 5, 6, 1, '≥ 24 bulan - ≤ 36 bulan', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(35, 5, 7, 1, 'Slip gaji', '2021-05-17 00:12:32', '2021-05-17 00:12:32'),
(36, 6, 1, 2, '1000000', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(37, 6, 2, 2, '50 tahun', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(38, 6, 3, 3, 'PNS', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(39, 6, 4, 1, '7000000', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(40, 6, 5, 1, 'Konsumtif', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(41, 6, 6, 1, '≥ 24 bulan - ≤ 36 bulan', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(42, 6, 7, 1, 'Slip gaji', '2021-05-17 00:13:03', '2021-05-17 00:13:03'),
(43, 7, 1, 2, '2000000', '2021-05-17 00:24:27', '2021-05-17 00:24:27'),
(44, 7, 2, 3, '20 tahun', '2021-05-17 00:24:27', '2021-05-17 00:24:27'),
(45, 7, 3, 2, 'Wiraswasta', '2021-05-17 00:24:27', '2021-05-17 00:24:27'),
(46, 7, 4, 2, '2000000', '2021-05-17 00:24:27', '2021-05-17 00:24:27'),
(47, 7, 5, 3, 'Modal usaha', '2021-05-17 00:24:27', '2021-05-17 00:24:27'),
(48, 7, 6, 3, '< 12 bulan', '2021-05-17 00:24:27', '2021-05-17 00:24:27'),
(49, 7, 7, 3, 'Sertifikat tanah', '2021-05-17 00:24:27', '2021-05-17 00:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Pendapatan Per Bulan', 'Benefit', 25.00, '2021-05-16 23:16:18', '2021-05-16 23:16:18'),
(2, 'C2', 'Usia', 'Benefit', 20.00, '2021-05-16 23:16:30', '2021-05-16 23:16:30'),
(3, 'C3', 'Pekerjaan', 'Benefit', 20.00, '2021-05-16 23:16:42', '2021-05-16 23:16:42'),
(4, 'C4', 'Plapon Kredit', 'Cost', 15.00, '2021-05-16 23:16:58', '2021-05-16 23:16:58'),
(5, 'C5', 'Jenis Penggunaan', 'Benefit', 10.00, '2021-05-16 23:17:12', '2021-05-16 23:17:12'),
(6, 'C6', 'Jangka Waktu', 'Cost', 5.00, '2021-05-16 23:17:27', '2021-05-16 23:17:27'),
(7, 'C7', 'Jaminan', 'Benefit', 5.00, '2021-05-16 23:17:36', '2021-05-16 23:17:36');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_24_153640_create_role_table', 1),
(5, '2021_03_24_153657_create_nasabah_table', 1),
(6, '2021_03_24_153717_create_kriteria_table', 1),
(10, '2021_03_24_153736_create_pengajuan_table', 2),
(11, '2021_03_24_153814_create_detail_pengajuan_table', 2),
(12, '2021_05_12_125018_add_field_keterangan_on_pengajuan_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `noKtp` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noTelp` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `user_id`, `noKtp`, `nama`, `alamat`, `noTelp`, `jenisKelamin`, `created_at`, `updated_at`) VALUES
(1, 3, '5171031712800001', 'Gede Putra Suartawan', 'Jalan Kutat Lestari Blok L No.3', '0812453297889', 'Laki-Laki', '2021-05-16 23:11:18', '2021-05-16 23:11:18'),
(2, 4, '5171031712800000', 'I Nyoman Pica', 'Jalan Danau Buyan No. 10', '0812453297889', 'Laki-Laki', '2021-05-16 23:11:53', '2021-05-16 23:11:53'),
(3, 5, '5171031710900001', 'I Nyoman Rai', 'Jalan Delod Peken No. 3', '0812834297889', 'Laki-Laki', '2021-05-16 23:12:16', '2021-05-16 23:12:16'),
(4, 6, '5171030204910001', 'Ni Ketut Martini', 'Jalan Intaran No. 6', '0817961915378', 'Perempuan', '2021-05-16 23:12:37', '2021-05-16 23:12:37'),
(5, 7, '5171030911800002', 'Ni Luh Gede Suarningsih', 'Jalan Intaran No. 3', '0812333297889', 'Perempuan', '2021-05-16 23:12:56', '2021-05-16 23:12:56'),
(6, 8, '5171031710900002', 'Ni Komang Ita Monika', 'Jln. Penyaringan Gang. IV No.5', '0892475297889', 'Perempuan', '2021-05-16 23:13:29', '2021-05-16 23:13:29'),
(7, 9, '5171032206920001', 'I Putu Eka April Yanto', 'Jln. Penyaringan Gang. IV No.5', '081349733825', 'Laki-Laki', '2021-05-16 23:52:10', '2021-05-16 23:52:10'),
(8, 10, '5171031011880001', 'Ni Nengah Amanda Candrika', 'Jalan Intaran No. 6', '0892475297889', 'Perempuan', '2021-05-16 23:52:29', '2021-05-16 23:52:29'),
(9, 11, '5171036504930001', 'Ni Made Suasti', 'Jalan Batur Sari No. 6', '089367874893', 'Perempuan', '2021-05-16 23:53:11', '2021-05-16 23:53:11'),
(10, 12, '5171030911800003', 'Nyoman Arsa', 'Jalan Danau Beratan No. 9', '089327894753', 'Laki-Laki', '2021-05-16 23:53:42', '2021-05-16 23:53:42'),
(11, 13, '5171030204900000', 'I Wayan Sucipta', 'Jalan Intaran No. 11', '081349733825', 'Laki-Laki', '2021-05-16 23:54:09', '2021-05-16 23:54:09'),
(12, 14, '5171030911800001', 'I Wayan Pastika', 'Jalan Intaran No. 3', '089327894753', 'Laki-Laki', '2021-05-16 23:58:38', '2021-05-16 23:58:38'),
(13, 15, '5171031712800009', 'Test', 'Jalan Kutat Lestari Blok L No.3', '082237188923', 'Laki-Laki', '2021-05-17 00:24:02', '2021-05-17 00:24:02'),
(14, 16, '5171030204910009', 'I Gusti Agung Satria Nugraha', 'Jalan Delod Peken No. 3', '0812834297889', 'Laki-Laki', '2021-05-17 00:54:17', '2021-05-17 00:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nasabah_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_validasi` date DEFAULT NULL,
  `total_nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nasabah_id`, `tanggal_pengajuan`, `status_pengajuan`, `status_peminjaman`, `keterangan`, `tanggal_validasi`, `total_nilai`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-05-17', 'Diterima', 'Batal', 'Dibatalkan oleh Nasabah, karena akdmsakdkandkdksdsdsa', '2021-05-17', 80, '2021-05-17 00:08:36', '2021-05-17 01:07:34'),
(2, 1, '2021-05-17', 'Diterima', 'Tahap Cicilan', NULL, '2021-05-17', 83, '2021-05-17 00:10:48', '2021-05-17 00:13:41'),
(3, 3, '2021-05-17', 'Diterima', 'Tahap Cicilan', NULL, '2021-05-17', 81, '2021-05-17 00:11:24', '2021-05-17 00:13:41'),
(4, 7, '2021-05-17', 'Diterima', 'Tahap Cicilan', NULL, '2021-05-17', 82, '2021-05-17 00:12:01', '2021-05-17 00:13:41'),
(5, 6, '2021-05-17', 'Ditolak', '-', NULL, '2021-05-17', 53, '2021-05-17 00:12:32', '2021-05-17 00:13:41'),
(6, 8, '2021-05-17', 'Diterima', 'Tahap Cicilan', NULL, '2021-05-17', 75, '2021-05-17 00:13:03', '2021-05-17 00:13:41'),
(7, 13, '2021-05-17', 'Sedang proses', NULL, NULL, NULL, NULL, '2021-05-17 00:24:27', '2021-05-17 00:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@yahoo.com', NULL, '$2y$10$SimiNRNbzUqEvEdSu0KBCudoNHlEey5BEXT3QYFtMycbHrqO5LKKu', NULL, '2021-05-16 23:07:38', '2021-05-16 23:07:38'),
(2, 'kepalalpd', 'kepalalpd', 'kepalalpd@yahoo.com', NULL, '$2y$10$ZThQBQ.rtZHqMszrjhIK8O.vfQW5i/f.SbkmV58pi3nthd7lNEvXi', NULL, '2021-05-16 23:08:12', '2021-05-16 23:08:12'),
(3, 'nasabah', 'Suartawan', 'suartawan@yahoo.com', NULL, '$2y$10$tVVHdzc67qbIQm3fGlc9leyYCJk4/z928/jjFiMBnQ9ZsSsUL99Ay', NULL, '2021-05-16 23:11:18', '2021-05-16 23:19:28'),
(4, 'nasabah', 'Pica', 'pica@yahoo.com', NULL, '$2y$10$/IgHhs0YwBXNFap4DHbA/uhlY2e8ez6wCa5moGEmVNpjWSSCR0GIW', NULL, '2021-05-16 23:11:53', '2021-05-16 23:11:53'),
(5, 'nasabah', 'Rai', 'rai@yahoo.com', NULL, '$2y$10$AZ3YGGJUfP5/ggDNARnsE.UhbEOF1qnrOzBv7NP9csxG9NdDjH4Xm', NULL, '2021-05-16 23:12:16', '2021-05-16 23:12:16'),
(6, 'nasabah', 'Martini', 'martini@yahoo.com', NULL, '$2y$10$.pBc/T9ULYiAWLYfesi3Mu.ew5JPA9Nicj1/KbdN7wasBlBHH.ir6', NULL, '2021-05-16 23:12:37', '2021-05-16 23:12:37'),
(7, 'nasabah', 'Suarningsih', 'suarningsih@yahoo.com', NULL, '$2y$10$oMItLU03c41R1Yw8EjkZKOlcM7Xeu5ORJ7Pl.9FZx0yZuTF1vfCLC', NULL, '2021-05-16 23:12:56', '2021-05-16 23:12:56'),
(8, 'nasabah', 'Ita', 'ita@yahoo.com', NULL, '$2y$10$eMMjnj6Gop7.Xp4mCwMEeuJBXWElh5d5e.hrpC1KWV9vcRCSvO9fW', NULL, '2021-05-16 23:13:29', '2021-05-16 23:13:29'),
(9, 'nasabah', 'Eka', 'eka@yahoo.com', NULL, '$2y$10$t2AAvVUxqBP4ykpzDLFecO2fSDOS3hIUA22ZJRGfp6Ca3CJZtKk8e', NULL, '2021-05-16 23:52:10', '2021-05-16 23:52:10'),
(10, 'nasabah', 'Amanda', 'amanda@yahoo.com', NULL, '$2y$10$S0qNMtNtHGA20IagJMy8WuL/Zz.2Zg6qsMRFv31n/nUZI7.jQIona', NULL, '2021-05-16 23:52:29', '2021-05-16 23:52:29'),
(11, 'nasabah', 'Suasti', 'suasti@yahoo.com', NULL, '$2y$10$QjHb2OzyWWGCFv.UCrioa.y9p40QxZIT/n0qpUe2AvUhQ9hVhlZDq', NULL, '2021-05-16 23:53:11', '2021-05-16 23:53:11'),
(12, 'nasabah', 'Arsa', 'arsa@yahoo.com', NULL, '$2y$10$.9HTPkSF.A8tHABQQ1WTteZhJkbkQx3bvFfFTESmcTAP.s.e6UklC', NULL, '2021-05-16 23:53:42', '2021-05-16 23:53:42'),
(13, 'nasabah', 'Sucipta', 'sucipta@yahoo.com', NULL, '$2y$10$Mmq5Ij8IDQOTyLDkuKOaN.XZsdZF7Lrb4Ogp5CjCmpLAJn1IRmjOK', NULL, '2021-05-16 23:54:09', '2021-05-16 23:54:09'),
(14, 'nasabah', 'Pastika', 'pastika@yahoo.com', NULL, '$2y$10$3BxafHeA3AxPNsuJApqVtOXgyWj5XiujrPo/CbHhl6i9aYaf/UctS', NULL, '2021-05-16 23:58:38', '2021-05-16 23:58:38'),
(15, 'nasabah', 'Test', 'test@yahoo.com', NULL, '$2y$10$K4zUBEqsP1xobONzBHbuOOmrGahS5MNTGOMzg4Z6rJg57TVeO8ZMS', NULL, '2021-05-17 00:24:02', '2021-05-17 00:24:02'),
(16, 'nasabah', 'Satria', 'satria@yahoo.com', NULL, '$2y$10$Ao0S8JTnU/cAYN3HhbicXOb7hddw1A1BzggHN3xTqYWSB9aqBbLcK', NULL, '2021-05-17 00:54:17', '2021-05-17 00:54:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pengajuan_pengajuan_id_foreign` (`pengajuan_id`),
  ADD KEY `detail_pengajuan_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_kode_unique` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nasabah_noktp_unique` (`noKtp`),
  ADD KEY `nasabah_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_nasabah_id_foreign` (`nasabah_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  ADD CONSTRAINT `detail_pengajuan_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pengajuan_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD CONSTRAINT `nasabah_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_nasabah_id_foreign` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
