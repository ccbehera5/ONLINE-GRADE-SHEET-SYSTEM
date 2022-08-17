-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 07, 2020 at 06:20 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fakir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `uid` int(4) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `uname`, `pwd`) VALUES
(1111, 'aaaa', '1111'),
(2222, 'bbbb', '2222'),
(3333, 'cccc', '3333');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `rollno` varchar(15) NOT NULL,
  `papcode` varchar(20) NOT NULL,
  `session` int(4) NOT NULL,
  `intsecmark` int(2) NOT NULL DEFAULT '0',
  `semsecmark` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rollno`,`papcode`,`session`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`rollno`, `papcode`, `session`, `intsecmark`, `semsecmark`) VALUES
('9001', 't101', 2020, 9, 30),
('9001', 't201', 2020, 8, 30),
('9001', 't102', 2020, 6, 31),
('9001', 't202', 2020, 7, 32),
('8001', 'p101', 2020, 5, 28),
('8002', 'p101', 2020, 6, 29),
('8003', 'p101', 2020, 7, 30),
('8001', 'p102', 2020, 7, 35),
('8002', 'p102', 2020, 8, 36),
('8003', 'p102', 2020, 9, 37),
('8001', 'p201', 2020, 7, 19),
('8002', 'p201', 2020, 8, 25),
('8003', 'p201', 2020, 6, 30),
('8001', 'p301', 2020, 7, 40),
('8002', 'p301', 2020, 7, 35),
('8003', 'p301', 2020, 8, 38),
('8001', 'p202', 2020, 9, 44),
('8002', 'p202', 2020, 7, 28),
('8003', 'p202', 2020, 8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

DROP TABLE IF EXISTS `paper`;
CREATE TABLE IF NOT EXISTS `paper` (
  `prgmcode` varchar(10) NOT NULL,
  `sem` varchar(10) DEFAULT NULL,
  `papcode` varchar(5) NOT NULL,
  `papname` varchar(50) DEFAULT NULL,
  `intfm` int(3) DEFAULT NULL,
  `semfm` int(3) DEFAULT NULL,
  `totmark` int(3) DEFAULT NULL,
  `intpm` int(3) DEFAULT NULL,
  `sempm` int(3) DEFAULT NULL,
  `cp` int(2) DEFAULT NULL,
  PRIMARY KEY (`prgmcode`,`papcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`prgmcode`, `sem`, `papcode`, `papname`, `intfm`, `semfm`, `totmark`, `intpm`, `sempm`, `cp`) VALUES
('dca', '1', 't101', 'aa', 10, 40, 50, 4, 16, 10),
('dca', '1', 't102', 'bb', 10, 40, 50, 4, 16, 10),
('dca', '2', 't201', 'cc', 10, 40, 50, 4, 16, 10),
('dca', '2', 't202', 'dd', 10, 40, 50, 4, 16, 10),
('pgdca', '1', 'p101', 'aaa', 10, 40, 50, 4, 16, 10),
('pgdca', '1', 'p102', 'bbb', 10, 40, 50, 4, 16, 10),
('pgdca', '2', 'p201', 'ccc', 10, 40, 50, 4, 16, 10),
('pgdca', '2', 'p202', 'ddd', 10, 40, 50, 4, 16, 10),
('pgdca', '3', 'p301', 'eee', 10, 40, 50, 4, 16, 10),
('pgdca', '3', 'p302', 'fff', 10, 40, 50, 4, 16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `prgmcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prgmname` varchar(100) DEFAULT NULL,
  `nosem` int(2) DEFAULT NULL,
  `nopap` int(2) DEFAULT NULL,
  `fm` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`prgmcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prgmcode`, `prgmname`, `nosem`, `nopap`, `fm`) VALUES
('DCA', 'Diploma in Computer Application', 2, 4, 50),
('PGDCA', 'Post Graduate Diploma in Computer Application', 3, 6, 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `regdno` varchar(10) DEFAULT NULL,
  `rollno` varchar(15) NOT NULL,
  `prgmcode` varchar(6) DEFAULT NULL,
  `session` varchar(4) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studname`, `dob`, `gender`, `regdno`, `rollno`, `prgmcode`, `session`) VALUES
('shubha', '1996-08-07', 'female', '12345/12', '9001', 'dca', '2020'),
('chandan', '2010-10-10', 'male', '12345/13', '8001', 'pgdca', '2020'),
('jaga', '2011-11-11', 'female', '12345/11', '8002', 'pgdca', '2020'),
('soroj', '2012-12-12', 'female', '12345/10', '8003', 'pgdca', '2020');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
