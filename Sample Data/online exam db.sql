-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2011 at 03:48 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online exam db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admid` varchar(32) NOT NULL,
  `admname` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`admid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admid`, `admname`, `password`) VALUES
('1', 'root', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `candidateid` bigint(20) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `middlename` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dateofbirth` datetime DEFAULT NULL,
  `occupationid` bigint(11) NOT NULL,
  PRIMARY KEY (`candidateid`),
  UNIQUE KEY `email` (`email`),
  KEY `candidate_fk2` (`occupationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidateid`, `firstname`, `lastname`, `middlename`, `username`, `password`, `email`, `gender`, `dateofbirth`, `occupationid`) VALUES
(1, 'tigist', 'abebaw', 'zeleke', 'tigist', 'tg', 'tg@yahoo.com', 'female', '0000-00-00 00:00:00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `candidateanswer`
--

CREATE TABLE IF NOT EXISTS `candidateanswer` (
  `candidateid` bigint(20) NOT NULL DEFAULT '0',
  `examid` int(20) NOT NULL DEFAULT '0',
  `questionno` int(11) NOT NULL DEFAULT '0',
  `candanswer` enum('choicea','choiceb','choicec','choiced') DEFAULT NULL,
  PRIMARY KEY (`candidateid`,`examid`,`questionno`),
  KEY `candidateanswer_ibfk_1` (`candidateid`),
  KEY `candidateanswer_ibfk_2` (`examid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidateanswer`
--

INSERT INTO `candidateanswer` (`candidateid`, `examid`, `questionno`, `candanswer`) VALUES
(1, 1, 1, 'choiced'),
(1, 1, 2, 'choicec');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `examid` int(20) NOT NULL,
  `occupationid` bigint(11) NOT NULL,
  `locationid` int(20) NOT NULL,
  `examprepid` bigint(20) NOT NULL,
  `examname` varchar(30) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `examfrom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `examto` timestamp NOT NULL DEFAULT '2012-01-01 00:00:00',
  `duration` int(11) DEFAULT NULL,
  `totalquestions` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `createddate` date DEFAULT NULL,
  `examcode` varchar(40) NOT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`examid`),
  UNIQUE KEY `examcode` (`examcode`),
  UNIQUE KEY `examprepid` (`examprepid`),
  KEY `occupationid` (`occupationid`),
  KEY `locationid` (`locationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examid`, `occupationid`, `locationid`, `examprepid`, `examname`, `comment`, `examfrom`, `examto`, `duration`, `totalquestions`, `active`, `createddate`, `examcode`, `level`) VALUES
(1, 11, 2, 3, 'Basicdatabase', 'database relation,normalization,..', '2011-07-01 00:00:00', '2011-08-31 00:00:00', 1, 2, 1, '0000-00-00', 'db1db1db', 1),
(2, 13, 2, 5, 'BasicICT', 'maintain system,backup system,installin..', '2011-07-08 00:00:00', '2011-08-31 00:00:00', 1, 2, 1, '2013-12-11', 'ict22ass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exampreparer`
--

CREATE TABLE IF NOT EXISTS `exampreparer` (
  `examprepid` bigint(20) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`examprepid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exampreparer`
--

INSERT INTO `exampreparer` (`examprepid`, `name`, `password`, `email`) VALUES
(3, 'yared', 'yared', 'yared@yahoo.com'),
(4, 'mahlet', 'mahilet', 'mahi.love@yahoo.com'),
(5, 'ahmed', 'ahmed', 'ahme2000@gmail.com'),
(6, 'Beti', 'Beti', 'Beti@yahoo.com'),
(7, 'mubarek', 'mubarek', 'mube@yahoo.com'),
(8, 'zeineb', 'zeineb', 'zeineb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `locationid` int(20) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `subcity` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `hallnumber` int(10) DEFAULT NULL,
  PRIMARY KEY (`locationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationid`, `city`, `subcity`, `address`, `hallnumber`) VALUES
(1, 'Addis Ababa', 'Gulele', 'TMS', 1),
(2, 'Addis Abeba', 'Gulele', 'Microlink College', 12),
(3, 'Addis Ababa', 'Arada', 'Kiamed Medikal College', 12),
(4, 'Akaki', 'Akaki Kality', 'Akaki Vocational School', 4);

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `occupationid` bigint(11) NOT NULL,
  `sectorid` int(11) NOT NULL,
  `occupationname` varchar(40) DEFAULT NULL,
  `paymentamount` float DEFAULT NULL,
  PRIMARY KEY (`occupationid`),
  UNIQUE KEY `occupationname` (`occupationname`),
  KEY `occupation_fk1` (`sectorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occupationid`, `sectorid`, `occupationname`, `paymentamount`) VALUES
(1, 3, 'pharmacy', 100),
(2, 3, 'medicine', 200),
(3, 3, 'dentstry', 75),
(4, 3, 'Health Extension', 110),
(5, 3, 'Midwifery Nursing', 125),
(6, 4, 'Dental Hygiene', 70),
(7, 4, ' Dental Technology', 80),
(8, 4, ' Dental Nursing', 70),
(9, 4, 'Orthopedic Technique', 70),
(10, 4, 'Public Nursing', 90),
(11, 12, 'Database Administration', 70),
(12, 12, ' Information Technology Assistant', 70),
(13, 12, 'ICT Support and System Service', 75),
(14, 12, 'Hardware and Network Technology', 90),
(15, 12, 'Web and Multimedia Technology', 100);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `examid` int(20) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionno` bigint(20) NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `choicea` varchar(100) DEFAULT NULL,
  `choiceb` varchar(100) DEFAULT NULL,
  `choicec` varchar(100) DEFAULT NULL,
  `choiced` varchar(100) DEFAULT NULL,
  `correctanswer` enum('choicea','choiceb','choicec','choiced') DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `examid_2` (`examid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`examid`, `id`, `questionno`, `question`, `choicea`, `choiceb`, `choicec`, `choiced`, `correctanswer`, `marks`) VALUES
(1, 1, 1, 'which one of the following identifies a table in database?', 'foriegn key', 'constraint', 'field', 'primary key', 'choiced', 1),
(1, 2, 2, 'which one of the following is a database format?', 'doc', 'pdf', 'sql', 'png', 'choicec', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `registrationid` bigint(20) NOT NULL,
  `duration` int(10) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `numberofcandidates` int(10) DEFAULT NULL,
  `bussinessrule` varchar(30) NOT NULL,
  PRIMARY KEY (`registrationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--


-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `examid` int(20) NOT NULL,
  `candidateid` bigint(20) NOT NULL,
  `percentage` float DEFAULT NULL,
  `competency` tinyint(1) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`examid`,`candidateid`),
  KEY `examid` (`examid`),
  KEY `candidateid` (`candidateid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`examid`, `candidateid`, `percentage`, `competency`, `date`) VALUES
(1, 1, 0.5, 0, '2011-07-31 18:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `sectorid` int(11) NOT NULL,
  `sectorname` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sectorid`),
  UNIQUE KEY `sectorname` (`sectorname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sectorid`, `sectorname`) VALUES
(9, ' Hotel and Tourism'),
(12, ' Information Communication Technology (I'),
(19, 'Agriculture'),
(10, 'Agro-Food Processing'),
(13, 'Automotive'),
(7, 'Business and Service'),
(5, 'Construction '),
(16, 'Culture'),
(18, 'Defense'),
(6, 'Electricity/Electronics'),
(3, 'Hand Crafts'),
(4, 'Health'),
(11, 'Industrial Laboratory Technology (Metrol'),
(15, 'Leather Technology'),
(8, 'Metal manufacturing'),
(14, 'Textile &amp; Garment'),
(17, 'Transport');

-- --------------------------------------------------------

--
-- Table structure for table `sectoradmin`
--

CREATE TABLE IF NOT EXISTS `sectoradmin` (
  `sectoradminid` bigint(20) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `sectorid` int(11) NOT NULL,
  PRIMARY KEY (`sectoradminid`),
  UNIQUE KEY `email` (`email`),
  KEY `sectoradmin_fk1` (`sectorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectoradmin`
--

INSERT INTO `sectoradmin` (`sectoradminid`, `username`, `password`, `email`, `sectorid`) VALUES
(1, 'bernabas', 'bernabas', 'bern@gmail.com ', 3),
(3, 'sisam', 'sisam', 'sisam@yahoo.com', 4),
(4, 'solomon', 'solomon', 'soloeng@yahoo.com', 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_fk2` FOREIGN KEY (`occupationid`) REFERENCES `occupation` (`occupationid`);

--
-- Constraints for table `candidateanswer`
--
ALTER TABLE `candidateanswer`
  ADD CONSTRAINT `candidateanswer_ibfk_1` FOREIGN KEY (`candidateid`) REFERENCES `candidate` (`candidateid`),
  ADD CONSTRAINT `candidateanswer_ibfk_2` FOREIGN KEY (`examid`) REFERENCES `question` (`examid`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`occupationid`) REFERENCES `occupation` (`occupationid`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`locationid`) REFERENCES `location` (`locationid`),
  ADD CONSTRAINT `exam_ibfk_3` FOREIGN KEY (`examprepid`) REFERENCES `exampreparer` (`examprepid`);

--
-- Constraints for table `occupation`
--
ALTER TABLE `occupation`
  ADD CONSTRAINT `occupation_fk1` FOREIGN KEY (`sectorid`) REFERENCES `sector` (`sectorid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`examid`) REFERENCES `exam` (`examid`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`candidateid`) REFERENCES `candidate` (`candidateid`);

--
-- Constraints for table `sectoradmin`
--
ALTER TABLE `sectoradmin`
  ADD CONSTRAINT `sectoradmin_fk1` FOREIGN KEY (`sectorid`) REFERENCES `sector` (`sectorid`);
