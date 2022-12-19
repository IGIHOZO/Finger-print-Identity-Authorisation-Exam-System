-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 01:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boris`
--

-- --------------------------------------------------------

--
-- Table structure for table `boris_admin`
--

CREATE TABLE `boris_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_status` varchar(5) NOT NULL,
  `admin_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_admin`
--

INSERT INTO `boris_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_status`, `admin_date`) VALUES
(2, 'Ym9yaXNAZ21haWwuY29t', 'Ym9yaXMxMjM=', 'E', '2019-04-14 08:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `boris_classes`
--

CREATE TABLE `boris_classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `class_dept` int(11) NOT NULL,
  `class_level` varchar(5) NOT NULL,
  `class_status` varchar(5) NOT NULL,
  `class_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_classes`
--

INSERT INTO `boris_classes` (`class_id`, `class_name`, `class_dept`, `class_level`, `class_status`, `class_date`) VALUES
(4, '1 IT A', 1, 'I', 'E', '2019-04-09 12:11:47'),
(5, '1 IT B', 1, 'I', 'E', '2019-04-09 12:18:59'),
(6, '2 IT A', 1, 'II', 'E', '2019-04-09 12:19:07'),
(7, '2 IT B', 1, 'II', 'E', '2019-04-09 12:19:16'),
(8, '2 IT C', 1, 'II', 'E', '2019-04-09 12:19:21'),
(9, '2 IT D', 1, 'II', 'E', '2019-04-09 12:19:27'),
(10, '3 IT B', 1, 'III', 'E', '2019-04-09 12:19:42'),
(11, '1 ET A', 2, 'I', 'E', '2019-04-09 12:19:56'),
(12, '1 ET B', 2, 'I', 'E', '2019-04-09 12:20:00'),
(13, '1 RE A', 3, 'I', 'E', '2019-04-09 12:20:07'),
(14, '1 RE B', 3, 'I', 'E', '2019-04-09 12:20:11'),
(15, '1 IT D', 1, 'I', 'E', '2019-04-09 12:29:56'),
(16, '1 IT C', 1, 'I', 'E', '2019-04-09 12:30:25'),
(17, '3 ET A', 2, 'III', 'E', '2019-04-09 12:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `boris_courses`
--

CREATE TABLE `boris_courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_class` int(11) NOT NULL,
  `course_dept` int(11) NOT NULL,
  `course_level` varchar(10) NOT NULL,
  `course_status` varchar(5) NOT NULL,
  `course_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_courses`
--

INSERT INTO `boris_courses` (`course_id`, `course_name`, `course_class`, `course_dept`, `course_level`, `course_status`, `course_date`) VALUES
(69, 'Analog Electronics', 4, 1, 'I', 'E', '2019-04-10 11:54:39'),
(74, 'Discrete Mathematics', 14, 3, 'I', 'E', '2019-04-10 11:55:56'),
(75, 'Intro To Comp', 4, 1, 'I', 'E', '2019-04-10 12:09:34'),
(76, 'Analogue', 4, 1, 'I', 'E', '2019-04-12 14:00:30'),
(77, 'Digital', 4, 1, 'I', 'E', '2019-04-12 14:00:40'),
(78, 'Maintainance', 4, 1, 'I', 'E', '2019-04-13 19:42:23'),
(79, 'math', 5, 1, 'I', 'E', '2019-04-25 19:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `boris_department`
--

CREATE TABLE `boris_department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `dept_abbre` varchar(10) NOT NULL,
  `dept_status` varchar(5) NOT NULL,
  `dept_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_department`
--

INSERT INTO `boris_department` (`dept_id`, `dept_name`, `dept_abbre`, `dept_status`, `dept_date`) VALUES
(1, 'Information Technology', 'IT', 'E', '2019-04-09 08:29:29.000000'),
(2, 'Electronics Telecomunication', 'ET', 'E', '2019-04-09 11:01:11.000000'),
(3, 'Renewable Energy', 'RE', 'E', '2019-04-09 11:01:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `boris_halls`
--

CREATE TABLE `boris_halls` (
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(30) NOT NULL,
  `hall_cols` int(11) NOT NULL,
  `hall_rows` int(11) NOT NULL,
  `hall_count` int(11) NOT NULL,
  `hall_status` varchar(5) NOT NULL,
  `hall_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_halls`
--

INSERT INTO `boris_halls` (`hall_id`, `hall_name`, `hall_cols`, `hall_rows`, `hall_count`, `hall_status`, `hall_date`) VALUES
(1, 'IT Lab 7', 9, 5, 45, 'E', '2019-04-10 15:23:38'),
(2, 'IT Lab 6', 9, 5, 45, 'E', '2019-04-10 15:23:46'),
(3, 'C1', 10, 6, 60, 'E', '2019-04-10 15:24:11'),
(4, 'Mult-purpose Hall', 12, 20, 240, 'E', '2019-04-10 15:33:31'),
(5, 'C2', 6, 10, 60, 'E', '2019-04-10 15:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `boris_school`
--

CREATE TABLE `boris_school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(30) NOT NULL,
  `school_username` varchar(30) NOT NULL,
  `school_password` varchar(30) NOT NULL,
  `school_status` varchar(5) NOT NULL,
  `school_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `boris_students`
--

CREATE TABLE `boris_students` (
  `student_id` int(11) NOT NULL,
  `student_fname` varchar(30) NOT NULL,
  `student_lname` varchar(30) NOT NULL,
  `student_reg` varchar(10) NOT NULL,
  `student_class` int(11) NOT NULL,
  `student_dept` int(11) NOT NULL,
  `student_level` varchar(5) NOT NULL,
  `student_hall` int(11) DEFAULT NULL,
  `student_finance` tinyint(1) NOT NULL DEFAULT '0',
  `student_attendance` tinyint(1) NOT NULL DEFAULT '0',
  `student_status` varchar(5) NOT NULL,
  `student_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_students`
--

INSERT INTO `boris_students` (`student_id`, `student_fname`, `student_lname`, `student_reg`, `student_class`, `student_dept`, `student_level`, `student_hall`, `student_finance`, `student_attendance`, `student_status`, `student_date`) VALUES
(15, 'IGIHOZO', 'Didier', 'ST00001', 4, 1, 'I', 1, 0, 0, 'E', '2019-04-10 13:07:11'),
(16, 'MUKUNZI', 'Clement', 'ST00016', 4, 1, 'I', 1, 0, 0, 'E', '2019-04-10 13:07:34'),
(17, 'NCUTI', 'Sandra', 'ST00017', 4, 1, 'I', 1, 0, 0, 'E', '2019-04-10 13:08:04'),
(18, 'CYEMEZO', 'Aimable', 'ST00018', 7, 1, 'II', NULL, 0, 0, 'E', '2019-04-10 14:56:52'),
(19, 'UMWARI', 'Clemence', 'ST00019', 4, 1, 'I', 1, 0, 0, 'E', '2019-04-13 06:43:12'),
(20, 'NKURU', 'Poela', 'ST00020', 5, 1, 'I', 1, 0, 0, 'E', '2019-04-13 08:17:35'),
(21, 'SANGWA', 'Nadia', 'ST00021', 5, 1, 'I', 1, 0, 0, 'E', '2019-04-13 08:17:55'),
(22, 'BYIRINGIRO', 'Claude', 'ST00022', 6, 1, 'II', NULL, 0, 0, 'E', '2019-04-13 08:18:25'),
(23, 'MAHIRWE', 'Nadia', 'ST00023', 7, 1, 'II', NULL, 0, 0, 'E', '2019-04-13 08:18:43'),
(24, 'MUKUNZI', 'Alphonse', 'ST00024', 5, 1, 'I', 1, 0, 0, 'E', '2019-04-13 10:52:30'),
(25, 'MAHIRWE', 'Claudine', 'ST00025', 13, 3, 'I', NULL, 0, 0, 'E', '2019-04-13 12:47:15'),
(26, 'BYIRINGIRO', 'Claude', 'ST00026', 15, 1, 'I', 0, 0, 0, 'E', '2019-05-13 15:19:30'),
(27, 'IRANZI', 'Didier', 'ST00027', 17, 2, 'III', 0, 0, 0, 'E', '2019-05-13 15:19:59'),
(28, 'ISANGE', 'Audrey', 'ST00028', 16, 1, 'I', 0, 0, 0, 'E', '2019-05-13 15:21:17'),
(29, 'MPANO', 'Sandra', 'ST00029', 16, 1, 'I', 0, 0, 0, 'E', '2019-05-13 15:21:42'),
(30, 'ISHEJA', 'Sandrine', 'ST00030', 15, 1, 'I', 0, 0, 0, 'E', '2019-05-13 15:22:10'),
(31, 'KUNDWA', 'Nadia', 'ST00031', 14, 3, 'I', 0, 0, 0, 'E', '2019-05-13 15:22:36'),
(32, 'MIZERO', 'Gervais', 'ST00032', 11, 2, 'I', 0, 0, 0, 'E', '2019-05-13 15:22:52'),
(33, 'BYIRINGIRO', 'Ashna', 'ST00033', 11, 2, 'I', 0, 0, 0, 'E', '2019-05-13 15:23:19'),
(34, 'MUCYO', 'Louis', 'ST00034', 11, 2, 'I', 0, 0, 0, 'E', '2019-05-13 15:24:41'),
(35, 'MANZI', 'Simon', 'ST00035', 13, 3, 'I', 0, 0, 0, 'E', '2019-05-13 15:24:54'),
(36, 'INEZA', 'Ines', 'ST00036', 9, 1, 'II', 0, 0, 0, 'E', '2019-05-13 15:25:10'),
(37, 'MUKUNZI', 'Emmanuel', 'ST00037', 8, 1, 'II', 0, 0, 0, 'E', '2019-05-13 15:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `boris_ttable`
--

CREATE TABLE `boris_ttable` (
  `ttable_id` int(11) NOT NULL,
  `ttable_course` int(11) NOT NULL,
  `ttable_class` int(11) NOT NULL,
  `ttable_start` datetime NOT NULL,
  `ttable_end` datetime NOT NULL,
  `ttable_startus` varchar(5) NOT NULL,
  `ttable_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boris_ttable`
--

INSERT INTO `boris_ttable` (`ttable_id`, `ttable_course`, `ttable_class`, `ttable_start`, `ttable_end`, `ttable_startus`, `ttable_date`) VALUES
(1, 69, 4, '2019-05-13 15:00:00', '2019-05-13 17:00:00', 'E', '2019-05-13 15:28:53'),
(2, 79, 5, '2019-05-14 08:00:00', '2019-05-14 11:00:00', 'E', '2019-05-13 15:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boris_admin`
--
ALTER TABLE `boris_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boris_classes`
--
ALTER TABLE `boris_classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_dept` (`class_dept`);

--
-- Indexes for table `boris_courses`
--
ALTER TABLE `boris_courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_class` (`course_class`) USING BTREE,
  ADD KEY `course_dept` (`course_dept`) USING BTREE;

--
-- Indexes for table `boris_department`
--
ALTER TABLE `boris_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `boris_halls`
--
ALTER TABLE `boris_halls`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `boris_school`
--
ALTER TABLE `boris_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `boris_students`
--
ALTER TABLE `boris_students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_class` (`student_class`),
  ADD KEY `student_dept` (`student_dept`) USING BTREE,
  ADD KEY `student_hall` (`student_hall`),
  ADD KEY `student_hall_2` (`student_hall`);

--
-- Indexes for table `boris_ttable`
--
ALTER TABLE `boris_ttable`
  ADD PRIMARY KEY (`ttable_id`),
  ADD KEY `ttable_course` (`ttable_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boris_admin`
--
ALTER TABLE `boris_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `boris_classes`
--
ALTER TABLE `boris_classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `boris_courses`
--
ALTER TABLE `boris_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `boris_department`
--
ALTER TABLE `boris_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `boris_halls`
--
ALTER TABLE `boris_halls`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `boris_school`
--
ALTER TABLE `boris_school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boris_students`
--
ALTER TABLE `boris_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `boris_ttable`
--
ALTER TABLE `boris_ttable`
  MODIFY `ttable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boris_classes`
--
ALTER TABLE `boris_classes`
  ADD CONSTRAINT `boris_classes_ibfk_1` FOREIGN KEY (`class_dept`) REFERENCES `boris_department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `boris_courses`
--
ALTER TABLE `boris_courses`
  ADD CONSTRAINT `boris_courses_ibfk_1` FOREIGN KEY (`course_class`) REFERENCES `boris_classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boris_courses_ibfk_2` FOREIGN KEY (`course_dept`) REFERENCES `boris_department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `boris_students`
--
ALTER TABLE `boris_students`
  ADD CONSTRAINT `boris_students_ibfk_1` FOREIGN KEY (`student_class`) REFERENCES `boris_classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boris_students_ibfk_2` FOREIGN KEY (`student_dept`) REFERENCES `boris_department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `boris_ttable`
--
ALTER TABLE `boris_ttable`
  ADD CONSTRAINT `boris_ttable_ibfk_10` FOREIGN KEY (`ttable_course`) REFERENCES `boris_courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
