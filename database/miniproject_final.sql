-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 05:25 AM
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
  `cgpa_criteria` int(1) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `cgpa_criteria`, `link`) VALUES
('TCS', 8, 'https://www.tcs.com/careers/india'),
('Infosys', 8, 'https://career.infosys.com/joblist');

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
('Christophe', 'Anderson', 45001, 200038, 2022, 1234567891, 'ChristopherAnderson@gmail.com', 23, 'computer', 6, 1),
('Ronald', 'Clark', 45002, 200039, 2022, 1234567892, 'RonaldClark@gmail.com', 23, 'computer', 9, 0),
('Mary', 'Wright', 45003, 200040, 2022, 1234567893, 'MaryWright@gmail.com', 23, 'computer', 7, 1),
('Lisa', 'Mitchell', 45004, 200041, 2022, 1234567894, 'LisaMitchell@gmail.com', 23, 'computer', 8, 1),
('Michelle', 'Johnson', 45005, 200042, 2022, 1234567895, 'MichelleJohnson@gmail.com', 23, 'computer', 7, 0),
('John', 'Thomas', 45006, 200043, 2022, 1234567896, 'JohnThomas@gmail.com', 23, 'computer', 6, 0),
('Daniel', 'Rodriguez', 45007, 200044, 2022, 1234567897, 'DanielRodriguez@gmail.com', 23, 'computer', 8, 1),
('Anthony', 'Lopez', 45008, 200045, 2022, 1234567898, 'AnthonyLopez@gmail.com', 23, 'computer', 8, 1),
('Patricia', 'Perez', 45009, 200046, 2022, 1234567899, 'PatriciaPerez@gmail.com', 23, 'computer', 9, 1),
('Nancy', 'Williams', 45010, 200047, 2023, 1234567900, 'NancyWilliams@hotmail.com', 22, 'computer', 7, 0),
('Laura', 'Jackson', 45011, 200048, 2023, 1234567901, 'LauraJackson@hotmail.com', 22, 'computer', 7, 1),
('Robert', 'Lewis', 45012, 200049, 2023, 1234567902, 'RobertLewis@hotmail.com', 22, 'computer', 6, 1),
('Paul', 'Hill', 45013, 200050, 2023, 1234567903, 'PaulHill@hotmail.com', 22, 'computer', 9, 0),
('Kevin', 'Roberts', 45014, 200051, 2023, 1234567904, 'KevinRoberts@hotmail.com', 22, 'computer', 8, 1),
('Linda', 'Jones', 45015, 200052, 2023, 1234567905, 'LindaJones@hotmail.com', 22, 'computer', 7, 1),
('Karen', 'White', 45016, 200053, 2023, 1234567906, 'KarenWhite@hotmail.com', 22, 'computer', 5, 1),
('Sarah', 'Lee', 45017, 200054, 2023, 1234567907, 'SarahLee@hotmail.com', 22, 'computer', 7, 0),
('Michael', 'Scott', 45018, 200055, 2023, 1234567908, 'MichaelScott@hotmail.com', 22, 'computer', 4, 1),
('Mark', 'Turner', 45019, 200056, 2023, 1234567909, 'MarkTurner@hotmail.com', 22, 'computer', 9, 0),
('Jason', 'Brown', 45020, 200057, 2023, 1234567910, 'JasonBrown@aol.com', 22, 'computer', 8, 1),
('James', 'Smith', 91002, 200037, 2022, 1234567890, 'JamesSmith@gmail.com', 23, 'computer', 7, 1);

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
(45001, ''),
(45002, ''),
(45003, ''),
(45004, ''),
(45005, ''),
(45006, ''),
(45007, ''),
(45008, ''),
(45009, ''),
(45010, ''),
(45011, ''),
(45012, ''),
(45013, ''),
(45014, ''),
(45015, ''),
(45016, ''),
(45017, ''),
(45018, ''),
(45019, ''),
(45020, ''),
(91002, '');

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
(45001, 'Netwin', 3, 'Functional Testing'),
(45003, 'Genpact', 5, 'Jr.Engineer'),
(45004, 'TCS', 9, 'Trainee'),
(45007, 'TCS', 8, 'System Programmer'),
(45008, 'Genpact', 4, 'Technical Consultant'),
(45009, 'Genpact', 6, 'System Engineer'),
(45011, 'Genpact', 5, 'Jr.Engineer'),
(45012, 'Infosys', 3, 'Trainee'),
(45014, 'Vtech Solutions', 4, 'Functional Testing'),
(45015, 'Netwin', 3, 'System Programmer'),
(45016, 'Netwin', 7, 'Functional Testing'),
(45018, 'Infosys', 9, 'Functional Testing'),
(45020, 'Vtech Solutions', 6, 'Trainee'),
(91002, 'TCS', 4, 'System Programmer');

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
('admin', '$2y$10$clqzNgLPuqHFuHHUza/kW.mZb/xjkgwO0EjhFbPue9shl9h0P86/u', 'admin'),
('faculty', '$2y$10$TtdPjcWc3kHpcpczLEzHC.lCy.qpj45xtuIshudrmMwxvpBZ8WwvW', 'faculty');

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
('admin', 'Vijayalaxmi', 'Bittal ', 7774041842, 'VijayalaxmiBittal@gmail.com', 'computer'),
('faculty', 'karan', 'sharma ', 75482633510, 'karan@gmail.com', 'comp');

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
