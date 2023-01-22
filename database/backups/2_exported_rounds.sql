-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 22, 2023 at 02:01 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investering`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_08_19_144021_create_sessions_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_05_10_000010_add_columns_to_users', 1),
(8, '2022_11_14_064105_create_rounds_table', 1),
(9, '2022_11_26_044630_create_properties_table', 1),
(10, '2022_12_02_071939_create_weeks_table', 1),
(11, '2022_12_13_080353_create_round_user_table', 1),
(12, '2022_12_20_101715_create_jobs_table', 1),
(13, '2022_12_20_154657_add_lock_to_rounds_table', 1),
(14, '2023_01_05_014704_create_wishes_table', 1),
(15, '2023_01_10_071428_add_start_wishes_date_table', 1),
(16, '2023_01_11_042946_add_soft_deletes_to_wishes_table', 1),
(17, '2023_01_13_145803_add_active_column_to_rounds_table', 1),
(18, '2023_01_13_145849_add_publicate_column_to_rounds_table', 1),
(19, '2023_01_13_150647_add_overlimit_column_to_rounds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_wishes_date` date NOT NULL,
  `stop_wishes_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `max_wishes` int NOT NULL DEFAULT '20',
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `publicate` tinyint(1) NOT NULL DEFAULT '0',
  `overlimit` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `name`, `description`, `start_wishes_date`, `stop_wishes_date`, `start_date`, `end_date`, `max_wishes`, `lock`, `active`, `publicate`, `overlimit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Round before', 'Sunt voluptate assumenda eaque corporis id minus perspiciatis. Nemo maiores omnis qui debitis quos. Enim eum accusamus ipsum nihil. Aspernatur nesciunt sint dolor dolores et.', '0000-00-00', '2022-01-01', '2022-01-10', '2022-05-01', 20, 0, 0, 0, 0, '2022-07-07 09:02:52', '2022-07-07 10:29:20', '2022-07-07 10:29:20'),
