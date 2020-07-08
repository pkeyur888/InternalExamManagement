-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2020 at 07:55 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internalexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

DROP TABLE IF EXISTS `exam_master`;
CREATE TABLE IF NOT EXISTS `exam_master` (
  `exam_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `exam_title` varchar(100) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `exam_date` date NOT NULL,
  `total_marks` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`),
  KEY `terms_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exam_id`, `exam_title`, `course_id`, `exam_date`, `total_marks`) VALUES
(10, 'Theory Internal Exam 2017-18', 121, '2018-05-05', 40),
(11, 'Practical Internal 2017-18', 121, '2018-05-05', 20);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

DROP TABLE IF EXISTS `faculty_master`;
CREATE TABLE IF NOT EXISTS `faculty_master` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `expertise` varchar(50) NOT NULL,
  `spaciality` varchar(20) NOT NULL,
  `educational_information` varchar(30) NOT NULL,
  `experience_information` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`user_id`, `name`, `expertise`, `spaciality`, `educational_information`, `experience_information`) VALUES
(62, 'Deepika Patel', 'Programming Languages', 'JAVA,HTML', 'M.sc(CA&IT)', '5 YEAR'),
(63, 'Biren Patel', 'Programming Languages', 'PHP', 'M.sc(CA&IT)', '10 Year'),
(64, 'Ketan Patel', 'Programming Languages', 'C', 'PH.D', '10 Year'),
(65, 'Ajay Patel', 'Programming Languages', 'ANDROID', 'PH.D', '10 Year');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(100) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_title`, `path`, `status`) VALUES
(7, 'Exam Time Table', 'file/css_tutorial.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_master`
--

DROP TABLE IF EXISTS `result_master`;
CREATE TABLE IF NOT EXISTS `result_master` (
  `result_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `exam_id` bigint(20) NOT NULL,
  `sem_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `type` int(1) NOT NULL,
  `faculty_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `marks` bigint(20) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `exam_id` (`exam_id`),
  KEY `sem_id` (`sem_id`),
  KEY `subject_id` (`subject_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`result_id`, `exam_id`, `sem_id`, `subject_id`, `type`, `faculty_id`, `student_id`, `marks`) VALUES
