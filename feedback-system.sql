-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 07:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(1100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'CO'),
(2, 'EE');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `f_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `f_branch` text NOT NULL,
  `f_sem` text NOT NULL,
  `f_subject` text NOT NULL,
  `f_feedback` text NOT NULL,
  `f_total_students` int(11) NOT NULL,
  `crt_dttm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`f_id`, `f_name`, `f_branch`, `f_sem`, `f_subject`, `f_feedback`, `f_total_students`, `crt_dttm`) VALUES
(22, 'Amol T mankar', 'CO', '6th SEM', 'NIS', 'q1:135|q2:129|q3:133|q4:132|q5:125|q6:116|q7:127|q8:123|q9:124|q10:123|', 31, '2020-07-19 15:22:05'),
(24, 'Abhishek kale', 'CO', '6th SEM', 'Android', 'q1:132|q2:126|q3:114|q4:118|q5:122|q6:118|q7:120|q8:121|q9:121|q10:124|', 31, '2020-07-19 15:22:05'),
(25, 'Satyajit Deshmukh', 'CO', '6th SEM', 'Management ', 'q1:128|q2:128|q3:123|q4:127|q5:126|q6:135|q7:120|q8:130|q9:120|q10:117|', 31, '2020-07-19 15:22:05'),
(26, 'Abhishek Kale', 'CO', '6th SEM', 'Emerging trends in IT', 'q1:135|q2:125|q3:116|q4:119|q5:123|q6:123|q7:124|q8:119|q9:114|q10:122|', 31, '2020-07-19 15:22:05'),
(27, 'Rupesh Bobde', 'CO', '6th SEM', 'Python', 'q1:137|q2:131|q3:118|q4:119|q5:120|q6:128|q7:120|q8:124|q9:125|q10:126|', 31, '2020-07-19 15:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_details`
--

CREATE TABLE `feedback_details` (
  `s_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `crt_dttm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_details`
--

INSERT INTO `feedback_details` (`s_id`, `response`, `crt_dttm`) VALUES
(1262, 'c1q1:3|c1q2:4|c1q3:4|c1q4:4|c1q5:4|c1q6:2|c1q7:2|c1q8:3|c1q9:3|c1q10:4|', '2019-07-16 13:46:18'),
(1263, 'c1q1:4|c1q2:4|c1q3:5|c1q4:4|c1q5:3|c1q6:3|c1q7:3|c1q8:3|c1q9:4|c1q10:4|', '2021-07-16 13:43:50'),
(1264, 'c1q1:3|c1q2:2|c1q3:3|c1q4:3|c1q5:4|c1q6:4|c1q7:3|c1q8:5|c1q9:4|c1q10:4|', '2020-07-16 07:56:46'),
(1265, 'c1q1:2|c1q2:3|c1q3:2|c1q4:4|c1q5:4|c1q6:4|c1q7:3|c1q8:3|c1q9:5|c1q10:4|', '2020-07-16 08:00:38'),
(1266, 'c1q1:1|c1q2:3|c1q3:4|c1q4:3|c1q5:5|c1q6:3|c1q7:2|c1q8:4|c1q9:4|c1q10:2|', '2020-07-16 08:03:45'),
(1267, 'c1q1:1|c1q2:5|c1q3:3|c1q4:4|c1q5:4|c1q6:3|c1q7:3|c1q8:4|c1q9:4|c1q10:4|', '2020-07-16 08:07:54'),
(1268, 'c1q1:4|c1q2:4|c1q3:4|c1q4:5|c1q5:4|c1q6:4|c1q7:5|c1q8:5|c1q9:3|c1q10:5|', '2020-07-16 08:12:59'),
(1269, 'c1q1:2|c1q2:5|c1q3:3|c1q4:4|c1q5:4|c1q6:4|c1q7:3|c1q8:4|c1q9:4|c1q10:4|', '2020-07-16 08:16:47'),
(1270, 'c1q1:2|c1q2:4|c1q3:3|c1q4:5|c1q5:4|c1q6:4|c1q7:4|c1q8:4|c1q9:3|c1q10:4|', '2020-07-16 08:19:48'),
(1271, 'c1q1:1|c1q2:3|c1q3:5|c1q4:5|c1q5:4|c1q6:4|c1q7:3|c1q8:3|c1q9:5|c1q10:5|', '2020-07-16 08:22:39'),
(1272, 'c1q1:4|c1q2:5|c1q3:4|c1q4:4|c1q5:4|c1q6:3|c1q7:3|c1q8:3|c1q9:4|c1q10:4|', '2020-07-16 08:27:03'),
(1273, 'c1q1:2|c1q2:4|c1q3:4|c1q4:5|c1q5:5|c1q6:4|c1q7:4|c1q8:4|c1q9:4|c1q10:5|', '2020-07-16 08:35:16'),
(1274, 'c1q1:4|c1q2:4|c1q3:4|c1q4:3|c1q5:5|c1q6:1|c1q7:4|c1q8:4|c1q9:5|c1q10:4|', '2020-07-16 08:38:00'),
(1275, 'c1q1:5|c1q2:4|c1q3:4|c1q4:3|c1q5:3|c1q6:3|c1q7:4|c1q8:4|c1q9:4|c1q10:4|', '2020-07-16 13:15:54'),
(1276, 'c1q1:4|c1q2:4|c1q3:5|c1q4:5|c1q5:4|c1q6:5|c1q7:5|c1q8:5|c1q9:5|c1q10:4|', '2020-07-16 13:19:12'),
(1277, 'c1q1:4|c1q2:4|c1q3:5|c1q4:3|c1q5:5|c1q6:4|c1q7:3|c1q8:4|c1q9:3|c1q10:4|', '2020-07-16 13:21:35'),
(1278, 'c1q1:3|c1q2:4|c1q3:4|c1q4:4|c1q5:2|c1q6:4|c1q7:3|c1q8:4|c1q9:4|c1q10:3|', '2020-07-16 13:24:26'),
(1279, 'c1q1:4|c1q2:5|c1q3:5|c1q4:5|c1q5:4|c1q6:3|c1q7:1|c1q8:1|c1q9:1|c1q10:1|', '2020-07-16 13:29:38'),
(1280, 'c1q1:4|c1q2:3|c1q3:3|c1q4:1|c1q5:3|c1q6:5|c1q7:5|c1q8:4|c1q9:3|c1q10:3|', '2020-07-16 13:32:00'),
(1281, 'c1q1:4|c1q2:4|c1q3:4|c1q4:3|c1q5:3|c1q6:4|c1q7:4|c1q8:4|c1q9:3|c1q10:4|', '2020-07-16 13:34:43'),
(1282, 'c1q1:4|c1q2:3|c1q3:4|c1q4:3|c1q5:3|c1q6:3|c1q7:4|c1q8:3|c1q9:3|c1q10:4|', '2020-07-16 13:37:12'),
(1283, 'c1q1:4|c1q2:4|c1q3:4|c1q4:5|c1q5:4|c1q6:5|c1q7:5|c1q8:4|c1q9:3|c1q10:5|', '2020-07-16 13:39:27'),
(1284, 'c1q1:4|c1q2:4|c1q3:4|c1q4:3|c1q5:4|c1q6:4|c1q7:4|c1q8:3|c1q9:5|c1q10:4|', '2020-07-16 13:50:16'),
(1285, 'c1q1:4|c1q2:4|c1q3:4|c1q4:4|c1q5:4|c1q6:4|c1q7:4|c1q8:4|c1q9:4|c1q10:4|', '2020-07-16 13:55:15'),
(1286, 'c1q1:4|c1q2:3|c1q3:2|c1q4:4|c1q5:2|c1q6:5|c1q7:4|c1q8:4|c1q9:3|c1q10:3|', '2020-07-16 13:57:27'),
(1287, 'c1q1:4|c1q2:2|c1q3:4|c1q4:4|c1q5:4|c1q6:4|c1q7:4|c1q8:4|c1q9:4|c1q10:4|', '2020-07-16 14:02:43'),
(1288, 'c1q1:4|c1q2:4|c1q3:4|c1q4:4|c1q5:5|c1q6:3|c1q7:3|c1q8:5|c1q9:3|c1q10:5|', '2020-07-16 14:05:33'),
(1289, 'c1q1:4|c1q2:4|c1q3:4|c1q4:4|c1q5:4|c1q6:4|c1q7:4|c1q8:4|c1q9:4|c1q10:4|', '2020-07-16 14:10:06'),
(1290, 'c1q1:4|c1q2:4|c1q3:4|c1q4:4|c1q5:5|c1q6:4|c1q7:3|c1q8:4|c1q9:5|c1q10:3|', '2020-07-16 14:30:46'),
(1291, 'c1q1:4|c1q2:5|c1q3:4|c1q4:4|c1q5:4|c1q6:4|c1q7:4|c1q8:3|c1q9:4|c1q10:4|', '2020-07-16 14:33:43'),
(1292, 'c1q1:4|c1q2:5|c1q3:4|c1q4:4|c1q5:4|c1q6:3|c1q7:2|c1q8:3|c1q9:3|c1q10:5|', '2020-07-19 15:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `hod_details`
--

CREATE TABLE `hod_details` (
  `h_id` int(11) NOT NULL,
  `h_name` text NOT NULL,
  `h_username` text NOT NULL,
  `h_password` text NOT NULL,
  `branch` text NOT NULL,
  `crt_dttm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod_details`
--

INSERT INTO `hod_details` (`h_id`, `h_name`, `h_username`, `h_password`, `branch`, `crt_dttm`) VALUES
(21, 'Satyajit Deshmukh', 'sd123', 'sd123', 'CO', '2020-06-25 14:25:04'),
(22, 'test 123', 'test123', 'test123', 'Electronic', '2020-07-21 06:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `principal_details`
--

CREATE TABLE `principal_details` (
  `p_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_username` text NOT NULL,
  `p_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal_details`
--

INSERT INTO `principal_details` (`p_id`, `p_name`, `p_username`, `p_password`) VALUES
(1, 'G.F Potbhare', 'nitp1199', 'nitp1199');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `s_id` int(11) NOT NULL,
  `s_name` text NOT NULL,
  `s_username` text NOT NULL,
  `s_password` text NOT NULL,
  `s_branch` text NOT NULL,
  `s_sem` text NOT NULL,
  `crt_dttm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`s_id`, `s_name`, `s_username`, `s_password`, `s_branch`, `s_sem`, `crt_dttm`) VALUES
(1262, '?Sakshi Kamone\r\n', '?sakshi.kamone0', '?kamone0', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1263, 'Sneha Mothghare\r\n', 'sneha.mothghare1', 'smothghare1', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1264, 'Shreyashi Ambade\r\n', 'shreyashi.ambade2', 'sambade2', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1265, 'Prerna Bhanarkar\r\n', 'prerna.bhanarkar3', 'pbhanarkar3', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1266, 'Manali Kamatkar\r\n', 'manali.kamatkar4', 'mkamatkar4', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1267, 'Sudhanshu Bajpai\r\n', 'sudhanshu.bajpai5', 'sbajpai5', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1268, 'Jaideep Borkar\r\n', 'jaideep.borkar6', 'jborkar6', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1269, 'Bhavesh Chawla\r\n', 'bhavesh.chawla7', 'bchawla7', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1270, 'Prachi Shahu\r\n', 'prachi.shahu8', 'pshahu8', 'CO', '6th SEM', '2020-07-16 07:49:23'),
(1271, 'Prachi Borate\r\n', 'prachi.borate9', 'pborate9', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1272, 'Khushali Bure\r\n', 'khushali.bure10', 'kbure10', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1273, 'Rohit Sudhanshu\r\n', 'rohit.sudhanshu11', 'rsudhanshu11', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1274, 'Aakash Yadav\r\n', 'aakash.yadav12', 'ayadav12', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1275, 'Rishi Jaiswal\r\n', 'rishi.jaiswal13', 'rjaiswal13', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1276, 'Anshul Thakre\r\n', 'anshul.thakre14', 'athakre14', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1277, 'Hrunalika Mouje\r\n', 'hrunalika.mouje15', 'hmouje15', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1278, 'Komal Tibole\r\n', 'komal.tibole16', 'ktibole16', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1279, 'Aniket Potbhare\r\n', 'aniket.potbhare17', 'apotbhare17', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1280, 'Harshal Gajbhiye\r\n', 'harshal.gajbhiye18', 'hgajbhiye18', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1281, 'Pratkiksha kanekar\r\n', 'pratkiksha.kanekar19', 'pkanekar19', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1282, 'Anjali Dongre\r\n', 'anjali.dongre20', 'adongre20', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1283, 'Anchal meshram\r\n', 'anchal.meshram21', 'ameshram21', 'CO', '6th SEM', '2020-07-16 07:49:24'),
(1284, 'khushi mehra\r\n', 'khushi.mehra22', 'kmehra22', 'CO', '6th SEM', '2020-07-16 07:49:25'),
(1285, 'Rajni pethe\r\n', 'rajni.pethe23', 'rpethe23', 'CO', '6th SEM', '2020-07-16 07:49:25'),
(1286, 'Pratkiksha Parteki\r\n', 'pratkiksha.parteki24', 'pparteki24', 'CO', '6th SEM', '2020-07-16 07:49:25'),
(1287, 'Purnima gajbhiye\r\n', 'purnima.gajbhiye25', 'pgajbhiye25', 'CO', '6th SEM', '2020-07-16 07:49:25'),
(1288, 'Darshana narnavre\r\n', 'darshana.narnavre26', 'dnarnavre26', 'CO', '6th SEM', '2020-07-16 07:49:25'),
(1289, 'Neha khandare\r\n', 'neha.khandare27', 'nkhandare27', 'CO', '6th SEM', '2020-07-16 07:49:25'),
(1290, 'test best', 'test.best28', 'tbest28', 'CO', '6th SEM', '2020-07-16 14:11:32'),
(1291, 'test besttt', 'test.besttt29', 'tbesttt29', 'CO', '6th SEM', '2020-07-16 14:11:45'),
(1335, 'Melda Dumlao\r\n', 'melda.dumlao0', 'mdumlao0', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1336, 'Isadora Holguin\r\n', 'isadora.holguin1', 'iholguin1', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1337, 'Lora Richardson\r\n', 'lora.richardson2', 'lrichardson2', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1338, 'Zenobia Hysell\r\n', 'zenobia.hysell3', 'zhysell3', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1339, 'Diamond Bolin\r\n', 'diamond.bolin4', 'dbolin4', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1340, 'Aleshia Debose\r\n', 'aleshia.debose5', 'adebose5', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1341, 'Catarina Mcwilliam\r\n', 'catarina.mcwilliam6', 'cmcwilliam6', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1342, 'Delta Demeritt\r\n', 'delta.demeritt7', 'ddemeritt7', 'CO', '3rd SEM', '2020-07-20 16:30:42'),
(1343, 'Renae Bernier\r\n', 'renae.bernier8', 'rbernier8', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1344, 'Walton Harkness\r\n', 'walton.harkness9', 'wharkness9', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1345, 'Joni Gann\r\n', 'joni.gann10', 'jgann10', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1346, 'Yu Mcgray\r\n', 'yu.mcgray11', 'ymcgray11', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1347, 'Alisia Rutt\r\n', 'alisia.rutt12', 'arutt12', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1348, 'Shaina Cosenza\r\n', 'shaina.cosenza13', 'scosenza13', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1349, 'Ming Bruso\r\n', 'ming.bruso14', 'mbruso14', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1350, 'Sade Failla\r\n', 'sade.failla15', 'sfailla15', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1351, 'Genna Oommen\r\n', 'genna.oommen16', 'goommen16', 'CO', '3rd SEM', '2020-07-20 16:30:43'),
(1352, 'Rhoda Mcclaren\r\n', 'rhoda.mcclaren0', 'rmcclaren0', 'Electronic', '2nd SEM', '2020-07-21 15:55:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `feedback_details`
--
ALTER TABLE `feedback_details`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `hod_details`
--
ALTER TABLE `hod_details`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `principal_details`
--
ALTER TABLE `principal_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback_details`
--
ALTER TABLE `feedback_details`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1293;

--
-- AUTO_INCREMENT for table `hod_details`
--
ALTER TABLE `hod_details`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `principal_details`
--
ALTER TABLE `principal_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1353;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
