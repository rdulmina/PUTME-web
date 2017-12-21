-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 05:27 PM
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
(3, 'Dinith Alwis', '0775756550', 1),
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filled_request`
--

INSERT INTO `filled_request` (`req_id`, `bin_id`, `is_filled`) VALUES
(1, '1', 'Filled'),
(2, '2', 'Filled'),
(3, '3', 'Filled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `user_reg_id` varchar(20) NOT NULL,
  `profile_pic` varchar(30) NOT NULL DEFAULT 'none.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`, `type`, `user_reg_id`, `profile_pic`) VALUES
(17, 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-20 20:48:12', 0, 'Receptionist', 'EMP0000002', '5a2add240a3460.91513380.jpg'),
(18, 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-21 21:14:04', 0, 'Administrator', 'EMP0000001', '5a306cd8ccad09.02894929.jpg'),
(19, 'Ama', 'Ganepola', 'vishni@gmail.com ', '900150983cd24fb0d6963f7d28e17f72', '2017-12-11 13:58:46', 0, 'Customer', 'REG0000001', 'none.jpg'),
(29, 'Hisan', 'Hunais', 'hisanhunais.live@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-18 18:29:06', 0, 'Customer', 'REG0000004', '5a2c32a3dfc7a8.03655996.jpg'),
(30, 'Sandunika', 'Wattearachchi', 'sw97100@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000005', 'none.jpg'),
(31, 'Vishni', 'Ganepola', 'homewsp@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-11 19:52:02', 0, 'Customer', 'REG0000007', '5a2e933379e333.25494883.jpg'),
(35, 'Shehan', 'Dinuka', 'homewsp@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000008', 'none.jpg'),
(36, 'Hermione', 'Granger', 'wasuradananjith@ieee.org', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000009', 'none.jpg'),
(37, 'Shehan', 'Dinuka', 'homewsp@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000008', 'none.jpg'),
(42, 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-11 08:31:14', 0, 'Beautician', 'EMP0000003', '5a2d6b19d00ed9.39493558.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
