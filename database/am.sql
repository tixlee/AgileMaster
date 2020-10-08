-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 07:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactusform`
--

CREATE TABLE `contactusform` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactusform`
--

INSERT INTO `contactusform` (`contact_id`, `name`, `email`, `subject`, `comment`) VALUES
(1, 'AHMED TAREK ABDELRAOUF BAHLOUL', 'ahmedtarek5656@gmail.com', 'TEST', 'jhjjjh'),
(2, 'AHMED TAREK ABDELRAOUF BAHLOUL', 'ahmedtarek5656@gmail.com', 'TEST', 'jhjjjh'),
(3, 'John Safty', 'ahmedtarek5656@gmail.com', 'yfh', 'ttfuyutftfty'),
(4, 'John Safty', 'ahmedtarek5656@gmail.com', 'yfh', 'ttfuyutftfty'),
(5, 'Ahmed  TAREK', '100089038@students.swinburne.edu.my', 'uteytet', 'rtersserstrserers'),
(6, 'Ali Omar', 'ahmedtarek5656@gmail.com', 'rdrteawaw', 'dfxdfseaswaaaqa453346'),
(7, 'Ahmed Ali', 'ahmedtarek5656@gmail.com', 'oijopijiopjiojiopj', 'poijoiygt967t87rfrtdf'),
(8, 'Safty Mohamed', 'ahmedtarek5656@gmail.com', 'erwrtwerser', 'serssersersersersersersersersersers'),
(9, 'TEST', 'tarek5656@gmail.com', 'sdfgjrenerj', 'noinoiniounubni');

-- --------------------------------------------------------

--
-- Table structure for table `file_storage`
--

CREATE TABLE `file_storage` (
  `storage_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_uploaded` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_storage`
--

INSERT INTO `file_storage` (`storage_id`, `name`, `file`, `date_uploaded`) VALUES
(2, 'TEST', 'PericlesDesignDoc.pdf', '04-10-2020'),
(3, 'TEST 2', 'Agile Software Project Management System Project Planner.pdf', '04-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_description` text NOT NULL,
  `project_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `project_status`) VALUES
(1, 'TEST', 'Creating New Project', 0),
(10, 'testsssssssss', 'oijojoijojoj', 0),
(11, 'manager', 'iouujhouihouiuh', 0),
(12, 'tarekkkkk', 'tftfytfbtfbyty', 0),
(13, 'ytrtdfgc', 'rtdstyetyeye', 0),
(14, '123456', 'iuohoiuhihi', 0),
(15, '8-08988890', 'hbjbhb', 0),
(16, '5646546546465456564564564564', 'hgfytftyftyftyftyf', 0),
(17, 'mnmnbnmnmnmn', 'iuhuihuihuyh', 0),
(18, 'uhkjknmn ', 'uoguygiuig', 0),
(19, 'utyrtyfjy74477644757', 'yrtytfytftyfytfytfytrytrryr', 0),
(20, '741741741741', '564468864864864', 0),
(21, 'dfgc vb', 'tdfghdhtr', 0),
(22, 'rtdfg', 'rtdgfg', 0),
(23, 'uyjghku', 'kutuytuy', 0),
(24, 'trrtdg', 'trhdgh', 0),
(25, 'utfgj', 'kgjkghuytyiu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(10) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_issuedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `dead_line` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_details` text NOT NULL,
  `task_project` int(10) NOT NULL,
  `task_receiver` int(10) NOT NULL,
  `task_sender` int(10) NOT NULL,
  `task_sender_name` varchar(50) NOT NULL,
  `task_sender_image` text NOT NULL,
  `task_display` int(10) NOT NULL DEFAULT 1,
  `task_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'project member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'Ahmed', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(3, 'Lee', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member'),
(4, 'Jason', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member'),
(5, 'tarek', 'tarek@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `user_proj_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactusform`
--
ALTER TABLE `contactusform`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `file_storage`
--
ALTER TABLE `file_storage`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`user_proj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `contactusform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(10) NOT NULL AUTO_INCREMENT;
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
