-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 09:49 PM
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
-- Database: `tasks_tsa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `task_date` date NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `task_date`, `is_archived`, `created_at`, `updated_at`) VALUES
(1, 'Finish TSA2', 'Full CRUD and authentication', '2026-10-09', 0, '2026-10-09 21:37:47', '2026-10-09 21:37:47'),
(2, 'Review CodeIgniter filters', 'Controller filters for login', '2026-10-09', 0, '2026-10-09 21:37:47', '2026-10-09 21:37:47'),
(3, 'Push to GitHub', 'Separate repo for TSA2', '2026-10-09', 0, '2026-10-09 21:37:47', '2026-10-09 21:37:47'),
(4, 'scratch that', 'fix sleep sched', '2026-10-09', 1, '2026-10-09 19:42:41', '2026-10-09 19:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `created_at`, `avatar`, `password`) VALUES
(1, 'admin', 'System Admin', '2026-10-02 16:47:48', NULL, '$2y$10$rW4xuYWb7vyqoilPvjYqeu2vo4RSw6k0GKg1gowhVyTB3xjs5MTzq'),
(2, 'cashier1', 'Pedro Garcia', '2026-10-02 16:47:48', NULL, '$2y$10$rW4xuYWb7vyqoilPvjYqeu2vo4RSw6k0GKg1gowhVyTB3xjs5MTzq'),
(3, 'cashier2', 'Rosa Lim', '2026-10-02 16:47:48', NULL, '$2y$10$rW4xuYWb7vyqoilPvjYqeu2vo4RSw6k0GKg1gowhVyTB3xjs5MTzq'),
(4, 'manager', 'Grace Tan', '2026-10-02 16:47:48', NULL, '$2y$10$rW4xuYWb7vyqoilPvjYqeu2vo4RSw6k0GKg1gowhVyTB3xjs5MTzq'),
(5, 'staff1', 'Mark Villanueva', '2026-10-02 16:47:48', NULL, '$2y$10$rW4xuYWb7vyqoilPvjYqeu2vo4RSw6k0GKg1gowhVyTB3xjs5MTzq'),
(6, 'killuazoldyck', 'killuazoldyck@example.com', '0000-00-00 00:00:00', NULL, '$2y$10$rW4xuYWb7vyqoilPvjYqeu2vo4RSw6k0GKg1gowhVyTB3xjs5MTzq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
