-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2024 at 11:40 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acepraz4_hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_portal`
--

CREATE TABLE `admin_portal` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eiin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_portal`
--

INSERT INTO `admin_portal` (`id`, `full_name`, `user_id`, `password`, `eiin`, `position`, `email_id`, `contact_no`, `image`) VALUES
(2, 'Sahid Ansari', 'admin', 'Jamun', '12', '12', 'sas@dbc.com', '123456780', 'WhatsApp Image 2024-02-11 at 19.30.51_cd5e477b.jpg'),
(3, 'tanzil', 'admin', 'Jamua$%123', '13', '15', 'ekram@gmail.com', '1234789', 'WhatsApp Image 2024-02-11 at 19.30.51_cd5e477b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `room_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `number_of_stu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `student_id`, `student_name`, `email`, `room_no`, `room_id`, `number_of_stu`) VALUES
(36, 5, 'sahid ansari', 'sahid.acesoftech@gmail.com ', '89', 10, 1),
(38, 6, 'taba hina', 'danishraza@gmail.com ', '89', 9, 1),
(39, 11, 'Wakar Yunus', 'wakaryunus004@gmail.com', '9', 11, 1),
(40, 9, 'rehan rehan', 'rehan@gmail.com', '89', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `stu_complain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `stu_complain`, `room_number`, `department`) VALUES
(15, 'Sahid', '12', 'sahid.acesoftech@gmail.com ');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `department` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `student_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `department`, `room_no`, `room_id`, `student_num`) VALUES
(4, 'male', '1', 0, '1'),
(5, 'male', '2', 0, '-2'),
(6, 'male', '123', 0, '-1'),
(9, 'female', '89', 0, '0'),
(10, 'male', '89', 0, '27'),
(11, 'male', '9', 0, '2'),
(12, 'female', '', 0, ''),
(13, 'female', '', 0, ''),
(14, 'female', '', 0, ''),
(15, 'female', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(244) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `gender`, `f_name`, `l_name`, `email`, `password`, `mobile`, `address`, `class`) VALUES
(5, 'male', 'sahid', 'ansari', 'sahid.acesoftech@gmail.com ', '12', '1234567890', 'kolkata', '12th'),
(6, 'female', 'taba', 'hina', 'danishraza@gmail.com ', '12', '0987654321', 'kolkata', '12th'),
(8, 'female', 'Rani', 'Kumari', 'rani@gmail.com', '12', '0987654321', 'kolkata', '90th'),
(9, 'male', 'rehan', 'rehan', 'rehan@gmail.com', '12', '98765432345', 'ghj', 'h'),
(10, 'male', 'Rajahes', 'kumar', 'rajesh@gmail.com', '12345', '8583959528', 'nhnhnvb nngh', '12th'),
(11, 'male', 'Wakar', 'Yunus', 'wakaryunus004@gmail.com', 'W@123456y', '7074980833', 'ALIAH UNIVERSITY BOYS HOSTEL , NEWTOWN , KOLKATA , WEST BENGAL , 700135', 'Btech(Cse)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `new_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `new_password`) VALUES
(1, 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_portal`
--
ALTER TABLE `admin_portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_portal`
--
ALTER TABLE `admin_portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