(2, 'Prioriteringsrunde 2. halvår 2022', 'Prioriteringsrunden løber fra uge 43 2022 til uge 14 2023', '0000-00-00', '2022-08-15', '2022-10-22', '2023-04-08', 20, 0, 0, 0, 0, '2022-07-07 09:02:52', '2022-07-25 07:08:29', NULL),
(3, 'Round after', 'Iusto eius et et impedit laboriosam in. Eaque odio quos vel eaque dignissimos. Soluta vitae explicabo exercitationem sint voluptatem soluta nulla. Illum voluptatem deleniti quos sed.', '0000-00-00', '2023-01-01', '2023-01-10', '2023-05-01', 20, 0, 0, 0, 0, '2022-07-07 09:02:52', '2022-07-11 06:04:42', '2022-07-11 06:04:42'),
(4, 'Testrunde', NULL, '0000-00-00', '2022-09-08', '2022-09-09', '2022-09-12', 20, 0, 0, 0, 0, '2022-09-07 07:08:44', '2022-09-07 07:17:06', '2022-09-07 07:17:06'),
(5, 'testrunde', NULL, '0000-00-00', '2022-09-09', '2022-10-01', '2022-10-31', 20, 0, 0, 0, 0, '2022-09-07 07:17:33', '2022-09-07 07:17:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `round_user`
--

CREATE TABLE `round_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `round_id` bigint UNSIGNED NOT NULL,
  `wishes` int NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4CKRQvWrhMCAyX5EHwTpY7u7LYF86B8HedYNDgcC', NULL, '172.18.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/109.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQnN3eDJiODhWQWFjaWtrTk9wUWtyN1RQTzRYa2lMMTdkaXg1aDZGdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovL2xvY2FsaG9zdC9hZG1pbi9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMjoiaHR0cDovL2xvY2FsaG9zdC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1674348969);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `is_admin`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Takhir Berdyiev', 'takhir.berdyiev@gmail.com', '2022-07-07 09:02:52', '$2y$10$Hbzgmb3jlAQzo4MJ0DLcgujENtEm5iHlWiIW0/lvm.XWOSNKpTJJK', NULL, NULL, 'VWaTVQIk4t5mnIabSTzmfFDdifdCYq7O57OZvhsksYMNuO7RQVkI351MhXgf', 1, NULL, NULL, '2022-07-07 09:02:52', '2022-07-07 09:02:52', 1, NULL),
(2, 'Administrator', 'frank@designrus.dk', '2022-07-07 09:02:52', '$2y$10$u4Rwe2br2x0wjdtA33FFPOsPVqfe1g/VFI1W6c2XAUV//rWuQAuKm', NULL, NULL, '8N30ABntL6lw8yGBSbWGTWeS5P5HwqCu7okE20YDryccVzgrjSKefB4PvoyE', 1, NULL, NULL, '2022-07-07 09:02:52', '2022-07-19 10:54:37', 1, NULL),
(3, 'Stockholder', 'stockholder@email.com', '2022-07-07 09:02:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'fpFreecK9B', 0, NULL, NULL, '2022-07-07 09:02:52', '2022-07-07 09:02:52', 1, NULL),
(4, 'Josefine Bak', 'jmb@investeringog.dk', NULL, '$2y$10$0ZcTQuz0Oa6x0T8OMQoLFeBD3fc92.To6AXTzXihsM8yXY4e6BIEO', NULL, NULL, '6gURuN1OK1tL63AF2ZHhXcSx8CEbv3lBKPdV9DT49lSpjhsCP3kKzPhhYrT4', 1, NULL, NULL, '2022-07-07 10:10:07', '2022-07-07 10:10:07', 1, NULL),
(5, 'frank2', 'frank2@designrus.dk', NULL, '$2y$10$9MLuF4Oer4F8.1YQbbXRm.3.hV5P0WXIC2W9OSi/O7Il.JustRY9y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:11:32', '2022-07-07 10:11:32', 1, NULL),
(6, 'frank3', 'frank3@designrus.dk', NULL, '$2y$10$IT8zZChopLlHApWDUA5jPOMOcRlnkJybkGsosKk9c2ijniZh.YSm.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:11:54', '2022-07-07 10:11:54', 1, NULL),
(7, 'frank4', 'frank4@designrus.dk', NULL, '$2y$10$x8mGeDAq/L/fGBoyljXAYunn65LqtBa0AL1B7PZEvQm7EBx1tqBdi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:12:08', '2022-07-07 10:12:08', 1, NULL),
(8, 'frank5', 'frank5@designrus.dk', NULL, '$2y$10$usI1dNYDWfxkavRQlAOkKOAGIXSR/ndYzGCTbqn.MmO2W017cu02G', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:12:23', '2022-07-07 10:12:23', 1, NULL),
(9, 'frank6', 'frank6@designrus.dk', NULL, '$2y$10$LCmKByqDxi22RG6PJhVafOXwcOUWGxugRhF7GEnePHxyruqbicKWm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:14:36', '2022-07-07 10:14:36', 1, NULL),
(10, 'frank7', 'frank7@designrus.dk', NULL, '$2y$10$FhPEy2KgUUnaVqnDIwYTVeZxQ6BsGpK5OAVsfoc806urAaVuKxTkO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:15:28', '2022-07-07 10:15:28', 1, NULL),
(11, 'XTishka', 'xtishka@email.com', NULL, '$2y$10$CV9dpELK.8y..dSvDOWHfuiemsWPJy.LMG.JtnK167IjjiFGYU8GK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:28:07', '2022-07-07 10:28:07', 1, NULL),
(12, 'frank8', 'frank8@designrus.dk', NULL, '$2y$10$pjxo.5SNI22mBNrqRY8c9ua3lA55vSbIw7E3lu8qNs.9v7CB00Jn.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 10:50:38', '2022-07-07 10:50:38', 1, NULL),
(13, 'aevle baevle', 'ffff@fff.dk', NULL, '$2y$10$XFkiNM6cdsxdixKGdpZbr.V2l4wtMQe6ritdOefntzZ1hw1orv8SK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 12:25:32', '2022-07-07 12:25:32', 1, NULL),
(14, 'Emilie Vorager', 'Emvo@investeringog.dk', NULL, '$2y$10$YMQMychyzzpnXm3XEntQXeGpJjalh8k4qwf/KSxIv4LRA268d9eKq', NULL, NULL, 'NWrjlcs0hvRrgRB3fZmyFFGqYHHf5lOW7LcIhEewAzCS3ZolXSqqmTZCwnvV', 0, NULL, NULL, '2022-07-07 12:27:07', '2022-07-15 09:54:06', 1, NULL),
(15, 'Mathias Svinth', 'mathias.svinth@gmail.com', NULL, '$2y$10$vrvFJDOtpxz8htzdKp2LHuK30WsErAHamnd2SKcF86I/mhvuxvlxC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 12:27:08', '2022-07-07 12:27:08', 1, NULL),
(16, 'Mathias Svinth', 'mhs@investeringog.dk', NULL, '$2y$10$t35FehsErGOMxKD2QQvr6.xJtNbV8s26Gf2LtnbVe41id.ZZTvVee', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 12:27:08', '2022-07-07 12:27:08', 1, NULL),
(17, 'Josefine Bak', 'josefinebuschardt@hotmail.com', NULL, '$2y$10$pvTJRynNvzRJtxFkssoKqe6JhyWHeekx67ZMLwvuCE/MqMmZZGUEq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 12:27:08', '2022-07-07 12:27:08', 1, NULL),
(18, 'Vibeke Espedal', 'vwe@investeringog.dk', NULL, '$2y$10$GHfn3gipNG1.KEcp8HJt3.h3X5KPTcyNRddkS.8tDuQtHgbGEKWEC', NULL, NULL, 'LmNm2i1tFGxWnEaFQgx85AeYHYPpSnBXsKAlrguFkya2ZxRisIhgAPuIHZ7P', 0, NULL, NULL, '2022-07-07 12:27:08', '2022-07-07 12:27:08', 1, NULL),
(19, 'Bjarke Wolmar', 'mbw@pc.dk', NULL, '$2y$10$TRcDkslWUdQQ8lhGJXBgEe41fFrEMEAB3TpDDATvkMjrI1UZ634Ua', NULL, NULL, 'T1lHpH4zK4kAxTJ3t0sxrBhM5Dc8BV4M6O1Gw52kowF5RnvgSydnCeRMDaQP', 0, NULL, NULL, '2022-07-08 06:33:48', '2022-07-08 06:33:48', 1, NULL),
(85, 'Jeanette og Niels Antvorskov', 'Hammel@webspeed.dk', NULL, '$2y$10$Em2fyqMGrB4UXPtXn3Wc9.hMJph5MFGc3M3D4DqHMTQdHqMgsDVby', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:36', '2022-07-11 09:36:36', 1, NULL),
(86, 'Kasper Vindahl Roth', 'k.v.roth@gmail.com', NULL, '$2y$10$2eb3Wj1ryWfd.A8hcbs1dux3iNOFcD0cfE17asH7LRHsvWfkT1Tnm', NULL, NULL, 'Y2TihSDAAAtSsXfsIrIN6UFWgOHcgQ5qZgvXw6FevJo2bhSacSWVdzNqAsbq', 0, NULL, NULL, '2022-07-11 09:36:37', '2022-07-11 09:36:37', 1, NULL),
(87, 'Anette Damgaard & Joergen Aldrich', 'aldrich@live.dk', NULL, '$2y$10$Ueb8B52T38uWPD329nSJyu6ukAn3kfqdbWqwRsNaaJypxmHbmGDFa', NULL, NULL, 'K9XaFw64D0LFt7n2a97d2VHKtdyeM096rMQ18PdjQ40pps8UHdkTHT5eHMYg', 0, NULL, NULL, '2022-07-11 09:36:37', '2022-12-19 12:33:25', 1, NULL),
(88, 'Investering og Ejendomme ApS', 'bw@investeringog.dk', NULL, '$2y$10$fnALu3vjrRKf1dxbCTQGiOnYU6Bl04MZrIqK1wK6d/AWPXy9Uo182', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:37', '2022-07-11 09:36:37', 1, NULL),
(89, 'Hurricane Invest (Mikael Vest)', 'vest@vinderstrategi.dk', NULL, '$2y$10$doPtOrT0GeBidddqLJDKp.IhkzRrT4A7Chq5W8UI0.8QqLQk9XJy.', NULL, NULL, 'GySAdqmhIaRtLRa7Px8qvJ1XQ20Slq2Uo0PWYYESHQFDU8ygMhmo919CUuuS', 0, NULL, NULL, '2022-07-11 09:36:37', '2022-07-22 06:50:13', 1, NULL),
(90, 'Up Holding 2007 ApS (Kim Bisgaard)', 'kb@bisgaardplus.dk', NULL, '$2y$10$uk58cTuzRZL/AejJOptmgOyDsNnSfqRPn2p3dpkSBICGLDDXKj.wK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:37', '2022-07-11 09:36:37', 1, NULL),
(91, 'MDS Software & Invest ApS (Michael Dam Soerensen)', 'bolig@midaso.dk', NULL, '$2y$10$aw6P/.S9.FF3DzqWrUHSquROKOHicEWyALDnzq4eP9UDVOmJDskoS', NULL, NULL, 'BpjmpDRPcSe8vcVGacLLMhbaMpEh1qT5uNhfPkvotBcbgirTwRkdE4qYLJss', 0, NULL, NULL, '2022-07-11 09:36:38', '2022-08-14 14:31:29', 1, NULL),
(92, 'Tine Skak Nielsen og Lars Aakerlund', 'tineskaknielsen@gmail.com', NULL, '$2y$10$kCSan0Yu9t0etQC.S.Zko.hweLjQfXse5SlQM4r.HM9NZn.RcAwFi', NULL, NULL, 'Am2kbzwNl6zkdJjIkjeXkPAq5R3Hyp9zzw8swXDzod1iZiqztHiuMdBitmCD', 0, NULL, NULL, '2022-07-11 09:36:38', '2022-07-20 09:39:57', 1, NULL),
(93, 'Bjvo ApS (Bjarne Vognsen)', 'Bjarne@vognsenviborg.dk', NULL, '$2y$10$vLdJB6qjLWxH2ZzztPiXm.9JkrKqUVbsNrU5meH3clbzxgbluF3.a', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:38', '2022-07-11 09:36:38', 1, NULL),
(94, 'Fall Invest ApS (Leif Jensen)', 'leif@jensen.mail.dk', NULL, '$2y$10$hWMVik2JDBXC0KjlEXwvXORF46q.S4GKDJ36zyGunglVZ8CRzRkz6', NULL, NULL, 'IchUcaO9pYcBLSnFBh7GaMTnvpOQcQhSxM6S2zUp3Z85UrItuz697BeKovR5', 0, NULL, NULL, '2022-07-11 09:36:38', '2022-08-02 06:28:02', 1, NULL),
(95, 'Thomas Moeller Bjoerkhof', 'birthe.thomas@gmail.com', NULL, '$2y$10$Fq9y9CUs4G.oLd1BCVwo3.HEXCAt7txL423rSZvdyBseM3LrSsYGq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:39', '2022-07-11 09:46:29', 1, NULL),
(96, 'Claus Wolder Kjaer Thomsen', 'ct@united5.dk', NULL, '$2y$10$sPVFJSMHcCVdBzZS4BfdSeoeU7gz1Gb7L2fDXULYDlEnecTOE0ZMa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:39', '2022-07-11 09:46:29', 1, NULL),
(97, 'Craith Holding Aps (Christian Raith)', 'craith@gmail.com', NULL, '$2y$10$8ksO62BzTshUiRue1toPz.fYwE/PoFkn6K0IPG6oT.I.JJ7JhW2RC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:39', '2022-07-11 09:36:39', 1, NULL),
(98, 'Terkelsen Holding Aps (Per Terkelsen)', 'pt.720@edc.dk', NULL, '$2y$10$VNtWJavsTHvEZL0wbYn.ge2qwEzIEZtRVh0Zdlwxn4ygjCaI3ulNO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:39', '2022-07-11 09:36:39', 1, NULL),
(99, 'JBECH Holding ApS (John Bech)', 'john@jbee.dk', NULL, '$2y$10$Uqg4ZWQl7kJPlhNXe6nmX.hYvWRUF1hjHBVNhzn5ckarfwGeOqQ8O', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:39', '2022-07-11 09:36:39', 1, NULL),
(100, 'Peter Gadeberg', 'petergadeberg@yahoo.com', NULL, '$2y$10$ZglWAUBY7AKHI2JWaGNqi.3nNi4BTVuJjCQBfKMblqeyU2FvcnSCu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:40', '2022-07-11 09:36:40', 1, NULL),
(101, 'Kristian Noerup', 'Kristiannoerup@gmail.com', NULL, '$2y$10$FGEQuC81Ch0SHWhzEqC3RO5ax9/3iARlANskn6Wf6zhTWOcymsDbq', NULL, NULL, 'iYD0oRHsiNgtp3CKBXMrYNyRjhb8tYqrgTe1cKSCdA7Hpo6G6B16stUN9xkd', 0, NULL, NULL, '2022-07-11 09:36:40', '2022-07-11 10:09:16', 1, NULL),
(102, 'Stig Rosell og Malgorzata Tekla Rosell', 'tekla60@gmail.com', NULL, '$2y$10$MHMtOFaEHYsihs6Texs2L.L6SAQGJ8pJxTWK7s0mPSBdiDgi.nkYi', NULL, NULL, '47Z9bo5VLj3ZjzHBFbx6Ur5GGEgkMYwToHgeVNKeMAqtXA8xm8FZYKSlMiKL', 0, NULL, NULL, '2022-07-11 09:36:40', '2022-08-06 14:27:41', 1, NULL),
(103, 'Thomas Ulstrup', 't_ulstrup@hotmail.com', NULL, '$2y$10$AwglM6Kgj6uExVHF4wcSAOJ8cvYuVoEpKQjI9SVw29Y6dbH5v1uAy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:40', '2022-07-11 09:36:40', 1, NULL),
(104, 'Carsten Danielsen', 'cada@privat.dk', NULL, '$2y$10$OqHh4xmeUDZ7Cj2Wjvmtu.HBqH5BPdTfDO92RnG5ofEqAbLHg6ZuW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:40', '2022-07-11 09:36:40', 1, NULL),
(105, 'Helle og Soeren Nielsen', 'hln_sn@icloud.com', NULL, '$2y$10$Vdd0AWMV35zcqpP/x/tjjeVY3yKzwh9UXVM6vR0NvKgCSQ1XgRt.O', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:41', '2022-07-11 09:46:30', 1, NULL),
(106, 'Lars Elkjaer Invest Aps (Lars Elkjaer)', 'larse@post8.tele.dk', NULL, '$2y$10$Hy88IPM8coIRdm8kZjwy3u0.IngV8GQfMJzLqK3N8hZ.yivlcxQue', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:41', '2022-07-11 09:46:30', 1, NULL),
(107, 'Iben og Soeren Friismose Jensen', 'friismose.jensen@gmail.com', NULL, '$2y$10$xyWRkrFGwm3oxlu4xJ/BZe0WnysNE.wJk.Ky3ovYI9YvOz2/QM1HG', NULL, NULL, '7zGU39KU4wHfzj17N6pNsxIHEdwn7caVRE730Cqwr9ElBUfRaED1MfcoQlPP', 0, NULL, NULL, '2022-07-11 09:36:41', '2022-07-19 13:15:51', 1, NULL),
(108, 'Helle Margrethe og Peter Damgaard Olsen', 'hellemargretheolsen@yahoo.com', NULL, '$2y$10$DicCICGc.vG5JfqVA2zgXeLs/Vm5hjLpp7h50YvGZq9cU6ZnWtIti', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:41', '2022-07-11 09:36:41', 1, NULL),
(109, 'Carsten Larsen', 'cogc@hyldemor3a.dk', NULL, '$2y$10$i4uuQPV9hWi8M08mjQXZL.JYT5iOoi0yQVkErGXyz48DhtrUC7HOS', NULL, NULL, 'tQdWeuUZSl3CKbg1BqlMF6NR6XHrwAiszsTegRrGwaOqV4MIrVJRtziZDi3o', 0, NULL, NULL, '2022-07-11 09:36:41', '2022-07-11 10:26:43', 1, NULL),
(110, 'Peter Skyttegaard', 'p.skyttegaard15@gmail.com', NULL, '$2y$10$KdoYDbB4iuJGjMO7Y376v.NKe2W95WDTxgctVxtoneCPyJDnrNSXW', NULL, NULL, 'UBRZNgi3N3qXm2WM7iysbAwJLSlHodSfhr5QQVZ6aM7TEIhYyJSh5mQRzqik', 0, NULL, NULL, '2022-07-11 09:36:42', '2022-07-20 10:30:44', 1, NULL),
(111, 'Jens Sandal', 'jensvsandal@gmail.com', NULL, '$2y$10$qybu6920kYyex3MOG0DQ8ObNDmrLUaFFMgxCPhc94UMHUtfeUeheq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:42', '2022-07-11 09:36:42', 1, NULL),
(112, 'Lene Thomsen', 'lt@intenzion.dk', NULL, '$2y$10$9Cs25nGy22/pU6JvVw5NEO8ENLR9zJ1964WlTuQ3T1PLsSu0Rzwzu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:42', '2022-07-11 09:36:42', 1, NULL),
(113, 'Anders Oluf Kragh', 'aokragh@zoho.eu', NULL, '$2y$10$AE3NB8o50go05c7GBVzG3O72Es9h0dvbq1qh.eHFVvBPGCbJ0iMTO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:42', '2022-07-11 09:36:42', 1, NULL),
(114, 'Joergen Jensen', 'joergen1130jensen@msn.com', NULL, '$2y$10$HDvorI2fRe.ZJNFo7HNecufI509smfH02YDdcXzkgh/z0B0beTChq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:42', '2022-07-11 09:46:31', 1, NULL),
(115, 'Carsten og Pia Hansen', 'fam.hansen@privat.dk', NULL, '$2y$10$AN.TwmUpEPwYGmcVjw30IebU61dKTjbuwGriKn4onsInLBRBct5ta', NULL, NULL, 'EFvrTJqlrbnD7pH6Mr7hlzPsmdtRbJFFjLqpFVSldVDqm8zmucN2KQ5J8GW3', 0, NULL, NULL, '2022-07-11 09:36:43', '2022-07-27 06:51:48', 1, NULL),
(116, 'JN Invest ApS (Jesper Noesgaard)', 'noesgaard.kolding@gmail.com', NULL, '$2y$10$Bc94LPpAmq3zgKvTUSrFQOXJEsQMcSQ3jE05K703QdkxmQjJirc5a', NULL, NULL, 'DzPtAiEgEjaDHmN4Nkb5Iwp2QfX5OKubLJODXfPtRNEfqf6vQMC1BAp95Bqb', 0, NULL, NULL, '2022-07-11 09:36:43', '2022-07-23 11:29:35', 1, NULL),
(117, 'Anders Hartelius Haaning', 'ah@aning.dk', NULL, '$2y$10$geqz4UyXlSuJi/zbl8gH9OzaYGnwFL/J7sr03LAl42WGuIcOrDO42', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:43', '2022-07-11 09:36:43', 1, NULL),
(118, 'Kristine Rud Pedersen', 'rud.pedersen@doceo.dk', NULL, '$2y$10$2ffAWFuZYTSMfCUzaTu/E.cB/Q64R6lJwdUFR8nndFcFYbXIyRzuu', NULL, NULL, 'h2In7iloHooFfiIe5O0xDfKkCDzAdDDLykaxpdimAvxqKz72gIP2Rb5W3Kvd', 0, NULL, NULL, '2022-07-11 09:36:43', '2022-08-11 14:55:18', 1, NULL),
(119, 'BV consult APS (Bo Vestergaard)', 'bo.vestergaard@implevista.com', NULL, '$2y$10$WyWxS0alOgtkk6Hk87qVfuo0GETdy1OhREGIiDEnSPlSXhd0zz5Qe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:43', '2022-07-11 09:36:43', 1, NULL),
(120, 'Lauge Borg Holding Aps (Lauge Borg)', 'lauge.borg@borgit.com', NULL, '$2y$10$2y96Hz2NUAFw8eXi6PKevOEZHI.S7u.HQYtS5ax5TCIrIWX99/JQ6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:44', '2022-07-11 09:36:44', 1, NULL),
(121, 'Finn Leegaard', 'Finnleegaard27@gmail.com', NULL, '$2y$10$.IaftoiRPjgKU8Mljb6x3OVhtNi0IiZs5iSO0WhFwsODjcMZ8A4Ye', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:44', '2022-07-11 09:36:44', 1, NULL),
(122, 'Miam Nygaard', 'nygaardmiam@gmail.com', NULL, '$2y$10$.1p63SSrL7pFqX17DkkdA.L39n3F1RhRuZmqOU3DZxFaVx11PMgfe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:44', '2022-07-11 09:36:44', 1, NULL),
(123, 'Aksel Gruelund Soerensen & Puk Lundgaard Soerensen', 'ags@skfr.dk', NULL, '$2y$10$zWmSLIVRquEZtBDddflafe4/9Envbs.IkFr9/RL.TFNdzABhbocwm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:44', '2022-07-11 09:46:32', 1, NULL),
(124, 'Bjarne Nielsen', 'bjarne64@outlook.dk', NULL, '$2y$10$kHI2lApSXt7vObHVnsL9ReP8G6PU1mbG00XxFyP9PJ/Gm4IMmOYJC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:44', '2022-07-11 09:36:44', 1, NULL),
(125, 'Carsten Schouboe', 'carsten.schouboe@gmail.com', NULL, '$2y$10$sXGaxsq4cQXtQC0.4BtFneJtgAf42fd48PvFJi3Kl02JJULNvSuy.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:45', '2022-07-11 09:36:45', 1, NULL),
(126, 'Erik B. Madsen', 'erik@innovadent.dk', NULL, '$2y$10$XXAU6XatoSOmY7r2JefODeJmFqcJqV81j3.zW9RIhHUUuhRXU/LkS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:45', '2022-07-11 09:36:45', 1, NULL),
(127, 'Reves Invest ApS (Mads Birke Reves)', 'mads_reves@hotmail.com', NULL, '$2y$10$cgzXlLPzeuJzAlf.CJRHm.NIn1IA5h54qiO/K5wtotr7s.5mcLAui', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:45', '2022-07-11 09:36:45', 1, NULL),
(128, 'Warncke Holding ApS (Anders Warncke)', 'awarncke@gmail.com', NULL, '$2y$10$Evpz92mEIpxJFIss4C890.pbxGrOwjwmOk8bVFcGq32gCwHDDY3dm', NULL, NULL, 'z5HfEWgxHNNt9Z6punemhfMWapKd2fG9xZokq0UCunUgYe4tyhsfb8qOmY6O', 0, NULL, NULL, '2022-07-11 09:36:45', '2022-07-26 13:18:52', 1, NULL),
(129, 'Helle og Bjoern Verwohlt', 'b.verwohlt@gmail.com', NULL, '$2y$10$dGQMtak2bYhAO/ptQDOnDumeHNo2bWLyC4324JO9v2vkGCYQfcWNm', NULL, NULL, 'ju5QKD2tT41DEMVnslj36QWQC3QYsR6CzvXfYDcjzZkWGZB6K6VPVbJ5J6LD', 0, NULL, NULL, '2022-07-11 09:36:45', '2022-07-11 09:46:32', 1, NULL),
(130, 'Anders Broedsgaard', 'anders@broedsgaard.com', NULL, '$2y$10$D8Y3EykgI9x0QT36sTqNlufSgARrK6Xh0ussWqUbp6301xycBCnau', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:46', '2022-07-11 09:46:33', 1, NULL),
(131, 'Claus Pedersen', 'oychp@msn.com', NULL, '$2y$10$zEIkiHUwErJGiQFTioubPePTdRkn7YfRi0iZgkcyodYS/yW3SxDo.', NULL, NULL, 'Hv6kF5uRCJuHwt8idg2YWXiOsOFFRXtc43LChjqRdO2c1gMCajXjXyXRyBFj', 0, NULL, NULL, '2022-07-11 09:36:46', '2022-07-11 09:36:46', 1, NULL),
(132, 'Klaus Munk Ulrich og Marlene Christiansen', 'Klausmunkulrich@icloud.com', NULL, '$2y$10$k6oOKEv/mtJzg3S1o1UuaedWyZT5KHZLZVewh59neJrowgxWvQ2kO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:46', '2022-07-11 09:36:46', 1, NULL),
(133, 'OT Bolig og Erhvervsudlejning Aps (Ole Terkelsen)', 'Ole@otbolig.dk', NULL, '$2y$10$I.q.gTX7M/aCE3MIv.QaEu34TM2d/06.xSRoOUe7VxcPsoH8PHG9y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:46', '2022-07-11 09:36:46', 1, NULL),
(134, 'Tue-C Holding Aps (Svend Tue Christensen)', 'svendtue@gmail.com', NULL, '$2y$10$UVMW16SUcAa4Xi6jQPNm5eLbfLMetb7gzefJ5wPBixK0KkQfb3vR2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:46', '2022-07-11 09:36:46', 1, NULL),
(135, 'Vibeke Othmar Poulsen og Bo Buchholzer', 'Vibeke.poulsen@gmail.com', NULL, '$2y$10$sObthnOvT2Wt51FN59q54.rfb/E470r7QFieVZ4xZe8exclJcN1tC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:47', '2022-07-11 09:36:47', 1, NULL),
(136, 'Winnie Bukkjaer', 'bukkjaer@gmail.com', NULL, '$2y$10$Cr3bCYid/LSXtyqrRaN5xequRGlyo.mH.aa78DCqci9c6q2wNizHG', NULL, NULL, 'iCNpnCWL0B4TZEDctYRsZkYtO7JUJOksHxgcCwgGaU4FVXWZWF9zYYxFDFrE', 0, NULL, NULL, '2022-07-11 09:36:47', '2022-07-15 16:05:37', 1, NULL),
(137, 'Jette Knudsen', 'knudsen.inc@image.dk', NULL, '$2y$10$Vem72COlLEXG5JnW4OsT4O.iddV7NK5LyRs18YYhuK5UyN20/jB/2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:47', '2022-07-11 09:36:47', 1, NULL),
(138, 'Leif Vejbaek', 'leifvejbaek@gmail.com', NULL, '$2y$10$3XN0u7.XlVAp09Vt28osGeYETfPoS4ZopUVwkuI1vjmHc51SEy.cC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:47', '2022-07-11 09:46:33', 1, NULL),
(139, 'Merete og Klaus Bohse', 'klbo@dsb.dk', NULL, '$2y$10$J3K48ixmtpjacjvbSkqJ8ulzDpmTldFp0kYyGJtIYb4m9Rd8n8nv.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:47', '2022-07-11 09:36:47', 1, NULL),
(140, 'Anders Klamer', 'klamer@youmail.dk', NULL, '$2y$10$wufYMcIJU6HCfH3nRUSVGeyabC7dN/tECr8MGaFwmI4.pH4DVO8Zq', NULL, NULL, 'QUlOm0EYqLW8XY4nv4A37FfAgTA0WQrfqRriSC1d0iguSycGjfPS5LCThKdL', 0, NULL, NULL, '2022-07-11 09:36:48', '2022-07-21 13:42:57', 1, NULL),
(141, 'Anette Stoevring Pedersen og Gerhard Grubb Waaentz', 'Gwaaentz@hotmail.com', NULL, '$2y$10$z0eWZdYycVShgZCPjVH6zOOsQXIxm6lluBYCmLHTAHHyIi81eZDqu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:48', '2022-07-11 09:46:33', 1, NULL),
(142, 'Bo Telen Andersen Holding ApS (Bo Telen Andersen)', 'bta@itoptimiser.com', NULL, '$2y$10$rN9ppM21nhb3WPXyw1LwT.C4aI0gzxTaDoN6FQRkgyRvLTtE9XWOi', NULL, NULL, 'XwJfnzLzJrDKwh6ZI8HHWqtG4uw5bKPCY3ArktsiYtaX6TqqyFnIjENHOxWz', 0, NULL, NULL, '2022-07-11 09:36:49', '2022-10-02 09:01:57', 1, NULL),
(143, 'Daperi Holding ApS (Per Mortensen)', 'per@brandfarm.dk', NULL, '$2y$10$AtDP4qjg1B0uye5.DDS00u8GqX8lLGGGmFDZhZdQVivUThIXB2Mkm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:49', '2022-07-11 09:36:49', 1, NULL),
(144, 'Jette og Poul Wiborg', 'wiborg@gefiber.dk', NULL, '$2y$10$mqtXqcIgzz8o2/Q2nbDlcOZ8vdmwFJub2Bg8FnOylwZN/eX9jXjWa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:49', '2022-07-11 09:36:49', 1, NULL),
(145, 'Julie Boberg og Morten Boberg Larsen', 'julieboberg@hotmail.com', NULL, '$2y$10$BUUOID68jvZFeiK8Lby/LOdW37RLXSnZInRcW/.G8/MgnYYPTP4S2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:49', '2022-07-11 09:36:49', 1, NULL),
(146, 'Thomas Larsen', 'tsl_dk@yahoo.dk', NULL, '$2y$10$uaSdmaK6VbXaefmPMsN62eeGMbxWKCQpP2N7IJlwsHasKCs8b0Gne', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:50', '2022-07-11 09:36:50', 1, NULL),
(147, 'Jesper Toftlund', 'jespertoftlund@gmail.com', NULL, '$2y$10$A64N35ObHHD3HwdQE74VH.fxuHh71bO1gmKBcqAK8bwz3LJ.4Xazq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:50', '2022-07-11 09:36:50', 1, NULL),
(148, 'Ilona Stappen og Joergen Voigt', 'joergen.voigt@gmail.com', NULL, '$2y$10$YsjxoJO.rU9b8cDxd3dWhuojDc69CPZ6iOgqHcB8fY.3XNlXKxwe.', NULL, NULL, 'VvxQWkqyUxqNxVkDwMNUQIVLnnhHBG4zxn5hIP5UfXgSY76LoPuh9lcSw2RS', 0, NULL, NULL, '2022-07-11 09:36:50', '2022-07-25 02:53:51', 1, NULL),
(149, 'JF Holding Koebenhavn ApS (Lone og Jan Frederiksen)', 'lonerye57@gmail.com', NULL, '$2y$10$yiZ2YzSQnPcuD7Wr1gx3UedUbKxv7qmEz62W9QTbU3Z0Zw8cgThSW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:50', '2022-07-11 09:46:34', 1, NULL),
(150, 'Susanne E. Sloth og Thomas Larsen', 'tlsu@hotmail.com', NULL, '$2y$10$ikF0s69JMXL5xZAQdRbku.WejwPCtFFR63KDMyrmu2R8hz1gfCTrK', NULL, NULL, 'JVl0LuQMgaULcYhP2fi7NY3moGDQKtiBBwoiHGaVVkJdMquLOo4YQZttZJqO', 0, NULL, NULL, '2022-07-11 09:36:51', '2022-07-11 09:36:51', 1, NULL),
(151, 'Allan Clausen', 'allan.clausen@stofanet.dk', NULL, '$2y$10$WKzO3Hhf8nt9eiFIVrvFZOkYfYf.t1yUIVYj/QWfOsu0dfwuCW.g6', NULL, NULL, 'DIlLhdn1hFzQTfsHgKABdViVYU3pkR0CH489fqeUAdiVrbZxEMHRx3vhvMqJ', 0, NULL, NULL, '2022-07-11 09:36:51', '2022-07-11 09:36:51', 1, NULL),
(152, 'Soeren Larsen', '2400slarsen@gmail.com', NULL, '$2y$10$ySGtbrdY2uz7bg184FzA7ONQe2f33oNMsR1rRBgZsVGwI9TtX9Unm', NULL, NULL, 'TJywfzOTUI3tR0NOxfPYMahHbKqgi9XyuT3p8lI0RLQLwMHmMjc2Ou04X9Rs', 0, NULL, NULL, '2022-07-11 09:36:51', '2022-07-22 11:41:48', 1, NULL),
(153, 'Wiuff Holding ApS (Anders Kofoed)', 'akw@eaea.dk', NULL, '$2y$10$n0rvZ2y6QUmddptHtmzXB.gqsha0G9tWTASwJwQ8QKXY26c9v9rxa', NULL, NULL, 'XNk7yoyGtRtLAcp940krF5vN0B69l359LkU2VQVsSxOJUhO3OoFpEoeCn1yX', 0, NULL, NULL, '2022-07-11 09:36:51', '2022-07-31 08:17:08', 1, NULL),
(154, 'Henriette Hoey Madsen og Carsten Myllerup Madsen', 'fam.myllerup@gmail.com', NULL, '$2y$10$DZ/t1Q7j1GhMyJkTI3b7k.fDFejrPk/hEPNUz/3MiNnlEEm8.Mt3i', NULL, NULL, 'KvITj7UbeqO7orMUq1lwxFadn5ZAbZ1WTA96lSWzRbk3FZE4jUwpCKAwAq3G', 0, NULL, NULL, '2022-07-11 09:36:52', '2022-07-11 09:46:35', 1, NULL),
(155, 'Soeren Pedersen', 'sp@gope.dk', NULL, '$2y$10$mD29oLTDvBnwEyQ0L9bba.bhsKMHn6plzV2H3aIpcjUn4xnPtrJrq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:52', '2022-07-11 09:46:35', 1, NULL),
(156, 'Ingelise Andersen', 'ia.ingeliseandersen@gmail.com', NULL, '$2y$10$UIZqV1eMxS8BkzO3nN8qieOkQX6hb3WrFRX8EB5XYQ5CbBcR14xU6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:52', '2022-07-11 09:36:52', 1, NULL),
(157, 'Vesters Holding ApS (Jens Vestergaard)', 'jens@eurowagon.dk', NULL, '$2y$10$1fc7bgZlCHTIt./OKxsxMukzEkZaXReHcqsl6pyIQ7ajZjX5HRvUm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:52', '2022-07-11 09:36:52', 1, NULL),
(158, 'Moelby Holding ApS (Niels Sandbaek Moelby)', 'niels@hr-molby.dk', NULL, '$2y$10$9mDm4RIRCyFMZfdEAj94WOaDHKn5fVM9SWXrXJeuI976WypEql0Cu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:52', '2022-07-11 09:46:35', 1, NULL),
(159, 'Bjarne Schlager & Lise Pedersen', 'bsla@me.com', NULL, '$2y$10$ZIg.QzMSHUF8nFkzhRE0JuERM5n4u8eHU/KQe87E9DyA7wkZOxP.2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:53', '2022-07-11 10:05:15', 1, NULL),
(160, 'Jannik Moestrup', 'jannik.moestrup@gmail.com', NULL, '$2y$10$ONezE/rPQqLIb2TkjojZouJbySuUSW/ctZiWHVTD/bhnu1oBoTBZ6', NULL, NULL, 'SDTcIJ1tE4SSYMMrGOjsKvnfG0pMwgyb23plWf2cqdtnpFQmP8sOGaMdCBbu', 0, NULL, NULL, '2022-07-11 09:36:53', '2022-08-05 13:07:35', 1, NULL),
(161, 'Solo Salami ApS (Lars Thygsen)', 'lt71@live.dk', NULL, '$2y$10$KgIbFZ2TESzpBzITxN3FW.Hs.O8T95EjXDrYjrM.kJMBCND2vxexO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:53', '2022-07-11 09:36:53', 1, NULL),
(162, 'Henrik Arnfred', 'ha@i-t.dk', NULL, '$2y$10$ps.4Y2ITKACAhPeC5d1MteGaFPca3bj5CUWlJx8a7XbHn.XtQZkwW', NULL, NULL, 'RjJO4H5lFNp391U21ZmEx3EkdtgSGDVY4W5747n5RwEJiWAAGyjzm4IEWFcK', 0, NULL, NULL, '2022-07-11 09:36:53', '2022-07-11 09:36:53', 1, NULL),
(163, 'Stella Boejden og Bent Boejden', 'stella.boejden@gmail.com', NULL, '$2y$10$cgyDuaEN3t07Vk3GBW3QQ.p/iBiTDqjhXyZFKqrvYWbVLrWlDqRXu', NULL, NULL, 'ToEEZUSNEDOJJ13qAnN3eMjQeKxM5242rFRHaMO8kOXpIs7fGh1Q7cR1f85s', 0, NULL, NULL, '2022-07-11 09:36:54', '2022-07-28 06:06:18', 1, NULL),
(164, 'SGJ Holding ApS (Soeren Brandt Jansen)', 'schous1737@gmail.com', NULL, '$2y$10$QHq7mWvAeBISu/wji4I9X.AuMVwiPxSVJ2dJf.UPm8V5HAqT3wm02', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:54', '2022-07-11 09:46:36', 1, NULL),
(165, 'Peder og Irene Pedersen', 'pestpe@icloud.com', NULL, '$2y$10$Dj2rzfGOrwiDhfhahmDJYOwCgTTDWaPKG6QFuR3Ph7BCSE6IQEDKi', NULL, NULL, '2cG7hIBKWz45G3kG7Qox0afVHyoM95MnW8FnCyR1Vq6tHJx3xjzwndRJ1SA2', 0, NULL, NULL, '2022-07-11 09:36:54', '2022-07-11 09:36:54', 1, NULL),
(166, 'Lars Prominczl', 'lars.prominczl@gmail.com', NULL, '$2y$10$nyY.iescvb2ckpPFEbarweHSLz6ASI36fNoq9hwF1FPz2wFZ4iz2K', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:54', '2022-07-11 09:36:54', 1, NULL),
(167, 'Martin Olesen og Stine Aistrup Juul', 'mqo2003@gmail.com', NULL, '$2y$10$z2TEFx1DJhep7Y4Hi5Vi5ecP2gt/xgxUe5cnywGNfAwqoIJrN0z6e', NULL, NULL, 'o7BH3gQIVPTTBmQmjWmlbLF408sh0QxRrrv1tGYY7kR67HJtVqEinAiZmj06', 0, NULL, NULL, '2022-07-11 09:36:55', '2022-07-11 09:36:55', 1, NULL),
(168, 'Susanne Andersen og Nicolaj Nielsen', 'suandersen55@gmail.com', NULL, '$2y$10$8Y60GQMLw5EQBSgcm8siUucNrRsnP5IJ5nTBTuf.jsnd36i7sxeeu', NULL, NULL, 'Cb06bXGYgpoDB7pPPpyZGY7A2ftI3v1YlXxf3D4PwrJTK213RdAzmstPyewT', 0, NULL, NULL, '2022-07-11 09:36:55', '2022-08-12 17:27:49', 1, NULL),
(169, 'Peter Stensgaard Moerch', 'petermorch@hotmail.com', NULL, '$2y$10$iCrDqepCIXNfL7DcOqC.5.7Yx4VY7aOmuC4qf2CKzkauIRH18MwH.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:55', '2022-07-11 09:46:36', 1, NULL),
(170, 'Frederik Voetmann Nielsen', 'frederikvnielsen@gmail.com', NULL, '$2y$10$abjY7rVKSRXLgj/mz5nPZepUmSPKPDFHKHmM/BBzNDBC4Aoh1.Ile', NULL, NULL, 'UXBrC1YpGbbRwzoCHzMwIsiL0yBbDJ8XHhzgxAaWvgpiGGczmd1dC7PPVOyX', 0, NULL, NULL, '2022-07-11 09:36:55', '2022-07-13 07:15:42', 1, NULL),
(171, 'Anna Marie Bertelsen', 'bjb@post8.tele.dk', NULL, '$2y$10$YbHubBD7kCYOSk2A/WcEHeVMqYxVuQ4YLSwj.fUZFy0MJ6j5GmB6q', NULL, NULL, 'OgDhLbLpIZwsKq0oVt75RIyimjDomd62KxXTbNZL14T9phXIRsQHIZ1JPgtA', 0, NULL, NULL, '2022-07-11 09:36:55', '2022-07-19 13:10:19', 1, NULL),
(172, 'Rune Lundgaard', 'rune@lundgaard.com', NULL, '$2y$10$V9kIa4VydJttgNVM8kII4.KruF0ZvF681WZ828/UIQUfAOR3lv142', NULL, NULL, 'AIqnfxEiW9kE2yapI5LN4sebzSN8kQDKdNVQiKV5Ko8iAeD3567RpXuYI8hQ', 0, NULL, NULL, '2022-07-11 09:36:56', '2022-10-26 16:31:25', 1, NULL),
(173, 'Tandlaegeselskabet Svend Ulrich JensenApS (Svend Ulrich Jensen)', 'kmj@munkjensen.com', NULL, '$2y$10$6J5Qw1meQCw.M/sbFCKNyOtPZOE4Q7d5bHN2tUqB3vg/Q4OUkk7Oi', NULL, NULL, '8tpMb86gAl8WSTxY8mVvgmt5D1fO5I36QZVRJRkVPjF6fJqR8uJXGUSz6Yrf', 0, NULL, NULL, '2022-07-11 09:36:56', '2022-08-26 08:59:40', 1, NULL),
(174, 'Anders Kjeldgaard Olesen', 'ako@live.dk', NULL, '$2y$10$XfZx0WzHZQdeTC0IqNu8suKv8GFRXP5Jx81drdU6m9olMXjj8r1Si', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:56', '2022-07-11 09:36:56', 1, NULL),
(175, 'Brian Jensen', 'brian@fiberpost.dk', NULL, '$2y$10$IDpbKVa2lvZz1rdv06xfqO.xWa89eQvUfYFGuSVE5pLMfpqZIwzY6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:56', '2022-07-11 09:36:56', 1, NULL),
(176, 'Anders Lindby og Karin Agerbo Lindby', 'lindby@live.dk', NULL, '$2y$10$I.6rJ/L/d8VAYJdaJJsUBOtP7mxOQtsdmdWKJou7Yw/KBWy3MxPFy', NULL, NULL, 'mrmJ0Lbl0d3eFePAGTWMDfHMwVDsY6mjfFFD4WTIzo2o2PWxz9Y0r8wydEmT', 0, NULL, NULL, '2022-07-11 09:36:57', '2022-07-11 09:36:57', 1, NULL),
(177, 'Davide Silvestre', 'davide.silvestre@gmail.com', NULL, '$2y$10$2XHjhYgl/.lAMZ7vL2SuROzSGGIRA4jkeq/8CO84qwxaMFVW5zPp2', NULL, NULL, 'ZhQ3pqMGHsV77HnOz2kOfbSgVvw5vc5lZaBbyJlROTHgW7LYddjcrpcFvkUT', 0, NULL, NULL, '2022-07-11 09:36:57', '2022-07-11 09:36:57', 1, NULL),
(178, 'Jens Dominic', 'dominic@privat.dk', NULL, '$2y$10$NBBzh82AMUwqDHI8a.suPOVCCl34Cnai1rYztAZ6ta4zdY52uJQPq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:57', '2022-07-11 09:36:57', 1, NULL),
(179, 'Mogens Jepsen', 'mogens.jep@gmail.com', NULL, '$2y$10$XefOniHAjKzDjxrOD.ENkeVlAx2Ac0bE3SdfUDcTeD21cY4E3UEUG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:57', '2022-07-11 09:36:57', 1, NULL),
(180, 'Rina Broesti Laursen og Sofus Riishede', 'brosti@live.dk', NULL, '$2y$10$3t6kE9kes.l33SeCuKzkoO7oq4MfP4Qh70yOEtCSLV9QlDf399jRK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:57', '2022-07-11 09:46:37', 1, NULL),
(181, 'Bo Barfod', 'Bo.barfod@gmail.com', NULL, '$2y$10$kZ4FfBWHaYDQcLVXgjG5ouqdykz1iMdqtt4h9FZ/I5odN1mIHXxXK', NULL, NULL, 'ns5YMNMOr8yQkuykemgabbhRD9ZDEUAxYrwppT5dsCh1OZRcAwNA8lCs6AQJ', 0, NULL, NULL, '2022-07-11 09:36:58', '2022-08-08 12:18:00', 1, NULL),
(182, 'JT Ejendomme, Vejen ApS (Jan Terkelsen)', 'jtejendomme@yahoo.com', NULL, '$2y$10$vd5R1X6tOByXxkblBJSuSuPV1Ndq59lsJnes1IW35.phaarZ8vkJ2', NULL, NULL, 'IPRBAmQQTgmnOytYgk2pAib8UN6nAklrXiPi1nI9QaetH0qjazKyGPiDMDZb', 0, NULL, NULL, '2022-07-11 09:36:58', '2022-07-11 09:36:58', 1, NULL),
(183, 'Thomas Jakobsen', 'Thojak@outlook.dk', NULL, '$2y$10$8nxpKFO6peR5NnpYAWkw/OIjemGs.cH38AkofA3m0az/pTZ.2yDOC', NULL, NULL, '9kEgUKb86l395cHi1HSn4fsMELsreYwSTRERSQnIDq0QURFUGOJFgkckurkJ', 0, NULL, NULL, '2022-07-11 09:36:58', '2022-08-06 08:28:15', 1, NULL),
(184, 'HRAS Holding ApS (Henrik Rasmussen, Heidi Rasmussen)', 'hras.holding@gmail.com', NULL, '$2y$10$5uXBuSXuQChzATMSrX/0kOfJIeXM/uDAwxUZGjWaY.MWr42wuUsSy', NULL, NULL, '4cE3WnkWwXNP4YPZHNeggk4O0sQPRXQthyFpA83OKHPcgXsFbl153M0irtFQ', 0, NULL, NULL, '2022-07-11 09:36:58', '2022-07-11 09:36:58', 1, NULL),
(185, 'Margit Petersen og Joergen Kofoed Jensen', 'jkj@email.dk', NULL, '$2y$10$3PVx8pH/gIH2e41Ojy4zAun0v9REVdHsNp.ebQRHu4niB7NWmP6z6', NULL, NULL, 'dMFLENPN63sLPAfmPUY68iEF9MoQAmruMAtu5i1fXOK4R6kR4MQH4xpncRUl', 0, NULL, NULL, '2022-07-11 09:36:58', '2022-08-11 19:40:01', 1, NULL),
(186, 'Fam. Hansen Invest Holding ApS (Torben Hansen)', 'famhanseninvest@gmail.com', NULL, '$2y$10$5ncI6kQVVGzQ1F2Jp1gweuSLJI0U/foOuiaxD.1hWfYdBUDY6FIBy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:59', '2022-07-11 09:36:59', 1, NULL),
(187, 'HJGP Holding (Hans Joergen Grosvald Pedersen)', 'hjgp@aqualogik.dk', NULL, '$2y$10$pcsEdeFYzgFe7NbCroaJDulfZ2dnCgfLoVQqgYItPeiZa8HAiNjIS', NULL, NULL, 'TrOIoBJAICCoIQl3QCHq3ECd0VXbUxCrSAEwag6YGEvhon1VowV3jk9JtjyU', 0, NULL, NULL, '2022-07-11 09:36:59', '2022-07-11 09:46:37', 1, NULL),
(188, 'Rene Pedersen', 'renehp210972@gmail.com', NULL, '$2y$10$MgXjhN0ZlYB38QW2SQ8yXO4QRdNIw/BhiOVMrJvkjR0mX5KLUJP7m', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:59', '2022-07-11 09:36:59', 1, NULL),
(189, 'Ulla Kjer', 'ulla@kjer.eu', NULL, '$2y$10$MWOHbohgen0wC09FiiUUC.ymo71NLYgKPoH1gv1jhdS2RVJKGhrBi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:36:59', '2022-07-11 09:36:59', 1, NULL),
(190, 'Klaus Mortensen', 'klausm@stofanet.dk', NULL, '$2y$10$98kU9CYqX6V/KN/rWDqmdu7ptB6kDoqoiod0MS/TtmpSm5kBWTHl.', NULL, NULL, 'zVUd34SUjjyQF7fi5YMW7aybxP4EbTZNoTgOxaGQ5bLvFMS6nRE4mUHrnXmL', 0, NULL, NULL, '2022-07-11 09:37:00', '2022-07-19 12:57:12', 1, NULL),
(191, 'Allan Soerensen', 'allan.s.1204@gmail.com', NULL, '$2y$10$xA7iQYxUHOmMGj7A9UgyYOrQN0YipSHHQ3RtexTehOJioT.Zm5kNG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:00', '2022-07-11 09:46:38', 1, NULL),
(192, 'Carsten Trier Larsen', 'carstentrier@hotmail.com', NULL, '$2y$10$P5SV6i0LgNHOuF9Jbi2IT.c6sWFVn786ARVwSKeiUPBX/Nc.I8TJG', NULL, NULL, 'mvFKxLWDhCriDBuooLmIQkfheuA4Wj7qQ9vuXpgdL8ncTUexVYqqKIvbCRNR', 0, NULL, NULL, '2022-07-11 09:37:00', '2022-08-12 05:55:21', 1, NULL),
(193, 'Ove Bjoern Eichler', 'ove.eichler@live.dk', NULL, '$2y$10$LJCDh6qDBNKpdqZXiQcFoeP31XdkANgcQWqHmdXAzbs3Fl1YDit8y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:00', '2022-07-11 09:46:38', 1, NULL),
(194, 'Pia Vosny', 'pia.vosny@gmail.com', NULL, '$2y$10$2S4WmV/Wrwo/s0x2ESdvru5IZZhNAUtc8Oa542ntO19Gv0PVaV6uK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:01', '2022-07-11 09:37:01', 1, NULL),
(195, 'Tine og Gert Veng Olsen', 'tgvo@outlook.dk', NULL, '$2y$10$ZnHcG0cSYin0lI/JRG7yNeWjP6Llcc2CGs9lLvmP4MlR4742r5aym', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:01', '2022-07-11 09:37:01', 1, NULL),
(196, 'Hans Christian Gimbel', 'hcgimbel@gmail.com', NULL, '$2y$10$p9F8ZxDO..N1Q7vokBIUS.Qf7X.EkEKLfT880HsRYbcQRO.yAEiUu', NULL, NULL, 'MANxnT8CJVhUNJFWTOa5zsjtqZmdeyl9yNIyCYQTDPxJJuLMONTgTXZhWuJv', 0, NULL, NULL, '2022-07-11 09:37:01', '2022-07-11 09:44:48', 1, NULL),
(197, 'Jette Byg Jakobsen', 'privat@pejerne.dk', NULL, '$2y$10$51u9ORq8dJEwVwbsRHwYwuyLTeltOX1GJsRe676oZn2Z1qC4hdlOa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:01', '2022-07-11 09:37:01', 1, NULL),
(198, 'David Neville Holding ApS (David Neville)', 'dane@nevico.dk', NULL, '$2y$10$/3I5VBMH9lORp8SbxbYgRegIatVeVo7g1rE5bo.sDm0g3zttADtIK', NULL, NULL, 'ZD9orNc6zpQO20IFQUGPR3VAmhSL8urfMLbsMwu9CtDvyGCHqziqpb96EWzU', 0, NULL, NULL, '2022-07-11 09:37:02', '2022-07-20 04:09:39', 1, NULL),
(199, 'Jean Hviid Pedersen', 'jema09@gmail.com', NULL, '$2y$10$vYKVjnDw9BJDmWpT0EyobuC/Ip18hi8SwBdXPnd1DR3gOhHJoeO4S', NULL, NULL, 'R4bTbLM4lj9zv2Fc2kkUM41Pt42sS5Nd7fIA1pN5lwGa5amx8NftZfdmXy59', 0, NULL, NULL, '2022-07-11 09:37:02', '2022-07-12 14:22:57', 1, NULL),
(200, 'HNR Holding ApS (Henrik N. Rasmussen)', 'henrik@samlingafinteresser.dk', NULL, '$2y$10$2cYfu.QO9c7JXCxW332LvukNk05X.eass5ltNxvvArOVuyUu/1/MW', NULL, NULL, 'pTj25peD9Ct9qdoXUgAkMAQz6EGrKE7tyrnsXWv0BnZ6bLIrnrKoktOYJk7R', 0, NULL, NULL, '2022-07-11 09:37:02', '2022-08-13 06:23:39', 1, NULL),
(201, 'Tina Mose Holding ApS (Tina Mose)', 'tinamose@yahoo.dk', NULL, '$2y$10$55mqd3fB33EgS.57.LMTv.Kx2fvUrzBKEiPC6w24yVTJ4qKYDLxK.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:02', '2022-07-11 09:37:02', 1, NULL),
(202, 'Jesper Malling Hoegh', 'jmh@yakka.dk', NULL, '$2y$10$9ZY7GBsodq/01I.nUl5n1O5YmsXBpzHPfLxZRHGst4MFX4RNOfQES', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:03', '2022-07-11 09:46:39', 1, NULL),
(203, 'Annette Kofoed', 'ankofoed@icloud.com', NULL, '$2y$10$EI2oaBydDvjCZGTwMZZfi.ChAVwc2eA6UdGHy5GV4tB8w2jaNQ64q', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:03', '2022-07-11 09:37:03', 1, NULL),
(204, 'Inger og Keld Hvidbjerg', 'keld.hvidbjerg@gmail.com', NULL, '$2y$10$OepH.a7fsC5afvvrcA0v0eTRB68/Fkz1c//tNRLrKuzF.TIKU5z76', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:03', '2022-07-11 09:37:03', 1, NULL),
(205, 'Henrik Moerch', 'henrikmorch@hotmail.com', NULL, '$2y$10$LuT.5skul2kOywdKb7FOiO8ygClFxAc7FFBtnwoWZlSMWzMT1A8cO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:03', '2022-07-11 09:46:39', 1, NULL),
(206, 'Niels Bjoernoe', 'nielsbjorno8@gmail.com', NULL, '$2y$10$QD7cVGB/X9HijsRt0SZAce0yLMsoUOuO/AcXtv6TVb8Il3eVEUuW6', NULL, NULL, '1sNLsLWS4K9zeSwUGiCuDJwPcPAfpM82NJfCiMG4z4heIJ4w0mQuUiYuOvYa', 0, NULL, NULL, '2022-07-11 09:37:04', '2022-08-05 14:38:05', 1, NULL),
(207, 'Sara Koefoed', 'sarakoefoed@hotmail.com', NULL, '$2y$10$3rDQj3UFTlQXU8Un1PtCh.rHX0ezK86iOazGGsNZy42dcZga8EZFy', NULL, NULL, 'rnuGVENvc8OHsmJzNupsSdMUmqTbokVlS1t2tUt0ChDzYOcAFGXUuT7geABm', 0, NULL, NULL, '2022-07-11 09:37:04', '2022-07-22 05:37:37', 1, NULL),
(208, 'Karsten Loengaard', 'longaard@gmail.com', NULL, '$2y$10$y073PFxwVqPf5kpnx.bX3./VZaUWZSMnI4FCUQXGmNh.DZqT0f88u', NULL, NULL, 'zeAN8b55LfANdQD7R8kULwJuBFrKZ0QMVj276kRuTACPi42lfRkla2EVsdkv', 0, NULL, NULL, '2022-07-11 09:37:04', '2022-08-14 18:01:38', 1, NULL),
(209, '3DP Holding A/S (Kirsten og Steen Hoegfeldt)', '2730kirsteen@gmail.com', NULL, '$2y$10$vg3IjdBtlQ41Z255l1sI6us0cQHk4Km8eOkmhJwHdUasD/30T3l8O', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:04', '2022-07-11 09:46:39', 1, NULL),
(210, 'Nanna Holst Mieritz', 'nannaholstmieritz@gmail.com', NULL, '$2y$10$q5v8wKcd7LtlpJuyNS1VCeYV6InR3J0OTCJJaX7UQ3UUQdYc4VIOy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:04', '2022-07-11 09:37:04', 1, NULL),
(211, 'Bjarke Hesseldahl Lyster', 'bjarkehl@gmail.com', NULL, '$2y$10$nikmCiVQiOfEWrujyXiYXuB3hP9lSLQux8UTj7P1vbq0mDFif5xNG', NULL, NULL, 't9mm2pueL55SKjAsD0qrWmnI2meLnd2C90uvdk8h1xgQxUG9EWSeAZchnano', 0, NULL, NULL, '2022-07-11 09:37:05', '2022-07-11 09:37:05', 1, NULL),
(212, 'Anders Dahl', 'anders-dahl@hotmail.com', NULL, '$2y$10$nQujzIHK2zczMaC94TeZ/OxgZ267LjhR9LYdAHvmRSXjOTqU5w4ey', NULL, NULL, 'Lruk1WdHaAJTozynpdlbiJeZ8UFl4ywOII2kL7G2yPvSi2LwurbFB0rnsv1X', 0, NULL, NULL, '2022-07-11 09:37:05', '2022-07-11 09:37:05', 1, NULL),
(213, 'Bente Donkin og Chris Donkin', 'chris@donkin.dk', NULL, '$2y$10$a/nZ3AKkjIJvMHzmlffJ/e74OGGJvSri.hMXMIcW1LCDEY9wOTBua', NULL, NULL, 'Z63XKUyGHpoGxAalpJN6A0eApOJ4XKG3LR4XrIlaR26WGotFuMNgFR8ezNzb', 0, NULL, NULL, '2022-07-11 09:37:05', '2022-07-19 12:53:12', 1, NULL),
(214, 'Kristian Kjaergaard Invest IVS (Kristian Kjaergaard)', 'kristian.coach@gmail.com', NULL, '$2y$10$90ZNaeuW.k4XrI5OELx6TeAXkkJbQkOgs0Mt7L2KWP4FWBzFfosc.', NULL, NULL, 'MtOf3jPS6bNkqzplADL9hJEvPohEqjAu7pR7oyYX9ek4NBZz4rtAkQAp5XHn', 0, NULL, NULL, '2022-07-11 09:37:05', '2022-07-12 19:42:27', 1, NULL),
(215, 'Jair Nicolini', 'Jnicolini@dadlnet.dk', NULL, '$2y$10$sr.ZkHRsmdXIabZCrrIe6OJXioNZViRfdMpq6lohIMQRX/0ssLnJ.', NULL, NULL, 'y1KTwODm4RzvVJhdolX6xT3w5j0rNtMzunAEUgHMqY6iDVdAA3p9yeCQimkA', 0, NULL, NULL, '2022-07-11 09:37:05', '2022-07-11 09:37:05', 1, NULL),
(216, 'Wendy Walsh', 'towendyw@gmail.com', NULL, '$2y$10$WBKiNSk9NTPPA6DkqboihOn97cdDjL1SBNsJ36JmeNrVe6OFZguzy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:06', '2022-07-11 09:37:06', 1, NULL),
(217, 'Martin Sohne', 'martin@sohne-vvs.dk', NULL, '$2y$10$TxozALA3qUHg274ThF1pWu/rz2jTkk4C.oyQpSZT0vDDN6K7ma4uW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:06', '2022-07-11 09:37:06', 1, NULL),
(218, 'Claura ApS (Bo Bernard Larsson)', 'bo.b.larsson@gmail.com', NULL, '$2y$10$PzNLOAedPQSnEUnr/.Lh8O9j4XbrSR2tfgVP8UHT73sYbafdRgjhG', NULL, NULL, 'qCUWQZM6D7QyVUb6foAZmiSrKe6gNDhhRVyNEgXqpwZYh1Jzey2X2Gea80eV', 0, NULL, NULL, '2022-07-11 09:37:06', '2022-07-18 09:01:37', 1, NULL),
(219, 'Steen Vejrup', 'steenvejrup@gmail.com', NULL, '$2y$10$N2XR81.uKeJub03fat1CZeurYjuOuNTQf9ioIb1g.w.XxUUhTKw52', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:06', '2022-07-11 09:37:06', 1, NULL),
(220, 'Lene Bach Fly', 'lenefly1@gmail.com', NULL, '$2y$10$i3mIPWEqPdEJ3fSReK3o6unaihXfgMKU3bFC/pJ76XYLJdtjsg6tm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:07', '2022-07-11 09:37:07', 1, NULL),
(221, 'Hanne og Jeppe Gaard', 'jeppe.gaard@privat.dk', NULL, '$2y$10$ojiChJTqoDzESGxJuoFYVO6GHvcU4m2S4d2eCALrsdGwWGiG3/4qm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:07', '2022-07-11 09:37:07', 1, NULL),
(222, 'Janni Vedoee Mikkelsen', 'Jannivedoe@gmail.com', NULL, '$2y$10$7tAeqrqdO91W5yzPh7I.n.YYEKYEytaC3vY8SCXbWAz4cST3yp1F.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:07', '2022-07-11 09:46:40', 1, NULL),
(223, 'Jesper Platz', 'Post@jesperplatz.dk', NULL, '$2y$10$8fco7WBfMfQbe2e0t45YjubLBWuibLlnInk/txonSFXUFyerwcHPK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:07', '2022-07-11 09:37:07', 1, NULL),
(224, 'Vagn Baek Hugger', 'hugger@fibermail.dk', NULL, '$2y$10$gTlWYFLElM9SmmhIuO1eleCNK8P/ogcHraQWwKv066T/TRuc1pIkG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:08', '2022-07-11 09:46:40', 1, NULL),
(225, 'Taus Glaesel', 'gglesel@hotmail.com', NULL, '$2y$10$zykXk9b/v3bHJJTa4M2lPucYYj27FHnMMNqpT8lmgTHTB2Kivodhu', NULL, NULL, 'MqtJaj7ZwpqZCUbTl0IZ1cifI7HJKhxR7mxSRXPebjHE68AczilhXqP8H1VX', 0, NULL, NULL, '2022-07-11 09:37:08', '2022-07-20 17:36:09', 1, NULL),
(226, 'Claus Lundoe', 'lundoe@privat.dk', NULL, '$2y$10$FeMULC49N0cB6HL1paM1xea1IdZHapkM5nWvaX6.5xU2JSveijMtW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:08', '2022-07-11 09:46:41', 1, NULL),
(227, 'Henrik og Maja Kragh Andersen', 'fam.kragh.andersen@gmail.com', NULL, '$2y$10$NSuNhnMYDVNuoxHHHBzE5eDnM5EnSTfy6HiFi0zdWq9gBlkQPtjzi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:08', '2022-07-11 09:37:08', 1, NULL),
(228, 'Grete og Finn Heidemann Andersen', 'andersenogterp@gmail.com', NULL, '$2y$10$5P5tRoAzKj.0vQKWsDj4UOCuPOrX7pLrmOjsSSa1abMetaWP5eX8O', NULL, NULL, 'pMV8KKx6n73e6oT2CC3gtQpSBvV5fjbf5Ns2a6zx4S9UXdLdnxbV3HDKdrdS', 0, NULL, NULL, '2022-07-11 09:37:08', '2022-07-11 11:11:15', 1, NULL),
(229, 'Momett ApS (Morten Johansen)', 'mojohansen@outlook.dk', NULL, '$2y$10$k8mzA327mx6bn3Hki.ltneTaSlU/DAP6uFmISG6w2yPnKOLnNnUPa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:09', '2022-07-11 09:37:09', 1, NULL),
(230, 'Parfumeri Ham og Hende Aps (Rene og Alice Fjeldsoee Soerensen)', 'Rene@fjeldsoe.eu', NULL, '$2y$10$QWjqAM8MM9.gBXli6SKFBOOn0dUHPwhTMeDvIF65VdnqpSuWkzmU.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:09', '2022-07-11 10:05:21', 1, NULL),
(231, 'Jonas Hald og Dagmar Hald Buksti', 'Jonashald@dadlnet.dk', NULL, '$2y$10$/OlkwXrtxpiUTSLORsBtMO2i2L03BvG0E02yElxYS90w0mTUSeOKG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:09', '2022-07-11 09:37:09', 1, NULL),
(232, 'Svend Erik Thordal Schmidt', 'ses@guldminen.dk', NULL, '$2y$10$6k7VZ9OWlcRKiW.Colhjx..19/lVkQjUxnKgtSm1x1dhKAd4PeTgy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:09', '2022-07-11 09:37:09', 1, NULL),
(233, 'Henrik Svensson', 'henrik.svenzon@gmail.com', NULL, '$2y$10$8C2psF8oY0M5GbSeTb0E1ePYy8j68Ry6FDnYcWOu9CeUHiBIaVXDm', NULL, NULL, 'nmlGRyabUDD9nSKaspAQ0HUA0qGkLznNs8PfbwquUKbrhsz3u4tUpZK8cqFf', 0, NULL, NULL, '2022-07-11 09:37:10', '2022-08-14 13:40:14', 1, NULL),
(234, 'Maria Loenborg Andersen', 'marialonborg@gmail.com', NULL, '$2y$10$2XdKO9VrenMi5fhQK7MlAuBLJgWNwU7.VxQR1crCqLOPhMsGuE4bO', NULL, NULL, '9jsBpxNKWLfnNl83OZs6k1O6ionoNa9hqUPCCkJAELTLIigPOVC7IVkwoEHh', 0, NULL, NULL, '2022-07-11 09:37:10', '2022-08-15 16:41:00', 1, NULL),
(235, 'Frederik Bukhave Eriksen', 'fberiksen@outlook.dk', NULL, '$2y$10$x5ZkwmGsAAPoN2D67c0bK.ZbP71SxZXtN83JeEkdILaRqxbBR/pcm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:10', '2022-07-11 09:37:10', 1, NULL),
(236, 'Gert Dalskov', 'gert@dalskov.com', NULL, '$2y$10$nx3BgQGti5K8jmALzyw2cuLWAXltA/q95YUG5zAIi7pE.pNf2cKPu', NULL, NULL, 'DBuyWbtJknk0bWXfgfuLlE50n0o9tsucG75PmNKNrs76251a0YSfB5zAbvTd', 0, NULL, NULL, '2022-07-11 09:37:10', '2022-07-20 16:26:30', 1, NULL),
(237, 'Christina Vad og Janus Pedersen', 'jmcp80@hotmail.com', NULL, '$2y$10$vadwGogSHW0.c1hp.HCBIOC2Aph2w7SO4qdnDJNjz0cqZFXH//yne', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:10', '2022-07-11 09:37:10', 1, NULL),
(238, 'Jan Ole Larsen', 'Janolarsen@gmail.com', NULL, '$2y$10$Ryu2pFfqNrC0cLDNKhsiYeT82lv5vTC/s0sLlYmtBw5j6P8GRuSQC', NULL, NULL, 'wCYbn31brlM2rSGXbze3Tkd9zUCDH8zOolQ1k5NRG7mClAZTmqi8cQDDlIMe', 0, NULL, NULL, '2022-07-11 09:37:11', '2022-07-20 02:32:21', 1, NULL),
(239, 'Trine Baadsgaard', 'kontakt@nojsom.dk', NULL, '$2y$10$HRQKh0M87J0ByW7LjKnwkOYqJoYbfi4fqJ4bvWmvAwfrE49.b1vS6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:11', '2022-07-11 09:37:11', 1, NULL),
(240, 'Kim Peschardt', 'kimpeschardt@gmail.com', NULL, '$2y$10$z5Og5eYyiGQEseEqXaQ9eukiE4uV1qvYSXoAHRsp3JmXH/5zx0ccS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:11', '2022-07-11 09:37:11', 1, NULL),
(241, 'Godthaab Laegeklinik ApS (Egon Godthaab Hansen)', 'e.g.hansen@dadlnet.dk', NULL, '$2y$10$lkKVVPmRLthouAgTwhBCGuN34ldgS9XaIYVY79o21v9h1SNA.GgTa', NULL, NULL, '4XRYbL95fTw7QKNQLicfR22wSwqYAxWbMi40xBBH9NuaAQpyGpj8pJicwVnT', 0, NULL, NULL, '2022-07-11 09:37:12', '2022-07-15 09:18:05', 1, NULL),
(242, 'Jesper Malling Soerensen', 'jespermalling@hotmail.com', NULL, '$2y$10$cQ5wdXHx2JOVltKqqjfAv.gRBekPiJrqCv8On9HxBcALtIbY4uueS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:12', '2022-07-11 09:46:42', 1, NULL),
(243, 'Gram Leisure A/S', 'kontakt@gli.dk', NULL, '$2y$10$dfvwD0.VTCRsUIANaGKHeOqXuSMYiw12BLrMA3Vt9RuenHcT1nRN6', NULL, NULL, 'V5EEKlnRM00TJsKWpiXaGnSogKVIzcw9WXSh0EjtJCpskruUDUQa9npYcs5y', 0, NULL, NULL, '2022-07-11 09:37:12', '2022-07-11 11:13:04', 1, NULL),
(244, 'Jette og Anders Uhrenholt', 'andersuhrenholt23@gmail.com', NULL, '$2y$10$HXAcMNrxXz74zRbPDkXCXeDeqEr8oeyTQ5eA5jU0/.PCJv/HQVV/y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:12', '2022-07-11 09:37:12', 1, NULL),
(245, 'Julie Guldmann Lund', 'guldmann.lund@gmail.com', NULL, '$2y$10$x4bDQe81S74VzCxqZvbVsOI6uwh2VU2xAeBrtcf/ljSM8fkTAMzz2', NULL, NULL, 'SZnUvagRiG3CmbYVkbUlmSwTUemcZMiRIk91LD0BQw79cP8mN5oncDpRjcXj', 0, NULL, NULL, '2022-07-11 09:37:13', '2022-07-11 09:37:13', 1, NULL),
(246, 'Lise Andersen', 'lisetaler5@gmail.com', NULL, '$2y$10$IHEX4yoi3HnIBCKDHy4f0.oMbpwdVbgczsX1Z7Qs9L.PTfMlNdlAS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:13', '2022-07-11 09:37:13', 1, NULL),
(247, 'Aslan Trust ApS (Kim Linnemann)', 'kilin10@outlook.dk', NULL, '$2y$10$9jw/rpE4GW1z37fEIOimzeY5NrFe/NpnjVjtAhGRU0zc.9Vvzr.g6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:13', '2022-07-11 09:37:13', 1, NULL),
(248, 'Joergen og Birgitte Fogelberg Sommer', 'birgitte_fogelberg@hotmail.com', NULL, '$2y$10$UEn0EYX/iXdxBMlvIU6YOe.1P85citvrt4kdNq1YD/uSgec70KD9S', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:13', '2022-07-11 09:46:43', 1, NULL),
(249, 'Michael A. Petraeus', 'michael@p3us.dk', NULL, '$2y$10$D/B18tpNRz7XFlirOcGyOeFUwf5ces.OmLNmvPRizJszCg/hCcY3S', NULL, NULL, 'Zlvpk6i7BruRlenBqBRHc4OB8SuXKwMoBrG1BdCjrXuTkB0TsLr3t76Dd7Mj', 0, NULL, NULL, '2022-07-11 09:37:14', '2022-07-11 09:46:43', 1, NULL),
(250, 'Anker Degn Jensen', 'aj@kt.dtu.dk', NULL, '$2y$10$r2MbW/VIgDVZgdhqkiCXDOdB5lVKJyO.sessL0AnaqR2AsIiQL6Zq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:14', '2022-07-11 09:37:14', 1, NULL),
(251, 'Karsten Cordtz og Liselotte Larsen', 'karstencordtz@gmail.com', NULL, '$2y$10$yVrmPmn5iUFIXBeIvWfOqOsVulup/mYzH5/0DronvE8wy/u3oJvdC', NULL, NULL, 'WWj6Ft6ikSPfPpe7xj1VjSdq5FudRMk2BFynT5MVeAMOqJwiaTUGhSZqeek7', 0, NULL, NULL, '2022-07-11 09:37:14', '2022-07-11 10:11:46', 1, NULL),
(252, 'Lise Charlotte Schubart', 'lise.schubart@gmail.com', NULL, '$2y$10$u/gUsrYGzTfFU3lSrWNrJuVDIbtnopPeB3SKVw2XawEzESsDo1v5W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:14', '2022-07-11 09:37:14', 1, NULL),
(253, 'Ann Sofie Gleesen', 'annsofiegleesen@gmail.com', NULL, '$2y$10$IDAQnpR81MbQ.UA4TaKlPeKUtpY0PyOTfFhDpmSmSRo9R5ELWjvAG', NULL, NULL, 'HMDjUhdXqUXqILl8XarelO78FwyluZiEvTVX8cJIArpjeMZnYRd5IgWEfsKu', 0, NULL, NULL, '2022-07-11 09:37:14', '2022-07-11 09:37:14', 1, NULL),
(254, 'Bo Barklin', 'Barklin@profibermail.dk', NULL, '$2y$10$jcYjFJw/9NVLGDwSEYfpSO7.gATYNLv/mHKr83O7v.7ESDudHtjM2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:15', '2022-07-11 09:37:15', 1, NULL),
(255, 'Arild Rasmussen', 'arildr@gmail.com', NULL, '$2y$10$m2fDyFUAwJtTlMyOvkOhNuPkQQmsFO88qHw6CjvPaMXuUCcAoNYry', NULL, NULL, 'I3AIj5FZn8AEyQgbkeFpVVrz5ZuYoArpS60WbwuP7I2jkburgn0oiA4seeoE', 0, NULL, NULL, '2022-07-11 09:37:15', '2022-07-11 10:59:10', 1, NULL),
(256, 'Joern Grankvist', 'Jorn.Grankvist@gmail.com', NULL, '$2y$10$Yw6cAFQGYfR/1y3Q9buZY.EXBcto9gKwCAl83QaeRb.zClnfEl9Nq', NULL, NULL, 'jq3IiRPHTzPRN8CEUlCjnqhmVOOLmzA2b2m9sQd4MeBTCBBF2fy8bWHj3cIG', 0, NULL, NULL, '2022-07-11 09:37:15', '2022-07-21 16:08:30', 1, NULL),
(257, 'Veber ApS (Morten Frederiksen)', 'morten.veber@gmail.com', NULL, '$2y$10$nodEYFtgIUMJiN2Rtifhu.A4ddllz1GXTuAKn6dHscLLyEGggKoOm', NULL, NULL, 'fwEt7EJQ8tf6RgAP2cOImP53WNQ6F9IUUIMxyItCn6gCg3OdulbyHwSrwuAT', 0, NULL, NULL, '2022-07-11 09:37:16', '2022-07-14 11:01:11', 1, NULL),
(258, 'Pia Torpe Knudsen', 'pia_torpe_knudsen@hotmail.com', NULL, '$2y$10$JCOccxOQsXE93c.eLDjuLuQr4xt56DTRvQa8ekljgrVwKJygmV2xS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:16', '2022-07-11 09:37:16', 1, NULL),
(259, 'Maiken Langvold', 'maikenlangvold@hotmail.com', NULL, '$2y$10$hKHNc/Y6GlGYIBj45y8KfOKl4st32d5gd9737gGrpRiYBSiuJotIK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:16', '2022-07-11 09:37:16', 1, NULL),
(260, 'Mette Roedtnes', 'ferrold@post11.tele.dk', NULL, '$2y$10$J9aXD5ibPu4FoFroh.bggOiNaAWgwQBiQAs5yCWCp/R0kXYW5mPhS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:16', '2022-07-11 09:46:44', 1, NULL),
(261, 'Kim Japp', 'kjapp@live.dk', NULL, '$2y$10$joVIvsUmiEhcfzkXJM5HCe00WT6dzwLvGzxCn5/jhdayHY1NC2VF6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:17', '2022-07-11 09:37:17', 1, NULL),
(262, 'John Gam Nielsen', 'Joganiels@gmail.com', NULL, '$2y$10$lQa.OYRJBN8yGc7UZJ.TzumNDbLhcSVvRLMEwHcggEGh6CDYt38le', NULL, NULL, 'lmhoYNS2qPJpuGdhcvkuz8Bk53iCIOjq996iohIDMbnNLoMxaM46rKvfOYUV', 0, NULL, NULL, '2022-07-11 09:37:17', '2022-07-11 11:00:52', 1, NULL),
(263, 'Chac Holding ApS (Henrik Vestergaard)', 'hve@foodhouse.dk', NULL, '$2y$10$DR4fLPOmo/gClpsC6s.f7eyissogtyyy74OeDDEV.lMGXv1GCSnq6', NULL, NULL, 'aPcTk7F3RY4VeMZPE80wrE9MoOxc0YUQWySy7BjyW7xp538hIgXLejfdiVQq', 0, NULL, NULL, '2022-07-11 09:37:17', '2022-11-05 10:19:32', 1, NULL),
(264, 'Brian & Lisbeth Lund-Hansen', 'lislund@hotmail.com', NULL, '$2y$10$YvU8ahvQsH0ZB48ecYBmo.g7N0JftI4aO.Tmo5oqNV.0KsKK8xuyG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:18', '2022-07-11 09:37:18', 1, NULL),
(265, 'Claus Engberg Simonsen', 'Claus_engberg@hotmail.com', NULL, '$2y$10$zKLYwmMCEE/DrVa1XGfXdOxymYvz7O9NUQzFnG6MNXV7br0/Fx/Gq', NULL, NULL, 'nUzOzLifQ6ZsamZGOyabKM3qwJTCn2He1CnjpPGoMM3TDNrjD1sqlFTvcXJU', 0, NULL, NULL, '2022-07-11 09:37:18', '2022-07-11 09:37:18', 1, NULL),
(266, 'Jan Gerber', 'jan@gerber.nu', NULL, '$2y$10$P0G8vuqV8U9kjaF20nKvyOJb3OgcEYLjW8H3k9bXTL/g9QRBcASt2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:18', '2022-07-11 09:37:18', 1, NULL),
(267, 'Allan From', 'allan@from.dk', NULL, '$2y$10$E6AjN2B0xfrjXOFTu60m3.RnHvIFZsaGXPt4sK1INBkOBPIDkwzNC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:18', '2022-07-11 09:37:18', 1, NULL),
(268, 'Anders Banke', 'ab@vindebymail.dk', NULL, '$2y$10$LaOHhT5XFc5ebTyL/IMvreLHZMr85ej1Gehe014Exxt1x8XkCxj9W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:19', '2022-07-11 09:37:19', 1, NULL),
(269, 'Anders Glente', 'anders@glente.dk', NULL, '$2y$10$hxpnd5Mbkn1zhvYi/Bwg0upnHlzzjIxU6oCSj2u0KjiPbf4oI1656', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:19', '2022-07-11 09:37:19', 1, NULL),
(270, 'Bente Seier Scherfig', 'bente@scherfig.dk', NULL, '$2y$10$6lOaS3Yct7hHZDQuiQw4oOD/caWBrVSs1DBhA6zr8VeONUpVrKYAS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:19', '2022-07-11 09:37:19', 1, NULL),
(271, 'Bente Sternberg', 'sternberg.b@gmail.com', NULL, '$2y$10$SBn53uqw6AZsN3fRZP/vUO44ALXzUGhAmNXTUx7OfhhIfEx6Smqre', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:20', '2022-07-11 09:37:20', 1, NULL),
(272, 'Charlotte Brinch Pedersen', 'brinchcharlotte@gmail.com', NULL, '$2y$10$S0dDgSlUqeLUToWy8WqaDOc1yRukxjCUHqxu5nqpyQ0oKDtw1ZVKC', NULL, NULL, 'awsE8t0rFboDWS5U19VD7MLLloU0QutYCeZzliyG6Vs612hIf6J0Y0085LtJ', 0, NULL, NULL, '2022-07-11 09:37:20', '2022-07-11 09:37:20', 1, NULL),
(273, 'Christian Roslev', 'Chrroslev@hotmail.com', NULL, '$2y$10$t2Un6huMNBoK5f6bFW1nMOjmPH0NijW6YJQUtDORoVSke9FJW0tVK', NULL, NULL, '9Zsgi3xontTtmghduLmFuTKbXNAMm5bFzRp893aTDKiy2nqiroZrUyRvv1QT', 0, NULL, NULL, '2022-07-11 09:37:20', '2022-07-11 09:37:20', 1, NULL),
(274, 'Claus Bay Eriksen', 'claus@winspire.dk', NULL, '$2y$10$8ciXPhRIFz9RfUbTsOlJ8ecFKd2cBS1WTw38Qkx7aoOPZSGTBFr6.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:21', '2022-07-11 09:37:21', 1, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `is_admin`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(275, 'Danny Stig Nielsen', 'danny.nielsen@devise.dk', NULL, '$2y$10$Z.41soXVK/wm0mejDSbrWOVrdRdk6nobAQqJDL8RAW.IVKTBpndR.', NULL, NULL, 'yJbBfnOF3HPoA25RDDhEhosaz69YFxMq5I42u7Kukd9upkTGZHioLJ0wbxkd', 0, NULL, NULL, '2022-07-11 09:37:21', '2022-07-11 09:37:21', 1, NULL),
(276, 'Gert Helenius', 'gert@hele9us.dk', NULL, '$2y$10$z81pkmrbvjEuAeeM/i/Nl.9.7hfUTXga2QR75LIOP86HIDmBgC.Gy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:21', '2022-07-11 09:37:21', 1, NULL),
(277, 'Hanne Christensen', 'hanne1705@gmail.com', NULL, '$2y$10$.8omk/VVM1pEx2LaVub2we9Jj996H8ShC.l.KE0yq6BzJefcUvaem', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:21', '2022-07-11 09:37:21', 1, NULL),
(278, 'Hanne Toftekaer', 'info@helsekompagniet.dk', NULL, '$2y$10$aQKKqpR8bOjhNLcblvWTmeiY70K2GH/hAqIHAALas2Z.f47/t7P/.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:22', '2022-07-11 09:46:45', 1, NULL),
(279, 'Hans Lindebjerg Legard', 'Hanslegard@gmail.com', NULL, '$2y$10$qSXX5VADbMvbz9B9YEmSkuSHNVXhF14q7p3DwTzw5DEe0bNuB05N2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:22', '2022-07-11 09:37:22', 1, NULL),
(280, 'Helle Borup Jeppesen', 'helle@borup-jeppesen.dk', NULL, '$2y$10$6W05IagAKkWiXPCJ8MJL8OgxLS1jIfXKEVshSmDQ7C88eQTQrO7wO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:22', '2022-07-11 09:37:22', 1, NULL),
(281, 'Henrik Wibrand', 'henrikwibrand@hotmail.com', NULL, '$2y$10$FItUu3Y4m7TYRqnuiR.aCOGsyd4ir85MKobSV6B.QGKSRi.FQkd8K', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:22', '2022-07-11 09:37:22', 1, NULL),
(282, 'Jacob Ildor & Anne Rasmussen', 'Jacob@ildor.dk', NULL, '$2y$10$uBitCjNsFsnMHkL9psQcmOt1RLd1yyLLsDx0sPIi7IRxOqOHW7QW2', NULL, NULL, 'HslXPSx5MjRFHKY6NLNNTIVzSQXNRJ5lswiMCwP2imILEcPUOSk2NkRJrIax', 0, NULL, NULL, '2022-07-11 09:37:23', '2022-07-19 16:52:37', 1, NULL),
(283, 'Jan Opsand', 'janopsand@gmail.com', NULL, '$2y$10$nrrR7t8aRllwlThOhQC4P.hUUSvrqEGwYa595NIPb1p5wHMm3X.eW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:23', '2022-07-11 09:37:23', 1, NULL),
(284, 'Jan Rugaard', 'jan.rugaard@gmail.com', NULL, '$2y$10$v7UTWX8vwgWXr6ivJoJrZurdyyp3tG9TEHKy6LYd9UQWxnmK2XlUS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:23', '2022-07-11 09:37:23', 1, NULL),
(285, 'Jdk Holding ApS (Jakob Kaergaard)', 'kaergaard@gmail.com', NULL, '$2y$10$IV6vOYNaEgqK2vO26d2IAunus7wwZKY95u0lkdQVM7jYYigje5BJC', NULL, NULL, '1PTrw47gwi2Ojw6PL3FgPNi0jLIvFJhQ5HCycGmTIeO0uvB2FV6FY7D5Yt81', 0, NULL, NULL, '2022-07-11 09:37:24', '2022-07-11 09:46:46', 1, NULL),
(286, 'Joan og Lars Olaf Andersen', 'larsolafandersen@gmail.com', NULL, '$2y$10$hfxtoq8SoI2xx8CEq/MxluVNZbTxwHFw66TA9nMIQBDnjdqCetVlG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:24', '2022-07-11 09:37:24', 1, NULL),
(287, 'Joergen Erik Holst', 'eholst2009@gmail.com', NULL, '$2y$10$8G2qy2mpujAYG3Vt3b2e5.p3LjdCDT6.agGpcJG5B.tiA0DLYisKu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:24', '2022-07-11 09:46:46', 1, NULL),
(288, 'Kirsten Kobberoe', 'Kirsten.kobberoe@gmail.com', NULL, '$2y$10$FuYpxr4LqzXnvyxY6FNOs.mWutJiNExdD0akt2m5SGrv4JNK3HbJa', NULL, NULL, '2H4fUVlGkIkmf7bBbwg6RqS0PAiQPo3ZfMVqz63L0IRamR92iMFYPc3sYRjT', 0, NULL, NULL, '2022-07-11 09:37:24', '2022-07-11 09:46:46', 1, NULL),
(289, 'Lars Holger Hansen', 'lars@improx.dk', NULL, '$2y$10$iLU6GSYeKnNmYGFabmJBq.n8Ulwy7GH548wqsLHgbU4Z/.7dwKi4a', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:24', '2022-07-11 09:37:24', 1, NULL),
(290, 'Lars Torpe', 'Larsto@dps.aau.dk', NULL, '$2y$10$zSneyG9gnQRIw1CPGXQJbeD4wJiXo5XZYLMS.Z1RfUCTbMIylx8rC', NULL, NULL, '7jp3a9vITNxEaow6TwoMi9Yy8fBahRhCMfKjAbsRRsqwQVV2IDtvHr8hIhFp', 0, NULL, NULL, '2022-07-11 09:37:25', '2022-07-11 11:20:56', 1, NULL),
(291, 'Leif Jensen (3400 Hilleroed)', 's.l.jensen@get2net.dk', NULL, '$2y$10$3qxr/RV6JpbIA3lVKa2ZnOll9Ku0Yn9cYtha9Oc5WKyHo.Db0u4bG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:25', '2022-07-11 09:46:47', 1, NULL),
(292, 'Lis Konradsen', 'konradsen.lis@gmail.com', NULL, '$2y$10$cW7CystkcqkKgCX9LekAn.kbNBdMmqqo1pdgDcRVKa5xd0v.dz1hq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:26', '2022-07-11 09:37:26', 1, NULL),
(293, 'Lone Birgitte Christensen & Egon Hedegaard', 'lonebirgitteusa@gmail.com', NULL, '$2y$10$mP74MYNSZq7RP39H3HYUUuqoW.f9ZFflGtG.oTMz/yHdLA.MxZ.Ia', NULL, NULL, 'WwFMJ827gN7BOoMn5knWqVTcjJydxYkHA2Tan2BwX5p0wJKPc6Aq53JAqhwU', 0, NULL, NULL, '2022-07-11 09:37:26', '2022-07-14 14:27:47', 1, NULL),
(294, 'Louise Brodersen', 'loubrodersen@hotmail.com', NULL, '$2y$10$qVtKZq9duo1PxYXH548fCOB1TXPPIRhecTtDcqTbOTMTFVxlOtNAu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:26', '2022-07-11 09:37:26', 1, NULL),
(295, 'Mai Tram Luu', 'mtp.2000@hotmail.com', NULL, '$2y$10$T0P4GpjnEJog8XhPFwTRE.ETxFXYBeitHZjmMjJcwIcbwfk7nKY82', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:26', '2022-07-11 09:37:26', 1, NULL),
(296, 'Marianne Havbo Kaalund', 'marianne.havbo@gmail.com', NULL, '$2y$10$9NNAJPK27OP7mjuvcja/QO1lFn2A6nstjdn2gGsiXINClzVTL4ugm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:26', '2022-07-11 09:37:26', 1, NULL),
(297, 'Max Justesen', 'maxjustesen@gmail.com', NULL, '$2y$10$eU6OXHB3pQ9r.A7Q0r.yWuoSLrBJ4GamOXbFLPUFqOWbOpR/9Ff0K', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:27', '2022-07-11 09:37:27', 1, NULL),
(298, 'Michael Wennerberg', 'michael.wennerberg@gmail.com', NULL, '$2y$10$9i3.s8sT3RI8SvRZMfa/yuthMG1CVAJFbKRXZjcbInYHN3JjGWzYi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:27', '2022-07-11 09:37:27', 1, NULL),
(299, 'Mixa Holding ApS (Michael Andersen)', 'mia@mixaholding.dk', NULL, '$2y$10$//EyQ8HryATefHcBjUs23OKmANS1uxHwQGk8Z52cO6YFKYuMusyDO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:27', '2022-07-11 09:37:27', 1, NULL),
(300, 'Morten Nissen', 'Morpasnis@gmail.com', NULL, '$2y$10$G8tOZO3y06uVIP4VopPK1eFZEQ4Eb5nBppn4rBRptZ5P64p6CabcW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:27', '2022-07-11 09:37:27', 1, NULL),
(301, 'Per Visti Thomsen', 'pvthomsen@yahoo.dk', NULL, '$2y$10$fibABkDrCy3lXneBcR/wVeZC1oEHt8XDgRDZucfVNhqExFC4Qx6eG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:27', '2022-07-11 09:37:27', 1, NULL),
(302, 'Pernille Andersen', 'pernille.somom@gmail.com', NULL, '$2y$10$FQd.WEAgNNeVz372uQnl7eHx40UiWNhuI5c3rnjQaV6Kyl6MRzJSy', NULL, NULL, 'gjH7kqKiE2QL1wHRHUqyd6ZhCkR9btlhy0BReZkgjmy5kRZrsQrmDaXqjtJI', 0, NULL, NULL, '2022-07-11 09:37:28', '2022-07-11 09:37:28', 1, NULL),
(303, 'Peter Boennelykke', 'peterbonnelykke@gmail.com', NULL, '$2y$10$0k9UF6uQ4UAbEktig7DjLeR75mUbO4NC1kA6hwv95gNbz0ncwYBuS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:28', '2022-07-11 09:46:48', 1, NULL),
(304, 'Peter Rasmussen Consult Holding ApS (Peter Rasmussen)', 'pr@iheadhunt.dk', NULL, '$2y$10$HKPQuLhKQhTgrzDkbE0p3u5lZruUjJnmdlGVJKiquuIrLh1pQ.fzO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:28', '2022-07-11 09:37:28', 1, NULL),
(305, 'Rikke Petersen', 'rikkempetersen@hotmail.com', NULL, '$2y$10$Q//bqKiLyU6wIg6vFvyEw.LNyhgA2F4ECzfgVuDE7dwtVQmT5JFYi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:28', '2022-07-11 09:37:28', 1, NULL),
(306, 'Sten Aastrup og Bodil Stilling', 'Saaconsulting2016@gmail.com', NULL, '$2y$10$xdpHBQUkF8VcalfdT7VlCukbpTEMdgBFdZuVBvdMzbMIIwBrHuqfK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:29', '2022-07-11 09:37:29', 1, NULL),
(307, 'Thomas Hoejer Voss', 'thomas@famvoss.dk', NULL, '$2y$10$5HrixXSAkoKBrbUIwIA66e85wzvKtemkyGVTPiofpnKzqsBXdicGS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:29', '2022-07-11 09:46:48', 1, NULL),
(308, 'Thomas Sondrup', 'thomas.sondrup@gmail.com', NULL, '$2y$10$e21DPRuDbIfLR6ljhWWDDesYJJmKIV1uR82F5PF8KXxG/fTcdHiky', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:29', '2022-07-11 09:37:29', 1, NULL),
(309, 'Tidemand consult ApS (Per Tidemand)', 'pertidemand@yahoo.com', NULL, '$2y$10$tauej6XqWJ0j9LwlbvqOSeRau7feJdOooUTtzbspBa9ekKwUc5BgK', NULL, NULL, 'ZEeaauE2vCSwnUI7aeRRhoNRLxzAcZbSsn7eNwpw6WTeezL2ak1WId6K7N08', 0, NULL, NULL, '2022-07-11 09:37:29', '2022-07-11 09:37:29', 1, NULL),
(310, 'Trine Kappendrup & Kristian Holger Kappendrup', 'kappendrup@hotmail.com', NULL, '$2y$10$w0kHmBsbTGuXdkytoLKE3u3IG.Mv9n/uKf1EJ5a7aNZE1I9fasayS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:29', '2022-07-11 09:37:29', 1, NULL),
(311, 'Uwe Jensen ApS (Uwe Jensen)', 'uwe@lerte.dk', NULL, '$2y$10$ruvxTuSMNi552Dmlkyuy7uQlO5.hWJr2iZ.GnBtoW1SFBUfRenZPS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:29', '2022-07-11 09:37:29', 1, NULL),
(312, 'Zoraya Nieto', 'zorayashare@gmail.com', NULL, '$2y$10$lQbi7aHKFpW3mm0X32zKfueol7s..kWJR1w0Ynr7qThDfDAnNQGLK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:30', '2022-07-11 09:37:30', 1, NULL),
(313, 'Henny Skovbjerg Soerensen', 'henny.skovbjerg.soerensen@gmail.com', NULL, '$2y$10$6WGTvpYjbXkHKLx9qDsx7O8XED4SAnViF.FKBeQi5gUAWeKsjyRde', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:30', '2022-07-11 09:46:49', 1, NULL),
(314, 'Rolf Michael', 'rolfdmichael@gmail.com', NULL, '$2y$10$4Xn3JzR1VwPdecGvTS9lZew7MY4xqWj.qgIgc7eXBaccAdkZtXIe.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:30', '2022-07-11 09:37:30', 1, NULL),
(315, 'Helle Nissen', 'Hn@regnskabshuset.com', NULL, '$2y$10$uWvkoUgprDiHyt7QGi4Z4.WTWJ4V9AMAFU/MqISROwEFqEHiSasIS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:30', '2022-07-11 09:37:30', 1, NULL),
(316, 'Anders Bjoern Kristensen', 'anders.kristensen@live.dk', NULL, '$2y$10$cut8Kd59vJY2r1GKsKbWBeH48ajYL8RKmgt1jllUdjMXFYy1GF8mO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:30', '2022-07-11 09:46:49', 1, NULL),
(317, 'Ann-Cecilie Christensen', 'acsolen@gmail.com', NULL, '$2y$10$ChW..EgxpGVj7uTxvCcTaukBQ2hhRAGlI2Bett2pLoiGyBt88z81i', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:31', '2022-07-11 09:37:31', 1, NULL),
(318, 'Annette og Kim Hagenbo', 'annettehagenbo@live.dk', NULL, '$2y$10$15YOdeL6Tx6xDpce5aC.k.Z54qsmlc3pJBV8XpdbfE/2DEJnGfA3u', NULL, NULL, 'CVsOLCvH5OYrhjS52S4bj4bTedJlnyepz8ATCfheHN5thLDLo8eaR4mg1rt2', 0, NULL, NULL, '2022-07-11 09:37:31', '2022-07-15 18:12:24', 1, NULL),
(319, 'Birthe Hansen', 'bent.kay.hansen@gmail.com', NULL, '$2y$10$m3GjW2O4CliBhcn93tQEluUumAle0Ctukn.OlL2oC7JCIl7vmSfCO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:31', '2022-07-11 09:37:31', 1, NULL),
(320, 'Breath Holding Aps (Jan Lund Christensen)', 'jan.lund@toranaconsulting.dk', NULL, '$2y$10$PqZavjHilmaIYzOAK3KD5.GPyo27kwjiBKp3uWOJ.Db7Sh0jVrJca', NULL, NULL, 'T9tLzlSZrNmITpeyMQndhjlOcuTs4WGYfdT5B5kHfohgioOvTjYQTq8sdK4l', 0, NULL, NULL, '2022-07-11 09:37:31', '2022-09-24 05:07:15', 1, NULL),
(321, 'Carina Hartz Hamann', 'carinahartzhagensen@hotmail.com', NULL, '$2y$10$XKjEDtn/gOLHncSSAZjSI.YpjrzPnFS5luQ/1PXbBw1hgHkH32PrK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:31', '2022-07-11 09:37:31', 1, NULL),
(322, 'Carsten Huus Jensen', 'carsten.huus.jensen@icloud.com', NULL, '$2y$10$ubrNDtCRFJ675ky3j5J1BOR47sxL1G1me5odV1WHjjGmTvN6xDqsq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:32', '2022-07-11 09:37:32', 1, NULL),
(323, 'Christian Godske', 'goodspoon@gmail.com', NULL, '$2y$10$8EKs5abPahTl7VgOppa6eeGeQAr3u9.nRSOi/G1JJb5t0kB5fz5Fu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:32', '2022-07-11 09:37:32', 1, NULL),
(324, 'Claus Ejsing Andreasen', 'candreasen1963@gmail.com', NULL, '$2y$10$F0mA6OMR4hkvgg9liG8VOuRYU84tkD.qcndiN9fFKKRRNo9yY3ch2', NULL, NULL, 'D8iIlVKUfdNhZ2yYzkQ6bylLdbrhVtD7YzujMBqdjC1QmLi3gIBRwv3K4wVP', 0, NULL, NULL, '2022-07-11 09:37:32', '2022-07-11 09:37:32', 1, NULL),
(325, 'Dorte Sylvestersen', 'Dortesylvestersen@gmail.com', NULL, '$2y$10$brHzIjgeg2KTeZoNsKD9qukezjRpP9cLtES.v8vthmyX7m8WuEOmG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:32', '2022-07-11 09:37:32', 1, NULL),
(326, 'Else Martine Thomsen', 'else.noerris@hotmail.com', NULL, '$2y$10$UQ9wOhSHYxvzcSP/PwHh/OlMbNRHGSOUxfo/4NXKEVgSUVkrPfCsi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:32', '2022-07-11 09:37:32', 1, NULL),
(327, 'Frank G. Bennetsen', 'bennetsen@startmail.com', NULL, '$2y$10$0jA3ab9lYsUOX63ceh1TsuE2cpXt4HREgUw/oj7idiOOokg5Cvwum', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:33', '2022-07-11 09:37:33', 1, NULL),
(328, 'Jacob og Pernille Poulsen', 'pemu@advodan.dk', NULL, '$2y$10$JLpG5/GTvfA6kfZZ5EGVx.suEb/YH3koaEWpf4Bhc6uzWdLgZyNdq', NULL, NULL, 'sbU0OiIOFXDH5x4ajd0PDtZ9VhFzIT2QRv8pGfP6w3uvVInXLmbKIc17xmRE', 0, NULL, NULL, '2022-07-11 09:37:33', '2022-07-11 09:37:33', 1, NULL),
(329, 'Jan Strange', 'marijanstrange@hotmail.com', NULL, '$2y$10$yamRMuEDGyToz4w9J4kFoOV0IZ4uxaI9aOGZ4DuFSEIV2gwDfM.Ky', NULL, NULL, 'bIlcR9L0Mj26UwLOMBqm5TFfXCgxK6CY4vOUwe8tPGFA4x1DWzdl8aGxMq8L', 0, NULL, NULL, '2022-07-11 09:37:33', '2022-07-24 15:14:55', 1, NULL),
(330, 'Jens Martinus Hoeybye Andersen', 'jmha@live.dk', NULL, '$2y$10$19f8HzAluHlJKAI2GTtVR.5VE33XY6Pu1OFl8eY3V7U.EDSuC/a1a', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:33', '2022-07-11 09:46:51', 1, NULL),
(331, 'Jens Tuxen', 'Jktuxen@gmail.com', NULL, '$2y$10$6hTatfcMHAvQbWtyXpxAJe/OdmOXjynMzbyTcNkJ88vV1aC94Rvzm', NULL, NULL, 'g3cpQYP94jh2so8bBaALHvyzgAgssomMM9dRrxRQDaEUqdRYWHcXF8CIVTo4', 0, NULL, NULL, '2022-07-11 09:37:33', '2022-07-11 09:37:33', 1, NULL),
(332, 'Johnny Hansen', 'johnnyhansen@bbsyd.dk', NULL, '$2y$10$bEb/yj6/.2KC7XOyIOcHuOkMPIHR8lOT5M6UO8mgZRNNu6qGQiqUi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:34', '2022-07-11 09:37:34', 1, NULL),
(333, 'Joergen Mogensen', 'jorgen.mogensen@live.dk', NULL, '$2y$10$QN50CM8.CAjEsSfNohwsfuuoBQ4SlkO8Qdu3ksDCuhBDggVOEYYvO', NULL, NULL, 'SbEf1tBgWQx11HdSxct1Zd3CqHBjweRGxCxbVz4qrup0wdFdbgA4asfajhd4', 0, NULL, NULL, '2022-07-11 09:37:34', '2022-07-11 09:46:51', 1, NULL),
(334, 'Karsten Nielsen', 'knmail@stofanet.dk', NULL, '$2y$10$TFRalQBkbgScZndCCdgoKu5nUftVdwcoP1ykLBmN4fY64HTTPH9Ki', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:34', '2022-07-11 09:37:34', 1, NULL),
(335, 'Karsten og Anne-Marie Joelck', 'kjoelck@asia.com', NULL, '$2y$10$buOkyaN2cMPvIcIxQKSEQeYmkb0kgGsQu5saJ2cr9MEUCkOqMtPCO', NULL, NULL, 'zhX6gYKKTqeSszasasJRn0fMGl4tUuO5RTPJc1Y1tjLhULoB6wl7zerPcOxY', 0, NULL, NULL, '2022-07-11 09:37:34', '2022-07-11 09:46:51', 1, NULL),
(336, 'Kim Toft Andersen', 'kim.andersen@tetrapak.com', NULL, '$2y$10$03WXkNtaev2vRXlz6sZuXehDr9Mphnt88YN4cq./36LrhDo02nvm.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:35', '2022-07-11 09:37:35', 1, NULL),
(337, 'Kristian Koch', 'kk6046@stofanet.dk', NULL, '$2y$10$h3IxGEPJkQT7cMqG28ciKupQ4OzqhfDa0nKFcMpjFcO7RqZzHRt16', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:35', '2022-07-11 09:37:35', 1, NULL),
(338, 'Lars Dahl Pedersen', 'larsdahlp@yahoo.dk', NULL, '$2y$10$ieTs7ArZ3KQBqdRwtcLIzOvFXJ0vqzZUkqBdU5w9L8NH2FCUepqv2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:35', '2022-07-11 09:37:35', 1, NULL),
(339, 'Lars Erik Hoegh', 'larshogh@pt.lu', NULL, '$2y$10$n8tyFHRIfpufLQ8GoeUtV.ZQTbOMMkRMIX8mGilOX46qlficF1Jwa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:35', '2022-07-11 09:46:52', 1, NULL),
(340, 'Lars Riemer', 'lars.riemer@gmail.com', NULL, '$2y$10$Uvgqe6wWNgTSrt2hAvcTHOU5cNaQTXs.t2A0dQND8XdOU5VD7v7Qa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:35', '2022-07-11 09:37:35', 1, NULL),
(341, 'Louise og Soeren Steen Thomsen', 'soren.steen.thomsen@gmail.com', NULL, '$2y$10$z8zUSVcHkxkXc0krXJ8tv.PdXod4UrNTKzDuF5XcONgXgKdlKtabW', NULL, NULL, 'LUf3Lilsv8DoTG4QnvCmAVulwJbjw7FTMQagmIVVXgQbhK4tvtbtNwbXfflN', 0, NULL, NULL, '2022-07-11 09:37:36', '2022-07-11 09:46:52', 1, NULL),
(342, 'Martin Havreballe Dupont', 'mhd@mesica.dk', NULL, '$2y$10$CiXYQ5D0YRcQOXtTthU9UOxyHGi9/.rMZYSut9nL93J76Wtw8me7y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:36', '2022-07-11 09:37:36', 1, NULL),
(343, 'MHJ Landinspektoerselskab Aps (Michael Jonasen)', 'michael@jonasen.net', NULL, '$2y$10$k2ugTeJiO5CmnUEyXhHsc.jrPcLkHJorDkN8znTZv/T1V7nW6YBEq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:36', '2022-07-11 09:46:52', 1, NULL),
(344, 'Michael Wognsen', 'Michaelwognsen@gmail.com', NULL, '$2y$10$F1V4aRXyzdioK8S.nrUK1.Y/1y3n.zFlOSzSrrprbUv1pXijQ9Mw6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:36', '2022-07-11 09:37:36', 1, NULL),
(345, 'Mikael Rasmussen', 'vassing@gmail.com', NULL, '$2y$10$HipGHOikhU2KztbQHwsC6OHhqaA4WNvJwAOaCp1bXonOeRHqvbQYO', NULL, NULL, 'NhDrF9AzH4aFR8UYRjUlWoMzQwvVPlPRE0TzF6ZvC3wkGoXEvVT7rfT4HTim', 0, NULL, NULL, '2022-07-11 09:37:37', '2022-07-21 07:18:19', 1, NULL),
(346, 'Morten Christensen', 'moch1@live.dk', NULL, '$2y$10$nNJdwKezWRt1yPcQ1d.OX.wXX4xdlYq93ATFQbEYRjTozKuFBFRfm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:37', '2022-07-11 09:37:37', 1, NULL),
(347, 'Niels Klinge', 'Niels@nkon.dk', NULL, '$2y$10$dDTLhfChGVULiLQ7qpRb.u14/2bx8UWR6/5KrXH9KkMxc36v112lS', NULL, NULL, 'Czh5z9csjTzQMMs4VSpMNJRX5w5PRSRpHdQrNjQTM7uF68SuQ01TgiytpbgI', 0, NULL, NULL, '2022-07-11 09:37:37', '2022-07-12 16:20:26', 1, NULL),
(348, 'Nikolaj Sletten', 'nikolajsletten@hotmail.com', NULL, '$2y$10$LxTRJ6GcFKzoWzUN7lRoB.kB6/SuHwtjSG.z3g4P51B2Zv02iz4ty', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:37', '2022-07-11 09:37:37', 1, NULL),
(349, 'Per Hansen', 'edaph@post1.tele.dk', NULL, '$2y$10$aZc8QJxvjlQOiwYbzeZt9.DwbDxD5Eh5LyZqwX/5nEf.Ymi.Mxym6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:37', '2022-07-11 09:37:37', 1, NULL),
(350, 'Preben og Mia Pedersen og Tine Emilie Rix', 'Prebenpedersen68@hotmail.com', NULL, '$2y$10$JWpCdyhuapfqexWo/DXLu.ATpikUvwLQ.uV5WrGa225c/yTfwId4e', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:37', '2022-07-11 09:37:37', 1, NULL),
(351, 'Rene Noerbjerg', 'rene.noerbjerg@gmail.com', NULL, '$2y$10$.58yVjU65zHDMOF6H.O/aejctLoFulsCkz5MpQMiCOMr4mJted2T.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:38', '2022-07-11 09:46:53', 1, NULL),
(352, 'Ritta List', 'rittalist@webspeed.dk', NULL, '$2y$10$oWLwPgj/hFkec9AuqNQlquot.0iDPxWA/ULARLqP7cKijP7Hm649.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:38', '2022-07-11 09:37:38', 1, NULL),
(353, 'Samuel Sayilgan Nielsen', 'samuel@sayilgan.dk', NULL, '$2y$10$Nwd0HnCYwCfyuKKChx3m0u02QgMdJHI2Vj64GN44KDymbG/KL.q8y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:38', '2022-07-11 09:37:38', 1, NULL),
(354, 'Sigja Aps (Frederik Bille)', 'fbille1@gmail.com', NULL, '$2y$10$0ctBQTxtxuU2O4KYcKBMAOPis6zYqHsdtvupIVPKDLy.Ml1LyDk0C', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:38', '2022-07-11 09:37:38', 1, NULL),
(355, 'Sonia Kabwa Boersen Hansen', 'skabwa@gmail.com', NULL, '$2y$10$stKRMRLzuk3FkHOXHDu1GeZfdVDEnMWgx2.m7vp5EdUthxYIPrt.a', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:39', '2022-07-11 09:46:53', 1, NULL),
(356, 'Statsautoriseret Revisionsholdingsanpartsselskab (Hans Olsen)', 'Hans.Olsen@crowe.dk', NULL, '$2y$10$ygHV0SYqPq9ykygU9H/kS.E6aubvLHClSajU.VpK.g5J4e43CZkym', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:39', '2022-07-11 09:37:39', 1, NULL),
(357, 'Steen Baltzer Pedersen', 'steen.baltzer.pedersen@godmail.dk', NULL, '$2y$10$ZtT8SZuPL7owxgZVZ9KTZ.jljzmJjOCD4qfV3nIPao/MiPd.zKsNq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:39', '2022-07-11 09:37:39', 1, NULL),
(358, 'Svend Bay-Smidt', 'bay-smidt@stofanet.dk', NULL, '$2y$10$qg5RubRyWF61eUACDLbikuAZW/sgHjkqtJCE0Qhcxjj9cyuirHcQm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:39', '2022-07-11 09:37:39', 1, NULL),
(359, 'Svend Soerensen', 'dortesvend@gmail.com', NULL, '$2y$10$2HccJjwBV13xW/q9wrF7NeBSAMbJE/WYPIM41rPbEqbAh5M3JpZBa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:40', '2022-07-11 09:46:53', 1, NULL),
(360, 'Svend Aage Iversen og Karin Mette Clausager', 'svkm@privat.dk', NULL, '$2y$10$1mm.9SD6uZbkqesj.CT.EO/NcIDeZ07wdy9NIvIsy2PvCAUZ5qWl.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:40', '2022-07-11 09:37:40', 1, NULL),
(361, 'Soeren Moeller Larsen', 'soerenmoeller@outlook.com', NULL, '$2y$10$7flF12mRYj8l9eXtPydhi.4kFHFrVXA8CiNdrkXJAlSOur.ANl89.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:40', '2022-07-11 09:46:54', 1, NULL),
(362, 'Thomas Brogaard Seest', 'thomas@seest.eu', NULL, '$2y$10$drkDjf829du6LkRv89IO3.qEBm2FA21WW09kqDKR2C/Xq7fB3LXfO', NULL, NULL, 'hrsw8oZJbQ6pJQVLGryKxkaRb6tvIo8Lby1TXyANDMz76rGO1cmUXoEGU9Mi', 0, NULL, NULL, '2022-07-11 09:37:40', '2022-07-11 09:37:40', 1, NULL),
(363, 'Tine Elin Christiansen og Preben Gorud Petersen', 'Pgp@post4.tele.dk', NULL, '$2y$10$r5BBHcGlopufMFvsw7dWIOGY8mHqgS7dJKk7M8.8jB14oXM0TqB4W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:40', '2022-07-11 09:37:40', 1, NULL),
(364, 'Tom Noerregaard Jensen', 'tnj_jyllinge@yahoo.dk', NULL, '$2y$10$8cdth0koWF1pfLC7SNOZ0OfCfO7UenBwo5dJTDIrPsu3FgAfZ5wNS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:41', '2022-07-11 09:46:54', 1, NULL),
(365, 'Torben Valentin Joergensen', 'torbenvalentin@gmail.com', NULL, '$2y$10$ysxyb8qWw8aPbEedis5SoeDFwSFEyWNu7S0X.mzx2x/gkK387ww9u', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:41', '2022-07-11 09:46:54', 1, NULL),
(366, 'Trine Stensgaard Madsen', 'trine@trinemadsen.dk', NULL, '$2y$10$2xwv/k./zo/9MMzxK0nuV.aARh2ASfFW0JJy6ZObaLHaapPRJiS4W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:41', '2022-07-11 09:37:41', 1, NULL),
(367, 'Ulla og Christian Lagoni', 'familienlagoni@bbsyd.dk', NULL, '$2y$10$dDFocAM/lSSCiVTehjC7NOdMfFq2kLU9BtsKGf7eKl/CELGD19HM2', NULL, NULL, 'K24nnXoAScXsrEkt6Hv34qGONS31hZGBfuvipMkcBBkmBXsBx31SXqGmrMhG', 0, NULL, NULL, '2022-07-11 09:37:41', '2022-07-11 09:37:41', 1, NULL),
(368, 'Joergen Meedom', 'jorgen@meedom.com', NULL, '$2y$10$Jm/dW7ZMliRSeTqWlYRbY.2WSJA8wbwVnhevRfoZ4HhyXdk53a2..', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:41', '2022-07-11 09:46:54', 1, NULL),
(369, 'Ann Splidt Rimmer-Kvalvig', 'kvalvig@gmail.com', NULL, '$2y$10$NQCk29Mx576DJZCzN3EgLerJFslAl5jsYNUs2RSJ44JVcvr9fNRrW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:42', '2022-07-11 09:37:42', 1, NULL),
(370, 'Maria og Ulrich Feldfos', 'feldfos@feldfos.dk', NULL, '$2y$10$bxIFNrL69w9/03zmOiUXKuO9WZArQlV0xLD9sfR.eEe3TDbdWi0ui', NULL, NULL, 'kWDDV2RgeUJmiRFhP4smfXI4dyug9JGx3JQISdYd9wdfZ0wO42il91rUvuB2', 0, NULL, NULL, '2022-07-11 09:37:42', '2022-07-11 09:37:42', 1, NULL),
(371, 'Lisbeth K. Keller og Johnny Keller', 'lisbethk.keller@gmail.com', NULL, '$2y$10$LzBZHs4u/bSpwyxOH/68R.fYjXuo2IzQVA6Wd7VLrZOplE.LZq34W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:42', '2022-07-11 09:37:42', 1, NULL),
(372, 'Kim Larsen Christensen', 'klchr29@gmail.com', NULL, '$2y$10$31Ro0ThLq.QjjVaaGPH0Y.dq9JTfL92TBdSWTEve2RYAxIRGu28Sq', NULL, NULL, 'VgpExQyXGoqN7VHP3v13zGHLiMHg269dSqN28V4C755vPI71LDAmUfoQo0QB', 0, NULL, NULL, '2022-07-11 09:37:42', '2022-08-11 17:33:45', 1, NULL),
(373, 'Simon Sayilgan', 'Simon@sayilgan.com', NULL, '$2y$10$InWvATZJd4GMfAkPbUnxnutDRkhWK1WK7YYsTPgGZJs6fHucwjKzy', NULL, NULL, 'IuUYXTELlqtBxIwdHF7Aow7cywW9sWKlTusVkiE8JqxnRYjM0XJnI2sk5DSA', 0, NULL, NULL, '2022-07-11 09:37:43', '2022-07-11 09:57:06', 1, NULL),
(374, 'Christian Hald', 'haldmortensen@hotmail.com', NULL, '$2y$10$EQzNGb40Kn0rhNRvtJOK/uN1t1I8oqaaoUtK9qeMCFeF6ma8vLpn6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:43', '2022-07-11 09:37:43', 1, NULL),
(375, 'Mette og Steen Schleicher Pedersen', 'steenschleicher@gmail.com', NULL, '$2y$10$qglmOsVqf7Is2OkNW8OJ9ONhe5EsEl4ySmyv2DLVMhz1J2RC.R1pK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:43', '2022-07-11 09:37:43', 1, NULL),
(376, 'Christina Prinds og Morten Pedersen', 'cprinds@gmail.com', NULL, '$2y$10$GmnAu7eGp.eQSVHaHWdls.TKtBO.pel26x64iLbcvDW/fM.BcL8Ku', NULL, NULL, 'WogUW0bPWmQU2ZdDjcQD28k7lGrAAq6uYzHabF09K8Pe8kMGGPi57JfJ1e9O', 0, NULL, NULL, '2022-07-11 09:37:43', '2022-08-17 19:08:49', 1, NULL),
(377, 'Henrik og Leticia Holm Andersen', 'letihen@gmail.com', NULL, '$2y$10$svVRLrOdlzvZU1y9GjH6nOLPJAIFyux6vexpBhoJ7TNK/gG6LPuly', NULL, NULL, 'AR7KN6fkiiY2UxEWALmWsyl134g71joRLU4oaOoDPaqYdQ4NbeEx8Jl6aSA8', 0, NULL, NULL, '2022-07-11 09:37:43', '2022-07-11 09:37:43', 1, NULL),
(378, 'Anatoly Mikhailov', 'aumikhailov@gmail.com', NULL, '$2y$10$TSmgZwlfTdD.09sm/I9UP.rcJXj/KTka9hiKX7VXnLUemicQHQw5C', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:44', '2022-07-11 09:37:44', 1, NULL),
(379, 'Anders Holboell', 'aholboell@yahoo.dk', NULL, '$2y$10$GtIewJ./gMzQm06lqIV0iur.0AsxUIDSZVK5Yk6YvPNKTOS0S11WW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:44', '2022-07-11 09:46:55', 1, NULL),
(380, 'Anders Rousing', 'anders.rousing@gmail.com', NULL, '$2y$10$0b4HIwiG0PX1.7N0aHEJzeyPSactUYHxSUQTycMYy3ga1tcM5lY6m', NULL, NULL, 'Dmetas5ipLJw9MBk2fto55JRKmDOuZ5A7waQggCJHpwKuurDmKgADpkRaQHi', 0, NULL, NULL, '2022-07-11 09:37:44', '2022-07-11 09:37:44', 1, NULL),
(381, 'Anette Overgaard', 'anette@villanikos.dk', NULL, '$2y$10$eB4SvHvYT3fEwXKdDaf69eisk2Ad7rxDoI9vrtErb7Qor24TpAxrW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:44', '2022-07-11 09:37:44', 1, NULL),
(382, 'Asger Bjerre', 'asgerbjerre@yahoo.dk', NULL, '$2y$10$RJ9pQ.Id5GgjCdv3QG317eDOHTDuKjklmFgHNtGkP.PMD2SuQ9CM2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:45', '2022-07-11 09:37:45', 1, NULL),
(383, 'Bendt Hejboel', 'bendthejboel@hotmail.com', NULL, '$2y$10$M5.tU7U9dyciPNpbnlM5ZemNH8jLA8YiHM1FBPSgKuOg1wkieQLbe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:45', '2022-07-11 09:46:56', 1, NULL),
(384, 'Birte Vivi Hunnicke Nielsen og Kurt Thomas Jensen', 'vivih.nielsen@dca.au.dk', NULL, '$2y$10$KyGGOymeQxbws63nyPmbC.RYXdWIGDF.15jkaLfk08M2Bj57fF9g.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:45', '2022-07-11 09:37:45', 1, NULL),
(385, 'Birthe Emborg', 'bvemborg@gmail.com', NULL, '$2y$10$VnI18I6a6adsoqkvt.4Lz.Ui6Vl1ZgCODnB3MMSJWTDyCZT9HTH1G', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:45', '2022-07-11 09:37:45', 1, NULL),
(386, 'Boris Bolvig Kjaer', 'boris@boc.dk', NULL, '$2y$10$Irxcev.HGMDjRw3x9iQiKeQl/oZATrdBaVzBvbW7MJ3gSsXm2Ufo6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:46', '2022-07-11 09:46:56', 1, NULL),
(387, 'Camilla Morel Laerke', 'camilla_morel@hotmail.com', NULL, '$2y$10$FzRhjHRu8u3yOcLTbV2JrOuhT/Fb9Z9aTA9SFJif581h6Q0tP56pu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:46', '2022-07-11 09:46:56', 1, NULL),
(388, 'Casper Kyed', 'Casper@kaffedeal.dk', NULL, '$2y$10$SFo/kwH6UVV1yAUIR5hpFOhcYGITGJ7bTDmBRzEZ7AhzUdpcFZcii', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:46', '2022-07-11 09:37:46', 1, NULL),
(389, 'Claes Ertmann Olsen', 'claes.olsen@ertmann.com', NULL, '$2y$10$M8aKNX.4OrGBJK5XfG/7je1TjdcxcpaPHlcGQndiMz7Zg1waqp5mm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:46', '2022-07-11 09:37:46', 1, NULL),
(390, 'Dann Olsen og Vibeke Lykke Olsen', 'lykkes1@gmail.com', NULL, '$2y$10$F6VbRibAMGhvB5AySxTwneFgM6MLi6SfyepWkJtfnOMCEQk7Fwb2C', NULL, NULL, 'f7UyMGKWMplPDHaRvawkwUSYUOL9we4c7DspgX8487QKglZgL7gSn5KAHDx7', 0, NULL, NULL, '2022-07-11 09:37:47', '2022-07-26 13:47:02', 1, NULL),
(391, 'Else Bjerg-Pedersen', 'elsebjerg@icloud.com', NULL, '$2y$10$FGOI16gTUsP6aDW1itZ79eJ/6vIcWcIISdvSug3cWv86Y02/F28/2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:47', '2022-07-11 09:37:47', 1, NULL),
(392, 'Esben Fjelde Christensen', 'fjelde.christensen@gmail.com', NULL, '$2y$10$xHnrewfoXbO.bQ4C5lLRAeP5VxlZYQgFo4buTe2vreaGJ1T6Ztjgu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:47', '2022-07-11 09:37:47', 1, NULL),
(393, 'Finn Lunde', 'finnlunde@mvb.net', NULL, '$2y$10$BEcIwFBqXaaWAd6xwtvu6.XIlxz8i7DGW3Qn3nukgGXPXPFRhWWsa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:48', '2022-07-11 09:37:48', 1, NULL),
(394, 'Hans-Henrik Groendal', 'Hans-henrik74@hotmail.dk', NULL, '$2y$10$nFrMG8c71pFWd1BXW.x6pu16fvnEraqF8EDeVxdT/AfERm/2IKnve', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:48', '2022-07-11 09:46:57', 1, NULL),
(395, 'Holdingselskabet POA 2009 ApS (Poul oe. Andersen)', 'Poaconsult@outlook.dk', NULL, '$2y$10$46GuKuSFk1DXanfwRIGohuVBFW3LJZfwAlTui7W2SXPxwcW/OMepS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:48', '2022-07-11 09:46:57', 1, NULL),
(396, 'Hoejbjerg Holding Soenderborg ApS (Henning Hoejberg Kristensen)', 'Henning.karin@gmail.com', NULL, '$2y$10$oaahod7zO2/SOJ14Z8SRDeQGL05xAVrfX6rTLuut5Up69e5IYCU.q', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:48', '2022-07-11 09:46:57', 1, NULL),
(397, 'Ian Sehested Hansen', 'ian.sehested@get2net.dk', NULL, '$2y$10$VTdkIjEkh7XNi1okAm5SrOOU8xnqk0XDI/y3plvO7G9sfhQDsSssC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:49', '2022-07-11 09:37:49', 1, NULL),
(398, 'Iben Refstrup', 'Iben.refstrup@gmail.com', NULL, '$2y$10$0ulkhL/lupkyCO2J.UOdDOhHUPKwykEmy0vywSRoItlbEDIjbXtW6', NULL, NULL, 'U0IDuRwq16r9N4q166hB1xDVv5VRdZcrkK1XLF7j9Hp94HFC3j7mUuqcWjut', 0, NULL, NULL, '2022-07-11 09:37:49', '2022-07-11 09:37:49', 1, NULL),
(399, 'Ilse Christine Noerr', 'ilsenoerr@gmail.com', NULL, '$2y$10$Z.4tOisluKLGquS.uZzPz.9pIsus4bFLPvAszAwuSrJY6TGydUFZe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:49', '2022-07-11 09:46:57', 1, NULL),
(400, 'JF Nejstgaard Holding ApS (Finn Nejstgaard)', 'Finn.ne@gmail.com', NULL, '$2y$10$0Vl1eL/zQLfqUkrs4rpRauIRm6MW2ay1X/7mywBipiGlxCtkgTlTu', NULL, NULL, 'MH6iOjqionGpaBabXhzmlaToyn3GilBX0FDZ8QudPDvqCUe7afb3I4ZlbpCy', 0, NULL, NULL, '2022-07-11 09:37:49', '2022-07-11 09:37:49', 1, NULL),
(401, 'John Amby', 'ambystudstrup@gmail.com', NULL, '$2y$10$Setn6FtkS0JvXdwY87fl6OGTQMzrE6VtGOZH81ytl0ThtwcH1V1fe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:50', '2022-07-11 09:37:50', 1, NULL),
(402, 'Jytte Irene Poulsen og Soeren H. Nielsen', 'Jytteogsoren@gmail.com', NULL, '$2y$10$D30u4RirTc9fcWOxSMV/MOzEskdid7ANu69TQZ84RNsLy5OzkXey.', NULL, NULL, 'xQr6BTS0UW6q44jWn0jzc6EcrHcXeEpr3PYjUkbbUk7egMLAbworBUTSh2lX', 0, NULL, NULL, '2022-07-11 09:37:50', '2022-07-11 09:46:58', 1, NULL),
(403, 'Kasper Kvist', 'kfkvist@hotmail.com', NULL, '$2y$10$vG.DlhXSNltU0c0wJDVt8uIU2cv4EeUMVad/Lpvg6vzHlYTwbuhjO', NULL, NULL, 'aKDo2kKu60Di4D6wLkwsocLtaujDA1t2XCwzbq9C41l7Q7bll5PE7Gu6sYIz', 0, NULL, NULL, '2022-07-11 09:37:50', '2022-08-03 06:06:54', 1, NULL),
(404, 'Keld Lehrmann Madsen', 'Keldlema@gmail.com', NULL, '$2y$10$2XuE3ABMy35S0qS4lNmOT.hxkESfgtB8C51yf2lQmnnJn0Dz8nZZS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:50', '2022-07-11 09:37:50', 1, NULL),
(405, 'Ken Willen', 'reklame@willen.dk', NULL, '$2y$10$4sUehFD.5LaYJx9G7rJPPeCHwfcYYHduZcXbCTv6lgLVUleG5PPue', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:51', '2022-07-11 10:05:35', 1, NULL),
(406, 'Kristian Troestrup Knudsen', 'trostrup@gmail.com', NULL, '$2y$10$WhuWHKZdevZ/.BirNA376eoxUNuGdYoM05OFQW8pAPueujRT2xgve', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:51', '2022-07-11 09:46:58', 1, NULL),
(407, 'Lars Olesen', 'lsolesen@gmail.com', NULL, '$2y$10$htLk9aQPFzVR82j4PjXSK.a5ViCu8l.UrUpBWCr1jmU6MyflYjIP2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:52', '2022-07-11 09:37:52', 1, NULL),
(408, 'Lars Toft Madsen', 'larstoft@hotmail.dk', NULL, '$2y$10$6NlGLG.3rRldXHkY235.Qewe5Z6OXwAlqlAKpuApjKGK5cFTPyUvq', NULL, NULL, 'xG5iiOt7t8P24Pv2WhJXp85zNMajNA8M5zLKLNAv9VIQV17rDCkxxB7KBQd2', 0, NULL, NULL, '2022-07-11 09:37:52', '2022-07-11 10:48:41', 1, NULL),
(409, 'Lene Hulgaard', 'l.hulgaard@gmail.com', NULL, '$2y$10$qdB4wkypFwLYxhIymHnA8Oz4Y1Fcox4WsauleX2hJM/dcrnHAKw4.', NULL, NULL, 'umxPEmXuxuDgEacvvLwkxo7SoqpoKMRwiJcx0jRG3tc88X4HfuVvwWkyhZn8', 0, NULL, NULL, '2022-07-11 09:37:53', '2022-07-21 17:25:27', 1, NULL),
(410, 'Lukaf Holding ApS (Henning Abel)', 'ha@nationalrevision.dk', NULL, '$2y$10$mlodDIcuclYas8tN51ZXfu7eJMRo19PWgdOs3nk1TQ5IoBhQYKu1W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:53', '2022-07-11 09:37:53', 1, NULL),
(411, 'Mette Viller Thorgaard', 'thorgaard@godmail.dk', NULL, '$2y$10$d/VNNXZ5r4aYXHidQfqqFuLseNkYkwPIn33CutGvMaRFlm7jLUWK2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:53', '2022-07-11 09:37:53', 1, NULL),
(412, 'Michael Reber Knudsen', 'michael.reber.knudsen@gmail.com', NULL, '$2y$10$O4aDQDue6IN/OJapx3WCe./yFkNP3Q1GnfuzrYUNyg290maHNB/4S', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:53', '2022-07-11 09:37:53', 1, NULL),
(413, 'Michael Tornhoej', 'michael.tornhoj@devoteam.com', NULL, '$2y$10$dyCZsFOUuVHyvh20JJ0oA.vsFl0LE46NSKLrKOGVvt7ZB1ia8ScAa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:53', '2022-07-11 09:46:59', 1, NULL),
(414, 'Mikkel Thusgaard', 'mikkelthusgaard@gmail.com', NULL, '$2y$10$5BRvuMyfpABAp4okmJPh0ephPXWAtTh3jbFP3aM8sCDupNqzfHCSK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:54', '2022-07-11 09:37:54', 1, NULL),
(415, 'Morten Solgaard Thomsen', 'morten@reglab.dk', NULL, '$2y$10$kAcsS2Ek6Fd7Xi3wfGGyzeIxBloxAh19jZfKUQrdgq9ytAPm6GSAy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:54', '2022-07-11 09:37:54', 1, NULL),
(416, 'Niels Eilersen', 'nielseilersen@yahoo.dk', NULL, '$2y$10$ZXB6AuSPZqeLCNXv0KfGQu0SWkvK881XcsRPeJsruSmpy5aFqOFXu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:54', '2022-07-11 09:37:54', 1, NULL),
(417, 'Niels Germod', 'niels.germod@gmail.com', NULL, '$2y$10$ECRDtZoJmecNEHjXNlaQkOjBl8iAsyz.UmAWNE0KCNhP2qM0gf.Iy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:54', '2022-07-11 09:37:54', 1, NULL),
(418, 'Ole Stidsholt', 'olestidsholt@gmail.com', NULL, '$2y$10$8MakVGYuewIfyqghp/fNTuI03RFbMBcYm/NQfV26RZeT5UoR6WV2y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:55', '2022-07-11 09:37:55', 1, NULL),
(419, 'Orla Riishede', 'go.riishede@gmail.com', NULL, '$2y$10$itgeHN5mJNAao3Wve.VIFeqn5n9xcrbBt3UaDunG0C2T9CEd5WyYq', NULL, NULL, 'tEanuG4g7PR5PVlcXgWlvGbU3TG8SmT5ATXwjyGYpoy86FZyktRBY11jeLXM', 0, NULL, NULL, '2022-07-11 09:37:55', '2022-07-21 11:25:15', 1, NULL),
(420, 'Ruth Axoe og Flemming Hansen', 'syrakhansen@live.com', NULL, '$2y$10$NEDU1dQZyz0VgUXwX.ALeenN3jqfsUPyxczCMrSFMyrvn5lM8LQqy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:55', '2022-07-11 09:46:59', 1, NULL),
(421, 'SL Holding 2004 ApS (Soeren Lindberg)', 'sl@sleftersyn.dk', NULL, '$2y$10$TECbwMxNgSH7v04qXVKLreEub7CLKXE2/A4k9HUpWdxAQwaViqct.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:55', '2022-07-11 09:47:00', 1, NULL),
(422, 'Solveig Loevendahl Gustafsson', 'solveiglgustafsson@hotmail.com', NULL, '$2y$10$zVEfCnB6DK6fYfvf6igWWOfrAV3jQj9ttq0Qiyicxej4dZ0alUP0K', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:55', '2022-07-11 09:47:00', 1, NULL),
(423, 'STKN Invest ApS (Steen Knudsen)', 'tandsteen@post.tele.dk', NULL, '$2y$10$gtCuQz7/e61xcEQ.2oXkLO45wUj4YBVIZoDx1ICpg6.sESTes5vwC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:56', '2022-07-11 09:37:56', 1, NULL),
(424, 'Svend Braemer', 'svbre@sol.dk', NULL, '$2y$10$M98rMdoyR6vDargjX8snxuYk/vtmtpA.jh553X6pdyL21aSjeZhEu', NULL, NULL, 'JoUyvW4lB3Qd2EEeU7qHmWXaZg4N9Z8suz1PmWGIZ42xHKkzxVw3wA97o1Pv', 0, NULL, NULL, '2022-07-11 09:37:56', '2022-07-11 12:19:56', 1, NULL),
(425, 'Thomas Andreasen og Tina Cartey Hansen', 'thomas_andreasen@hotmail.com', NULL, '$2y$10$nX7N43Z33OISyIDszVcH3OGBFjAgLQ4u10w06uNyLkgJwrMFj4nkW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:56', '2022-07-11 09:37:56', 1, NULL),
(426, 'Tina Meidahl Holstener', 'holstener@gmail.com', NULL, '$2y$10$/t/ZfRwShY6RpvndzpMM6.T.1lbCibivjqI2Z3ZEDjQhDZbQ9SdRq', NULL, NULL, '5iKghi5ptU7NBeSW4Hsu4Gs70jRdk9QOKcxZiEDxVEWFoOG2qUNOe8OSiG02', 0, NULL, NULL, '2022-07-11 09:37:56', '2022-08-11 14:55:08', 1, NULL),
(427, 'Investering og Feriebolig A/S', 'booking@investeringogferiebolig.dk', NULL, '$2y$10$epokGepE.Lkd3CiMGgiJDuK3k4XE9H0VSeTjrHzxLAIkZwVAALh4.', NULL, NULL, 'QSP0kYrnC0RUlBVSsaKO4xH7eTAKE89NMgmeYWV3bdBMoHrlFLBjn5VXbtX3', 0, NULL, NULL, '2022-07-11 09:37:57', '2022-07-19 11:04:08', 1, NULL),
(428, 'Alex Poulsen Arkitekter A/S', 'rn@alexpoulsen.dk', NULL, '$2y$10$SJv9161ehBZnItzTSuaX1uSK0JEh0oEuXY6Zhwkx91ktFX.kcefPi', NULL, NULL, '6NNHYDcZy2gtRK8AkXi7BUvGtu7Z5595YDj1fUA5jkOAQ7cpWDBOXT0yRz2F', 0, NULL, NULL, '2022-07-11 09:37:57', '2022-08-14 11:59:55', 1, NULL),
(429, 'Anett Wiingaard', 'anettwiin@gmail.com', NULL, '$2y$10$Erdrdm2T80ZIrraSYJ3q9.nTMMdQv3dlznIf5Fz27.NIMDXfFS3DK', NULL, NULL, 'bBXr9P3eIMn83swUVsvq9HzFmOxkLnlUr6TxSRwQ80Maq9q4QrTsF3FQMuZj', 0, NULL, NULL, '2022-07-11 09:37:57', '2022-07-27 11:36:01', 1, NULL),
(430, 'Antoinette Eichler og Christian Richard Olsen', 'back@paradis.dk', NULL, '$2y$10$zi7iTLpqmjQ.L05uIlHV2uwdBPieyax9gdCb8oJzs.ywdIL7pO1Ta', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:57', '2022-07-11 09:37:57', 1, NULL),
(431, 'Anton Stonor Holding ApS', 'anton@stonor.dk', NULL, '$2y$10$YYj9NpCbsC0W7cd1blwjh.uJ1gnUC695pmUjfBbQ3kS.9u/BJVTOG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:58', '2022-07-11 09:37:58', 1, NULL),
(432, 'Arne Moeller Eriksen', 'amefirma@gmail.com', NULL, '$2y$10$NFYs6wdZEK614tN4X3PpSOcMXj0SyiIHzXOWLqBL5OjbQbxVen0C6', NULL, NULL, 'oNRsu8GEJst4Kt1YM76YHfThQ4MMwaL2FoBlCsK5ysILftigwIOUTNfAKgWU', 0, NULL, NULL, '2022-07-11 09:37:58', '2022-07-11 09:47:00', 1, NULL),
(433, 'Brian Skov', 'briansadresse@gmail.com', NULL, '$2y$10$pacxgJ3z8pKgy0QTybPc5.eFDmhS5XqDgUo7L02IeV1ulKxlxsoMi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:58', '2022-07-11 09:37:58', 1, NULL),
(434, 'Britta Skjoett Soerensen', 'britta.72@hotmail.com', NULL, '$2y$10$gCPCgYGmkrw7ajBd6JBmIuTPKR25HbDbz/V/8w7.hdtvxnArVJb3e', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:58', '2022-07-11 09:47:01', 1, NULL),
(435, 'Buhlinfo ApS (Nikolaj Buhl Jensen)', 'buhl_jensen@hotmail.com', NULL, '$2y$10$Jo78NFXGG0doLXActK08teiKF4pCB7ud0X1rP9he/E0KdWQf.TY02', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:59', '2022-07-11 09:37:59', 1, NULL),
(436, 'Casper og Mia Jensen', 'Casper5000jensen@gmail.com', NULL, '$2y$10$8z2HlVHSUaSgf86.M5vFaOY93gqG12yEx.K/TBNpl8CTu5QZbANa6', NULL, NULL, 'e2oG8CREbKgjAuHxGgxKXaq2OSWHR1HG1olBpd2i3nMVH4uk5iI3oHSEwg8p', 0, NULL, NULL, '2022-07-11 09:37:59', '2022-07-11 09:37:59', 1, NULL),
(437, 'Charlotte Bjoern', 'clotteb@hotmail.com', NULL, '$2y$10$xwj1k2lvlPfTMmn2.Twh8ePJXH3sZX8K8obTXnEK6LMcRl9aPNp72', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:59', '2022-07-11 09:47:01', 1, NULL),
(438, 'Charlotte Ottar Merland', 'charlottemerland@gmail.com', NULL, '$2y$10$AffpTjJkTPWrwyuwpovkZ.11kKQTCNcvmU9TMzNyTtPorEFNxyJc.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:37:59', '2022-07-11 09:37:59', 1, NULL),
(439, 'Claus Aakjaer Qvistgaard', 'clausq@gmail.com', NULL, '$2y$10$8RgzmGW0844gxogT/7endO/aw0WbfCS4Q9lWQkBSFTPIA42m26yAG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:00', '2022-07-11 09:47:01', 1, NULL),
(440, 'Daniel Otzen og Ane Schwartz', 'aneschwartz@live.dk', NULL, '$2y$10$M1Lu6zWqjQ.U0mupKL/Urel/tkTnpzAkypG0UIURzDMVcQHWL7v9y', NULL, NULL, '2BhToCpGtyfp0pNlr9vfCB8yzhp8Cd915g4XncSAsLrafuNu3v490q9Ou7N5', 0, NULL, NULL, '2022-07-11 09:38:00', '2022-07-11 09:38:00', 1, NULL),
(441, 'Ditte Sidelmann Brinch', 'Ditte.s.brinch@gmail.com', NULL, '$2y$10$kYfExU.x2wDzTAz66XlaMOJX15HZ..m0M4TuYYoBX7yYaQt0TkJUG', NULL, NULL, 'VaYNqyRmn6xI2bTR5d6Iq7Ux3rVuqy3LFCt4lhBy4WoNawzwFJYOWSlDVIJF', 0, NULL, NULL, '2022-07-11 09:38:00', '2022-07-24 00:03:09', 1, NULL),
(442, 'Dorrit Saietz', 'dorrit_sa@yahoo.dk', NULL, '$2y$10$mI7HLZGPeHrstwFjI.yI.unmAVvjWRiDXATz7jCYR1g3hE58uOc/.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:00', '2022-07-11 09:38:00', 1, NULL),
(443, 'Erik Vestergaard-Hansen', 'evh@vestergaard-hansen.dk', NULL, '$2y$10$olXWS6SRNP.8b7ivSUPPt.ieTIs/GP7NNsG3OIaELCM0vaJhG8uEK', NULL, NULL, 'XwxsZNd3K9WPNsJO7e0Tbf7rtqiZ1L4Vwnw17wMj1ZFWnyHJAWBb0EL9QN5x', 0, NULL, NULL, '2022-07-11 09:38:01', '2022-08-11 16:51:29', 1, NULL),
(444, 'Erling Aaes-Joergensen', 'erling.aaes@gmail.com', NULL, '$2y$10$DLHCHTbvzvl8QYtZptaFe.fbjhQ3OaLlXszi24cbNJ.fQm8y7ndfK', NULL, NULL, 'EzEm5gReNjjefpHeoBkM9sgBzlk6XP7ueA1IOTJ8uAAiOzTX7g53eB4LQqhk', 0, NULL, NULL, '2022-07-11 09:38:01', '2022-07-24 16:25:03', 1, NULL),
(445, 'Gorm Bergqvist', 'gbhh@stofanet.dk', NULL, '$2y$10$Igt2BA57rglnalGrkB3zi.IS4HeCn2Rt7HmuTKJc6c6hKSwROo28m', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:01', '2022-07-11 09:38:01', 1, NULL),
(446, 'Gybel Tech Consult ApS (Ole Gybel)', 'gtc@gybel.dk', NULL, '$2y$10$BGCcqqDB1BMIQOct20aIp.4FP/8fCt60bysQpQzf1G/m9U1NEyyxq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:02', '2022-07-11 09:38:02', 1, NULL),
(447, 'Hans Sylvest Larsen', 'hsylvest@gmail.com', NULL, '$2y$10$DI4zMv2aG5v8ID.LKCW36OpFcOzJ3JVWzpQlhk3lLzpbKu.iCIIhS', NULL, NULL, 'YQwbMmdqWuMcPHifAiJwCg3NTsvHPMfW6S1IGZ5NruWB8H83uFpAirWnwDyM', 0, NULL, NULL, '2022-07-11 09:38:02', '2022-07-11 09:38:02', 1, NULL),
(448, 'Hededam Holding A/S (Anders Bo Hededam)', 'bhededa@icloud.com', NULL, '$2y$10$nHtX6s/gZqDvJgTTmpfuIegstmMNudj.kIGd5Vmp2P0G4dnvg0nYS', NULL, NULL, 'XzcJRcnEcouOhUrIainIKU4TGY6ibPwdho4olDYQvXeWGNOE0seEzpXT8CHM', 0, NULL, NULL, '2022-07-11 09:38:02', '2022-07-11 10:23:45', 1, NULL),
(449, 'Henning Joergensen', 'fjorddalen12@gmail.com', NULL, '$2y$10$pmsxgj8t6XTuTjInmSvqouFzpNo5cxU2x4skQhhqqQWFoT3bX7cbq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:02', '2022-07-11 09:47:02', 1, NULL),
(450, 'Henning Moeller', 'henningmoller@outlook.com', NULL, '$2y$10$QGb88Z4LJgXxjQzyxTGpROwrpSJ1KE8ZUMak.dBs9X5k1s6Kfko56', NULL, NULL, 'o4TktEQJBRqTGfcAH5VOPv7IHl4OsH0Yv08eM41Cf80ejGWtMX7OWRHaZSZO', 0, NULL, NULL, '2022-07-11 09:38:02', '2022-07-20 13:31:45', 1, NULL),
(451, 'Jakob Bisgaard', 'jakob.bisgaard@icloud.com', NULL, '$2y$10$Dw9wyMvrgwVOP4eUoWR4o.sSp2cffXettJsfnEAL.XBA3EIRslhne', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:03', '2022-07-11 09:38:03', 1, NULL),
(452, 'Jeannie Dyhrberg Als-Jensen', 'jeanniealsjensen@gmail.com', NULL, '$2y$10$830i4tASgy1yNYW8vt42GusLp.f3zjXwF3ih9GLCmrXGoV8lNTnEC', NULL, NULL, '2TAPRVyvTeyrXfPf3WPJED1gWl7vs0ahlcu6uFRwOfYohRPAXAvtkU3YK4Tr', 0, NULL, NULL, '2022-07-11 09:38:03', '2022-08-06 03:25:37', 1, NULL),
(453, 'Jens Lei', 'jenslei@ballegaard.info', NULL, '$2y$10$Vx7/Pig0Qj5s/YqgahjXjuIk7sY5.Wdlwksl.iS75EuWYlPg0m2xi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:03', '2022-07-11 09:38:03', 1, NULL),
(454, 'Jesper Andersen', 'jesper@frydenstrand19.dk', NULL, '$2y$10$bKn2iKQJrQTX4iLFwehqvuPoddgTvJwcIBKqKCWnDyYUehk203QFS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:03', '2022-07-11 09:38:03', 1, NULL),
(455, 'Jesper Birch Clausen', 'jclaus@hotmail.com', NULL, '$2y$10$O2H/IDX2Mzn0dK78c.1Feu/BBHH4ss6evIvn2182uwZsYMPQ6b2kK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:04', '2022-07-11 09:38:04', 1, NULL),
(456, 'Jesper Thorlund Jensen Holding ApS (Jesper Thorlund Jensen)', 'jesper@thorlundjensen.dk', NULL, '$2y$10$6bGCTdetI0Z8bHL70Nsu9eBNjO3ll.N4PWSZ812hKvMpxnhfK2Q06', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:04', '2022-07-11 09:38:04', 1, NULL),
(457, 'Katrine Louise Weikop', 'Katrineweikop@gmail.com', NULL, '$2y$10$WAfeSrPKEQLBAgBPQ9Dz2.OoDydvHbKByG3qYD.8qc7CaeanvGDRK', NULL, NULL, 'jw74WBfAE07wRCHWzA2ihphnXCdCROg401Uu900Nf55jWQe9nnpDkrEHgT7t', 0, NULL, NULL, '2022-07-11 09:38:04', '2022-07-11 09:38:04', 1, NULL),
(458, 'KB Asmussen Invest ApS (Kaj Asmussen)', 'kaj.asmussen@outlook.com', NULL, '$2y$10$mWIQjRpTkN4H2h1VXYPLpud8AFEkaFxOUcZ8cMlK3RkDqmlyL1AKC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:04', '2022-07-11 09:38:04', 1, NULL),
(459, 'Kennit Ziegler', 'kennit52@gmail.com', NULL, '$2y$10$na5H1SRnjcx2dZY/d2nb6uUlHrB8jZzZOtuTttU4fJbldop5CKaC2', NULL, NULL, 'rLolRf14RKMHLBnT1aw3znlM6JPBZm7aUeHvKWGOgu1BY1dRknAXps5KSifC', 0, NULL, NULL, '2022-07-11 09:38:05', '2022-07-11 09:38:05', 1, NULL),
(460, 'Kep. Holding ApS (Kjeld Pedersen)', 'Kjeld@kellpo.dk', NULL, '$2y$10$ccQ3glMkZr5bVi8cX9QRv.X3QQXsP2CUNpfLt5coVGKTcSS7.7Hiq', NULL, NULL, '1xsHc2ug7jbDpI9lPkObh5Idn1pVSXEfcYXpxXfoFRuFF2vi2egb0Xb4XvIx', 0, NULL, NULL, '2022-07-11 09:38:05', '2022-07-25 04:26:26', 1, NULL),
(461, 'Kirsten og Bjoern Larsen', 'kirsten.lundgren.larsen@gmail.com', NULL, '$2y$10$Ca/RyyfEbh9A4Z651p2HN.bOQ8b4LahGN5Tr.vjBErdo/KvR4ozBa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:05', '2022-07-11 09:47:03', 1, NULL),
(462, 'Lars Lindholm', 'llindholm75@gmail.com', NULL, '$2y$10$pSZoIgSJRmMIvxc80wXxkOTmk.oajfS029Q8lswHmZ/VMim3mUydm', NULL, NULL, 'ItVLKZZS5FFKmcuAGhjydpCt34SuOxB2ZPly1qRRrQOytWf7UsJ7Du1lD8K5', 0, NULL, NULL, '2022-07-11 09:38:05', '2022-07-17 13:58:09', 1, NULL),
(463, 'Lasse Vigel Joergensen', 'Lasse.vi9el@gmail.com', NULL, '$2y$10$HryK634heeFMGbIGygqfTOqk9o/2HXpOrCZczT3yFsUN.9xViRE0i', NULL, NULL, 'Mx2Y63CwlfnpOdPYY2phBcS5yhVXJb3q1VaZMCS5OrfSiYwlTE2eiVR1mkZF', 0, NULL, NULL, '2022-07-11 09:38:06', '2022-07-11 09:47:03', 1, NULL),
(464, 'Leif Beck Fallesen', 'lbf@information-audit.dk', NULL, '$2y$10$/cCCSaLilNe8bKXQufPUce.bY2PhuyJUuLwEJSo8Oo7lISByP7.yi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:06', '2022-07-11 09:38:06', 1, NULL),
(465, 'Lene Skovby Christoffersen', 'pwolsen16@gmail.com', NULL, '$2y$10$noLLqkQFxaIPjqJwfIh4YOodipjLnk4I4K6UIJJnkujqV6vSjksl2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:06', '2022-07-11 09:38:06', 1, NULL),
(466, 'Lisbeth Gundlund Jensen', 'gundlundjensen@gmail.com', NULL, '$2y$10$tffySNUww0W8a.u2UDDao.nOKsw5dKW3VrNZFzWD71qxoJCciVJ.K', NULL, NULL, 'FD4LRbS41Pf1WXOdjDsXIF4uQvUlHR9oZpXxKGJ5F8QxUM1YGFOkIad6UdQB', 0, NULL, NULL, '2022-07-11 09:38:06', '2022-07-11 09:53:23', 1, NULL),
(467, 'Lone Kielberg og Soeren Johannesen', 'soeren.johannesen@gmail.com', NULL, '$2y$10$dknnqElh3UBfN1nzO26Mwu73laLIaQnLnjmgrMPnS/tEmdRpgjGOq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:06', '2022-07-11 09:47:04', 1, NULL),
(468, 'Lone Schultz Hedemand', 'lone.hedemand@me.com', NULL, '$2y$10$Rd9wWu23BBat9zEpP9GZZ.DUD7aLE9G608kBfMK/BZO1Pdd23JKJG', NULL, NULL, 'TBtrcSXm1YYoxTCNIs4UI5TiKnWQ5UjxP8yfBnTE7SEpvZ8qRoHzeLU3PsA7', 0, NULL, NULL, '2022-07-11 09:38:07', '2022-07-24 11:49:05', 1, NULL),
(469, 'Maja Aalling Teilmann', 'maja.aalling@gmail.com', NULL, '$2y$10$jhAbAkMte9vCuSCN7edz6../KJ6fPzuVjGW2hJHjZTOcwMB8hd5iK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:07', '2022-07-11 09:38:07', 1, NULL),
(470, 'Marianne Weibel', 'weibel-sorensen@post.tele.dk', NULL, '$2y$10$swrSNI4mTg7XbX8yXWI6leIDwCNMSv0ESDCPZPbLGQlZqbmR3BWvu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:07', '2022-07-11 09:38:07', 1, NULL),
(471, 'Max Loewe', 'max@loewe.nu', NULL, '$2y$10$WpXccMsFHvjloRy50NilaObT9XPOEBaszVs.p6Vw/YeveXddymH5a', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:07', '2022-07-11 09:47:04', 1, NULL),
(472, 'Mette Modalsli List', 'norskemette@hotmail.com', NULL, '$2y$10$Nvp8gcfTZz19eT2MvJhpk.wfxcUDD5Vo5knuYAFmAXWmu/gqbURIa', NULL, NULL, '79OmlJlMJmQt4VSbYlV43XZqemoOJse0rkD5Zxi97v6xwl2MfHiiyMy1mOJm', 0, NULL, NULL, '2022-07-11 09:38:08', '2022-07-22 06:16:44', 1, NULL),
(473, 'MH Holding af 2014 ApS (Michael Hedegaard)', 'michagaard@gmail.com', NULL, '$2y$10$aB44dActoTmKLc1V/bPoruGIm3YwYuIIPIHQpjze4FEFYtnI1mVDS', NULL, NULL, 'F0XJOrtcUBJ54obO3QA5nb7xsEMcrJB1EfTXhpYOrE8sDDGjcrbzKUUIATHI', 0, NULL, NULL, '2022-07-11 09:38:08', '2022-07-31 09:52:31', 1, NULL),
(474, 'Michael Bjerre Vestbjerg', 'mivest@hotmail.dk', NULL, '$2y$10$PHgotSt/3G8sdxyR0R6P7evCQhygh9Z2axNlx23Cy7u.1IRuxrTK.', NULL, NULL, 'NuUMl0a7CKGxQfAA3r0yncjHkpYMrzCQaj7JVqcOkDsCKXuscLgLb21Zxad7', 0, NULL, NULL, '2022-07-11 09:38:08', '2022-07-24 12:26:33', 1, NULL),
(475, 'Morten Jakobsen', 'mortenjakobsen18@gmail.com', NULL, '$2y$10$ZphsCM7OuAzocqY9nnVIS.OF2uBu820OXZlTx5xGwtuiJW91GA5RO', NULL, NULL, 'zLoS2dnumomoy6sXFBT3Ul1A13Ixyk7WHisbypvoFfyXJwPgbQyNUBYrE9cK', 0, NULL, NULL, '2022-07-11 09:38:08', '2022-07-11 09:38:08', 1, NULL),
(476, 'Niels Hovgaard Hansen', 'niels.hovgaard.hansen@gmail.com', NULL, '$2y$10$rtkNRj9SzvmI5G6mxovzdOoiunCwpsd41jlkLh4pPAzeUXWvUoRnu', NULL, NULL, 'kOeIzKs8cUSk7NnkKimIA7jK2y27KTUfS46CJwGP9GqbkQ8DhrQACF6RarAw', 0, NULL, NULL, '2022-07-11 09:38:09', '2022-08-10 16:34:16', 1, NULL),
(477, 'Niels Aaby Nielsen', 'Aaby.Niels@gmail.com', NULL, '$2y$10$H.gNYixvrddQr5/0LB6t1.TfrCkRrk/YP04zUxshqt88ypNt0.7hG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:09', '2022-07-11 09:38:09', 1, NULL),
(478, 'OMM Holding 2019 ApS (Ole Moeller Madsen)', 'ole.moeller.madsen@gmail.com', NULL, '$2y$10$.77htPYgGHMF8T3q31aryOzRsWwnbt7GsNgaUlOa6J9P0OXjiokxS', NULL, NULL, 'F1KsH9vPAzI0Sg5bNuoFZtlJWUV4LatiSO0pNguO5z4Y00NHh8k5inPXSBLg', 0, NULL, NULL, '2022-07-11 09:38:09', '2022-07-27 18:26:57', 1, NULL),
(479, 'Peder Raunkiaer-Jensen', 'pederrj@yahoo.dk', NULL, '$2y$10$.M7psKu.qmd95KrXrOUV5u6ZcQMkHUKdQp9Kgcco4GixSMTgW1/sa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:09', '2022-07-11 09:47:05', 1, NULL),
(480, 'Pernille Just Winther', 'lwinther@pt.lu', NULL, '$2y$10$9SXV9iorfY6wdlrYBm5BuOzeL.IWDEBe/jlB8Et4GBOuMmg5VfoOy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:10', '2022-07-11 09:38:10', 1, NULL),
(481, 'Peter Stig-Nielsen og Lene Stig-Nielsen', 'peter_stig@hotmail.com', NULL, '$2y$10$.jqNRpipJfIJAJHcfJKX6.wwj9km6w8QuqAcKFiDuFxInlLZdoMwG', NULL, NULL, 'Lmzya2qnCEwUHOat8kuQLnDCLvTgoKdsSqW9iwVTnIrVW0ezn3OdXpEM1jWO', 0, NULL, NULL, '2022-07-11 09:38:10', '2022-08-05 14:45:52', 1, NULL),
(482, 'Pia Holt', 'Pia_holt@hotmail.com', NULL, '$2y$10$mra39jVLeXhyzPXGda3mAO4h4gooLftvUBVuvG3roZJG9RHRhPsR6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:10', '2022-07-11 09:38:10', 1, NULL),
(483, 'Poul Jesper Thorup Jensen', 'jesperj@os.dk', NULL, '$2y$10$4dFN7Vs5R8zU3kp8TJqpo.SU8y0z0CQakW.55kPgr/AqNEH2raiPW', NULL, NULL, '4MPzp6eh4Z2nqMWNZtyqgLc4mCkyFVjw3io2vz6m0yo8eUzBEai3ZNvk7io4', 0, NULL, NULL, '2022-07-11 09:38:10', '2022-07-26 15:28:29', 1, NULL),
(484, 'Preben Bjerregaard', 'pbbjerregaard@gmail.com', NULL, '$2y$10$bg7izFI/273RpDug9Iafy.bLk3/EDERQJUIyniVP8XDLNC1sfFqge', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:11', '2022-07-11 09:38:11', 1, NULL),
(485, 'Rasmus Slot Nielsen', 'rasmusslotnielsen@gmail.com', NULL, '$2y$10$I9fgRmGdz4YX8LBYhO0/0OLjPo.lCnhfWWv1xr5vtwab75fYVIVn.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:11', '2022-07-11 09:38:11', 1, NULL),
(486, 'Rivolta ApS (Peter Rasmussen)', 'peter1rasmussen@hotmail.com', NULL, '$2y$10$IIyOl2j09yPjYjx92RXR1eurb9kWsyTpcSM34oSjJfLNGDvtcA62W', NULL, NULL, 'J5fnBSIzNswakaLQI8dT7LgkuFsXZCcFTN9sA4n9BIihJNnuukH7rKkLjtNi', 0, NULL, NULL, '2022-07-11 09:38:11', '2022-08-07 07:57:58', 1, NULL),
(487, 'S. Hjelm Holding ApS (Soeren Hjelm)', 'shjelm72@gmail.com', NULL, '$2y$10$YBUEE0YX1Ez/6A93U2gB9uNRXnvrrtpUF/2IKybgKHwv.nKc/xuSe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:12', '2022-07-11 09:47:05', 1, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `is_admin`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(488, 'Sophie og Sverre Simonsen', 'sophie.sverre@gmail.com', NULL, '$2y$10$8HMlK5KSbxNeXvZn3W0xjOOd2KaSjMD6zyTizCuefjz3/yTTzW1Oe', NULL, NULL, 'qOo5JX2DrxMrz0IDGedQoWhK9BzQ1McJV2l9MHj5BpzYLC0rYBhIb8IIALIF', 0, NULL, NULL, '2022-07-11 09:38:12', '2022-09-18 16:35:28', 1, NULL),
(489, 'Stina Christophersen', 'slclindgaard@gmail.com', NULL, '$2y$10$JX/Ccps.zoVaD4lop5Ing.i8j63Odbo.OcRqt0j/IEt90n53mGERW', NULL, NULL, 'tGiX0k6XQh2JkT37fgw6EHOYjVmqgrGStaJJaAmeiO8RW5lA5JZ92POOWM8f', 0, NULL, NULL, '2022-07-11 09:38:12', '2022-07-11 09:38:12', 1, NULL),
(490, 'Susanne Fjord Toftdahl', 'sufjord@hotmail.com', NULL, '$2y$10$cx7MyxGUW2PaVFzdsEMK3OS24fYFU7cgFM06DXTPb/q/ByvWPGwES', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:12', '2022-07-11 09:38:12', 1, NULL),
(491, 'Susanne Madsen', 'msusannem@yahoo.dk', NULL, '$2y$10$l3ysPcpomfVCqq4B7MTE/en3ssgalQRCV/k3IC7Odbt0X6J8A8FE2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:12', '2022-07-11 09:38:12', 1, NULL),
(492, 'Susanne Taarnehoej og Steen Willumsen', 'agerskovvej38@gmail.com', NULL, '$2y$10$f9JQfdSRFIMgyq7dytNL6uuJTD5rkslVRsnC6pZ2FjmSVVgNCFyqG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:13', '2022-07-11 09:47:06', 1, NULL),
(493, 'Tandlaege Frank Mulvad ApS (Frank Mulvad)', 'frank.mulvad@firma.tele.dk', NULL, '$2y$10$ix/ZeKXwDJqJf5iAZf7peengOUYfN89/hOu/ZT9MjA6Eh6qGu7RkO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:13', '2022-07-11 09:47:06', 1, NULL),
(494, 'Troels Haugsted', 'troels.haugsted@gmail.com', NULL, '$2y$10$OMb0M6iP1OVKnsUJpPQ8k.RzNocT5OdQK0sSZkMM4EkH5NSZHi7Fy', NULL, NULL, 'nc9m4mV1Y7vvqnSCDjBvTk9hwYzak41L2umBeHWax6mwiuMXQfP56vqwz3U2', 0, NULL, NULL, '2022-07-11 09:38:13', '2022-07-20 05:04:17', 1, NULL),
(495, 'Ulrik Vidarsson', 'Vidarsson.cpv25@gmail.com', NULL, '$2y$10$X6SS/TudKF3jVd2.2iDuzeSC7mGgpt5xNrUJabJev6POhJD0l/DNS', NULL, NULL, 'CSY269gaCOkhGfI8JytLuEJEhOJUHSqzYzCxJiI3yBDWj0gQquvpMODfZzXA', 0, NULL, NULL, '2022-07-11 09:38:13', '2022-07-27 14:38:47', 1, NULL),
(496, 'Aagaard og Joergensen Holding ApS', 'la@ajaps.dk', NULL, '$2y$10$Nn3Nw.vegEwBHgr3RxPCr.aAr1vwVFIsbTIiQJiC9HQPW95lBmDQi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:14', '2022-07-11 09:47:06', 1, NULL),
(497, 'Iben Foss Sorgenfrei', 'sorgenfrei@dadlnet.dk', NULL, '$2y$10$IZUn1TA/0TjvRoI/70ieZO8zyx1QOLLpTMD.YhFW4ut1sLJV7Zks2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:14', '2022-07-11 09:38:14', 1, NULL),
(498, 'Niels A. Jensen', 'jensen.niels.a@gmail.com', NULL, '$2y$10$UTdRAAVfoMA5h0KzBfcPL.qOqHYz8FCWsErtNvEjU2osS4luC9btO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:14', '2022-07-11 09:38:14', 1, NULL),
(499, 'Torben Jakobsen', 'Tj@revisionkjellerup.dk', NULL, '$2y$10$OL8LN7BYb8AvxAdhA.ADGeb0KWNQU5XW8T5EO2ppepHldBg8oxzb2', NULL, NULL, 'dYNFNNgIp7CK8NBg9IEB4a377si2zMQpZY4YvwVo0kSx55GtIwKrlah2BwUF', 0, NULL, NULL, '2022-07-11 09:38:14', '2022-07-11 09:38:14', 1, NULL),
(500, 'Dorte Ejlersen', 'dorte.niels@gmail.com', NULL, '$2y$10$TCy1v85Vo2onYPejZi450uaAghC8fIgjp24zos1bg.YZnMOH8tfR6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:15', '2022-07-11 09:38:15', 1, NULL),
(501, 'Michael Troelsgaard Nielsen', 'Piaogmichael@hotmail.com', NULL, '$2y$10$MrSC8Hy5cpeduQQ532igU.rZAudlFAU5IaWMIXaXdGZ/0h15cOgPu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:15', '2022-07-11 09:38:15', 1, NULL),
(502, 'Steen Demant', 'steendemant@gmail.com', NULL, '$2y$10$aGnbKtk8NiUNCORAoqhn9.Lp1BxgcvFmZ6oQjJ.8V7Kmd9MU7h8ba', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:15', '2022-07-11 09:38:15', 1, NULL),
(503, 'Bjarne Lindblad Holding ApS (Helle Lindblad)', 'helle@lindbladcom.dk', NULL, '$2y$10$o56jYWHUHKmPSOc8X1u3J.Y1ey5O./fYWoaUTYIZyiHYU3RtuzkLq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:15', '2022-07-11 09:38:15', 1, NULL),
(504, 'Mads Peter Lund', 'madspeterlund@dadlnet.dk', NULL, '$2y$10$eT2gCsrps9fyjosVIsLuGem0SLKCC1w.SuRBhnQymDzyn17qBunIi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:15', '2022-07-11 09:38:15', 1, NULL),
(505, 'Leslie Sigby-Hansen', 'leslie.sigby@webspeed.dk', NULL, '$2y$10$aVNkyu1r4l9Kow5xJm7ZjOKbr43vav7ZbnYKlY.cOYWquxVlNNMbm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:16', '2022-07-11 09:38:16', 1, NULL),
(506, 'Karsten Noerbjerg Christensen', 'Knc@sanita.com', NULL, '$2y$10$5RpIm.ttOXkVosOMxwzHGuhA/Ip9WCEWfsN6uNOiCoA4ZcxOZH0rS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:16', '2022-07-11 09:47:07', 1, NULL),
(507, 'Randi Dalsgaard Andersen', 'randidalsgaard@gmail.com', NULL, '$2y$10$sNEx.1HCLb8pGh/Rq6suMO7aLHYPAKqNNn0RdjUuQA4TWNtRzqxQm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:16', '2022-07-11 09:38:16', 1, NULL),
(508, 'Torben Ravn Pedersen', 'trp@fiberpost.dk', NULL, '$2y$10$sQsuqUm9x.9Ht3ykFEtcbunpTjFnRTxFEkH09w.VVoSk7VvajBFrq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:17', '2022-07-11 09:38:17', 1, NULL),
(509, 'Agnethe Ladefoged Knudsen og Bent Hedelund Andersen', 'benthedelund@gmail.com', NULL, '$2y$10$9NogyR01w/Bn8s37vXov2u7yUsM.t0VdPhsMOiMo7pITH9O0VCIW6', NULL, NULL, 'ca1wty1pm7NapZpOAf29hCK4IM9AFUxXm5xhGlglh9ZcZhoC8qzxeQ1nXGOX', 0, NULL, NULL, '2022-07-11 09:38:17', '2022-07-11 10:02:09', 1, NULL),
(510, 'Kirsten Elkjaer', 'ke@fynskebank.dk', NULL, '$2y$10$Ru4RibyEkmAQ/bGMfEiaUO9XvoxzHNfPKOgYFe4hjB6YJL42bFl9i', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:17', '2022-07-11 09:47:08', 1, NULL),
(511, 'Jesper Kristensen', 'jesperkris@yahoo.com', NULL, '$2y$10$10ottrkJAJ5uq5ycvLUk2OpLtRGG1X1eJCXWp/OCehq4cV.dFQXai', NULL, NULL, 'S44aVqAuqSldX39UvDdMBzCE03KmcGEGAkbeUjJCCV4aczJHXpRS0n4JtWzv', 0, NULL, NULL, '2022-07-11 09:38:18', '2022-08-17 11:58:08', 1, NULL),
(512, 'Soeren Christian Thomsen', 'veepeesix@gmail.com', NULL, '$2y$10$1N05TTxt4gzo3hs0A91qieLpCGAt/qQarp9/52irIRfdgPsq3OKTa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:18', '2022-07-11 09:47:08', 1, NULL),
(513, 'Bo Rhein-Knudsen', 'borheinknudsen@gmail.com', NULL, '$2y$10$PV30zyxtf.xwODdkdHG5zuKUetuyx6fwaMYHvsLTGmTNPsWQ7s/Qi', NULL, NULL, 'MC6eylF5QRTKTy7sV1yuKGftTmpPUyIxhqJtCFnyXp56Rtd4sDGDThzh6lPz', 0, NULL, NULL, '2022-07-11 09:38:18', '2022-07-11 10:48:09', 1, NULL),
(514, 'Henrik Noerskov Hansen', 'Hnh0111@icloud.com', NULL, '$2y$10$dxn93RAyry1qFoH.CKoDJOPZiOkDrgrjH/gk1ua3xS4tuvsLuxCM2', NULL, NULL, 'J7afX001QuJQztBfNAULsV2eDTOrftWcLnckljzGpdHsdCP13TCQR6hSokNe', 0, NULL, NULL, '2022-07-11 09:38:18', '2022-08-02 12:07:32', 1, NULL),
(515, 'Jesper Christiansen', 'googoo83@hotmail.com', NULL, '$2y$10$437KoF05cq1JGmt2JCNibue0VwyS58h/vM0vf4GyYM097164GYIOa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:18', '2022-07-11 09:38:18', 1, NULL),
(516, 'Sune Larsen', 'me@sunelarsen.com', NULL, '$2y$10$kRbcaPPlffbWbBtBAb26uO1Q2fSfiHxZNL6Z9x80lwczbN3pW80Oy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:19', '2022-07-11 09:38:19', 1, NULL),
(517, 'Benedicte Vibjerg Wilson', 'Bvw@dadlnet.dk', NULL, '$2y$10$ZnMG8u4x4H23TLfwZWaH1ujL7sbr7DtWETJA7mg1L69T/.jQNYpuS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:19', '2022-07-11 09:38:19', 1, NULL),
(518, 'Helle Jensen', 'heje04@gmail.com', NULL, '$2y$10$r4OfWEWhuoK4jhIcR8TVYeTrx8rCU5EYmnKuOfzcXyx6wGu1piO0m', NULL, NULL, 'q54jcSnHSXWVgH7MtX4rSOrK41DsvHi2DtB9zOhz4Rq25yOMtnBAdGacYFm0', 0, NULL, NULL, '2022-07-11 09:38:19', '2022-07-11 10:27:09', 1, NULL),
(519, 'Henrik Chano Lundby', 'kontakt@henrik-lundby.dk', NULL, '$2y$10$Qbo0qEFD6PnUl3x2yrDMmOwulMhBkEU0NNkeMVCgvAgCfqUuhLD1W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:19', '2022-07-11 09:38:19', 1, NULL),
(520, 'KB Invest Bjerremose Aps (Karl Brynningsen)', 'kb@pki.dk', NULL, '$2y$10$u2.ZGqUm2r6cAlCmP0hRxu9Ob7u0FbhIOsKKFCL6ZDnMERgufDX66', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:20', '2022-07-11 09:38:20', 1, NULL),
(521, 'Torben Lindhardt Jensen', 'torbenlindhardt@gmail.com', NULL, '$2y$10$XpXXqMEmWrPI8llUN4GgmeAUHsO9C65JtTYu2akXf/cEG5AE7ICLu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:20', '2022-07-11 09:38:20', 1, NULL),
(522, 'Karsten Nielsen og Lise Berrig', 'karsten@libkan.dk', NULL, '$2y$10$F20hKIIpuypymF9nc.fCg.LIH83U.TIWb8bvuP54VGfujwPbpMXCC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:20', '2022-07-11 09:38:20', 1, NULL),
(523, 'Limann Holding ApS (Joern Limann)', 'jorn@limann.dk', NULL, '$2y$10$gBjbjeclKLiiMHUxLZVABuD6L6Vdg7j8RTPk1xeKHrcWH2oPenrDe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:20', '2022-07-11 09:47:09', 1, NULL),
(524, 'Jesper Tristan Harrishoej', 'harrishoej@hotmail.com', NULL, '$2y$10$0J9L9K7jmNbQpaWmMdpXl.DRTgPbBN/VgdESyA1XwoBpe4Bd8eSPC', NULL, NULL, 'FC4wMb4zyKvuaRcwiOR9RmWgpYqPAF4EH51Hc7VH3jwErJEOGB1WzHD321fv', 0, NULL, NULL, '2022-07-11 09:38:21', '2022-08-14 06:03:34', 1, NULL),
(525, 'Rikke Clausen', 'rclausen@jubii.dk', NULL, '$2y$10$ZZCdP.2f8qb998HKegcjquGKl4Qr5oJm3P1leDYlBA3q.E9gQiKY6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:21', '2022-07-11 09:38:21', 1, NULL),
(526, 'Per Aunsbjerg Nielsen ApS (Per Aunsbjerg Nielsen)', 'pan@revograad.dk', NULL, '$2y$10$ojWvmEh3lWzxx9qqAUTbf.xMxVIPF.aaiIhKioKFe8EtLzDg0bj9S', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:21', '2022-07-11 09:38:21', 1, NULL),
(527, 'Ann Kjaersgaard Larsen og Tom Kjaersgaard Larsen', 'ann@kjaersgaard-larsen.dk', NULL, '$2y$10$vzE7SCfLL49ir0T/VE/JOe52FC6qidR6Wf9eAEUrhEDKr0TZy1wXi', NULL, NULL, 'DBLO1uODwGtF4KqO0HYJ2JR5TQSGP4uhtqYxSfGkfK8sWSwNzUmAhk5oKM7J', 0, NULL, NULL, '2022-07-11 09:38:21', '2022-08-14 13:39:01', 1, NULL),
(528, 'Hans Hostrup', 'hh@svenet.dk', NULL, '$2y$10$h2NEBr3ARLyS/hQhK0/u6O918pMcbaV2kNHabFW/YCSQcVs6Z4ivW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:21', '2022-07-11 09:38:21', 1, NULL),
(529, 'Ole Gejl Pallesen', 'ogpallesen@gmail.com', NULL, '$2y$10$cx7MCE6wnvNAwNS0m5UqFOZdMX9Z/.xzbw./zIJ7D7q/x96JcVz2a', NULL, NULL, 'OAgYRluFI1z42t2LAnBwjGm9e0uPaKD9QlyIUgqlYtBMvVbFT4VMr0zcA9qZ', 0, NULL, NULL, '2022-07-11 09:38:21', '2022-08-08 04:36:28', 1, NULL),
(530, 'Anne Rosenkilde Ebbe og Jens Ebbe', 'jens@ebbe-engineering.dk', NULL, '$2y$10$yeiJVyJoGXGN3LKJXdJ2UuS/5Y89y0TfFKiUkvwIiz/0K1ndM31gS', NULL, NULL, 'IKw6tbB31W7vNr6MlnJ6NmG79lv7r51sDsTR15YFCW2Xg7x5Ieef8WaCwqMF', 0, NULL, NULL, '2022-07-11 09:38:22', '2022-07-11 09:38:22', 1, NULL),
(531, 'Henriette Rydberg', 'hr@maisonfrance.dk', NULL, '$2y$10$ecVehicTHMFCrndNiB2aTuxVWVfepTEAA6S8kS4JX2u2Fs1bv4BsK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:22', '2022-07-11 09:38:22', 1, NULL),
(532, 'Bente Joergensen', 'bentejorg@outlook.dk', NULL, '$2y$10$lIfQj3kKqN9qdHFlbdaK3eCYyAA/gC4NTAMV7Wa32qDtlbqb9jWLW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:22', '2022-07-11 09:47:10', 1, NULL),
(533, 'Jens Bjerge', 'jensbjerge@it.dk', NULL, '$2y$10$Tix2lucvHMJq2vqgP.WQ2uEN.2nlZNFhnrf/ojRswi.FD0NWHHexC', NULL, NULL, 'FgpiaQyScc2GILAw22gIP5G6k78DKpS80XyS72ebDwChLQAHzgPrE4ardnmu', 0, NULL, NULL, '2022-07-11 09:38:22', '2022-08-01 05:08:04', 1, NULL),
(534, 'Mogens Vang', 'vang@nykredit.dk', NULL, '$2y$10$PzsGDJKjSdWeh6XpDmqEFe2gQsC6YxHGnZSXuPa0IlqFpfdH05k8u', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:22', '2022-07-11 09:38:22', 1, NULL),
(535, 'Henrik Tornblad og Lene Klingemann', 'henrik@tornblad.net', NULL, '$2y$10$f5htA7Ld4YOUwEUOz/m5EO.Mx5iHSbV2VNBheA3DMKkmc8F9t28mW', NULL, NULL, '4HAHgLJQeczhO9fNcEz7EsDqymcvVmVrBSnsgskFisiOTUUmehHgfqoSphar', 0, NULL, NULL, '2022-07-11 09:38:23', '2022-08-01 08:36:11', 1, NULL),
(536, 'Pia Mikala Klingemann', 'pmk2804@gmail.com', NULL, '$2y$10$RMtm6W6PIJxHTTa0XbIPQeC.cab8rtoRPO9j0UaItRDUPsDr.HK3q', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:23', '2022-07-11 09:38:23', 1, NULL),
(537, 'Susanne og Kai-Morten Rosendahl', 'rosendahl2950@gmail.com', NULL, '$2y$10$nUWSaqQAKeXytkgTcvHqIeY.7kkw2pDODhDoN1fptzmG2rNSxaiuG', NULL, NULL, 'IepXCY12GdQKBf0BBLLvlSR9mE6evTOEXqIA6q1X9GZFSHBTWSgyQOthPBdZ', 0, NULL, NULL, '2022-07-11 09:38:24', '2022-08-14 16:53:45', 1, NULL),
(538, 'Morten Sjoerslev', 'ms-byggefirma@hotmail.com', NULL, '$2y$10$vqXA03Gh0PHH/wc5G5hl5ugyWOYKzMFqe5XV9ztV218jOHq.hmKWK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:24', '2022-07-11 09:47:10', 1, NULL),
(539, 'Susanne Vestergaard', '75890804pbs@gmail.com', NULL, '$2y$10$hH./vVg4Cl6lvavtnaIeHuumTHZPlfcrWyWHitExJzs7ViMZfQCDG', NULL, NULL, 'KNCK8jLi9vsUqTqWvpiSBc6SmokXZrmRDWt4LrSOBU9sJhsYU2iMfqXTM5nF', 0, NULL, NULL, '2022-07-11 09:38:25', '2022-08-03 13:11:22', 1, NULL),
(540, 'Laurids Iversen', 'lau@familieniversen.com', NULL, '$2y$10$E/aNbwAkvcOXd.CqCyaZwOOPIXZ1fMQ2pb389DToNGn29pnOfzQY.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:25', '2022-07-11 09:38:25', 1, NULL),
(541, 'Morten Skeldal oestergaard', 'rodwac@gmail.com', NULL, '$2y$10$4jhypNtE4nBmrXbTeFf/ke7wD3INt7u0IxMLei7RsspmXCHFg5m4S', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:25', '2022-07-11 09:47:10', 1, NULL),
(542, 'Zita Elbaek', 'elbaek1@yahoo.dk', NULL, '$2y$10$rRuYfuT0C1yCuqr5JZyYNe205TvZmvQEBZVyiR9jesw.EITm274Pq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:26', '2022-07-11 09:47:11', 1, NULL),
(543, 'Karina Weihrauch', 'Ks.weihrauch@gmail.com', NULL, '$2y$10$jfSVl13SgRIw5GEdXr7HkukJHuHx/4aLgOfY6SYOXMefYDLrz0MUy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:26', '2022-07-11 09:38:26', 1, NULL),
(544, 'Per Larsen', 'perlars@hotmail.dk', NULL, '$2y$10$1FOHzNki7zYjuDRI6NDMvuTKzFsqeSQpxyQEzYEqSlnLi5BFCAsR.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:26', '2022-07-11 09:38:26', 1, NULL),
(545, 'Morten Rasmussen og Camilla Rosengaard', 'mra@abakion.com', NULL, '$2y$10$r.JOSqAYnM9LNqDJkHTe0OoeacllXYhE4qjpkh51eOnXAjZVEs/a6', NULL, NULL, 'pKAGyaa14p4Ap2IzYus2qTVOZ0XRHgthux7HYySSkHMW2DIhqgihsyk1ddIJ', 0, NULL, NULL, '2022-07-11 09:38:26', '2022-08-15 06:07:54', 1, NULL),
(546, 'Jytte Boedker', 'Jbbodker@gmail.com', NULL, '$2y$10$Kce1EzK4b6kDcWPQ8AD16.DuNt8qX4DP6UT/LItpdBQutz0HEYH7W', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:27', '2022-07-11 09:47:11', 1, NULL),
(547, 'Lars Toustrup-Andersen', 'LTA@pharmacosmos.com', NULL, '$2y$10$/e7sME8pl77P2kdpHdCW8OPaVSK5jCuCIM0fuLvVJFQN0SYvOcs16', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:27', '2022-07-11 09:38:27', 1, NULL),
(548, 'Susanne Hostrup', 'S.hostrup.dk@gmail.com', NULL, '$2y$10$gI.rLsSisLM5dEuspGHgEOxZQQMLU.cqrk3vKnnamhHVRgMfi.plC', NULL, NULL, 'gvjJOQd8PReDpWs3BDxsFal09sJVU3e5LfbBFbM3aHSsZu15B5kxpVsqOYKf', 0, NULL, NULL, '2022-07-11 09:38:27', '2022-07-31 06:03:28', 1, NULL),
(549, 'Kim Stenholdt Madsen', 'kimsmadsen@gmail.com', NULL, '$2y$10$b.mBMbZjHASF1nkPPA8JV.YW2wsEXVA3RB4YqJIvRymt7mz0T6O1m', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:27', '2022-07-11 09:38:27', 1, NULL),
(550, 'Torben Bjerggaard Johansen', 'tbjoh@outlook.dk', NULL, '$2y$10$RD19X1Va4NxdUZrI8T9HJeOxQ8bCW5BfxyFYMWSZ2c.CpW1k0.dAy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:28', '2022-07-11 09:38:28', 1, NULL),
(551, 'Boe Byg (Kasper Boe Rasmussen)', 'boebyg@live.dk', NULL, '$2y$10$tLJiI/xdn7QTcUOm7I66aOddIVz0Jr.G6TBX7xItxa65Rf8jBmTMK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:28', '2022-07-11 09:38:28', 1, NULL),
(552, 'Per Winther Nielsen', 'perwinther61@gmail.com', NULL, '$2y$10$4vWseg9OEDCEuaYYtAAoUuDSbPcPaUqkSj9TZ1UQBXu5fJdAep6z.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:28', '2022-07-11 09:38:28', 1, NULL),
(553, 'Ove Kjaer', 'kjaer.ove@gmail.com', NULL, '$2y$10$gyEj5e.besw29LR7J9u2SuAuuk24iAeThVj3jlbYbKW5jvXG3hN.a', NULL, NULL, 'eHeObH3n0THoTsFDyMTjwyuDzvkbZFOpA7B6IW0YqOtlhejreY14xrPNqavq', 0, NULL, NULL, '2022-07-11 09:38:28', '2022-08-05 15:09:16', 1, NULL),
(554, 'Anders Larsen', 'landers2509@gmail.com', NULL, '$2y$10$5TsCLBBWtcnrg/492IVTcu3F7BQBjuXDunw1MdoUOnDBgAWJpYS.i', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:29', '2022-07-11 09:38:29', 1, NULL),
(555, 'Ole Kragh', 'kragh@person.dk', NULL, '$2y$10$0zqvrh1yn5L5b/gJ3A2Sc.0zt.K0IRUxuayvqdNrJRTxm3AqQYbEq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:29', '2022-07-11 09:38:29', 1, NULL),
(556, 'RAALF ApS (Flemming P Joergensen)', 'fpj@robotech.dk', NULL, '$2y$10$xP7Nm9d0nKplg80ResgwfOil9QqzaOdF8wxV.3abe/QYwY9Oh89Ea', NULL, NULL, 'PKJPOeSvXhTYBjGZsvxPLffAk4ASpgjwEuvrRCof11wyUkDs35mcxU3H6doM', 0, NULL, NULL, '2022-07-11 09:38:29', '2022-07-11 09:47:12', 1, NULL),
(557, 'Torben Arthur Klein', 'Torben.klein@outlook.dk', NULL, '$2y$10$RG5rBwMs2FsSxoUZkjeBlOKRL1W0BISim.3jGu83cUEjoYTquQYNG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:29', '2022-07-11 09:38:29', 1, NULL),
(558, 'Peter Fausboell', 'peter.fausboll@gmail.com', NULL, '$2y$10$uHkTWnZ90PrNzEnfLOL2B.5HLT/pnZY4Hpwap1ZgEB7OshZZSMZsm', NULL, NULL, 'yXuKpNsjgtIurGAImfFMDS6uwho9402mKnDjgNp3ZrWTrJVxEhyULnd6TDcZ', 0, NULL, NULL, '2022-07-11 09:38:30', '2023-01-01 15:49:02', 1, NULL),
(559, 'Rene Thomsen', 'rene.thomsen17@hotmail.com', NULL, '$2y$10$sJI95aCW7OKJSblC2i7BmejS8mz0if6wpDrYMBN89e9ZpsYihyBlW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:30', '2022-07-11 10:05:47', 1, NULL),
(560, 'Vibeke Bugge Kristiansen og Kim Rongsted Kristiansen', 'vibeke@strator.com', NULL, '$2y$10$zXz4nwMpfLrERg6hKCr5veyKjTfOaS7SZaNm5Up167dmJgGA0OJ16', NULL, NULL, 'nLptfgPDHLTjL5U01kHCUZKP7kOgfdfzyTDdU6ezJewot7zrEiIOL44uFCaV', 0, NULL, NULL, '2022-07-11 09:38:30', '2022-07-11 09:38:30', 1, NULL),
(561, 'Lone Lei og Jakob Lei', 'jakob.lei@icloud.com', NULL, '$2y$10$/oQAx2.R4gD2lDSIi36Mvu65af6Na8ReeONmLfTC6kALpHs6C1SlO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:30', '2022-07-11 09:38:30', 1, NULL),
(562, 'Niels Otto Soendergaard', 'pianielsotto@gmail.com', NULL, '$2y$10$F89oKyX3i2J/SzBR9MbSYO1AVGq7zYs/.Sj/fBpjfG7YiIyTkJhXi', NULL, NULL, '0xPqzcXZy80FasSymYdm04l4RnWvSfT74uk3F1G9YYaQDeHjW9GoxPt5sZdi', 0, NULL, NULL, '2022-07-11 09:38:31', '2022-07-11 09:47:13', 1, NULL),
(563, 'Laurits Nielsen', 'laurits.nielsen@privat.dk', NULL, '$2y$10$Meix11M.vx6FCchHlc0ZaeQ4tPVGZG74kLeBm2qF7yh53HHv4FDNm', NULL, NULL, 'JQoGYzU5F7VhbXHGbYq4kgX7qL5wYxkRt4iG3SIfrdhM3P01dBwkKzZwVpRl', 0, NULL, NULL, '2022-07-11 09:38:31', '2022-08-04 07:53:12', 1, NULL),
(564, 'Dorte og Johnny Hessellund Iversen', 'dorte@iversenhome.dk', NULL, '$2y$10$h/.TAP6Ytem/fEuj7qBsKeHKfx9BpQm8LX62J9NoD5Ki.LNfQW5n2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:31', '2022-07-11 09:38:31', 1, NULL),
(565, 'Tina Kroeyer Jacobsson', 'tinakry@gmail.com', NULL, '$2y$10$xDHsDtIiPlCKU7rpBXob7.XX6YbLu6APzEDEsGrFhHqewWN.xqBa6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:32', '2022-07-11 09:47:13', 1, NULL),
(566, 'Kim Steffensen', 'kim.steffensen05@gmail.com', NULL, '$2y$10$QQ3iSsvP7SA7p0eyH6upEe0CTWXtx8.vJxuRglqhb8FRFTwwPXhAS', NULL, NULL, 'eaN6BHtxpvv8OopUmRzHf8LwGlPXWXzB1b1V8YSfIbhPGWoKgEDFWw4QvCk6', 0, NULL, NULL, '2022-07-11 09:38:32', '2022-07-11 09:38:32', 1, NULL),
(567, 'Niels Arpe Hansen', 'arpe@esenet.dk', NULL, '$2y$10$fViPWdNLhh5o2JsALztMYevJkjrEtlo5P4/n7DCAMDpHrstxFaJau', NULL, NULL, 'hYc44s0SBogOpz2u8FE7I285GX8qjyobGDPo9btYObfjbcxEDKcP1nY4Ogat', 0, NULL, NULL, '2022-07-11 09:38:32', '2022-07-11 09:38:32', 1, NULL),
(568, 'Niels Arne Hjortshoej Rasmussen', 'nr@image.dk', NULL, '$2y$10$1KSS6AaTJ1AqWQuFcwPHJuh/krzwOcATlbDG6gvvOHDdEXts4tVFi', NULL, NULL, 'ngx5kbXiJXVTHiMA6oLIpjYtMyq4XDoERHaQQjYL9zYbUO2KPbmNbuPkujLk', 0, NULL, NULL, '2022-07-11 09:38:32', '2022-07-11 09:47:14', 1, NULL),
(569, 'Louise Kelstrup', 'lkelstrup@hotmail.com', NULL, '$2y$10$fK1rM9NWyVB.Sk/rY99a2eeo.9PeJGkorhfSclzPtIXDD5TyiVX3y', NULL, NULL, 'A4QKgBHURN1rMXOQHqtBwaaJ0YR0jqRdSEAs5JQMIbWk7eLC6k79jjpLides', 0, NULL, NULL, '2022-07-11 09:38:33', '2022-08-20 09:16:40', 1, NULL),
(570, 'Erik Broby og Dorte Kofoed', 'Broby-kofoed@hotmail.com', NULL, '$2y$10$QY.wI0piEp7pLqjCFTrpQeky0UXHMQafSwhv03H26lK8ej2hQyZfq', NULL, NULL, 'wzrW6C1JKXDxIorkiynyTy8856cyaC4MXwnhKorAhshI8pBxzAtjOR1WVU96', 0, NULL, NULL, '2022-07-11 09:38:33', '2022-07-11 09:38:33', 1, NULL),
(571, 'Charlotte Tilst Christensen', 'charlotte.tilst@gmail.com', NULL, '$2y$10$y.o1s.nNx01zTgDPOXNdiuW2NkHEk1yLhldsY6n.SfRCxU0HRbtKm', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:33', '2022-07-11 09:38:33', 1, NULL),
(572, 'Ejner Knudsen Aps (Ejner Knudsen)', 'ejner@konsu-net.dk', NULL, '$2y$10$1NAfk34rHQLuuZTqhelsfeVat8Ui2LBJgZJrnAE3sVYn6UkKX9Oo6', NULL, NULL, 'eVpwgvA3B6o3RRnoBiC3mMyDh0R28DwLlC6jZ7ed3vMByrN6A8FHOIu1okXd', 0, NULL, NULL, '2022-07-11 09:38:34', '2022-08-07 06:39:04', 1, NULL),
(573, 'Indermohan Walia', 'indermohanwalia@hotmail.com', NULL, '$2y$10$33o/VSjbnhlcibE1pkZUp.2w4JRTMlRFAsizwGWTlJhE3hI0iJtCi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:34', '2022-07-11 09:38:34', 1, NULL),
(574, 'Erik Ornebjerghus', 'ornebjerghus@yahoo.dk', NULL, '$2y$10$A5nhLl7FKtchdvhtprAz3uz/uqyE91/wMi6Vlbmb.eVSJuC9ucjKG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:34', '2022-07-11 09:38:34', 1, NULL),
(575, 'Eydfinn Heinesen', 'eydfinnheinesen64@gmail.com', NULL, '$2y$10$dIHFjYEGbOGS39G9ynZDueMm3GJirA6sxy4ZVjUI8im3SYf3g8gP2', NULL, NULL, 'bfw9UVK2QiyzMgDOiEVamvGEJGfdyjPgjZQ2vTTweGsT3ZMnGz2ZeZGKAPEi', 0, NULL, NULL, '2022-07-11 09:38:34', '2022-07-19 16:38:33', 1, NULL),
(576, 'Niclas Press', 'niclaspress@gmail.com', NULL, '$2y$10$9OKv8AWH5AO064pa26fZH.PqaA0lXcZP5fR61WaGOsdVXDisA0xoi', NULL, NULL, '7SFB64potW44eNMOAeWG4a5BUF5yJGcFSojm7f5BWyJ0WxVhQZCOpWsSEBOX', 0, NULL, NULL, '2022-07-11 09:38:35', '2022-07-11 09:38:35', 1, NULL),
(577, 'Bjarne Larsen og Camilla Edstoft Christensen', 'camilla-k@godmail.dk', NULL, '$2y$10$v8pyO79U9D5qV2oIUY6sbu9tEPfcs5ViVs4YPsXc7Eokg8bI3mGKa', NULL, NULL, 'MAxFvnXKcj08MnbaNfiRxa2l8EiXn1Y6HZZXCJ0yRiBp0fhwddG509YyCj0C', 0, NULL, NULL, '2022-07-11 09:38:35', '2022-07-11 09:38:35', 1, NULL),
(578, 'Gert Fosgerau', 'Gert.fosgerau@gmail.com', NULL, '$2y$10$w7AlbCX8A1QDVGUQEqaZwuu7EP2J8DSDygU5bFbt6TxpgSSWUIwzK', NULL, NULL, '5SpD6NOypOyHnH3dXu16TxNCgdrkjSqushQulLMYgjHPNOm44JdOss0YY4bI', 0, NULL, NULL, '2022-07-11 09:38:35', '2022-10-04 18:39:14', 1, NULL),
(579, 'Kim Vevest Madsen', 'kimmadsen4ch@gmail.com', NULL, '$2y$10$KSQbSoFWWLs26cYM2gRkW.VZ6PVFVwL0Bn/68Lp0tYlJZegt2we0G', NULL, NULL, 'QFHyMjhcAtZgtjP8vzIoaUd8oTGgEcgdtePD8viPQVVkYWCzGWPLe1IQLKq6', 0, NULL, NULL, '2022-07-11 09:38:35', '2022-07-31 14:34:29', 1, NULL),
(580, 'Svend Erik Schou', 'sveschou@hotmail.com', NULL, '$2y$10$LLIuxKdCjJNeWJ2CU1M4SuhVVbrUox.yJwc832I5Rayew2DQTlxx.', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:35', '2022-07-11 09:38:35', 1, NULL),
(581, 'Nicholas Bjergbakke', 'nicholasbjergbakke@gmail.com', NULL, '$2y$10$xWnRNIJN6TAgr2U5F3aTDOMoUPMZiWy9jTsI9.2NvYh9mhbRPcGXy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:36', '2022-07-11 09:38:36', 1, NULL),
(582, 'Alija Kurbasic', 'alijakurbasic@gmail.com', NULL, '$2y$10$M81IGBzZM6fcIUw6db7BvuUk4gYdw5XkPV2HntlIATbeW4mt94uGq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:36', '2022-07-11 09:38:36', 1, NULL),
(583, 'Flemming Vester', 'Flemming.vester@gmail.com', NULL, '$2y$10$gbzES4ZqrQKjCH81xqc41OCn0AAh8NSCckeU7EfWnLpaY5C4gc3DG', NULL, NULL, '1pyBYU96fN2ri41vpO29ntq8jJPx9A5tmLbNrQ2uVVIxK6lrvxEvF6UItVTr', 0, NULL, NULL, '2022-07-11 09:38:36', '2022-07-11 09:38:36', 1, NULL),
(584, 'Torben Espersen', 'torben.espersen@gmail.com', NULL, '$2y$10$kG9Wp6Dd2b3Af.EbHIlHueyB2Oana24rnDpDmFAMTmwuHtE.3BXBa', NULL, NULL, 'EZC3ITWgRatCizc4qmk9tvEgL2b1MKEMqEY6BoE7gX9mLp7SHkgabkC4BlJY', 0, NULL, NULL, '2022-07-11 09:38:36', '2022-07-11 09:38:36', 1, NULL),
(585, 'Winnie Edith Svendsen og Morten Busch', 'wisv66@gmail.com', NULL, '$2y$10$nZho0N1wTHClu7NGrxEAx.RxLKSrjmMXTKJv2S/41NQltC9CSJpji', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:37', '2022-07-11 09:38:37', 1, NULL),
(586, 'MGT Holding ApS (Mia Glad Thomsen)', 'glad@uniqadvice.dk', NULL, '$2y$10$YX8tKqslS4jJQK1Wg0lTFOGLe2wppKi1mirAFYOOdnI1IGR1Z95S.', NULL, NULL, 'dwGcQzLnxGJXxRhCVW8RRKvwfB0iVm8zKbF8JmnCTJaAfFw1ocpOiFvf16oK', 0, NULL, NULL, '2022-07-11 09:38:37', '2022-07-25 18:56:37', 1, NULL),
(587, 'Leif Bardino', 'bardino@post9.tele.dk', NULL, '$2y$10$S4RI2M5iAKwE6qkSLzAZcOuMgm57EdJjez1Dfs7LsVvleyo2XZCJG', NULL, NULL, 'i6eIT6os3ghPKeXmBuXkYfAScQflDP8K8eXbL9s9djnXfZgF5ACIDQ9g7pNY', 0, NULL, NULL, '2022-07-11 09:38:37', '2022-08-11 02:30:51', 1, NULL),
(588, 'Gert Konggaard Jensen og Jane Blicher Jensen', 'Gkjhome@gmail.com', NULL, '$2y$10$BE.WbfsXJmlCi9C06s7mAOoqcoYS/JEctuMh/uSiIlzrV2rb7HYeq', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:37', '2022-07-11 09:38:37', 1, NULL),
(589, 'Maria Vils Engkilde & Christian Engkilde', 'cengkilde@gmail.com', NULL, '$2y$10$wH1bYhDPcUCPmHQTxoe/FODzZxR7cNiwhF033LLX7TP7yfborrSwy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:37', '2022-07-11 09:38:37', 1, NULL),
(590, 'Alex Kvist', 'alexkvist@live.dk', NULL, '$2y$10$b5D5OU91lszEg9.7jyCfVOgBmC3vh3AwDCeXCDTRpPM14wI0xtc3a', NULL, NULL, 'jURQeT8FhjdlIkF5qLVqsaAsuvYW63RPVVnZ1zBGE94IMnL4DDT5vctJd5a3', 0, NULL, NULL, '2022-07-11 09:38:38', '2022-07-22 06:23:49', 1, NULL),
(591, 'Musse Foldager og Henrik Andersen', 'musse@dadlnet.dk', NULL, '$2y$10$KjHR7ttJhVwT4NCrC9NjjuoUhy7zP0dpfbtyZqv80OAWwqqVB/lN2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:38', '2022-07-11 09:38:38', 1, NULL),
(592, 'Povl Martin Otzen', 'pmotzen@gmail.com', NULL, '$2y$10$FdJz75SvowW8nBqIyAT.ruizFnVuqLXpl/9QKnRw0/yrmltLUbm0m', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:38', '2022-07-11 09:38:38', 1, NULL),
(593, 'Jan Kofod Larsen', 'invest@kofod-larsen.dk', NULL, '$2y$10$lt4cvKkQFfRD5t5ZsOr7Seu/GemputTzKMFKr6GnTylPBqh.7rwsK', NULL, NULL, 'DQEGI06azwgKAltJXxnjtRlk1EmwEUeOkIozgC6ghgL2RAF5TNUcat1hAMyJ', 0, NULL, NULL, '2022-07-11 09:38:38', '2022-08-12 08:36:56', 1, NULL),
(594, 'Michael Thomsen', 'gitte.michael@hotmail.com', NULL, '$2y$10$z3/sgSF1sRWkQySIRSkWiOk3kn5VLrzhmfC12oxrAW8aj08nCqc1i', NULL, NULL, '2oplCe4eMBgRabVdDMA2MAHPpOUTk99VTBFQdUjaXEYwBMtKkBIHdd9xGxVj', 0, NULL, NULL, '2022-07-11 09:38:38', '2022-07-11 09:38:38', 1, NULL),
(595, 'Birgit Albrechtsen', 'albrechtsenbirgit@gmail.com', NULL, '$2y$10$jOg6zJB7bfyIV2k6vu8BweB9dcuCAs8YwqBCQbJPt4eXmz7CS0uzm', NULL, NULL, 'SaOSeoWN0RUkmeAbvj5fidByHJOPYJnn6sBT1iuyhmoYumnQm48lKYNOCeJ8', 0, NULL, NULL, '2022-07-11 09:38:39', '2022-07-11 09:38:39', 1, NULL),
(596, 'Lars-Kristian Olsen', 'lars_kristian_olsen@hotmail.com', NULL, '$2y$10$UO7YhfRTZ3j.Uyj0hDap4egqU8heCv6aEidDRBA4x.pnYkoXmyxHS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:39', '2022-07-11 09:38:39', 1, NULL),
(597, 'Susan Bank', 'orgelsus@hotmail.com', NULL, '$2y$10$9w13zRltQAakODCjEW3eP.IWhF/oH4TKW3ioNQsckOgTWAA2IIeSa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:39', '2022-07-11 09:38:39', 1, NULL),
(598, 'Arne Henriksen', 'arnehenriksen4@hotmail.com', NULL, '$2y$10$AR4DtVNzD8w9PuSFT1cii.tR5SHA77jojFcoh7kxNiVCe8jAL0BhG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:39', '2022-07-11 09:38:39', 1, NULL),
(599, 'RBN aahus Holding ApS (Ronnie Nielsen)', 'rbn@c.dk', NULL, '$2y$10$nd6vKy.DT1bdtFRHEXbmQuUCbeY3Bsqcip6853pMECGm/BqGnIQVW', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:40', '2022-07-11 09:47:17', 1, NULL),
(600, 'Joern Joergensen og Inger Meiltoft', 'ingermeiltoft@gmail.com', NULL, '$2y$10$Xu0GRRaLI9SdVGz3QAfna.KnIrQYJjRV2VKi0bETi8OjPTeyUpATu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:40', '2022-07-11 09:47:17', 1, NULL),
(601, 'Kurt Christensen og Helle Schou', 'helleschoumadsen@gmail.com', NULL, '$2y$10$Cgt8DMcdQ2hsFV/r4qMu2uG4JDdoJN568wbII14/YeM.eU7/F08JK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:40', '2022-07-11 09:38:40', 1, NULL),
(602, 'Leo B. Nielsen', 'leobn@me.com', NULL, '$2y$10$yq2i7d9Dua/Jc/b3tR02/.Whgtakqt.l7LaheUiaWLoCKRT.22dqS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:40', '2022-07-11 09:38:40', 1, NULL),
(603, 'Ulrik Noerregaard', 'kirlumail@gmail.com', NULL, '$2y$10$7HPyFxQ/fCN/GAeNfCT.beT1okCm0cnlWLKIRVNHe9cbWrqF85JSK', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:41', '2022-07-11 09:47:17', 1, NULL),
(604, 'Hans-Joern Thyssen', 'hj@thyssen-staal.dk', NULL, '$2y$10$84lOay9vwB40/KxU.bA5fODfJNWay3HnvRxpzk/VpG25WNLWTFOdS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:41', '2022-07-11 09:47:18', 1, NULL),
(605, 'Judith Bech Olsen', 'Jubeolsen@gmail.com', NULL, '$2y$10$132yMxR3XiL74pFQis8mEub3cqhipAbdt/aUfT9uX.CuRU6bxbJWC', NULL, NULL, '5vI2jNuVWSLNvoNLkSQL3pmlJehqzUgpySfdmSdT4SeIUTl8ND7XSKOvX2gx', 0, NULL, NULL, '2022-07-11 09:38:41', '2022-07-25 13:19:39', 1, NULL),
(606, 'Anette Holst og Skjold Henrik Hansen', 'anetteholst22@gmail.com', NULL, '$2y$10$17PJ2HXT4iiKahOJXpJ78uC1o9pAdF6mv7Z0Q6R3wZBrxqbhKotlG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:42', '2022-07-11 09:38:42', 1, NULL),
(607, 'Jan Andersen og Lene Andersen', 'two-j-racing@jubii.dk', NULL, '$2y$10$gR8xpqCQ9JmF1esTMCiC9e2e7Vu7aUGvGXu5AmbDIFmYZZvk4DBWW', NULL, NULL, 'VbkcNx6nxDZaiLf24YZOMMDwhasELfn8FTZRwAcj00KNrM66yHCD6zrGQz3d', 0, NULL, NULL, '2022-07-11 09:38:42', '2022-07-20 05:31:43', 1, NULL),
(608, 'Erik Midtgaard', 'midtgaard.privat@gmail.com', NULL, '$2y$10$Y/cwz1KcJHZ6yd0TiE8QQ.TeyqhaT9o2Sj3qs1FCPgh3k5AnN9wUi', NULL, NULL, 'BaRTDLh8igLaXs95l1zxdxE08HYeGdAplWHjhd8uheHHws207l0OQtQksB08', 0, NULL, NULL, '2022-07-11 09:38:42', '2022-07-26 07:39:43', 1, NULL),
(609, 'Soloju Holding (Ole Jespersen)', 'ole@nhjespersen.dk', NULL, '$2y$10$ibxlP/KoBK4oekZ/ZeHR/uLovjfuK/rcafKONrJ1kHpFuvkUq1d7i', NULL, NULL, 'M0LRf3KIaMTEyVeS8lXy7GbtEkmnHfkEDHXXY5say93qDLAo4kCMN4NFbG5p', 0, NULL, NULL, '2022-07-11 09:38:42', '2022-07-11 09:53:59', 1, NULL),
(610, 'Anette Frid Varup', 'varup@pc.dk', NULL, '$2y$10$nhvZTy6AUcnMWj//gXcYXOwr192T84KcL8GWPrYMAIQaHZ3MskLA6', NULL, NULL, 'My69vF8k7KnKm2C284HQUXBTYuNTrY23HLwXaFe2Ye5ocWJZLPJqx0wZXdUf', 0, NULL, NULL, '2022-07-11 09:38:43', '2022-07-11 09:38:43', 1, NULL),
(611, 'Jane Stab Nielsen', 'Janestab@dadlnet.dk', NULL, '$2y$10$HLNq1vnXL7i4Ek2X69yGIeIML.0X75n5Pa.WaLJaxMXHzC0mUWpSC', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:43', '2022-07-11 09:38:43', 1, NULL),
(612, 'Elsebeth Renneberg', 'elsebeth@rennebergs.dk', NULL, '$2y$10$VGCk90WWMZVhjvC.GS.AluxXfptmvA2jd1IvWCqnNsOb5Ice3RBG6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:43', '2022-07-11 09:38:43', 1, NULL),
(613, 'Jens Nielsen', 'jn3433@gmail.com', NULL, '$2y$10$GU9fuqQa7dyAzPAZk4F4K.NMQIPnfPzRgrUECUWFNZnY795Gi4o6y', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:43', '2022-07-11 09:38:43', 1, NULL),
(614, 'Claus og Vibeke Holm', 'ch@vejen.dk', NULL, '$2y$10$LOpcpJhtbXTrKq0DSXvNjeriKolnTmddEpcM9HA/l60Mlz/7YkWra', NULL, NULL, 'g5StRVpfzFiLbjuXOuhwgtJl9gejtfcsX8HHxpn48uTmct5W86rMl6BZ0cUu', 0, NULL, NULL, '2022-07-11 09:38:44', '2022-07-26 15:49:55', 1, NULL),
(615, 'Jens Laugesen og Gudrun Olsen Pind', 'guddepind@yahoo.dk', NULL, '$2y$10$58Q3U8.OkJCTr4kJVIE/KufXgHS5WVLPZ2KgB1iPoU4zq3lTEHv9W', NULL, NULL, 'U0JL0pTkPZ5Y2uUyO5o0DupCOyHoPZUlWWFwElDWzWwWTp0qznk1ZXrL33cE', 0, NULL, NULL, '2022-07-11 09:38:45', '2022-07-25 13:32:24', 1, NULL),
(616, 'Gerd Stafanger', 'gerd@stafanger.dk', NULL, '$2y$10$nushanilT1BV8QwaQFpxZuUPcurRMHB.teGkH5XiWQQHimYVp4xXG', NULL, NULL, '9d3ImtG40KpsQownpJIXH8V296bjeGxkDuRaEcAHJxtEyr4qGncoHLVVs9ky', 0, NULL, NULL, '2022-07-11 09:38:45', '2022-07-20 12:45:12', 1, NULL),
(617, 'Bart Gyldenloeve Roetink', 'bart@roetink.dk', NULL, '$2y$10$YFqOsWOMj4fO1AHmfnCDROUccQwHwgdfH5OXclquyzTftGFBw9Z6u', NULL, NULL, 'fJo34xOaxaFTxVwUQ3xSMLk1SaqNqKSR53oliNjdsgwhkSazbGNQMDqwheHY', 0, NULL, NULL, '2022-07-11 09:38:45', '2022-08-13 08:39:09', 1, NULL),
(618, 'Lisbeth Gille', 'lisbethgille@gmail.com', NULL, '$2y$10$fXxm41NA2Tczm6i8s3iuZuxalZimqwpZDgRihCo4z2gFxm/TSyFqa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:46', '2022-07-11 09:38:46', 1, NULL),
(619, 'Rita Noergaard', 'rita0132@icloud.com', NULL, '$2y$10$8roFvslazreZcBoGmE5ViOqBMPuJG4xX7v3fMLxHWTm6yBbU3Kd0m', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:46', '2022-07-11 09:47:19', 1, NULL),
(620, 'Svend Koelsen-Petersen', 'skp@webspeed.dk', NULL, '$2y$10$isDjQve/HLQ7BcvozAtjzOA8AfxHCWSNK3QukxW6RxDP3JC3jbZMS', NULL, NULL, 'bGr2hdB70Pl4dbPSqRV3MNuOv5H3beUTZLvYbW5XUF7RoMhJK2H55M5gKDGN', 0, NULL, NULL, '2022-07-11 09:38:46', '2022-07-12 11:30:28', 1, NULL),
(621, 'SR Management ApS (Mogens Nyvang)', 'mogens@nyvang.dk', NULL, '$2y$10$0.VlntytPLRvnhdl.qkejugF9zu24C9t4Z9iKrw90OPS2kUFNnZwi', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:46', '2022-07-11 09:38:46', 1, NULL),
(622, 'Kribent Holding ApS (Bent Nissen Pedersen)', 'bent@nissenmail.dk', NULL, '$2y$10$Jg2EYYUjHcv9s8jbFkNG2unWDCezipXTLB/sSDPfOy/6GymaULxoS', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:38:47', '2022-07-11 09:38:47', 1, NULL),
(623, 'Andreas True', 'andreas.true@ftz.dk', NULL, '$2y$10$Sjn5l03Wa83sCcELSR4u1eSoX9KPeCesuhKjkfNTPOrth3RawQ6g2', NULL, NULL, 'Cu2Kj3fcSM5oC5FAUfSht9HUXEREI35bggrbQ3wenZcOmb1KQO1FIuk2hrcd', 0, NULL, NULL, '2022-07-11 09:38:47', '2022-08-11 16:46:30', 1, NULL),
(624, 'Erling Christensen', 'ectoftlund@yahoo.dk', NULL, '$2y$10$N8vVtHud5x6ev2OSssB7FO9YuZHUGwpgbYWxItOZzUrbXzp2E7XBq', NULL, NULL, 'Lq61FAn1PlMvGl6XIAc99fR6DqziQI1RLV03TIzOTmzYAUJBxVGwCwpWZtFd', 0, NULL, NULL, '2022-07-11 09:38:47', '2022-07-19 14:32:28', 1, NULL),
(625, 'Jannie Hundstrup Hansen', 'jannie.hundstrup@gmail.com', NULL, '$2y$10$giX5yNfHACZpNofWDZ6GDON0Nd8vCXs3vDLuH2MlhJQoNqIs83hia', NULL, NULL, 'R6i0xBsTEad8IRAm0nsNNZfgWx2iD0pgFMSn3VvR2nRp1X2yeRApVCVQImlV', 0, NULL, NULL, '2022-07-11 09:38:48', '2022-09-04 12:07:33', 1, NULL),
(626, 'Flemming Kjaergaard', 'fl.kjaergaard@mail.tele.dk', NULL, '$2y$10$xUru5O2iC8hbudgocnuaE.xOHZgAPl9iqUY.e8YLvpOxwuhFmQ23O', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:46:32', '2022-07-11 09:46:32', 1, NULL),
(627, 'Mikael Groenfeldt', 'mikael@gronfeldt.dk', NULL, '$2y$10$HGr/bSu99mvuP1dlTrzJQOy59KhKYT/NxUvPkdohVfs9aRPhu7Dtu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:46:47', '2022-07-11 09:46:47', 1, NULL),
(628, 'Susanne Kruse', 'S-kr@mail.dk', NULL, '$2y$10$YRig2GTICrLsLZIIHgt01eA4Y5MhVnp/as4i0L7dJszpMuUX2H2XS', NULL, NULL, 'MspIU94wByamJcq9ZO90j4lfnT1DDfUCR6ihkEvT4hl5arBY5hlHlGDTdrpV', 0, NULL, NULL, '2022-07-11 09:46:48', '2022-07-11 09:46:48', 1, NULL),
(629, 'Bent Soendergaard', 'elseogbent@mail.dk', NULL, '$2y$10$ByN.oeeS7nqAmpuzXpSTYeT4aYNluz3LWQfbT/0vH7IA3ozvkUuMe', NULL, NULL, '8vjgx4hVhwm4ZMVdHonaqYjbswwfRGs3y6xDuxEESqsyf9KHA4Nws3bnEB1r', 0, NULL, NULL, '2022-07-11 09:46:50', '2022-07-20 07:19:46', 1, NULL),
(630, 'Jens Henrik Broch Jensen', 'broch@mail.dk', NULL, '$2y$10$S54LEwe6hNJTEPWcZzJS/ODzq.dYqQKF9vXdW5P/Lii6NdCJujOGa', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:46:51', '2022-07-11 09:46:51', 1, NULL),
(631, 'Keld Jespersen', 'Galakse@mail.dk', NULL, '$2y$10$ayyZawlPyFEId2GG/1PIj.pZ9i1IIyLo4Xs4YGWMeMnn4YDBPmytO', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:46:51', '2022-07-11 09:46:51', 1, NULL),
(632, 'Claus Dahl', 'clausdahl@mail.dk', NULL, '$2y$10$y0j2PexDhoa9r5494tg0VO6cMXG3XqZoeTZCxeexzB.H4vwmKP5Wy', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:46:55', '2022-07-11 09:46:55', 1, NULL),
(633, 'Dorte Ellen Munch Hjort', 'dorte.hjort@mail.dk', NULL, '$2y$10$zCCptKjRmSHVHwqLJQ6/MuXcKwdHDFMEL1srntAcc0BQ4o64YQ6J2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:46:56', '2022-07-11 09:46:56', 1, NULL),
(634, 'Jens Espensen', 'espensen@mail.com', NULL, '$2y$10$xvqzUGTsDCqjGYYr9wMAoeTi48KnotKzmE2ce0nCc13lwCMq//X8u', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:47:02', '2022-07-11 09:47:02', 1, NULL),
(635, 'Susan og Frantz Rasmussen', 'susan_rasmussen@mail.dk', NULL, '$2y$10$omD4QNo0kmgeFkaDgYk8UO.ewz7sTvMGN41ptPhZU1n8KR6wvqOHi', NULL, NULL, 'FTNoUOSTElDSdOP6X9MjhOrW5qg66JXLTVmWGstdsAr1vdm0vhnKNbarOael', 0, NULL, NULL, '2022-07-11 09:47:07', '2022-08-12 13:12:43', 1, NULL),
(636, 'Jens Joergen Frederiksen', 'jjnf@mail.dk', NULL, '$2y$10$EgKin4ULY4eVF1w4VWNUSuj3IOQ.k0fGvpiLoihpQQTOtXt4hUMGO', NULL, NULL, 'HBdBXdgQ2lRiM123EO9G5wa7iAZKlKM1g7r2OXYyUNAnrEtGUZINgHidR1gs', 0, NULL, NULL, '2022-07-11 09:47:07', '2022-08-18 06:16:50', 1, NULL),
(637, 'Niels Jeppesen', 'Kirstenogniels@mail.tele.dk', NULL, '$2y$10$MySW.zRd2IMmrO59A/GSKePugl6SHemXUjP9UoPkeRbOI1KtYRASy', NULL, NULL, 'aF9UItJCj8GYntP5Sw7JQgajNX1apuHVY264GdvV29RTJnrcfNZsOVgwqTsW', 0, NULL, NULL, '2022-07-11 09:47:10', '2022-07-11 09:47:10', 1, NULL),
(638, 'Karl-Joern Kjemtrup', 'kallekjemtrup@mail.dk', NULL, '$2y$10$ZIMS8TPJqWoO.bZh6pe5guF5yUnL/cUJGPQS4WlFz0./R9MIcOriG', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:47:11', '2022-07-11 09:47:11', 1, NULL),
(639, 'Carsten Mathiasen', 'carmat@mail.dk', NULL, '$2y$10$rGv2aOje1W5Ex/.DKPSGf.ZRaTmUQ.fhT9vTLUIfh9AJoZ1FTjxdi', NULL, NULL, '0tsDg1TOHpzyFkvpe05eWxMIzAJjK7BfGHXKkPOswKK2RRUGDuhgoJWzywIh', 0, NULL, NULL, '2022-07-11 09:47:12', '2022-08-17 18:07:39', 1, NULL),
(640, 'Leif Troels Hededam', 'Lt-hededam@mail.dk', NULL, '$2y$10$nPWHJ2ECp6RXwZHY15LGHOWR8TWGufe8p2YXLq53i.cXi.QYvcf1.', NULL, NULL, '0Pkku1Z1QD91lNbWTueCZxSneKDoL6Gt6jHXQmtzcpRcSAE7csmS76W8rvpn', 0, NULL, NULL, '2022-07-11 09:47:13', '2022-07-11 10:34:11', 1, NULL),
(641, 'Lene Hansen', 'hanle@mail.dk', NULL, '$2y$10$/Yfg4tyfxKZJTtz6AIj1.uAzmzME0OIjQDXd1FKh6ZzMem7UlG9My', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 09:47:14', '2022-07-11 09:47:14', 1, NULL),
(642, 'Jette Elton Burkal og Bengt Kjaer Burkal', 'bengt.burkal@mail.dk', NULL, '$2y$10$9B5ubRiCMoAF1upmg8zL/.TXnF0jHXJBO71safcUmJxyds33N9n9q', NULL, NULL, '5RR2oxjInayptzE4oe8P87qJjpFFNYbq8Rt9xeBssZXm68EpxU18eitbd0xa', 0, NULL, NULL, '2022-07-11 09:47:15', '2022-07-30 10:31:17', 1, NULL),
(643, 'Holdingselskabet Lehmann ApS (Johnny Lehmann)', 'johnnylehmann@mail.dk', NULL, '$2y$10$sL4SdEvNNmO56Aez3nA2YOmFgohRYmzSk9VzuaBaCX6c0VGk7SP4a', NULL, NULL, 'PKQ1pEl2i8Jlrg8mGOzk2US0iwIJPCAiw5kWFk3jzisOLEPJifyHRZGaFXUn', 0, NULL, NULL, '2022-07-11 09:47:17', '2022-07-19 17:33:32', 1, NULL),
(644, 'Michael Roenning Dalby', 'mdalby@hotmail.com', NULL, '$2y$10$LGe8tWKfaMjubWTOHsmPfOPwX3gi/z4Ok52ubKLxD67yWYODMKRSe', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-11 10:05:09', '2022-07-11 10:09:34', 1, NULL),
(645, 'Takhir Berdyiev', 'takhir.berdyiev@outlook.com', NULL, '$2y$10$jqIMbIeb6Cf56woydrF8XufL4XJCUo52GUZttZ8LJ2nHNDpPtuiLu', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-18 04:38:48', '2022-07-18 04:38:48', 1, NULL),
(646, 'Jeppe Sebastian Kofod', 'sjeko@ft.dk', NULL, '$2y$10$kn0zu5oDHU7G2IcJgpI/8O7Wl1McoZvbNTuz2.eD079PKMV69RDhq', NULL, NULL, 'DlisFKFKVn4E1SFYkZfXeDXZOzg5lRGpK8aU9IA6Dszs12FagqRgdcE0Cml2', 0, NULL, NULL, '2022-08-08 10:06:28', '2022-08-14 18:13:08', 1, NULL),
(647, 'SAMK Holding ApS', 'nnikael@msn.com', NULL, '$2y$10$1YdtV7NcznTAA/aNhcQn/.jT.AwneP0Bj0lvlgE.2xAFxrAjQN31G', NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 10:07:21', '2022-08-08 10:07:21', 1, NULL),
(650, 'Keld Stig Thomsen', 'keldthomsen@gmail.com', NULL, '$2y$10$pC4p4kQVZ1r8uCP89wgsbeYGaDF.sq1cUPuTQ4hBeVDFmtwCkjMcK', NULL, NULL, 'if0lCVYikOmILl62qXbAAAv8Yry8YSKBsUyo12RgHkWHjE5gJbS1DXeEI0Ar', 0, NULL, NULL, '2022-08-09 08:26:54', '2022-08-09 11:08:42', 1, NULL),
(651, 'jos bus test', 'josefine@buschardt.dk', NULL, '$2y$10$i4H8iN2DBDbn7kxvkXKU/u1XUQmUDN6afeLyte/FsYJIvece86HpW', NULL, NULL, NULL, 0, NULL, NULL, '2022-09-07 07:19:51', '2022-09-07 07:19:51', 1, NULL),
(652, 'Jonas', 'jbn@investeringog.dk', NULL, '$2y$10$h995IUDfxd7DmjfyV3luF.OQwmJZq8bFGJ8CEiUtqFfRtopyUaYY6', NULL, NULL, NULL, 1, NULL, NULL, '2022-10-24 10:50:43', '2022-10-24 10:50:43', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `round_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishes`
--

CREATE TABLE `wishes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `round_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `week_code` int NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `status` enum('confirmed','waiting','failed','overlimit_confirmed','overlimit_failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `round_user`
--
ALTER TABLE `round_user`
  ADD KEY `round_user_user_id_foreign` (`user_id`),
  ADD KEY `round_user_round_id_foreign` (`round_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD KEY `weeks_property_id_foreign` (`property_id`),
  ADD KEY `weeks_round_id_foreign` (`round_id`);

--
-- Indexes for table `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishes_user_id_foreign` (`user_id`),
  ADD KEY `wishes_round_id_foreign` (`round_id`),
  ADD KEY `wishes_property_id_foreign` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weeks`
--
ALTER TABLE `weeks`
  ADD CONSTRAINT `weeks_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `weeks_round_id_foreign` FOREIGN KEY (`round_id`) REFERENCES `rounds_bak` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
