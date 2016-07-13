-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 10:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `market`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_userid`, `account_username`, `account_pw_hash`, `account_email`, `account_status`) VALUES
(56, '', '$2y$10$jRTifrwlHRXlLFsj6/nJgeED9d1RsRvlkRJowOEbM1dVbGAzad13G', 'weixiongs86@hotmail.com', 1),
(57, '', '$2y$10$fvVLs8CHIml03QLQ1IqEauLRf7ZbznyX2qkz.lpTcunCAJHe73foy', 'weixiongaa6@hotmail.com', 1),
(58, '', '$2y$10$wZkjdBwT9sYlt1wdhilfp.msWFeh3M7PCJy0bQWJ2osx3HWaLL5.O', 'weix1iong86@hotmail.com', 1),
(59, '', '$2y$10$KfOwwLwgLA7wPPBS7Pp1ROE3ha4p8PrzM44o7N.QlsfsHbYM6OD8u', 'weixionsg86@hotmail.com', 1),
(60, '', '$2y$10$7H7o5tu3uowfP1XVs2NxfuQYO7/ISAWKJ/TgEAPbrUPKIQThWw5hu', 'weixiongg86@hotmail.com', 1),
(64, '', '$2y$10$cJ7tX1NW7DRugwAjqLLyLOlrF2lz0oI.4Qxugi5nPawbQ49cbEroC', 'weixiong86@hotmail.com', 1);

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
  `accepted` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employ`
--

INSERT INTO `employ` (`id`, `applier`, `accepted`, `status`) VALUES
(11, '35', 0, 0),
(12, '35', 0, 0),
(18, '35', 1, 0),
(10, '35', 2, 0),
(18, '36', 2, 0),
(9, '36', 0, 0),
(18, '37', 0, 0),
(23, '37', 2, 0),
(22, '37', 0, 0),
(25, '35', 0, 0),
(2, '35', 0, 0),
(44, '42', 1, 0),
(46, '42', 2, 0),
(52, '46', 0, 0),
(58, '46', 0, 0),
(53, '46', 0, 0),
(0, '41', 0, 0),
(50, '44', 0, 0),
(58, '44', 0, 0),
(54, '44', 0, 0),
(52, '41', 1, 0),
(50, '41', 1, 0),
(53, '41', 2, 1),
(105, '43', 0, 0),
(104, '43', 0, 0),
(100, '43', 0, 0),
(88, '43', 0, 0),
(95, '43', 0, 0),
(94, '43', 0, 0),
(49, '41', 0, 0);

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
  `job_date` datetime NOT NULL,
  `job_expirydate` date NOT NULL,
  `job_time` time NOT NULL,
  `job_description` varchar(300) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_pay` text NOT NULL,
  `job_startdate` date NOT NULL,
  `job_enddate` date NOT NULL,
  `job_starttime` time NOT NULL,
  `job_endtime` time NOT NULL,
  `job_venue` varchar(255) NOT NULL,
  `job_status` int(11) NOT NULL,
  `item_photo` text NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_poster_id`, `job_title`, `job_date`, `job_expirydate`, `job_time`, `job_description`, `job_type_id`, `job_pay`, `job_startdate`, `job_enddate`, `job_starttime`, `job_endtime`, `job_venue`, `job_status`, `item_photo`) VALUES
