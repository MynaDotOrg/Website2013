-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2013 at 02:08 AM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `Myna_Events`
--

CREATE TABLE IF NOT EXISTS `Myna_Events` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `EventTypeID` int(11) NOT NULL,
  `Name` varchar(1024) NOT NULL,
  `Description` text,
  `LocationAddress` varchar(255) DEFAULT NULL,
  `LocationAddress2` varchar(255) DEFAULT NULL,
  `LocationCity` varchar(255) DEFAULT NULL,
  `LocationState` varchar(3) DEFAULT NULL,
  `LocationZip` int(12) DEFAULT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) DEFAULT NULL,
  `ImageUrl` varchar(1024) DEFAULT NULL,
  `ImageThumbUrl` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`EventID`),
  KEY `fk_Events_EventTypes` (`EventTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Myna_Events`
--
ALTER TABLE `Myna_Events`
  ADD CONSTRAINT `fk_Events_EventTypes` FOREIGN KEY (`EventTypeID`) REFERENCES `Myna_EventTypes` (`EventTypeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
