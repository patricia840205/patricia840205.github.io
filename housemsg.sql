-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2016 年 12 月 30 日 10:57
-- 伺服器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `user`
--

-- --------------------------------------------------------

--
-- 表的結構 `housemsg`
--

CREATE TABLE IF NOT EXISTS `housemsg` (
  `留言編號` int(4) NOT NULL AUTO_INCREMENT,
  `姓名` varchar(10) CHARACTER SET utf8 NOT NULL,
  `留言` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `時間` datetime NOT NULL,
  `topicid` int(4) NOT NULL,
  PRIMARY KEY (`留言編號`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 轉存資料表中的資料 `housemsg`
--

INSERT INTO `housemsg` (`留言編號`, `姓名`, `留言`, `時間`, `topicid`) VALUES
(1, '郭凌君', '電費與網路費另外收!', '2016-12-30 18:45:41', 1),
(2, '郭凌君', '請問: 那公寓大部分住的學生嗎?走到學校大概多久?', '2016-12-30 18:46:28', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
