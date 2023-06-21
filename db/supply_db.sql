-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 06:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supply_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `custodian`
--

CREATE TABLE `custodian` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `itemID` varchar(20) NOT NULL,
  `location` varchar(250) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `remarks` text DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custodian`
--

INSERT INTO `custodian` (`id`, `userID`, `status`, `itemID`, `location`, `quantity`, `remarks`, `date`) VALUES
(1, 1, '2', '1', 'Comlab', '2', '', '2022-09-21'),
(2, 2, '2', '3', 'Room3B', '2', '', '2022-09-21'),
(3, 5, '2', '4', 'Com Lab', '1', 'Student Purposes', '2022-09-21'),
(4, 2, '1', '4', 'Room 10A', '2', 'For projects', '2022-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `userID`, `description`, `quantity`, `value`, `date`) VALUES
(1, 1, 'Printer', 33, '1500', '2022-09-21'),
(2, 1, 'Chair', 200, '500', '2022-09-21'),
(3, 1, 'Eraser', 98, '50', '2022-09-21'),
(4, 1, 'Projector', 14, '8900', '2022-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `email`, `password`) VALUES
(1, 2, 'Pedro penduko', 'admin@admin', 'admin@admin'),
(2, 1, 'Juan Dela Cruz', 'admin@adminn', 'admin@adminn'),
(5, 1, 'Josephine Bracken', 'test@test', 'test@test'),
(6, 2, 'Albert Einstein', 'test@testt', 'test@testt'),
(7, 1, 'admin', 'admintest@admintest', 'admintest@admintest'),
(8, 1, 'video_test', 'video_test@gmail.com', 'video_test@gmail.com'),
(9, 1, 'fortest@test.com', 'fortest@test.com', 'fortest@test.com'),
(10, 1, 'tester@tester.com', 'tester@tester.com', 'tester@tester.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custodian`
--
ALTER TABLE `custodian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custodian`
--
ALTER TABLE `custodian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
