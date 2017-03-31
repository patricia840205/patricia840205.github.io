-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2016 年 12 月 30 日 10:54
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
-- 表的結構 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `留言編號` int(10) NOT NULL AUTO_INCREMENT,
  `姓名` varchar(20) CHARACTER SET utf8 NOT NULL,
  `留言` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `時間` datetime NOT NULL,
  `topicid` int(11) NOT NULL,
  PRIMARY KEY (`留言編號`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 轉存資料表中的資料 `message`
--

INSERT INTO `message` (`留言編號`, `姓名`, `留言`, `時間`, `topicid`) VALUES
(1, '郭凌君', '你好~請問: 這件外套的尺寸?', '2016-12-29 17:38:13', 1),
(3, '郭凌君', '箱子可拆開與再次組裝!節省空間', '2016-12-30 00:57:20', 2),
(5, '郭凌君', '大碗顏色有 白 黑 紅\r\n小碗顏色 白\r\n附送筷子', '2016-12-30 02:47:38', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
