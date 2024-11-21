-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 10:52 AM
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
-- Database: `kenyattaversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `boardroom`
--

CREATE TABLE `boardroom` (
  `boardroom_id` int(11) NOT NULL,
  `boardroom_name` varchar(255) NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boardroom`
--

INSERT INTO `boardroom` (`boardroom_id`, `boardroom_name`, `building_name`, `location`, `capacity`) VALUES
(1, 'ICT boardroom', 'ADM', 'ADMINISTARTION', 333),
(2, 'IT boardroom ', 'ADM', 'ADMINISTARTION', 80),
(3, 'B1', 'CSC', 'ADMINISTION', 333),
(4, 'B2', 'CSC', 'ADMINISTION', 333);

-- --------------------------------------------------------

--
-- Table structure for table `boardrooms`
--

CREATE TABLE `boardrooms` (
  `id` int(11) NOT NULL,
  `names` varchar(100) DEFAULT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boardrooms`
--

INSERT INTO `boardrooms` (`id`, `names`, `building_id`) VALUES
(1, 'IT', 1),
(2, 'ICT', 1),
(3, 'b1', 2),
(4, 'b2', 2),
(5, 'b3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `names` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `names`) VALUES
(1, 'CSC'),
(2, 'Engineering'),
(3, 'ADM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boardroom`
--
ALTER TABLE `boardroom`
  ADD PRIMARY KEY (`boardroom_id`);

--
-- Indexes for table `boardrooms`
--
ALTER TABLE `boardrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boardroom`
--
ALTER TABLE `boardroom`
  MODIFY `boardroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boardrooms`
--
ALTER TABLE `boardrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boardrooms`
--
ALTER TABLE `boardrooms`
  ADD CONSTRAINT `boardrooms_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
