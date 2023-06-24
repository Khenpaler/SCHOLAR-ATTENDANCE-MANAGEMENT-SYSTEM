-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 06:11 AM
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
-- Database: `scholars`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses_tbl`
--

CREATE TABLE `courses_tbl` (
  `courses_id` int(55) NOT NULL,
  `courses_name` char(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_tbl`
--

INSERT INTO `courses_tbl` (`courses_id`, `courses_name`) VALUES
(1, 'BSIT'),
(2, 'BSA'),
(3, 'BSCE'),
(5, 'BSPA');

-- --------------------------------------------------------

--
-- Table structure for table `scholars_tbl`
--

CREATE TABLE `scholars_tbl` (
  `scholars_id` int(55) NOT NULL,
  `scholars_name` char(55) NOT NULL,
  `year_level` enum('1','2','3','4','5') NOT NULL,
  `school_id` int(55) NOT NULL,
  `courses_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholars_tbl`
--

INSERT INTO `scholars_tbl` (`scholars_id`, `scholars_name`, `year_level`, `school_id`, `courses_id`) VALUES
(1, 'Ian Callo', '2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_tbl`
--

CREATE TABLE `school_tbl` (
  `school_id` int(55) NOT NULL,
  `school_name` char(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_tbl`
--

INSERT INTO `school_tbl` (`school_id`, `school_name`) VALUES
(1, 'USTP'),
(2, 'COC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `scholars_tbl`
--
ALTER TABLE `scholars_tbl`
  ADD PRIMARY KEY (`scholars_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `courses_id` (`courses_id`);

--
-- Indexes for table `school_tbl`
--
ALTER TABLE `school_tbl`
  ADD PRIMARY KEY (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `courses_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scholars_tbl`
--
ALTER TABLE `scholars_tbl`
  MODIFY `scholars_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_tbl`
--
ALTER TABLE `school_tbl`
  MODIFY `school_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scholars_tbl`
--
ALTER TABLE `scholars_tbl`
  ADD CONSTRAINT `scholars_tbl_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_tbl` (`school_id`),
  ADD CONSTRAINT `scholars_tbl_ibfk_2` FOREIGN KEY (`courses_id`) REFERENCES `courses_tbl` (`courses_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
