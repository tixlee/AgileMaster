-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 03:58 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `project_id`, `board_name`, `date_time`) VALUES
(26, 12, 'ttfgyttfg', '2020-11-04 16:26:48'),
(30, 1, 'Board 1', '2020-11-08 22:11:59'),
(31, 1, 'Board 2', '2020-11-08 22:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `bug_report`
--

CREATE TABLE `bug_report` (
  `bug_id` int(11) NOT NULL,
  `bug_name` varchar(225) NOT NULL,
  `bug_desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assignee` int(11) NOT NULL,
  `priority` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `due_date` date DEFAULT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bug_report`
--

INSERT INTO `bug_report` (`bug_id`, `bug_name`, `bug_desc`, `created_by`, `project_id`,`assignee`, `priority`, `state`, `creation_date`, `due_date`, `start_date`) VALUES
(1, 'sQWEQ', 'EQWRAWEQQW', 6, 1, 1, 'medium', 'In Progress', '2020-11-07 22:07:20', '2020-12-04', '2020-11-07'),
(2, '65 YRFTRDFTRD', 'GRGDTRDTRDTRD', 6, 1, 6, 'medium', 'In Progress', '2020-11-07 22:08:43', '2020-12-05', '2020-11-18'),
(3, 'RFDS534GRD', 'YRTDRTDTD', 6, 1, 6, 'medium', 'Open', '2020-11-07 22:11:28', '2020-11-27', '2020-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `comment_task`
--

CREATE TABLE `comment_task` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_task`
--

INSERT INTO `comment_task` (`comment_id`, `user_id`, `task_id`, `comment`, `creation_date`) VALUES
(7, 6, 1, 'TEST', '2020-11-01 11:27:20'),
(8, 6, 2, 'TEST 2', '2020-11-01 11:28:03'),
(9, 6, 2, 'jklghgyuiug', '2020-11-01 11:32:39'),
(10, 1, 2, 'uyguygi', '2020-11-01 12:03:37'),
(11, 1, 1, 'jkgjk', '2020-11-01 12:06:18'),
(12, 7, 1, 'oijojoijh', '2020-11-01 12:24:35'),
(13, 6, 3, 'jtftytf\r\n', '2020-11-01 12:25:15'),
(14, 6, 3, '11111111', '2020-11-01 12:25:23'),
(15, 1, 7, 'fgjdyjdsg', '2020-11-01 17:27:51'),
(16, 6, 21, 'jftytfyufy', '2020-11-04 20:00:46');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `due_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `feedback_survey`
--

CREATE TABLE `feedback_survey` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(225) NOT NULL,
  `major` varchar(225) NOT NULL,
  `understanding` varchar(225) NOT NULL,
  `experience` varchar(225) NOT NULL,
  `like_ui` varchar(225) NOT NULL,
  `navigation_feature` varchar(225) NOT NULL,
  `process_flow` varchar(225) NOT NULL,
  `tools_provided` varchar(225) NOT NULL,
  `linkage` varchar(225) NOT NULL,
  `rate` varchar(225) NOT NULL,
  `recommend` varchar(225) NOT NULL,
  `like_most` varchar(225) DEFAULT NULL,
  `like_least` varchar(225) DEFAULT NULL,
  `improve` varchar(225) DEFAULT NULL,
  `new_feature` varchar(225) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------


--
-- Table structure for table `report_issue`
--

CREATE TABLE `report_issue` (
  `issue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `desc` varchar(225) NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table `file_storage`
--

CREATE TABLE `file_storage` (
  `storage_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_uploaded` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_storage`
--

INSERT INTO `file_storage` (`storage_id`, `name`, `file`, `date_uploaded`, `document_type`, `project_id`, `user_id`) VALUES
(10, 'jytyrtfyjtfhf', 'Parking.pdf', '02-11-2020', 'Report', 5, 7),
(11, 'AHMED TAREK ABDELRAOUF BAHLOUL', 'login.php', '02-11-2020', 'Design', 1, 1),
(12, 'rertr54er', 'Test 2.pdf', '02-11-2020', 'Meeting', 5, 7),
(13, 'uityitiu', 'resume 16 2.jpg', '04-11-2020', 'Document', 12, 6),
(14, 'iouhuigghiu', 'resume 21 3.jpg', '04-11-2020', 'Design', 1, 6),
(15, 'fdyr', 'resume 19 H2 Sarawak - Miri Admin Page v2.pdf', '05-11-2020', 'Design', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `status`) VALUES
(1, 'Project 1', 'Test whether project function working or not', 'Active'),
(12, 'iug', 'uguug', 'Active'),
(13, 'Project 2', 'dfgbehbghbrgwbnwr', 'Active'),
(14, 'Project 3', 'ipuhouihiuohoui', 'Active'),
(15, 'Project 4', ';oijoipujhpouipjoui', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(225) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `project_task_num` int(3) NOT NULL,
  `board_id` int(11) NOT NULL DEFAULT 0,
  `due_date` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `completion_date` date DEFAULT NULL,
  `state` int(1) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_desc`, `project_task_num`, `board_id`, `due_date`, `start_date`, `completion_date`, `state`, `created_by`) VALUES
(23, 'Task 1', 'Testing', 1, 30, '2020-12-05', '2020-11-11', NULL, 5, 1),
(24, 'Task 2', 'oiuj iuhsujiop', 2, 30, '2020-12-08', '2020-11-08', NULL, 3, 1),
(25, 'Task 3', 'oij oiuphopij piuh[oj', 3, 30, '2020-12-18', '2020-11-15', NULL, 2, 1),
(26, 'Task 12', 'oijoijop opij n', 4, 31, '2020-12-02', '2020-11-14', NULL, 1, 1),
(27, 'Task 46', 'oijop oij134 ', 5, 31, '2020-11-30', '2020-11-28', NULL, 2, 1),
(28, 'opkn oijoi', 'oijopiujnpouiij', 6, 26, '2020-11-25', '2020-11-10', NULL, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `task_assignees`
--

CREATE TABLE `task_assignees` (
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_assignees`
--

INSERT INTO `task_assignees` (`assignment_id`, `user_id`, `task_id`) VALUES
(28, 6, 23),
(31, 6, 25),
(34, 2, 27),
(35, 6, 27),
(36, 6, 28),
(38, 1, 28),
(39, 1, 26),
(40, 1, 25),
(41, 1, 24),
(42, 2, 24),
(43, 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(1, 'Ahmed', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(2, 'Lee', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'progect manager'),
(3, 'Jason', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member'),
(4, 'tarek', 'tarek@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'progect manager'),
(6, 'Mohamed', 'mohamed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(7, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_created_project`
--

CREATE TABLE `user_created_project` (
  `created_proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_created_project`
--

INSERT INTO `user_created_project` (`created_proj_id`, `user_id`, `project_id`, `creation_date`) VALUES
(1, 1, 1, '2020-11-01 10:09:18'),
(12, 6, 17, '2020-11-04 16:26:42'),
(13, 1, 19, '2020-11-06 14:39:29'),
(14, 1, 20, '2020-11-07 13:17:31'),
(15, 1, 21, '2020-11-07 13:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `user_proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`user_proj_id`, `user_id`, `project_id`) VALUES
(1, 1, 1),
(2, 6, 1),
(15, 2, 1),
(17, 6, 12),
(19, 1, 13),
(20, 1, 14),
(21, 1, 15),
(22, 6, 14),
(23, 1, 12),
(24, 2, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `bug_report`
--
ALTER TABLE `bug_report`
  ADD PRIMARY KEY (`bug_id`);

--
-- Indexes for table `comment_task`
--
ALTER TABLE `comment_task`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contactusform`
--
ALTER TABLE `contactusform`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  ADD PRIMARY KEY (`feedback_id`);

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
-- Indexes for table `task_assignees`
--
ALTER TABLE `task_assignees`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_created_project`
--
ALTER TABLE `user_created_project`
  ADD PRIMARY KEY (`created_proj_id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`user_proj_id`);
  
--
-- Indexes for table `report_issue`
--
ALTER TABLE `report_issue`
  ADD PRIMARY KEY (`issue_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contactusform`
--
ALTER TABLE `contactusform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;


--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
