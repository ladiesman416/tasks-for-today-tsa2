-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2026 at 08:15 PM
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
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Maria Santos', 'maria@example.com', '09171234567', '2026-10-02 16:47:44'),
(2, 'Juan Dela Cruz', 'juan@example.com', '09181234567', '2026-10-02 16:47:44'),
(3, 'Ana Reyes', 'ana@example.com', '09191234567', '2026-10-02 16:47:44'),
(4, 'Carlo Mendoza', 'carlo@example.com', NULL, '2026-10-02 16:47:44'),
(5, 'Liza Ramos', 'liza@example.com', '09201234567', '2026-10-02 16:47:44'),
(6, 'Gon Freecs', 'jajanken@email.com', NULL, '0000-00-00 00:00:00');

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
