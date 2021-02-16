-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 03:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matchups`
--

CREATE TABLE `matchups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `team1_score` int(11) NOT NULL DEFAULT 0,
  `team2_score` int(11) NOT NULL DEFAULT 0,
  `server_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '127.0.0.1',
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AWAITING RESULT'
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
(64, '2014_10_12_100000_create_password_resets_table', 1),
(65, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(102, '2020_11_09_180403_create_matches_table', 3),
(110, '2014_10_12_000000_create_users_table', 4),
(111, '2019_08_19_000000_create_failed_jobs_table', 4),
(112, '2020_11_09_175917_create_teams_table', 4),
(113, '2020_11_09_180413_create_players_table', 4),
(116, '2020_12_14_130856_matchups', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('charlie@cburg.co.uk', '$2y$10$Q3IVmkguAfH/tA1a1XkrAeVQIAlN/5UwTbP4YX00ieNGHx9YffihS', '2020-11-24 14:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `discord` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `wins` int(11) NOT NULL DEFAULT 0,
  `losses` int(11) NOT NULL DEFAULT 0,
  `draws` int(11) NOT NULL DEFAULT 0,
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `created_at`, `updated_at`, `username`, `full_name`, `country`, `twitter`, `discord`, `team_id`, `wins`, `losses`, `draws`, `rating`, `user_id`) VALUES
(1, '2021-02-11 15:02:10', '2021-02-11 15:02:10', 'Deckard', 'Rick Deckard', 'USA', '@twitter', 'deckard#1234', 1, 15, 4, 1, 0.00, 1),
(2, '2021-02-11 15:03:05', '2021-02-11 15:03:05', 'Roy', 'Roy Batty', 'USA', '@twitter', 'Roy#2019', 2, 8, 2, 1, 0.00, 1),
(3, '2021-02-16 14:33:18', '2021-02-16 14:33:18', 'OfficerK', 'Officer kd6-3.7', 'USA', '@twitter', 'officerk#1234', 1, 15, 4, 1, 0.00, 1),
(4, '2021-02-16 14:33:37', '2021-02-16 14:33:37', 'JOI', 'JOI', 'USA', '@twitter', 'joi#1234', 1, 15, 4, 1, 0.00, 1),
(5, '2021-02-16 14:34:04', '2021-02-16 14:34:04', 'Sebastian', 'J. F. Sebastian', 'USA', '@twitter', 'Sebastian#2019', 1, 15, 4, 1, 0.00, 1),
(6, '2021-02-16 14:34:26', '2021-02-16 14:34:26', 'Joshi', 'Lt. Joshi', 'USA', '@twitter', 'joshi#1234', 1, 15, 4, 1, 0.00, 1),
(7, '2021-02-16 14:34:45', '2021-02-16 14:34:45', 'Leon', 'Leon Kowalski', 'USA', '@twitter', 'Leon#2019', 2, 8, 2, 1, 0.00, 1),
(8, '2021-02-16 14:35:11', '2021-02-16 14:35:11', 'Pris', 'Pris Stratton', 'USA', '@twitter', 'Pris#2019', 2, 8, 2, 1, 0.00, 1),
(9, '2021-02-16 14:35:34', '2021-02-16 14:35:34', 'Zhora', 'Zhora Salome', 'USA', '@twitter', 'Zhora#2019', 2, 8, 2, 1, 0.00, 1),
(10, '2021-02-16 14:35:51', '2021-02-16 14:35:51', 'Gaff', 'E.Gaff', 'USA', '@twitter', 'gaff#2019', 2, 8, 2, 1, 0.00, 1),
(11, '2021-02-16 14:38:06', '2021-02-16 14:38:06', 'Rachel', 'Rachel Tyrell', 'USA', '@twitter', 'Rachel#2049', 3, 3, 6, 2, 0.00, 1),
(12, '2021-02-16 14:38:20', '2021-02-16 14:38:20', 'Tyrell', 'Eldon Tyrell', 'USA', '@twitter', 'Tyrell#2019', 3, 3, 6, 2, 0.00, 1),
(13, '2021-02-16 14:38:34', '2021-02-16 14:38:34', 'Bryant', 'Harry Bryant', 'USA', '@twitter', 'Bryant#2019', 4, 2, 9, 1, 0.00, 1),
(14, '2021-02-16 14:39:03', '2021-02-16 14:39:03', 'Chew', 'Hannibal Chew', 'USA', '@twitter', 'chew#1234', 4, 2, 9, 1, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `primary_sponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `secondary_sponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `created_at`, `updated_at`, `name`, `abbreviation`, `coach_name`, `country`, `rating`, `twitter`, `primary_sponsor`, `secondary_sponsor`) VALUES
(1, '2021-02-11 15:01:11', '2021-02-11 15:01:11', 'TeamX', 'TX', 'Unknown', 'United Kingdom', 0.00, '@twitter', 'Useless Energy Drink', 'Expensive Clothing Brand'),
(2, '2021-02-11 15:01:51', '2021-02-11 15:01:51', 'TeamY', 'TY', 'Unknown', 'United Kingdom', 0.00, '@twitter', 'Overpriced Peripherals Company', 'Crypto Scam'),
(3, '2021-02-16 14:36:29', '2021-02-16 14:36:29', 'TeamZ', 'TZ', 'Unknown', 'Denmark', 0.00, '@twitter', 'Overpriced Peripherals Company', 'Crypto Scam'),
(4, '2021-02-16 14:37:30', '2021-02-16 14:37:30', 'TeamA', 'TA', 'Unknown', 'Brazil', 0.00, '@twitter', 'Fake Fashion Brand', 'Low Quality Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `isAdmin`) VALUES
(1, 'Charlie Burgess', 'charlie@cburg.co.uk', NULL, '$2y$10$v5.fjwnnZyfaPEw02g70Ae2QOg/jsjw4za0LtQau4BgnaPlikdmsm', NULL, '2021-02-11 15:00:08', '2021-02-11 15:00:08', 1);

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
-- Indexes for table `matchups`
--
ALTER TABLE `matchups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matchups_team1_id_foreign` (`team1_id`),
  ADD KEY `matchups_team2_id_foreign` (`team2_id`),
  ADD KEY `matchups_child1_id_foreign` (`child1_id`),
  ADD KEY `matchups_child2_id_foreign` (`child2_id`);

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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `players_username_unique` (`username`),
  ADD KEY `players_team_id_foreign` (`team_id`),
  ADD KEY `players_user_id_foreign` (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`),
  ADD UNIQUE KEY `teams_abbreviation_unique` (`abbreviation`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matchups`
--
ALTER TABLE `matchups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matchups`
--
ALTER TABLE `matchups`
  ADD CONSTRAINT `matchups_child1_id_foreign` FOREIGN KEY (`child1_id`) REFERENCES `matchups` (`id`),
  ADD CONSTRAINT `matchups_child2_id_foreign` FOREIGN KEY (`child2_id`) REFERENCES `matchups` (`id`),
  ADD CONSTRAINT `matchups_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `matchups_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `players_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
