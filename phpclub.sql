-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 03:08 PM
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
-- Database: `phpclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(6) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `memberplans`
--

CREATE TABLE `memberplans` (
  `id` int(6) NOT NULL,
  `Plans` varchar(20) NOT NULL,
  `Types` varchar(20) NOT NULL,
  `Details` varchar(1000) NOT NULL,
  `price` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberplans`
--

INSERT INTO `memberplans` (`id`, `Plans`, `Types`, `Details`, `price`) VALUES
(0, 'No Active Plan', 'No Active Plan', 'No Active Plan', '0'),
(1, 'Bronze Plan', 'Add Additional Horse', 'If you ride another horse that you do not own you still have an exposure to the public for damage or injury caused, therefore, it is important to avail of riding of other horses extension as this will indemnify you up to EUR 6.5 Million for injury or damage caused by riding another horse not owned by you but in your care, custody and control.', '100.00'),
(2, 'Silver Plan', 'Silver Membership Co', 'Select this option if you are Over 18 and wish to apply for Silver Membership where you don\'t actually own a horse. If you ride other people\'s horses that are not in your ownership, then you are required to hold the \"Riding Other Horses Extension\", which is included in the Supporter Membership fee.', '150.00'),
(3, 'Gold plan', 'Gold Membership Cove', 'Select this option if you wish to apply for Gold Membership where you own a horse.', '200.00'),
(4, 'Diamond Plan', 'Diamond king Plan', 'Select this option if you have a family and wish to apply for Diamond Membership where you come along with family members for luxury treatment', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `surname`, `dob`, `email`, `gender`, `phone`, `plan`) VALUES
('aaa', '111', 'sdfghj', 'ertyui', '1990-02-03', 'cccc@gmail.com', 'Female', 324252, 0),
('ahmad', 'password', 'medo', 'goat', '1993-12-14', 'ahmad@mail.com', 'Trans', 123123456, 2),
('bbb', 'bbb', 'bbb', 'ccc', '1999-02-01', 'babav@gmail.com', 'Female', 56242, 0),
('fff', 'fff', 'bvx', 'bhxb', '2004-07-04', 'bagva@gmail.com', 'Male', 68837, 5),
('hhh', 'hhh', 'dghj', 'rtyu', '1999-09-10', 'ZXCVBN@gmail.com', 'Female', 4567876, 2),
('husna', 'husna', 'husna', 'williams', '1990-04-07', 'husna419@hotmail.com', 'Female', 1234567, 4),
('kboss', 'password', 'K', 'Boss', '2000-09-11', 'kboss@mail.com', 'Male', 12312323, 0),
('ttt', 'ttt', 'tonia', 'williams', '1996-07-05', 'tonia@gmail.com', 'Female', 345678, 1);

-- --------------------------------------------------------

--
-- Table structure for table `waitingusers`
--

CREATE TABLE `waitingusers` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `plan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waitingusers`
--

INSERT INTO `waitingusers` (`username`, `password`, `name`, `surname`, `dob`, `email`, `gender`, `phone`, `plan`) VALUES
('kola', 'kola', 'kolabo', 'saggy', '2000-07-01', 'kolabo@gmail.com', 'Male', '7554542121', 4),
('bilal', 'bilal', 'bilal', 'burti', '1997-07-07', 'burti@gmail.com', 'Male', '3524758790', 2),
('seyo', 'seyo', 'seyo', 'jiii', '2000-09-03', 'seyo@gmail.com', 'Male', '895352', 2),
('hidaya', 'hidaya', 'hidaya', 'musa', '2004-03-04', 'hidaya@gmail.com', 'Female', '2345678', 3),
('idris', 'idris', 'idris', 'jay', '2001-08-09', 'idris@gmail.com', 'Male', '844433', 4),
('nocash@gmail.com', '1234', 'girlie', 'ooooo', '1998-09-03', 'girlieo@yahoo.com', 'Female', '46463828', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberplans`
--
ALTER TABLE `memberplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `users_plan_index` (`plan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memberplans`
--
ALTER TABLE `memberplans`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
