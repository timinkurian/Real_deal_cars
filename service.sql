-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2018 at 11:27 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `apid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `vehno` varchar(15) NOT NULL,
  `usrid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `stype` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`apid`),
  KEY `usrid` (`usrid`),
  KEY `scid` (`scid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `date`, `vehno`, `usrid`, `scid`, `stype`, `sname`, `remarks`, `status`) VALUES
(1, '2018-11-21', 'KL 06 H 3595', 23, 4, 1, 'First Service', 'Nil', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(25) NOT NULL,
  `model` varchar(20) NOT NULL,
  `variant` varchar(25) NOT NULL,
  `fuel` varchar(10) NOT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`vid`),
  KEY `usrid` (`usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`vid`, `vehno`, `usrid`, `brand`, `model`, `variant`, `fuel`, `man_year`, `color`, `engineno`, `chasisno`, `rcbook`, `image`, `status`) VALUES
(1, 'KL 06 H 3595', 23, 'maruti suzuki', 'alto800', 'lx', 'petrol', '2018-10-31', 'white', 'E5HT7836959', 'CH7TYG25E89725419XY', '/upload/car/KL 06 H 3595/2 (3).jpg', '/upload/car/KL 06 H 3595/2.jpg', 'aproved');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `desid` int(10) NOT NULL AUTO_INCREMENT,
  `designation` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`desid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `district` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `fuel`;
CREATE TABLE IF NOT EXISTS `fuel` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fuel` varchar(15) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `logid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`logid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`logid`, `username`, `password`, `usertype`, `status`) VALUES
(149, 'alan@mail.com', '0541c626be6852ab369f571e974a7b30', 'user', 2),
(152, 'mgf@mail.com', '8e2a6024b294b21f50c10d55f6fc647d', 'servicecenter', 1),
(154, 'avg@mail.com', '7dc9037a9a019719d852c24bd19cf7e8', 'servicecenter', 1),
(156, 'nippon@mail.com', '786353c6538f59040c904ecc2f71ddc7', 'servicecenter', 1),
(157, 'timinkurian@gmail.com', 'f4edb480cca1633e241f913c2035e5d9', 'user', 1),
(158, 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scount`
--

DROP TABLE IF EXISTS `scount`;
CREATE TABLE IF NOT EXISTS `scount` (
  `countid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `scid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`countid`),
  KEY `typeid` (`typeid`),
  KEY `scid` (`scid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scount`
--

INSERT INTO `scount` (`countid`, `date`, `scid`, `typeid`, `count`) VALUES
(1, '2018-11-21', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicecenter`
--

DROP TABLE IF EXISTS `servicecenter`;
CREATE TABLE IF NOT EXISTS `servicecenter` (
  `scid` int(10) NOT NULL AUTO_INCREMENT,
  `logid` int(10) NOT NULL,
  `centername` varchar(25) NOT NULL,
  `licenceno` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `district` varchar(15) NOT NULL,
  `place` varchar(15) NOT NULL,
  `certificate` varchar(1000) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  PRIMARY KEY (`scid`),
  KEY `logid` (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicecenter`
--

INSERT INTO `servicecenter` (`scid`, `logid`, `centername`, `licenceno`, `type`, `brand`, `district`, `place`, `certificate`, `mobile`) VALUES
(3, 152, 'mgf', 'lic123', 'Authorized', 'hyundai', 'Idukki', 'adimali', '/upload/alone_boy.jpeg', 7894561230),
(4, 154, 'AVG', 'lic124', 'Authorized', 'maruti suzuki', 'Ernakulam', 'aluva', '/upload/_20170622_155215.JPG', 9847256314),
(5, 156, 'Nippon', 'lic7894123', 'Authorized', 'Tata', 'Idukki', 'Kattappana', '/upload/156/dfg.jpg', 9847390089);

-- --------------------------------------------------------

--
-- Table structure for table `servicescheme`
--

DROP TABLE IF EXISTS `servicescheme`;
CREATE TABLE IF NOT EXISTS `servicescheme` (
  `scid` int(11) NOT NULL,
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `variant` varchar(10) NOT NULL,
  `fuel` varchar(30) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `replaced` varchar(500) NOT NULL,
  `checked` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `scid` (`scid`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicescheme`
--

INSERT INTO `servicescheme` (`scid`, `sid`, `typeid`, `brand`, `model`, `variant`, `fuel`, `stype`, `replaced`, `checked`, `amount`) VALUES
(3, 5, 1, 'hyundai', 'eon', 'magna', 'petrol', 'First service', 'Engine oil', 'All Parts', 1400),
(3, 6, 2, 'hyundai', 'eon', 'magna', 'petrol', 'Full Painting', 'Nil', 'Nil', 15000),
(4, 7, 1, 'maruti suzuki', 'alto800', 'lx', 'petrol', 'First Service', 'Engine oil', 'All Parts', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `stypes`
--

DROP TABLE IF EXISTS `stypes`;
CREATE TABLE IF NOT EXISTS `stypes` (
  `typeid` int(5) NOT NULL AUTO_INCREMENT,
  `scid` int(10) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `maximum` int(11) NOT NULL,
  PRIMARY KEY (`typeid`),
  KEY `scid` (`scid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stypes`
--

INSERT INTO `stypes` (`typeid`, `scid`, `sname`, `maximum`) VALUES
(1, 3, 'Periodic Services', 5),
(2, 3, 'Painting', 3),
(4, 3, 'Body Works', 5),
(5, 4, 'Periodic services', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `usrid` int(10) NOT NULL AUTO_INCREMENT,
  `logid` int(10) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `mobile` bigint(10) NOT NULL,
  `district` varchar(25) NOT NULL,
  `place` varchar(25) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`usrid`),
  KEY `logid` (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usrid`, `logid`, `fname`, `lname`, `email`, `mobile`, `district`, `place`, `photo`) VALUES
(23, 157, 'Timin', 'Kurian', 'timinkurian@gmail.com', 9847390002, 'Idukki', 'Kattappana', '/upload/157/IMG_4362.JPG');

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
