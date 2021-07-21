-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 12:43 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `active7`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievers`
--

CREATE TABLE IF NOT EXISTS `achievers` (
  `id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `user`, `pass`, `type`, `time`, `st`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', '', 1),
(2, 'bachan', 'd71ae0022454f562e31b5976bc5664ea', 'superadmin', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `amount_rate`
--

CREATE TABLE IF NOT EXISTS `amount_rate` (
  `id` int(10) NOT NULL,
  `tds_pan` double NOT NULL,
  `tds` double NOT NULL,
  `sc` double NOT NULL,
  `director_bonus` double NOT NULL,
  `leadership_bonus` double NOT NULL,
  `travel_fund` double NOT NULL,
  `house_fund` double NOT NULL,
  `car_fund` double NOT NULL,
  `bv_rate` double NOT NULL,
  `lob_dirpv` double NOT NULL,
  `tf_capping` double NOT NULL,
  `cf_capping` double NOT NULL,
  `hf_capping` double NOT NULL,
  `withdrawal` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amount_rate`
--

INSERT INTO `amount_rate` (`id`, `tds_pan`, `tds`, `sc`, `director_bonus`, `leadership_bonus`, `travel_fund`, `house_fund`, `car_fund`, `bv_rate`, `lob_dirpv`, `tf_capping`, `cf_capping`, `hf_capping`, `withdrawal`) VALUES
(1, 10, 10, 10, 12, 10, 3, 5, 4, 20, 5000, 60000, 60000, 80000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `authenticate_status`
--

CREATE TABLE IF NOT EXISTS `authenticate_status` (
  `authen_id` int(11) NOT NULL,
  `sublink_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `authen_status` int(1) NOT NULL DEFAULT '1',
  `edit_status` int(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(5) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `st`) VALUES
(1, 'AMERICAN EXPRESS BANK LTD', 1),
(2, 'ALLAHABAD BANK', 1),
(3, 'ANDHRA BANK', 1),
(4, 'AXIS BANK', 1),
(5, 'BANK OF BARODA', 1),
(6, 'BANK OF INDIA', 1),
(7, 'BANK OF MAHARASTRA', 1),
(8, 'BANDHAN BANK', 1),
(9, 'CANARA BANK', 1),
(10, 'CITI BANK', 1),
(11, 'CITI UNION BANK LTD', 1),
(12, 'CORPORATION BANK', 1),
(13, 'DEVELOPMENT CREDIT BANK LTD', 1),
(14, 'DENA BANK', 1),
(15, 'INDUSLAND BANK LTD', 1),
(16, 'ICICI BANK', 1),
(17, 'IDBI BANK LTD', 1),
(18, 'INDIAN BANK', 1),
(19, 'INDIAN OVERSEAS BANK', 1),
(20, 'INDUSTRIAL DEVELOPMENT BANK OF INDIA', 1),
(21, 'ING VYSYA BANK', 1),
(22, 'KOTAK MAHINDRA BANK LTD', 1),
(23, 'KARNATAKA BANK', 1),
(24, 'KARUR VYSYA BANK LTD', 1),
(25, 'ORIENTAL BANK OF COMMERCE', 1),
(26, 'PUNJAB & SIND BANK', 1),
(27, 'PUNJAB NATIONAL BANK', 1),
(28, 'SONALI BANK', 1),
(29, 'STANDARD CHARTERED BANK', 1),
(30, 'STATE BANK OF BIKANER AND JAIPUR', 1),
(31, 'STATE BANK OF HYDERABAD', 1),
(32, 'STATE BANK OF INDIA', 1),
(33, 'STATE BANK OF MYSORE', 1),
(34, 'STATE BANK OF PATIALA', 1),
(35, 'STATE BANK OF TRAVANCORE', 1),
(36, 'SYNDICATE BANK', 1),
(37, 'THE HONGKONG & SHANGHAI BANKING CORPORATION LTD', 1),
(38, 'TAMILNAD MERCANTILE BANK LTD', 1),
(39, 'THE BANK OF RAJASTHAN LTD', 1),
(40, 'THE DHANALAKSHMI BANK LTD', 1),
(41, 'THE FEDERAL BANK LTD', 1),
(42, 'THE HDFC BANK LTD', 1),
(43, 'THE JAMMU & KASHMIR BANK LTD', 1),
(44, 'THE SOUTH INDIAN BANK LTD', 1),
(45, 'THE LAKSHMI VILAS BANK LTD', 1),
(46, 'UCO BANK', 1),
(47, 'UNION BANK OF INDIA', 1),
(48, 'UNITED BANK OF INDIA', 1),
(49, 'VIJAYA BANK', 1),
(50, 'YES BANK', 1),
(51, 'HDFC', 1),
(52, 'CENTRAL BANK OF INDIA', 1),
(53, 'SYNDICATE Bank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `binary_level`
--

CREATE TABLE IF NOT EXISTS `binary_level` (
  `id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `binary` text NOT NULL,
  `level` double NOT NULL,
  `level_binary` text NOT NULL,
  `level_level` double NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `binary_level`
--

INSERT INTO `binary_level` (`id`, `spid`, `binary`, `level`, `level_binary`, `level_level`, `datetime`) VALUES
(1, 'JJH0000001', '1', 0, '1', 0, '2019-11-29 06:00:13'),
(2, 'JJH127600', '1L', 1, '1LEG1', 1, '2019-11-29 08:42:13'),
(3, 'JJH514939', '1M', 1, '1LEG2', 1, '2019-11-29 08:51:18'),
(4, 'JJH698706', '1R', 1, '1LEG3', 1, '2019-11-29 08:52:00'),
(5, 'JJH586935', '1LL', 2, '1LEG4', 1, '2019-11-29 08:52:56'),
(6, 'JJH497391', '1ML', 2, '1LEG2LEG1', 2, '2019-11-29 08:56:32'),
(7, 'JJH850723', '1LM', 2, '1LEG5', 1, '2019-11-29 08:57:30'),
(8, 'JJH730956', '1LR', 2, '1LEG1LEG1', 2, '2019-11-29 08:58:41'),
(9, 'JJH238913', '1LLL', 3, '1LEG1LEG2', 2, '2019-11-29 08:59:28'),
(10, 'JJH5313610', '1MM', 2, '1LEG6', 1, '2019-11-29 09:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `company_address`
--

CREATE TABLE IF NOT EXISTS `company_address` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gst_no` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_address`
--

INSERT INTO `company_address` (`id`, `address`, `pincode`, `state`, `contact_no`, `email`, `com_name`, `url`, `gst_no`) VALUES
(1, '', '', '', '', 'info@jupiterjewelleryhub.com', 'JUPITER JEWELRY HUB', 'jupiterjewelleryhub.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_message`
--

CREATE TABLE IF NOT EXISTS `company_message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `spid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `st`) VALUES
(1, 'INDIA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=433 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `state_id`, `district_name`, `st`) VALUES
(1, 8, 'Gurugram', 1),
(2, 8, 'Rohtak', 1),
(3, 10, 'Jammu', 1),
(4, 1, 'Anantapur', 1),
(5, 1, 'Chittoor', 1),
(6, 1, 'Visakhapatnam', 1),
(7, 21, 'Amritsar', 1),
(8, 21, 'Ludhiana', 1),
(9, 21, 'Pathankot', 1),
(10, 8, 'Faridabad', 1),
(11, 8, 'Ambala', 1),
(12, 8, 'Panchkula', 1),
(13, 8, 'Kurukshetra', 1),
(14, 8, 'Rewari', 1),
(15, 8, 'Panipat', 1),
(16, 8, 'Sonipat', 1),
(17, 8, 'Sirsa', 1),
(18, 8, 'Bhiwani', 1),
(19, 8, 'Jhajjar', 1),
(20, 8, 'Jind', 1),
(21, 8, 'Kaithal', 1),
(22, 8, 'Yamunanagar', 1),
(23, 8, 'Palwal', 1),
(24, 8, 'Charkhi Dadri', 1),
(25, 8, 'Fatehabad', 1),
(26, 8, 'Mahendragarh', 1),
(27, 8, 'Karnal', 1),
(28, 8, 'Hisar', 1),
(29, 8, 'Nuh', 1),
(30, 21, 'Jalandhar', 1),
(31, 21, 'Patiala', 1),
(32, 21, 'Bathinda', 1),
(33, 21, 'Barnala', 1),
(34, 21, 'Faridkot', 1),
(35, 21, 'Fatehgarh Sahib', 1),
(36, 21, 'Firozpur', 1),
(37, 21, 'Fazilka', 1),
(38, 21, 'Gurdaspur', 1),
(39, 21, 'Hoshiarpur', 1),
(40, 21, 'Kapurthala', 1),
(41, 21, 'Mansa', 1),
(42, 1, 'East Godavari', 1),
(43, 21, 'Moga', 1),
(44, 21, 'Sri Muktsar Sahib', 1),
(45, 21, 'Rupnagar', 1),
(46, 21, 'Sahibzada Ajit Singh Nagar', 1),
(47, 21, 'Sangrur', 1),
(48, 21, 'Shahid Bhagat Singh Nagar', 1),
(49, 21, 'Taran Taran', 1),
(50, 9, 'Bilaspur', 1),
(51, 9, 'Chamba', 1),
(52, 9, 'Hamirpur', 1),
(53, 9, 'Kangra', 1),
(54, 9, 'Kinnaur', 1),
(55, 9, 'Kullu', 1),
(56, 9, 'Lahaul and Spiti', 1),
(57, 9, 'Mandi', 1),
(58, 9, 'Shimla', 1),
(59, 9, 'Sirmaur', 1),
(60, 9, 'Solan', 1),
(61, 9, 'Una', 1),
(62, 22, 'Ajmer', 1),
(63, 22, 'Alwar', 1),
(64, 22, 'Banswara', 1),
(65, 22, 'Baran', 1),
(66, 22, 'Barmer', 1),
(67, 22, 'Bharatpur', 1),
(68, 22, 'Bhilwara', 1),
(69, 22, 'Bikaner', 1),
(70, 22, 'Bundi', 1),
(71, 22, 'Chittorgarh', 1),
(72, 22, 'Churu', 1),
(73, 22, 'Dausa', 1),
(74, 22, 'Dholpur', 1),
(75, 22, 'Dungarpur', 1),
(76, 22, 'Hanumangarh', 1),
(77, 22, 'Jaipur', 1),
(78, 22, 'Jaisalmer', 1),
(79, 22, 'Jalor', 1),
(80, 22, 'Jhalawar', 1),
(81, 22, 'Jhunjhunu', 1),
(82, 22, 'Jodhpur', 1),
(83, 22, 'Karauli', 1),
(84, 22, 'Kota', 1),
(85, 22, 'Nagaur', 1),
(86, 22, 'Pali', 1),
(87, 22, 'Pratapgarh', 1),
(88, 22, 'Rajsamand', 1),
(89, 22, 'Sawai Madhopur', 1),
(90, 22, 'Sikar', 1),
(91, 22, 'Sirohi', 1),
(92, 22, 'Sri Ganganagar', 1),
(93, 22, 'Tonk', 1),
(94, 22, 'Udaipur', 1),
(95, 27, 'Agra', 1),
(96, 27, 'Firozabad', 1),
(97, 27, 'Mainpuri', 1),
(98, 27, 'Mathura', 1),
(99, 27, 'Aligarh', 1),
(100, 27, 'Etah', 1),
(101, 27, 'Hathras', 1),
(102, 27, 'Kasganj', 1),
(103, 27, 'Allahabaad', 1),
(104, 27, 'Kaushambi', 1),
(105, 27, 'Pratapgarh', 1),
(106, 27, 'Azamgarh', 1),
(107, 27, 'Ballia', 1),
(108, 27, 'Mau', 1),
(109, 27, 'Budaun', 1),
(110, 27, 'Bareilly', 1),
(111, 27, 'Pilibhit', 1),
(112, 27, 'Shahjahanpur', 1),
(113, 27, 'Basti', 1),
(114, 27, 'Sant Kabir Nagar', 1),
(115, 27, 'Siddharthnagar', 1),
(116, 27, 'Banda', 1),
(117, 27, 'Chitrakoot', 1),
(118, 27, 'Hamirpur', 1),
(119, 27, 'Mahoba', 1),
(120, 27, 'Bahraich', 1),
(121, 27, 'Balarampur', 1),
(122, 27, 'Gonda', 1),
(123, 27, 'Shravasti', 1),
(124, 27, 'Ambedkar Nagar', 1),
(125, 27, 'Amethi', 1),
(126, 27, 'Barabanki', 1),
(127, 27, 'Faizabad', 1),
(128, 27, 'Sultanpur', 1),
(129, 27, 'Deoria', 1),
(130, 27, 'Gorakhpur', 1),
(131, 27, 'Kushinagar', 1),
(132, 27, 'Maharajganj', 1),
(133, 27, 'Jalaun', 1),
(134, 27, 'Jhansi', 1),
(135, 27, 'Lalitpur', 1),
(136, 27, 'Auraiya', 1),
(137, 27, 'Etawah', 1),
(138, 27, 'Farrukhabad', 1),
(139, 27, 'Kannauj', 1),
(140, 27, 'Kanpur Dehat', 1),
(141, 27, 'Kanpur Nagar', 1),
(142, 27, 'Hardoi', 1),
(143, 27, 'Lakhimpur Kheri', 1),
(144, 27, 'Lucknow', 1),
(145, 27, 'Raebareli', 1),
(146, 27, 'Sitapur', 1),
(147, 27, 'Unnao', 1),
(148, 27, 'Bagpat', 1),
(149, 27, 'Bulandshahr', 1),
(150, 27, ' Gautam Buddha Nagar', 1),
(151, 27, 'Ghaziabad', 1),
(152, 27, 'Hapur', 1),
(153, 27, 'Meerut', 1),
(154, 27, 'Mirzapur', 1),
(155, 27, 'Sant Ravidas Nagar', 1),
(156, 27, 'Sonbhadra', 1),
(157, 27, 'Amroha', 1),
(158, 27, 'Bijnor', 1),
(159, 27, 'Moradabad', 1),
(160, 27, 'Rampur', 1),
(161, 27, 'Sambhal', 1),
(162, 27, 'Muzaffarnagar', 1),
(163, 27, 'Saharanpur', 1),
(164, 27, 'Shamli', 1),
(165, 27, 'Chandauli', 1),
(166, 27, 'Ghazipur', 1),
(167, 27, 'Jaunpur', 1),
(168, 27, 'Varanasi', 1),
(169, 3, 'Baksa', 1),
(170, 3, 'Barpeta', 1),
(171, 3, 'Biswanath', 1),
(172, 3, 'Bongaigaon', 1),
(173, 3, 'Cachar', 1),
(174, 3, 'Charaideo', 1),
(175, 3, 'Chirang', 1),
(176, 3, 'Darrang', 1),
(177, 3, 'Dhemaji', 1),
(178, 3, 'Dhubri', 1),
(179, 3, 'Dibrugarh', 1),
(180, 3, 'Goalpara', 1),
(181, 3, 'Golaghat', 1),
(182, 3, 'Hailakandi', 1),
(183, 3, 'Hojai', 1),
(184, 3, 'Jorhat', 1),
(185, 3, 'Kamrup Metropolitan', 1),
(186, 3, 'Kamrup Metropolitan  Guwahati', 1),
(187, 3, 'Kamrup', 1),
(188, 3, 'Karbi Anglong', 1),
(189, 3, 'Karimganj', 1),
(190, 3, 'Kokrajhar', 1),
(191, 3, 'Lakhimpur', 1),
(192, 3, 'Majuli', 1),
(193, 3, 'Morigaon', 1),
(194, 3, 'Nagaon', 1),
(195, 3, 'Nalbari', 1),
(196, 3, 'Dima Hasao', 1),
(197, 3, 'Sivasagar', 1),
(198, 3, 'Sonitpur', 1),
(199, 3, 'South Salmara-Mankachar', 1),
(200, 3, 'Tinsukia', 1),
(201, 3, 'Udalguri', 1),
(202, 3, 'West Karbi Anglong', 1),
(203, 4, 'Bhagalpur', 1),
(204, 4, 'Purnea', 1),
(205, 4, 'Araria', 1),
(206, 4, 'Arwal', 1),
(207, 4, 'Aurangabad', 1),
(208, 4, 'Banka', 1),
(209, 4, 'Begusarai', 1),
(210, 4, 'Bhabhua', 1),
(211, 4, 'Bhojpur', 1),
(212, 4, 'Buxar', 1),
(213, 4, 'Darbhanga', 1),
(214, 4, 'East Champaran', 1),
(215, 4, 'Gaya', 1),
(216, 4, 'Gopalganj', 1),
(217, 4, 'Jamui', 1),
(218, 4, 'Jehanabad', 1),
(219, 4, 'Katihar', 1),
(220, 4, 'Khagaria', 1),
(221, 4, 'Kishanganj', 1),
(222, 4, 'Lakhisarai', 1),
(223, 4, 'Madhepura', 1),
(224, 4, 'Madhubani', 1),
(225, 4, 'Monghyr', 1),
(226, 4, 'Muzaffarpur', 1),
(227, 4, 'Nalanda', 1),
(228, 4, 'Nawada', 1),
(229, 4, 'Patna', 1),
(230, 4, 'Rohtas', 1),
(231, 4, 'Saharsa', 1),
(232, 4, 'Samastipur', 1),
(233, 4, 'Saran', 1),
(234, 4, 'Sheikhpura', 1),
(235, 4, 'Sheohar', 1),
(236, 4, 'Sitamarhi', 1),
(237, 4, 'Siwan', 1),
(238, 4, 'Supaul', 1),
(239, 4, 'Vaishali', 1),
(240, 4, 'West Champaran', 1),
(241, 4, 'Latehar', 1),
(242, 4, 'bhagalpur', 1),
(243, 4, 'bhagalpur', 1),
(244, 14, 'Raisen district', 1),
(245, 14, 'Rajgarh district', 1),
(246, 14, 'Sehore district', 1),
(247, 14, 'Vidisha district', 1),
(248, 14, 'Morena district', 1),
(249, 14, 'Sheopur district', 1),
(250, 14, 'Bhind district', 1),
(251, 14, 'Gwalior district', 1),
(252, 14, 'Ashoknagar district', 1),
(253, 14, 'Shivpuri district', 1),
(254, 14, 'Datia district', 1),
(255, 14, 'Guna district', 1),
(256, 14, 'Alirajpur district', 1),
(257, 14, 'Barwani district', 1),
(258, 14, 'Indore district', 1),
(259, 14, 'Dhar bc', 1),
(260, 14, 'Jhabua district', 1),
(261, 14, 'Khandwa district', 1),
(262, 14, 'Khargone district', 1),
(263, 14, 'Burhanpur district', 1),
(264, 14, 'Balaghat district', 1),
(265, 14, 'Chhindwara district', 1),
(266, 14, 'Jabalpur district', 1),
(267, 14, 'Katni district', 1),
(268, 14, 'Mandla district', 1),
(269, 14, 'Narsinghpur district', 1),
(270, 14, 'Seoni district', 1),
(271, 14, 'Betul district', 1),
(272, 14, 'Harda district', 1),
(273, 14, 'Hoshangabad district', 1),
(274, 14, 'Rewa district', 1),
(275, 14, 'Satna district', 1),
(276, 14, 'Sidhi district', 1),
(277, 14, 'Singrauli district', 1),
(278, 14, 'Chhatarpur district', 1),
(279, 14, 'Damoh district', 1),
(280, 14, 'Panna district', 1),
(281, 14, 'Sagar district', 1),
(282, 14, 'Tikamgarh district', 1),
(283, 14, 'Anuppur district', 1),
(284, 14, 'Shahdol district', 1),
(285, 14, 'Umaria district', 1),
(286, 14, 'Dindori district', 1),
(287, 14, 'Agar Malwa district', 1),
(288, 14, 'Dewas district', 1),
(289, 14, 'Mandsaur district', 1),
(290, 14, 'Neemuch district', 1),
(291, 14, 'Ratlam district', 1),
(292, 14, 'Shajapur district', 1),
(293, 14, 'Ujjain district', 1),
(294, 7, 'Ahmedabad', 1),
(295, 7, 'Amreli', 1),
(296, 7, 'Anand', 1),
(297, 7, 'Aravalli  (Modasa)', 1),
(298, 7, 'Banaskantha (Palanpur)', 1),
(299, 7, 'Bharuch', 1),
(300, 7, 'Bhavnagar', 1),
(301, 7, 'Botad', 1),
(302, 7, 'Chhota Udaipur', 1),
(303, 7, 'Dahod', 1),
(304, 7, 'Dang (Ahwa)', 1),
(305, 7, 'Devbhoomi Dwarka (Khambhalia)', 1),
(306, 7, 'Gandhinagar', 1),
(307, 7, 'Gir Somnath (Veraval)', 1),
(308, 7, 'Jamnagar', 1),
(309, 7, 'Junagadh', 1),
(310, 7, 'Kutch (Bhuj)', 1),
(311, 7, 'Kheda (Nadiad)', 1),
(312, 7, 'Mahisagar (Lunavada)', 1),
(313, 7, 'Mehsana', 1),
(314, 7, 'Morbi', 1),
(315, 7, 'Narmada (Rajpipla)', 1),
(316, 7, 'Navsari', 1),
(317, 7, 'Panchmahal (Godhra)', 1),
(318, 7, 'Patan', 1),
(319, 7, 'Porbandar', 1),
(320, 7, 'Rajkot', 1),
(321, 7, 'Sabarkantha (Himmatnagar)', 1),
(322, 7, 'Surat', 1),
(323, 7, 'Surendranagar', 1),
(324, 7, 'Tapi (Vyara)', 1),
(325, 7, 'Vadodara', 1),
(326, 7, 'Valsad', 1),
(327, 11, 'Garhwa', 1),
(328, 11, 'Palamu', 1),
(329, 11, 'Chatra', 1),
(330, 11, 'Hazaribagh', 1),
(331, 11, 'Koderma', 1),
(332, 11, 'Giridih', 1),
(333, 11, 'Ramgarh', 1),
(334, 11, 'Bokaro', 1),
(335, 11, 'Dhanbad', 1),
(336, 11, 'Lohardaga', 1),
(337, 11, 'Gumla', 1),
(338, 11, 'Simdega', 1),
(339, 11, 'Ranchi', 1),
(340, 11, 'Khunti', 1),
(341, 11, ' West Singhbhum', 1),
(342, 11, 'Saraikela Kharsawan', 1),
(343, 11, 'East Singhbhum', 1),
(344, 11, 'Jamtara', 1),
(345, 11, 'Deoghar', 1),
(346, 11, 'Dumka', 1),
(347, 11, 'Pakur', 1),
(348, 11, 'Godda', 1),
(349, 11, 'Sahebganj', 1),
(350, 29, 'Alipurduar', 1),
(351, 29, 'Bankura', 1),
(352, 29, 'Paschim Bardhaman', 1),
(353, 29, 'Purba Bardhaman', 1),
(354, 29, 'Birbhum', 1),
(355, 29, 'Cooch Behar', 1),
(356, 29, 'Darjeeling', 1),
(357, 29, 'Uttar Dinajpur', 1),
(358, 29, 'Dakshin Dinajpur', 1),
(359, 29, 'Hooghly', 1),
(360, 29, 'Howrah', 1),
(361, 29, 'Jalpaiguri', 1),
(362, 29, 'Jhargram', 1),
(363, 29, 'Kolkata', 1),
(364, 29, 'Kalimpong', 1),
(365, 29, 'Malda', 1),
(366, 29, 'Paschim Medinipur', 1),
(367, 29, 'Purba Medinipur', 1),
(368, 29, 'Murshidabad', 1),
(369, 29, 'Nadia', 1),
(370, 29, 'North 24 Parganas', 1),
(371, 29, 'South 24 Parganas', 1),
(372, 29, 'Purulia', 1),
(373, 20, 'BARGARH', 1),
(374, 20, 'Angul', 1),
(375, 20, 'Baudh', 1),
(376, 20, 'Balangir', 1),
(377, 20, 'Balasore-(Baleswar)', 1),
(378, 20, 'Bhadrak', 1),
(379, 20, 'Cuttack', 1),
(380, 20, 'Debagarh (Deogarh)', 1),
(381, 20, 'Dhenkanal', 1),
(382, 20, 'Ganjam', 1),
(383, 20, 'Gajapati', 1),
(384, 20, 'Jharsuguda', 1),
(385, 20, 'Jajpur', 1),
(386, 20, 'Jagatsinghapur', 1),
(387, 20, 'Khordha', 1),
(388, 20, 'Kendujhar (Keonjhar)', 1),
(389, 20, 'Kalahandi', 1),
(390, 20, 'Kandhamal', 1),
(391, 20, 'Koraput', 1),
(392, 20, 'Kendrapara', 1),
(393, 20, 'Malkangiri', 1),
(394, 20, 'Mayurbhanj', 1),
(395, 20, 'Nabarangpur', 1),
(396, 20, 'Nuapada', 1),
(397, 20, 'Nayagarh', 1),
(398, 20, 'Puri', 1),
(399, 20, 'Rayagada', 1),
(400, 20, 'Sambalpur', 1),
(401, 20, 'Subarnapur (Sonepur)', 1),
(402, 20, 'Sundergarh', 1),
(403, 5, 'Balod', 1),
(404, 5, 'Baloda Bazar', 1),
(405, 5, 'Balrampur', 1),
(406, 5, 'Bastar (Jagdalpur)', 1),
(407, 5, 'Bemetara', 1),
(408, 5, 'Bijapur', 1),
(409, 5, 'Bilaspur', 1),
(410, 5, 'Dantewada', 1),
(411, 5, 'Dhamtari', 1),
(412, 5, 'Durg', 1),
(413, 5, 'Gariaband', 1),
(414, 5, 'Janjgir-Champa', 1),
(415, 5, 'jashpur', 1),
(416, 5, 'Kabirdham (Kawardha)', 1),
(417, 5, 'Kanker', 1),
(418, 5, 'Kondagaon', 1),
(419, 5, 'Korba', 1),
(420, 5, 'Koriya (Baikunthpur)', 1),
(421, 5, 'Mahasamund', 1),
(422, 5, 'Mungeli', 1),
(423, 5, 'Narayanpur', 1),
(424, 5, 'Raigarh', 1),
(425, 5, 'Raipur', 1),
(426, 5, 'Rajnandgaon', 1),
(427, 5, 'Sukma', 1),
(428, 5, 'Surajpur', 1),
(429, 5, 'Surguja (Ambikapur)', 1),
(430, 6, 'North Goa (Panaji)', 1),
(431, 6, 'South Goa (Margao)', 1),
(432, 30, 'Delhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `e-pin`
--

CREATE TABLE IF NOT EXISTS `e-pin` (
  `id` int(11) NOT NULL,
  `generatedid` varchar(100) NOT NULL,
  `senderid` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `useddate` date NOT NULL,
  `memtransid` varchar(100) NOT NULL,
  `memberusedid` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `transfer` varchar(100) NOT NULL,
  `pin_type` varchar(100) NOT NULL DEFAULT 'member',
  `status` int(11) NOT NULL DEFAULT '1',
  `transfer_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_code` varchar(20) NOT NULL,
  `employee_pwd` varchar(50) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_father` varchar(100) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_sex` varchar(10) NOT NULL,
  `employee_dob` varchar(30) NOT NULL,
  `employee_mobile` varchar(10) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_address` text NOT NULL,
  `employee_pincode` varchar(50) NOT NULL,
  `employee_landmark` varchar(200) NOT NULL,
  `employee_ps` varchar(200) NOT NULL,
  `employee_po` varchar(200) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `bank_accno` varchar(100) NOT NULL,
  `bank_ifsc` varchar(100) NOT NULL,
  `employee_salary` double NOT NULL,
  `employee_pan` varchar(20) NOT NULL,
  `idProof_id` int(5) NOT NULL,
  `addressProof_id` int(5) NOT NULL,
  `employee_picture` text NOT NULL,
  `employee_biometric` text NOT NULL,
  `remarks` text NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `delete_time` datetime NOT NULL,
  `delete_by` int(11) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1',
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epin_payment`
--

CREATE TABLE IF NOT EXISTS `epin_payment` (
  `epin_payment_id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `dd_chq_no` varchar(100) NOT NULL,
  `epin_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epin_transfer`
--

CREATE TABLE IF NOT EXISTS `epin_transfer` (
  `transfer_id` int(11) NOT NULL,
  `trans_by` varchar(30) NOT NULL,
  `spid` varchar(50) NOT NULL,
  `package_id` int(3) NOT NULL,
  `pin_no` double NOT NULL,
  `trans_date` date NOT NULL,
  `userid` int(11) NOT NULL,
  `pin_amount` double NOT NULL,
  `tds` double NOT NULL,
  `admin` double NOT NULL,
  `gen_type` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ewallet`
--

CREATE TABLE IF NOT EXISTS `ewallet` (
  `id` int(11) NOT NULL,
  `spid` varchar(200) NOT NULL,
  `total_amt` float NOT NULL,
  `rest_amt` float NOT NULL,
  `pin` int(11) NOT NULL,
  `send_transfer_amt` int(11) NOT NULL,
  `get_transfer_amt` int(11) NOT NULL,
  `paid_amt` int(11) NOT NULL,
  `repurchase_amt` double NOT NULL,
  `withdrawal` double NOT NULL,
  `withdrawal_chg` double NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewallet`
--

INSERT INTO `ewallet` (`id`, `spid`, `total_amt`, `rest_amt`, `pin`, `send_transfer_amt`, `get_transfer_amt`, `paid_amt`, `repurchase_amt`, `withdrawal`, `withdrawal_chg`, `time`) VALUES
(1, 'JJH0000001', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(2, 'JJH127600', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575016933'),
(3, 'JJH514939', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017478'),
(4, 'JJH698706', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017520'),
(5, 'JJH586935', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017576'),
(6, 'JJH497391', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017792'),
(7, 'JJH850723', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017850'),
(8, 'JJH730956', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017921'),
(9, 'JJH238913', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575017968'),
(10, 'JJH5313610', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1575018078');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(200) NOT NULL,
  `link_icon` varchar(200) NOT NULL,
  `order_by` int(2) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`link_id`, `link_name`, `link_icon`, `order_by`, `st`) VALUES
(1, 'PACKAGE', '', 1, 0),
(2, 'REGISTRATION', '', 2, 1),
(3, 'MEMBER', '', 3, 1),
(4, 'EMPLOYEE', '', 4, 0),
(5, 'GENEALOGY', '', 6, 1),
(6, 'E-WALLET', '', 7, 1),
(7, 'WITHDRAWL', '', 8, 1),
(8, 'MESSAGE', '', 9, 1),
(9, 'PAYOUT', '', 10, 0),
(10, 'REWARD', '', 11, 0),
(11, 'OTHERS', '', 12, 0),
(13, 'SETTINGS', '', 13, 1),
(15, 'COUPON', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `memid` int(11) NOT NULL,
  `spid` varchar(30) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `mem_type` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `sponsorid` varchar(100) NOT NULL,
  `parentspid` varchar(200) NOT NULL,
  `leg` varchar(20) NOT NULL,
  `doj` date NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `time` varchar(200) NOT NULL,
  `country_code` int(11) NOT NULL,
  `mob` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `address1` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(200) NOT NULL,
  `dist` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `aadhar` varchar(50) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `nominee_name` varchar(100) NOT NULL,
  `nominee_rel` varchar(100) NOT NULL,
  `acc_type` varchar(100) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_id` int(3) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `acc_no` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `trans_password` varchar(100) NOT NULL,
  `epin_password` varchar(100) NOT NULL,
  `st` int(11) NOT NULL DEFAULT '1',
  `member_status` int(1) NOT NULL DEFAULT '0',
  `paytm` varchar(30) NOT NULL,
  `bitcoin_address` text NOT NULL,
  `admin_join` int(1) NOT NULL DEFAULT '0',
  `update_dt` date NOT NULL,
  `package_id` int(3) NOT NULL,
  `district_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `stock_panel_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL DEFAULT '0',
  `adhaar_image` text NOT NULL,
  `pan_image` text NOT NULL,
  `cheque_image` text NOT NULL,
  `member_image` text NOT NULL,
  `aadhar_st` int(1) NOT NULL DEFAULT '0',
  `pan_st` int(1) NOT NULL DEFAULT '0',
  `bank_st` int(1) NOT NULL DEFAULT '0',
  `aadhar_updt` int(1) NOT NULL DEFAULT '0',
  `pan_updt` int(1) NOT NULL DEFAULT '0',
  `bank_updt` int(1) NOT NULL DEFAULT '0',
  `kyc_status` int(1) NOT NULL DEFAULT '0',
  `kyc_updt` int(1) NOT NULL DEFAULT '0',
  `kyc_approve_dt` date NOT NULL,
  `join_time` datetime NOT NULL,
  `level` int(11) NOT NULL,
  `binary` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memid`, `spid`, `sname`, `mem_type`, `pass`, `sponsorid`, `parentspid`, `leg`, `doj`, `fname`, `mother_name`, `dob`, `time`, `country_code`, `mob`, `email`, `sex`, `addr`, `address1`, `country`, `state`, `dist`, `city`, `pincode`, `aadhar`, `pan`, `nominee_name`, `nominee_rel`, `acc_type`, `account_name`, `bank_id`, `branch`, `acc_no`, `ifsc_code`, `trans_password`, `epin_password`, `st`, `member_status`, `paytm`, `bitcoin_address`, `admin_join`, `update_dt`, `package_id`, `district_id`, `userid`, `stock_panel_id`, `rank_id`, `adhaar_image`, `pan_image`, `cheque_image`, `member_image`, `aadhar_st`, `pan_st`, `bank_st`, `aadhar_updt`, `pan_updt`, `bank_updt`, `kyc_status`, `kyc_updt`, `kyc_approve_dt`, `join_time`, `level`, `binary`) VALUES
(1, 'JJH0000001', 'JUPITER', '', '12345', '', '', '', '2019-11-29', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '266666666666', '1144515511', '', '', 'Savings Account', 'DDDDD', 12, 'SBI', '3221907444884', '5151551', '12345', '12345', 1, 0, '', '', 0, '0000-00-00', 0, 0, 0, 0, 0, 'server.png', 'logo.png', 'logo.jpg', 'WhatsApp Image 2019-11-08 at 09.17.39.jpeg', 1, 1, 1, 0, 0, 0, 0, 1, '0000-00-00', '2019-11-29 00:00:00', 0, '1'),
(2, 'JJH127600', 'DER RRR', '', '12345', 'JJH0000001', 'JJH0000001', 'L', '2019-11-29', '', '', '', '1575016933', 0, '8999999999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DER RRR', 0, '', '', '', 'RSG8VJ', 'ZJLVA1', 1, 0, '', '', 1, '0000-00-00', 0, 363, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:12:13', 1, '1L'),
(3, 'JJH514939', 'Rafi', '', '12345', 'JJH0000001', 'JJH0000001', 'M', '2019-11-29', '', '', '', '1575017478', 0, '8555555555', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Rafi', 0, '', '', '', 'NFPQG3', '4Q1YKU', 1, 0, '', '', 1, '0000-00-00', 0, 363, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:21:18', 1, '1M'),
(4, 'JJH698706', 'Rafi', '', '12345', 'JJH0000001', 'JJH0000001', 'R', '2019-11-29', '', '', '', '1575017520', 0, '8555555555', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Rafi', 0, '', '', '', '5S7AL3', 'WBYGVZ', 1, 0, '', '', 1, '0000-00-00', 0, 363, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:22:00', 1, '1R'),
(5, 'JJH586935', 'DEV', '', '12345', 'JJH0000001', 'JJH127600', 'L', '2019-11-29', '', '', '', '1575017576', 0, '5999999999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DEV', 0, '', '', '', 'G7FU1J', 'TSBM9F', 1, 0, '', '', 1, '0000-00-00', 0, 364, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:22:56', 2, '1LL'),
(6, 'JJH497391', 'Sourav', '', '12345', 'JJH514939', 'JJH514939', 'L', '2019-11-29', '', '', '', '1575017792', 0, '8444444444', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sourav', 0, '', '', '', '3M5219', 'F9H5EU', 1, 0, '', '', 1, '0000-00-00', 0, 406, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:26:32', 2, '1ML'),
(7, 'JJH850723', 'Surat', '', '12345', 'JJH0000001', 'JJH127600', 'M', '2019-11-29', '', '', '', '1575017850', 0, '5999999999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Surat', 0, '', '', '', 'QF8VH5', '2QGV4L', 1, 0, '', '', 1, '0000-00-00', 0, 408, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:27:30', 2, '1LM'),
(8, 'JJH730956', 'VBER', '', '12345', 'JJH127600', 'JJH127600', 'R', '2019-11-29', '', '', '', '1575017921', 0, '9555555555', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VBER', 0, '', '', '', '8NDF2M', 'WJ4BZA', 1, 0, '', '', 1, '0000-00-00', 0, 406, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:28:41', 2, '1LR'),
(9, 'JJH238913', 'VBER', '', '12345', 'JJH127600', 'JJH586935', 'L', '2019-11-29', '', '', '', '1575017968', 0, '9555555555', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VBER', 0, '', '', '', '9QSPCY', 'DGZKPU', 1, 0, '', '', 1, '0000-00-00', 0, 173, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:29:28', 3, '1LLL'),
(10, 'JJH5313610', 'RAJA', '', '12345', 'JJH0000001', 'JJH514939', 'M', '2019-11-29', '', '', '', '1575018078', 0, '4888888888', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'RAJA', 0, '', '', '', 'X39AFL', '35XTMC', 1, 0, '', '', 1, '0000-00-00', 0, 170, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2019-11-29 14:31:18', 2, '1MM');

-- --------------------------------------------------------

--
-- Table structure for table `memberpair`
--

CREATE TABLE IF NOT EXISTS `memberpair` (
  `id` int(10) NOT NULL,
  `spid` varchar(30) NOT NULL,
  `pair` double NOT NULL,
  `left_side` double NOT NULL,
  `right_side` double NOT NULL,
  `middle` double NOT NULL,
  `deduct_pair` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberpair`
--

INSERT INTO `memberpair` (`id`, `spid`, `pair`, `left_side`, `right_side`, `middle`, `deduct_pair`) VALUES
(1, 'JJH0000001', 0, 0, 0, 0, 0),
(2, 'JJH127600', 0, 0, 0, 0, 0),
(3, 'JJH514939', 0, 0, 0, 0, 0),
(4, 'JJH698706', 0, 0, 0, 0, 0),
(5, 'JJH586935', 0, 0, 0, 0, 0),
(6, 'JJH497391', 0, 0, 0, 0, 0),
(7, 'JJH850723', 0, 0, 0, 0, 0),
(8, 'JJH730956', 0, 0, 0, 0, 0),
(9, 'JJH238913', 0, 0, 0, 0, 0),
(10, 'JJH5313610', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_login`
--

CREATE TABLE IF NOT EXISTS `member_login` (
  `member_login_id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_login`
--

INSERT INTO `member_login` (`member_login_id`, `spid`, `login_date`, `login_time`) VALUES
(1, 'ZB983133', '2019-09-26', ''),
(2, 'ZB0000001', '2019-09-27', ''),
(3, 'ZB0000001', '2019-09-27', ''),
(4, 'ZB0000001', '2019-09-28', ''),
(5, 'ZB0000001', '2019-10-01', ''),
(6, 'YM0000001', '2019-11-25', ''),
(7, 'YM0000001', '2019-11-25', ''),
(8, 'JJH0000001', '2019-11-29', ''),
(9, 'JJH0000001', '2019-11-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_message`
--

CREATE TABLE IF NOT EXISTS `member_message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `spid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_topup`
--

CREATE TABLE IF NOT EXISTS `member_topup` (
  `member_topup_id` int(11) NOT NULL,
  `spid` varchar(50) NOT NULL,
  `package_id` int(11) NOT NULL,
  `topup_dt` date NOT NULL,
  `topup_dt_time` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `news` text NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_pv` double NOT NULL,
  `package_unit` double NOT NULL,
  `package_amount` double NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_pv`, `package_unit`, `package_amount`, `st`) VALUES
(1, 'BRONZE PACKAGE', 50, 1, 2000, 1),
(2, 'SILVER PACKAGE', 125, 3, 5000, 1),
(3, 'GOLD PACKAGE', 250, 7, 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pin_request`
--

CREATE TABLE IF NOT EXISTS `pin_request` (
  `pin_id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL,
  `no_of_pin_req` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `approvedate` date NOT NULL,
  `st` int(11) NOT NULL DEFAULT '1',
  `epin_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `short_code` varchar(20) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `short_code`, `state_name`, `st`) VALUES
(1, 1, 'APD', 'Andhra Pradesh', 1),
(2, 1, 'ARD', 'Arunachal Pradesh', 1),
(3, 1, 'ASD', 'Assam', 1),
(4, 1, 'BRD', 'Bihar', 1),
(5, 1, 'CGD', 'Chhattisgarh', 1),
(6, 1, 'GAD', 'Goa', 1),
(7, 1, 'GTD', 'Gujarat', 1),
(8, 1, 'HRD', 'Haryana', 1),
(9, 1, 'HPD', 'Himachal Pradesh', 1),
(10, 1, 'JKD', 'Jammu and Kashmir', 1),
(11, 1, 'JHD', 'Jharkhand', 1),
(12, 1, 'KAD', 'Karnataka', 1),
(13, 1, 'KLD', 'Kerala', 1),
(14, 1, 'MPD', 'Madhya Pradesh', 1),
(15, 1, 'MHD', 'Maharashtra', 1),
(16, 1, 'MND', 'Manipur', 1),
(17, 1, 'MLD', 'Meghalaya', 1),
(18, 1, 'MZD', 'Mizoram', 1),
(19, 1, 'NLD', 'Nagaland', 1),
(20, 1, 'ODD', 'Odisha', 1),
(21, 1, 'PBD', 'Punjab', 1),
(22, 1, 'RJD', 'Rajasthan', 1),
(23, 1, 'SKD', 'Sikkim', 1),
(24, 1, 'TND', 'Tamil Nadu', 1),
(25, 1, 'TSD', 'Telangana', 1),
(26, 1, 'TSD', 'Tripura', 1),
(27, 1, 'UPD', 'Uttar Pradesh', 1),
(28, 1, 'UKD', 'Uttarakhand', 1),
(29, 1, 'WBD', 'West Bengal', 1),
(30, 1, 'NCR', 'Delhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sublink`
--

CREATE TABLE IF NOT EXISTS `sublink` (
  `sublink_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `sublink_name` varchar(100) NOT NULL,
  `sub_url` varchar(100) NOT NULL,
  `edit_del` int(1) NOT NULL,
  `st` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sublink`
--

INSERT INTO `sublink` (`sublink_id`, `link_id`, `sublink_name`, `sub_url`, `edit_del`, `st`) VALUES
(1, 1, 'Package Details', 'package.php', 0, 1),
(2, 1, 'Create E-Pin', 'e_pin.php', 0, 1),
(3, 1, 'E-Pin Transfer', 'e_pin_transfer.php', 0, 1),
(4, 5, 'Direct Member', 'direct_member.php', 0, 1),
(5, 1, 'Used E-Pin', 'used_epin.php', 0, 1),
(6, 1, 'UnUsed E-Pin', 'unused_epin.php', 0, 1),
(7, 1, 'Show All InActive Farmer', 'farmer_inactive.php', 0, 0),
(8, 1, 'Farmer Search', 'farmer_search.php', 0, 0),
(9, 2, 'Add Product', 'add_product.php', 0, 0),
(14, 4, 'Add Employee', 'add_employee.php', 0, 1),
(15, 4, 'Employee Details', 'employee_report.php', 0, 1),
(16, 11, 'Percentage settings', 'percentage_setting.php\r\n', 0, 0),
(17, 2, 'Join Now', 'joining.php', 0, 1),
(18, 5, 'Downline Member', 'downline_member.php', 0, 1),
(19, 6, 'Ewallet Details', 'ewallet_details.php', 0, 1),
(20, 6, 'Ewallet Credit', 'ewallet_credit.php', 0, 1),
(21, 6, 'Ewallet Credit Details', 'ewallet_credit_dtls.php', 0, 1),
(22, 6, 'Ewallet Debit', 'ewallet_debit.php', 0, 1),
(23, 7, 'Pending Withdrawal', 'pending_withdrawal.php', 0, 1),
(25, 8, 'Inbox', 'inbox_messages.php', 0, 1),
(26, 8, 'Compose Messages', 'compose_messages.php', 0, 1),
(27, 8, 'Compose Messages To All', 'compose_messages_all.php', 0, 1),
(28, 9, 'Generate Payout', 'generate_payout.php', 0, 0),
(29, 9, 'Show Daily Income', 'show_payout.php', 0, 1),
(30, 11, 'Change Password', 'change_pass.php', 0, 0),
(31, 11, 'Company Details', 'company_details.php', 0, 0),
(32, 10, 'Generate Reward', 'gen_reward.php', 0, 0),
(33, 10, 'Show Reward By Id', 'show_reward2.php', 0, 1),
(34, 10, 'Show Reward By Date', 'show_all_reward.php', 0, 1),
(36, 3, 'All UnBlock Member', 'allmember.php', 0, 1),
(37, 12, 'Booster Counter', 'booster_counter.php', 0, 1),
(38, 7, 'Approve Withdrawal Details', 'withdrawal_dtls.php', 0, 1),
(39, 2, 'TopUp Package', 'top_up.php', 0, 0),
(40, 5, 'Supplier Details', 'supplier_details.php', 0, 0),
(41, 13, 'Country', 'country.php', 0, 1),
(42, 13, 'State', 'state.php', 0, 1),
(43, 3, 'All Block Member', 'allmember1.php', 0, 1),
(44, 3, 'Member Search', 'member_search.php', 0, 1),
(45, 2, 'Re TopUp Package', 'retop_up.php', 0, 0),
(46, 2, 'Sell Order Date Search', 'sell_order_search_date.php', 0, 0),
(47, 3, 'Password Details', 'password_search.php', 0, 1),
(48, 5, 'Level Tree', 'level_member.php', 0, 1),
(49, 11, 'Contact Us', 'contact_us.php', 0, 1),
(51, 13, 'District', 'district.php', 0, 1),
(53, 7, 'Xlsx Format', 'export_withdrawl.php', 0, 1),
(54, 7, 'Approve Withdrawal Xlsx', 'approve_date_search.php', 0, 1),
(55, 3, 'Join Report', 'search_by_dt.php', 0, 1),
(56, 3, 'Xlsx Format', 'export_allmember.php', 0, 0),
(57, 8, 'Sent Messages', 'sent_messages.php', 0, 1),
(58, 3, 'GST Calculate', 'gst_calculation.php', 0, 0),
(59, 9, 'Show Weekly Payout', 'show_all_payout.php', 0, 1),
(60, 9, 'Show All Director Payout', 'show_all_payout1.php', 0, 0),
(61, 11, 'Slider Image', 'firstslideshow.php', 0, 1),
(62, 1, 'Company Account', 'company_account.php', 0, 0),
(63, 1, 'Company Account Details', 'company_account_details.php', 0, 0),
(64, 10, 'Payment', 'payment.php', 0, 0),
(65, 10, 'Receipt', 'receipt.php', 0, 0),
(66, 10, 'Show Transaction', 'show_transaction.php', 0, 0),
(67, 10, 'Show Transaction By Date', 'show_transaction_by_date.php', 0, 0),
(68, 10, 'Search By Ref Doc No.', 'search_by_voucher.php', 0, 0),
(69, 10, 'Search By Name', 'search_by_name.php', 0, 0),
(70, 2, 'TopUp Report', 'topup_dtls.php', 0, 1),
(71, 2, 'TopUp Report Xlsx', 'top_search.php', 0, 0),
(72, 3, 'Welcome Letter', 'welcome_letter.php', 0, 1),
(73, 5, 'Binary Tree', 'binary_tree.php', 0, 1),
(74, 5, 'Left Right Details', 'left_right.php', 0, 0),
(75, 7, 'Xlsx Format For Bank', 'approve_bank_search.php', 0, 1),
(76, 11, 'Show Image', 'show_first_img.php', 0, 1),
(77, 13, 'Set Company Details', 'company_details.php', 0, 1),
(78, 13, 'State', 'state.php', 0, 0),
(79, 13, 'Set Amount Rate', 'amount_rate.php', 0, 1),
(80, 13, 'Change Password', 'changepass.php', 0, 1),
(81, 13, 'Product', 'product.php', 0, 0),
(82, 13, 'Slider', 'slider.php', 0, 0),
(83, 13, 'Gallery', 'addgallery.php', 0, 0),
(84, 13, 'News', 'add_news.php', 0, 1),
(85, 4, 'Authentication', 'employee_right.php', 0, 1),
(86, 4, 'Change Password', 'employee_password.php', 0, 1),
(87, 3, 'Send SMS', 'send_sms.php', 0, 0),
(88, 4, 'Add Designation', 'add_designation.php', 0, 1),
(89, 6, 'Ewallet Debit Details', 'ewallet_debit_dtls.php', 0, 1),
(90, 10, 'Reward Show By Date', 'showreward1.php', 0, 1),
(91, 3, 'Uploaded KYC', 'pending_kyc.php', 0, 1),
(92, 3, 'Approved KYC', 'approve_kyc.php', 0, 1),
(93, 15, 'Coupon Transfer', 'coupon_transfer.php', 0, 1),
(94, 15, 'Coupon Transfer Details', 'coupon_transfer_details.php', 0, 1),
(95, 15, 'Coupon Search', 'coupon_search.php', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_details`
--

CREATE TABLE IF NOT EXISTS `transfer_details` (
  `id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `transfer_id` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_dt` date NOT NULL,
  `transfer_mode` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE IF NOT EXISTS `withdrawal` (
  `with_d_id` int(11) NOT NULL,
  `spid` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `cutting_amt` double NOT NULL,
  `tds` double NOT NULL,
  `sc` double NOT NULL,
  `apply_dt` date NOT NULL,
  `status_dt` date NOT NULL,
  `status` int(1) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievers`
--
ALTER TABLE `achievers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `amount_rate`
--
ALTER TABLE `amount_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authenticate_status`
--
ALTER TABLE `authenticate_status`
  ADD PRIMARY KEY (`authen_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `binary_level`
--
ALTER TABLE `binary_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spid` (`spid`);

--
-- Indexes for table `company_address`
--
ALTER TABLE `company_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_message`
--
ALTER TABLE `company_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `e-pin`
--
ALTER TABLE `e-pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `empcode` (`employee_code`),
  ADD UNIQUE KEY `employee_mobile` (`employee_mobile`);

--
-- Indexes for table `epin_payment`
--
ALTER TABLE `epin_payment`
  ADD PRIMARY KEY (`epin_payment_id`);

--
-- Indexes for table `epin_transfer`
--
ALTER TABLE `epin_transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `ewallet`
--
ALTER TABLE `ewallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spid` (`spid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memid`),
  ADD UNIQUE KEY `spid` (`spid`);

--
-- Indexes for table `memberpair`
--
ALTER TABLE `memberpair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_login`
--
ALTER TABLE `member_login`
  ADD PRIMARY KEY (`member_login_id`);

--
-- Indexes for table `member_message`
--
ALTER TABLE `member_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_topup`
--
ALTER TABLE `member_topup`
  ADD PRIMARY KEY (`member_topup_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `pin_request`
--
ALTER TABLE `pin_request`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `sublink`
--
ALTER TABLE `sublink`
  ADD PRIMARY KEY (`sublink_id`);

--
-- Indexes for table `transfer_details`
--
ALTER TABLE `transfer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`with_d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievers`
--
ALTER TABLE `achievers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `amount_rate`
--
ALTER TABLE `amount_rate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `authenticate_status`
--
ALTER TABLE `authenticate_status`
  MODIFY `authen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `binary_level`
--
ALTER TABLE `binary_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `company_address`
--
ALTER TABLE `company_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_message`
--
ALTER TABLE `company_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=433;
--
-- AUTO_INCREMENT for table `e-pin`
--
ALTER TABLE `e-pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `epin_payment`
--
ALTER TABLE `epin_payment`
  MODIFY `epin_payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `epin_transfer`
--
ALTER TABLE `epin_transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ewallet`
--
ALTER TABLE `ewallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `memberpair`
--
ALTER TABLE `memberpair`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `member_login`
--
ALTER TABLE `member_login`
  MODIFY `member_login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `member_message`
--
ALTER TABLE `member_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_topup`
--
ALTER TABLE `member_topup`
  MODIFY `member_topup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pin_request`
--
ALTER TABLE `pin_request`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sublink`
--
ALTER TABLE `sublink`
  MODIFY `sublink_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `transfer_details`
--
ALTER TABLE `transfer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `with_d_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
