-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 07:24 PM
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
-- Database: `qr_ats`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'SSBT', 'admin@ssbt.com', 'coet');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `section` varchar(5) NOT NULL,
  `rollno` varchar(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `s_id`, `s_name`, `subject`, `section`, `rollno`, `date`) VALUES
(198, 5, 'Prashant Patil', 'os', 'C', '02', '2024-04-15 00:00:00'),
(202, 3, 'Aashish Gore', 'os', 'A', '66', '2024-04-15 00:00:00'),
(204, 4, 'Lokesh Chaudhari', 'os', 'A', '38', '2024-04-15 00:00:00'),
(205, 2, 'Vipul Girase', 'os', 'A', '65', '2024-04-15 00:00:00'),
(207, 5, 'Prashant Patil', 'NN', 'C', '02', '2024-04-15 16:06:05'),
(208, 3, 'Aashish Gore', 'NN', 'A', '66', '2024-04-15 16:06:05'),
(209, 2, 'Vipul Girase', 'NN', 'A', '65', '2024-04-15 16:06:05'),
(210, 5, 'Prashant Patil', 'os', 'C', '02', '2024-04-15 22:44:52'),
(211, 3, 'Aashish Gore', 'os', 'A', '66', '2024-04-15 22:44:52'),
(212, 1, 'Prerana Mandale', 'os', 'B', '43', '2024-04-15 22:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roll_no` varchar(5) NOT NULL,
  `section` varchar(5) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `roll_no`, `section`, `password`) VALUES
(1, 'Prerana Mandale', 'prerana@gmail.com', '43', 'B', 'prerana@123'),
(2, 'Vipul Girase', 'vipul@gmail.com', '65', 'A', 'vipul@123'),
(3, 'Aashish Gore', 'aashish@gmail.com', '66', 'A', 'aashish@123'),
(4, 'Lokesh Chaudhari', 'lokesh@gmail.com', '38', 'A', 'lokesh@123'),
(5, 'Prashant Patil', 'prashant@gmail.com', '02', 'C', 'prashant@123');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `subject`, `password`) VALUES
(1, 'Shital A Patil', 'sap@gmail.com', 'os', 'pass'),
(2, 'Dr. S P Ramteke', 'spr@gmail.com', 'NN', 'pass'),
(3, 'Priyanka V Medhe', 'pvm@gmail.com', 'DAA', 'pass'),
(4, 'Mohan P Patil', 'mpp@gmail.com', 'CN', 'pass'),
(5, 'Mayuri R Chandratre', 'mrc@gmail.com', 'PM', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_id` (`s_id`,`date`),
  ADD UNIQUE KEY `s_id_2` (`s_id`,`subject`,`date`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
