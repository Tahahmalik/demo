-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 12:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(3, 'Tahahm', '5924malik');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `Model` varchar(20) NOT NULL,
  `Year` int(4) NOT NULL,
  `Colour` varchar(3) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Plate` varchar(6) NOT NULL,
  `Owner` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`Model`, `Year`, `Colour`, `Type`, `Plate`, `Owner`) VALUES
('Sunfire', 2002, 'GRY', '4DR', 'ABC123', 27),
('Civic', 2015, 'GRY', '4DR', 'XYZ123', 27);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customervalue`
-- (See below for the actual view)
--
CREATE TABLE `customervalue` (
`id` int(6) unsigned
,`firstname` varchar(30)
,`lastname` varchar(30)
,`email` varchar(50)
,`reg_date` timestamp
,`value` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(27, 'Affan', 'Malik', 'Affan.m86@gmail.com', '2017-06-01 20:38:17'),
(78, 'Arfa', 'Malik', 'a.h.malik0@gmail.com', '2017-05-17 21:14:29'),
(79, 'Taha', 'Malik', 'taha.malik87@gmail.com', '2017-05-15 21:40:22'),
(80, 'Zahid', 'Malik', 'zahid.malik54@gmail.com', '2017-05-15 22:01:38'),
(83, 'Sarmad', 'Raza', 'Sraza@gmail.com', '2017-05-15 22:11:06'),
(84, 'Romana', 'Sajjad ', 'Rsajjad@hotmail.com', '2017-05-17 19:16:26'),
(88, 'Sabeeh', 'Hameed', 'Shameed@gmail.com', '2017-05-17 19:18:53'),
(99, 'Zeenat', 'Mahmood', 'Zmahmood@gmail.com', '2017-05-17 20:58:55'),
(100, 'Tahir', 'Mahmood', 'tmahmood@hotmail.com', '2017-05-17 21:01:32'),
(103, 'Taha', 'Hameed', 'taha.hameed@mail.com', '2017-05-18 00:56:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `platevalue`
-- (See below for the actual view)
--
CREATE TABLE `platevalue` (
`Owner` int(6) unsigned
,`plate` varchar(6)
,`Value` int(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `value`
--

CREATE TABLE `value` (
  `Plate` varchar(6) NOT NULL,
  `Value` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `value`
--

INSERT INTO `value` (`Plate`, `Value`) VALUES
('ABC123', 6500),
('XYZ123', 10000);

-- --------------------------------------------------------

--
-- Structure for view `customervalue`
--
DROP TABLE IF EXISTS `customervalue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customervalue`  AS  select `myguests`.`id` AS `id`,`myguests`.`firstname` AS `firstname`,`myguests`.`lastname` AS `lastname`,`myguests`.`email` AS `email`,`myguests`.`reg_date` AS `reg_date`,sum(`platevalue`.`Value`) AS `value` from (`myguests` left join `platevalue` on((`myguests`.`id` = `platevalue`.`Owner`))) group by `myguests`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `platevalue`
--
DROP TABLE IF EXISTS `platevalue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `platevalue`  AS  select `cars`.`Owner` AS `Owner`,`cars`.`Plate` AS `plate`,`value`.`Value` AS `Value` from (`value` left join `cars` on((`cars`.`Plate` = `value`.`Plate`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Plate`),
  ADD KEY `Owner` (`Owner`),
  ADD KEY `Owner_2` (`Owner`),
  ADD KEY `Owner_3` (`Owner`);

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`Plate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`Owner`) REFERENCES `myguests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `value`
--
ALTER TABLE `value`
  ADD CONSTRAINT `value_ibfk_1` FOREIGN KEY (`Plate`) REFERENCES `cars` (`Plate`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
