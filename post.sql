-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 03:27 PM
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
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `貼文編號` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `姓名` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '無名氏',
  `標題` varchar(30) CHARACTER SET utf8 NOT NULL,
  `貼文內容` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `日期時間` datetime NOT NULL,
  `category` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `school_name` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`貼文編號`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`貼文編號`, `姓名`, `標題`, `貼文內容`, `日期時間`, `category`, `school_name`) VALUES
(73, '郭凌君', '第一次看到雪耶!', '平時在台灣很少有機會看到雪，生平第一次摸到雪，真的很開心!', '2016-12-30 21:48:50', '心情', '維諾納州立大學'),
(74, '郭凌君', '美國的食物實在有夠難吃', '美國除了速食還是速食，快要受不了啦!!!!\r\n還是自己煮比較健康又好吃!', '2016-12-30 22:02:03', '食', '維諾納州立大學'),
(75, '王妍儒', '好無聊~', '大家暑假都出去玩了，只有我還在房間內ˊˋ\r\n不過我還駕是有計畫要出去玩的喔!', '2016-12-30 22:04:09', '其他', '桑德蘭大學'),
(76, '吳霈臻', '第一次學著自己獨立', '自從來到Winona之後，變得會做菜了!', '2016-12-30 22:06:50', '其他', '維諾納州立大學');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
