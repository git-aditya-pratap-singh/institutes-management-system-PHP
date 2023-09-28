-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 01:18 PM
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
-- Database: `crescdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentscourse`
--

CREATE TABLE `studentscourse` (
  `cid` int(11) NOT NULL,
  `stud_id` int(100) DEFAULT NULL,
  `courseName` varchar(100) DEFAULT NULL,
  `courseId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `studentscourse`
--

INSERT INTO `studentscourse` (`cid`, `stud_id`, `courseName`, `courseId`) VALUES
(64, 114, '', 6),
(65, 113, '', 4),
(66, 113, '', 5),
(67, 112, '', 5),
(68, 112, '', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentscourse`
--
ALTER TABLE `studentscourse`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `courseId` (`courseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentscourse`
--
ALTER TABLE `studentscourse`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentscourse`
--
ALTER TABLE `studentscourse`
  ADD CONSTRAINT `studentscourse_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `studentscourse_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
