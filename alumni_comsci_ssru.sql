-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 05:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_comsci_ssru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(11) NOT NULL,
  `admin_firstname` varchar(20) NOT NULL,
  `admin_lastname` varchar(20) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_status` int(1) NOT NULL,
  `admin_created_by` int(11) NOT NULL,
  `admin_created_at` datetime NOT NULL,
  `admin_update_by` varchar(11) NOT NULL,
  `admin_update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_password`, `admin_status`, `admin_created_by`, `admin_created_at`, `admin_update_by`, `admin_update_at`) VALUES
('123456', 'admin_test', 'test_admin', 'admin_test', 'pass1234', 1, 0, '0000-00-00 00:00:00', '2147483647', '2022-10-22 10:11:23'),
('2147483647', 'ยุทธภูมิ', 'บุญมาก', 'poom', 'pass1234', 1, 123456, '2022-10-21 00:00:00', '123456', '2022-10-22 08:15:06'),
('62122201022', 'ธันยาภรณ์', 'สีมาชัย', 'piar', 'pass1234', 1, 123456, '2022-10-22 00:00:00', '123456', '2022-11-21 11:26:28'),
('7894', 'test', 'test', 'test12', '1234', 1, 2147483647, '2022-10-22 10:11:50', '123456', '2022-11-21 11:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alomni_education`
--

