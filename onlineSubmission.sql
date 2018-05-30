-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2015 at 01:55 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineSubmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assignments`
--

CREATE TABLE IF NOT EXISTS `Assignments` (
  `AssignmentId` int(11) NOT NULL AUTO_INCREMENT,
  `AssignmentName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`AssignmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Assignments`
--

INSERT INTO `Assignments` (`AssignmentId`, `AssignmentName`) VALUES
(1, 'Discrete123.'),
(2, 'javax.odt'),
(3, 'Quantum1.');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentId` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `password`) VALUES
('13103001', 'abhinav'),
('13103008', 'armaan'),
('13103009', 'vishal'),
('13103010', 'raja'),
('13103011', 'deepti'),
('13103012', 'divija'),
('13103013', 'kanika'),
('13103014', 'abhishek'),
('13104001', '1310');

-- --------------------------------------------------------

--
-- Table structure for table `subjectAssignment`
--

CREATE TABLE IF NOT EXISTS `subjectAssignment` (
  `subjectId` varchar(15) NOT NULL,
  `AssignmentId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectAssignment`
--

INSERT INTO `subjectAssignment` (`subjectId`, `AssignmentId`) VALUES
('1', '1'),
('1', '2'),
('2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjectId` varchar(30) NOT NULL,
  `subjectName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `subjectName`) VALUES
('1', 'maths'),
('2', 'physics'),
('3', 'chemistry'),
('4', 'dbms');

-- --------------------------------------------------------

--
-- Table structure for table `subjectStudent`
--

CREATE TABLE IF NOT EXISTS `subjectStudent` (
  `subjectId` varchar(30) NOT NULL,
  `studentId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectStudent`
--

INSERT INTO `subjectStudent` (`subjectId`, `studentId`) VALUES
('1', '13103'),
('3', '13103');

-- --------------------------------------------------------

--
-- Table structure for table `subjectTeacher`
--

CREATE TABLE IF NOT EXISTS `subjectTeacher` (
  `subjectId` varchar(30) NOT NULL,
  `teacherId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectTeacher`
--

INSERT INTO `subjectTeacher` (`subjectId`, `teacherId`) VALUES
('1', '1001'),
('2', '1001'),
('3', '1002');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacherName` varchar(30) NOT NULL,
  `teacherId` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherName`, `teacherId`, `password`) VALUES
('padmavati', '1001', 'hello'),
('manavjeet', '1002', 'manavjeet'),
('trilok chand', '1003', 'trilokchand'),
('shilpa', '1005', 'shilpa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
