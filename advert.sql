-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2014 at 05:52 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advert`
--
CREATE DATABASE IF NOT EXISTS `advert` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `advert`;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `ID` int(5) NOT NULL,
  `Path` varchar(20) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `Client` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Link` varchar(30) NOT NULL,
  `Click` int(5) NOT NULL,
  `Impression` int(5) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ID`, `Path`, `Title`, `Client`, `Type`, `Link`, `Click`, `Impression`) VALUES
(12, 'nestle.jpg', 'Nestle PLC', 'The Nation', 'Banner', 'www.thenationonline.com.ng', 0, 0),
(34, 'mtn.jpg', 'MTN', 'Punch', 'Banner', 'www.punchng.com', 0, 0),
(44, 'uac.jpg', 'UAC Plc', 'Tribune ', 'Banner', 'www.tribune.com.ng', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `ID` int(5) NOT NULL,
  `IPaddress` varchar(50) NOT NULL,
  `ClickTime` varchar(50) NOT NULL,
  `Type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
