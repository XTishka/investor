-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2023 at 01:39 PM
-- Server version: 10.3.36-MariaDB-0+deb10u2-log
-- PHP Version: 7.3.33-8+0~20221028.101+debian10~1.gbpb248c7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c178investor`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `country`, `address`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(46, 'Oggebbio', 'Italien', 'Via Nazionale nr.70, 28824 Oggebbio VB', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(47, 'Baveno', 'Italien', 'Piazza Monte Camoscio, 3, 28831 Baveno VB', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(48, 'Orsara Bormida', 'Italien', 'Via Umberto I, 20, 15010 San Quirico AL', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(49, 'Seborga Terrassen', 'Italien', 'Via Giacomo Matteotti, 4a, 18012 Seborga IM', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(50, 'Seborga Balkonen', 'Italien', 'Via Giacomo Matteotti, 4, 18012 Seborga IM', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(51, 'Arpino', 'Italien', 'Via Treppanico snc, 03033 Arpino', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(52, 'Montegrosso', 'Italien', 'Via Rocca D Arazzo 3, 14048 Montegrosso AT', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(53, 'Anzio', 'Italien', 'Via Elettra 1, interno 4, 00042 Anzio RM (1. sal t.h.)', NULL, '2022-07-08 09:34:19', '2022-07-08 09:34:19', NULL),
(54, 'Traehytten Folgarida', 'Italien', 'Str. del Roccolo, 43, 38025 Folgarida TN', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(55, 'Il Piccolo Folgarida', 'Italien', 'Strada Madonna delle Nevi, 2, 38025 Folgarida TN', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(57, 'Torri del Benaco', 'Italien', 'Localita Spighetta 29, 37010 Torri Del Benaco (Hus 13)', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(58, 'Soiano del Lago', 'Italien', 'Via Roveglio 17, 25080 Soiano BS (parkeringsplads nr. 3)', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(59, 'Sainte-Maxime 308', 'Frankrig', 'Les coteaux de la Nartelle 3, 83120 Sainte Maxime', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(60, 'Sainte-Maxime 309', 'Frankrig', 'Les coteaux de la Nartelle 3, 83120 Sainte Maxime', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(61, 'Cannes 806', 'Frankrig', '6  Rue de la Verrerie, 06150 Cannes (lejlighed 806)', NULL, '2022-07-08 09:34:20', '2022-07-08 09:35:44', NULL),
(62, 'Enghien (Paris)', 'Frankrig', '38 Rue du Depart, 95880 Enghien-les-Bains, 1 sal', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(63, 'Vence', 'Frankrig', '943 Chemin de Vosgelade, 06140 Vence. (Section BN, nummer 159)', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(64, 'La Cala de Mijas 305', 'Spanien', 'Calle Saturno 56, 29649, Las lagunas de Mijas, Malaga', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(65, 'La Cala de Mijas 307', 'Spanien', 'Calle Saturno 56, 29649, Las lagunas de Mijas, Malaga', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(66, 'Los Dolses 630', 'Spanien', 'Calle Fresa 33, 03189 Orihuela, Alicante, Costa Blanca (nr. 630)', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(67, 'Los Dolses 628', 'Spanien', 'Calle Fresa 33, 03189 Orihuela, Alicante, Costa Blanca (nr. 628)', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(68, 'Bosque', 'Spanien', 'Ctra. San Miguel de Salinas 14, 03193 Orihuela, Alicante', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(69, 'Alicante Calle Union', 'Spanien', 'C. Union 13, 03005 Alicante', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(70, 'Palangreros 1B', 'Spanien', 'C. Palangreros, 40, 29640 Fuengirola, Malaga', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(71, 'Palangreros 2A', 'Spanien', 'C. Palangreros, 40, 29640 Fuengirola, Malaga', NULL, '2022-07-08 09:34:20', '2022-07-08 09:34:20', NULL),
(72, 'Maria Rosario', 'Spanien', 'Calle Antonio Rubio Torres, 1, 29640 Fuengirola, Malaga', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(73, 'Zeniamar', 'Spanien', 'C/Abeto 6, doer 15, 03189 Orihuela Costa, Alicante', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(74, 'Hacienda Competa', 'Spanien', 'Diseminado diseminados 98, 29754 Malaga', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(75, 'Hacienda B&B Alicante', 'Spanien', 'Paa vej, ligger ved 30520 Jumila, Murcia', NULL, '2022-07-08 09:34:21', '2022-07-15 14:25:21', '2022-07-15 14:25:21'),
(76, 'Skagen Strand 41', 'Danmark', 'Tranevej 108, Hulsig, 9990 Skagen (hus nr.41)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:37:41', NULL),
(77, 'Skagen Strand 79', 'Danmark', 'Tranevej 108, Hulsig, 9990 Skagen (hus nr.79)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:38:05', NULL),
(78, 'Skagen Strand 97', 'Danmark', 'Tranevej 108, Hulsig, 9990 Skagen (hus nr.97)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:38:35', NULL),
(79, 'Roemoe 12', 'Danmark', 'Vestergade 225G, 6792 Roemoe (lejlighed 12)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(80, 'Roemoe 127', 'Danmark', 'Vestergade 153C, 6792 Roemoe (lejlighed 127)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(81, 'Roemoe 139', 'Danmark', 'Vestergade 161B, 6792 Roemoe (lejlighed 139)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(82, 'Roemoe - Gulirisvej 1103', 'Danmark', 'Gulirisvej 3, 6792, Roemoe (hus 1103)', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(83, 'Goslar - Breite Strasse', 'Tyskland', 'Breite Strasse 19A, 38640 Goslar', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(84, 'Goslar - Reitstallweg', 'Tyskland', 'Reitstallweg 3, 38640 Goslar', NULL, '2022-07-08 09:34:21', '2022-07-08 09:39:40', NULL),
(85, 'Karin Strandhus', 'Kroatien', 'Vruljice 21, Krusevo, 23450 Obrovac', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(86, 'Karin Punta', 'Kroatien', 'Novigradska 30, Krusevo, 23450 Obrovac', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(87, 'Budvahuset Stuen', 'Montenegro', 'Krimovica bb, 85330 Kotor', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(88, 'Budvahuset 1. sal', 'Montenegro', 'Krimovica bb, 85330 Kotor', NULL, '2022-07-08 09:34:21', '2022-07-08 09:34:21', NULL),
(89, 'Budvahuset 2. sal', 'Montenegro', 'Krimovica bb, 85330 Kotor', NULL, '2022-07-08 09:34:22', '2022-07-08 09:34:22', NULL),
(90, 'Tivathuset', 'Montenegro', 'Obosnik 18, Krasici, 85320 Tivat', NULL, '2022-07-08 09:34:22', '2022-07-08 09:34:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
