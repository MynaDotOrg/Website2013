-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2013 at 02:13 AM
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
-- Table structure for table `Myna_UsersToTypes`
--

CREATE TABLE IF NOT EXISTS `Myna_UsersToTypes` (
  `UserID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`UserTypeID`),
  KEY `fk_UsersToTypes_UserTypes` (`UserTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Myna_UsersToTypes`
--
ALTER TABLE `Myna_UsersToTypes`
  ADD CONSTRAINT `fk_UsersToTypes_Users` FOREIGN KEY (`UserID`) REFERENCES `Myna_Users` (`UserID`),
  ADD CONSTRAINT `fk_UsersToTypes_UserTypes` FOREIGN KEY (`UserTypeID`) REFERENCES `Myna_UserTypes` (`UserTypeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
