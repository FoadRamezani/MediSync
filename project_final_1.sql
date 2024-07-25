-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 03:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_final_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superuser` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(64) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `superuser`, `email`, `phone`) VALUES
(1, 'nipun', '$2y$10$.Zix06SWQpae6oEMsAqkVOY1f2SAV.fyVmnQGAOpjsBmQOGAB5ZHa', 0, 'nipungoyal3112@gmail.com', NULL),
(2, 'ok', '$2y$10$4yATWQYGzvAJF2JHL0PWfuCVOCTR84rKWETNxLs8zCp5RAon1MhVm', 0, 'ok@gmail.com', NULL),
(3, 'admin', '$2y$10$8xWMGQ6Th/Ruo9U4DeT5HOhBb9xRMgdnmq0BFS3m3mefwKeEJeyPu', 1, 'admin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `aptNumber` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Time` time NOT NULL,
  `Day` text NOT NULL,
  `medicalLicence` int(11) DEFAULT NULL,
  `healthNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`aptNumber`, `Status`, `Time`, `Day`, `medicalLicence`, `healthNo`) VALUES
(1, 'Reserved', '03:00:00', 'Monday', 6754387, 1010),
(2, 'Reserved', '04:00:00', 'Monday', 6754387, 0),
(3, 'Reserved', '11:00:00', 'Saturday', 8769870, 456789),
(4, 'Reserved', '10:00:00', 'Monday', 2343245, 0),
(7, 'Available', '10:00:00', 'Monday', 23, 1010),
(8, 'Available', '10:00:00', 'Monday', 23, 7860943),
(9, 'Available', '10:00:00', 'Monday', 23, 7860943),
(10, 'Available', '10:00:00', 'Monday', 123, 7860943),
(11, 'Available', '17:30:00', 'Thursday', 123, 7860943);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `medicalLicence` int(11) NOT NULL,
  `doctorName` text NOT NULL,
  `email` text NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `address` text NOT NULL,
  `specialization` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`medicalLicence`, `doctorName`, `email`, `phoneNo`, `address`, `specialization`) VALUES
(23, 'new1', 'nipun@google.ca', 778, '2', ''),
(123, 'test', 'Nipun@test.com', 604, '789 ', 'eye'),
(2343245, 'new', 'test@gmail.com', 123467786, '234ghcc', 'Heart'),
(6754387, 'new2', 'test1@gmail.com', 1236787934, 'testing testing', 'Eye Care'),
(8769870, 'new3', 'test4@gmail.com', 1234567658, '7896 street', 'Heart Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `healthNo` int(7) NOT NULL,
  `email` text NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`fname`, `lname`, `healthNo`, `email`, `phoneNo`, `address`, `gender`) VALUES
('nipunn', 'gg', 0, 'nipun@gmail.com', 2147483647, '12666 72 ave', 'Male'),
('nipun', 'goyal', 111, 'nipungoyal3112@gmail.com', 2147483647, '9279 156A Street', 'Male'),
('John', 'Wallace', 1010, 'John@test.com', 604, '123 ', 'Male'),
('Nipun', 'Goyal', 123456, 'Nipun@gmail.com', 604442, '123 fleetwood dr', 'Male'),
('Arindam', 'Test', 456789, 'rajan@gmail.com', 1234356789, '789 yt', 'Male'),
('Test', 'Test', 789456, 'Test@test.com', 604442, '123 fleetwood', 'Male'),
('John', 'Wallace', 2345645, 'testing@gmail.com', 1234542345, '6474hfdjcdk', 'Male'),
('Rajandeep', 'Keep', 3456780, 'rajan@gmail.com', 1234567882, '5674 st', 'Female'),
('test', 'Deep', 3456789, 'rajan@gmail.com', 1234567882, '5674 st', 'Female'),
('Rajandeep', 'Kaur', 7860943, 'rajandeep@gmail.com', 1256786543, '778 street , Surrey,bc', 'Female'),
('Rajan', 'Test', 7878987, 'test@gmail.com', 1234567826, '567tyhgu', 'Female'),
('Nipun', 'goyal', 789456123, 'Nipun@gmail.com', 604442, '123', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `documentId` int(11) NOT NULL,
  `pdf_file` text NOT NULL,
  `healthNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`aptNumber`),
  ADD KEY `medicalLicence` (`medicalLicence`),
  ADD KEY `healthNo` (`healthNo`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`medicalLicence`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`healthNo`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`documentId`),
  ADD KEY `healthNo` (`healthNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `aptNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `documentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`medicalLicence`) REFERENCES `doctors` (`medicalLicence`),
  ADD CONSTRAINT `availability_ibfk_2` FOREIGN KEY (`healthNo`) REFERENCES `registration` (`healthNo`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`healthNo`) REFERENCES `registration` (`healthNo`);
COMMIT;

--
-- New table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
