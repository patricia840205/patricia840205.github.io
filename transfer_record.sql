-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 04:05 PM
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
-- Table structure for table `transfer_record`
--

CREATE TABLE IF NOT EXISTS `transfer_record` (
  `id` int(6) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(5) NOT NULL,
  `uni` varchar(20) NOT NULL,
  `for_course_name` varchar(50) NOT NULL,
  `tku_course_code` varchar(5) NOT NULL,
  `tku_coursename_ch` varchar(20) NOT NULL,
  `transfer_credits` int(5) NOT NULL,
  `hours` int(5) DEFAULT NULL,
  `for_credits` int(5) DEFAULT NULL,
  `for_score` int(11) DEFAULT NULL,
  `syllabus` blob NOT NULL,
  `transcript` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer_record`
--

INSERT INTO `transfer_record` (`id`, `user_id`, `user_name`, `uni`, `for_course_name`, `tku_course_code`, `tku_coursename_ch`, `transfer_credits`, `hours`, `for_credits`, `for_score`, `syllabus`, `transcript`) VALUES
(1, '401840145', '王曉明', '加州州立大學_長堤分校', 'Comparative European Politics', 'p1515', '比較政治', 2, 0, 0, NULL, '', NULL),
(2, '401840145', '王曉明', '加州州立大學_長堤分校', 'Political Concepts', 'p1546', '政治學', 2, 0, 0, NULL, '', NULL),
(3, '401840052', '林家欣', '加州州立大學_長堤分校', 'Comparative European Politics', 'p2247', '歐洲社會與文化', 2, 0, 0, NULL, '', NULL),
(4, '401840052', '林家欣', '加州州立大學_長堤分校', 'Power in the World Economy', 'p1265', '國際經濟', 3, 0, 0, NULL, '', NULL),
(5, '401840095', '郭舒強', '加州州立大學_長堤分校', 'Political Concepts', 'p1546', '政治學', 2, 0, 0, NULL, '', NULL),
(6, '401840095', '郭舒強', '加州州立大學_長堤分校', 'Power in the World Economy', 'p4125', '經濟成長', 2, 0, 0, NULL, '', NULL),
(7, '401840125', '陳逸珍', '加州州立大學_長堤分校', 'Comparative European Politics', 'p2247', '歐洲社會與文化', 2, 0, 0, NULL, '', NULL),
(8, '401840125', '陳逸珍', '加州州立大學_長堤分校', 'Political Concepts', 'p1515', '比較政治', 2, 0, 0, NULL, '', NULL),
(9, '401840088', '張怡如', '加州州立大學_長堤分校', 'Comparative European Politics', 'p3224', '近代歐洲社會與閱讀文化', 3, 0, 0, NULL, '', NULL),
(10, '401840088', '張怡如', '加州州立大學_長堤分校', 'Power in the World Economy', 'p4125', '經濟成長', 2, 0, 0, NULL, '', NULL),
(11, '401840037', '林于珊', '加州州立大學_長堤分校', 'Political Concepts', 'p1515', '比較政治', 2, 0, 0, NULL, '', NULL),
(12, '401840037', '林于珊', '加州州立大學_長堤分校', 'Power in the World Economy', 'p6522', '總體經濟學', 3, 0, 0, NULL, '', NULL),
(13, '401850025', '吳建亨', '桑德蘭大學', 'Marketing And Business For The Hospitality Sector', 't0025', '國際觀光行銷', 3, 0, 0, NULL, '', NULL),
(14, '401850025', '吳建亨', '桑德蘭大學', 'Global Tourism ', 't0035', '永續觀光', 3, 0, 0, NULL, '', NULL),
(15, '401850033', '丁祐琳', '桑德蘭大學', 'Leadership and Fundraising For Events', 't0029', '國際領隊與導遊實務', 3, 0, 0, NULL, '', NULL),
(16, '401850033', '丁祐琳', '桑德蘭大學', 'Urban Tourism', 't0035', '永續觀光', 3, 0, 0, NULL, '', NULL),
(17, '401850127', '李芳汝', '桑德蘭大學', 'Tourism Concepts And Issues', 't0027', '觀光發展概論', 3, 0, 0, NULL, '', NULL),
(18, '401850127', '李芳汝', '桑德蘭大學', 'Marketing And Business For The Hospitality Sector', 't0058', '觀光旅遊管理', 2, 0, 0, NULL, '', NULL),
(19, '401850058', '張雅琳', '桑德蘭大學', 'Global Tourism', 't0058', '觀光旅遊管理', 2, 0, 0, NULL, '', NULL),
(20, '401850058', '張雅琳', '桑德蘭大學', 'Leadership and Fundraising For Events ', 't0029', '國際領隊與導遊實務', 3, 0, 0, NULL, '', NULL),
(21, '401850032', '陳怡融', '桑德蘭大學', 'Urban Tourism', 't0058', '觀光旅遊管理', 2, 0, 0, NULL, '', NULL),
(22, '401850032', '陳怡融', '桑德蘭大學', 'Tourism Concepts And Issues ', 't0025', '國際觀光行銷', 3, 0, 0, NULL, '', NULL),
(23, '401850026', '陳沛妮', '桑德蘭大學', 'Marketing And Business For The Hospitality Sector', 't0025', '國際觀光行銷', 3, 0, 0, NULL, '', NULL),
(24, '401850026', '陳沛妮', '桑德蘭大學', 'Global Tourism', 't0058', '觀光旅遊管理', 2, 0, 0, NULL, '', NULL),
(25, '401810068', '李淑珍', '天普大學', 'Studying And Writing About Literature', 'e2345', '歐美文學選讀', 3, 0, 0, NULL, '', NULL),
(26, '401810068', '李淑珍', '天普大學', 'Intro To American Literature', 'e5698', '現代歐美文化', 3, 0, 0, NULL, '', NULL),
(27, '401810052', '朱采紹', '天普大學', 'Writing And Reading Narrative Fiction', 'e6421', '小說選讀', 3, 0, 0, NULL, '', NULL),
(28, '401810052', '朱采紹', '天普大學', 'English Literature', 'e7558', '語言與文化', 3, 0, 0, NULL, '', NULL),
(29, '401810034', '余函林', '天普大學', 'Studying And Writing About Literature', 'e4556', '高級英文寫作', 3, 0, 0, NULL, '', NULL),
(30, '401810034', '余函林', '天普大學', 'Intro To American Literature', 'e2345', '歐美文學選讀', 3, 0, 0, NULL, '', NULL),
(31, '401810125', '張國維', '天普大學', 'Writing And Reading Narrative Fiction', 'e4556', '高級英文寫作', 3, 0, 0, NULL, '', NULL),
(32, '401810125', '張國維', '天普大學', 'English Literature', 'e2345', '歐美文學選讀', 3, 0, 0, NULL, '', NULL),
(33, '401810112', '李雅惠', '天普大學', 'Studying And Writing About Literature', 'e4556', '高級英文寫作', 3, 0, 0, NULL, '', NULL),
(34, '401810112', '李雅惠', '天普大學', 'Intro To American Literature', 'e5698', '現代歐美文化', 3, 0, 0, NULL, '', NULL),
(35, '401810134', '黃心柏', '天普大學', 'Writing And Reading Narrative Fiction', 'e4556', '高級英文寫作', 3, 0, 0, NULL, '', NULL),
(36, '401810134', '黃心柏', '天普大學', 'English Literature', 'e7558', '語言與文化', 3, 0, 0, NULL, '', NULL),
(37, '401820056', '黃得智', '維諾納州立大學', 'Introduction To Web Authoring', 'i2120', '網頁設計應用', 3, 0, 0, NULL, '', NULL),
(38, '401820056', '黃得智', '維諾納州立大學', 'Database Driven Information System', 'i3131', '資料庫系統', 3, 0, 0, NULL, '', NULL),
(39, '401820045', '陳智偉', '維諾納州立大學', 'Web Interaction Design', 'i2120', '網頁設計應用', 3, 0, 0, NULL, '', NULL),
(40, '401820045', '陳智偉', '維諾納州立大學', 'Intermediate Web Techniques', 'i6985', '網路與通訊', 3, 0, 0, NULL, '', NULL),
(41, '401820036', '田應慶', '維諾納州立大學', 'Information Systems Development', 'i0257', '系統分析與設計', 3, 0, 0, NULL, '', NULL),
(42, '401820036', '田應慶', '維諾納州立大學', 'Introduction To Web Authoring', 'i2120', '網頁設計應用', 3, 0, 0, NULL, '', NULL),
(43, '401820048', '丁子芸', '維諾納州立大學', 'Database Driven Information System', 'i3131', '資料庫系統', 3, 0, 0, NULL, '', NULL),
(44, '401820048', '丁子芸', '維諾納州立大學', 'Web Interaction Design', 'i2120', '網頁設計應用', 3, 0, 0, NULL, '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
