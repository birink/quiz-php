-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2018 at 02:16 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `is_right` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`answer_id`, `question_id`, `answer`, `is_right`) VALUES
(1, 1, 'correct', '1'),
(2, 1, 'wrong', '0'),
(3, 2, 'wrong1', '0'),
(4, 2, 'wrong2', '0'),
(5, 2, 'correct', '1'),
(6, 2, 'wrong3', '0'),
(7, 3, 'correct', '1'),
(8, 3, 'wrong', '0'),
(9, 3, 'wrong', '0'),
(10, 4, 'wrong', '0'),
(11, 4, 'wrong', '0'),
(12, 4, 'wrong', '0'),
(13, 4, 'Correct', '1'),
(14, 4, 'wrong', '0'),
(15, 9, 'correct', '1'),
(16, 9, 'wrong', '0'),
(17, 10, 'correct', '1'),
(18, 10, 'wrong', '0'),
(19, 10, 'wrong', '0'),
(20, 11, 'Correct', '1'),
(21, 11, 'wrong', '0'),
(22, 11, 'wrong', '0'),
(23, 11, 'wrong', '0'),
(24, 12, 'wrong', '0'),
(25, 12, 'wrong', '0'),
(26, 12, 'wrong', '0'),
(27, 12, 'correct', '1'),
(28, 13, 'correct', '1'),
(29, 13, 'wrong', '0'),
(30, 13, 'wrong', '0'),
(31, 13, 'wrong', '0'),
(32, 14, 'wrong', '0'),
(33, 14, 'correct', '1'),
(34, 14, 'wrong', '0'),
(35, 14, 'wrong', '0'),
(36, 15, 'test with longer text to see how fields look like. but still wrong', '0'),
(37, 15, 'est with longer text to see how fields look like. but this is CORRECT', '1'),
(38, 15, 'wrong', '0'),
(39, 15, 'wrong', '0'),
(40, 16, 'wrong', '0'),
(41, 16, 'wrong', '0'),
(42, 16, 'wrong', '0'),
(43, 16, 'wrong', '0'),
(44, 16, 'wrong', '0'),
(45, 16, 'wrong', '0'),
(46, 16, 'wrong', '0'),
(47, 16, 'wrong', '0'),
(48, 16, 'wrong', '0'),
(49, 16, 'correct', '1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `answer_count` int(11) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `quiz_id`, `answer_count`, `question`) VALUES
(1, 1, 2, 'test question 1 '),
(2, 1, 4, 'test question 2'),
(3, 1, 3, 'test question 3'),
(4, 1, 5, 'test question 4'),
(9, 2, 2, 'q1'),
(10, 2, 3, 'q2'),
(11, 2, 4, 'q3'),
(12, 2, 4, 'q4'),
(13, 2, 4, 'q5'),
(14, 2, 4, 'q6'),
(15, 2, 4, 'q7'),
(16, 2, 10, 'q8');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `quiz_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `question_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`quiz_id`, `name`, `question_count`) VALUES
(1, 'test1', 4),
(2, 'test2', 8);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `correct_count` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taken_quiz`
--

CREATE TABLE `taken_quiz` (
  `taken_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `session` varchar(32) NOT NULL,
  `is_right` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `taken_quiz`
--
ALTER TABLE `taken_quiz`
  ADD PRIMARY KEY (`taken_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answers`
--
ALTER TABLE `Answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taken_quiz`
--
ALTER TABLE `taken_quiz`
  MODIFY `taken_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `Answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizes` (`quiz_id`);

--
-- Constraints for table `taken_quiz`
--
ALTER TABLE `taken_quiz`
  ADD CONSTRAINT `taken_quiz_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizes` (`quiz_id`),
  ADD CONSTRAINT `taken_quiz_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `taken_quiz_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `Answers` (`answer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
