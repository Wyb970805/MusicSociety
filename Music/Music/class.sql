-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 11:40 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_ID` int(10) NOT NULL,
  `Class_Type` varchar(30) NOT NULL,
  `Class_Date` varchar(12) NOT NULL,
  `Class_StartTime` varchar(12) NOT NULL,
  `Class_EndTime` varchar(12) NOT NULL,
  `Class_Venue` varchar(30) DEFAULT NULL,
  `Class_size` int(2) NOT NULL,
  `Class_Level` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `Class_Type`, `Class_Date`, `Class_StartTime`, `Class_EndTime`, `Class_Venue`, `Class_size`, `Class_Level`) VALUES
(1, 'Singing', 'Monday', '6:30p.m.', '7:00p.m.', 'M004', 50, ''),
(2, 'Ukulele', 'Thursday', '7:30p.m.', '8:30p.m.', 'M004', 50, 'Thursday (Advance class) is suitable for those who can know to read TAB and play chord (C, G, Am, F, Bb, Dm, Gm) to join.\r\nFriday (Beginner class).'),
(3, 'Ukulele', 'Friday', '7:30p.m.', '8:30p.m.', 'M004', 50, ''),
(4, 'Keyboard', 'Monday', '7:30p.m.', '8:30p.m.', 'M004', 50, ''),
(5, 'Guitar', 'Thursday', '7:30p.m.', '8:30p.m.', 'M001', 50, 'Thursday (Advance class) is suitable for those who can know to read TAB and play chord (C, G, Am, F, G, D, Em, Dm, Bm) to join.\r\nFriday (Beginner class).'),
(6, 'Guitar', 'Friday', '7:30p.m.', '8:30p.m.', 'M004', 50, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
