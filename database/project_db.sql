-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2019 at 04:23 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `comp_id` int(11) NOT NULL,
  `comp_code` varchar(100) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `comp_namesec` varchar(100) NOT NULL,
  `comp_displayname` varchar(100) NOT NULL,
  `comp_postcode` varchar(100) NOT NULL,
  `comp_address` varchar(100) NOT NULL,
  `comp_buildingname` varchar(100) NOT NULL,
  `comp_tel` varchar(100) NOT NULL,
  `comp_fax` varchar(100) NOT NULL,
  `comp_url` varchar(100) NOT NULL,
  `comp_status` varchar(100) NOT NULL,
  `comp_division` varchar(100) NOT NULL,
  `comp_industry` varchar(100) NOT NULL,
  `comp_regdate` varchar(100) NOT NULL,
  `comp_update` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`comp_id`, `comp_code`, `comp_name`, `comp_namesec`, `comp_displayname`, `comp_postcode`, `comp_address`, `comp_buildingname`, `comp_tel`, `comp_fax`, `comp_url`, `comp_status`, `comp_division`, `comp_industry`, `comp_regdate`, `comp_update`) VALUES
(5, '002', 'tests', '', 'tests', 'tests', 'tests', 'tests', 'te-test-tests', 'te-test-tests', 'tests', 'tests', 'tests', 'tests', 'tests', 'é¡§å®¢'),
(8, '004', 'X-Limit-X-Limit ', '', 'test ', 'testss ', 'testss ', 'testsss ', 'testssss ', 'testsssss ', 'testssssss ', 'é¡§å®¢', 'å€‹äºº', 'é›»æ°—ãƒ»ã‚¬ã‚¹ãƒ»ç†±ä¾›çµ¦ãƒ»æ°´é“æ¥­', '2019-03-22 11:48:41 ', '2019-03-28 14:49:08'),
(15, '005', ' haha2', '', 'haha ', 'haha ', 'haha ', 'haha ', 'haha ', 'haha ', 'haha ', 'æœªé¡§å®¢', 'å€‹äºº', 'é›»æ°—ãƒ»ã‚¬ã‚¹ãƒ»ç†±ä¾›çµ¦ãƒ»æ°´é“æ¥­', '2019-03-28 10:33:43 ', '2019-03-29 10:54:20'),
(17, '007', ' SIteglow', ' Siteglows', 'test                   ', 'testss                   ', 'Quezon City                   ', 'tests                   ', '09364031363                   ', 'testsssss                   ', '24646                   ', 'é¡§å®¢', 'å€‹äºº', 'é›»æ°—ãƒ»ã‚¬ã‚¹ãƒ»ç†±ä¾›çµ¦ãƒ»æ°´é“æ¥­', '2019-03-28 14:27:56                   ', '2019-03-29 10:56:10'),
(19, '008', 'Siteglow-X-Limit', 'Siteglow', 'X-Limit', 'testss', 'Quezon City', 'test', '09364031363', 'testsssss', 'test', 'æœªé¡§å®¢', 'å€‹äºº', 'å¸å£²ãƒ»å°å£²æ¥­', '2019-03-29 13:30:59', '2019-03-29 13:30:59'),
(21, '009', 'NIMuel', 'IEman', 'Pogi', '', '', '', '', '', '', '', '', '', '2019-03-29 13:43:16', '2019-03-29 13:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_position` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_phone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_color` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_name`, `emp_position`, `emp_email`, `emp_phone`, `emp_address`, `emp_image`, `emp_color`) VALUES
(2, 'Nimuel Eiman Nebreja', 'Web Developer', 'nimuel@fgsp.ph', '09364031353', 'Batangas City', 'upload/user.png', '#003E00'),
(3, 'Rani Regalado', 'Designer', 'rani@feemo.jp', '09271384854', 'Quezon City', 'upload/user.png', '#B81B1B'),
(4, 'Jay Maico', 'Web Developer', 'jay@feemo.jp', '09236584936', 'Cavite City', 'upload/user.png', '#9E165B'),
(5, 'Jairus Torres', 'Translator', 'jairus@feemo.jp', '09237583829', 'Laguna CIty', 'upload/user.png', '#4294DE'),
(8, 'Mildred Lasac', 'Designer', 'nimuel@feemo.jp', '9999999999', 'Quezon City', 'upload/user.png', '#FF0000'),
(9, 'Mera Bongalon', 'Designer', 'mera@gfsp.ph', '0923475930', 'Cavite City', 'upload/user.png', '#C8D921');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_graph`
--

CREATE TABLE `tbl_graph` (
  `graph_id` int(11) NOT NULL,
  `month` varchar(100) CHARACTER SET latin1 NOT NULL,
  `year` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `amount_sale` varchar(100) CHARACTER SET latin1 NOT NULL,
  `graph_amount` varchar(100) CHARACTER SET latin1 NOT NULL,
  `share_graph` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `proj_id` int(11) NOT NULL,
  `proj_company` varchar(100) NOT NULL,
  `proj_project` varchar(100) NOT NULL,
  `proj_price` varchar(100) NOT NULL,
  `proj_salesprice` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proj_incentive` varchar(100) NOT NULL,
  `proj_orderdate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proj_deaddate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proj_deliverdate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proj_invoicedate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proj_paymentdate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proj_incentdate` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`proj_id`, `proj_company`, `proj_project`, `proj_price`, `proj_salesprice`, `proj_incentive`, `proj_orderdate`, `proj_deaddate`, `proj_deliverdate`, `proj_invoicedate`, `proj_paymentdate`, `proj_incentdate`) VALUES
(43, 'Pogi', 'Nimuel Project', '20000', '2000', '945.48', '2019-04-01', '2019-04-30', '', '', '2019-04-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share`
--

CREATE TABLE `tbl_share` (
  `share_id` int(11) NOT NULL,
  `proj_name` varchar(200) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `share_amount` varchar(100) CHARACTER SET latin1 NOT NULL,
  `share_graph` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'chieto', 'asd'),
(2, 'eiman', 'nimuel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_graph`
--
ALTER TABLE `tbl_graph`
  ADD PRIMARY KEY (`graph_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `tbl_share`
--
ALTER TABLE `tbl_share`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_graph`
--
ALTER TABLE `tbl_graph`
  MODIFY `graph_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_share`
--
ALTER TABLE `tbl_share`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
