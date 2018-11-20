-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 06:37 PM
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
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apid` int(11) NOT NULL,
  `date` date NOT NULL,
  `vehno` varchar(15) NOT NULL,
  `usrid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `stype` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `date`, `vehno`, `usrid`, `scid`, `stype`, `sname`, `remarks`, `status`) VALUES
(5, '2018-11-21', 'KL 06 H 3595', 24, 6, 6, 'First service', 'Nil', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(25) NOT NULL,
  `model` varchar(20) NOT NULL,
  `variant` varchar(25) NOT NULL,
  `fuel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandid`, `brandname`, `model`, `variant`, `fuel`) VALUES
(1, 'maruti suzuki', 'alto800', 'lx', 'petrol'),
(3, 'hyundai', 'eon', 'magna', 'petrol'),
(4, 'maruti suzuki', 'swift', 'ldi', 'diesel'),
(7, 'Hyundai', 'i20', 'asta', 'petrol'),
(10, 'Hyundai', 'i10', 'asta', 'petrol'),
(20, 'Tata', 'Tiago', 'xe', 'Petrol');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `vid` int(11) NOT NULL,
  `vehno` varchar(15) NOT NULL,
  `usrid` int(10) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `variant` varchar(25) NOT NULL,
  `fuel` varchar(10) NOT NULL,
  `man_year` date NOT NULL,
  `color` varchar(20) NOT NULL,
  `engineno` varchar(30) NOT NULL,
  `chasisno` varchar(30) NOT NULL,
  `rcbook` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`vid`, `vehno`, `usrid`, `brand`, `model`, `variant`, `fuel`, `man_year`, `color`, `engineno`, `chasisno`, `rcbook`, `image`, `status`) VALUES
(2, 'KL 06 H 3595', 24, 'maruti suzuki', 'alto800', 'lx', 'petrol', '2018-10-30', 'white', 'E5HT7836959', 'CH7TYG25E89725419XY', '/upload/car/KL 06 H 3595/2.jpg', '/upload/car/KL 06 H 3595/6 (3).jpg', 'aproved');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desid` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desid`, `designation`, `status`) VALUES
(1, 'user', 1),
(2, 'servicecenter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(2) NOT NULL,
  `district` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`) VALUES
(1, 'Kannur'),
(2, 'Idukki'),
(3, 'Ernakulam'),
(4, 'Thrishur'),
(5, 'Thiruvananthapuram'),
(6, 'Kollam');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `fid` int(11) NOT NULL,
  `fuel` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fid`, `fuel`) VALUES
