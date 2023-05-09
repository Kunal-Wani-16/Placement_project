-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 02:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_name` varchar(30) NOT NULL,
  `cgpa_criteria` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `cgpa_criteria`, `link`) VALUES
('TCS', 8, 'https://www.tcs.com/careers/india'),
('Infosys', 8, 'https://www.infosys.com/careers/apply.html'),
('Wipro', 8, 'https://careers.wipro.com/careers-home/'),
('capgemini', 8, 'https://www.capgemini.com/careers/'),
('HCL ', 7, 'https://apply.hclfirstcareers.com/');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `prn` bigint(11) NOT NULL,
  `sap` bigint(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `cgpa` float NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fname`, `lname`, `prn`, `sap`, `batch`, `contact`, `email`, `age`, `branch`, `cgpa`, `status`) VALUES
('karan', 'raj', 100, 14002200014, 2060, 100, '@gmail.com', 20, 'computer', 7, 1),
('', '', 501, 0, 0, 501, '', 0, 'computer', 0, 0),
('', '', 503, 0, 0, 503, '', 0, '', 0, 0),
('wps', 'wps', 504, 459, 55, 504, 'gmail.com', 66, 'computer', 55, 0),
('mkji', 'asdf', 1234, 5678, 2045, 789456, '15243', 29, 'lkj', 4, 0),
('lokijuhy', 'awsedrfg', 12345, 78965, 2045, 101010, 'f@gmail.com', 74, 'ls', 1, 1),
('hello', 'hi', 78600, 0, 2060, 78600, '', 0, '', 8, 1),
('pli', 'oki', 159753, 456852, 2023, 7418523069, '@gnil.com', 45, 'it', 9, 0),
('Harshit', 'Gujarati', 6933000, 7410000, 2024, 78451296300, 'harshit@gmail.com', 20, 'IT', 7, 0),
('', '', 69696969, 0, 0, 69696969, '', 0, '', 0, 0),
('', '', 205449124545, 0, 0, 205449124545, '', 0, '', 0, 0),
('Harshal', 'Waghare', 254491245012, 14002200056, 2024, 7498083346, 'harshal.waghare56@svkm', 20, 'computer', 7.45, 1),
('Pranav', 'Wani', 2054491245033, 14002200057, 2024, 7774041842, 'psw@gmail.com', 20, 'computer', 9.01, 1),
('Sanket', 'Borse', 2054491245051, 140022000013, 2024, 9370100988, 'sanket@gmail.com', 21, 'computer', 7.98, 1),
('Tejas', 'Borse', 2054491245052, 14002200063, 2024, 7620145623, 'T=tejas@gmail.com', 20, 'computer', 8.17, 1),
('Sham', 'Ram', 2154491245063, 14002200085, 2020, 4561230789, 'shamram@gmail.com', 26, 'Mechanical', 6.9, 0),
('Lokesh', 'Patil', 2154491245078, 14002200089, 2024, 9174561233, 'lokeshpatil@gmail.com', 20, 'IT', 9.07, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_password`
--

CREATE TABLE `student_password` (
  `prn` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_password`
--

INSERT INTO `student_password` (`prn`, `password`) VALUES
(100, ''),
(498, ''),
(499, ''),
(501, ''),
(503, '$2y$10$lvclhneyLliKcpOxdIE3UurM1gQsRHp243iTu5owU0JtFeMYgJPhG'),
(504, ''),
(786, ''),
(78600, '$2y$10$m/bdOyMxmdYCvCkoiIs6guci44v9YLFNh7FZc/EDLkKTaHmMTYLZ2'),
(69696969, ''),
(205449124545, '$2y$10$/0QKITiAiquxArTlMWja3uj1Z9nVJGOjDlwvtTfwQenfkhg84s7S2'),
(2054491245033, '$2y$10$e2FxCAmAMhCBE2SAoEyRpOeogeTz300w.v71SuV01j4tygzuJpbnm'),
(2154491245078, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_placed_info`
--

CREATE TABLE `student_placed_info` (
  `prn` bigint(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `package` int(11) NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_placed_info`
--

INSERT INTO `student_placed_info` (`prn`, `company`, `package`, `post`) VALUES
(0, 'TCS', 4, ' Trainee '),
(100, 'Wipro', 7, 'JREng'),
(500, '', 0, ''),
(503, '', 0, ''),
(504, 'infosys', 5, 'Jr. Eng'),
(78600, 'TCS', 4, ' assistant '),
(47856969, 'TCS', 4, ' Trainee '),
(78600000, 'TCS', 4, '  assistant  '),
(4785696969, 'TCS', 4, ' Trainee '),
(254491245012, 'jio', 7, 'Testing'),
(2054491245033, 'TCS', 10, 'Jr.Eng'),
(2054491245051, 'Wipro', 8, 'TraineeEng'),
(2054491245052, 'Idea', 6, 'JrEng'),
(2154491245063, 'TCS', 4, 'trainee'),
(2154491245078, 'Capgimini', 12, 'Software Testing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', '$2y$10$VKnnTW5XK.GVTplPuaZAGeQGR0MFYOrZtWZeVRrL2mybgkUsFhXIm', 'admin'),
('faculty', '$2y$10$3hkrQBd1Rlr2PEoOt0qbZeei0r/Jq1jz8DSjLQ.i2780Cq/PMrW6m', 'faculty'),
('try', '$2y$10$Jx3i/kN8MNdYQ6kT8iBPt.ssPEnIfCqhikUHQQUguQI/grZo5epbG', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `username` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dept` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`username`, `fname`, `lname`, `contact`, `email`, `dept`) VALUES
('admin', 'Vijayalaxmi', 'Bittal', 1234567890, 'vijayalaxmibittal@gmail.com', 'computer'),
('faculty', 'karan', 'sharma ', 454545454545, 'karan@gmail.com', 'computer'),
('try', 'try', 'try ', 0, 'try@gmail.com', 'computer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`prn`);

--
-- Indexes for table `student_password`
--
ALTER TABLE `student_password`
  ADD PRIMARY KEY (`prn`);

--
-- Indexes for table `student_placed_info`
--
ALTER TABLE `student_placed_info`
  ADD PRIMARY KEY (`prn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
