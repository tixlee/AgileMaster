-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 09:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
(35, 18, 'Sprint 1', '2020-11-09 03:36:33'),
(36, 18, 'Sprint 2', '2020-11-09 03:38:06'),
(37, 18, 'Sprint 3', '2020-11-09 03:38:12'),
(38, 18, 'Sprint 4', '2020-11-09 03:38:18'),
(39, 19, 'Sprint 1', '2020-11-09 04:00:13'),
(40, 19, 'Sprint 2', '2020-11-09 04:00:19'),
(41, 19, 'Sprint 3', '2020-11-09 04:00:25'),
(42, 19, 'Sprint 4', '2020-11-09 04:00:31');

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

INSERT INTO `bug_report` (`bug_id`, `bug_name`, `bug_desc`, `created_by`, `assignee`, `priority`, `state`, `creation_date`, `due_date`, `start_date`) VALUES
(9, 'Login/Register Account', 'User could not login after registered an account', 8, 9, 'Medium', 'Open', '2020-11-09 04:31:34', '2020-11-10', '2020-11-09'),
(10, 'Navigation Bar', 'Some of the link are not linked preperly.', 8, 3, 'Low', 'Open', '2020-11-09 04:32:40', '2020-11-12', '2020-11-10'),
(11, 'Task Board', 'Task board crash after adding task.', 8, 1, 'Medium', 'Open', '2020-11-09 04:33:31', '2020-11-12', '2020-11-10'),
(12, 'Document Generator', 'Could not generate documents', 8, 8, 'Low', 'In Progress', '2020-11-09 04:34:03', '2020-11-12', '2020-11-11'),
(13, 'Time Tracker', 'Time does not calculate properly.', 8, 8, 'Medium', 'Open', '2020-11-09 04:35:03', '2020-11-13', '2020-11-11'),
(14, 'GitHub API', 'Does not work. Please check again!', 8, 8, 'Medium', 'Open', '2020-11-09 04:36:10', '2020-11-14', '2020-11-13');

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
(18, 9, 38, 'Task are completed.', '2020-11-09 04:03:10'),
(19, 3, 38, 'Nice!', '2020-11-09 04:04:05'),
(20, 3, 39, 'Account Registration function done.', '2020-11-09 04:04:35'),
(21, 3, 42, 'This task will be finish within this week. Sorry for delay.', '2020-11-09 04:04:59'),
(22, 1, 38, 'Ok, make sure you can save it inside database!', '2020-11-09 04:05:50'),
(23, 1, 42, 'Is everything okay?', '2020-11-09 04:06:50'),
(24, 1, 39, 'Good =D', '2020-11-09 04:07:27'),
(25, 1, 43, 'Document Generator ok?', '2020-11-09 04:07:43'),
(26, 8, 41, 'Delete User for admin is still in progress.', '2020-11-09 04:08:55'),
(27, 8, 38, 'You can help other members with their task ya.', '2020-11-09 04:09:22'),
(28, 8, 40, 'Done?', '2020-11-09 04:10:18');

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
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `task_name`, `start_date`, `due_date`) VALUES
(14, 'Account Login Logout', '2020-11-12 00:00:00', '2020-11-12 00:00:00'),
(15, 'Account Registration', '2020-11-13 00:00:00', '2020-11-13 00:00:00'),
(16, 'Create new project', '2020-11-15 00:00:00', '2020-11-15 00:00:00'),
(17, 'Delete User - Admin', '2020-11-15 00:00:00', '2020-11-15 00:00:00'),
(18, 'Appoint Project Manager', '2020-11-11 00:00:00', '2020-11-11 00:00:00'),
(19, 'Document Generator', '2020-11-10 00:00:00', '2020-11-10 00:00:00'),
(20, 'Diagram Creator', '2020-11-13 00:00:00', '2020-11-13 00:00:00'),
(21, 'Create/Add Requirements', '2020-12-02 00:00:00', '2020-12-02 00:00:00'),
(22, 'Assigning Task - Project Manager', '2020-12-02 00:00:00', '2020-12-02 00:00:00'),
(23, 'Mark off Task as complete', '2020-12-03 00:00:00', '2020-12-03 00:00:00'),
(24, 'Edit/Delete Requirements', '2020-12-04 00:00:00', '2020-12-04 00:00:00'),
(25, 'Time Tracker', '2020-12-04 00:00:00', '2020-12-04 00:00:00'),
(26, 'Upload PDF file function', '2020-12-11 00:00:00', '2020-12-11 00:00:00'),
(27, 'Due date adjustment', '2020-11-13 00:00:00', '2020-11-13 00:00:00'),
(28, 'Add comment on requirements', '2020-12-14 00:00:00', '2020-12-14 00:00:00'),
(29, 'Capture Timeline, Sprints', '2020-12-16 00:00:00', '2020-12-16 00:00:00'),
(30, 'Report Generator', '2020-12-21 00:00:00', '2020-12-21 00:00:00'),
(31, 'Switch Project Manager', '2020-12-22 00:00:00', '2020-12-22 00:00:00'),
(32, 'Bug Reporting', '2020-12-23 00:00:00', '2020-12-23 00:00:00'),
(33, 'Feedback Survey', '2020-12-25 00:00:00', '2020-12-25 00:00:00');