(1, 'Petrol'),
(2, 'Diesel'),
(3, 'CNG'),
(4, 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `logid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`logid`, `username`, `password`, `usertype`, `status`) VALUES
(160, 'rdcmainproject@gmail.com', 'YWRtaW5AMTIz', 'admin', 1),
(161, 'timinkurian@gmail.com', 'dGltaW5AMTIz', 'user', 1),
(162, 'timinkurian@mca.ajce.in', 'Y2VudGVyQDEyMw==', 'servicecenter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scount`
--

CREATE TABLE `scount` (
  `countid` int(11) NOT NULL,
  `date` date NOT NULL,
  `scid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scount`
--

INSERT INTO `scount` (`countid`, `date`, `scid`, `typeid`, `count`) VALUES
(2, '2018-11-21', 6, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `servicecenter`
--

CREATE TABLE `servicecenter` (
  `scid` int(10) NOT NULL,
  `logid` int(10) NOT NULL,
  `centername` varchar(25) NOT NULL,
  `licenceno` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `district` varchar(15) NOT NULL,
  `place` varchar(15) NOT NULL,
  `certificate` varchar(1000) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicecenter`
--

INSERT INTO `servicecenter` (`scid`, `logid`, `centername`, `licenceno`, `type`, `brand`, `district`, `place`, `certificate`, `mobile`) VALUES
(6, 162, 'MGF', 'lic8956', 'Authorized', 'maruti suzuki', 'Idukki', 'Kattappana', '/upload/162/p.jpg', 9656874712);

-- --------------------------------------------------------

--
-- Table structure for table `servicescheme`
--

CREATE TABLE `servicescheme` (
  `scid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `variant` varchar(10) NOT NULL,
  `fuel` varchar(30) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `replaced` varchar(500) NOT NULL,
  `checked` varchar(500) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicescheme`
--

INSERT INTO `servicescheme` (`scid`, `sid`, `typeid`, `brand`, `model`, `variant`, `fuel`, `stype`, `replaced`, `checked`, `amount`) VALUES
(6, 8, 6, 'maruti suzuki', 'alto800', 'lx', 'petrol', 'First service', 'Engine oil', 'All Parts', 1000),
(6, 10, 6, 'maruti suzuki', 'alto800', 'lx', 'petrol', 'Second Service', 'Air and oil filters', 'All Parts', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `stypes`
--

CREATE TABLE `stypes` (
  `typeid` int(5) NOT NULL,
  `scid` int(10) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `maximum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stypes`
--

INSERT INTO `stypes` (`typeid`, `scid`, `sname`, `maximum`) VALUES
(6, 6, 'Periodic Services', 5),
(7, 6, 'Painting', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usrid` int(10) NOT NULL,
  `logid` int(10) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `mobile` bigint(10) NOT NULL,
  `district` varchar(25) NOT NULL,
  `place` varchar(25) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usrid`, `logid`, `fname`, `lname`, `email`, `mobile`, `district`, `place`, `photo`) VALUES
(24, 161, 'Timin', 'Kurian', 'timinkurian@gmail.com', 9847390002, 'Idukki', 'Kattappana', '/upload/161/IMG_4367.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apid`),
  ADD KEY `usrid` (`usrid`),
  ADD KEY `scid` (`scid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `usrid` (`usrid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desid`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`logid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `scount`
--
ALTER TABLE `scount`
  ADD PRIMARY KEY (`countid`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `scid` (`scid`);

--
-- Indexes for table `servicecenter`
--
ALTER TABLE `servicecenter`
  ADD PRIMARY KEY (`scid`),
  ADD KEY `logid` (`logid`);

--
-- Indexes for table `servicescheme`
--
ALTER TABLE `servicescheme`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `scid` (`scid`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `stypes`
--
ALTER TABLE `stypes`
  ADD PRIMARY KEY (`typeid`),
  ADD KEY `scid` (`scid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usrid`),
  ADD KEY `logid` (`logid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `logid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `scount`
--
ALTER TABLE `scount`
  MODIFY `countid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servicecenter`
--
ALTER TABLE `servicecenter`
  MODIFY `scid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servicescheme`
--
ALTER TABLE `servicescheme`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stypes`
--
ALTER TABLE `stypes`
  MODIFY `typeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usrid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`usrid`) REFERENCES `user` (`usrid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`scid`) REFERENCES `servicecenter` (`scid`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`usrid`) REFERENCES `user` (`usrid`);

--
-- Constraints for table `scount`
--
ALTER TABLE `scount`
  ADD CONSTRAINT `scount_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `stypes` (`typeid`),
  ADD CONSTRAINT `scount_ibfk_2` FOREIGN KEY (`scid`) REFERENCES `servicecenter` (`scid`);

--
-- Constraints for table `servicecenter`
--
ALTER TABLE `servicecenter`
  ADD CONSTRAINT `servicecenter_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `login` (`logid`) ON UPDATE CASCADE;

--
-- Constraints for table `servicescheme`
--
ALTER TABLE `servicescheme`
  ADD CONSTRAINT `servicescheme_ibfk_1` FOREIGN KEY (`scid`) REFERENCES `servicecenter` (`scid`),
  ADD CONSTRAINT `servicescheme_ibfk_2` FOREIGN KEY (`typeid`) REFERENCES `stypes` (`typeid`);

--
-- Constraints for table `stypes`
--
ALTER TABLE `stypes`
  ADD CONSTRAINT `stypes_ibfk_1` FOREIGN KEY (`scid`) REFERENCES `servicecenter` (`scid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `login` (`logid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
