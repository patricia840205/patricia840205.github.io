-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 03:26 PM
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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_school` varchar(50) NOT NULL,
  `user_dep` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_password`, `user_name`, `user_email`, `user_school`, `user_dep`) VALUES
(1, 402850522, '9101179', '吳霈臻', '402850522@s02.tku.edu.tw', '維諾納州立大學', 'IIT_SE'),
(2, 402840234, '12841', '黃郁超', '402840234@s02.tku.edu.tw', '加州州立大學_長堤分校', 'IIT_AI'),
(3, 402840325, '840716', '張丞志', '402840325@s02.tku.edu.tw', '天普大學', 'IIT_AI'),
(4, 402840168, '224697', '王妍儒', '402840168@s02.tku.edu.tw', '桑德蘭大學', 'IIT_AI'),
(5, 402850092, '840808', '郭凌君', '402850092@s02.tku.edu.tw', '維諾納州立大學', 'IIT_SE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
