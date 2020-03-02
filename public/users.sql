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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
