-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2017 at 11:16 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `avclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `username`, `password`, `firstname`, `lastname`, `type`) VALUES
(1, 'joe', 'joe123', 'Joe', 'TeacherGuy', 'teacher'),
(2, 'jane', 'jane123', 'Jane', 'TeacherLady', 'teacher'),
(3, 'betty', 'betty123', 'Betty', 'TechLady', 'tech'),
(4, 'brian', 'brian123', 'Brian', 'TechGuy', 'tech'),
(5, 'jessie', 'rocket', 'Jessie', 'Jamerson', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `problem_types`
--

DROP TABLE IF EXISTS `problem_types`;
CREATE TABLE `problem_types` (
  `type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `displayorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem_types`
--

INSERT INTO `problem_types` (`type_id`, `type`, `displayorder`) VALUES
(1, 'Computer Problem', 3),
(2, 'Projector Problem', 2),
(3, 'AV Cart Needed', 1),
(4, 'Other', 99),
(5, 'Video Conference Set Up', 4);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `avtech_id` int(11) DEFAULT NULL,
  `room` varchar(5) NOT NULL,
  `problem_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `comments` text NOT NULL,
  `confirmation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `teacher_id`, `avtech_id`, `room`, `problem_type`, `status`, `comments`, `confirmation`) VALUES
(1, 2, 4, '111', 'AV Cart Needed', 'Resolved', 'please help', 'T00000001'),
(2, 1, 4, '222', 'Video Conference Set Up', 'Resolved', 'no sound!', 'T00000002'),
(3, 2, 4, '111', 'Computer Problem', 'Resolved', 'mouse won''t work', 'T00000003'),
(4, 1, 4, '222', 'Projector Problem', 'Resolved', 'bad bulb', 'T00000004'),
(5, 2, 4, '444', 'Other', 'Resolved', 'test', 'T00000005'),
(6, 2, 4, '123', 'Other', 'Resolved', 'test', 'T00000006'),
(7, 2, 4, '123', 'Other', 'Resolved', 'test', 'T00000007'),
(8, 2, 4, 'test', 'Other', 'Resolved', 'test', 'T00000008'),
(9, 2, NULL, '123', 'AV Cart Needed', 'In Progress', 'Class starts in 15 minutes.  Help!', 'T00000009'),
(10, 2, NULL, '333', 'Computer Problem', 'In Progress', 'I have a virus', 'T00000010'),
(11, 5, NULL, '444', 'Video Conference Set Up', 'In Progress', 'camera is broken', 'T00000011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- Indexes for table `problem_types`
--
ALTER TABLE `problem_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `avtech_id` (`avtech_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `problem_types`
--
ALTER TABLE `problem_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;