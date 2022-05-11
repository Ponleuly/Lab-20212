-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2022 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `biz_category`
--

CREATE TABLE `biz_category` (
  `BusinessID` int(10) UNSIGNED NOT NULL,
  `CategoryID` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biz_category`
--

INSERT INTO `biz_category` (`BusinessID`, `CategoryID`) VALUES
(1, 'HUST'),
(2, 'FISH'),
(3, 'SPORT'),
(4, 'FISH'),
(4, 'HEALTH'),
(4, 'HUST'),
(4, 'SPORT');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `BusinessID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Telephone` varchar(50) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`BusinessID`, `Name`, `Address`, `City`, `Telephone`, `URL`) VALUES
(1, 'Hust University', '123 Any Sreet', 'Ha Noi', '0843142150', 'https://www.hust.edu.vn/'),
(2, 'Sea Food', '11 Ha Dong', 'Ha Noi', '0843142150', 'https://www.seafood.vn'),
(3, 'Ponleu ', 'Tran Dai Nghia', 'Ha Noi', '0843142150', 'www.sport.com'),
(4, 'VinMart', '11 Ha Dong', 'Ha Noi', '0843142150', 'https://www.vinmart.vn');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` varchar(15) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Title`, `Description`) VALUES
('AUTO', 'Automotive Part and Support', 'Accessories for your car'),
('FISH', 'Seafoood Stores and Restaurents', 'Place to get your fish'),
('HEALTH', 'Health and Beauty', 'Everything for the body'),
('HUST', 'School and Colleages', 'One love one Future'),
('SPORT', 'Community Sport and Recreation', 'Guide to Parts and Leagues');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biz_category`
--
ALTER TABLE `biz_category`
  ADD UNIQUE KEY `BusinessID` (`BusinessID`,`CategoryID`),
  ADD KEY `biz_category_ibfk_2` (`CategoryID`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`BusinessID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `BusinessID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biz_category`
--
ALTER TABLE `biz_category`
  ADD CONSTRAINT `biz_category_ibfk_1` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`BusinessID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biz_category_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
