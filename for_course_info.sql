-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 04:06 PM
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
-- Table structure for table `for_course_info`
--

CREATE TABLE IF NOT EXISTS `for_course_info` (
  `id` int(3) NOT NULL,
  `uni` varchar(12) NOT NULL,
  `for_course_code` varchar(5) NOT NULL,
  `for_course_name` varchar(60) NOT NULL,
  `for_course_credit` int(3) NOT NULL,
  `for_course_hours` int(3) NOT NULL,
  `syllabus` longblob NOT NULL,
  `transcript` longblob NOT NULL,
  PRIMARY KEY (`for_course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `for_course_info`
--

INSERT INTO `for_course_info` (`id`, `uni`, `for_course_code`, `for_course_name`, `for_course_credit`, `for_course_hours`, `syllabus`, `transcript`) VALUES
(16, '加州州立大學_長堤分校', 'c102', 'Comparative European Politics', 2, 40, '', ''),
(17, '加州州立大學_長堤分校', 'c105', 'Political Concepts', 3, 65, '', ''),
(17, '加州州立大學_長堤分校', 'c122', 'Power in the World Economy', 2, 40, '', ''),
(14, '桑德蘭大學', 's035', 'Tourism Concepts And Issues', 2, 45, '', ''),
(1, '桑德蘭大學', 's122', 'Marketing And Business For The Hospitality Sector', 3, 200, '', ''),
(2, '桑德蘭大學', 's124', 'Global Tourism', 3, 200, '', ''),
(15, '桑德蘭大學', 's227', 'Leadership and Fundraising For Events', 3, 60, '', ''),
(4, '桑德蘭大學', 's325', 'Urban Tourism', 3, 200, '', ''),
(10, '天普大學', 't111', 'Studying And Writing About Literature', 2, 45, '', ''),
(11, '天普大學', 't115', 'Intro To American Literature', 3, 60, '', ''),
(13, '天普大學', 't126', 'Writing And Reading Narrative Fiction', 2, 40, '', ''),
(9, '天普大學', 't305', 'English Literature', 3, 45, '', ''),
(7, '維諾納州立大學', 'w105', 'Introduction To Web Authoring ', 3, 60, '', ''),
(3, '維諾納州立大學', 'w202', 'Database Driven Information System', 2, 45, '', ''),
(6, '維諾納州立大學', 'w203', 'Web Interaction Design', 2, 45, '', ''),
(8, '維諾納州立大學', 'w212', 'Intermediate Web Techniques', 3, 60, '', ''),
(5, '維諾納州立大學', 'w401', 'Information Systems Development', 2, 60, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
