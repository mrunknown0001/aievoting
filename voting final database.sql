-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2015 at 11:33 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pass`, `id`) VALUES
('admin', 'openadmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `student_num` varchar(11) NOT NULL,
  `party` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `pID` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `pname`, `pID`) VALUES
(2, 'President', 'PRES.'),
(3, 'Vice President', 'VP'),
(4, 'Secretary', 'SEC.'),
(5, 'Treasurer', 'TREAS.'),
(6, 'Auditor', 'AUD.'),
(7, 'Business Manager', 'BUSMGR'),
(8, 'PRO', 'PRO'),
(9, '1st Year Representative', '1STREP'),
(10, '2nd Year Representative', '2NDREP');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `student_num` varchar(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `position` varchar(30) NOT NULL,
  `vcount` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `student_num` varchar(11) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `student_num`, `pin`, `fname`, `lname`, `year`) VALUES
(1, 'TC15-01280', '1280', 'Ejercito', 'BERNARDO', 'First'),
(2, 'TC15-01271', '1271', 'Aiza', 'Pancho', 'First'),
(3, 'TC15-01278', '1278', 'Camille ann', 'Carlos', 'First'),
(4, 'TC15-01276', '1276', 'Juvy rose', 'Salmo', 'First'),
(5, 'TC15-01277', '1277', 'Piel anne mentiza', 'Pascual', 'First'),
(6, 'TC15-01286', '1286', 'Jefferson blue', 'Almanzor', 'First'),
(7, 'TC15-01285', '1285', 'Aiza', 'Cerbito', 'First'),
(8, 'TC15-01287', '1287', 'Laila', 'Taguines', 'First'),
(9, 'TC15-01297', '1297', 'Janssen', 'Garcia', 'First'),
(10, 'TC15-01303', '1303', 'Phem john', 'Almanzor', 'First'),
(11, 'TC15-01310', '1310', 'Jobelyn', 'Abregoso', 'First'),
(12, 'TC15-01311', '1311', 'Jojie', 'Hamada', 'First'),
(13, 'TC15-01289', '1289', 'Mark anthony', 'Pagsuguinon', 'First'),
(14, 'TC15-01324', '1324', 'Reinhard', 'Reyes', 'First'),
(15, 'TC15-01283', '1283', 'Rhandell ', 'Malonzo', 'First'),
(16, 'TC15-01282', '1282', 'Angel', 'Maliwat', 'First'),
(17, 'TC15-01275', '1275', 'Neslyn', 'Rombaoa', 'First'),
(18, 'TC15-01279', '1279', 'John philip', 'Nunag', 'First'),
(19, 'TC15-01281', '1281', 'Ralph john', 'Tundayag', 'First'),
(20, 'TC15-01273', '1273', 'Walter', 'Salazar', 'First'),
(21, 'TC15-01272', '1272', 'Harvy maine', 'Punongbayan', 'First'),
(22, 'TC15-01284', '1284', 'Mary JOy', 'Vergara', 'First'),
(23, 'TC12-00943', 'TCED', 'DANNY ', 'ESPELICO', 'First'),
(25, 'TC15-01302', '2031', 'CACHOLA', 'OLIVER', 'First'),
(26, 'TC15-01304', '4013', 'ESPINOSA', 'KERWIN', 'First'),
(27, 'TC15-01308', '8031', 'IAN CHARLIE', 'MEDINA', 'First'),
(28, 'TC15-01301', 'M131', 'KRISTOFFER', 'MAGBAG', 'First'),
(29, 'TC15-01298', '9812', 'Kennedy', 'Dizon', 'First'),
(30, 'TC15-01307', 'd713', 'Michael', 'Dela pasiion', 'First'),
(31, 'TC15-01350', 'c531', 'Jeric', 'Canlas', 'First'),
(32, 'TC15-01299', 'a921', 'Lester', 'Adriano', 'First'),
(33, 'TC15-01295', '9512', 'Montojo', 'Wendell', 'First'),
(34, 'TC15-01291', 'f921', 'Christian edmon', 'Faustino', 'First'),
(35, 'TC15-01312', '1213', 'Shaira', 'Radaza', 'First'),
(36, 'TC15-01315', '5311', 'Tristan Maine', 'Balancio', 'First'),
(37, 'TC15-01313', 'c3a1', 'Alfred', 'Carlos', 'First'),
(38, 'TC15-01270', 'a712', 'Agnes', 'Miranda', 'First'),
(39, 'TC15-01288', 't128', 'Jude ren', 'Tongol', 'First'),
(40, 'TC15-01305', 'e013', 'Edmar', 'Andes', 'First'),
(41, 'TC15-01306', 'r031', 'Eric jude', 'RobiÃ±os', 'First'),
(42, 'TC15-1296', '9291', 'Jessa', 'Eumague', 'First'),
(43, 'TC15-01294', '2194', 'Christine joy', 'Cabrera', 'First'),
(44, 'TC15-01292', 'n912', 'Nestor', 'Galang jr.', 'First'),
(45, 'TC15-01243', '4312', 'Joanna', 'Ballard', 'First'),
(46, 'TC15-01290', 'c921', 'Shanienina', 'Caliboso', 'First'),
(47, 'TC15-01314', '3344', 'Marjorie', 'Gamit', 'First'),
(48, 'TC12-00939', '939s', 'Stephanie', 'Daliva', 'Second'),
(49, 'TC12-00997', '9n97', 'Nessie', 'Golotero', 'Second'),
(50, 'TC15-01316', 'tj15', 'Jaizelle mae', 'Tagara', 'First'),
(51, 'TC15-01317', 'rr17', 'Rosana', 'Romarate', 'First'),
(52, 'TC15-01318', 'rp18', 'Romeylyn', 'Puyat', 'First'),
(53, 'TC15-01319', 'KrS9', 'Kimberly rose', 'Santiago', 'First'),
(54, 'TC15-01323', 'M3J3', 'Joshua', 'Mariano', 'First '),
(55, 'TC15-01322', 'V3L2', 'Lea', 'Villane', 'First'),
(56, 'TC15-01321', 'N13S', 'Sam', 'Navallasca', 'First'),
(57, 'TC15-01320', 'rR12', 'Rhossmer', 'Amistroso', 'First'),
(58, 'TC14-01201', 'Q126', 'Genesis', 'Quiambao', 'Second'),
(59, 'TC14-01203', 'J120', 'Jodie-Lyn', 'Lozano', 'Second'),
(60, 'TC14-01202', 'GLJ2', 'Laren Jem', 'Garcia', 'Second'),
(61, 'TC14-01207', '7120', 'Elaine', 'Sumagaysay', 'Second'),
(62, 'TC14-01216', '1612', 'Marjorie', 'Bangis', 'Second'),
(63, 'TC14-01218', 'G12K', 'Krislyn', 'Galvez', 'Second'),
(64, 'TC14-01219', '12SC', 'Carlo June', 'Santos', 'Second'),
(65, 'TC14-01222', 'VV22', 'Veronica', 'Vasquez', 'Second'),
(66, 'TC14-01233', 'BABE', 'Alyssa maren', 'Tan', 'Second'),
(67, 'TC14-01210', 'BJ10', 'Joewin', 'Bungay', 'Second'),
(68, 'TC14-01250', 'zZz0', 'Nyjelle', 'Zabala', 'Second'),
(69, 'TC14-01255', '125G', 'Myrna', 'Granil', 'Second'),
(70, 'TC14-01263', 'RBC3', 'Bryan Christian', 'Rodriguez', 'Second'),
(71, 'TC14-01184', '118m', 'JOHANA mARIE', 'MAGDAY', 'Second'),
(72, 'TC13-01189', 'PJ11', 'JeLINE SHANE', 'PINGOL', 'Second'),
(73, 'TC14-01267', 'm67M', 'Angelo joshua', 'Macaorog', 'Second'),
(74, 'TC13-01119', 'M111', 'Patrick', 'Molina', 'Second'),
(75, 'TC14-01196', 'c11E', 'Ellking', 'Cabatbat', 'Second'),
(76, 'TC14-01198', '119G', 'Rizza', 'Gueco', 'Second'),
(77, 'TC14-01204', 'N012', 'Nathalia', 'Nicdao', 'Second'),
(78, 'TC14-01205', 'GUY2', 'Cyrone jude', 'Santos', 'Second'),
(79, 'TC14-01209', 'GUY5', 'Mark anthony', 'Santos', 'Second'),
(80, 'TC14-01217', 'Guys', 'Mharrold', 'Miclat', 'Second'),
(81, 'TC14-01214', 'GuyS', 'Joharah', 'Joaquin', 'Second'),
(82, 'TC15-01274', 'chan', 'Reynalene', 'Mangiral', 'First'),
(83, 'TC14-01213', '1213', 'Roosevelt', 'Casal', 'Second'),
(84, 'TC14-01212', '12Ar', 'John carlo', 'Arzadon', 'Second'),
(85, 'TC14-01261', 'M612', 'Jovelle', 'Mercado', 'Second'),
(86, 'TC14-01226', 'budz', 'Eduardo', 'Latoza Jr', 'Second'),
(87, 'TC14-01236', 'kape', 'Rhea', 'Reyes', 'Second'),
(88, 'TC14-01237', 'EJ37', 'Judy ann', 'Elpa', 'Second'),
(89, 'TC14-01238', 'CJGS', 'Novelie joy', 'Dela cruz', 'Second'),
(90, 'TC14-01240', 'PUnO', 'Jamaila', 'Puno', 'Second'),
(91, 'TC14-01241', 'AKA2', 'Kamella', 'Acosta', 'Second'),
(92, 'TC14-01239', '39E9', 'NiÃ±o', 'Estigoy', 'Second'),
(93, 'TC14-01244', '1244', 'Hurry', 'Sapad', 'Second'),
(94, 'TC14-01243', 'D43R', 'Rachel joy', 'De vera', 'Second'),
(95, 'TC14-01227', 'G227', 'Nathaniel', 'Ganzagan', 'Second'),
(96, 'TC14-01248', 'QA48', 'Queenie rose', 'Adan', 'Second'),
(97, 'TC14-01256', 'Rj56', 'Joshua levi', 'Ramos', 'Second'),
(98, 'TC14-01257', 'Mj57', 'Joey', 'Marquez       ', 'Second'),
(99, 'TC14-01258', 'Q58L', 'Lyndon', 'Quizon', 'Second'),
(100, 'TC14-01262', 'y12m', 'Mark anthony', 'Yalong', 'Second'),
(101, 'TC14-01264', '64Im', 'Ma. kristina', 'Ines', 'Second'),
(102, 'TC14-01266', 'Pi26', 'Jayson', 'Palasigue jr.', 'Second'),
(103, 'TC14-01192', 'chan', 'Jane', 'Santos', 'Second'),
(104, 'TC14-01232', 'JJ32', 'Jake', 'Juliano', 'Second'),
(105, 'TC14-01247', '1247', 'John paul', 'Galicia', 'Second'),
(106, 'TC14-00645', 'LM45', 'Ma. magdalena', 'Labasan', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE IF NOT EXISTS `voted` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `student_num` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
