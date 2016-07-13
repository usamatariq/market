-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2015 at 10:20 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `danceseen`
--
CREATE DATABASE IF NOT EXISTS `danceseen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `danceseen`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_userid` int(11) NOT NULL AUTO_INCREMENT,
  `account_username` varchar(30) NOT NULL,
  `account_pw_hash` varchar(255) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_userid`, `account_username`, `account_pw_hash`, `account_email`, `account_status`) VALUES
(43, '', '$2y$10$jhhmAzULiNgZdNPGM7Nz8O1lkE9Ry2e0qNM7RYkh7Kzm/aQIHq6F2', 'leemeiying91@gmail.com', 0),
(44, '', '$2y$10$/.rxmSkJhqZS8YtEmGCK8uSdi1xjnky8MagRlWs5vnUyraqwwmsou', 'rustygoh@hotmail.com', 0),
(45, '', '$2y$10$Dvegf0YBZVGfn89hul3kDuvNoCBJAwwU4rFnU5YdkJwa80sSHNHky', 'weixiong@hotmail.com', 0),
(46, '', '$2y$10$BQpjstmeu4TVFZAkVQq8Euud5BNp3Q2yZzdtcmTy800A/gh1r36Vq', 'weixiong86@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL,
  `owner_uid` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attending`
--

