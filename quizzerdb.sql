-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 27, 2025 at 11:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `optionID` int(11) NOT NULL,
  `optionName` varchar(255) NOT NULL,
  `questionID` int(11) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `quesionID` int(11) NOT NULL,
  `questionTitle` varchar(255) NOT NULL,
  `quizID` int(11) NOT NULL,
  `questionCorrect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quesionID`, `questionTitle`, `quizID`, `questionCorrect`) VALUES
(3, 'dkkldkldbgbb', 2, 3),
(4, 'm,s4', 0, 2),
(18, 'shhssksk', 0, 3),
(19, '', 1, 3),
(20, 'shhsskskbbb', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quizID` int(255) NOT NULL,
  `quizTitle` varchar(255) DEFAULT NULL,
  `quizDescreption` varchar(255) DEFAULT NULL,
  `quizQuestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quizID`, `quizTitle`, `quizDescreption`, `quizQuestion`) VALUES
(7, '1skdajbdkbx344gaj', 'shhssxkgsk', 'kdjndnd3ejskdvf8'),
(8, 'madbamdbamd2', 'bafsjfsbmbfsfsmfm3', 'xscxcx3'),
(10, 'madbamdbamd24', 'bafsjfsbmvbvbfsfsmfm36', 'xscxcx38');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `scoreID` int(11) NOT NULL,
  `ScoreTitle` varchar(255) NOT NULL,
  `ScoreTotal` int(255) NOT NULL,
  `ScoreGrade` int(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `UserName`, `userEmail`, `userPassword`) VALUES
(1, 'ahmad', 'mortada', '1'),
(2, 'taha', '1', '1'),
(3, 'taha2', '12', '1'),
(9, 'taha', '2', '1'),
(10, 'taha4', '4', '4'),
(11, 'taha3', '5', '3'),
(13, 'taha1', '7', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_quizzes`
--

CREATE TABLE `users_has_quizzes` (
  `userID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`optionID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`quesionID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quizID`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`scoreID`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `quizID` (`quizID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users_has_quizzes`
--
ALTER TABLE `users_has_quizzes`
  ADD PRIMARY KEY (`userID`,`quizID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `optionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `quesionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quizID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `scoreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
