-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2016 at 04:20 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pershoenalize`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `last_login`, `ip_address`) VALUES
('IT', 'cd32106bcb6de321930cf34574ea388c', '2014-07-17 11:59:04', '192.168.1.163'),
('CEO', '265367efd682070b5d4974d0533fd4fd', '2014-06-21 22:54:48', '36.72.195.23'),
('MARKETING', '88f2fb7f6774db42562f1605dd3c090a', '2014-06-19 10:47:26', '192.168.1.3');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL,
  `for_page` varchar(255) NOT NULL,
  `overview` varchar(3000) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `for_page`, `overview`, `content`, `thumbnail_path`) VALUES
(1, 'Article Ku Saja', 'who_we_are', 'AAAA', '<p><span style="font-family: comic sans ms,sans-serif; font-size: 18pt;">AAA</span></p>', 'i_aA_lcrKajSetu303316230.jpg'),
(2, 'Sampai Jumpa', 'who_we_are', 'AAAA', '<p><span style="font-size: 36pt;">AAAA</span></p>', '_SJampmaupai-1512039203.png');

-- --------------------------------------------------------

--
-- Table structure for table `article_related`
--

CREATE TABLE IF NOT EXISTS `article_related` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id_related` int(11) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `article_related`
--

INSERT INTO `article_related` (`article_id`, `article_id_related`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('704ff99acd108ec801513fd3c53c2f3b', '192.168.1.163', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1405581730, ''),
('b8ff8ad34072078dfefea4ee4e2154f3', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1405584682, 'a:5:{s:6:"custom";a:4:{i:1;a:1:{i:16;a:2:{i:20;s:46:"106|+|100000|+|D92B1C0AE112363100795385925.png";i:17;s:46:"20|+|140000|+|47B1DCEA3-112499824978397907.png";}}i:2;a:1:{i:17;a:2:{i:21;s:46:"145|+|109000|+|AC12B9ED1594283584431027904.png";i:25;s:39:"155|+|0|+|C2D53EBA51973258993071003.png";}}i:3;a:1:{i:18;a:1:{i:22;s:46:"116|+|100000|+|B8D22ECA2515141022199790234.png";}}i:4;a:1:{i:31;a:1:{i:43;s:45:"209|+|80000|+|EDB3C24A1536587341655166497.png";}}}s:4:"part";a:6:{i:20;s:16:"Toe Panel Cutout";i:17;s:16:"Shoe Lace Oxford";i:21;s:16:"Mid Panel Cutout";i:25;s:13:"Insole Cutout";i:22;s:17:"Back Panel Cutout";i:43;s:14:"Outsole Cutout";}s:4:"cart";a:12:{i:0;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:1;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:2;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:3;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:4;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:5;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:6;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:7;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:8;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:9;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:10;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}i:11;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:34;a:1:{i:44;s:47:"627|+|29000|+|EAC45B5D4-2968753763267020441.png";}}}}s:4:"size";a:12:{i:0;s:2:"34";i:1;s:2:"34";i:2;s:2:"34";i:3;s:2:"34";i:4;s:2:"34";i:5;s:2:"34";i:6;s:2:"34";i:7;s:2:"34";i:8;s:2:"34";i:9;s:2:"34";i:10;s:2:"34";i:11;s:2:"34";}s:4:"shoe";a:12:{i:0;s:1:"5";i:1;s:1:"5";i:2;s:1:"5";i:3;s:1:"5";i:4;s:1:"5";i:5;s:1:"5";i:6;s:1:"5";i:7;s:1:"5";i:8;s:1:"5";i:9;s:1:"5";i:10;s:1:"5";i:11;s:1:"5";}}'),
('d6d881900d5b6b7f822a40aa61fca7c0', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1405586467, ''),
('f946bcee4be438cee260419cc22b3556', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1405586467, 'a:5:{s:6:"custom";a:4:{i:1;a:1:{i:11;a:3:{i:17;s:46:"20|+|140000|+|47B1DCEA3-112499824978397907.png";i:15;s:46:"65|+|119000|+|E9AB11DC51007128215790684568.png";i:14;s:44:"75|+|80000|+|4E18BCDA1141609332778579238.png";}}i:3;a:1:{i:12;a:1:{i:16;s:44:"34|+|20000|+|1CBE6DA83693296015674826658.png";}}i:4;a:1:{i:13;a:1:{i:18;s:44:"25|+|80000|+|981ECD2AB123432441039265422.png";}}i:5;a:1:{i:57;a:1:{i:59;s:45:"607|+|20000|+|DA555EC9B278952063522722147.png";}}}s:4:"part";a:6:{i:17;s:16:"Shoe Lace Oxford";i:15;s:16:"Mid Panel Oxford";i:14;s:16:"Toe Panel Oxford";i:16;s:18:"Curved Back Oxford";i:18;s:15:"Out Sole Oxford";i:59;s:14:"Wingtip Oxford";}s:4:"cart";a:1:{i:0;a:3:{i:1;a:1:{i:21;a:2:{i:26;s:46:"177|+|250000|+|6AC9BE12D201339380993290652.png";i:62;s:46:"351|+|80000|+|B2A24E6CD-522386178543355711.png";}}i:4;a:1:{i:22;a:1:{i:28;s:46:"158|+|100000|+|42D82ECBA634479249347913116.png";}}i:5;a:1:{i:63;a:1:{i:60;s:41:"344|+|0|+|DC3E60BA4803712477904668434.png";}}}}s:4:"size";a:1:{i:0;s:2:"34";}s:4:"shoe";a:1:{i:0;s:1:"5";}}');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `collection_id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_name` varchar(50) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `collection_path` varchar(100) NOT NULL,
  `collection_description` text NOT NULL,
  `collection_price` int(11) NOT NULL,
  PRIMARY KEY (`collection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`, `shoe_id`, `username`, `collection_path`, `collection_description`, `collection_price`) VALUES
(9, 'Flat Shoes Ala Aing', 5, 'IT', 'IT_Flat Shoes Ala Aing.png', 'Tesdkjbndnalbflfnlfn afhalfhklnklfn,mfbhlNLnflnf nflsnflnlnfalnfa fjafnalnfla afklahlkfaklnfla aflhfeegfiugikjaf', 459000),
(10, 'Flat Shoes Ala Aing', 5, 'IT', 'IT_Flat Shoes Ala Aing.png', 'Tesdkjbndnalbflfnlfn afhalfhklnklfn,mfbhlNLnflnf nflsnflnlnfalnfa fjafnalnfla afklahlkfaklnfla aflhfeegfiugikjaf', 459000),
(11, 'Suep', 6, 'IT', 'IT_Suep.png', 'NDklnld', 529000);

-- --------------------------------------------------------

--
-- Table structure for table `collection_detail`
--

CREATE TABLE IF NOT EXISTS `collection_detail` (
  `collection_id` int(11) NOT NULL,
  `part_type_group_id` int(11) NOT NULL,
  `part_type_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `pattern_color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection_detail`
--

INSERT INTO `collection_detail` (`collection_id`, `part_type_group_id`, `part_type_id`, `part_id`, `pattern_color_id`) VALUES
(9, 1, 21, 26, 177),
(9, 1, 21, 62, 351),
(9, 4, 22, 28, 158),
(9, 5, 61, 48, 637),
(10, 1, 21, 26, 177),
(10, 1, 21, 62, 351),
(10, 4, 22, 28, 158),
(10, 5, 34, 44, 627),
(11, 1, 16, 20, 106),
(11, 1, 16, 17, 20),
(11, 2, 17, 21, 145),
(11, 2, 17, 25, 155),
(11, 3, 18, 22, 116),
(11, 4, 31, 43, 209);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Dark Olive'),
(2, 'Green'),
(3, 'Light Brown'),
(4, 'Magenta-Haze'),
(5, 'Minty Grey'),
(6, 'Olive'),
(7, 'Pullman'),
(8, 'Soft Olive'),
(9, 'Black'),
(10, 'Brown'),
(11, 'Champagne Gold'),
(26, 'British Green'),
(13, 'Covvee'),
(25, 'Blue'),
(24, 'Beige'),
(16, 'Grey'),
(17, 'Light Pink'),
(18, 'Light Purple'),
(19, 'Navy Blue'),
(20, 'Pink'),
(21, 'Rose'),
(22, 'Tosca'),
(23, 'White'),
(27, 'Red'),
(28, 'Yellow'),
(29, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE IF NOT EXISTS `confirmation` (
  `order_number` varchar(20) NOT NULL,
  `confirmation_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`order_number`, `confirmation_path`) VALUES
('Suep Markotob', 'Suep_Markotob.jpg'),
('Uajdd', 'Uajdd.jpg'),
('#07EE7EC40412B015536', '#07EE7EC40412B015536.jpg'),
('#07EE7EC40412B015536', '#07EE7EC40412B0155361.jpg'),
('#22cbd31628d97a07b18', '#22cbd31628d97a07b18.jpg'),
('#22cbd31628d97a07b18', '#22cbd31628d97a07b181.jpg'),
('#006f37180ad6eecc802', '#006f37180ad6eecc802.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_first_name` varchar(50) NOT NULL,
  `customer_last_name` varchar(50) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_age` int(11) NOT NULL,
  `customer_zipcode` int(10) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_company` varchar(50) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_password`, `customer_email`, `customer_address`, `customer_age`, `customer_zipcode`, `customer_phone`, `customer_company`, `region_id`) VALUES
(58, 'Putri', 'Septi', 'e0aa021e21dddbd6d8cecec71e9cf564', 'putrisepti@gmail.com', 'Palembang', 21, 0, '081220205242', '', 0),
(59, 'Eryna', 'Noorwanrisha', 'e0aa021e21dddbd6d8cecec71e9cf564', 'erynanoorwanrisha@gmail.com', 'Palembang', 20, 0, '081367534298', '', 0),
(53, 'rani ', 'anggraeni', 'e0aa021e21dddbd6d8cecec71e9cf564', 'rani@gmail.com', 'bandung', 21, 0, '081265281242', '', 0),
(54, 'Satrya', 'Wira Wicaksana', 'e0aa021e21dddbd6d8cecec71e9cf564', 'satryawirawicaksana@gmail.com', 'Bandung', 16, 0, '081220205242', '', 0),
(55, 'Ahmadi', 'Ahmad', 'e0aa021e21dddbd6d8cecec71e9cf564', 'ahmadahmadi@gmail.com', 'Bali', 21, 0, '081220205242', '', 0),
(56, 'Pasthika', 'Yoga', 'e0aa021e21dddbd6d8cecec71e9cf564', 'pasthikayoga@gmail.com', 'Bandung', 20, 0, '085727307527', '', 0),
(57, 'Dinny', 'Windianti Sumiadi', 'e0aa021e21dddbd6d8cecec71e9cf564', 'dinnyw12@gmail.com', 'Dago Asri Blok H/7 40135', 19, 0, '085781901068', '', 0),
(50, 'Ryan', 'Lingga', 'e0aa021e21dddbd6d8cecec71e9cf564', 'ryan@gmail.com', 'Bandung', 21, 0, '081220205242', '', 0),
(10, 'ilham', 'kalami', 'e0aa021e21dddbd6d8cecec71e9cf564', 'm.ilham.kalami@gmail.com', 't.sariasih 52, bandung', 24, 0, '081312510960', '', 0),
(61, 'amelia', 'sakinah', 'e0aa021e21dddbd6d8cecec71e9cf564', 'amelia.sakinah@gmail.com', 'jl pelesiran gg palm house no 77/58', 20, 0, '085641795080', '', 0),
(52, 'Abdurahman', 'Saleh', 'e0aa021e21dddbd6d8cecec71e9cf564', 'abdurahman@gmail.com', 'Bandung', 21, 0, '081203287612', '', 0),
(13, 'Rizkia Ayu', 'Ratnaningtyas', 'e0aa021e21dddbd6d8cecec71e9cf564', 'rizkia.ratnaningtyas@gmail.com', 'Jl.Dago Asri IV H7 Bandung', 19, 0, '087869642876', '', 0),
(14, 'Bethari', 'Pradnya', 'e0aa021e21dddbd6d8cecec71e9cf564', 'Be_bethari@ymail.com', 'Teluk kumai barat 113/b perak utara, pabean cantikan, surabaya', 20, 0, '08568252413', '', 0),
(15, 'Nissa Yasmin', 'Busama', 'e0aa021e21dddbd6d8cecec71e9cf564', 'nissa.yasmin@sbm-itb.ac.id', 'Komplek. Citra, Jln. Citra Raya no.4 Antapani - Bandung', 19, 0, '082117901913', '', 0),
(16, 'Alviani', 'Ramadhani', 'e0aa021e21dddbd6d8cecec71e9cf564', 'vani.reina@gmail.com', 'paseban timur 14 no. 80', 20, 0, '628568644299', '', 0),
(17, 'Salma', 'Budiman', 'e0aa021e21dddbd6d8cecec71e9cf564', 'salmarufaida@yahoo.co.id', 'Setiabudi Regensi 195 E', 22, 0, '085223644782', '', 0),
(18, 'iffah', 'shabirah', 'e0aa021e21dddbd6d8cecec71e9cf564', 'iffah.shabirah@sbm-itb.ac.id', 'Komplek timah, kelapa 2 cc 3 no 10, RT 08 RW 12. Cimanggis depok.', 20, 0, '085314091751', '', 0),
(19, 'Audina', 'Mia', 'e0aa021e21dddbd6d8cecec71e9cf564', 'audinamiaramayani@yahoo.com', 'Semarang', 20, 0, '085742400184', '', 0),
(20, 'Resya Dian', 'Puspitaningtyas', 'e0aa021e21dddbd6d8cecec71e9cf564', 'resyadian@gmail.com', 'Jl. Cisitu Baru No.10 ,Dago Coblong ,Bandung', 23, 0, '085221584746', '', 0),
(21, 'progesti eka', 'putri', 'e0aa021e21dddbd6d8cecec71e9cf564', 'progesti-e-p-11@psikologi.unair.ac.id', 'jalan manggis I b4 no 3 perumahan bugul permai kota pasuruan, jawa timur', 19, 0, '081803032138', '', 0),
(49, 'Wicaksana', 'Satrya', 'e0aa021e21dddbd6d8cecec71e9cf564', 'satryawirawicaksana22@gmail.com', 'Bandung', 21, 0, '081220205242', '', 0),
(23, 'Wijayanti', 'Kusumastuti', 'e0aa021e21dddbd6d8cecec71e9cf564', 'wijayantikusumastuti@gmail.com', 'Komplek PPR ITB Blok B/12B Dago bengkok', 19, 0, '085737716916', '', 0),
(24, 'Sasqi', 'Dafra', 'e0aa021e21dddbd6d8cecec71e9cf564', 'rheskidafra@gmail.com', 'Perum Villa Gunung Lestari Blok A4/30, Rt.001 Rw.015, Jombang, Ciputat, Tangerang Selatan 15414', 24, 0, '087785605262', '', 0),
(60, 'Astriani', 'Yunita', 'e0aa021e21dddbd6d8cecec71e9cf564', 'astrianiyunita@gmail.com', 'Bandung', 22, 0, '081220205242', '', 0),
(26, 'Arizal', 'Kyo', 'e0aa021e21dddbd6d8cecec71e9cf564', 'khoironi.arizal@gmail.com', 'Bandung', 20, 0, '082216318418', '', 0),
(28, 'Bianda', 'Safira', 'e0aa021e21dddbd6d8cecec71e9cf564', 'bianda_safira@yahoo.com', 'Jl. Kanayakan Baru No. 15, Dago, Bandung', 20, 0, '081584674746', '', 0),
(51, 'Afif Sandy', 'Putra', 'e0aa021e21dddbd6d8cecec71e9cf564', 'afif@gmail.com', 'Jakarta', 21, 0, '081238623127', '', 0),
(30, 'Sendyka', 'Rinduwastuty', 'e0aa021e21dddbd6d8cecec71e9cf564', 'sendykarindu@gmail.com', 'Jalan Martadireja 3 no. 35 Berkoh Purwokerto', 21, 0, '085642798878', '', 0),
(31, 'Arina Aisyal', 'Hanny', 'e0aa021e21dddbd6d8cecec71e9cf564', 'arinaisyal@gmail.com', 'Pondok Randu Jalan Flamboyan No. 4 RT 04 RW 13, Caringin, Jatinangor, Sumedang.', 19, 0, '085740206878', '', 0),
(32, 'Calista', 'Jesslyn', 'e0aa021e21dddbd6d8cecec71e9cf564', 'calistaelvina@gmail.com', 'Jl Dago Asri 3 J-7, Bandung', 19, 0, '081320424575', '', 0),
(42, 'Satrya', 'Wira Wicaksana', 'e0aa021e21dddbd6d8cecec71e9cf564', 'satryawirawicaksana@gmail.com', 'Bandung', 21, 0, '081220205242', '', 0),
(43, 'Fahry', 'Muhammad', '444bcb3a3fcf8389296c49467f27e1d6', 'muhammadfahry18@gmail.com', 'Bandung', 22, 0, '081931133212', '', 0),
(44, 'Suci', 'Puji Lestari', 'e0aa021e21dddbd6d8cecec71e9cf564', 'sucipujilestari@gmail.com', 'Jakarta', 19, 0, '081220205242', '', 0),
(45, 'Seilen', 'Hafdara', 'e0aa021e21dddbd6d8cecec71e9cf564', 'seilenhafdara.hafdaranurdin@gmail.com', 'Bandung', 21, 0, '081220205242', '', 0),
(46, 'Elma', 'Wati', 'e0aa021e21dddbd6d8cecec71e9cf564', 'elmawati@gmail.com', 'Bandung', 21, 0, '081931133212', '', 0),
(38, 'Clarissa', 'Veronica', 'e0aa021e21dddbd6d8cecec71e9cf564', 'clarissa.veronica@sbm-itb.ac.id', 'Perumahan Dago Asri 5 no. 5, Bandung 40132, Jawa Barat', 20, 0, '081908306600', '', 0),
(39, 'Erina Ayunda', 'Syahrani', 'e0aa021e21dddbd6d8cecec71e9cf564', 'erinasyahrani@yahoo.com', 'Jalan Griya Utara I no. 2, Bandung 40164', 18, 0, '0817214695', '', 0),
(40, 'Avi', 'Bellerizki', 'e0aa021e21dddbd6d8cecec71e9cf564', 'avi.bellerizki@sbm-itb.ac.id', 'Andara ujung 2, pondok labu, depok 16513', 20, 0, '08112332808', '', 0),
(47, 'Adenan', 'NP', 'e0aa021e21dddbd6d8cecec71e9cf564', 'adenan@gmail.com', 'Bandung', 21, 0, '081220205242', '', 0),
(62, 'Fariza Ardelia', 'Alifah', 'e0aa021e21dddbd6d8cecec71e9cf564', 'farizaard@gmail.com', 'Jalan Tubagus Ismail Dalam Gg.3 RT.04 RW.07, Kelurahan Sekeloa, Kecamatan Coblong', 18, 0, '085642244996', '', 0),
(63, 'Atina', 'Rosyada', 'e0aa021e21dddbd6d8cecec71e9cf564', 'atinarosyada@gmail.com', 'Jalan Gajah Mada 1007 Kauman Batang', 20, 0, '085642800420', '', 0),
(64, 'Nabilah', 'Zuhairah', 'e0aa021e21dddbd6d8cecec71e9cf564', 'nabilahzuhairah@yahoo.com', 'Jl. Cisitu Indah 1 no. 6 Bandung 40135', 18, 0, '085755705578', '', 0),
(65, 'Adita', 'Atisanta', 'e0aa021e21dddbd6d8cecec71e9cf564', 'aditaatisanta@yahoo.co.id', 'Jl. R.Tumenggung Suryo Gang 1/10A, Malang, 65123, Jawa Timur, Indonesia', 20, 0, '08563106030', '', 0),
(66, 'Ilafi Rani', 'Yoasti', 'e0aa021e21dddbd6d8cecec71e9cf564', 'ilafirani@gmail.com', 'Jalan Ikan Piranha Blok K No 3 Malang', 19, 0, '083848228642', '', 0),
(67, 'Rizki', 'Pangestuti', 'e0aa021e21dddbd6d8cecec71e9cf564', 'pngstu.rizki@gmail.com', 'Jalan Hiu 6 Nomor 6 PJMI Tangerang Selatan', 19, 0, '085642704320', '', 0),
(68, 'warih', 'prabasari', 'e0aa021e21dddbd6d8cecec71e9cf564', 'warihangesti@gmail.com', 'Villa puncak tidar blok V-146, malang, jawa timur', 18, 0, '081357979489', '', 0),
(69, 'Pasthika', 'Yoga', 'e0aa021e21dddbd6d8cecec71e9cf564', 'pasthikayoga@gmail.com', 'Bandung', 20, 0, '085727307527', '', 0),
(70, 'Fina', 'Fitriana R', 'e0aa021e21dddbd6d8cecec71e9cf564', 'fitrianarozifina@yahoo.com', 'Jl. Plesiran 69/ 56 Lebak Siliwangi Bandung', 17, 0, '085741979741', '', 0),
(71, 'Imas', 'Siti Fatimah', 'e0aa021e21dddbd6d8cecec71e9cf564', 'imas.siti@sbm-itb.ac.id', 'Jalan Dago Timur No. 4 Bandung', 20, 0, '085795787296', '', 0),
(72, 'siti', 'rosidah', 'e0aa021e21dddbd6d8cecec71e9cf564', 'siti.rosidah@sbm-itb.ac.id', 'Taman hewan', 21, 0, '087821658229', '', 0),
(73, 'Giovanni', 'Permata Dewi', 'e0aa021e21dddbd6d8cecec71e9cf564', 'giovannipermata@yahoo.com', 'Jakarta', 19, 0, '08131981898', '', 0),
(74, 'Gelda', 'Sella Monika', 'e0aa021e21dddbd6d8cecec71e9cf564', 'gelda.sella@sbm-itb.ac.id', 'jalan kanayakan baru no.39 , Dago - Bandung\nkodepos 40135', 19, 0, '081313524420', '', 0),
(75, 'Pasthika', 'Yoga', 'e0aa021e21dddbd6d8cecec71e9cf564', 'pasthikayoga@gmail.com', 'Bandung', 20, 0, '085727307527', '', 0),
(76, 'Satrya', 'Wira Wicaksana', '827ccb0eea8a706c4c34a16891f84e7b', 'satryawirawicaksana@gmail.com', 'Bandung', 17, 0, '03131', '', 0),
(77, 'Satrya', 'Wira Wicaksana', '827ccb0eea8a706c4c34a16891f84e7b', 'satryawirawicaksana@gmail.com', 'Bandung', 17, 0, '03131', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE IF NOT EXISTS `deliver` (
  `deliver_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `deliver_name` varchar(50) NOT NULL,
  `deliver_address` text NOT NULL,
  `deliver_zipcode` int(10) NOT NULL,
  `deliver_telephone` varchar(20) NOT NULL,
  `deliver_city` varchar(100) NOT NULL,
  PRIMARY KEY (`deliver_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `deliver`
--

INSERT INTO `deliver` (`deliver_id`, `province_id`, `deliver_name`, `deliver_address`, `deliver_zipcode`, `deliver_telephone`, `deliver_city`) VALUES
(1, 5, 'Muhammad Fahry', 'Bandung', 13614, '081996235567', 'Lubuklinggau'),
(2, 11, 'Mhamma', 'VSHaj', 10879, '0899781992', 'adjakj'),
(3, 1, 'Satrya Wira Wicaksana', 'Bandung', 31611, '081220205242', 'Bandung'),
(4, 11, 'Satrya Wira Wicaksana', 'Bandung', 31611, '081220205242', 'Bandung'),
(5, 11, '', '', 0, '', ''),
(6, 1, 'Satrya Wira Wicaksana', 'Bandung', 40552, '081220205242', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(50) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_name`) VALUES
(1, 'Faux Leather'),
(2, 'Suede'),
(3, 'EVA Sole'),
(4, 'Shoe Lace'),
(7, 'Cotton');

-- --------------------------------------------------------

--
-- Table structure for table `material_color`
--

CREATE TABLE IF NOT EXISTS `material_color` (
  `material_color_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `material_color_path` varchar(100) NOT NULL,
  PRIMARY KEY (`material_color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `material_color`
--

INSERT INTO `material_color` (`material_color_id`, `material_id`, `color_id`, `material_color_path`) VALUES
(1, 2, 1, 'Dark_Olive.png'),
(2, 2, 2, 'Green.png'),
(3, 2, 3, 'Light_Brown.png'),
(4, 2, 4, 'Magenta-Haze.png'),
(5, 2, 5, 'Minty_Gray.png'),
(6, 2, 6, 'Olive.png'),
(7, 2, 7, 'Pullman.png'),
(8, 2, 8, 'Soft_Olive.png'),
(51, 1, 17, 'Light_Pink1.png'),
(50, 1, 16, 'Gray1.png'),
(46, 1, 9, 'Black1.png'),
(47, 1, 10, 'Brown1.png'),
(48, 1, 11, 'Champange_Gold1.png'),
(49, 1, 13, 'Covvee1.png'),
(19, 1, 23, 'White.png'),
(20, 1, 22, 'Tosca.png'),
(21, 3, 9, 'thumbnl_sole_black.png'),
(22, 3, 2, 'thumbnl_sole_green.png'),
(23, 3, 10, 'thumbnl_sole_brown.png'),
(24, 3, 23, 'thumbnl_sole_white.png'),
(25, 3, 24, 'thumbnl_sole_beige.png'),
(26, 3, 25, 'thumbnl_sole_blue.png'),
(27, 3, 26, 'thumbnl_sole_british_green.png'),
(28, 3, 27, 'thumbnl_sole_red.png'),
(29, 3, 28, 'thumbnl_sole_yellow.png'),
(30, 4, 24, 'thumbnl_lace_beige.png'),
(31, 4, 9, 'thumbnl_lace_black.png'),
(32, 4, 10, 'thumbnl_lace_brown.png'),
(33, 4, 29, 'thumbnl_lace_gold.png'),
(34, 4, 23, 'thumbnl_lace_white.png'),
(38, 5, 3, 'light_brown.png'),
(37, 5, 9, 'thumbnl_lace_black1.png'),
(39, 5, 10, 'thumbnl_lace_brown1.png'),
(40, 5, 23, 'thumbnl_lace_white1.png'),
(41, 6, 9, 'thumbnl_lace_black2.png'),
(42, 7, 23, '723285954050080585520.png'),
(43, 7, 9, '792101926241965825194.png'),
(44, 7, 10, '710-2428932864736301346.png'),
(45, 7, 3, '731107132164271149384.png'),
(52, 1, 18, 'Light_Purple1.png'),
(53, 1, 19, 'Navy_Blue1.png'),
(54, 1, 20, 'Pink1.png'),
(55, 1, 21, 'Rose1.png');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE IF NOT EXISTS `part` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_group_id` int(11) NOT NULL,
  `part_name` varchar(50) NOT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`part_id`, `part_group_id`, `part_name`) VALUES
(17, 1, 'Shoe Lace Oxford'),
(18, 1, 'Out Sole Oxford'),
(16, 2, 'Curved Back Oxford'),
(15, 1, 'Mid Panel Oxford'),
(14, 1, 'Toe Panel Oxford'),
(20, 1, 'Toe Panel Cutout'),
(21, 1, 'Mid Panel Cutout'),
(22, 1, 'Back Panel Cutout'),
(25, 1, 'Insole Cutout'),
(26, 1, 'Body Loafer'),
(62, 1, 'Stitching Loafer'),
(28, 1, 'Outsole Loafer'),
(59, 2, 'Wingtip Oxford'),
(42, 2, 'Ribbon'),
(43, 1, 'Outsole Cutout'),
(44, 2, 'Tassel'),
(48, 2, 'Lace Loafer'),
(67, 2, 'Cap Toe Pointed Ballet'),
(70, 1, 'Body Panel Pointed Ballet'),
(54, 1, 'Ribbon ballet-round'),
(66, 2, 'Cap Toe Round Ballet'),
(57, 2, 'Wingtip'),
(60, 2, 'None'),
(64, 1, 'Body Panel Round Ballet'),
(69, 2, 'Curved Back Ballet');

-- --------------------------------------------------------

--
-- Table structure for table `part_group`
--

CREATE TABLE IF NOT EXISTS `part_group` (
  `part_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_group_name` varchar(50) NOT NULL,
  PRIMARY KEY (`part_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `part_group`
--

INSERT INTO `part_group` (`part_group_id`, `part_group_name`) VALUES
(1, 'Regular'),
(2, 'Additional');

-- --------------------------------------------------------

--
-- Table structure for table `part_mapping`
--

CREATE TABLE IF NOT EXISTS `part_mapping` (
  `part_id` int(11) NOT NULL,
  `part_type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_mapping`
--

INSERT INTO `part_mapping` (`part_id`, `part_type_id`) VALUES
(17, 11),
(15, 11),
(14, 11),
(18, 13),
(26, 21),
(20, 16),
(21, 17),
(22, 18),
(17, 16),
(25, 17),
(28, 22),
(16, 12),
(43, 31),
(44, 34),
(48, 37),
(59, 57),
(54, 45),
(60, 56),
(60, 58),
(62, 21),
(60, 63),
(48, 61),
(64, 64),
(64, 70),
(64, 72),
(66, 74),
(67, 75),
(60, 76),
(42, 77),
(60, 78),
(64, 81),
(60, 82),
(66, 83),
(60, 86),
(69, 87),
(42, 88),
(60, 85),
(70, 89),
(60, 91),
(67, 90),
(60, 93),
(69, 92),
(60, 94),
(42, 95);

-- --------------------------------------------------------

--
-- Table structure for table `part_type`
--

CREATE TABLE IF NOT EXISTS `part_type` (
  `part_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_type_name` varchar(50) NOT NULL,
  `part_type_path` varchar(100) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `part_type_group_id` int(11) NOT NULL,
  `is_default` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`part_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `part_type`
--

INSERT INTO `part_type` (`part_type_id`, `part_type_name`, `part_type_path`, `shoe_id`, `part_type_group_id`, `is_default`) VALUES
(1, 'Oxford Round Toe', 'ndeR_TrOdfoouox1082188446116923099.png', 2, 1, '0'),
(2, 'Middle', 'dMledi-1918503672017298223.png', 2, 2, '0'),
(3, 'Back', 'kBac953659736.png', 2, 3, '0'),
(4, 'Sole', 'lSoe-2331804368994412043.png', 2, 4, '0'),
(5, 'Round Toe', 'edRono_uT-1495781358088055613.png', 3, 1, '0'),
(10, 'Wingtip', 'gipWnti-1315088461312139329.png', 3, 5, '0'),
(7, 'Curve back', 'cvkurb_aCe3508609492078289412.png', 3, 3, '0'),
(8, 'Sponge Sole', 'lpnog_eSeoS1318860742117971827.png', 3, 4, '0'),
(11, 'Plain Toe Oxford', '_oxaodr_eTlfniPO840370245708557.png', 4, 1, '0'),
(12, 'Curved Back Oxford', 'uBraoO_edk_vfxcrdC85187503708545908.png', 4, 3, '0'),
(13, 'EVA Sole Oxford', 'eE_SoAlV-41585374323881885.png', 4, 4, '0'),
(16, 'Plain Toe Oxford Cutout', 'eoTPinal_939215451606398356.png', 6, 1, '0'),
(17, 'Plain Mid Oxford Cutout', 'ndliPa_iM-1010632554182729405.png', 6, 2, '0'),
(18, 'Plain Back Oxford Cutout', 'c_aBnkialP-3130773935032535095.png', 6, 3, '0'),
(57, 'Wingtip Oxford', 'OiWxtid_fpngor10350196294492784.png', 4, 5, '0'),
(21, 'Plain Loafer', 'Plnai109233019075755266.png', 5, 1, '0'),
(22, 'EVA Sole Loafer', 'eo_EASlV2668949666757898077.png', 5, 4, '0'),
(37, 'Lace 1 Loafer', 'f_aa1cLLroe_e333538264840088519.png', 8, 5, '0'),
(36, 'EVA Sole Loafer 2', 'L_ef_AE_ooV2raelS956008642794542490.png', 8, 4, '0'),
(34, 'Tassel', 'slTsea5691507325240809443.png', 5, 5, '0'),
(31, 'EVA Sole', 'eA_VloES626402678.png', 6, 4, '0'),
(35, 'Round Toe Loafer 2', 'f_u2oeRrodeL_Tnoa_717127594489562171.png', 8, 1, '0'),
(38, 'Round Toe Flat and Strap', 'dpl_FtoraodneRTa_tSnau569642103510242097.png', 9, 1, '0'),
(39, 'Strap', 'tarSp-6768171360965798099.png', 9, 5, '0'),
(40, 'Round Toe Ballet', 'atoeTo_RlunedlB328246062317680117.png', 10, 1, '0'),
(41, 'Plain Back Ballet-Round', 'i_l-tnnaRclolaudaPkBBe345053140160593276.png', 10, 3, '0'),
(42, 'Body Panel Ballet-Round', 'nnPae-loBRu_olBtldeyda_44521043503113191.png', 10, 2, '0'),
(46, 'Toe ballet-pointed', '_eeenTlabdotlp-oit4449821110583910426.png', 11, 1, '0'),
(47, 'body panel ballet-POINTED', 'eblNb-Odt_aIPenlTl_yEopaD-733563001998084172.png', 11, 2, '0'),
(45, 'Ribbon Ballet-Round', 'Rloeb-BtnbaodRin_ul120706103563463354.png', 10, 5, '0'),
(56, 'Plain Toe Oxford', 'lOno_arPxefdiTo_919059462.png', 4, 5, '0'),
(49, 'Test', 'Tste795634908854323490.PNG', 12, 1, '0'),
(58, 'Plain Back Oxford', 'O_na_xafriBcPdokl-2791949376331040224.png', 4, 3, '0'),
(59, 'Toe Ballet-Round', 'TdlooReaB_eunlt-4502306412645299022.png', 13, 1, '0'),
(60, 'Toe Ballet-Pointed', 'TliodPnle_Bett-oea48992924752905299.png', 13, 1, '0'),
(61, 'Lace', 'Leac191694413026486645.png', 5, 5, '0'),
(64, 'Round Toe Ballet', 'oetBaR_Tldle_onu1230470203.png', 13, 1, '0'),
(63, 'Plain', 'ailPn4157353914600467640.png', 5, 5, '0'),
(65, 'Pointed Toe Ballet', 'enTeaeoBild_lotPt-1739008327361971409.png', 13, 1, '0'),
(66, 'Toe Cap', 'poae_CT4507750067243910655.png', 13, 2, '0'),
(67, 'Plain', 'naPli1063788681829736391.png', 13, 2, '0'),
(68, 'Ribbon', 'obnbRi73108772657166630.png', 13, 5, '0'),
(69, 'Plain', 'inlaP911980401.png', 13, 5, '0'),
(70, 'Round Toe Ballet', 'ee_aultlToBn_oRd340183246243651551.png', 14, 1, '0'),
(71, 'Pointed Toe Ballet', 'lBeln_tePado_oteiT-2038574289996425855.png', 14, 1, '0'),
(72, 'Round Toe Ballet', 'adoToRlteenuBl_430662825191181979.png', 15, 1, '0'),
(73, 'Pointed Toe Ballet', 'itatn_ldTeeoelPB_o-2740397813012353019.png', 15, 1, '0'),
(74, 'Cap Toe Round Ballet', 'uoaenedap_tll_BTRo_C556541435072874430.png', 15, 2, '0'),
(75, 'Cap Toe Pointed Ballet', 'aBTe_ntopileal_Cedto_P-932995306052634080.png', 15, 2, '0'),
(76, 'Plain Toe Ballet', 'laoiPnlleT_aBet_-3759353418610235783.png', 15, 2, '0'),
(77, 'Ribbon', 'bbinoR13145726892222205.png', 15, 5, '0'),
(78, 'None', 'Neon146425306668141311.png', 15, 5, '0'),
(79, 'Plain', 'nalPi385196120331600658.png', 15, 3, '0'),
(80, 'Curved Back Ballet', 'actvkuela_eCdB_lrB310145430062515011.png', 15, 3, '0'),
(81, 'Round Toe', 'Teo_udoRn-497147293857160506.png', 16, 1, '0'),
(82, 'Plain', 'ianlP-3760691780419423128.png', 16, 2, '0'),
(83, 'Cap Toe', 'paT_eoC203128869689718082.png', 16, 2, '0'),
(89, 'Pointed Toe Ballet', 'dollPetetiTan_oeB_-6568271944227220105.png', 17, 1, '0'),
(85, 'Plain', 'iPaln11759474798208504.png', 16, 5, '0'),
(86, 'Plain', 'lanPi406730090799627600.png', 16, 3, '0'),
(87, 'Curved Back', 'ueBdckrCva_1176029883936630525.png', 16, 3, '0'),
(88, 'Ribbon', 'nbbiRo-2790790954092568827.png', 16, 5, '0'),
(90, 'Cap Toe Pointed Ballet', 'T_edBCetiooPel_lanatp484513450.png', 17, 2, '0'),
(91, 'Plain', 'aPiln11034487199053046.png', 17, 2, '0'),
(92, 'Curved Back Pointed Ballet', 'nkCaldP_rtevi_cutB_aoeBdle20341029846038809.png', 17, 3, '0'),
(93, 'Plain', 'nPial395260332.png', 17, 3, '0'),
(94, 'Plain', 'Pinal-572940124781531910.png', 17, 5, '0'),
(95, 'Ribbon', 'ionRbb44708963016510116.png', 17, 5, '0');

-- --------------------------------------------------------

--
-- Table structure for table `part_type_group`
--

CREATE TABLE IF NOT EXISTS `part_type_group` (
  `part_type_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_type_group_name` varchar(50) NOT NULL,
  PRIMARY KEY (`part_type_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `part_type_group`
--

INSERT INTO `part_type_group` (`part_type_group_id`, `part_type_group_name`) VALUES
(1, 'Toe'),
(2, 'Middle'),
(3, 'Back'),
(4, 'Heels'),
(5, 'Decoration');

-- --------------------------------------------------------

--
-- Table structure for table `pattern_color`
--

CREATE TABLE IF NOT EXISTS `pattern_color` (
  `pattern_color_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) NOT NULL,
  `material_color_id` int(11) NOT NULL,
  `pattern_color_price` double NOT NULL,
  `pattern_color_path` varchar(150) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pattern_color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=688 ;

--
-- Dumping data for table `pattern_color`
--

INSERT INTO `pattern_color` (`pattern_color_id`, `part_id`, `material_color_id`, `pattern_color_price`, `pattern_color_path`, `is_default`) VALUES
(1, 1, 1, 30000, 'CE1A1DB97746461323723191.png', 0),
(2, 2, 1, 30000, 'EAC1BD2542438965.png', 0),
(3, 4, 1, 30000, 'EB14DAC-871486301896688138.png', 0),
(5, 4, 1, 30000, 'CD1A4BE743441029045998089.png', 0),
(7, 6, 1, 50000, 'EB1C6AD-4060812091105933263.png', 0),
(8, 6, 2, 50000, 'BE6D2AC-2040195559669476648.png', 0),
(9, 7, 1, 50000, 'C1D7EBA79187612349489226.png', 0),
(10, 7, 2, 50000, 'BD72CAE-6681849595701618029.png', 0),
(13, 9, 1, 50000, 'EC19BAD303148989271162199.png', 0),
(14, 9, 2, 50000, '2BDCA9E-3833632903622238911.png', 0),
(20, 17, 34, 140000, '47B1DCEA3-112499824978397907.png', 0),
(21, 17, 33, 140000, '13EBA73CD-2203879839757459235.png', 0),
(22, 17, 32, 140000, 'AB213ED7C514337278120114438.png', 0),
(23, 17, 31, 140000, 'B71CAD1E31485263836775101142.png', 0),
(24, 17, 30, 140000, 'C0BA3DE1731608511494924647.png', 0),
(25, 18, 29, 80000, '981ECD2AB123432441039265422.png', 0),
(26, 18, 28, 80000, 'BEA8C82D1-3144994133319400938.png', 0),
(27, 18, 27, 80000, 'CA7E2DB81-1254971568340340358.png', 0),
(28, 18, 26, 80000, '2B8DAE1C6-2906112804727957183.png', 0),
(29, 18, 25, 80000, 'B8DA5CE1253136233506554185.png', 0),
(30, 18, 24, 80000, '8DB4AE12C921109748250707753.png', 0),
(31, 18, 23, 80000, 'DAE8BC321143985670814941421.png', 0),
(32, 18, 22, 80000, 'BDCA128E2338169862.png', 0),
(33, 18, 21, 80000, 'C1EB81D2A1450817081342044705.png', 0),
(34, 16, 8, 20000, '1CBE6DA83693296015674826658.png', 0),
(35, 16, 7, 20000, '6CBDAE17308015313191746665.png', 0),
(36, 16, 6, 20000, '16ADB6CE-5304384209705270702.png', 0),
(37, 16, 5, 20000, 'DB6C1AE524160885299922318.png', 0),
(38, 16, 4, 20000, 'ACED16B41029453604630278116.png', 0),
(39, 16, 3, 20000, '6DA31CEB-5069445642652532774.png', 0),
(40, 16, 2, 20000, 'C6B2EA1D20277316677505481.png', 0),
(41, 16, 1, 20000, '6A1ECBD120778034666102166.png', 0),
(42, 16, 20, 20000, '0CD12E6AB-4200110813816690523.png', 0),
(43, 16, 19, 20000, '16DB1CAE93787729375290678074.png', 0),
(687, 64, 55, 389000, 'DCE56A4B5971671004422475135.png', 0),
(686, 64, 54, 389000, 'CD6B454AE79963992949842334.png', 0),
(685, 64, 53, 389000, '64DB35CEA808778037.png', 0),
(65, 15, 19, 119000, 'E9AB11DC51007128215790684568.png', 0),
(66, 15, 20, 119000, '0AC2E5D1B3343893014999313233.png', 0),
(67, 15, 1, 119000, '5D11CBAE158683690973908469.png', 0),
(68, 15, 2, 119000, 'ACB251DE745413990904394739.png', 0),
(69, 15, 3, 119000, '3BC5ED1A4669105222922316018.png', 0),
(70, 15, 4, 119000, '4BD5E1CA-1317216847146510008.png', 0),
(71, 15, 5, 119000, 'EBACD155-3016620571163472390.png', 0),
(72, 15, 6, 119000, 'D6EC5AB1304372662711677983.png', 0),
(73, 15, 7, 119000, '7C1BAD5E72121621.png', 0),
(74, 15, 8, 119000, 'B85AED1C579053035183745784.png', 0),
(75, 14, 8, 80000, '4E18BCDA1141609332778579238.png', 0),
(76, 14, 7, 80000, 'D1EBA4C7443065380864852486.png', 0),
(77, 14, 7, 80000, '4D71ABCE476453569283287462.png', 0),
(78, 14, 6, 80000, 'BED1A46C-2320674499225493280.png', 0),
(79, 14, 5, 80000, '4CAD1E5B193840441429735558.png', 0),
(80, 14, 4, 80000, 'B14AC4DE-2965053910943585919.png', 0),
(81, 14, 3, 80000, 'ACDB43E1466414894042594875.png', 0),
(82, 14, 2, 80000, 'C1D24ABE978967666938374068.png', 0),
(83, 14, 1, 80000, 'ED11A4CB17758549990479908.png', 0),
(84, 14, 20, 80000, '0E4DCAB1219273295092985398.png', 0),
(85, 14, 19, 80000, 'AEB9411DC154316664189560360.png', 0),
(684, 64, 52, 389000, '6BE4A5DC2170162681376512426.png', 0),
(683, 64, 49, 389000, 'BDA4CE694-558721453310544453.png', 0),
(682, 64, 48, 389000, 'DE644BC8A738610451361000216.png', 0),
(681, 64, 47, 389000, '4CE64AB7D955649771783312078.png', 0),
(680, 64, 46, 389000, 'A664DE4BC395751798063487942.png', 0),
(679, 64, 50, 389000, 'A56E04CDB-349797989460163671.png', 0),
(678, 64, 51, 389000, '5CB1ADE46144224227952766876.png', 0),
(677, 70, 55, 389000, 'ED505CAB7-1357173733943721242.png', 0),
(676, 70, 54, 389000, 'C407A5BDE1534790907814584786.png', 0),
(675, 70, 53, 389000, 'AD5C0E37B328202374191045177.png', 0),
(674, 70, 52, 389000, '5C2ABD07E1446063528281071548.png', 0),
(673, 70, 49, 389000, 'B4C9AED7041718203744720996.png', 0),
(672, 70, 48, 389000, 'E8CB04D7A57425208034311577.png', 0),
(671, 70, 47, 389000, 'D7B4E7C0A74097496253338905.png', 0),
(670, 70, 46, 389000, 'BCA7D406E458026124895980489.png', 0),
(669, 70, 50, 389000, 'A5CBE00D744124081071268957.png', 0),
(106, 20, 19, 100000, 'D92B1C0AE112363100795385925.png', 0),
(107, 20, 20, 100000, 'C2D2E00AB5681585094964855821.png', 0),
(108, 20, 1, 100000, '1E2DCBA01405007494278013336.png', 0),
(109, 20, 2, 100000, '2DEA0C2B-5173828317198613654.png', 0),
(110, 20, 3, 100000, 'CBED2A03307008653604471577.png', 0),
(111, 20, 4, 100000, 'A420EBCD375986985573995260.png', 0),
(112, 20, 5, 100000, '52DEAB0C-3205295976151083030.png', 0),
(113, 20, 6, 100000, 'DB6C20AE-563519201692184146.png', 0),
(114, 20, 7, 100000, 'ACD70B2E228517928091771631.png', 0),
(115, 20, 8, 100000, 'BADC82E01619162700037141618.png', 0),
(116, 22, 8, 100000, 'B8D22ECA2515141022199790234.png', 0),
(117, 22, 7, 100000, '2B72ECAD8769133514977122.png', 0),
(118, 22, 6, 100000, '2E2D6CAB-7111484318639954272.png', 0),
(119, 22, 5, 100000, 'A2BD2CE53616045930893824965.png', 0),
(120, 22, 4, 100000, '2ECAB4D2944502435429212695.png', 0),
(121, 22, 3, 100000, 'D322BEAC3771640074806447009.png', 0),
(122, 22, 2, 100000, 'D2BE2C2A2532388501194558.png', 0),
(123, 22, 1, 100000, 'DA2B12EC344132793.png', 0),
(124, 22, 20, 100000, 'DEAC222B0-2127490493281545861.png', 0),
(125, 22, 19, 100000, 'DBAE2C19222837764764764640.png', 0),
(668, 70, 51, 389000, '07AC1B5DE-944650551877361259.png', 0),
(667, 69, 55, 0, '69ABED5C597918066557940626.png', 0),
(666, 69, 54, 0, 'D5CAB469E56630039703619527.png', 0),
(665, 69, 53, 0, 'D3A5CB9E6-1618093209215551128.png', 0),
(664, 69, 52, 0, '9CB56DEA256566989871577530.png', 0),
(663, 69, 49, 0, '4EC996ABD452110730250230675.png', 0),
(662, 69, 48, 0, 'DA8B64E9C602935772.png', 0),
(661, 69, 47, 0, '9EBC47A6D2152260156037405945.png', 0),
(660, 69, 46, 0, 'AB66CE94D124970857399811733.png', 0),
(659, 69, 50, 0, 'BE6DA05C95191039634294198708.png', 0),
(658, 69, 51, 0, '96CED15BA98074749806094592.png', 0),
(657, 66, 55, 0, 'DCE5A56B6643395703700393205.png', 0),
(656, 66, 54, 0, 'BADC5664E1069584403485376503.png', 0),
(655, 66, 53, 0, 'C635BA6DE159287858665899709.png', 0),
(654, 66, 52, 0, 'CD62E5B6A3033281500039248.png', 0),
(653, 66, 49, 0, 'AE49CDB66253805010947286546.png', 0),
(652, 66, 48, 0, '46DBA86EC1201837000924187626.png', 0),
(651, 66, 47, 0, '476AD6CEB-3157786897423659593.png', 0),
(145, 21, 19, 109000, 'AC12B9ED1594283584431027904.png', 0),
(146, 21, 20, 109000, 'AD12E0C2B99510027153085815.png', 0),
(147, 21, 1, 109000, '21D1CEAB-1686985918549975189.png', 0),
(148, 21, 2, 109000, '2C1BED2A29666871650084264.png', 0),
(149, 21, 3, 109000, '2DAB1C3E1756601210776072991.png', 0),
(150, 21, 4, 109000, '1050193038800966544.png', 0),
(151, 21, 5, 109000, 'CAB21DE5765902567781857325.png', 0),
(152, 21, 6, 109000, 'B1C6AED246313141564767853.png', 0),
(153, 21, 7, 109000, '1D72BCAE-4268899503785874617.png', 0),
(154, 21, 8, 109000, 'DEB1AC823352027679061550742.png', 0),
(155, 25, 3, 0, 'C2D53EBA51973258993071003.png', 0),
(650, 66, 46, 0, 'ED66BC6A4395541977.png', 0),
(157, 27, 19, 50000, '917CDE2AB315119851530139510.png', 0),
(158, 28, 24, 100000, '42D82ECBA634479249347913116.png', 0),
(159, 31, 19, 50000, '3E9B1DAC11397014423722605360.png', 0),
(160, 32, 19, 50000, 'B1AE92D3C-1861113071944528713.png', 0),
(649, 66, 50, 0, 'BE66CAD05-1390304096585289054.png', 0),
(648, 66, 51, 0, 'A56EDB6C1-5979131733833237421.png', 0),
(163, 27, 19, 50000, '721EDCAB94121482639405255383.png', 0),
(647, 67, 55, 0, '5E75BDA6C392720968588684990.png', 0),
(646, 67, 54, 0, 'BDE7CA46511597953.png', 0),
(645, 67, 53, 0, '637B5EACD764275360733338397.png', 0),
(644, 67, 52, 0, 'E52ADB67C4613747352589952.png', 0),
(643, 67, 49, 0, '46CBA9E7D154851517667702764.png', 0),
(642, 67, 48, 0, 'DABEC6478400699281003443444.png', 0),
(641, 67, 47, 0, 'CB4E67D7A1355132877530483771.png', 0),
(640, 67, 46, 0, 'C6AB6DE471071154200842240154.png', 0),
(639, 67, 50, 0, '5AB0EDC765443331577209208.png', 0),
(638, 67, 51, 0, 'A1C6D5B7E-821422477199579002.png', 0),
(637, 48, 55, 29000, 'BA554E8DC387167157748587515.png', 0),
(196, 28, 27, 100000, '2DCE7BA28528187640.png', 0),
(177, 26, 19, 250000, '6AC9BE12D201339380993290652.png', 0),
(178, 26, 20, 250000, 'BD26E0AC2224274167638949992.png', 0),
(179, 26, 1, 250000, 'DBCE26A133021436.png', 0),
(180, 26, 2, 250000, 'E6C2A2DB352823152.png', 0),
(181, 26, 3, 250000, 'DC2A3B6E1000118822.png', 0),
(182, 26, 4, 250000, '4BDECA26-239212083040791452.png', 0),
(183, 26, 5, 250000, 'C6EBD25A328102513842476718.png', 0),
(184, 26, 6, 250000, 'CD6E62BA-2450114032807042086.png', 0),
(185, 26, 7, 250000, 'A2BDC76E-3595564715194314994.png', 0),
(186, 26, 8, 250000, 'EBD2A6C8985795202665142510.png', 0),
(187, 28, 21, 100000, 'BE22DC81A542794934.png', 0),
(188, 28, 22, 100000, 'BEAC2D822164576703999903136.png', 0),
(189, 28, 23, 100000, 'A38B2D2CE-279879321362987057.png', 0),
(636, 48, 54, 29000, 'C5484ABDE6715911267529037211.png', 0),
(191, 28, 25, 100000, '2B82A5DEC909917972704945756.png', 0),
(197, 28, 26, 100000, 'C6E28AD2B-1508521587746073468.png', 0),
(194, 28, 28, 100000, 'DACEB88221084069912034966628.png', 0),
(195, 28, 29, 100000, '9ED228ABC-3297026903403612063.png', 0),
(198, 27, 38, 50000, 'C8E2D73AB-3699134713552232761.png', 0),
(199, 27, 37, 50000, 'CE3A7DB274691946288831070450.png', 0),
(200, 27, 39, 50000, '39EABD27C4648872835147657672.png', 0),
(635, 48, 53, 29000, '3EAD8CB54861878998.png', 0),
(634, 48, 52, 29000, 'C4BE8D52A355057651948379592.png', 0),
(633, 48, 49, 29000, '849DCAE4B132508203563902650.png', 0),
(632, 48, 48, 29000, 'A8EC8D44B6088620029566953021.png', 0),
(205, 40, 19, 25000, 'C419A0BED15503023907014828.png', 0),
(206, 40, 20, 25000, 'D0EAC0B42288300248391908053.png', 0),
(631, 48, 47, 29000, '4C4B7ADE810986599940480804.png', 0),
(630, 48, 46, 29000, 'E4A68CDB4680472423409542333.png', 0),
(209, 43, 21, 80000, 'EDB3C24A1536587341655166497.png', 0),
(210, 43, 22, 80000, 'B4A3CD22E139300556927496945.png', 0),
(211, 43, 23, 80000, '4CDA2E33B-3906846188354300325.png', 0),
(212, 43, 24, 80000, 'BDE4A234C364928710717837516.png', 0),
(213, 43, 25, 80000, 'EAB5D3C42508960909863493452.png', 0),
(214, 43, 26, 80000, 'AEB3C46D221058981449230774.png', 0),
(215, 43, 27, 80000, '3D24EB7AC403688140411530730.png', 0),
(216, 43, 28, 80000, 'E8AB234DC13855983.png', 0),
(217, 43, 29, 80000, '9CD3BEA24152640710242726692.png', 0),
(629, 48, 50, 29000, '0CAB845DE1336946321679899468.png', 0),
(628, 48, 51, 29000, 'D41B5CAE8238945561733755845.png', 0),
(627, 44, 55, 29000, 'EAC45B5D4-2968753763267020441.png', 0),
(626, 44, 54, 29000, '44CD5B4EA962657300522981138.png', 0),
(625, 44, 53, 29000, '44B3AED5C1411812928058361.png', 0),
(624, 44, 52, 29000, '2DAE445CB468733505077682763.png', 0),
(623, 44, 49, 29000, '49EB4CAD4-4721473748565154997.png', 0),
(228, 44, 19, 29000, '1B44CDEA9811223023054260521.png', 0),
(229, 44, 20, 29000, 'C0BA2D44E467357387966247322.png', 0),
(230, 44, 1, 29000, 'D4CB1EA48094616083839171771.png', 0),
(231, 44, 2, 29000, '44AECB2D94357357860462952.png', 0),
(232, 44, 3, 29000, '3ABCE44D1076291052551749315.png', 0),
(233, 44, 4, 29000, '4DAEB4C4883527928575788863.png', 0),
(234, 44, 5, 29000, '5D44ECAB393855014411611107.png', 0),
(235, 44, 6, 29000, 'DE4CA64B2071981698623863056.png', 0),
(236, 44, 7, 29000, 'B7DAEC446919057866409029265.png', 0),
(237, 44, 8, 29000, 'CE4BD8A43668852317173969029.png', 0),
(622, 44, 48, 29000, '4ECA4BD48833832577918299828.png', 0),
(621, 44, 47, 29000, 'A4ED4C47B258928664960218252.png', 0),
(240, 46, 19, 80000, 'D61EBAC94863364502974791888.png', 0),
(620, 44, 46, 29000, '4D4B64ECA1582535982425979961.png', 0),
(242, 47, 26, 100000, 'A4CE72B6D706304265203322443.png', 0),
(243, 47, 25, 100000, '72EB4DCA5979164191108418367.png', 0),
(619, 44, 50, 29000, '4A4E5C0BD8694301402764182911.png', 0),
(618, 44, 51, 29000, 'E1BDA544C112183834436942705.png', 0),
(617, 42, 55, 30000, '5DABE52C459835436964708359.png', 0),
(616, 42, 54, 30000, '2DEBC445A516139249096865153.png', 0),
(615, 42, 53, 30000, '254AEBDC31099180511852692240.png', 0),
(614, 42, 52, 30000, '24CB2AD5E4320392556908654931.png', 0),
(613, 42, 49, 30000, 'DABC249E4359848658787203842.png', 0),
(612, 42, 48, 30000, '44BC82AED-2312687441232941142.png', 0),
(611, 42, 47, 30000, 'DEC4B247A-20945836338576279.png', 0),
(610, 42, 46, 30000, 'CA644BDE2-253675077409531734.png', 0),
(609, 42, 50, 30000, 'E0AC245BD1221326738118270706.png', 0),
(260, 51, 19, 25000, 'C115ED9BA6868946837163789416.png', 0),
(261, 51, 20, 25000, 'B5D021CAE302496644603458344.png', 0),
(262, 51, 1, 25000, 'C5DBAE113567407368986432829.png', 0),
(263, 51, 2, 25000, '1CA2BDE5-4493673960428400062.png', 0),
(264, 51, 3, 25000, 'CED51B3A128075361.png', 0),
(265, 51, 4, 25000, 'BA54DCE13470666909610361855.png', 0),
(266, 51, 5, 25000, 'BEDCA5514333276916927616245.png', 0),
(267, 51, 6, 25000, 'DBA61E5C-711166882173149180.png', 0),
(268, 51, 7, 25000, 'C7BA5DE1-1556403762469453716.png', 0),
(269, 51, 8, 25000, '1D8CEAB5927034985370676688.png', 0),
(608, 42, 51, 30000, 'E1AD42BC52382129000038282352.png', 0),
(607, 59, 55, 20000, 'DA555EC9B278952063522722147.png', 0),
(606, 59, 54, 20000, '9A5E4CBD5400837384237010280.png', 0),
(605, 59, 53, 20000, '9B3A5ECD5352016912488588239.png', 0),
(344, 60, 34, 0, 'DC3E60BA4803712477904668434.png', 0),
(604, 59, 52, 20000, '2EDBCA559300168166217801714.png', 0),
(603, 59, 49, 20000, '994BDA5CE-965008617758617678.png', 0),
(602, 59, 48, 20000, '49E5AB8DC-2061253934740476682.png', 0),
(601, 59, 47, 20000, 'EDA4C57B9933654810830408456.png', 0),
(600, 59, 46, 20000, '9B4A5EDC65079316402180981.png', 0),
(281, 53, 19, 359000, 'A3DB51E9C4949091286004740785.png', 0),
(282, 53, 20, 359000, 'C05DEBA231174931207268930480.png', 0),
(283, 53, 1, 359000, '15ADBCE31119019442009644340.png', 0),
(284, 53, 2, 359000, '5CA2EBD3161627246970178657.png', 0),
(285, 53, 3, 359000, 'D35C3BEA22874473096961350.png', 0),
(286, 53, 4, 359000, 'B5C3D4EA-2265461138686426605.png', 0),
(287, 53, 5, 359000, 'BED535CA1191244152380134740.png', 0),
(288, 53, 6, 359000, '5B3AEC6D765441523037162330.png', 0),
(289, 53, 7, 359000, 'CDBA53E7-1974166091931188800.png', 0),
(290, 53, 8, 359000, '3EBC8D5A206020087208188935.png', 0),
(599, 59, 50, 20000, '59BEA5D0C4042691648115099035.png', 0),
(598, 59, 51, 20000, '51C5D9BAE2007215325001543184.png', 0),
(597, 26, 55, 250000, '6EBD5AC52-3483335899758581663.png', 0),
(596, 26, 54, 250000, '4D562ABEC437201929620381529.png', 0),
(340, 59, 3, 20000, 'A59BE3CD1544857392021563850.png', 0),
(343, 59, 6, 20000, '596ECADB93042326754267269.png', 0),
(595, 26, 53, 250000, '63CE5DB2A-1866277079388490831.png', 0),
(594, 26, 52, 250000, 'DCA2E652B976113947496926373.png', 0),
(303, 54, 19, 50000, '5CBE4D1A997093951768144874.png', 0),
(304, 54, 20, 50000, '05CEADB24512904257712634527.png', 0),
(305, 54, 1, 50000, 'A5E4B1CD197022707761034130.png', 0),
(306, 54, 2, 50000, 'A4ED5CB21137142000030679037.png', 0),
(307, 54, 3, 50000, 'DE3C45BA791341134746303122.png', 0),
(308, 54, 4, 50000, 'C44A5DBE277423282371347585.png', 0),
(309, 54, 5, 50000, 'B45CDE5A185726670.png', 0),
(310, 54, 6, 50000, '6C4EBD5A1514562817.png', 0),
(311, 54, 7, 50000, 'ED7BCA54972868985690791789.png', 0),
(312, 54, 8, 50000, 'E4C5ABD81673857747334436127.png', 0),
(313, 56, 20, 10000, '2EB05DAC63187883850375084675.png', 0),
(314, 56, 20, 10000, 'B0AEC2D56312486923.png', 0),
(315, 56, 20, 10000, 'B5CEAD260-1213840103533278737.png', 0),
(316, 56, 20, 10000, 'C5A26B0ED402977220601242789.png', 0),
(317, 56, 20, 10000, 'C506ABE2D452936.png', 0),
(318, 56, 20, 10000, 'EC0A56D2B1624996130524618515.png', 0),
(319, 56, 20, 10000, 'A5260BEDC-245861809262275179.png', 0),
(320, 56, 20, 10000, 'EB0A2D6C5121271942506657336.png', 0),
(321, 57, 20, 10000, '2BA0DC75E5235283942105185777.png', 0),
(323, 58, 1, 0, 'DEB81AC585947281.png', 0),
(324, 58, 1, 0, '8C15EBAD468553188830436026.png', 0),
(325, 58, 34, 0, 'DA4538BCE-5957305909122563030.png', 0),
(593, 26, 49, 250000, 'A9C2E6B4D-1850607952875745215.png', 0),
(592, 26, 48, 250000, 'BD2AEC468-391499131069780445.png', 0),
(591, 26, 47, 250000, 'EA7DB62C4431833725198442607.png', 0),
(590, 26, 46, 250000, 'B66D4CA2E95937206386071374.png', 0),
(589, 26, 50, 250000, 'BE056AC2D583796854165417815.png', 0),
(588, 26, 51, 250000, '5C6AEB12D148389809144539186.png', 0),
(587, 22, 55, 100000, '2CE52D5AB481603354405136501.png', 0),
(586, 22, 54, 100000, '5C4AB22DE-4176807799809588223.png', 0),
(585, 22, 53, 100000, '352A2BDEC80086964601249857.png', 0),
(336, 59, 19, 20000, 'DCB59EA91325539630720901574.png', 0),
(337, 59, 20, 20000, 'EA50DC9B21917507700655537441.png', 0),
(338, 59, 1, 20000, 'BD5E91CA5515502060195565985.png', 0),
(339, 59, 2, 20000, '29CEDAB51223752845883783841.png', 0),
(341, 59, 4, 20000, 'D9AB4CE5-3438357403970899737.png', 0),
(342, 59, 5, 20000, '5BAED59C-165077252125298952.png', 0),
(345, 59, 7, 20000, '59DECBA7317723183228203328.png', 0),
(346, 59, 8, 20000, '85DAECB9345951356.png', 0),
(584, 22, 52, 100000, '2E22CBA5D-31964931604639946.png', 0),
(583, 22, 49, 100000, '24CEADB29856341378.png', 0),
(351, 62, 42, 80000, 'B2A24E6CD-522386178543355711.png', 0),
(352, 62, 43, 80000, '6D23BE4CA-3319895804228775431.png', 0),
(353, 62, 44, 80000, '4BCADE642255171768275338114.png', 0),
(354, 62, 45, 80000, 'B26E4C5DA445349625175103960.png', 0),
(582, 22, 48, 100000, 'BA4E28D2C4934961761947680877.png', 0),
(581, 22, 47, 100000, 'E4DC2B27A148447551.png', 0),
(580, 22, 46, 100000, '2ED6BCA24-338469336569766207.png', 0),
(579, 22, 50, 100000, 'AD02C2BE5805828295119749793.png', 0),
(578, 22, 51, 100000, '2C5E21DAB574869118449949099.png', 0),
(577, 21, 55, 109000, 'D55BEC12A1737565944565212996.png', 0),
(576, 21, 54, 109000, 'ABE1D2C45-333230879378505880.png', 0),
(575, 21, 53, 109000, 'D2EBC31A5626658029981800494.png', 0),
(366, 48, 19, 29000, '91DE8CA4B861642105809966221.png', 0),
(367, 48, 20, 29000, 'CB2E0DA844528402553157249366.png', 0),
(368, 48, 1, 29000, '4A8BCED150541439456760182.png', 0),
(369, 48, 2, 29000, '2EDA8CB4-311723739566291365.png', 0),
(370, 48, 3, 29000, '3B8CDA4E1170548023.png', 0),
(371, 48, 4, 29000, '48C4ABDE-441986617734231920.png', 0),
(372, 48, 5, 29000, '8D4ECB5A-2411341371902266529.png', 0),
(373, 48, 6, 29000, 'CE48B6DA532596376.png', 0),
(374, 48, 7, 29000, '47BC8DAE357921546.png', 0),
(375, 48, 8, 29000, '8E8BCA4D434664815008340105.png', 0),
(574, 21, 52, 109000, '2BCA1DE523436252677965978740.png', 0),
(573, 21, 49, 109000, 'BA2EC4D91-1159884627278614863.png', 0),
(572, 21, 48, 109000, 'C2E18DB4A-2613330985431285831.png', 0),
(571, 21, 47, 109000, '124B7ECAD-2812913758324067443.png', 0),
(570, 21, 46, 109000, 'ACD1B426E-652598497918849579.png', 0),
(569, 21, 50, 109000, '21CD50ABE237033373625721779.png', 0),
(568, 21, 51, 109000, '5D112BACE428931883616964270.png', 0),
(567, 20, 55, 100000, 'C2D5AEB0518648311979419548.png', 0),
(566, 20, 54, 100000, 'C2BE0D4A536218982022981620.png', 0),
(565, 20, 53, 100000, 'ECA0B25D339455860521956148.png', 0),
(564, 20, 52, 100000, 'CE22DB5A0163948892723888555.png', 0),
(396, 64, 19, 389000, '9DB1CAE6417384402649682758.png', 0),
(397, 64, 20, 389000, 'B46A0E2CD812371998806124164.png', 0),
(398, 64, 1, 389000, 'A6DCE1B4151744551127354717.png', 0),
(399, 64, 2, 389000, '2ED6B4AC175998043220867258.png', 0),
(400, 64, 3, 389000, 'DBA34C6E138923497856586946.png', 0),
(401, 64, 4, 389000, 'DA4C4E6B357664002107105068.png', 0),
(402, 64, 5, 389000, 'EB56D4CA6174975583654555245.png', 0),
(563, 20, 49, 100000, '02D49CABE764100819984767338.png', 0),
(404, 64, 6, 389000, 'A46BDE6C1548889278568230005.png', 0),
(562, 20, 48, 100000, 'B4D80EA2C67264027943916245.png', 0),
(561, 20, 47, 100000, 'A40CBD72E-1045920166763322422.png', 0),
(560, 20, 46, 100000, 'A4BD6CE02118640265694224005.png', 0),
(408, 64, 7, 389000, '6A7D4BEC345799101194960985.png', 0),
(559, 20, 50, 100000, '5B00AEC2D122520653881804378.png', 0),
(411, 64, 8, 389000, 'ED8B64CA77901939427750045.png', 0),
(558, 20, 51, 100000, '025EA1CBD5057277816060850583.png', 0),
(557, 14, 55, 80000, 'D5E1A4CB555350708560381667.png', 0),
(556, 14, 54, 80000, 'EBA445CD1506150323271654052.png', 0),
(555, 14, 53, 80000, '45BA3EC1D80867827941164367.png', 0),
(416, 42, 19, 30000, 'EAB1C49D2736550987261871148.png', 0),
(554, 14, 52, 80000, 'CB1ED4A25120588665754013460.png', 0),
(418, 42, 20, 30000, '2AED2C4B049750357723407843.png', 0),
(419, 42, 1, 30000, 'D2B1AEC4-4566782092018419316.png', 0),
(553, 14, 49, 80000, 'E944ACBD11621169678.png', 0),
(421, 42, 2, 30000, 'ADC2EB24169745491762188395.png', 0),
(552, 14, 48, 80000, '8BDA4E1C41856218551.png', 0),
(423, 42, 3, 30000, '4D3ABCE2167391407839422468.png', 0),
(425, 42, 4, 30000, 'E24BDA4C17888817251425081.png', 0),
(551, 14, 47, 80000, 'E4BD47C1A-1378240689765386382.png', 0),
(427, 42, 5, 30000, 'B5A24EDC-4970424831854037545.png', 0),
(429, 42, 6, 30000, 'CAD42E6B5982503820343077018.png', 0),
(430, 65, 19, 389000, '6B95E1ADC118977411046986376.png', 0),
(431, 42, 7, 30000, 'B4DC7A2E844909581333375166.png', 0),
(432, 65, 20, 389000, 'C05BA2E6D728593509894125189.png', 0),
(433, 42, 8, 30000, 'BAC4ED28929803013008316727.png', 0),
(434, 65, 1, 389000, 'D6BC5A1E5485686917766170749.png', 0),
(435, 65, 2, 389000, 'A6ED2BC5281111865309098026.png', 0),
(436, 65, 3, 389000, 'CD6A3BE51211846105319667816.png', 0),
(437, 65, 4, 389000, 'BE4D5A6C-4612707422694499547.png', 0),
(438, 65, 5, 389000, 'AB56DE5C4895786508072288765.png', 0),
(439, 65, 6, 389000, '66CEBDA53354984073433280.png', 0),
(440, 65, 7, 389000, 'AD5EC76B-2047765385579997246.png', 0),
(441, 65, 8, 389000, 'CE68BDA5198020407751576109.png', 0),
(550, 14, 50, 80000, '50BA4ED1C1869024833234080208.png', 0),
(549, 14, 51, 80000, 'DAB41C5E1570441122524648251.png', 0),
(548, 15, 55, 119000, '15CD5ABE5-122232025670771512.png', 0),
(547, 15, 54, 119000, '4AE155DCB696843717962240920.png', 0),
(546, 15, 53, 119000, '3551CDABE215125792629050624.png', 0),
(545, 15, 52, 119000, '2CA5B1D5E43877356614116340.png', 0),
(454, 69, 19, 0, '1DEA9CB96864384631089089567.png', 0),
(544, 15, 49, 119000, '1BE5D4A9C225524455930690042.png', 0),
(457, 69, 20, 0, '9B2DACE60-60634894140171708.png', 0),
(543, 15, 48, 119000, 'CDAB145E8108934916015941403.png', 0),
(459, 69, 1, 0, 'AED6BC19496362983090345254.png', 0),
(461, 69, 2, 0, '9BC6A2DE822027692965814311.png', 0),
(542, 15, 47, 119000, 'ADB7EC415748169460167298965.png', 0),
(463, 69, 3, 0, 'B63C9AED-2930246314439398025.png', 0),
(465, 66, 19, 0, 'D6CB9AE61549058256480889660.png', 0),
(466, 66, 20, 0, 'A2B0DE66C-828280494597001567.png', 0),
(467, 69, 4, 0, 'CDE469AB96780166.png', 0),
(468, 69, 5, 0, '96D5ECBA33364967015446294.png', 0),
(469, 66, 1, 0, '6EA1C6DB-6269008375724282184.png', 0),
(470, 66, 2, 0, '2AE66CBD723035281.png', 0),
(471, 69, 6, 0, 'C9DB6EA65935462424891238923.png', 0),
(472, 66, 3, 0, 'C6AEB6D3167357620414834280.png', 0),
(473, 66, 4, 0, 'CDAB46E6443739147969876487.png', 0),
(474, 66, 5, 0, 'C6BAE56D5362297662070758197.png', 0),
(475, 66, 6, 0, '6E6BDC6A482641318613054884.png', 0),
(476, 66, 7, 0, 'EDCAB766604247507384138890.png', 0),
(477, 66, 8, 0, 'B6EAC6D8-1024671242681489128.png', 0),
(478, 69, 8, 0, '6D98BECA524498226.png', 0),
(479, 69, 7, 0, '67A9BCED694923300522533305.png', 0),
(541, 15, 46, 119000, '154BAC6DE495578925793579074.png', 0),
(539, 15, 51, 119000, '5ACE115BD67588808190156023.png', 0),
(540, 15, 50, 119000, 'ACBE51D058622221174106226607.png', 0),
(528, 16, 55, 20000, '5B65DAC1E488798695241219085.png', 0),
(527, 16, 54, 20000, '1A4E5DC6B121942007678396217.png', 0),
(526, 16, 53, 20000, 'E65BDC3A1414367246480887617.png', 0),
(525, 16, 52, 20000, '6ACE52BD1227083873509041906.png', 0),
(524, 16, 49, 20000, '9D4ABC6E11311275717.png', 0),
(523, 16, 48, 20000, '1D8BEC4A6489422146920340979.png', 0),
(492, 70, 19, 389000, 'AED90B17C32417057102541089.png', 0),
(522, 16, 47, 20000, 'BDAC614E71642694109153261300.png', 0),
(494, 70, 20, 389000, '0D07BECA2420400708.png', 0),
(496, 70, 1, 389000, '0E71BDAC73676319253089142.png', 0),
(497, 70, 2, 389000, '0ADEB72C425956545961947834.png', 0),
(521, 16, 46, 20000, 'E46B6A1DC332451012890310766.png', 0),
(499, 70, 3, 389000, 'A70CBE3D19735586679343275.png', 0),
(501, 70, 4, 389000, 'B0AE47DC83656490933108724.png', 0),
(502, 70, 5, 389000, 'BC50ADE72512138447173448661.png', 0),
(520, 16, 50, 20000, 'A0C165DEB-4712907008335414596.png', 0),
(504, 70, 6, 389000, '7E0ADB6C-472511156399372835.png', 0),
(506, 70, 7, 389000, '07DA7BCE293921992687410652.png', 0),
(507, 67, 19, 0, '697AB1CED-87817317364628898.png', 0),
(508, 70, 8, 389000, '0BACED781609909255939033567.png', 0),
(509, 67, 1, 0, '7DEA1C6B393996397299853110.png', 0),
(510, 67, 2, 0, '27ECDB6A45024320200435174.png', 0),
(511, 67, 3, 0, 'D67ECB3A9649156632215144.png', 0),
(512, 67, 4, 0, 'E6CBA74D-3948398150021488917.png', 0),
(513, 67, 5, 0, 'CBD56AE7400321251618652844.png', 0),
(514, 67, 6, 0, 'D7EC6BA6701790846184395405.png', 0),
(515, 67, 7, 0, '7CDEB67A134034889669306099.png', 0),
(516, 67, 8, 0, 'BC67A8DE-98692856424996404.png', 0),
(519, 16, 51, 20000, 'CA615B1ED405207474699006076.png', 0),
(518, 67, 20, 0, '2EC7BD06A13295898.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `province_name` varchar(255) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `country_id`, `province_name`) VALUES
(1, 1, 'JAWA BARAT'),
(2, 1, 'DKI JAKARTA'),
(3, 1, 'JAWA TENGAH'),
(4, 1, 'JAWA TIMUR'),
(5, 1, 'SUMATERA SELATAN'),
(6, 1, 'SUMATERA UTARA'),
(7, 1, 'SUMATERA BARAT'),
(8, 1, 'BENGKULU'),
(9, 1, 'RIAU'),
(10, 1, 'NANGGROE ACEH DARUSSALAM'),
(11, 1, 'BALI'),
(12, 1, 'IRIAN JAYA');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shoe`
--

CREATE TABLE IF NOT EXISTS `shoe` (
  `shoe_id` int(11) NOT NULL AUTO_INCREMENT,
  `shoe_name` varchar(50) NOT NULL,
  `shoe_path` varchar(150) NOT NULL,
  PRIMARY KEY (`shoe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `shoe`
--

INSERT INTO `shoe` (`shoe_id`, `shoe_name`, `shoe_path`) VALUES
(4, 'Oxford', 'rOxdof318656064302335023.png'),
(5, 'Loafer', 'arLofe-984958191172134022.png'),
(6, 'Oxford Cutout', 'urtoCtodfux_O2688046083032543.png'),
(16, 'Under Construction 2', 'tR_on_loelTuadBe266827141368651626.png'),
(17, 'Under Construction', 'e_Pl_BteinlToadte-5583537251554361196.png');

--
-- Triggers `shoe`
--
DROP TRIGGER IF EXISTS `aft_del_shoe`;
DELIMITER //
CREATE TRIGGER `aft_del_shoe` AFTER DELETE ON `shoe`
 FOR EACH ROW BEGIN
	DELETE FROM part_type WHERE shoe_id = OLD.shoe_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `token` varchar(5) NOT NULL,
  `status` varchar(5) NOT NULL,
  UNIQUE KEY `token` (`token`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`token`, `status`) VALUES
('09cbd', 'NO'),
('0bac8', 'NO'),
('0c4eb', 'NO'),
('12318', 'NO'),
('14165', 'NO'),
('152ae', 'NO'),
('1d7b7', 'NO'),
('26f9d', 'NO'),
('270f9', 'NO'),
('27cda', 'NO'),
('2905c', 'NO'),
('2a0de', 'NO'),
('2f4d6', 'NO'),
('31a20', 'NO'),
('32071', 'NO'),
('336a8', 'NO'),
('34cd2', 'NO'),
('3e9ce', 'NO'),
('44450', 'NO'),
('4677d', 'NO'),
('48ff8', 'NO'),
('49148', 'NO'),
('4bcc9', 'NO'),
('4cc5b', 'NO'),
('505e2', 'NO'),
('55079', 'NO'),
('60ba7', 'NO'),
('6710f', 'NO'),
('6fd7b', 'NO'),
('72aa9', 'NO'),
('74681', 'NO'),
('7632a', 'NO'),
('7a8f6', 'NO'),
('7bf48', 'NO'),
('7db9d', 'NO'),
('83637', 'NO'),
('83ea2', 'NO'),
('855e6', 'NO'),
('86e72', 'NO'),
('870fc', 'NO'),
('87c2a', 'NO'),
('89167', 'NO'),
('8b0f6', 'NO'),
('8d5ea', 'NO'),
('8e984', 'NO'),
('91818', 'NO'),
('922e9', 'NO'),
('978cf', 'NO'),
('97e30', 'NO'),
('98e73', 'NO'),
('9d1c1', 'NO'),
('a2077', 'NO'),
('a47c2', 'NO'),
('a55c0', 'NO'),
('aa384', 'NO'),
('ac965', 'NO'),
('ad1d9', 'NO'),
('b1f73', 'NO'),
('b2eb8', 'NO'),
('b9faa', 'NO'),
('ba883', 'NO'),
('bc83e', 'NO'),
('cb856', 'NO'),
('cf432', 'NO'),
('cfb38', 'NO'),
('d1fb3', 'NO'),
('d283e', 'NO'),
('d3556', 'NO'),
('d497c', 'NO'),
('d5b89', 'NO'),
('d5fdd', 'NO'),
('d6647', 'NO'),
('d683f', 'NO'),
('d6998', 'NO'),
('d8981', 'NO'),
('db60f', 'NO'),
('dc4e1', 'NO'),
('dd84c', 'NO'),
('de743', 'NO'),
('e33d5', 'NO'),
('e47a7', 'NO'),
('e6d18', 'NO'),
('e6e5b', 'NO'),
('e7de3', 'NO'),
('e8634', 'NO'),
('eb4ae', 'NO'),
('ed541', 'NO'),
('eda18', 'NO'),
('f09ea', 'NO'),
('f17fa', 'NO'),
('f1eb7', 'NO'),
('f23f0', 'NO'),
('f30a9', 'NO'),
('f3d29', 'NO'),
('f5a13', 'NO'),
('f7dc8', 'NO'),
('f86df', 'NO'),
('fed80', 'NO'),
('ff9d6', 'NO'),
('ffc8f', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `payment_status` enum('NOT PAID','PROCESS','PAID','') NOT NULL DEFAULT 'NOT PAID',
  `delivery_status` enum('NOT SENT','PROCESS','SENT','') NOT NULL DEFAULT 'NOT SENT',
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deliver_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `bank_account` varchar(15) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customer_id`, `transaction_date`, `payment_status`, `delivery_status`, `size`, `quantity`, `deliver_id`, `order_number`, `bank_account`) VALUES
(73, 60, '2014-06-20 10:15:12', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(2, 10, '2014-06-18 21:27:20', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(3, 13, '2014-06-19 10:34:56', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(4, 16, '2014-06-19 10:51:08', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(5, 14, '2014-06-19 11:01:26', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(6, 15, '2014-06-19 11:03:07', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(7, 17, '2014-06-19 11:21:11', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(8, 18, '2014-06-19 11:23:17', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(9, 20, '2014-06-19 11:28:01', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(10, 19, '2014-06-19 11:34:09', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(11, 21, '2014-06-19 11:48:48', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(12, 23, '2014-06-19 12:05:01', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(64, 52, '2014-06-20 03:03:03', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(14, 24, '2014-06-19 14:08:13', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(15, 26, '2014-06-19 17:19:51', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(16, 28, '2014-06-19 20:25:39', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(17, 30, '2014-06-19 20:53:28', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(66, 54, '2014-06-20 03:31:27', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(63, 51, '2014-06-20 02:59:02', 'NOT PAID', 'NOT SENT', 42, 0, 0, '', ''),
(20, 31, '2014-06-19 21:05:52', 'NOT PAID', 'NOT SENT', 43, 0, 0, '', ''),
(21, 32, '2014-06-19 21:07:19', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(65, 53, '2014-06-20 03:08:13', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(36, 43, '2014-06-20 00:47:19', 'NOT PAID', 'NOT SENT', 42, 0, 0, '', ''),
(24, 39, '2014-06-19 22:05:33', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(25, 38, '2014-06-19 22:14:40', 'NOT PAID', 'NOT SENT', 37, 0, 0, '', ''),
(37, 44, '2014-06-20 01:03:57', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(53, 46, '2014-06-20 02:07:04', 'NOT PAID', 'NOT SENT', 41, 0, 0, '', ''),
(59, 47, '2014-06-20 02:12:24', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(48, 45, '2014-06-20 01:38:30', 'NOT PAID', 'NOT SENT', 34, 0, 0, '', ''),
(62, 50, '2014-06-20 02:56:07', 'NOT PAID', 'NOT SENT', 41, 0, 0, '', ''),
(31, 40, '2014-06-19 22:25:16', 'NOT PAID', 'NOT SENT', 36, 0, 0, '', ''),
(35, 42, '2014-06-20 00:45:54', 'NOT PAID', 'NOT SENT', 43, 0, 0, '', ''),
(61, 49, '2014-06-20 02:46:53', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(68, 55, '2014-06-20 03:47:18', 'NOT PAID', 'NOT SENT', 34, 0, 0, '', ''),
(69, 57, '2014-06-20 07:27:07', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(70, 56, '2014-06-20 07:43:06', 'NOT PAID', 'NOT SENT', 34, 0, 0, '', ''),
(71, 58, '2014-06-20 09:20:10', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(72, 59, '2014-06-20 09:22:50', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(74, 61, '2014-06-20 11:43:54', 'NOT PAID', 'NOT SENT', 34, 0, 0, '', ''),
(75, 62, '2014-06-20 12:15:14', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(76, 63, '2014-06-20 13:05:12', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(77, 64, '2014-06-20 16:26:53', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(78, 65, '2014-06-20 17:11:38', 'NOT PAID', 'NOT SENT', 36, 0, 0, '', ''),
(79, 66, '2014-06-20 17:55:55', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(80, 67, '2014-06-20 19:02:04', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(81, 70, '2014-06-20 20:54:01', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(82, 71, '2014-06-20 21:25:46', 'NOT PAID', 'NOT SENT', 38, 0, 0, '', ''),
(83, 73, '2014-06-20 22:08:22', 'NOT PAID', 'NOT SENT', 40, 0, 0, '', ''),
(84, 74, '2014-06-21 01:23:46', 'NOT PAID', 'NOT SENT', 39, 0, 0, '', ''),
(85, 43, '2014-07-12 23:08:06', 'NOT PAID', 'NOT SENT', 34, 1, 1, '#006f37180ad6eecc802', '0'),
(86, 43, '2014-07-12 23:08:06', 'NOT PAID', 'NOT SENT', 34, 6, 1, '#006f37180ad6eecc802', '0'),
(87, 43, '2014-07-12 23:30:32', 'NOT PAID', 'NOT SENT', 34, 1, 2, '#40c74d280ce133fd61d', 'BRI'),
(88, 43, '2014-07-12 23:30:32', 'NOT PAID', 'NOT SENT', 34, 1, 2, '#40c74d280ce133fd61d', 'BRI'),
(89, 42, '2014-07-15 12:37:30', 'NOT PAID', 'NOT SENT', 43, 1, 3, '#22cbd31628d97a07b18', 'MANDIRI'),
(90, 42, '2014-07-15 12:37:30', 'NOT PAID', 'NOT SENT', 34, 1, 3, '#22cbd31628d97a07b18', 'MANDIRI'),
(91, 43, '2014-07-16 21:29:14', 'NOT PAID', 'NOT SENT', 34, 1, 4, '#abff7d525f6223a5d33', 'BNI'),
(92, 43, '2014-07-16 21:29:14', 'NOT PAID', 'NOT SENT', 34, 1, 4, '#abff7d525f6223a5d33', 'BNI'),
(93, 43, '2014-07-17 03:18:28', 'NOT PAID', 'NOT SENT', 34, 1, 5, '#35A4046F806C5015791', '0'),
(94, 43, '2014-07-17 03:18:28', 'NOT PAID', 'NOT SENT', 34, 1, 5, '#35A4046F806C5015791', '0'),
(95, 43, '2014-07-17 03:34:31', 'NOT PAID', 'NOT SENT', 34, 1, 6, '#07EE7EC40412B015536', 'MANDIRI'),
(96, 43, '2014-07-17 03:34:31', 'PAID', 'NOT SENT', 34, 1, 6, '#07EE7EC40412B015536', 'MANDIRI');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `pattern_color_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  PRIMARY KEY (`pattern_color_id`,`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`pattern_color_id`, `transaction_id`) VALUES
(20, 5),
(20, 7),
(20, 8),
(20, 35),
(20, 53),
(20, 63),
(20, 68),
(20, 71),
(20, 73),
(20, 78),
(20, 85),
(20, 87),
(20, 92),
(20, 94),
(20, 96),
(22, 20),
(22, 70),
(22, 84),
(23, 6),
(23, 25),
(23, 69),
(25, 8),
(25, 35),
(25, 53),
(25, 68),
(25, 78),
(25, 85),
(26, 69),
(27, 71),
(30, 7),
(33, 5),
(33, 6),
(33, 70),
(33, 84),
(34, 8),
(34, 35),
(34, 53),
(34, 68),
(34, 71),
(34, 78),
(34, 85),
(43, 5),
(43, 7),
(65, 7),
(65, 8),
(65, 35),
(65, 53),
(65, 68),
(65, 78),
(65, 85),
(69, 84),
(73, 69),
(74, 71),
(75, 8),
(75, 53),
(75, 70),
(75, 71),
(75, 78),
(85, 5),
(85, 7),
(85, 35),
(106, 63),
(106, 87),
(106, 92),
(106, 94),
(106, 96),
(109, 73),
(116, 87),
(116, 92),
(116, 94),
(116, 96),
(122, 73),
(145, 87),
(145, 92),
(145, 94),
(145, 96),
(146, 63),
(155, 20),
(155, 25),
(155, 63),
(155, 73),
(155, 87),
(155, 92),
(155, 94),
(155, 96),
(158, 15),
(158, 24),
(158, 48),
(158, 59),
(158, 64),
(158, 72),
(158, 86),
(158, 88),
(158, 89),
(158, 91),
(158, 93),
(158, 95),
(177, 15),
(177, 24),
(177, 48),
(177, 59),
(177, 64),
(177, 72),
(177, 86),
(177, 88),
(177, 89),
(177, 91),
(177, 93),
(177, 95),
(179, 90),
(180, 77),
(187, 11),
(187, 12),
(187, 16),
(189, 3),
(189, 74),
(189, 81),
(194, 10),
(194, 90),
(196, 66),
(196, 77),
(209, 20),
(209, 25),
(209, 63),
(209, 87),
(209, 92),
(209, 94),
(209, 96),
(212, 73),
(230, 64),
(231, 66),
(336, 7),
(342, 71),
(344, 2),
(344, 4),
(344, 6),
(344, 9),
(344, 11),
(344, 17),
(344, 21),
(344, 31),
(344, 36),
(344, 37),
(344, 61),
(344, 62),
(344, 65),
(344, 69),
(344, 75),
(344, 79),
(344, 80),
(344, 82),
(344, 83),
(351, 15),
(351, 24),
(351, 48),
(351, 64),
(351, 77),
(351, 86),
(351, 88),
(351, 89),
(351, 90),
(351, 91),
(351, 93),
(351, 95),
(352, 12),
(352, 59),
(352, 72),
(353, 3),
(353, 10),
(353, 11),
(353, 16),
(353, 66),
(353, 74),
(353, 81),
(366, 77),
(397, 76),
(401, 14),
(401, 83),
(457, 2),
(494, 75),
(518, 2),
(522, 84),
(524, 70),
(541, 5),
(544, 70),
(546, 6),
(549, 69),
(551, 84),
(553, 6),
(554, 68),
(554, 85),
(560, 25),
(563, 20),
(569, 73),
(570, 25),
(572, 20),
(579, 20),
(580, 25),
(587, 63),
(588, 74),
(591, 3),
(592, 66),
(592, 81),
(595, 10),
(595, 12),
(595, 16),
(596, 11),
(598, 78),
(600, 5),
(603, 70),
(605, 6),
(605, 84),
(607, 8),
(607, 35),
(607, 53),
(607, 68),
(607, 85),
(611, 79),
(615, 17),
(617, 4),
(617, 14),
(617, 76),
(619, 10),
(621, 74),
(621, 81),
(625, 12),
(625, 72),
(627, 15),
(627, 16),
(627, 24),
(627, 48),
(627, 59),
(627, 86),
(627, 88),
(627, 89),
(627, 90),
(627, 91),
(627, 93),
(627, 95),
(637, 3),
(647, 9),
(655, 17),
(656, 4),
(657, 14),
(657, 76),
(658, 21),
(661, 79),
(667, 9),
(667, 14),
(667, 31),
(667, 76),
(668, 21),
(676, 2),
(677, 9),
(680, 31),
(680, 80),
(681, 36),
(682, 79),
(685, 17),
(687, 4),
(687, 37),
(687, 61),
(687, 62),
(687, 65),
(687, 82);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
