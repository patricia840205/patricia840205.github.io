-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 03:29 PM
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
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `留言編號` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `姓名` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '無名氏',
  `留言` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `日期時間` datetime NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`留言編號`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=99 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`留言編號`, `姓名`, `留言`, `日期時間`, `topic_id`) VALUES
(96, '吳霈臻', '真的~ 生病還要自己煮粥吃，外面還沒賣呢!', '2016-12-30 22:21:46', 74),
(97, '郭凌君', '哈哈!對啊!', '2016-12-30 22:43:04', 74),
(98, '吳霈臻', '宅宅~', '2016-12-30 23:29:25', 75);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
