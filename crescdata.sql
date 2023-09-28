-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 01:19 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `SN` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`SN`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(100) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `description`) VALUES
(4, 'MERN', 'MERN stands for MongoDB, Express, React, Node.'),
(5, 'MEAN', 'MEAN stands for MongoDB, Express, Angular, Node.\r\n'),
(6, 'MEVN', 'MERN stands for MongoDB, Express, Vue, Node.'),
(7, 'LAMP', 'LAMP stands for Linux, Apache, Mysql, PHP.');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `dob`, `Gender`) VALUES
(112, 'Vikas Kumar Patel', 'Sakshisingh234@gmail.com', '7896482545', '2023-09-28', 'male'),
(113, 'Aditya Pratap Singh', 'singh@gmail.com', '8456928969', '2023-09-28', 'male'),
(114, 'Sakshi Singh', 'singhsakshi@gmail.com', '8456928969', '2023-09-28', 'female');

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

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `dob`, `Gender`) VALUES
(2, 'Vicky Samson ', 'samson234@gmail.com', '8546935684', '2023-09-26', 'male'),
(5, 'Anuradha Singh', 'anuradha23@gmail.com', '8523697456', '2023-09-28', 'female');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentscourse`
--
ALTER TABLE `studentscourse`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `SN` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `studentscourse`
--
ALTER TABLE `studentscourse`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacherscourse`
--
ALTER TABLE `teacherscourse`
  MODIFY `tid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentscourse`
--
ALTER TABLE `studentscourse`
  ADD CONSTRAINT `studentscourse_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `studentscourse_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);

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
