-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2016 at 07:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `id` varchar(15) NOT NULL,
  `subid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`id`, `subid`) VALUES
('14CUOS001', 5),
('14CUOS001', 12);

-- --------------------------------------------------------

--
-- Table structure for table `groupno`
--

CREATE TABLE IF NOT EXISTS `groupno` (
  `group` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupno`
--

INSERT INTO `groupno` (`group`, `number`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subchoice`
--

CREATE TABLE IF NOT EXISTS `subchoice` (
  `sem` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subchoice`
--

INSERT INTO `subchoice` (`sem`, `subid`, `group`) VALUES
(6, 5, 1),
(6, 8, 1),
(6, 9, 1),
(6, 10, 2),
(6, 12, 2),
(6, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `shortd` longtext NOT NULL,
  `longd` longtext NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `name`, `sem`, `shortd`, `longd`, `status`) VALUES
(5, 'TAFL', 6, 'Network and Information Security is a networking based subjects covering Conventional Encryption techniques,Number Theory,Cryptography,E-Comm and network security concepts in detail.', 'Security concepts are broadly categorised and explained.IP and Mail Security,Web Security and Network Security.SSL,Digital Signatures,Electronic Transactions,Firewall Designs etc.E-Commerce being major hit these days,its introduction,overview and security concepts are discussed in detail.In initial chapters,algorithms such as Eulers Algo,Euclidian Theorem etc are taught.Key CryptoGraphy,Elliptical curve cryptography etc.are discussed as well.', 'true'),
(8, 'SOA', 6, 'Network and Information Security is a networking based subjects covering Conventional Encryption techniques,Number Theory,Cryptography,E-Comm and network security concepts in detail.', 'Security concepts are broadly categorised and explained.IP and Mail Security,Web Security and Network Security.SSL,Digital Signatures,Electronic Transactions,Firewall Designs etc.E-Commerce being major hit these days,its introduction,overview and security concepts are discussed in detail.In initial chapters,algorithms such as Eulers Algo,Euclidian Theorem etc are taught.Key CryptoGraphy,Elliptical curve cryptography etc.are discussed as well.', 'false'),
(9, 'OOSE', 6, 'NIS or Network and Information Security is a networking based subjects covering Conventional Encryption techniques,Number Theory,Cryptography,E-Comm and network security concepts in detail.', 'Security concepts are broadly categorised and explained.IP and Mail Security,Web Security and Network Security.SSL,Digital Signatures,Electronic Transactions,Firewall Designs etc.E-Commerce being major hit these days,its introduction,overview and security concepts are discussed in detail.In initial chapters,algorithms such as Eulers Algo,Euclidian Theorem etc are taught.Key CryptoGraphy,Elliptical curve cryptography etc.are discussed as well.', 'false'),
(10, 'CN', 6, 'NIS or Network and Information Security is a networking based subjects covering Conventional Encryption techniques,Number Theory,Cryptography,E-Comm and network security concepts in detail.', 'Security concepts are broadly categorised and explained.IP and Mail Security,Web Security and Network Security.SSL,Digital Signatures,Electronic Transactions,Firewall Designs etc.E-Commerce being major hit these days,its introduction,overview and security concepts are discussed in detail.In initial chapters,algorithms such as Eulers Algo,Euclidian Theorem etc are taught.Key CryptoGraphy,Elliptical curve cryptography etc.are discussed as well.	 ', 'true'),
(12, 'SDP', 6, 'NIS or Network and Information Security is a networking based subjects covering Conventional Encryption techniques,Number Theory,Cryptography,E-Comm and network security concepts in detail.', 'Security concepts are broadly categorised and explained.IP and Mail Security,Web Security and Network Security.SSL,Digital Signatures,Electronic Transactions,Firewall Designs etc.E-Commerce being major hit these days,its introduction,overview and security concepts are discussed in detail.In initial chapters,algorithms such as Eulers Algo,Euclidian Theorem etc are taught.Key CryptoGraphy,Elliptical curve cryptography etc.are discussed as well.	 ', 'false'),
(14, 'NIS', 6, 'NIS or Network and Information Security is a networking based subjects covering Conventional Encryption techniques,Number Theory,Cryptography,E-Comm and network security concepts in detail.', 'Security concepts are broadly categorised and explained.IP and Mail Security,Web Security and Network Security.SSL,Digital Signatures,Electronic Transactions,Firewall Designs etc.E-Commerce being major hit these days,its introduction,overview and security concepts are discussed in detail.In initial chapters,algorithms such as Eulers Algo,Euclidian Theorem etc are taught.Key CryptoGraphy,Elliptical curve cryptography etc.are discussed as well.', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`start`, `end`) VALUES
('04/08/2016', '04/15/2016');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`) VALUES
('14CUOS001', 'jay'),
('14CUOS011', 'vaibhav'),
('14CUOS022', 'rushit'),
('14CEUOS042', 'ravinder'),
('14CEUOS099', 'dhara'),
('14CEUOS092', 'jalpa'),
('14CEUOS011', 'akshit'),
('14CEUOS041', 'harshal'),
('14CUOS034', 'abhi'),
('14CEUOS012', 'harsh');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE IF NOT EXISTS `userdetail` (
  `id` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `sem` int(11) NOT NULL,
  `choice` varchar(5) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`id`, `fname`, `lname`, `sem`, `choice`, `email`) VALUES
('14CUOS001', 'Jay', 'Joshi', 6, 'false', 'jay.goku@gmail.com'),
('14CUOS011', 'Vaibhav', 'Joshi', 6, 'false', 'vj33@gmail.com'),
('14CUOS022', 'Rushit', 'Jasani', 6, 'false', 'rmj333@gmail.com'),
('14CEUOS042', 'Ravinder', 'Singh', 6, 'false', 'rvsing@yahoo.com'),
('14CEUOS099', 'Dhara', 'Patel', 6, 'false', 'dharap@yahoo.com'),
('14CEUOS092', 'Jalpa', 'Jogi', 6, 'false', 'jalpaj@gmail.com'),
('14CEUOS011', 'Akshit', 'Patel', 6, 'false', 'akkij@gmail.com'),
('14CEUOS041', 'Harshal', 'Sheth', 6, 'false', 'hsheth@rediffmail.com'),
('14CUOS034', 'Abhi', 'Patel', 6, 'false', 'abp@gmail.com'),
('14CEUOS012', 'Harsh', 'Sodi', 6, 'false', 'hsodi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
