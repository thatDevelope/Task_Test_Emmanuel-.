-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blume`
--
CREATE DATABASE IF NOT EXISTS `blume` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blume`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'zee', 'tsirchi@gmail.com', '$2y$12$TJcrYs6aTy8sJBKreF4j..vu0NTGtZqhYwJqyKZronmWF5zmRaMUe', '2024-11-29 08:33:09', '2024-11-29 08:33:09'),
(2, 'zee', 'boxzun@gmail.com', '$2y$12$7eVYbNHOc2xvVJnT2.6eKOE9h3JlAISYZ4WdvDTbpOlMoWLD0kbHi', '2024-11-29 08:36:16', '2024-11-29 08:36:16'),
(3, 'zee', 'boxzun5@gmail.com', '$2y$12$HD49JOx9pgPM2Md80qLCeeeOvIz9uNc09aqyD1YRbAXWkWsJ7DyHu', '2024-12-01 06:41:11', '2024-12-01 06:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `brts`
--

CREATE TABLE `brts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brt_code` varchar(255) DEFAULT NULL,
  `reserved_amount` decimal(10,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brts`
--

INSERT INTO `brts` (`id`, `brt_code`, `reserved_amount`, `expiry_date`, `created_at`, `updated_at`) VALUES
(2, 'BRT-717', 500000.00, '2025-12-31', '2024-11-29 05:34:38', '2024-11-29 05:34:38'),
(3, 'BRT-396', 700000.00, '2025-12-31', '2024-11-29 05:36:34', '2024-11-29 05:36:34'),
(4, 'BRT-932', 300000.00, '2025-12-31', '2024-11-29 05:43:22', '2024-11-29 05:43:22'),
(5, 'BRT-407', 300000.00, '2025-12-31', '2024-11-29 05:44:30', '2024-11-29 05:44:30'),
(6, 'BRT-334', 1900000.00, '2025-02-28', '2024-11-29 05:50:09', '2024-11-29 05:50:09'),
(7, 'BRT-755', 7900.00, '2025-03-29', '2024-11-29 06:19:00', '2024-11-29 06:19:00'),
(8, 'BRT-960', 170000.00, '2025-04-30', '2024-11-30 10:45:50', '2024-11-30 10:45:50'),
(9, 'BRT-850', 170000.00, '2025-04-30', '2024-11-30 10:50:47', '2024-11-30 10:50:47'),
(10, 'BRT-689', 200000.00, '2025-05-31', '2024-11-30 11:02:11', '2024-11-30 11:02:11'),
(11, 'BRT-715', 6000.00, '2025-05-31', '2024-12-01 06:26:28', '2024-12-01 06:26:28'),
(12, 'BRT-369', 6000.00, '2025-05-31', '2024-12-01 06:27:25', '2024-12-01 06:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_28_120802_add_brt_fields_to_users_table', 2),
(5, '2024_11_28_122632_create_brts_table', 3),
(6, '2024_11_28_123710_add_brt_fields_to_users_table', 4),
(7, '2024_11_28_160723_add_brt_fields_to_users_table', 5),
(8, '2024_11_29_070135_create_notifications_table', 6),
(9, '2024_11_29_081802_create_admins_table', 7),
(10, '2024_11_29_081917_create_admins_table-m', 7),
(11, '2024_11_29_091822_create_admins_table', 8),
(12, '2024_11_30_114836_update_data_column_in_notifications_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0ecb8bb9-bb09-4b17-b2b7-2e96b77bcc2b', 'App\\Notifications\\NewBrtNotification', 'App\\Models\\User', 21, '{\"message\":\"You just purchased 6000.\",\"reserved_amount\":\"6000\"}', NULL, '2024-12-01 06:26:39', '2024-12-01 06:26:39'),
('5252954e-cff5-4b66-9877-d2ac2e8d11eb', 'App\\Notifications\\NewBrtNotification', 'App\\Models\\User', 21, '{\"message\":\"You just purchased 6000.\",\"reserved_amount\":\"6000\"}', NULL, '2024-12-01 06:27:26', '2024-12-01 06:27:26'),
('76a1a27d-916c-400a-a12c-b3e33409b834', 'App\\Notifications\\NewBrtNotification', 'App\\Models\\User', 1, '{\"message\":\"You just purchased 200000.\",\"reserved_amount\":\"200000\"}', NULL, '2024-11-30 11:02:11', '2024-11-30 11:02:11'),
('ff587907-2122-48e5-962f-875047dc95f2', 'App\\Notifications\\NewBrtNotification', 'App\\Models\\User', 1, '{\"message\":\"You just purchased 170000.\",\"reserved_amount\":\"170000\"}', NULL, '2024-11-30 10:50:47', '2024-11-30 10:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DVS3jQl7ppRL8pxl8p4jkD20BTFtTQRMWupjcPaB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVhLRWJscVV4ZG5ZUDBTSEJXQnB4OTVEVUhXYjdhblVXWWpPd1hSNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbnMiO319', 1733038943),
('odxDMzillIs9WvYtQF9MFOBujPtb20hTFbc2bEvj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0VQVDZBeVVJNzR2YlF1NlZmUjVwMmw0UDF4aGN0ZVZHMUI2RWFkMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733035741),
('sG5xEibNe0EPZsRcYiPz0ZDzIteCFzKeBEmGm24Z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOUp1cEtzZFJ4cGdlRkNVbUI2dGU2ZmpWRjh0Z21TQWlRVjV6aTRGVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733038435);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brt_code` varchar(255) DEFAULT NULL,
  `reserved_amount` decimal(15,2) DEFAULT 0.00,
  `status` enum('active','expired') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `brt_code`, `reserved_amount`, `status`) VALUES
(1, 'zee', 'boxzun@gmail.com', '2024-11-28 10:25:05', '$2y$12$7xAfKCOz0.wUXhfwg27sfOpTHrfHTG2JfvL8tOgZAs6XU76K6uWEK', NULL, '2024-11-28 10:24:38', '2024-11-30 11:02:11', 'BRT-689', 0.00, 'active'),
(5, 'chibueze', 'tsirchi@gmail.com', '2024-11-28 15:09:08', '$2y$12$.ZdOu0CBll/lujujro2ngeQC/tfYcVQEVUWBLWMqdC5OrweAT0uVe', NULL, '2024-11-28 15:08:44', '2024-11-28 15:09:08', 'BRT-407', 0.00, 'active'),
(17, 'zee4', 'chi@gmail.com', NULL, '$2y$12$Etjv.GhzSVf2m1nz4sQLm.yzzw9iN5L3p70Dqb4IoQqFg1eyFVed2', NULL, '2024-12-01 06:05:07', '2024-12-01 06:05:07', 'BRT-243', 0.00, 'active'),
(18, 'zee4', 'chi2@gmail.com', NULL, '$2y$12$fAG0v7yVMQoWrwQlTkbgs.XjOiPnbdMdGofdogwOsUb/C142wA0hK', NULL, '2024-12-01 06:06:20', '2024-12-01 06:06:20', 'BRT-134', 0.00, 'active'),
(19, 'zee', 'boxzun2@gmail.com', NULL, '$2y$12$Ad0lGMOOysZqTlKB4y1RIehR0B531qhvemVtBobkYSOTM59TUi06m', NULL, '2024-12-01 06:17:59', '2024-12-01 06:17:59', 'BRT-297', 0.00, 'active'),
(20, 'zee', 'boxzun4@gmail.com', NULL, '$2y$12$YV2xgTjRJ1F.zGnl2pIasevF7rbD1AOekOYq9UXDPmarngYJcvfdS', NULL, '2024-12-01 06:22:59', '2024-12-01 06:22:59', 'BRT-943', 0.00, 'active'),
(21, 'zee5', 'boxzun5@gmail.com', NULL, '$2y$12$7G7i0J58YFEc1pzwodGdf.AtCwD317iKHVDmvfWSXtra7xBToTU56', NULL, '2024-12-01 06:25:20', '2024-12-01 06:27:25', 'BRT-369', 0.00, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brts`
--
ALTER TABLE `brts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brts_brt_code_unique` (`brt_code`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_brt_code_unique` (`brt_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brts`
--
ALTER TABLE `brts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
