-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 10:19 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soil-data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_user` varchar(20) NOT NULL,
  `ad_pass` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_user`, `ad_pass`) VALUES
('admin', 'admin123'),
('admin1', 'admin12');

-- --------------------------------------------------------

--
-- Table structure for table `contat`
--

CREATE TABLE `contat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contat`
--

INSERT INTO `contat` (`id`, `name`, `email`, `subject`, `message`) VALUES
(36, 'Sonu', 'sonu@gmail.com', 'Feedback', 'sakgcklcvklcvklcsdlkvds'),
(33, 'xsxas', 'ikdn@kdlnd.com', 'scac', 'jlS;LnslsS');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `query_id` int(11) NOT NULL,
  `user_uname` varchar(30) NOT NULL,
  `query` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`query_id`, `user_uname`, `query`, `answer`) VALUES
(18, 'alex.p', 'who will be responsible ?', 'ankush\r\n'),
(30, 'monty.s', 'sadad', ''),
(31, 'monty.s', 'ssdasd', ''),
(33, 'monty.s', 'ddsadasd', '');

-- --------------------------------------------------------

--
-- Table structure for table `observer`
--

CREATE TABLE `observer` (
  `obs_id` int(11) NOT NULL,
  `obs_uname` varchar(20) NOT NULL,
  `obs_pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `observer`
--

INSERT INTO `observer` (`obs_id`, `obs_uname`, `obs_pass`) VALUES
(1, 'obs', 'obs123');

-- --------------------------------------------------------

--
-- Table structure for table `soil_sample`
--

CREATE TABLE `soil_sample` (
  `user_uname` varchar(30) NOT NULL,
  `sample_no` int(11) NOT NULL,
  `magnesium` decimal(15,4) NOT NULL,
  `nitrogen` decimal(15,4) NOT NULL,
  `potassium` decimal(15,4) NOT NULL,
  `phosphorus` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soil_sample`
--

INSERT INTO `soil_sample` (`user_uname`, `sample_no`, `magnesium`, `nitrogen`, `potassium`, `phosphorus`) VALUES
('alex.p', 1, '1323.0000', '123.0000', '213.0000', '23.0000'),
('alex.p', 2, '34234.0000', '424.4214', '1545.2400', '0.2366'),
('alex.p', 3, '0.0000', '0.0000', '0.0000', '0.0000'),
('monty.s', 4, '78798.0000', '474.0000', '87984.0000', '48948.0000'),
('monty.s', 5, '12.0000', '54.0000', '8789.0000', '54.0000'),
('krunal.b', 6, '45648.0000', '8554.0000', '745.0000', '4654.0000'),
('ayur.j', 7, '878978.0000', '5456.0000', '45645.0000', '8798.0000'),
('monty.s', 8, '123123.0000', '4234.0000', '4234.0000', '213.0000'),
('aj', 9, '0.0000', '0.0000', '0.0000', '0.0000'),
('krunal.b', 10, '323.0000', '24234.0000', '43242.0000', '42344.0000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_uname` varchar(30) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_uname`, `user_email`, `user_contact`, `user_pass`) VALUES
(1, 'Alex Pettyfer', 'alex.p', 'alex.p@gmail.com', '9563287452', 'qwerty123'),
(2, 'Monty Saini', 'monty.s', 'monty.saini@gmail.co', '9876543213', 'qwerty123'),
(3, 'krunal bagu', 'krunal.b', 'krunal.b@gmail.com', '9876543211', 'qwerty123'),
(4, 'ayur jain', 'ayur.j', 'ayur.j@gmail.com', '9874546125', 'qwerty123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contat`
--
ALTER TABLE `contat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `observer`
--
ALTER TABLE `observer`
  ADD PRIMARY KEY (`obs_id`);

--
-- Indexes for table `soil_sample`
--
ALTER TABLE `soil_sample`
  ADD PRIMARY KEY (`sample_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contat`
--
ALTER TABLE `contat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `observer`
--
ALTER TABLE `observer`
  MODIFY `obs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soil_sample`
--
ALTER TABLE `soil_sample`
  MODIFY `sample_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
