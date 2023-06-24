-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 06:10 AM
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
-- Database: `notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE `notification_tbl` (
  `notif_id` int(55) NOT NULL,
  `title` char(55) NOT NULL,
  `message` char(55) NOT NULL,
  `timestamp` date NOT NULL,
  `sender_id` int(55) NOT NULL,
  `recipient_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_tbl`
--

INSERT INTO `notification_tbl` (`notif_id`, `title`, `message`, `timestamp`, `sender_id`, `recipient_id`) VALUES
(1, 'wew', '13QWER', '2023-06-15', 2, 3),
(3, 'wew', 'das', '2022-06-05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipient_tbl`
--

CREATE TABLE `recipient_tbl` (
  `recipient_id` int(55) NOT NULL,
  `name` char(55) NOT NULL,
  `email` char(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipient_tbl`
--

INSERT INTO `recipient_tbl` (`recipient_id`, `name`, `email`) VALUES
(1, 'earl elaco', 'earl@gmail.com'),
(3, 'dasda', 'dasdasdsad');

-- --------------------------------------------------------

--
-- Table structure for table `sender_tbl`
--

CREATE TABLE `sender_tbl` (
  `sender_id` int(55) NOT NULL,
  `name` char(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sender_tbl`
--

INSERT INTO `sender_tbl` (`sender_id`, `name`) VALUES
(2, 'juan'),
(3, 'khen paler'),
(4, 'loweds');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `recipient_tbl`
--
ALTER TABLE `recipient_tbl`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `sender_tbl`
--
ALTER TABLE `sender_tbl`
  ADD PRIMARY KEY (`sender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  MODIFY `notif_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipient_tbl`
--
ALTER TABLE `recipient_tbl`
  MODIFY `recipient_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sender_tbl`
--
ALTER TABLE `sender_tbl`
  MODIFY `sender_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
