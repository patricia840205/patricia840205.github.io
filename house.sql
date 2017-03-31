-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2016 年 12 月 30 日 10:58
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
-- 表的結構 `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `貼文編號` int(4) NOT NULL AUTO_INCREMENT,
  `姓名` varchar(10) CHARACTER SET utf8 NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `school` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `housename` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `introduce` varchar(268) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(360) CHARACTER SET utf8 DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`貼文編號`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 轉存資料表中的資料 `house`
--

INSERT INTO `house` (`貼文編號`, `姓名`, `type`, `school`, `price`, `housename`, `introduce`, `address`, `date`) VALUES
(1, '郭凌君', '單人房', '維諾納州立大學', 130, 'Sunday house', '公寓式\r\n有公共洗衣機 烘衣機\r\n獨立衛浴\r\n房內有小冰箱，洗手台，衣櫃\r\n附 床組(床單枕頭自己購買)', '175 West Mark Street', '2016-12-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
