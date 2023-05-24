-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 09:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nacario_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `AC_NUMBER` int(11) NOT NULL,
  `MOD_CODE` int(11) NOT NULL,
  `AC_TTAF` decimal(9,2) DEFAULT NULL,
  `AC_TTEL` decimal(9,2) DEFAULT NULL,
  `AC_TTER` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOKING_ID` int(11) NOT NULL,
  `CUS_CODE` int(11) NOT NULL,
  `CHAR_TRIP` int(11) NOT NULL,
  `PAYMENT` decimal(9,2) NOT NULL,
  `BOOKING_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charter`
--

CREATE TABLE `charter` (
  `CHAR_TRIP` int(11) NOT NULL,
  `CHAR_DATE` datetime DEFAULT NULL,
  `AC_NUMBER` int(11) DEFAULT NULL,
  `CHAR_DESTINATION` varchar(50) DEFAULT NULL,
  `CHAR_DISTANCE` decimal(10,2) DEFAULT NULL,
  `CHAR_HOURS_FLOWN` decimal(10,2) DEFAULT NULL,
  `CHAR_HOURS_WAIT` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `CHAR_TRIP` varchar(15) NOT NULL,
  `EMP_NUM` int(11) NOT NULL,
  `CREW_JOB` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUS_CODE` int(11) NOT NULL,
  `CUS_LNAME` varchar(50) DEFAULT NULL,
  `CUS_FNAME` varchar(50) DEFAULT NULL,
  `CUS_INITIAL` varchar(2) DEFAULT NULL,
  `CUS_AREACODE` int(11) DEFAULT NULL,
  `CUS_PHONE` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `earnedrating`
--

CREATE TABLE `earnedrating` (
  `EMP_NUM` int(11) NOT NULL,
  `RTG_CODE` int(11) NOT NULL,
  `EARNRTG_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_NUM` int(11) NOT NULL,
  `EMP_TITLE` varchar(30) DEFAULT NULL,
  `EMP_LNAME` varchar(50) DEFAULT NULL,
  `EMP_FNAME` varchar(50) DEFAULT NULL,
  `EMP_INITIAL` varchar(2) DEFAULT NULL,
  `EMP_JOB` varchar(50) DEFAULT NULL,
  `EMP_HIRE_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `MOD_CODE` int(11) NOT NULL,
  `MOD_MANUFACTURER` varchar(50) DEFAULT NULL,
  `MOD_NAME` varchar(50) DEFAULT NULL,
  `MOD_SEATS` int(11) NOT NULL,
  `MOD_CHG_MILE` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pilot`
--

CREATE TABLE `pilot` (
  `EMP_NUM` int(11) NOT NULL,
  `PIL_LICENSE` varchar(30) DEFAULT NULL,
  `PIL_MED_TYPE` varchar(30) DEFAULT NULL,
  `PIL_MED_DATE` datetime DEFAULT NULL,
  `PIL_PT135_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RTG_CODE` int(11) NOT NULL,
  `RTG_NAME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `CUS_CODE` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`AC_NUMBER`) USING BTREE,
  ADD KEY `MOD_CODE` (`MOD_CODE`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOKING_ID`),
  ADD KEY `booking_ibfk_1` (`CHAR_TRIP`),
  ADD KEY `booking_ibfk_2` (`CUS_CODE`);

--
-- Indexes for table `charter`
--
ALTER TABLE `charter`
  ADD PRIMARY KEY (`CHAR_TRIP`),
  ADD KEY `AC_NUMBER` (`AC_NUMBER`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`CHAR_TRIP`,`EMP_NUM`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUS_CODE`);

--
-- Indexes for table `earnedrating`
--
ALTER TABLE `earnedrating`
  ADD PRIMARY KEY (`RTG_CODE`,`EMP_NUM`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_NUM`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`MOD_CODE`);

--
-- Indexes for table `pilot`
--
ALTER TABLE `pilot`
  ADD PRIMARY KEY (`EMP_NUM`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RTG_CODE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CUS_CODE` (`CUS_CODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `AC_NUMBER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charter`
--
ALTER TABLE `charter`
  MODIFY `CHAR_TRIP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUS_CODE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMP_NUM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `MOD_CODE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD CONSTRAINT `aircraft_ibfk_1` FOREIGN KEY (`MOD_CODE`) REFERENCES `model` (`MOD_CODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CHAR_TRIP`) REFERENCES `charter` (`CHAR_TRIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`CUS_CODE`) REFERENCES `customer` (`CUS_CODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`CUS_CODE`) REFERENCES `customer` (`CUS_CODE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
