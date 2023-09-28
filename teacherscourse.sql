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
-- Table structure for table `teacherscourse`
--

CREATE TABLE `teacherscourse` (
  `tid` int(100) NOT NULL,
  `tea_id` int(100) NOT NULL,
  `courseID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacherscourse`
--

INSERT INTO `teacherscourse` (`tid`, `tea_id`, `courseID`) VALUES
(3, 2, 6),
(4, 2, 7),
(5, 5, 4),
(6, 5, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacherscourse`
--
ALTER TABLE `teacherscourse`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `teacherscourse_ibfk_1` (`tea_id`),
  ADD KEY `courseID` (`courseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacherscourse`
--
ALTER TABLE `teacherscourse`
  MODIFY `tid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacherscourse`
--
ALTER TABLE `teacherscourse`
  ADD CONSTRAINT `teacherscourse_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `teacherscourse_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
