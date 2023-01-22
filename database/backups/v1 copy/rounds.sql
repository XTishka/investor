-- phpMyAdmin SQL Dump

-- version 5.0.2

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Generation Time: Jan 21, 2023 at 01:40 PM

-- Server version: 10.3.36-MariaDB-0+deb10u2-log

-- PHP Version: 7.3.33-8+0~20221028.101+debian10~1.gbpb248c7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `c178investor`

--

-- --------------------------------------------------------

--

-- Table structure for table `rounds`

--

CREATE TABLE
    `rounds` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `start_round_date` date NOT NULL,
        `start_wishes_date` date NOT NULL,
        `end_wishes_date` date NOT NULL,
        `end_round_date` date NOT NULL,
        `max_wishes` int(11) NOT NULL DEFAULT 20,
        `lock` tinyint(1) NOT NULL DEFAULT '0',
        `active` tinyint(1) NOT NULL DEFAULT '0',
        `publicate` tinyint(1) NOT NULL DEFAULT '0',
        `overlimit` tinyint(1) NOT NULL DEFAULT '0',
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        `deleted_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `rounds`

--

INSERT INTO
    `rounds` (
        `id`,
        `name`,
        `description`,
        `start_round_date`,
        `end_wishes_date`,
        `end_round_date`,
        `max_wishes`,
        `created_at`,
        `updated_at`,
        `deleted_at`
    )
VALUES (
        1,
        'Round before',
        'Sunt voluptate assumenda eaque corporis id minus perspiciatis. Nemo maiores omnis qui debitis quos. Enim eum accusamus ipsum nihil. Aspernatur nesciunt sint dolor dolores et.',
        '2022-01-10',
        '2022-01-01',
        '2022-05-01',
        20,
        '2022-07-07 09:02:52',
        '2022-07-07 10:29:20',
        '2022-07-07 10:29:20'
    ), (
        2,
        'Prioriteringsrunde 2. halvår 2022',
        'Prioriteringsrunden løber fra uge 43 2022 til uge 14 2023',
        '2022-10-22',
        '2022-08-15',
        '2023-04-08',
        20,
        '2022-07-07 09:02:52',
        '2022-07-25 07:08:29',
        NULL
    ), (
        3,
        'Round after',
        'Iusto eius et et impedit laboriosam in. Eaque odio quos vel eaque dignissimos. Soluta vitae explicabo exercitationem sint voluptatem soluta nulla. Illum voluptatem deleniti quos sed.',
        '2023-01-10',
        '2023-01-01',
        '2023-05-01',
        20,
        '2022-07-07 09:02:52',
        '2022-07-11 06:04:42',
        '2022-07-11 06:04:42'
    ), (
        4,
        'Testrunde',
        NULL,
        '2022-09-09',
        '2022-09-08',
        '2022-09-12',
        20,
        '2022-09-07 07:08:44',
        '2022-09-07 07:17:06',
        '2022-09-07 07:17:06'
    ), (
        5,
        'testrunde',
        NULL,
        '2022-10-01',
        '2022-09-09',
        '2022-10-31',
        20,
        '2022-09-07 07:17:33',
        '2022-09-07 07:17:33',
        NULL
    );

--

-- Indexes for dumped tables

--

--

-- Indexes for table `rounds`

--

ALTER TABLE `rounds` ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `rounds`

--

ALTER TABLE
    `rounds` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;
