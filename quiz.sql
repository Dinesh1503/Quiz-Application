-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 06:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz ID` int(5) NOT NULL,
  `Question Number` int(5) NOT NULL,
  `Questions` text NOT NULL,
  `Option 1` text NOT NULL,
  `Option 2` text NOT NULL,
  `Option 3` text NOT NULL,
  `Option 4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz1`
--

CREATE TABLE `quiz1` (
  `question_number` int(10) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz1`
--

INSERT INTO `quiz1` (`question_number`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'What is 1+1?', '0', '1', '2', '3', 3),
(2, 'What is 2+2?', '1', '2', '3', '4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz details`
--

CREATE TABLE `quiz details` (
  `Quiz ID` int(5) NOT NULL,
  `Quiz Name` varchar(100) NOT NULL,
  `Quiz Author` varchar(150) NOT NULL,
  `Quiz Available` varchar(5) NOT NULL,
  `Quiz Duration` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz details`
--

INSERT INTO `quiz details` (`Quiz ID`, `Quiz Name`, `Quiz Author`, `Quiz Available`, `Quiz Duration`) VALUES
(1, 'Math', 'Arun', 'Yes', '60');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `Username` varchar(150) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Quiz ID` int(5) NOT NULL,
  `Score` int(10) NOT NULL,
  `percentage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`Username`, `Type`, `Quiz ID`, `Score`, `percentage`) VALUES
('Balu', 'student', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(150) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Name`, `Email`, `password`, `Type`) VALUES
('Arun', 'Arun', 'Arun@email.com', 'Arun', 'staff'),
('Balu', 'Balu', 'Balu@gmail.com', 'Balu', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz ID`);

--
-- Indexes for table `quiz1`
--
ALTER TABLE `quiz1`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `quiz details`
--
ALTER TABLE `quiz details`
  ADD PRIMARY KEY (`Quiz ID`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