(1, 41, 'Vacuum Cleaner', '2015-03-08 09:21:29', '2016-02-09', '09:21:29', 'Choregrapher for MTV shoot for (Some Artist). Please provide shoreel for selection. ', 3, '20', '0000-00-00', '2016-01-01', '00:00:00', '00:00:00', 'North', 1, '/market/item/1/pic.png'),
(2, 41, 'Toy', '2015-03-08 09:21:58', '2016-02-08', '09:21:58', '6-8 Dancers. 6Mins Performance. Hiphop/kpop Dance ', 9, '10', '0000-00-00', '2016-01-08', '00:00:00', '00:00:00', 'North', 1, '/market/item/2/pic.png'),
(3, 41, 'Television', '2015-03-08 09:22:06', '2016-02-04', '09:22:06', 'Dancers to dance and promote new gaming console. Dancers are to demonsrate and teach people how to play. 2 sessions a day. 12-4pm &amp; 5-9pm . 3 days. 6 dancers needed. 2 Male 4 female.', 9, '300', '0000-00-00', '2016-03-16', '00:00:00', '00:00:00', 'North', 1, '/market/item/3/pic.png'),
(4, 42, 'Laptop', '2015-03-08 08:31:08', '2016-01-05', '08:31:08', 'Dance class for office group. Tuesdays or Thursdays 7.30-9pm. Venue provided. \r\n\r\nCertified Instructor only', 1, '60', '0000-00-00', '2016-01-28', '00:00:00', '00:00:00', 'South', 1, '/market/item/4/pic.png'),
(5, 42, 'Camera', '2015-03-08 08:34:15', '2015-12-11', '08:34:15', 'Play group for kids(girls) age 4-12. Every Saturday morning 10am to 12noon at studio in Condo. ', 1, '100', '0000-00-00', '2016-03-01', '00:00:00', '00:00:00', 'East', 1, '/market/item/5/pic.png'),
(6, 42, 'Sofa', '2015-03-08 08:59:09', '2016-01-01', '08:59:09', 'Certified Ballet Instructor for new Studio. Weekly classes including Weekends. Starting from May.\r\n\r\nUpdated.', 1, '250', '0000-00-00', '2016-01-23', '00:00:00', '00:00:00', 'North', 1, '/market/item/6/pic.png'),
(7, 42, 'Chair', '2015-03-08 08:42:53', '2015-12-24', '08:42:53', 'Dancers to lead Sing-Along-Dance-Along sessions for Pre-school Kids. Song provided by organizer. Dancers to come up with choreography, lyrics and short skit. 4 shows. 30mins each.', 2, '20', '0000-00-00', '2016-01-27', '00:00:00', '00:00:00', 'West', 1, '/market/item/7/pic.png'),
(8, 42, 'Table', '2015-06-12 09:42:06', '2016-03-12', '09:42:06', '2 Couples needed for Singing performance. Slow song. Partner dance. Dancers to come up with own balllroom routine. 1 rehearsal 1show', 2, '2', '0000-00-00', '2016-02-12', '00:00:00', '00:00:00', 'North', 1, '/market/item/8/pic.png'),
(9, 41, 'Luggage', '2015-09-01 11:43:05', '2015-10-31', '11:43:05', 'DanceseenJob description', 1, '156', '0000-00-00', '2016-01-17', '00:00:00', '00:00:00', 'North', 1, '/market/item/9/pic.png'),
(10, 41, 'Computer', '2015-09-01 11:44:57', '2015-10-14', '11:44:57', 'DanceseenJob description', 2, '88', '0000-00-00', '2016-02-15', '00:00:00', '00:00:00', 'North', 1, '/market/item/10/pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE IF NOT EXISTS `job_type` (
  `jobtype_id` int(11) NOT NULL,
  `jobtype_name` varchar(255) NOT NULL,
  `job_budget` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`jobtype_id`, `jobtype_name`, `job_budget`) VALUES
(0, 'All', '< $50'),
(1, 'Instructor', '$50 - $100'),
(2, 'Dancer', '$100 - $250'),
(3, 'Choreographer', '$250 - $500'),
(9, 'Others', '> $500');

-- --------------------------------------------------------

--
-- Table structure for table `keycode`
--

CREATE TABLE IF NOT EXISTS `keycode` (
  `keycode_userid` int(11) NOT NULL,
  `keycode_code` varchar(40) NOT NULL,
  `keycode_codeGenTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keycode_codeType` int(11) NOT NULL,
  UNIQUE KEY `keycode_code` (`keycode_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `userid` varchar(30) NOT NULL,
  `profile_firstName` varchar(60) NOT NULL,
  `profile_lastName` varchar(60) NOT NULL,
  `profile_dob` date NOT NULL,
  `profile_avatar` varchar(255) NOT NULL,
  `profile_gender` int(11) NOT NULL,
  `profile_country` text NOT NULL,
  `profile_mobile` varchar(20) NOT NULL,
  `profile_about` text,
  `streetName` varchar(60) NOT NULL,
  `crewName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`userid`, `profile_firstName`, `profile_lastName`, `profile_dob`, `profile_avatar`, `profile_gender`, `profile_country`, `profile_mobile`, `profile_about`, `streetName`, `crewName`) VALUES
('admin', 'Rusty', 'Goh', '0000-00-00', '', 0, '', '+65 12345678', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', ''),
('41', 'dummyposter', '123', '1990-09-11', '', 0, '', '+65 12345678', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', ''),
('42', 'dummyposter', '456', '1987-09-03', '', 0, '', '+65 12345678', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', ''),
('46', 'Rusty', 'Goh', '1986-08-22', '', 0, '', '+65 12345678', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '');

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
