-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 03:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabulation`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sponsor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `number`, `name`, `age`, `sponsor`) VALUES
(1, 1, 'JELIE SAJULLA MALMIS', 18, 'OCIGEA'),
(2, 2, 'IRISH RAINE LACHICA SESCON', 23, 'DUANE JOHN LENDING CORPORATION'),
(3, 3, 'MA. EULA MAE CALAMBA AGOHAYON', 21, 'KENJOLO FARM AND RECREATION RESORT'),
(4, 4, 'MARY MAIME MATIANO BAHIAN', 20, 'LIGA NG MGA BARANGAY/ABC'),
(5, 5, 'MARY EASTER JOY SARIGUMBA ANTASUDA', 22, 'MOFBA'),
(6, 6, 'SHERYL LYNN MAGLINTE QUILAB', 23, 'SBU'),
(7, 7, 'GERLYFE UBA AJET', 25, 'OAIS'),
(8, 8, 'EULA MAE DOCUMENTA SACEDA', 19, 'OCEMCO'),
(9, 9, 'JEHAN IVY IBASAN', 21, 'SK'),
(10, 10, 'ZOELLAH LEOPOLDO ABUTON', 20, 'FEDERATED PUBLIC MARKET VENDORS ASSOCIATION'),
(11, 11, 'CHARLENE MAE RITCHA PEROCHO', 17, 'DEPED'),
(12, 12, 'CHARLENE MAE TUBLE FLORES', 23, 'OLEC');

-- --------------------------------------------------------

--
-- Table structure for table `evening_gown`
--

CREATE TABLE `evening_gown` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evening_gown`
--

