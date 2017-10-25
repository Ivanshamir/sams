-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 07:38 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendence`
--

CREATE TABLE `tbl_attendence` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `attend` varchar(255) DEFAULT NULL,
  `attend_time` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendence`
--

INSERT INTO `tbl_attendence` (`id`, `roll`, `attend`, `attend_time`) VALUES
(1, 25, 'present', '2017-06-23'),
(2, 12, 'present', '2017-06-23'),
(3, 5, 'absent', '2017-06-23'),
(4, 2, 'absent', '2017-06-23'),
(5, 18, 'present', '2017-06-23'),
(6, 19, 'present', '2017-06-23'),
(82, 19, 'absent', '2017-06-25'),
(81, 18, 'present', '2017-06-25'),
(80, 2, 'present', '2017-06-25'),
(79, 5, 'absent', '2017-06-25'),
(78, 12, 'absent', '2017-06-25'),
(77, 25, 'absent', '2017-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `roll`) VALUES
(1, 'Shamir Imtiaz', 25),
(2, 'Shamun Ismam', 12),
(3, 'Rajib Riki Rathor', 5),
(4, 'Ayan Chakrabarty', 2),
(5, 'Omar Sakib', 18),
(7, 'Taufiq Hassan', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
