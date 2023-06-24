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
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `event_id` int(55) NOT NULL,
  `event_name` char(55) NOT NULL,
  `event_description` char(55) NOT NULL,
  `event_date` date NOT NULL,
  `sponsors_id` int(55) NOT NULL,
  `venue_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`event_id`, `event_name`, `event_description`, `event_date`, `sponsors_id`, `venue_id`) VALUES
(1, 'ONE TEAM', 'ALL SCHOOLS', '2020-06-22', 1, 1),
(2, 'FEB IBIG', 'USTP', '2023-05-28', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors_tbl`
--

CREATE TABLE `sponsors_tbl` (
  `sponsors_id` int(55) NOT NULL,
  `sponsors_name` char(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsors_tbl`
--

INSERT INTO `sponsors_tbl` (`sponsors_id`, `sponsors_name`) VALUES
(1, 'piatos'),
(2, 'STING');

-- --------------------------------------------------------

--
-- Table structure for table `venue_tbl`
--

CREATE TABLE `venue_tbl` (
  `venue_id` int(55) NOT NULL,
  `venue_name` char(55) NOT NULL,
  `venue_description` char(55) NOT NULL,
  `venue_location` char(55) NOT NULL,
  `venue_capacity` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_tbl`
--

INSERT INTO `venue_tbl` (`venue_id`, `venue_name`, `venue_description`, `venue_location`, `venue_capacity`) VALUES
(1, 'USTP DRER GYM', 'USTP SCHOOL', 'CDO', 200),
(2, 'KETKAI', 'MALL', 'CDO', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `sponsors_id` (`sponsors_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `sponsors_tbl`
--
ALTER TABLE `sponsors_tbl`
  ADD PRIMARY KEY (`sponsors_id`);

--
-- Indexes for table `venue_tbl`
--
ALTER TABLE `venue_tbl`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `event_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sponsors_tbl`
--
ALTER TABLE `sponsors_tbl`
  MODIFY `sponsors_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue_tbl`
--
ALTER TABLE `venue_tbl`
  MODIFY `venue_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`sponsors_id`) REFERENCES `sponsors_tbl` (`sponsors_id`),
  ADD CONSTRAINT `event_tbl_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `venue_tbl` (`venue_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
