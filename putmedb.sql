-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 06:12 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putmedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bin`
--

DROP TABLE IF EXISTS `bin`;
CREATE TABLE IF NOT EXISTS `bin` (
  `bin_id` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`bin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bin`
--

INSERT INTO `bin` (`bin_id`, `location`, `description`) VALUES
('1', 'Colombo 6', 'Near Savoy'),
('2', 'Colombo 6', 'Near Royal Bakery'),
('3', 'Colombo 4', 'Near Majestic City'),
('4', 'Colombo 4', 'Bauddhaloka Mawatha');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `driver_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `is_assigned` tinyint(1) NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `name`, `phoneno`, `is_assigned`) VALUES
(1, 'Wasantha Perera', '0775396038', 0),
(2, 'Heshan Silva', '0768526186', 0),
(3, 'Dinith Alwis', '0775756550', 0),
(4, 'Krishan Soyza', '0711625552', 0),
(5, 'Lalith Perera', '0717224850', 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

DROP TABLE IF EXISTS `driver_location`;
CREATE TABLE IF NOT EXISTS `driver_location` (
  `driver_id` int(10) NOT NULL,
  `area` varchar(40) NOT NULL,
  PRIMARY KEY (`driver_id`,`area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_location`
--

INSERT INTO `driver_location` (`driver_id`, `area`) VALUES
(1, 'Moratuwa'),
(1, 'Rathmalana'),
(2, 'Colombo 6'),
(2, 'Dehiwala'),
(2, 'Mt. Lavania'),
(3, 'Colombo 3'),
(3, 'Colombo 4'),
(3, 'Colombo 6'),
(4, 'Kalutara'),
(4, 'Panadura'),
(5, 'Gampaha'),
(5, 'Udugampola');

-- --------------------------------------------------------

--
-- Table structure for table `filled_request`
--

DROP TABLE IF EXISTS `filled_request`;
CREATE TABLE IF NOT EXISTS `filled_request` (
  `req_id` int(10) NOT NULL AUTO_INCREMENT,
  `bin_id` varchar(10) NOT NULL,
  `is_filled` varchar(20) NOT NULL DEFAULT 'Filled',
  PRIMARY KEY (`req_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filled_request`
--

INSERT INTO `filled_request` (`req_id`, `bin_id`, `is_filled`) VALUES
(1, '1', 'Filled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