CREATE TABLE `tb_alomni_education` (
  `education_id` int(11) NOT NULL,
  `education_year` varchar(4) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `education_faculty` varchar(50) NOT NULL,
  `education_branch` varchar(50) NOT NULL,
  `education_university` varchar(50) NOT NULL,
  `alumni_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alomni_education`
--

INSERT INTO `tb_alomni_education` (`education_id`, `education_year`, `education_level`, `education_faculty`, `education_branch`, `education_university`, `alumni_id`) VALUES
(2, '122', 'ปริญญาตรี', 'dsfsdgdfgsdfg', 'shsgfhssdfb', 'fsbfbfhsh', '2147483647'),
(3, '2542', 'ปริญญาตรี', 'fgdfg', 'gdfgd', 'gdfgdf', '2147483647'),
(8, '', 'ปริญญาตรี', '', '', '', '62122201022'),
(9, '2566', 'ปริญญาตรี', 'วิทยาศาตร์และเทคโนโลยี', 'วิทยาการคอมพิวเตอร์', 'มหิดล', '62122201022'),
(10, '2566', 'ปริญญาตรี', 'วิทยาศาตร์และเทคโนโลยี', 'วิทยาการคอมพิวเตอร์', 'มหิดล', '62122201002'),
(11, '2566', 'ปริญญาโท', 'วิทยาศาตร์และเทคโนโลยี', 'วิทยาการคอมพิวเตอร์', 'London', '62122201008'),
(12, '', 'ปริญญาตรี', '', '', '', '62122201015'),
(14, '555', 'ปริญญาโท', '555', '555', '555', '555'),
(15, '', 'ปริญญาตรี', '', '', '', '555'),
(16, '', 'ปริญญาตรี', '', '', '', '5727583'),
(17, '', 'ปริญญาตรี', '', '', '', '5727583'),
(21, '', 'ปริญญาตรี', '', '', '', '435354'),
(22, '', 'ปริญญาตรี', '', '', '', '5453453453');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `alumni_id` varchar(11) NOT NULL,
  `alumni_year_in` int(11) NOT NULL,
  `alumni_year_out` int(11) NOT NULL,
  `alumni_prefix` varchar(20) NOT NULL,
  `alumni_firstname` varchar(20) DEFAULT NULL,
  `alumni_lastname` varchar(20) DEFAULT NULL,
  `alumni_birthday` date DEFAULT NULL,
  `alumni_email` varchar(100) DEFAULT NULL,
  `alumni_phone` varchar(10) DEFAULT NULL,
  `alumni_address` varchar(255) DEFAULT NULL,
  `alumni_idcard` varchar(13) DEFAULT NULL,
  `alumni_comment` text DEFAULT NULL,
  `alumni_status` int(1) DEFAULT 0,
  `alumni_sex` varchar(6) NOT NULL,
  `alumni_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`alumni_id`, `alumni_year_in`, `alumni_year_out`, `alumni_prefix`, `alumni_firstname`, `alumni_lastname`, `alumni_birthday`, `alumni_email`, `alumni_phone`, `alumni_address`, `alumni_idcard`, `alumni_comment`, `alumni_status`, `alumni_sex`, `alumni_img`) VALUES
('435354', 45252, 52, 'นาย', 'ulyu', 'tyuty', '2022-11-04', 's62122201008@ssru.ac.th', 'hth', 'iuluky', '', '', 1, 'ชาย', 'images/alumni_image/435354.png'),
('5453453453', 5785, 52, 'นาย', 'จณิสตา', 'ดาราแสง', '2022-11-21', 's62122201002@ssru.ac.th', '0805419181', '5785785', '', '', 1, 'ชาย', 'images/alumni_image/5453453453.png'),
('555', 5555, 5555, 'นาย', '555', '555', '5555-05-05', '555@gmail.com', '555', '555', '', '5555', 1, 'ชาย', ''),
('5727583', 4527, 55, 'นาย', 'จณิสตา', 'ดาราแสง', '2022-11-20', 's62122201002@ssru.ac.th', '0805419181', 'feerdg', '', '', 0, 'ชาย', ''),
('62122201002', 2562, 2565, 'นางสาว', 'จณิสตา', 'ดาราแสง', '2000-01-09', 's62122201002@ssru.ac.th', '0805419181', '363/2 ม.1 ต.เสาธง อ.ร่อนพิบูลย์ จ.นครศรีธรรมราช 80350', '1801700102207', '', 1, 'หญิง', ''),
('62122201008', 2562, 2565, 'นาย', 'ยุทธภูมิ', 'บุญมาก', '2000-05-21', 's62122201008@ssru.ac.th', '0804160074', '23/1 ม.4 ต.ส้มป่อย อ.ราษีไศล จ.ศรีสะเกษ 33160', '1330901366396', 'แอร์ไม่เย็นครับ', 1, 'ชาย', ''),
('62122201015', 2562, 2565, 'นาย', 'ขจรวิทย์', 'ศรีสุนมร', '2001-04-23', 's62122201015@ssru.ac.th', '0899996991', 'บ้านเลขที่ 69 ซ.ไมตรีจิต13 ถ.ไมตรีจิต แขวงสามวาตะวันออก เขตคลองสามวา กรุงเทพมหานคร 10510', '1104200497813', 'เป็นเว็บที่สวยงามมากครับ มีระบบการทำงานที่ดี :)', 1, 'ชาย', ''),
('62122201022', 2562, 2565, 'นางสาว', 'ธันยาภรณ์', 'สีมาชัย', '2000-07-27', 's62122201022@ssru.ac.th', '0613608138', '103 หมู่ 8 บ้านม่วย ต.กู่กาสิงห์ อ.เกษตรวิสัย จ.ร้อยเอ็ด 45150', '1101801108886', 'สวยมากเลยค่ะ', 1, 'หญิง', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni_school`
--

CREATE TABLE `tb_alumni_school` (
  `school_id` int(20) NOT NULL,
  `alumni_id` varchar(11) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `school_province` varchar(50) NOT NULL,
  `school_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni_school`
--

INSERT INTO `tb_alumni_school` (`school_id`, `alumni_id`, `school_name`, `school_province`, `school_url`) VALUES
(1, '44444', 'kkkk', 'kkkk', 'kkkk'),
(2, '44444', 'kkkk', 'kkkk', 'kkkk'),
(3, '44444', 'kkkk', 'kkkk', 'kkkk'),
(4, '2147483647', 'dsfadf', 'few', 'asdfasdf.com'),
(14, '62122201022', 'จันทรุเบกษาอนุสรณ์', 'ร้อยเอ็ด', 'http://www.cba.ac.th/'),
(15, '62122201002', 'มุสลิมสันติธรรมมูลนิธิ', 'นครศรีธรรมราช', 'http://www.santitham.ac.th/'),
(16, '62122201008', 'โรงเรียนส้มป่อยพิทยาคม', 'ศรีสะเกษ', 'https://www.sompoy.ac.th/'),
(17, '62122201015', 'โรงเรียนนวมินทราชินูทิศ สตรีวิทยา2', 'กรุงเทพมหานคร', 'https://www.nmrsw2.ac.th/'),
(19, '555', '555', '555', '555'),
(20, '5727583', 'fsdf', 'dfsd', 'fsdfsd'),
(22, '435354', 'yuty', 'utyu', 'tyuty'),
(23, '5453453453', '875785', 'dfsd', '5875');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni_work`
--

CREATE TABLE `tb_alumni_work` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` text NOT NULL,
  `company_start` int(4) NOT NULL,
  `company_end` int(4) NOT NULL,
  `company_performance` text NOT NULL,
  `alumni_id` varchar(11) NOT NULL,
  `company_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni_work`
--

INSERT INTO `tb_alumni_work` (`company_id`, `company_name`, `company_address`, `company_start`, `company_end`, `company_performance`, `alumni_id`, `company_position`) VALUES
(2, 'fsgretew', '52', 45655, 415646, '2525', '2147483647', 'dfgsdfg'),
(3, 'ghjghj', 'hjghjgh', 454, 545, 'jghjgh', '2147483647', 'ghjmj'),
(8, '', '', 0, 0, '', '62122201022', ''),
(9, '', '', 0, 0, '', '62122201022', ''),
(10, '', '', 0, 0, '', '62122201002', ''),
(11, 'Poom จำกัด', '23/1 ม.4 ต.ส้มป่อย อ.ราษีไศล จ.ศรีสะเกษ 33160', 2567, 0, 'เด่นทุกอย่าง', '62122201008', 'CEO'),
(12, 'Poom จำกัด', 'บ้านเลขที่ 69 ซ.ไมตรีจิต13 ถ.ไมตรีจิต แขวงสามวาตะวันออก เขตคลองสามวา กรุงเทพมหานคร 10510', 2565, 2566, 'ทุกด้าน', '62122201015', 'หัวหน้า'),
(14, '', '', 0, 0, '', '555', ''),
(15, '', '', 0, 0, '', '555', ''),
(16, '', '', 0, 0, '', '5727583', ''),
(17, '', '', 0, 0, '', '5727583', ''),
(21, '', '', 0, 0, '', '435354', ''),
(22, '', '', 0, 0, '', '5453453453', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL,
  `log_table` varchar(20) NOT NULL,
  `log_time` date NOT NULL,
  `log_action` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `alumni_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_alomni_education`
--
ALTER TABLE `tb_alomni_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `tb_alumni_school`
--
ALTER TABLE `tb_alumni_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `tb_alumni_work`
--
ALTER TABLE `tb_alumni_work`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alomni_education`
--
ALTER TABLE `tb_alomni_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_alumni_school`
--
ALTER TABLE `tb_alumni_school`
  MODIFY `school_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_alumni_work`
--
ALTER TABLE `tb_alumni_work`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
