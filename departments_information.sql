-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 04:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments_information`
--

CREATE TABLE IF NOT EXISTS `departments_information` (
  `id` int(5) NOT NULL,
  `dep_id` int(10) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `dep_office` varchar(10) NOT NULL,
  `dep_chairman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments_information`
--

INSERT INTO `departments_information` (`id`, `dep_id`, `dep_name`, `dep_office`, `dep_chairman`) VALUES
(1, 1000, 'Innovative Information and Technology', 'CL 501', '武士戎'),
(2, 2000, 'International Tourism Management ', 'CL 501', '葉劍木'),
(3, 3000, 'English Language and Culture ', 'CL 501', '王蔚婷'),
(4, 4000, 'Global Politics and Economics ', 'CL 501', '包正豪');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
