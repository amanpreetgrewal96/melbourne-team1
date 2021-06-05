-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 05:36 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `rms_admin`
--

CREATE TABLE `rms_admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `isactive` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_admin`
--

INSERT INTO `rms_admin` (`id`, `username`, `pass`, `isactive`) VALUES
(0, 'admin', '4cf0f057e4fc732e21bea727473dba69', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rms_class`
--

CREATE TABLE `rms_class` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `section` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_class`
--

INSERT INTO `rms_class` (`id`, `name`, `section`) VALUES
(3, '5th', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `rms_notification`
--

CREATE TABLE `rms_notification` (
  `id` int(100) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_notification`
--

INSERT INTO `rms_notification` (`id`, `note`, `date`) VALUES
(2, 'ddf', '2021-05-12'),
(3, 'dffd', '2021-05-12'),
(4, 'xcc', '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `rms_query`
--

CREATE TABLE `rms_query` (
  `id` int(100) NOT NULL,
  `enrollment_id` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `query` varchar(100) NOT NULL,
  `response` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_query`
--

INSERT INTO `rms_query` (`id`, `enrollment_id`, `sname`, `email`, `query`, `response`) VALUES
(2, '1233', 'supreet', 'supreet@gmail.com', 'result display', 'now you can check, solved'),
(3, 'ERD002', 'jkjkkj', 'archana@gmail.com', 'test', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `rms_result`
--

CREATE TABLE `rms_result` (
  `id` int(11) NOT NULL,
  `enrollment_id` varchar(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `class` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `session` varchar(500) NOT NULL,
  `subjects` text NOT NULL,
  `marks` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_result`
--

INSERT INTO `rms_result` (`id`, `enrollment_id`, `name`, `fname`, `class`, `section`, `mobile`, `session`, `subjects`, `marks`, `status`) VALUES
(5, 'ERD001', 'Supreet', 'abc', '5th', 'B', '9876543210', 'Mar-21', 'Math, English, Science, Hindi', '23,23,55,60', '1'),
(6, 'ERD002', 'Archana', 'aaaa', '6th', 'B', '999999999', '2021', 'Math, English, Science, Hindi', '98,89,76,83', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rms_student_register`
--

CREATE TABLE `rms_student_register` (
  `id` int(11) NOT NULL,
  `doad` date NOT NULL,
  `regno` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `mname` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `mob1` varchar(100) NOT NULL,
  `mob2` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `class` varchar(512) NOT NULL,
  `section` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_student_register`
--

INSERT INTO `rms_student_register` (`id`, `doad`, `regno`, `name`, `fname`, `mname`, `dob`, `mob1`, `mob2`, `address`, `class`, `section`, `email`, `password`, `notes`) VALUES
(1, '2021-05-04', 'ERD001', 'Supreet', 'aaaaa', 'sasa', '2021-05-02', 'sasa', 'assa', 'assa                                          ', '5th', 'A', 'supreet@gmail.com', '12345', 'asas'),
(2, '2021-05-04', 'ERD002', 'Archana', 'aaaa', 'sasa', '2021-04-27', '123456789', '123456789', 'asasasa                                                                             ', '5th', 'B', 'archana@gmail.com', '123', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `rms_subject`
--

CREATE TABLE `rms_subject` (
  `id` int(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `subjects` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_subject`
--

INSERT INTO `rms_subject` (`id`, `class`, `subjects`) VALUES
(1, '5th', 'Math, English, Science, Hindi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rms_admin`
--
ALTER TABLE `rms_admin`
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `rms_class`
--
ALTER TABLE `rms_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rms_notification`
--
ALTER TABLE `rms_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rms_query`
--
ALTER TABLE `rms_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rms_result`
--
ALTER TABLE `rms_result`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rms_student_register`
--
ALTER TABLE `rms_student_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rms_subject`
--
ALTER TABLE `rms_subject`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rms_class`
--
ALTER TABLE `rms_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rms_notification`
--
ALTER TABLE `rms_notification`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rms_query`
--
ALTER TABLE `rms_query`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rms_result`
--
ALTER TABLE `rms_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rms_student_register`
--
ALTER TABLE `rms_student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rms_subject`
--
ALTER TABLE `rms_subject`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
