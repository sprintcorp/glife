-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 12:51 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glife`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `faculty_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Theater arts', '2020-01-01 05:31:39', '2020-01-01 07:16:49', NULL),
(2, 3, 'English Education', '2020-01-01 05:33:09', '2020-01-01 05:33:09', NULL),
(3, 1, 'Music', '2020-01-01 05:58:08', '2020-01-01 05:58:08', NULL),
(4, 4, 'Political Science', '2020-01-01 06:08:35', '2020-01-06 03:36:41', '2020-01-06 03:36:41'),
(5, 5, 'Religious Law', '2020-01-01 09:13:48', '2020-01-13 07:33:44', '2020-01-13 07:33:44'),
(6, 1, 'Drama', '2020-01-02 05:05:53', '2020-01-02 05:05:53', NULL),
(7, 2, 'Computer science', '2020-01-02 05:07:08', '2020-01-02 05:07:26', '2020-01-02 05:07:26'),
(8, 7, 'Politics', '2020-01-02 07:51:05', '2020-01-02 07:51:23', '2020-01-02 07:51:23'),
(9, 11, 'Religious Law', '2020-01-14 05:25:30', '2020-01-14 05:25:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Art', '2020-01-01 04:51:37', '2020-01-01 04:51:37', NULL),
(2, 'Science', '2020-01-01 04:52:49', '2020-01-01 04:52:49', NULL),
(3, 'Education', '2020-01-01 04:53:16', '2020-01-01 04:53:16', NULL),
(4, 'Hummanities', '2020-01-01 04:53:28', '2020-01-01 04:53:28', NULL),
(5, 'Law', '2020-01-01 04:53:34', '2020-01-14 05:24:58', '2020-01-14 05:24:58'),
(6, 'Banking and Finance', '2020-01-01 09:34:28', '2020-01-13 07:51:45', '2020-01-13 07:51:45'),
(7, 'Pol science', '2020-01-02 07:50:19', '2020-01-13 07:51:34', '2020-01-13 07:51:34'),
(8, 'Pol science', '2020-01-02 07:50:20', '2020-01-13 07:51:23', '2020-01-13 07:51:23'),
(9, 'Business Admin', '2020-01-04 00:49:32', '2020-01-13 07:51:15', '2020-01-13 07:51:15'),
(10, 'Language', '2020-01-13 06:26:11', '2020-01-13 07:51:06', '2020-01-13 07:51:06'),
(11, 'Law', '2020-01-14 05:25:18', '2020-01-14 05:25:18', NULL);

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_31_175040_create_faculty_table', 1),
(5, '2019_12_31_175133_create_department_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('adetimifred@gmail.com', '$2y$10$ZTooMx23YH04UrOr8yn3fewLPed1WeFeyD/c2VVG0IES8u9Ivto8O', '2020-01-12 04:01:41'),
('sprintcorp7@gmail.com', '$2y$10$W7y8d2hRITyd3qj5.imjF.pdUaX8V7EUf2ctTQ3Pa6Z5sRUc8q46q', '2020-01-12 10:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 34, '2020-01-12 01:29:32', '2020-01-12 01:29:32'),
(2, 35, '2020-01-12 01:49:13', '2020-01-12 01:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `faculty_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` bigint(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` int(11) NOT NULL DEFAULT 0,
  `blood` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `matric_no`, `image`, `email_verified_at`, `password`, `user_password`, `isAdmin`, `faculty_id`, `department_id`, `programme`, `level`, `remember_token`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`, `request`, `blood`, `gender`) VALUES
(1, 'Adeyemi Admin', 'adetimifred@gmail.com', 'admin', NULL, '2019-12-30 08:00:00', '$2y$10$6ZmA8kDRxd2p6g4anW.UvODdpQOZXPmswVZsQICyjcB5hGK2I4kLS', '11111111', 1, '', '', NULL, NULL, NULL, NULL, '2020-01-14 05:50:44', '2020-01-13 21:50:44', '127.0.0.1', 0, NULL, NULL),
(36, 'Billy Jone Phill', 'Sprintmail@gmail.com', '987654321', NULL, NULL, '$2y$10$ntSwbsNej5b3bTaZZhB7ZusObqj2j7r.Mn/l/Z/O7skdoI82RHNyq', 'Phill', 0, '1', '1', 'NCE', 100, NULL, '2020-01-12 03:26:13', '2020-01-12 03:26:13', NULL, NULL, 0, NULL, NULL),
(37, 'timi Fred Adebayo', 'fred@mail.com', '123456789', NULL, NULL, '$2y$10$wnl7909O5P6anhT6sxbwiOuT5evm7OLkzIvNUiHnA5t8DiEDwzkoq', 'Adebayo', 0, '1', '1', 'NCE', 200, NULL, '2020-01-12 03:26:13', '2020-01-12 03:26:13', NULL, NULL, 0, NULL, NULL),
(38, 'fred Yemi Gab', 'sprintcorp7@gmail.com', '1234567890', 'photo/157895740338file.jpg', NULL, '$2y$10$eGcD2KyTTzZEy9M1MQpw8uA0RGffbIuFw0qh.uRcRB2tuoLZLqOWe', 'Gab', 0, '1', '1', 'NCE', 100, NULL, '2020-01-12 03:26:13', '2020-01-14 07:16:43', '2020-01-13 23:07:23', '127.0.0.1', 0, 'O+', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_matric_no_unique` (`matric_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
