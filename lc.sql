-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 10:44 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lc`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `expid` int(11) NOT NULL,
  `expname` varchar(50) NOT NULL,
  `expprice` float NOT NULL,
  `expdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expid`, `expname`, `expprice`, `expdate`) VALUES
(82, 'qq', 11, '2015-03-29'),
(83, '12', 12, '2015-04-30'),
(84, 'as', 22, '2015-04-25'),
(85, 'qw', 12, '2015-04-25'),
(86, '29', 29, '2015-04-29'),
(87, '4', 4, '2015-04-29'),
(88, 's', 120, '2015-04-29'),
(89, '123', 123, '2015-07-01'),
(90, 'ad', 12, '2015-03-29'),
(91, 'sq', 45, '2015-06-01'),
(92, 'ww', 55, '2015-06-09'),
(93, 'ee', 34, '2015-06-23'),
(94, 'tea', 123, '2015-06-01'),
(95, 'as', 123, '2016-07-10'),
(96, 'tea', 200, '2015-06-01'),
(97, 'ss', 10, '2015-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('saif', 'saif');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sno` int(11) NOT NULL,
  `sitemcode` int(11) NOT NULL,
  `sitemname` varchar(50) NOT NULL,
  `solddate` date NOT NULL,
  `sitemprice` float NOT NULL,
  `sitemsold` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sno`, `sitemcode`, `sitemname`, `solddate`, `sitemprice`, `sitemsold`) VALUES
(1, 12, 'a1', '2015-06-03', 1, 1),
(2, 11, 'a1', '2015-06-04', 1, 1),
(3, 2, 'a1', '2015-06-17', 1, 1),
(4, 5, 'a1', '2015-06-23', 1, 1),
(5, 4, 'a', '2015-06-04', 1, 25),
(6, 1, 'sofi1', '2015-06-08', 1, 123),
(7, 2, 'sofite', '2015-06-08', 12, 2),
(8, 2, 'w', '2015-06-08', 2, 2),
(9, 2, '2', '2015-06-08', 2, 2),
(10, 2, '2', '2015-06-08', 2, 2),
(11, 1, 'sofite', '2015-06-08', 12, 2),
(12, 5, 'a2', '2015-06-08', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `itemcode` int(11) NOT NULL,
  `itemprice` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`itemcode`, `itemprice`, `itemname`) VALUES
(3, 1234, 'green'),
(4, 1, 'a1'),
(5, 2, 'a3'),
(6, 3, 'a4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expid`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`itemcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `itemcode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
