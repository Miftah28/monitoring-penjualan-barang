-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 10:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_barang_id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_barang` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `jenis_barang_id`, `nama_barang`, `stok_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kopi', 75, '2024-12-17 07:24:59', '2024-12-17 07:26:35', NULL),
(2, 1, 'Teh', 76, '2024-12-17 07:24:59', '2024-12-17 07:27:18', NULL),
(3, 2, 'Pasta Gigi', 80, '2024-12-17 07:24:59', '2024-12-17 07:26:47', NULL),
(4, 2, 'Sabun Mandi', 70, '2024-12-17 07:24:59', '2024-12-17 07:27:00', NULL),
(5, 2, 'Sampo', 75, '2024-12-17 07:24:59', '2024-12-17 07:27:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_terjuals`
--

CREATE TABLE `barang_terjuals` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `jumlah_terjual` int NOT NULL,
  `stok_sebelumnya` int NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_terjuals`
--

INSERT INTO `barang_terjuals` (`id`, `barang_id`, `jumlah_terjual`, `stok_sebelumnya`, `tanggal_transaksi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 100, '2021-05-01', '2024-12-17 07:26:12', '2024-12-17 07:26:12', NULL),
(2, 2, 19, 100, '2021-05-05', '2024-12-17 07:26:23', '2024-12-17 07:26:23', NULL),
(3, 1, 15, 90, '2021-05-10', '2024-12-17 07:26:35', '2024-12-17 07:26:35', NULL),
(4, 3, 20, 100, '2021-05-11', '2024-12-17 07:26:47', '2024-12-17 07:26:47', NULL),
(5, 4, 30, 100, '2021-05-11', '2024-12-17 07:27:00', '2024-12-17 07:27:00', NULL),
(6, 5, 25, 100, '2021-05-12', '2024-12-17 07:27:09', '2024-12-17 07:27:09', NULL),
(7, 2, 5, 81, '2021-05-12', '2024-12-17 07:27:18', '2024-12-17 07:27:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barangs`
--

CREATE TABLE `jenis_barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_barangs`
--

INSERT INTO `jenis_barangs` (`id`, `jenis_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Konsumsi', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL),
(2, 'Pembersih', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_12_17_041614_create_penjuals_table', 1),
(7, '2024_12_17_042126_create_jenis_barangs_table', 1),
(8, '2024_12_17_042247_create_barangs_table', 1),
(9, '2024_12_17_042352_create_barang_terjuals_table', 1),
(10, '2024_12_17_043103_create_riwayat_stok_barangs_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjuals`
--

CREATE TABLE `penjuals` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjuals`
--

INSERT INTO `penjuals` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'miftah', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_stok_barangs`
--

CREATE TABLE `riwayat_stok_barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `tanggal_stok` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_stok_barangs`
--

INSERT INTO `riwayat_stok_barangs` (`id`, `barang_id`, `nama_barang`, `stok`, `tanggal_stok`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kopi', 100, '2024-12-17', 'Penambahan Barang Dan Stok Barang', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL),
(2, 2, 'Teh', 100, '2024-12-17', 'Penambahan Barang Dan Stok Barang', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL),
(3, 3, 'Pasta Gigi', 100, '2024-12-17', 'Penambahan Barang Dan Stok Barang', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL),
(4, 4, 'Sabun Mandi', 100, '2024-12-17', 'Penambahan Barang Dan Stok Barang', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL),
(5, 5, 'Sampo', 100, '2024-12-17', 'Penambahan Barang Dan Stok Barang', '2024-12-17 07:24:59', '2024-12-17 07:24:59', NULL),
(6, 1, 'Kopi', 10, '2024-12-17', 'Barang Terjual', '2024-12-17 07:26:12', '2024-12-17 07:26:12', NULL),
(7, 2, 'Teh', 19, '2024-12-17', 'Barang Terjual', '2024-12-17 07:26:23', '2024-12-17 07:26:23', NULL),
(8, 1, 'Kopi', 15, '2024-12-17', 'Barang Terjual', '2024-12-17 07:26:35', '2024-12-17 07:26:35', NULL),
(9, 3, 'Pasta Gigi', 20, '2024-12-17', 'Barang Terjual', '2024-12-17 07:26:47', '2024-12-17 07:26:47', NULL),
(10, 4, 'Sabun Mandi', 30, '2024-12-17', 'Barang Terjual', '2024-12-17 07:27:00', '2024-12-17 07:27:00', NULL),
(11, 5, 'Sampo', 25, '2024-12-17', 'Barang Terjual', '2024-12-17 07:27:09', '2024-12-17 07:27:09', NULL),
(12, 2, 'Teh', 5, '2024-12-17', 'Barang Terjual', '2024-12-17 07:27:18', '2024-12-17 07:27:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'penjual@gmail.com', 'penjual', NULL, '$2y$12$moPz8rK5cppxbJz1ZpKUMePYbr/VKBgHfUowGAnNSQ6XKNJFFeC8m', NULL, '2024-12-17 07:24:59', '2024-12-17 07:24:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_jenis_barang_id_foreign` (`jenis_barang_id`);

--
-- Indexes for table `barang_terjuals`
--
ALTER TABLE `barang_terjuals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_terjuals_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_barangs`
--
ALTER TABLE `jenis_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penjuals`
--
ALTER TABLE `penjuals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjuals_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_stok_barangs`
--
ALTER TABLE `riwayat_stok_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_stok_barangs_barang_id_foreign` (`barang_id`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_terjuals`
--
ALTER TABLE `barang_terjuals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barangs`
--
ALTER TABLE `jenis_barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjuals`
--
ALTER TABLE `penjuals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_stok_barangs`
--
ALTER TABLE `riwayat_stok_barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_jenis_barang_id_foreign` FOREIGN KEY (`jenis_barang_id`) REFERENCES `jenis_barangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang_terjuals`
--
ALTER TABLE `barang_terjuals`
  ADD CONSTRAINT `barang_terjuals_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penjuals`
--
ALTER TABLE `penjuals`
  ADD CONSTRAINT `penjuals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_stok_barangs`
--
ALTER TABLE `riwayat_stok_barangs`
  ADD CONSTRAINT `riwayat_stok_barangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
