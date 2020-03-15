-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2018 at 07:47 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fathers`
--

-- --------------------------------------------------------

--
-- Table structure for table `arome`
--

DROP TABLE IF EXISTS `arome`;
CREATE TABLE IF NOT EXISTS `arome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `dept` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arome`
--

INSERT INTO `arome` (`id`, `fname`, `lname`, `user`, `pass`, `dept`, `phone`, `email`) VALUES
(75, 'Adebowale', 'Adebusuyi', 'kato', 'e10adc3949ba59abbe56e057f20f883e', 'Psg', '08065348422', 'kato@surf.com');

-- --------------------------------------------------------

--
-- Table structure for table `babs`
--

DROP TABLE IF EXISTS `babs`;
CREATE TABLE IF NOT EXISTS `babs` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `subname` varchar(11) NOT NULL,
  `instruction` varchar(1000) NOT NULL,
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`subid`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `babs`
--

INSERT INTO `babs` (`subid`, `subname`, `instruction`, `active`) VALUES
(75, 'NEW', '', 0),
(74, 'PHY 501', '', 0),
(73, 'MEE 551', '', 1),
(72, 'MKT 111', '', 0),
(69, 'Psg', '', 0),
(71, 'CSE 201', '', 0),
(65, 'Bio 103', '', 1),
(66, 'Chm', '', 0),
(70, 'ADB 121', '', 1),
(76, 'Test', '', 0),
(77, 'Check', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elton`
--

DROP TABLE IF EXISTS `elton`;
CREATE TABLE IF NOT EXISTS `elton` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `score` int(5) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gbile`
--

DROP TABLE IF EXISTS `gbile`;
CREATE TABLE IF NOT EXISTS `gbile` (
  `amin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`amin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gbile`
--

INSERT INTO `gbile` (`amin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin1', 'ax2ey1'),
(2, 'admin2', 'key3yj');

-- --------------------------------------------------------

--
-- Table structure for table `odoma`
--

DROP TABLE IF EXISTS `odoma`;
CREATE TABLE IF NOT EXISTS `odoma` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `subid` int(11) NOT NULL,
  `qtext` varchar(300) NOT NULL,
  `ans1` varchar(100) NOT NULL,
  `ans2` varchar(100) NOT NULL,
  `ans3` varchar(100) NOT NULL,
  `ans4` varchar(100) NOT NULL,
  `ans5` varchar(100) NOT NULL,
  `ans` text NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odoma`
--

INSERT INTO `odoma` (`qid`, `subid`, `qtext`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`, `ans`) VALUES
(6, 2, 'how?', 'like this', 'like that', 'you see', 'none', 'all', 'B'),
(4, 4, 'What is relief', 'Web server', 'Programming language', 'Church', 'Business group', 'no idea', 'D'),
(5, 4, 'Is this cool', 'yes', 'no', 'maybe', 'null', 'void', 'A'),
(7, 5, 'What is mth?', 'math', 'science', '', '', '', 'B');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
