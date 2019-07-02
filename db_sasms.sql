-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 04:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sasms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `attend` varchar(255) DEFAULT NULL,
  `attend_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `roll_number`, `attend`, `attend_time`) VALUES
(22, 1, 'present', '2019-06-30'),
(23, 2, 'present', '2019-06-30'),
(24, 3, 'absent', '2019-06-30'),
(25, 4, 'absent', '2019-06-30'),
(26, 5, 'present', '2019-06-30'),
(27, 6, 'present', '2019-06-30'),
(28, 7, 'absent', '2019-06-30'),
(29, 1, 'present', '2019-06-29'),
(30, 2, 'absent', '2019-06-29'),
(31, 4, 'present', '2019-06-29'),
(32, 5, 'present', '2019-06-29'),
(33, 6, 'absent', '2019-06-29'),
(34, 7, 'absent', '2019-06-29'),
(37, 1, 'present', '2019-07-01'),
(38, 2, 'present', '2019-07-01'),
(39, 3, 'present', '2019-07-01'),
(40, 4, 'present', '2019-07-01'),
(41, 5, 'present', '2019-07-01'),
(42, 6, 'present', '2019-07-01'),
(43, 7, 'present', '2019-07-01'),
(45, 1, 'present', '2019-07-02'),
(46, 2, 'present', '2019-07-02'),
(47, 3, 'absent', '2019-07-02'),
(48, 4, 'present', '2019-07-02'),
(49, 5, 'present', '2019-07-02'),
(50, 6, 'absent', '2019-07-02'),
(51, 7, 'present', '2019-07-02'),
(52, 8, 'present', '2019-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `roll_number` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `name`, `roll_number`, `date_time`) VALUES
(12, 'Md Imran Hosen', 1, '2019-06-28 09:32:38'),
(13, 'Kamal Hosain', 2, '2019-06-28 09:32:46'),
(14, 'Jamal Hosain', 3, '2019-06-28 09:32:55'),
(15, 'Alam ', 4, '2019-06-28 09:33:25'),
(16, 'Hasham', 5, '2019-06-30 12:17:29'),
(17, 'imran', 6, '2019-06-30 12:30:06'),
(18, 'Md Imran Hosen', 7, '2019-06-30 12:30:16'),
(19, 'Rafi', 8, '2019-07-02 14:12:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