(126, 30, 123, 127, 0, 62, 66, 9),
(127, 30, 123, 127, 0, 62, 67, 9),
(128, 30, 123, 127, 0, 62, 68, 999),
(129, 30, 123, 127, 0, 62, 69, 0),
(130, 30, 123, 127, 0, 62, 70, 6),
(131, 31, 123, 127, 0, 62, 66, 4),
(132, 31, 123, 127, 0, 62, 67, 4),
(133, 31, 123, 127, 0, 62, 68, 4),
(134, 31, 123, 127, 0, 62, 69, 4),
(135, 31, 123, 127, 0, 62, 70, 4),
(136, 32, 123, 127, 0, 62, 66, 2),
(137, 32, 123, 127, 0, 62, 67, 2),
(138, 32, 123, 127, 0, 62, 68, 5),
(139, 32, 123, 127, 0, 62, 69, 3),
(140, 32, 123, 127, 0, 62, 70, 2),
(141, 33, 123, 127, 0, 62, 66, 8),
(142, 33, 123, 127, 0, 62, 67, 8),
(143, 33, 123, 127, 0, 62, 68, 7),
(144, 33, 123, 127, 0, 62, 69, 7),
(145, 33, 123, 127, 0, 62, 70, 8),
(146, 34, 123, 127, 0, 62, 66, 5),
(147, 34, 123, 127, 0, 62, 67, 4),
(148, 34, 123, 127, 0, 62, 68, 4),
(149, 34, 123, 127, 0, 62, 69, 2),
(150, 34, 123, 127, 0, 62, 70, 5),
(151, 35, 123, 127, 0, 62, 66, 4),
(152, 35, 123, 127, 0, 62, 67, 4),
(153, 35, 123, 127, 0, 62, 68, 3),
(154, 35, 123, 127, 0, 62, 69, 3),
(155, 35, 123, 127, 0, 62, 70, 4),
(156, 36, 123, 127, 2, 64, 66, 9),
(157, 36, 123, 127, 2, 64, 67, 8),
(158, 36, 123, 127, 2, 64, 68, 7),
(159, 36, 123, 127, 2, 64, 69, 6),
(160, 36, 123, 127, 2, 64, 70, 8),
(161, 37, 123, 127, 2, 64, 66, 5),
(162, 37, 123, 127, 2, 64, 67, 999),
(163, 37, 123, 127, 2, 64, 68, 5),
(164, 37, 123, 127, 2, 64, 69, 999),
(165, 37, 123, 127, 2, 64, 70, 5),
(166, 39, 123, 127, 2, 64, 66, 5),
(167, 39, 123, 127, 2, 64, 67, 4),
(168, 39, 123, 127, 2, 64, 68, 5),
(169, 39, 123, 127, 2, 64, 69, 4),
(170, 39, 123, 127, 2, 64, 70, 5),
(171, 40, 123, 126, 0, 64, 66, 8),
(172, 40, 123, 126, 0, 64, 67, 7),
(173, 40, 123, 126, 0, 64, 68, 8),
(174, 40, 123, 126, 0, 64, 69, 7),
(175, 40, 123, 126, 0, 64, 70, 8),
(176, 41, 123, 126, 0, 64, 66, 9),
(177, 41, 123, 126, 0, 64, 67, 8),
(178, 41, 123, 126, 0, 64, 68, 8),
(179, 41, 123, 126, 0, 64, 69, 9),
(180, 41, 123, 126, 0, 64, 70, 8),
(181, 44, 123, 126, 0, 64, 66, 3),
(182, 44, 123, 126, 0, 64, 67, 4),
(183, 44, 123, 126, 0, 64, 68, 4),
(184, 44, 123, 126, 0, 64, 69, 4),
(185, 44, 123, 126, 0, 64, 70, 3),
(186, 42, 123, 126, 0, 64, 66, 5),
(187, 42, 123, 126, 0, 64, 67, 5),
(188, 42, 123, 126, 0, 64, 68, 5),
(189, 42, 123, 126, 0, 64, 69, 5),
(190, 42, 123, 126, 0, 64, 70, 5),
(191, 43, 123, 126, 0, 64, 66, 7),
(192, 43, 123, 126, 0, 64, 67, 8),
(193, 43, 123, 126, 0, 64, 68, 7),
(194, 43, 123, 126, 0, 64, 69, 8),
(195, 43, 123, 126, 0, 64, 70, 8),
(196, 45, 123, 126, 2, 63, 66, 9),
(197, 45, 123, 126, 2, 63, 67, 8),
(198, 45, 123, 126, 2, 63, 68, 9),
(199, 45, 123, 126, 2, 63, 69, 8),
(200, 45, 123, 126, 2, 63, 70, 9),
(201, 46, 123, 126, 2, 63, 66, 5),
(202, 46, 123, 126, 2, 63, 67, 4),
(203, 46, 123, 126, 2, 63, 68, 3),
(204, 46, 123, 126, 2, 63, 69, 4),
(205, 46, 123, 126, 2, 63, 70, 5),
(206, 47, 123, 126, 2, 63, 66, 5),
(207, 47, 123, 126, 2, 63, 67, 5),
(208, 47, 123, 126, 2, 63, 68, 5),
(209, 47, 123, 126, 2, 63, 69, 5),
(210, 47, 123, 126, 2, 63, 70, 5),
(211, 48, 123, 128, 0, 65, 66, 999),
(212, 48, 123, 128, 0, 65, 67, 8),
(213, 48, 123, 128, 0, 65, 68, 8),
(214, 48, 123, 128, 0, 65, 69, 8),
(215, 48, 123, 128, 0, 65, 70, 8),
(216, 49, 123, 128, 0, 65, 66, 9),
(217, 49, 123, 128, 0, 65, 67, 6),
(218, 49, 123, 128, 0, 65, 68, 6),
(219, 49, 123, 128, 0, 65, 69, 999),
(220, 49, 123, 128, 0, 65, 70, 999),
(221, 50, 123, 128, 0, 65, 66, 8),
(222, 50, 123, 128, 0, 65, 67, 6),
(223, 50, 123, 128, 0, 65, 68, 7),
(224, 50, 123, 128, 0, 65, 69, 7),
(225, 50, 123, 128, 0, 65, 70, 7),
(226, 52, 123, 128, 0, 65, 66, 8),
(227, 52, 123, 128, 0, 65, 67, 8),
(228, 52, 123, 128, 0, 65, 68, 8),
(229, 52, 123, 128, 0, 65, 69, 8),
(230, 52, 123, 128, 0, 65, 70, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

DROP TABLE IF EXISTS `student_master`;
CREATE TABLE IF NOT EXISTS `student_master` (
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `sem_id` bigint(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `acadamic_year` date NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `course_id` (`course_id`),
  KEY `sem_id` (`sem_id`),
  KEY `course_id_2` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`user_id`, `course_id`, `sem_id`, `fname`, `lname`, `acadamic_year`) VALUES
(66, 121, 123, 'Keyur ', 'Patel', '2018-02-02'),
(67, 121, 123, 'Ankit', 'Darji', '2018-02-02'),
(68, 121, 123, 'Parth', 'Mali', '2018-02-02'),
(69, 121, 123, 'Neel', 'Kotadiya', '2018-02-02'),
(70, 121, 123, 'Rajat', 'Patel', '2018-02-02'),
(71, 121, 124, 'Meet', 'Patel', '2018-02-02'),
(72, 121, 124, 'Herish', 'Patel', '2018-02-02'),
(73, 121, 124, 'Pranav', 'Patel', '2018-02-02'),
(74, 121, 124, 'Sachin', 'Chodhary', '2018-02-02'),
(75, 121, 124, 'Yash', 'Patel', '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_exam`
--

DROP TABLE IF EXISTS `sub_exam`;
CREATE TABLE IF NOT EXISTS `sub_exam` (
  `sub_exam_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `course_id` bigint(11) NOT NULL,
  `sem_id` bigint(11) NOT NULL,
  `subject_id` bigint(11) NOT NULL,
  `type` int(1) NOT NULL,
  `faculty_id` bigint(11) NOT NULL,
  `exam_id` bigint(11) DEFAULT NULL,
  `criteria_id` bigint(11) DEFAULT NULL,
  `criteria_title` varchar(20) NOT NULL,
  `marks` int(11) NOT NULL,
  `exam_date` datetime NOT NULL,
  PRIMARY KEY (`sub_exam_id`),
  KEY `course_id` (`course_id`),
  KEY `sem_id` (`sem_id`),
  KEY `subject_id` (`subject_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `exam_id` (`exam_id`),
  KEY `criteria_id` (`criteria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_exam`
--

INSERT INTO `sub_exam` (`sub_exam_id`, `course_id`, `sem_id`, `subject_id`, `type`, `faculty_id`, `exam_id`, `criteria_id`, `criteria_title`, `marks`, `exam_date`) VALUES
(30, 121, 123, 127, 0, 62, 10, 130, 'TEST-1', 10, '2018-05-25 13:00:00'),
(31, 121, 123, 127, 0, 62, 10, 132, 'ATTENDANCE', 5, '2018-05-31 12:01:00'),
(32, 121, 123, 127, 0, 62, 10, 134, 'EXTRA ACTIVITY', 5, '2018-02-01 13:00:00'),
(33, 121, 123, 127, 0, 62, 10, 130, 'TEST-2', 10, '2018-03-04 13:00:00'),
(34, 121, 123, 127, 0, 62, 10, 129, 'ASSIGNMENT-1', 5, '2018-01-01 01:00:00'),
(35, 121, 123, 127, 0, 62, 10, 129, 'ASSIGNMENT-2', 5, '2018-01-02 13:00:00'),
(36, 121, 123, 127, 2, 64, 11, 137, 'PRACTICAL TEST', 10, '2018-05-27 10:00:00'),
(37, 121, 123, 127, 2, 64, 11, 136, 'VIVA', 5, '2018-05-26 10:00:00'),
(39, 121, 123, 127, 2, 64, 11, 135, 'JOURNAL', 5, '2018-05-26 10:00:00'),
(40, 121, 123, 126, 0, 64, 10, 130, 'TEST-1', 10, '2018-06-01 10:00:00'),
(41, 121, 123, 126, 0, 64, 10, 130, 'TEST-2', 10, '2018-07-01 13:00:00'),
(42, 121, 123, 126, 0, 64, 10, 132, 'ATTENDANCE', 5, '2018-06-03 10:00:00'),
(43, 121, 123, 126, 0, 64, 10, 131, 'PRESENTATION', 10, '2018-05-25 15:00:00'),
(44, 121, 123, 126, 0, 64, 10, 134, '	\nEXTRA ACTIVITY', 5, '2018-05-31 14:00:00'),
(45, 121, 123, 126, 2, 63, 11, 137, 'PRACTICAL TEST', 10, '2018-06-02 10:00:00'),
(46, 121, 123, 126, 2, 63, 11, 136, 'VIVA', 5, '2018-06-02 10:00:00'),
(47, 121, 123, 126, 2, 63, 11, 135, 'JOURNAL', 5, '2018-06-02 10:00:00'),
(48, 121, 123, 128, 0, 65, 10, 130, 'TEST-1', 10, '2018-05-01 10:00:00'),
(49, 121, 123, 128, 0, 65, 10, 130, 'TEST-2', 10, '2018-06-02 10:00:00'),
(50, 121, 123, 128, 0, 65, 10, 133, 'GROUP ACTIVITY', 10, '2018-05-18 14:00:00'),
(52, 121, 123, 128, 0, 65, 10, 131, 'PRESENTATION', 10, '2018-05-30 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_master`
--

DROP TABLE IF EXISTS `terms_master`;
CREATE TABLE IF NOT EXISTS `terms_master` (
  `terms_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `terms_title` varchar(200) NOT NULL,
  PRIMARY KEY (`terms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_master`
--

INSERT INTO `terms_master` (`terms_id`, `terms_title`) VALUES
(121, 'B.sc(CA&IT)'),
(122, 'M.sc(CA&IT)'),
(123, '1'),
(124, '2'),
(125, '3'),
(126, 'IP-1'),
(127, 'OAT'),
(128, 'IT'),
(129, 'ASSIGNMENT'),
(130, 'TEST'),
(131, 'PRESENTATION'),
(132, 'ATTENDANCE'),
(133, 'GROUP ACTIVITY'),
(134, 'EXTRA ACTIVITY'),
(135, 'JOURNAL'),
(136, 'VIVA'),
(137, 'PRACTICAL TEST'),
(138, 'IP-2'),
(139, 'MA'),
(140, 'CMT'),
(141, 'DS'),
(142, 'OCP'),
(143, 'DMS'),
(144, 'B.sc'),
(145, '1');

-- --------------------------------------------------------

--
-- Table structure for table `terms_texonomy_master`
--

DROP TABLE IF EXISTS `terms_texonomy_master`;
CREATE TABLE IF NOT EXISTS `terms_texonomy_master` (
  `term_texonomy_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `terms_id` bigint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `texonomy` varchar(50) DEFAULT NULL,
  `discription` longtext DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`term_texonomy_id`),
  KEY `terms_id` (`terms_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_texonomy_master`
--

INSERT INTO `terms_texonomy_master` (`term_texonomy_id`, `terms_id`, `parent_id`, `texonomy`, `discription`, `code`, `type`) VALUES
(118, 121, 0, 'Course', '', '', NULL),
(119, 122, 0, 'Course', '', '', NULL),
(120, 123, 0, 'Semester', '', '', NULL),
(121, 124, 0, 'Semester', '', '', NULL),
(122, 125, 0, 'Semester', '', '', NULL),
(123, 126, 123, 'Subject', '121', 'U11A1IP1', 2),
(124, 127, 123, 'Subject', '121', 'U11A2OAT', 2),
(125, 128, 123, 'Subject', '121', 'U11A3IT', 0),
(126, 129, 0, 'Criteria', '', '', NULL),
(127, 130, 0, 'Criteria', '', '', NULL),
(128, 131, 0, 'Criteria', '', '', NULL),
(129, 132, 0, 'Criteria', '', '', NULL),
(130, 133, 0, 'Criteria', '', '', NULL),
(131, 134, 0, 'Criteria', '', '', NULL),
(132, 135, 0, 'Criteria', '', '', NULL),
(133, 136, 0, 'Criteria', '', '', NULL),
(134, 137, 0, 'Criteria', '', '', NULL),
(135, 138, 124, 'Subject', '121', 'U12A1IP2', 2),
(136, 139, 124, 'Subject', '121', 'U12A2MA', 0),
(137, 140, 124, 'Subject', '121', 'U12A3CMT', 0),
(138, 141, 125, 'Subject', '121', 'U13A1DS', 2),
(139, 142, 125, 'Subject', '121', 'U13A2OCP', 2),
(140, 143, 125, 'Subject', '121', 'U13A3DMS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_master`
--

DROP TABLE IF EXISTS `timetable_master`;
CREATE TABLE IF NOT EXISTS `timetable_master` (
  `timetable_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `sem_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`timetable_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `faculty_id` (`course_id`,`sem_id`,`subject_id`),
  KEY `sem_id` (`sem_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_master`
--

INSERT INTO `timetable_master` (`timetable_id`, `user_id`, `course_id`, `sem_id`, `subject_id`, `type`) VALUES
(18, 64, 121, 123, 126, 0),
(19, 65, 121, 123, 128, 0),
(20, 62, 121, 123, 127, 0),
(21, 64, 121, 123, 127, 2),
(22, 63, 121, 123, 126, 2),
(23, 64, 121, 124, 138, 0),
(24, 63, 121, 124, 139, 0),
(25, 65, 121, 124, 140, 0),
(26, 62, 121, 124, 138, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ur_id` bigint(20) DEFAULT NULL,
  `enrollment_no` bigint(20) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `ur_id` (`ur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `ur_id`, `enrollment_no`, `user_name`, `password`, `email`) VALUES
(62, 2, 0, 'djp', 'djp', 'djp01@ganpatuniversity.ac.in'),
(63, 2, 0, 'bmp', 'bmp', 'bmp02@ganpatuniversity.ac.in'),
(64, 2, 0, 'kdp', 'kdp', 'ketan.patel@ganpatuniversity.ac.in'),
(65, 2, 0, 'amp', 'amp', 'ajay.patel@ganpatuniversity.ac.in'),
(66, 3, 15082221001, '15082221001', 'keyur', 'keyur@gmail.com'),
(67, 3, 15082221002, '15082221002', 'ankit', 'ankit@gamail.com'),
(68, 3, 15082221003, '15082221003', 'parth', 'parth@gmail.com'),
(69, 3, 15082221004, '15082221004', 'neel', 'neel@gmail.com'),
(70, 3, 15082221005, '15082221005', 'rajat', 'rk@gmail.com'),
(71, 3, 16082221001, '16082221001', 'meet', 'meet@gmail.com'),
(72, 3, 16082221002, '16082221002', 'herish', 'herish@gmail.com'),
(73, 3, 16082221003, '16082221003', 'pranav', 'paranv@gmail.com'),
(74, 3, 16082221004, '16082221004', 'sachin', 'sachin@gmail.com'),
(75, 3, 16082221005, '16082221005', 'yash', 'yash@gmail.com'),
(76, 1, NULL, 'Admin', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_master`
--

DROP TABLE IF EXISTS `user_role_master`;
CREATE TABLE IF NOT EXISTS `user_role_master` (
  `ur_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(30) NOT NULL,
  PRIMARY KEY (`ur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_master`
--

INSERT INTO `user_role_master` (`ur_id`, `user_role`) VALUES
(1, 'Admin'),
(2, 'Faculty'),
(3, 'Student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD CONSTRAINT `exam_master_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `terms_master` (`terms_id`);

--
-- Constraints for table `faculty_master`
--
ALTER TABLE `faculty_master`
  ADD CONSTRAINT `faculty_master_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`);

--
-- Constraints for table `result_master`
--
ALTER TABLE `result_master`
  ADD CONSTRAINT `result_master_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `sub_exam` (`sub_exam_id`),
  ADD CONSTRAINT `result_master_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `result_master_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `result_master_ibfk_4` FOREIGN KEY (`faculty_id`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `result_master_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `user_master` (`user_id`);

--
-- Constraints for table `student_master`
--
ALTER TABLE `student_master`
  ADD CONSTRAINT `student_master_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `student_master_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `student_master_ibfk_3` FOREIGN KEY (`sem_id`) REFERENCES `terms_master` (`terms_id`);

--
-- Constraints for table `sub_exam`
--
ALTER TABLE `sub_exam`
  ADD CONSTRAINT `sub_exam_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `sub_exam_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `sub_exam_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `sub_exam_ibfk_4` FOREIGN KEY (`faculty_id`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `sub_exam_ibfk_5` FOREIGN KEY (`exam_id`) REFERENCES `exam_master` (`exam_id`);

--
-- Constraints for table `terms_texonomy_master`
--
ALTER TABLE `terms_texonomy_master`
  ADD CONSTRAINT `terms_texonomy_master_ibfk_1` FOREIGN KEY (`terms_id`) REFERENCES `terms_master` (`terms_id`);

--
-- Constraints for table `timetable_master`
--
ALTER TABLE `timetable_master`
  ADD CONSTRAINT `timetable_master_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `timetable_master_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `timetable_master_ibfk_3` FOREIGN KEY (`sem_id`) REFERENCES `terms_master` (`terms_id`),
  ADD CONSTRAINT `timetable_master_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `terms_master` (`terms_id`);

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `user_role_master` (`ur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
