-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2013 at 07:37 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ms`
--
CREATE DATABASE IF NOT EXISTS `ms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ms`;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_msg`
--

CREATE TABLE IF NOT EXISTS `feedback_msg` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `posted` date NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback_msg`
--

INSERT INTO `feedback_msg` (`feedback_id`, `username`, `posted`, `message`) VALUES
(1, 1, '2013-11-01', 'yooohooo!!!\r\nIm here!!!\r\nOooooou~');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `subject`, `description`, `seen`, `link`) VALUES
(1, 'Heeeeeey', 'Yeh! Buddy!!!!!!!!!!', 1, 'www.google.com'),
(2, 'Yeh! Buddy!', 'Hey You this Damn Notification of Death!', 1, 'www.google.com'),
(3, 'Hello There', 'Welcome to the maintenace Schedule Service. We hope you enjoy', 0, 'www.google.com'),
(4, 'Hello There', 'Welcome to the maintenace Schedule Service. We hope you enjoy', 0, 'www.google.com'),
(5, 'Hello There', 'Welcome to the maintenace Schedule Service. We hope you enjoy', 0, 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_task`
--

CREATE TABLE IF NOT EXISTS `schedule_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(50) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `task_assigned` datetime NOT NULL,
  `task_due` date DEFAULT NULL,
  `task_done` datetime DEFAULT NULL,
  `involved_mp` text NOT NULL,
  `feedback_msg_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `schedule_task`
--

INSERT INTO `schedule_task` (`task_id`, `task_name`, `task_description`, `task_assigned`, `task_due`, `task_done`, `involved_mp`, `feedback_msg_id`) VALUES
(1, 'Clean the room', 'You have to like go to your room, and then like clean the room', '2013-11-01 00:00:00', '2013-11-20', '2013-11-09 00:00:00', '1', 1),
(3, 'Repair Jeager', 'You basically have to Repair the Jeager', '2013-11-28 12:50:36', '2013-11-28', NULL, '0', NULL),
(4, 'Repair Jeager', 'You basically have to Repair the Jeager', '2013-11-28 19:27:53', '2013-11-28', NULL, '0', NULL),
(5, 'Jeager Maintenance', 'Replace The Nuclear Reactor, Clean the Radioactive waste, And just put it back in, not too hard', '2013-11-28 19:29:38', '0000-00-00', NULL, '1,2,3', NULL),
(6, 'Jeager Maintenance', 'Replace The Nuclear Reactor, Clean the Radioactive waste, And just put it back in, not too hard', '2013-11-28 19:33:22', '2013-12-03', NULL, '1,2,3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `rank` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `job_title` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `username`, `user_password`, `rank`, `email`, `job_title`) VALUES
(1, 'diehard', '96ac9a11d94d8f982ba476aa4b5ef503', 1, 'eshanshafeeq073055@gmail.com', 'Admin'),
(2, 'pam', '96ac9a11d94d8f982ba476aa4b5ef503', 2, 'pam.dayne@gmail.com', 'Jaeger Reactor Maintenance Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE IF NOT EXISTS `user_task` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_task_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`user_id`, `task_id`, `user_task_id`) VALUES
(1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
