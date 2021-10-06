-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 03:47 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(150) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `UserName`, `Password`, `UpdationDate`) VALUES
(1, 'admin', '$2y$12$xE8mFrOITDNrgkwM.8JEju7lpct3KRbxoGS5uE2PzyVdZk8Jnzrdy', '2021-04-24 08:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbladminremarks`
--

CREATE TABLE `tbladminremarks` (
  `id` int(11) NOT NULL,
  `contactFormId` int(11) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `remarkDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladminremarks`
--

INSERT INTO `tbladminremarks` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(1, 1, 'This is for testing remark by admin.', '2021-04-24 13:39:41'),
(2, 1, 'Test by admin part 2', '2021-04-24 13:39:59'),
(3, 1, 'Test by admin part 2', '2021-04-24 13:41:53'),
(4, 1, 'Test by admin part 2', '2021-04-24 13:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactdata`
--

CREATE TABLE `tblcontactdata` (
  `id` int(11) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PhoneNumber` char(12) DEFAULT NULL,
  `EmailId` varchar(200) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `UserIp` varbinary(16) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Is_Read` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactdata`
--

INSERT INTO `tblcontactdata` (`id`, `FullName`, `PhoneNumber`, `EmailId`, `Subject`, `Message`, `UserIp`, `PostingDate`, `Is_Read`) VALUES
(1, 'Anuj kumar', '1234567890', 'anuj@gmail.com', 'Test purpose', 'This is for Testing only.', 0x3a3a31, '2021-04-24 13:07:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblemail`
--

CREATE TABLE `tblemail` (
  `id` int(11) NOT NULL,
  `emailId` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemail`
--

INSERT INTO `tblemail` (`id`, `emailId`, `UpdationDate`) VALUES
(1, 'phpgurukulofficial@gmail.com', '2021-04-23 18:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladminremarks`
--
ALTER TABLE `tbladminremarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactdata`
--
ALTER TABLE `tblcontactdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemail`
--
ALTER TABLE `tblemail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladminremarks`
--
ALTER TABLE `tbladminremarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcontactdata`
--
ALTER TABLE `tblcontactdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemail`
--
ALTER TABLE `tblemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
