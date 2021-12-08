-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 11:41 AM
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
-- Table structure for table `memberslist`
--

CREATE TABLE `memberslist` (
  `Name` varchar(30) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `ICNo` varchar(14) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Program` varchar(3) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `user_level` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberslist`
--

INSERT INTO `memberslist` (`Name`, `StudentID`, `ICNo`, `Gender`, `Phone`, `Program`, `Email`, `Password`, `user_level`, `status`) VALUES
('Xiao Zhan', '18WMD01110', '911010-01-1010', 'M', '0185376678', 'DIB', 'xiaoz-wm19@student.tarc.edu.my', '9270963fa8efba94a3e91901e072a527', 1, 0),
('Wang Jiax En', '18WMD01111', '000502-04-2934', 'F', '0185376878', 'DIA', 'wangje-wm18@student.tarc.edu.my', '735fc4a66460ee6f538c63ca42eeedd7', 1, 0),
('Loo Wen Wen', '18WMD01193', '000411-01-0328', 'F', '0111534673', 'DIT', 'looww-wm18@student.tarc.edu.my', '6b1bd96f5f0ca5d5858a16dc4adae679', 0, 0),
('Bai Jing Ting', '18WMD01194', '970615-08-1455', 'M', '01222346672', 'DIA', 'baijt-wm19@student.tarc.edu.my', 'aebc38b5bb0e9519743fa9c72c9c3c26', 0, 0),
('Tong Chein Leng', '18WMD01692', '000216-04-0504', 'F', '0185764678', 'DIT', 'tongcl-wm18@student.tarc.edu.my', 'c7666076ab5dfddf6f1b8374e15e52a0', 0, 0),
('Wang Yi Bo', '18WMD01693', '970805-04-5523', 'M', '0185376678', 'DIB', 'wangyb-wm19@student.tarc.edu.my', 'c66948b4d6c8d4670ab4c766209e2ca3', 1, 0),
('Ng Zhi QIx', '18WMD01987', '000314-01-9487', 'F', '0111534673', 'DIT', 'ngzq-wm18@student.tarc.edu.my', 'c7666076ab5dfddf6f1b8374e15e52a0', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberslist`
--
ALTER TABLE `memberslist`
  ADD PRIMARY KEY (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
