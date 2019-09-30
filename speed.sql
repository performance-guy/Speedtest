-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2019 at 01:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speed`
--

-- --------------------------------------------------------

--
-- Table structure for table `lead_data`
--

DROP TABLE IF EXISTS `lead_data`;
CREATE TABLE IF NOT EXISTS `lead_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Email_Address` varchar(256) NOT NULL,
  `First_Name` varchar(256) NOT NULL,
  `Last_Name` varchar(256) NOT NULL,
  `Phone_Number` varchar(256) NOT NULL,
  `Company_Name` varchar(256) NOT NULL,
  `Job_Function` enum('Development','Marketing','Design','SysAdmin/IT','Finance','Project Management','Other') NOT NULL,
  `Organization_Type` enum('Agency','Freelancer/Consultant','Media/Publishing','Ecommerce','Higher Education','B2B','B2C','Other') NOT NULL,
  `Website_Owner` tinyint(1) NOT NULL,
  `Your_Website` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_data`
--

INSERT INTO `lead_data` (`ID`, `Work_Email_Address`, `First_Name`, `Last_Name`, `Phone_Number`, `Company_Name`, `Job_Function`, `Organization_Type`, `Website_Owner`, `Your_Website`) VALUES
(1, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(2, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(3, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(4, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(5, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(6, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(7, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(8, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(9, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(10, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(11, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(12, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(13, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(14, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(15, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(16, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(17, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(18, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com'),
(19, 'abc@gmail.com', 'John', 'Paul', '+169318528', 'Kinsta', 'Marketing', 'Agency', 1, 'www.kinsta.com');

-- --------------------------------------------------------

--
-- Table structure for table `website_test`
--

DROP TABLE IF EXISTS `website_test`;
CREATE TABLE IF NOT EXISTS `website_test` (
  `ID` int(11) NOT NULL,
  `F_Cache` int(11) NOT NULL,
  `F_Load_Time` double NOT NULL,
  `F_Render_Time` double NOT NULL,
  `F_Page_Size` int(11) NOT NULL,
  `F_Request` int(11) NOT NULL,
  `R_Cache` int(11) NOT NULL,
  `R_Load_Time` double NOT NULL,
  `R_Render_Time` double NOT NULL,
  `R_Page_Size` int(11) NOT NULL,
  `R_Request` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_test`
--

INSERT INTO `website_test` (`ID`, `F_Cache`, `F_Load_Time`, `F_Render_Time`, `F_Page_Size`, `F_Request`, `R_Cache`, `R_Load_Time`, `R_Render_Time`, `R_Page_Size`, `R_Request`) VALUES
(1, 76, 9077, 4100, 1135093, 79, 0, 3019, 1100, 53254, 17),
(2, 76, 8221, 3500, 1134720, 79, 0, 2630, 1000, 52112, 14),
(3, 76, 8136, 3700, 1134728, 79, -1, 2861, 1100, 30617, 12),
(4, 76, 8241, 3800, 1134728, 79, 0, 3184, 1100, 52123, 14),
(5, 76, 8282, 3800, 1134728, 79, -1, 2833, 1000, 30679, 12),
(6, 76, 8153, 3500, 1134731, 79, -1, 2671, 1100, 30619, 12),
(7, 76, 8012, 3500, 1134726, 79, 0, 2750, 1000, 52122, 14),
(8, 76, 8342, 3500, 1134729, 79, 0, 3108, 1100, 52122, 14),
(9, 76, 8045, 3500, 1135531, 80, -1, 2831, 1300, 30617, 12),
(10, 76, 8067, 3600, 1134732, 79, 0, 2832, 1000, 52121, 14),
(11, 76, 7995, 3800, 1135512, 79, 0, 2579, 1000, 52052, 14),
(12, 76, 8333, 3800, 1134723, 79, 0, 2955, 1300, 52047, 14),
(13, 76, 8113, 3500, 1135511, 79, -1, 2602, 1100, 30622, 13),
(14, 76, 9886, 3800, 1134721, 79, 0, 3026, 1000, 52112, 14),
(15, 76, 8184, 3600, 1135058, 79, 0, 3555, 1700, 92569, 17),
(16, 76, 8318, 3700, 1134720, 82, -1, 2824, 1100, 30611, 12),
(17, 76, 7952, 3400, 1134720, 83, 0, 3051, 1200, 52077, 14),
(18, 76, 8242, 3600, 1135080, 79, 0, 2994, 1100, 53243, 16),
(19, 76, 8146, 3400, 1134719, 79, 0, 2967, 1200, 63379, 16);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