-- --------------------------------------------------------

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
(18, 'GitHub Commit Report', 'GitHub_Commit_Report.xls', '02-11-2020', 'Report', 18, 8),
(19, 'GitHub Issue Report', 'GitHub_Issue_Report.xls', '02-11-2020', 'Report', 18, 8);

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
(18, 'FYP Agile Project A', 'Agile Software Project Management System', 'Active'),
(19, 'FYP AGILE PROJECT B', 'Agile Software Project Management System', 'Active');

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
(38, 'Account Login Logout', 'Create the function for account login and logout', 1, 35, '2020-11-12', '2020-11-10', '2020-11-12', 5, 8),
(39, 'Account Registration', 'Create function for account registration', 2, 35, '2020-11-13', '2020-11-11', '2020-11-13', 5, 8),
(40, 'Create new project', 'Create function to create new projects', 3, 35, '2020-11-15', '2020-11-12', '2020-11-15', 5, 8),
(41, 'Delete User - Admin', 'Create a function for admin to delete user', 4, 35, '2020-11-15', '2020-11-09', NULL, 4, 8),
(42, 'Appoint Project Manager', 'Admin able to appoint user to become project manager to create projects', 5, 35, '2020-11-11', '2020-11-09', NULL, 3, 8),
(43, 'Document Generator', 'Create a page for user to generate documents such as SRS SDD STD', 6, 35, '2020-11-10', '2020-11-09', NULL, 4, 8),
(44, 'Diagram Creator', 'Create a page for user to generate diagrams', 7, 35, '2020-11-13', '2020-11-12', NULL, 4, 8),
(45, 'Create/Add Requirements', 'Allow user to create or add requirements', 8, 36, '2020-12-02', '2020-12-01', NULL, 5, 8),
(46, 'Assigning Task - Project Manager', 'Project manager are allowed to assign task to member', 9, 36, '2020-12-02', '2020-12-01', NULL, 5, 8),
(47, 'Mark off Task as complete', 'User are allowed to mark off task after completed', 10, 36, '2020-12-03', '2020-12-01', NULL, 4, 8),
(48, 'Edit/Delete Requirements', 'User are allowed to edit or delete requirements', 11, 36, '2020-12-04', '2020-12-01', NULL, 3, 8),
(49, 'Time Tracker', 'User are allowed to track the time while doing the task.', 12, 36, '2020-12-04', '2020-12-01', NULL, 3, 8),
(50, 'Upload PDF file function', 'User are allowed to upload the files into database', 13, 37, '2020-12-11', '2020-12-10', NULL, 4, 8),
(51, 'Due date adjustment', 'User are allowed to adjust the due dates', 14, 37, '2020-11-13', '2020-12-09', NULL, 3, 8),
(52, 'Add comment on requirements', 'User are allowed to add comments based on the requirements', 15, 37, '2020-12-14', '2020-12-09', NULL, 4, 8),
(53, 'Capture Timeline, Sprints', 'Create a function to capture the timeline and sprints', 16, 37, '2020-12-16', '2020-12-09', NULL, 5, 8),
(54, 'Report Generator', 'User are allowed to generate reports in the system', 17, 38, '2020-12-21', '2020-12-20', NULL, 5, 8),
(55, 'Switch Project Manager', 'User are allowed to switch the role within project', 18, 38, '2020-12-22', '2020-12-20', NULL, 5, 8),
(56, 'Bug Reporting', 'User are allowed to report bugs in the system', 19, 38, '2020-12-23', '2020-12-20', NULL, 4, 8),
(57, 'Feedback Survey', 'Create a form for user to do system testing', 20, 38, '2020-12-25', '2020-12-20', NULL, 3, 8);

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
(53, 9, 38),
(54, 3, 39),
(55, 1, 40),
(56, 8, 41),
(57, 3, 42),
(58, 8, 43),
(59, 1, 44),
(60, 3, 45),
(61, 8, 46),
(62, 1, 47),
(63, 1, 48),
(64, 9, 49),
(65, 8, 50),
(66, 3, 51),
(67, 1, 52),
(68, 9, 53),
(69, 8, 54),
(70, 3, 55),
(71, 1, 56),
(72, 9, 57);

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
(2, 'Lee', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(3, 'Jason', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member'),
(6, 'Mohamed', 'mohamed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(8, 'Lee Jia Jun', 'leejiajun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(9, 'Bong Siaw Zhen', 'bong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member');

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
(18, 8, 27, '2020-11-09 03:36:17'),
(19, 8, 31, '2020-11-09 03:59:57');

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
(27, 8, 18),
(28, 3, 18),
(29, 1, 18),
(30, 9, 18),
(31, 8, 19),
(32, 1, 19),
(33, 9, 19),
(34, 3, 19);

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
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
  
--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
