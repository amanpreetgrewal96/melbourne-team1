-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2021 at 12:50 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
  `isactive` varchar(50) NOT NULL,
  KEY `id` (`id`),
  KEY `id_2` (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(512) NOT NULL,
  `section` varchar(512) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `id` int(100) NOT NULL auto_increment,
  `note` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rms_notification`
--

INSERT INTO `rms_notification` (`id`, `note`, `date`) VALUES
(2, 'ddf', '2021-05-12'),
(3, 'dffd', '2021-05-12'),
(4, 'xcc', '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `rms_result`
--

CREATE TABLE `rms_result` (
  `id` int(11) NOT NULL auto_increment,
  `enrollment_id` varchar(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `class` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `session` varchar(500) NOT NULL,
  `subjects` text NOT NULL,
  `marks` varchar(500) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rms_result`
--

INSERT INTO `rms_result` (`id`, `enrollment_id`, `name`, `fname`, `class`, `section`, `mobile`, `session`, `subjects`, `marks`) VALUES
(5, 'ERD002', 'jkjkkj', 'aman', '5th', 'B', '9876543210', 'Mar-21', 'Math, English, Science, Hindi', '23,23,55,60');

-- --------------------------------------------------------

--
-- Table structure for table `rms_student_register`
--

CREATE TABLE `rms_student_register` (
  `id` int(11) NOT NULL auto_increment,
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
  `notes` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rms_student_register`
--

INSERT INTO `rms_student_register` (`id`, `doad`, `regno`, `name`, `fname`, `mname`, `dob`, `mob1`, `mob2`, `address`, `class`, `section`, `email`, `password`, `notes`) VALUES
(1, '2021-05-04', 'ERD001', 'sas', 'sasa', 'sasa', '2021-05-02', 'sasa', 'assa', 'assa                                          ', '5th', 'A', 'aman@gmail.com', '12345', 'asas'),
(2, '2021-05-04', 'ERD002', 'jkjkkj', 'aman', 'sasa', '2021-04-27', '9876543210', '9876543210', 'asasasa                                                                             ', '5th', 'B', 'sdpbuilders20@gmail.com', '123', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `rms_subject`
--

CREATE TABLE `rms_subject` (
  `id` int(50) NOT NULL auto_increment,
  `class` varchar(50) NOT NULL,
  `subjects` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rms_subject`
--

INSERT INTO `rms_subject` (`id`, `class`, `subjects`) VALUES
(1, '5th', 'Math, English, Science, Hindi');