INSERT INTO `evening_gown` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(73, 1, 0, 52.5, '11.00', ''),
(74, 2, 0, 54, '12.00', ''),
(75, 3, 0, 42.5, '10.00', ''),
(76, 4, 0, 28.5, '6.00', ''),
(77, 6, 0, 36.5, '9.00', ''),
(78, 7, 0, 27, '5.00', ''),
(79, 9, 0, 26, '4.00', ''),
(80, 5, 0, 32.5, '7.00', ''),
(81, 11, 0, 19, '2.00', ''),
(82, 12, 0, 15, '1.00', ''),
(83, 8, 0, 34.5, '8.00', ''),
(84, 10, 0, 22, '3.00', ''),
(85, 1, 2, 1, '11.50', 'locked'),
(86, 2, 2, 2, '9.50', 'locked'),
(87, 3, 2, 3, '8.00', 'locked'),
(88, 4, 2, 4, '7.00', 'locked'),
(89, 5, 2, 1, '11.50', 'locked'),
(90, 6, 2, 2, '9.50', 'locked'),
(91, 7, 2, 10, '1.50', 'locked'),
(92, 8, 2, 6, '6.00', 'locked'),
(93, 9, 2, 7, '5.00', 'locked'),
(94, 10, 2, 8, '4.00', 'locked'),
(95, 11, 2, 9, '3.00', 'locked'),
(96, 12, 2, 10, '1.50', 'locked'),
(97, 2, 4, 2, '11.50', 'unlocked'),
(98, 3, 4, 4, '7.00', 'unlocked'),
(99, 1, 4, 2, '11.50', 'unlocked'),
(100, 4, 4, 4, '7.00', 'unlocked'),
(101, 5, 4, 5, '4.50', 'unlocked'),
(102, 6, 4, 6, '2.50', 'unlocked'),
(103, 7, 4, 10, '1.00', 'unlocked'),
(104, 8, 4, 3, '9.50', 'unlocked'),
(105, 9, 4, 3, '9.50', 'unlocked'),
(106, 10, 4, 4, '7.00', 'unlocked'),
(107, 11, 4, 5, '4.50', 'unlocked'),
(108, 12, 4, 6, '2.50', 'unlocked'),
(109, 1, 5, 1, '12.00', 'unlocked'),
(110, 2, 5, 2, '10.50', 'unlocked'),
(111, 3, 5, 3, '8.50', 'unlocked'),
(112, 4, 5, 4, '6.50', 'unlocked'),
(113, 5, 5, 6, '3.50', 'unlocked'),
(114, 6, 5, 2, '10.50', 'unlocked'),
(115, 7, 5, 3, '8.50', 'unlocked'),
(116, 8, 5, 4, '6.50', 'unlocked'),
(117, 9, 5, 5, '5.00', 'unlocked'),
(118, 10, 5, 6, '3.50', 'unlocked'),
(119, 11, 5, 7, '2.00', 'unlocked'),
(120, 12, 5, 8, '1.00', 'unlocked'),
(121, 1, 7, 1, '12.00', 'unlocked'),
(122, 2, 7, 2, '10.50', 'unlocked'),
(123, 3, 7, 3, '8.50', 'unlocked'),
(124, 4, 7, 4, '7.00', 'unlocked'),
(125, 5, 7, 5, '5.50', 'unlocked'),
(126, 6, 7, 6, '3.50', 'unlocked'),
(127, 7, 7, 2, '10.50', 'unlocked'),
(128, 8, 7, 3, '8.50', 'unlocked'),
(129, 10, 7, 5, '5.50', 'unlocked'),
(130, 9, 7, 6, '3.50', 'unlocked'),
(131, 11, 7, 7, '2.00', 'unlocked'),
(132, 12, 7, 8, '1.00', 'unlocked'),
(133, 1, 6, 5, '5.50', 'unlocked'),
(134, 2, 6, 1, '12.00', 'unlocked'),
(135, 3, 6, 2, '10.50', 'unlocked'),
(136, 4, 6, 10, '1.00', 'unlocked'),
(137, 5, 6, 4, '7.50', 'unlocked'),
(138, 6, 6, 2, '10.50', 'unlocked'),
(139, 7, 6, 5, '5.50', 'unlocked'),
(140, 8, 6, 6, '4.00', 'unlocked'),
(141, 9, 6, 7, '3.00', 'unlocked'),
(142, 10, 6, 8, '2.00', 'unlocked'),
(143, 11, 6, 4, '7.50', 'unlocked'),
(144, 12, 6, 3, '9.00', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `final_round`
--

CREATE TABLE `final_round` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_round`
--

INSERT INTO `final_round` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(1, 10, 0, 13, '2.00', ''),
(2, 9, 0, 14, '3.00', ''),
(3, 6, 0, 17, '4.00', ''),
(4, 7, 0, 18.5, '5.00', ''),
(5, 5, 0, 12.5, '1.00', ''),
(6, 5, 7, 1, '5.00', 'unlocked'),
(7, 6, 7, 10, '1.00', 'unlocked'),
(8, 7, 7, 5, '2.00', 'unlocked'),
(9, 9, 7, 3, '4.00', 'unlocked'),
(10, 10, 7, 5, '3.00', 'unlocked'),
(11, 5, 2, 10, '1.50', 'locked'),
(12, 6, 2, 1, '5.00', 'locked'),
(13, 7, 2, 3, '4.00', 'locked'),
(14, 9, 2, 4, '3.00', 'locked'),
(15, 10, 2, 10, '1.50', 'locked'),
(16, 5, 4, 10, '1.00', 'unlocked'),
(17, 6, 4, 5, '2.00', 'unlocked'),
(18, 7, 4, 2, '4.50', 'unlocked'),
(19, 9, 4, 3, '3.00', 'unlocked'),
(20, 10, 4, 2, '4.50', 'unlocked'),
(21, 5, 5, 5, '4.00', 'unlocked'),
(22, 6, 5, 1, '5.00', 'unlocked'),
(23, 7, 5, 6, '3.00', 'unlocked'),
(24, 9, 5, 7, '2.00', 'unlocked'),
(25, 10, 5, 8, '1.00', 'unlocked'),
(26, 5, 6, 7, '1.00', 'unlocked'),
(27, 6, 6, 2, '4.00', 'unlocked'),
(28, 7, 6, 1, '5.00', 'unlocked'),
(29, 9, 6, 6, '2.00', 'unlocked'),
(30, 10, 6, 4, '3.00', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `production_attire`
--

CREATE TABLE `production_attire` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_attire`
--

INSERT INTO `production_attire` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(73, 1, 0, 54, '12.00', ''),
(74, 2, 0, 48, '11.00', ''),
(75, 3, 0, 37.5, '9.50', ''),
(76, 4, 0, 28.5, '6.00', ''),
(77, 5, 0, 31, '7.00', ''),
(78, 7, 0, 22.5, '2.00', ''),
(79, 8, 0, 37.5, '9.50', ''),
(80, 9, 0, 32, '8.00', ''),
(81, 6, 0, 22, '1.00', ''),
(82, 10, 0, 25, '3.00', ''),
(83, 11, 0, 26.5, '5.00', ''),
(84, 12, 0, 25.5, '4.00', ''),
(85, 2, 4, 7, '4.50', 'unlocked'),
(86, 3, 4, 8, '2.50', 'unlocked'),
(87, 1, 4, 4, '9.00', 'unlocked'),
(88, 4, 4, 8, '2.50', 'unlocked'),
(89, 5, 4, 3, '11.00', 'unlocked'),
(90, 6, 4, 7, '4.50', 'unlocked'),
(91, 7, 4, 6, '6.00', 'unlocked'),
(92, 8, 4, 5, '7.00', 'unlocked'),
(93, 9, 4, 4, '9.00', 'unlocked'),
(94, 10, 4, 2, '12.00', 'unlocked'),
(95, 11, 4, 4, '9.00', 'unlocked'),
(96, 12, 4, 10, '1.00', 'unlocked'),
(97, 1, 2, 2, '9.00', 'locked'),
(98, 2, 2, 1, '11.50', 'locked'),
(99, 3, 2, 2, '9.00', 'locked'),
(100, 4, 2, 3, '6.50', 'locked'),
(101, 5, 2, 4, '5.00', 'locked'),
(102, 6, 2, 5, '4.00', 'locked'),
(103, 7, 2, 6, '3.00', 'locked'),
(104, 8, 2, 2, '9.00', 'locked'),
(105, 9, 2, 3, '6.50', 'locked'),
(106, 10, 2, 8, '2.00', 'locked'),
(107, 11, 2, 9, '1.00', 'locked'),
(108, 12, 2, 1, '11.50', 'locked'),
(109, 1, 5, 1, '12.00', 'unlocked'),
(110, 2, 5, 2, '10.00', 'unlocked'),
(111, 3, 5, 4, '7.00', 'unlocked'),
(112, 4, 5, 5, '4.00', 'unlocked'),
(113, 5, 5, 10, '1.50', 'unlocked'),
(114, 6, 5, 5, '4.00', 'unlocked'),
(115, 9, 5, 2, '10.00', 'unlocked'),
(116, 7, 5, 4, '7.00', 'unlocked'),
(117, 10, 5, 5, '4.00', 'unlocked'),
(118, 8, 5, 2, '10.00', 'unlocked'),
(119, 11, 5, 4, '7.00', 'unlocked'),
(120, 12, 5, 10, '1.50', 'unlocked'),
(121, 1, 6, 1, '12.00', 'unlocked'),
(122, 2, 6, 2, '11.00', 'unlocked'),
(123, 3, 6, 4, '9.50', 'unlocked'),
(124, 4, 6, 5, '7.50', 'unlocked'),
(125, 5, 6, 5, '7.50', 'unlocked'),
(126, 6, 6, 6, '5.50', 'unlocked'),
(127, 7, 6, 7, '3.50', 'unlocked'),
(128, 8, 6, 4, '9.50', 'unlocked'),
(129, 10, 6, 10, '1.00', 'unlocked'),
(130, 9, 6, 6, '5.50', 'unlocked'),
(131, 11, 6, 7, '3.50', 'unlocked'),
(132, 12, 6, 8, '2.00', 'unlocked'),
(133, 1, 7, 1, '12.00', 'unlocked'),
(134, 2, 7, 2, '11.00', 'unlocked'),
(135, 3, 7, 3, '9.50', 'unlocked'),
(136, 4, 7, 4, '8.00', 'unlocked'),
(137, 5, 7, 5, '6.00', 'unlocked'),
(138, 6, 7, 6, '4.00', 'unlocked'),
(139, 7, 7, 7, '3.00', 'unlocked'),
(140, 8, 7, 8, '2.00', 'unlocked'),
(141, 9, 7, 9, '1.00', 'unlocked'),
(142, 10, 7, 5, '6.00', 'unlocked'),
(143, 11, 7, 5, '6.00', 'unlocked'),
(144, 12, 7, 3, '9.50', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `production_number`
--

CREATE TABLE `production_number` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_number`
--

INSERT INTO `production_number` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(1, 1, 0, 29, '5.00', ''),
(2, 2, 0, 52.5, '12.00', ''),
(3, 5, 0, 34, '8.00', ''),
(4, 3, 0, 29.5, '6.00', ''),
(5, 6, 0, 16, '1.00', ''),
(6, 4, 0, 31, '7.00', ''),
(7, 8, 0, 42, '11.00', ''),
(8, 10, 0, 25.5, '2.00', ''),
(9, 7, 0, 41.5, '10.00', ''),
(10, 11, 0, 28, '4.00', ''),
(11, 9, 0, 35, '9.00', ''),
(12, 12, 0, 26, '3.00', ''),
(13, 1, 2, 10, '2.00', 'locked'),
(14, 2, 2, 2, '10.50', 'locked'),
(15, 3, 2, 4, '8.00', 'locked'),
(16, 5, 2, 2, '10.50', 'locked'),
(17, 4, 2, 3, '9.00', 'locked'),
(18, 6, 2, 6, '7.00', 'locked'),
(19, 7, 2, 7, '6.00', 'locked'),
(20, 8, 2, 8, '5.00', 'locked'),
(21, 9, 2, 9, '4.00', 'locked'),
(22, 10, 2, 10, '2.00', 'locked'),
(23, 11, 2, 10, '2.00', 'locked'),
(24, 12, 2, 1, '12.00', 'locked'),
(25, 1, 4, 10, '1.50', 'unlocked'),
(26, 2, 4, 1, '12.00', 'unlocked'),
(27, 3, 4, 2, '10.50', 'unlocked'),
(28, 4, 4, 5, '7.00', 'unlocked'),
(29, 5, 4, 6, '5.50', 'unlocked'),
(30, 6, 4, 7, '3.50', 'unlocked'),
(31, 7, 4, 4, '8.00', 'unlocked'),
(32, 8, 4, 2, '10.50', 'unlocked'),
(33, 9, 4, 3, '9.00', 'unlocked'),
(34, 10, 4, 10, '1.50', 'unlocked'),
(35, 11, 4, 6, '5.50', 'unlocked'),
(36, 12, 4, 7, '3.50', 'unlocked'),
(37, 1, 5, 1, '12.00', 'unlocked'),
(38, 2, 5, 2, '10.50', 'unlocked'),
(39, 3, 5, 10, '2.00', 'unlocked'),
(40, 4, 5, 5, '7.50', 'unlocked'),
(41, 5, 5, 2, '10.50', 'unlocked'),
(42, 6, 5, 10, '2.00', 'unlocked'),
(43, 7, 5, 7, '6.00', 'unlocked'),
(44, 8, 5, 8, '5.00', 'unlocked'),
(45, 9, 5, 9, '4.00', 'unlocked'),
(46, 10, 5, 5, '7.50', 'unlocked'),
(47, 11, 5, 3, '9.00', 'unlocked'),
(48, 12, 5, 10, '2.00', 'unlocked'),
(49, 1, 6, 1, '11.50', 'unlocked'),
(50, 2, 6, 2, '9.50', 'unlocked'),
(51, 3, 6, 10, '1.50', 'unlocked'),
(52, 4, 6, 5, '5.50', 'unlocked'),
(53, 5, 6, 6, '3.50', 'unlocked'),
(54, 6, 6, 10, '1.50', 'unlocked'),
(55, 7, 6, 1, '11.50', 'unlocked'),
(56, 8, 6, 2, '9.50', 'unlocked'),
(57, 9, 6, 3, '8.00', 'unlocked'),
(58, 10, 6, 4, '7.00', 'unlocked'),
(59, 11, 6, 5, '5.50', 'unlocked'),
(60, 12, 6, 6, '3.50', 'unlocked'),
(61, 1, 7, 10, '2.00', 'unlocked'),
(62, 2, 7, 2, '10.00', 'unlocked'),
(63, 3, 7, 3, '7.50', 'unlocked'),
(64, 4, 7, 10, '2.00', 'unlocked'),
(65, 5, 7, 6, '4.00', 'unlocked'),
(66, 6, 7, 10, '2.00', 'unlocked'),
(67, 7, 7, 2, '10.00', 'unlocked'),
(68, 8, 7, 1, '12.00', 'unlocked'),
(69, 9, 7, 2, '10.00', 'unlocked'),
(70, 10, 7, 3, '7.50', 'unlocked'),
(71, 11, 7, 4, '6.00', 'unlocked'),
(72, 12, 7, 5, '5.00', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `swim_wear`
--

CREATE TABLE `swim_wear` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `swim_wear`
--

INSERT INTO `swim_wear` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(73, 1, 0, 53, '12.00', 'unlocked'),
(74, 2, 0, 50, '11.00', 'unlocked'),
(75, 4, 0, 34, '7.00', 'unlocked'),
(76, 5, 0, 21, '3.00', 'unlocked'),
(77, 6, 0, 19.5, '2.00', 'unlocked'),
(78, 3, 0, 40.5, '10.00', 'unlocked'),
(79, 7, 0, 24.5, '5.00', 'unlocked'),
(80, 8, 0, 38, '8.00', 'unlocked'),
(81, 9, 0, 39, '9.00', 'unlocked'),
(82, 11, 0, 23.5, '4.00', 'unlocked'),
(83, 12, 0, 14, '1.00', 'unlocked'),
(84, 10, 0, 33, '6.00', 'unlocked'),
(85, 1, 2, 1, '11.50', 'unlocked'),
(86, 2, 2, 2, '9.50', 'unlocked'),
(87, 3, 2, 3, '7.50', 'unlocked'),
(88, 4, 2, 4, '5.50', 'unlocked'),
(89, 6, 2, 5, '3.50', 'unlocked'),
(90, 5, 2, 6, '2.00', 'unlocked'),
(91, 7, 2, 10, '1.00', 'unlocked'),
(92, 8, 2, 1, '11.50', 'unlocked'),
(93, 9, 2, 2, '9.50', 'unlocked'),
(94, 10, 2, 3, '7.50', 'unlocked'),
(95, 11, 2, 4, '5.50', 'unlocked'),
(96, 12, 2, 5, '3.50', 'unlocked'),
(97, 1, 5, 1, '11.50', 'unlocked'),
(98, 2, 5, 2, '10.00', 'unlocked'),
(99, 3, 5, 3, '9.00', 'unlocked'),
(100, 4, 5, 4, '7.00', 'unlocked'),
(101, 5, 5, 5, '4.50', 'unlocked'),
(102, 6, 5, 6, '2.50', 'unlocked'),
(103, 7, 5, 1, '11.50', 'unlocked'),
(104, 8, 5, 4, '7.00', 'unlocked'),
(105, 9, 5, 4, '7.00', 'unlocked'),
(106, 10, 5, 5, '4.50', 'unlocked'),
(107, 11, 5, 6, '2.50', 'unlocked'),
(108, 12, 5, 7, '1.00', 'unlocked'),
(109, 1, 6, 1, '12.00', 'unlocked'),
(110, 2, 6, 2, '10.50', 'unlocked'),
(111, 3, 6, 3, '8.50', 'unlocked'),
(112, 5, 6, 5, '7.00', 'unlocked'),
(113, 4, 6, 6, '5.50', 'unlocked'),
(114, 6, 6, 2, '10.50', 'unlocked'),
(115, 7, 6, 3, '8.50', 'unlocked'),
(116, 8, 6, 6, '5.50', 'unlocked'),
(117, 9, 6, 7, '4.00', 'unlocked'),
(118, 10, 6, 8, '3.00', 'unlocked'),
(119, 11, 6, 9, '2.00', 'unlocked'),
(120, 12, 6, 10, '1.00', 'unlocked'),
(121, 2, 7, 2, '11.00', 'unlocked'),
(122, 3, 7, 3, '9.50', 'unlocked'),
(123, 1, 7, 5, '6.50', 'unlocked'),
(124, 4, 7, 1, '12.00', 'unlocked'),
(125, 5, 7, 6, '4.50', 'unlocked'),
(126, 7, 7, 7, '2.50', 'unlocked'),
(127, 6, 7, 8, '1.00', 'unlocked'),
(128, 9, 7, 3, '9.50', 'unlocked'),
(129, 8, 7, 4, '8.00', 'unlocked'),
(130, 10, 7, 5, '6.50', 'unlocked'),
(131, 11, 7, 6, '4.50', 'unlocked'),
(132, 12, 7, 7, '2.50', 'unlocked'),
(133, 1, 4, 1, '11.50', 'unlocked'),
(134, 2, 4, 2, '9.00', 'unlocked'),
(135, 3, 4, 3, '6.00', 'unlocked'),
(136, 4, 4, 4, '4.00', 'unlocked'),
(137, 5, 4, 5, '3.00', 'unlocked'),
(138, 6, 4, 6, '2.00', 'unlocked'),
(139, 7, 4, 7, '1.00', 'unlocked'),
(140, 8, 4, 3, '6.00', 'unlocked'),
(141, 9, 4, 2, '9.00', 'unlocked'),
(142, 10, 4, 1, '11.50', 'unlocked'),
(143, 11, 4, 2, '9.00', 'unlocked'),
(144, 12, 4, 3, '6.00', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `talent_presentation`
--

CREATE TABLE `talent_presentation` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent_presentation`
--

INSERT INTO `talent_presentation` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(73, 1, 2, 5, '11.00', 'unlocked'),
(74, 2, 2, 2, '1.50', 'unlocked'),
(75, 3, 2, 3, '6.50', 'unlocked'),
(76, 4, 2, 5, '8.50', 'unlocked'),
(77, 5, 2, 6, '4.50', 'unlocked'),
(78, 6, 2, 1, '11.00', 'unlocked'),
(79, 7, 2, 2, '8.50', 'unlocked'),
(80, 8, 2, 4, '6.50', 'unlocked'),
(81, 9, 2, 5, '4.50', 'unlocked'),
(82, 10, 2, 6, '3.00', 'unlocked'),
(83, 11, 2, 7, '1.50', 'unlocked'),
(84, 12, 2, 8, '11.00', 'unlocked'),
(85, 1, 0, 38, '9.50', ''),
(86, 2, 0, 52, '12.00', ''),
(87, 3, 0, 42.5, '11.00', ''),
(88, 4, 0, 29.5, '6.00', ''),
(89, 5, 0, 28.5, '5.00', ''),
(90, 7, 0, 33.5, '7.00', ''),
(91, 8, 0, 37, '8.00', ''),
(92, 9, 0, 24.5, '3.00', ''),
(93, 6, 0, 38, '9.50', ''),
(94, 10, 0, 26, '4.00', ''),
(95, 12, 0, 22, '2.00', ''),
(96, 11, 0, 18.5, '1.00', ''),
(97, 1, 4, 1, '12.00', 'unlocked'),
(98, 2, 4, 10, '11.00', 'unlocked'),
(99, 3, 4, 3, '10.00', 'unlocked'),
(100, 4, 4, 4, '8.50', 'unlocked'),
(101, 5, 4, 5, '7.00', 'unlocked'),
(102, 6, 4, 6, '5.50', 'unlocked'),
(103, 7, 4, 10, '1.00', 'unlocked'),
(104, 8, 4, 4, '8.50', 'unlocked'),
(105, 9, 4, 6, '5.50', 'unlocked'),
(106, 10, 4, 7, '4.00', 'unlocked'),
(107, 11, 4, 8, '3.00', 'unlocked'),
(108, 12, 4, 9, '2.00', 'unlocked'),
(109, 2, 7, 2, '10.00', 'unlocked'),
(110, 3, 7, 3, '7.00', 'unlocked'),
(111, 1, 7, 10, '1.00', 'unlocked'),
(112, 4, 7, 5, '3.50', 'unlocked'),
(113, 5, 7, 2, '10.00', 'unlocked'),
(114, 6, 7, 3, '7.00', 'unlocked'),
(115, 7, 7, 4, '5.00', 'unlocked'),
(116, 8, 7, 5, '3.50', 'unlocked'),
(117, 9, 7, 6, '2.00', 'unlocked'),
(118, 10, 7, 1, '12.00', 'unlocked'),
(119, 11, 7, 2, '10.00', 'unlocked'),
(120, 12, 7, 3, '7.00', 'unlocked'),
(121, 1, 5, 1, '11.50', 'unlocked'),
(122, 2, 5, 2, '9.50', 'unlocked'),
(123, 3, 5, 3, '7.50', 'unlocked'),
(124, 4, 5, 4, '6.00', 'unlocked'),
(125, 5, 5, 5, '4.50', 'unlocked'),
(126, 6, 5, 6, '2.50', 'unlocked'),
(127, 8, 5, 1, '11.50', 'unlocked'),
(128, 7, 5, 2, '9.50', 'unlocked'),
(129, 9, 5, 3, '7.50', 'unlocked'),
(130, 10, 5, 5, '4.50', 'unlocked'),
(131, 11, 5, 6, '2.50', 'unlocked'),
(132, 12, 5, 7, '1.00', 'unlocked'),
(133, 2, 6, 2, '11.00', 'unlocked'),
(134, 3, 6, 3, '9.00', 'unlocked'),
(135, 1, 6, 4, '7.50', 'unlocked'),
(136, 4, 6, 5, '5.50', 'unlocked'),
(137, 5, 6, 6, '3.50', 'unlocked'),
(138, 6, 6, 2, '11.00', 'unlocked'),
(139, 7, 6, 4, '7.50', 'unlocked'),
(140, 8, 6, 5, '5.50', 'unlocked'),
(141, 9, 6, 6, '3.50', 'unlocked'),
(142, 10, 6, 7, '2.00', 'unlocked'),
(143, 11, 6, 8, '1.00', 'unlocked'),
(144, 12, 6, 2, '11.00', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `top_five`
--

CREATE TABLE `top_five` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_five`
--

INSERT INTO `top_five` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(13, 1, 0, 46.5, '12.00', ''),
(14, 2, 0, 45.5, '11.00', ''),
(15, 3, 0, 39.5, '9.00', ''),
(16, 4, 0, 30.5, '7.00', ''),
(17, 5, 0, 28.5, '5.00', ''),
(18, 6, 0, 26.5, '3.00', ''),
(19, 7, 0, 28, '4.00', ''),
(20, 8, 0, 34.5, '8.00', ''),
(21, 9, 0, 20, '2.00', ''),
(22, 10, 0, 16.5, '1.00', ''),
(23, 11, 0, 29.5, '6.00', ''),
(24, 12, 0, 44.5, '10.00', ''),
(25, 2, 2, 10, '1.50', 'unlocked'),
(26, 3, 2, 3, '6.50', 'unlocked'),
(27, 4, 2, 2, '8.50', 'unlocked'),
(28, 1, 2, 1, '11.00', 'unlocked'),
(29, 5, 2, 4, '4.50', 'unlocked'),
(30, 6, 2, 1, '11.00', 'unlocked'),
(31, 7, 2, 2, '8.50', 'unlocked'),
(32, 8, 2, 3, '6.50', 'unlocked'),
(33, 9, 2, 4, '4.50', 'unlocked'),
(34, 10, 2, 5, '3.00', 'unlocked'),
(35, 11, 2, 10, '1.50', 'unlocked'),
(36, 12, 2, 1, '11.00', 'unlocked'),
(37, 1, 4, 1, '12.00', 'unlocked'),
(38, 2, 4, 2, '10.50', 'unlocked'),
(39, 3, 4, 3, '8.50', 'unlocked'),
(40, 4, 4, 10, '2.50', 'unlocked'),
(41, 5, 4, 5, '6.00', 'unlocked'),
(42, 6, 4, 10, '2.50', 'unlocked'),
(43, 7, 4, 3, '8.50', 'unlocked'),
(44, 8, 4, 2, '10.50', 'unlocked'),
(45, 9, 4, 10, '2.50', 'unlocked'),
(46, 10, 4, 10, '2.50', 'unlocked'),
(47, 11, 4, 4, '7.00', 'unlocked'),
(48, 12, 4, 6, '5.00', 'unlocked'),
(49, 1, 6, 10, '3.00', 'unlocked'),
(50, 2, 6, 2, '11.50', 'unlocked'),
(51, 3, 6, 3, '9.00', 'unlocked'),
(52, 4, 6, 10, '3.00', 'unlocked'),
(53, 5, 6, 10, '3.00', 'unlocked'),
(54, 6, 6, 10, '3.00', 'unlocked'),
(55, 7, 6, 10, '3.00', 'unlocked'),
(56, 8, 6, 2, '11.50', 'unlocked'),
(57, 9, 6, 3, '9.00', 'unlocked'),
(58, 10, 6, 3, '9.00', 'unlocked'),
(59, 11, 6, 4, '7.00', 'unlocked'),
(60, 12, 6, 5, '6.00', 'unlocked'),
(61, 2, 5, 2, '10.00', 'unlocked'),
(62, 3, 5, 3, '7.50', 'unlocked'),
(63, 1, 5, 2, '10.00', 'unlocked'),
(64, 4, 5, 2, '10.00', 'unlocked'),
(65, 5, 5, 4, '6.00', 'unlocked'),
(66, 6, 5, 5, '5.00', 'unlocked'),
(67, 7, 5, 6, '4.00', 'unlocked'),
(68, 8, 5, 7, '3.00', 'unlocked'),
(69, 9, 5, 8, '2.00', 'unlocked'),
(70, 10, 5, 9, '1.00', 'unlocked'),
(71, 11, 5, 3, '7.50', 'unlocked'),
(72, 12, 5, 1, '12.00', 'unlocked'),
(73, 1, 7, 2, '10.50', 'unlocked'),
(74, 2, 7, 1, '12.00', 'unlocked'),
(75, 3, 7, 4, '8.00', 'unlocked'),
(76, 5, 7, 3, '9.00', 'unlocked'),
(77, 4, 7, 5, '6.50', 'unlocked'),
(78, 6, 7, 6, '5.00', 'unlocked'),
(79, 7, 7, 7, '4.00', 'unlocked'),
(80, 8, 7, 8, '3.00', 'unlocked'),
(81, 9, 7, 9, '2.00', 'unlocked'),
(82, 10, 7, 10, '1.00', 'unlocked'),
(83, 11, 7, 5, '6.50', 'unlocked'),
(84, 12, 7, 2, '10.50', 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_type` varchar(100) NOT NULL,
  `judge_no` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role_type`, `judge_no`) VALUES
(1, 'John Cris C. Manabo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL),
(2, 'John Doe', 'judge1', '9801133a9a5eb052a4f588f44a86936d', 'judge', 'judge1'),
(4, 'Judge2', 'judge2', '1256db16c9c3ee2f9463fe547433950d', 'judge', 'judge2'),
(5, 'judge3', 'judge3', 'e06eb0f114ebbc1f2f262f9976f0c715', 'judge', 'judge3'),
(6, 'Judge4', 'judge4', '84b50f423d987710abfe89d72cc3550f', 'judge', 'judge4'),
(7, 'Judge5', 'judge5', '7b3492a59cf60349e7f15c4d0d6f8bed', 'judge', 'judge5'),
(8, 'admin2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `evening_gown`
--
ALTER TABLE `evening_gown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_round`
--
ALTER TABLE `final_round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_attire`
--
ALTER TABLE `production_attire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_number`
--
ALTER TABLE `production_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swim_wear`
--
ALTER TABLE `swim_wear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_presentation`
--
ALTER TABLE `talent_presentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_five`
--
ALTER TABLE `top_five`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `evening_gown`
--
ALTER TABLE `evening_gown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `final_round`
--
ALTER TABLE `final_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `production_attire`
--
ALTER TABLE `production_attire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `production_number`
--
ALTER TABLE `production_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `swim_wear`
--
ALTER TABLE `swim_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `talent_presentation`
--
ALTER TABLE `talent_presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `top_five`
--
ALTER TABLE `top_five`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
