-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 12:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `A_ID` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`A_ID`, `user_name`, `admin_email`, `Password`) VALUES
(2, 'admin', 'titusmihayo@gmail.com', '$2y$10$ZOecwQrOpKtIdS7H9E1JS.sa61WsBqi8Wc3trQhpDwsocWpAxH0x6'),
(3, 'barnaba', 'titusmihayoa@gmail.com', '$2y$10$ATVQ2OLRcP4iK99EhwNUU.g5pk5HjG.farg.gepFRlrKXTpX4vuxC');

-- --------------------------------------------------------

--
-- Table structure for table `doctortb`
--

CREATE TABLE `doctortb` (
  `DocID` int(255) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `SecondName` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctortb`
--

INSERT INTO `doctortb` (`DocID`, `FirstName`, `SecondName`, `UserName`, `Password`) VALUES
(2, 'Titus', 'Mihayo', 'TI', '$2y$10$ZgdYuhIogSPCzjfZ4xiguu0'),
(3, 'Reagan', 'Mtuka', 'Regan', '$2y$10$vplXazB74jtO8bUQfXlGH.U');

-- --------------------------------------------------------

--
-- Table structure for table `medicalcenter`
--

CREATE TABLE `medicalcenter` (
  `CenterID` int(100) NOT NULL,
  `CenterName` varchar(255) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalcenter`
--

INSERT INTO `medicalcenter` (`CenterID`, `CenterName`, `Location`, `Contact`) VALUES
(9, 'Salamani Hospital', 'Nyamagana', '+255676721212');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `P_ID` int(100) NOT NULL,
  `PharmacyName` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Contacts` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`P_ID`, `PharmacyName`, `Location`, `Contacts`) VALUES
(4, 'New Pharmacy', 'Rock City Malla', '+255788277371'),
(5, 'Msua Pharmacy', 'Rock City Mall', '+255788277373'),
(6, 'Mak Medic Pharmacy', 'Rwagasore', '+255788277322'),
(7, 'Msua sPharmacy', 'Rock City Mall', '+255788277371');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(30) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `text_info` varchar(25000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `heading`, `images`, `text_info`) VALUES
(6, 'The New Text Area', '5d47fa6e7d9ea4.89908751.jpg', 'This is The text Area That will be used To submit The Health Condition Of A Patient');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Age` int(120) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phonenumber` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `Password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `Doctor_Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FirstName`, `LastName`, `Age`, `Address`, `Email`, `Phonenumber`, `Description`, `Password`, `status`, `Doctor_Comment`) VALUES
(16, 'Reagan', 'Mtuka', 20, 'Nyamanoro', 'reaganmtuka@gmail.com', '+255611111222', 'wtrfsdz', '$2y$10$2PFsrCjc3BHLbwOCGArgGuKwFWBMq2UDrPWi2cktLhH/CbERLzAl2', '1', 'adadsaas asdsad asda adasd sadasdadadasd adadasdsa dasdasd adadsd edadd adasf fda adadsaas asdsad asda adasd sadasdadadasd adadasdsa dasdasd adadsd edadd adasf fda adadsaas asdsad asda adasd sadasdadadasd adadasdsa dasdasd adadsd edadd adasf fda adadsaas '),
(20, 'Titus', 'Mihayo', 25, 'Bwiru', 'titusmihayo@gmail.com', '+255759851647', 'asa assaas assaxsax sa', '$2y$10$MSSFXoDDsiYMGqePMxj1LOKMcLYN/b0BZAA87TTJzOY59vnOP1x.u', '1', 'Get Serious with What yo do'),
(21, 'Ramadhani', 'Said', 28, 'Tanga', 'rama@gmail.com', '+255666666634', 'a wd aaf asfafasf af', '$2y$10$2YoxQ.73xGqoYrqpl3NBlu2q52RGN0/gpEk57J3Je33DX5U43Vk/2', '1', 'Visity The Rock City Mall Pharmacy'),
(22, 'Shady', 'Mihayo', 26, 'Mecco', 'shady@gmail.com', '+255664566666', 'bjhcasbsah ads das dasdas dasdasda gfw tybubr5 u6bt wrcq eqex QWD WRCWEA RXQ', '$2y$10$jwdY9dNDkzQ42sx1ZvLID.ztjd1LRCHQxxg5MqWL532X526pTRire', '1', 'Mtuka Be Serious'),
(23, 'Mashalla', 'Mgema', 17, 'Nyamanoro', 'mashalla@gmail.com', '+255215678422', 'Naumwa Makalio yanachemka ile mbaya doctor', '$2y$10$wMsyanZec00CoqttS2yW/usquVV3CRIbIwCYnZowH6dlfs6oKiQJa', '1', 'Mashalla acha ujinga pona kivyako');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `doctortb`
--
ALTER TABLE `doctortb`
  ADD PRIMARY KEY (`DocID`);

--
-- Indexes for table `medicalcenter`
--
ALTER TABLE `medicalcenter`
  ADD PRIMARY KEY (`CenterID`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `A_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctortb`
--
ALTER TABLE `doctortb`
  MODIFY `DocID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicalcenter`
--
ALTER TABLE `medicalcenter`
  MODIFY `CenterID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `P_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
