-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2020 at 05:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_blood`
--

CREATE TABLE `available_blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `h_id` int(11) NOT NULL,
  `h_name` varchar(200) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_blood`
--

INSERT INTO `available_blood` (`blood_id`, `blood_group`, `h_id`, `h_name`, `volume`) VALUES
(1, 'A+', 1, 'City Hospital', 220),
(2, 'A-', 1, 'City Hospital', 60),
(5, 'B+', 1, 'City Hospital', 100),
(1, 'A+', 2, 'Oxford Hospital', 100),
(4, 'O-', 3, 'Sygnus Hospital', 140),
(6, 'B-', 3, 'Sygnus Hospital', 60),
(8, 'AB-', 1, 'City Hospital', 50);

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `blood_id` int(11) NOT NULL,
  `b_group` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`blood_id`, `b_group`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'O+'),
(4, 'O-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `name`, `username`, `password`, `location`) VALUES
(1, 'City Hospital', 'city', 'pwd', 'Delhi'),
(2, 'Oxford Hospital', 'Oxford', 'oxford', 'Jalandhar'),
(3, 'Sygnus Hospital', 'sygnus', 'sygnus', 'Chandigarh'),
(4, 'Fortis Hospital', 'fortis', 'fortis', 'Gurgaon');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `r_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `blood_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`r_id`, `firstname`, `lastname`, `username`, `password`, `blood_group`) VALUES
(1, 'Divya ', 'Ratra', 'div', 'ratra', 1),
(3, 'Internshala', 'Assignment', 'test', 'internshala', 6);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `h_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `blood_id` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `h_name` varchar(200) NOT NULL,
  `b_group` varchar(3) NOT NULL,
  `r_firstname` varchar(100) NOT NULL,
  `r_lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`h_id`, `r_id`, `blood_id`, `volume`, `h_name`, `b_group`, `r_firstname`, `r_lastname`) VALUES
(3, 1, 4, 50, 'Sygnus Hospital', 'O-', 'Divya ', 'Ratra'),
(1, 3, 1, 50, 'City Hospital', 'A+', 'Internshala', 'Assignment'),
(2, 3, 1, 50, 'Oxford Hospital', 'A+', 'Internshala', 'Assignment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_blood`
--
ALTER TABLE `available_blood`
  ADD KEY `blood_id` (`blood_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD KEY `h_id` (`h_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `blood_id` (`blood_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_blood`
--
ALTER TABLE `available_blood`
  ADD CONSTRAINT `available_blood_ibfk_1` FOREIGN KEY (`blood_id`) REFERENCES `blood_groups` (`blood_id`),
  ADD CONSTRAINT `available_blood_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `receiver` (`r_id`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`blood_id`) REFERENCES `blood_groups` (`blood_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
