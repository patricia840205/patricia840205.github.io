-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 04:03 PM
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
-- Table structure for table `tku_course_info`
--

CREATE TABLE IF NOT EXISTS `tku_course_info` (
  `id` int(10) NOT NULL,
  `tku_course_code` varchar(10) NOT NULL,
  `tku_coursename_en` varchar(70) NOT NULL,
  `tku_coursename_ch` varchar(50) NOT NULL,
  `tku_course_credit` int(10) NOT NULL,
  PRIMARY KEY (`tku_course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tku_course_info`
--

INSERT INTO `tku_course_info` (`id`, `tku_course_code`, `tku_coursename_en`, `tku_coursename_ch`, `tku_course_credit`) VALUES
(6, 'e2345', 'Selected Readings of European and American Literat', '歐美文學選讀', 3),
(7, 'e4556', 'Advanced English Writing', '高級英文寫作', 3),
(10, 'e5698', 'Modern European and American Culture', '現代歐美文化', 3),
(9, 'e6421', 'Selected Reading of English Fiction', '小說選讀', 3),
(8, 'e7558', 'Literature and Culture', '語言與文化', 3),
(15, 'i0257', 'System Analysis and Design', '系統分析與設計', 3),
(11, 'i1230', 'Internet Technology and Application', '網際網路技術與應用', 3),
(13, 'i2120', 'Web Page Design', '網頁設計應用', 3),
(14, 'i3131', 'Database Management System', '資料庫系統', 3),
(12, 'i6985', 'Network and Communication', '網路與通訊', 3),
(16, 'i9853', 'Personal Communication System', '個人通訊系統', 3),
(18, 'p1265', 'International Economic ', '國際經濟', 3),
(22, 'p1515', 'COMPARATIVE POLITICS', '比較政治', 2),
(17, 'p1546', 'Political Science', '政治學', 2),
(21, 'p2247', 'European Societies and Cultures', '歐洲社會與文化', 2),
(23, 'p3224', 'Culture of Reading and Society in Early Modern Europe\r\n', '近代歐洲社會與閱讀文化', 3),
(19, 'p4125', 'Economic Growth ', '經濟成長', 2),
(20, 'p6522', 'Macroeconomics', '總體經濟學', 3),
(1, 't0025', 'International Tourism Management', '國際觀光行銷', 3),
(2, 't0027', 'Introduction of Tourism Development', '觀光發展概論', 3),
(3, 't0029', 'International Tour Lead and Guide Application ', '國際領隊與導遊實務', 3),
(4, 't0035', 'Sustainable Tourism ', '永續觀光', 3),
(5, 't0058', 'travel_tourism managementundeclared program', '觀光旅遊管理', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
