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
-- 表的結構 `produce`
--

CREATE TABLE IF NOT EXISTS `produce` (
  `貼文編號` int(4) NOT NULL AUTO_INCREMENT,
  `goodname` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(128) DEFAULT NULL,
  `url` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `introduce` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `date` date NOT NULL,
  `school` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `姓名` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`貼文編號`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 轉存資料表中的資料 `produce`
--

INSERT INTO `produce` (`貼文編號`, `goodname`, `price`, `url`, `introduce`, `date`, `school`, `type`, `姓名`) VALUES
(2, '整理箱', 500, 'https://goo.gl/0mcunG', '尺寸:500*100', '2016-12-29', '華盛頓州立大學', '其他', '郭凌君'),
(3, '玻璃碗*10', 300, 'https://goo.gl/Tpb4Wk', '大的玻璃碗*4(可泡泡麵)\r\n其餘是普通大小的碗\r\n可議價!', '2016-12-30', 'whole', 'all', '郭凌君');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