CREATE TABLE IF NOT EXISTS `attending` (
  `a_id` int(11) NOT NULL,
  `attending_uid` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE IF NOT EXISTS `email_verification` (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_userID` int(11) NOT NULL,
  `ev_code` varchar(40) NOT NULL,
  `ev_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`ev_id`, `ev_userID`, `ev_code`, `ev_timestamp`) VALUES
(8, 43, '846e6af8dfa9784618dcaa24fb826f7793da91ec', '0000-00-00 00:00:00'),
(9, 44, '4b985505d6f32f03a4da89068e16ffd462340fda', '0000-00-00 00:00:00'),
(10, 45, '3752119e41ad345b39aef854aa241ceb87a86392', '0000-00-00 00:00:00'),
(11, 46, 'e0b599b1d744f48cb038c48cc9a9a6c61041c426', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employ`
--

CREATE TABLE IF NOT EXISTS `employ` (
  `id` int(11) NOT NULL,
  `applier` varchar(40) NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employ`
--

INSERT INTO `employ` (`id`, `applier`, `accepted`) VALUES
(1, 'dave', 0),
(3, 'dave', 0),
(1, 'admin', 0),
(1, 'admin', 0),
(5, 'admin', 0),
(1, 'admin', 0),
(4, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_poster_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_poster_id` int(40) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(40) NOT NULL,
  `job_description` varchar(300) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_pay` double NOT NULL,
  `job_startdate` date NOT NULL,
  `job_enddate` date NOT NULL,
  `job_starttime` time NOT NULL,
  `job_endtime` time NOT NULL,
  `job_venue` varchar(255) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_poster_id`, `job_title`, `date`, `time`, `job_description`, `job_type_id`, `job_pay`, `job_startdate`, `job_enddate`, `job_starttime`, `job_endtime`, `job_venue`) VALUES
(1, 0, 'Dinghaha', '2015-01-13', '123', 'Dong', 2, 0, '0000-00-00', '2015-03-18', '00:00:00', '00:00:00', ''),
(2, 0, 'Ding', '2015-02-08', '123', 'Dong', 2, 0, '0000-00-00', '2015-04-16', '00:00:00', '00:00:00', ''),
(3, 0, 'Hello', '2015-02-01', 'asd', 'asdjkasd', 3, 0, '0000-00-00', '2015-04-17', '00:00:00', '00:00:00', ''),
(4, 0, 'JDC', '2014-12-11', '00:00', 'Lets go!', 2, 0, '0000-00-00', '2015-05-14', '00:00:00', '00:00:00', ''),
(5, 0, 'Good Day', '2015-01-13', '1445', 'WHAT IS THIS', 3, 0, '0000-00-00', '2015-03-16', '00:00:00', '00:00:00', ''),
(6, 44, 'asdasdasd22', '2015-02-28', '12:55:10', 'you aharegef fasdlasdq[wkervpq veqp3o ur lqwkc q;ljrce', 1, 100, '0000-00-00', '2015-02-23', '00:00:00', '00:00:00', 'North'),
(7, 44, 'asdasdasdasdasd', '2015-02-28', '15:08:35', 'adwadeqwrqw  QWR QW Q QWqcdfsdgsdf', 1, 22222, '0000-00-00', '2015-03-27', '00:00:00', '00:00:00', 'East'),
(8, 44, 'Job Number 30', '2015-02-15', '15:49:34', 'Dancers use movement, gesture and body language to portray a character, story, situation or abstract concept to an audience, usually to the accompaniment of music. This normally involves interpreting the work of a choreographer, although it may sometimes require improvisation.', 1, 142, '0000-00-00', '2015-02-15', '00:00:00', '00:00:00', 'North'),
(9, 44, 'Job Number 31', '2015-02-28', '15:50:03', 'Dancers use movement, gesture and body language to portray a character, story, situation or abstract concept to an audience, usually to the accompaniment of music. This normally involves interpreting the work of a choreographer, although it may sometimes require improvisation.', 1, 24, '0000-00-00', '2015-04-06', '00:00:00', '00:00:00', 'North'),
(10, 44, 'asdasdasd22', '2015-02-25', '12:55:10', 'you aharegef fasdlasdq[wkervpq veqp3o ur lqwkc q;ljrce', 1, 100, '0000-00-00', '2015-03-27', '00:00:00', '00:00:00', 'North'),
(11, 46, '1213123123', '2015-02-28', '23:39:27', '123123123123 123123c qwcqwc  12312c3', 1, 55, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'North'),
(12, 46, 'hahhahrgaergerg', '2015-03-01', '00:09:27', '3rweweafsdfasdcqec12ec12 12ec12312c ', 1, 122, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'North'),
(13, 46, '123123222222', '2015-03-01', '00:09:48', 'asdas dasdcas vwa ecqweqwcw ce2 ', 1, 111, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'North');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE IF NOT EXISTS `job_type` (
  `jobtype_id` int(11) NOT NULL,
  `jobtype_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`jobtype_id`, `jobtype_name`) VALUES
(0, 'All'),
(1, 'Instructor'),
(2, 'Dancer'),
(3, 'Choreographer'),
(9, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist`
--

CREATE TABLE IF NOT EXISTS `mailinglist` (
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_to_id` int(11) NOT NULL,
  `message_from_id` int(11) NOT NULL,
  `message_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_subject` varchar(255) NOT NULL,
  `message_text` text NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_to_id`, `message_from_id`, `message_datetime`, `message_subject`, `message_text`) VALUES
(1, 1, 2, '2014-10-01 00:00:00', 'Hello', 'This is my first message.'),
(2, 1, 1, '2014-10-25 23:52:30', '1', '1'),
(3, 1, 1, '2014-10-25 23:53:13', '1', '1'),
(4, 2, 2, '2014-10-25 23:53:31', '2', '2'),
(5, 1, 2, '2014-10-25 23:53:47', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `username` varchar(30) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `about` text,
  `streetName` varchar(60) NOT NULL,
  `crewName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`username`, `firstName`, `lastName`, `dob`, `avatar`, `gender`, `mobile`, `about`, `streetName`, `crewName`) VALUES
('admin', 'Rusty', 'Goh', '0000-00-00', '', 0, '+65 12345678', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_givenName` varchar(255) NOT NULL,
  `user_familyName` varchar(255) NOT NULL,
  `user_crewName` varchar(255) NOT NULL,
  `user_style` varchar(255) NOT NULL,
  `user_years_ex` int(11) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_givenName`, `user_familyName`, `user_crewName`, `user_style`, `user_years_ex`, `user_country`, `user_about`) VALUES
(1, 'Rusty', 'Goh', 'NTU Breakers', 'Bboying, MJ', 100, 'Singapore', 'Hello I am Rusty I am on holiday ^^');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
