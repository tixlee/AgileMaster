-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2020 at 09:50 AM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.3.22

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
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `project_id`, `board_name`, `date_time`) VALUES
(32, 17, 'Board 1', '2020-11-15 20:50:15'),
(33, 19, 'Board 1', '2020-11-16 02:26:42'),
(34, 21, 'board 1', '2020-11-19 10:49:32'),
(35, 23, '1997', '2020-11-19 12:59:58'),
(36, 26, 'Test', '2020-11-20 11:12:28');

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
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `due_date` date DEFAULT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bug_report`
--

INSERT INTO `bug_report` (`bug_id`, `bug_name`, `bug_desc`, `created_by`, `project_id`, `assignee`, `priority`, `state`, `creation_date`, `due_date`, `start_date`) VALUES
(15, 'TEST', 'ouhnibut', 1, 16, 2, 'High', 'Open', '2020-11-15 23:41:14', '2020-12-05', '2020-11-20'),
(16, 'TEST 2', 'oij iouoh desdrer edt', 2, 16, 1, 'Medium', 'In Progress', '2020-11-15 23:44:32', '2020-11-30', '2020-11-16'),
(17, 'TEST 3', 'oijwe oqiluefuhv b', 2, 18, 1, 'Low', 'Closed', '2020-11-15 23:51:09', '2020-12-02', '2020-11-22'),
(18, 'simon', 'dd', 11, 23, 0, 'Medium', 'Open', '2020-11-19 13:07:51', '2020-11-20', '2020-12-18'),
(19, 'no project delete function', 'no project delete function', 9, 20, 0, 'Low', 'Closed', '2020-11-19 16:05:17', '2020-11-20', '2020-11-11'),
(20, 'Test', 'Test', 14, 26, 0, 'High', 'Open', '2020-11-20 11:12:00', '2020-11-21', '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `comment_task`
--

CREATE TABLE `comment_task` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'TEST', 'tarek5656@gmail.com', 'sdfgjrenerj', 'noinoiniounubni'),
(10, 'Jason Chin', 'jasonchin@gmail.com', 'Tools', 'Are there any live chat function in the system?');

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
(1, 'ugoiuuy', '2021-01-06 00:00:00', '2021-01-06 00:00:00'),
(2, 'bgcv', '2020-12-01 00:00:00', '2020-12-01 00:00:00'),
(3, 'erqaqwazwqz', '2020-12-03 00:00:00', '2020-12-03 00:00:00');

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
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_survey`
--

INSERT INTO `feedback_survey` (`feedback_id`, `name`, `email`, `role`, `major`, `understanding`, `experience`, `like_ui`, `navigation_feature`, `process_flow`, `tools_provided`, `linkage`, `rate`, `recommend`, `like_most`, `like_least`, `improve`, `new_feature`, `creation_date`) VALUES
(6, 'Ahmed Safty', 'ahmedsafty96@gmail.com', 'Students', 'Engineering', 'Good', 'Very Good', 'Excellent ', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Likely', 'The interface and how it is easy to recognize the works done and doing by the members.', 'There is a problem in viewing tasks when i press the view details.', 'not much ', 'finalized timetable for each project as to share with members of the same project.', '2020-11-16 04:34:26'),
(7, 'Enas Elsafty', 'fonooon@hotmail.com', 'Others', 'Design', 'Good', 'Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'Very Good', 'Good', 'Very Likely', '', '', '', '', '2020-11-16 04:50:35'),
(8, 'Reham Fawzy', 'roro72538@hotmail.com', 'Others', 'Design', 'Average', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Likely', '', '', '', '', '2020-11-16 05:50:08'),
(9, 'Jackie Chin', 'jackiechin@gmail.com', 'Students', 'Engineering', 'Average', 'Very Good', 'Excellent ', 'Very Good', 'Very Good', 'Very Good', 'Excellent ', 'Very Good', 'Very Likely', 'I like the design since it\'s very clean and tidy, fonts are readable and navigation are clearly stated.', '', 'Calendar page are not working well, that can be improved.', 'Maybe a live chat system would boost this system to another level.', '2020-11-16 09:05:01'),
(10, 'L', 'lesleylau05@gmail.com', 'Students', 'Design', 'Not Understand', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Likely', 'Document Generator', 'Font of the title of new project', '-Put more colors in other page.( dashboard looks good, the colors and icons make the page looks fun)', 'no', '2020-11-16 12:07:27'),
(11, 'Simon Lu', 'simonlu_97@hotmail.com', 'Students', 'Computing', 'Good', 'Good', '', '', '', '', '', '', '', '', '', '', '', '2020-11-19 13:16:20'),
(12, 'Ras Azlynna', 'rlynna99@gmail.com', 'Students', 'Computing', 'Good', 'Average', 'Good', 'Good', 'Average', 'Good', 'Average', 'Average', 'Very Likely', 'Flow chart', 'Time tracker', 'Time tracker. Need to make pause button ', 'Delete button for flow chart and project.\r\n\r\nFor flow chart please make a rectangle shape so that user can use it easily.', '2020-11-19 14:38:20'),
(13, 'Teo Thai Yong', '101222274@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Very Good', 'Excellent ', 'Excellent ', 'Very Good', 'Very Good', 'Very Good', 'Excellent ', 'Very Likely', 'document generator and diagram generator', 'none at the moment', 'some of the main stuff on the left menu panel can put into 1. like calendar can put under profiles setting or put it under progress', 'project delete fuctions', '2020-11-19 16:11:31'),
(14, 'Wahaj Qaisar', '100089009@students.swinburne.edu.my', 'Students', 'Business', 'Average', 'Average', 'Excellent ', '', 'Very Good', 'Very Good', 'Average', 'Good', 'Very Likely', 'Ease of access. Relatively intuitive to use.', 'Too minimalistic. Needs more user options. ', 'Document Generator only generates the template, not the data that has been input. There need to be more usability options besides add. Some components like the task allocation are a bit difficult to understand for new users. ', 'Maybe a chat assistant. Bit more linkability to other parts of the sidebar, that way it\'s a bit more linear.', '2020-11-20 11:23:16'),
(15, 'Rick', 'rick@gmail.com', 'Students', 'Engineering', 'Average', 'Very Good', 'Excellent ', 'Excellent ', 'Very Good', 'Very Good', 'Very Good', 'Excellent ', 'Very Likely', 'The flow is very smooth, i could navigate them well with the navigation bar provided.', '', 'Maybe calendar to show more details would be better.', '', '2020-11-22 07:46:55'),
(16, 'Mellisa', 'mellisa@hotmail.com', 'Others', 'Design', 'Not Understand', 'Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Good', 'Very Good', 'Very Good', 'Very Likely', 'The design is very clean.', '', '', '', '2020-11-22 07:48:16'),
(17, 'Henry', 'henry@yahoo.com', 'Students', 'Engineering', 'Good', 'Very Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Good', 'Very Likely', 'I like the time tracker as i could track how many times i had used to finish the task.', '', '', '', '2020-11-22 07:49:37'),
(18, 'Roy', 'roylee@gmail.com', 'Students', 'Computing', 'Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Good', 'Very Good', 'Very Likely', '', '', '', 'Maybe i could generate my own documents would be nice.', '2020-11-22 07:55:06'),
(19, 'Johnny Lim', 'johnnylim@hotmail.com', 'Others', 'Business', 'Average', 'Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Likely', '', '', '', '', '2020-11-22 07:57:09'),
(20, 'Yan Ting', '101209183@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Very Good', 'Excellent ', 'Very Good', 'Good', 'Excellent ', 'Excellent ', 'Good', 'Very Likely', 'The user interface is very nice, i like that every elements required for a software development can be found in one website, i think it will be very useful. Overall experience was good.', 'Nope.', 'Some bugs can be fixed, and maybe the generated documented format can be refine again, but overall is usable and nice.', 'Not at the moment.', '2020-11-17 04:52:59'),
(21, 'Eric', '101208805@students.swinburne.edu.my', 'Students', 'Computing', 'Average', 'Average', 'Excellent ', 'Good', 'Good', 'Very Good', 'Very Good', 'Good', 'Very Likely', 'The User interface design ', 'The navigation. I quite blur when using the application but it is a good application maybe i not familiar with this kind of application ', 'delete button . After i press the delete button, then become blank and show nothing. The record still no yet delete.', '', '2020-11-17 14:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `file_storage`
--

CREATE TABLE `file_storage` (
  `storage_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_uploaded` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_storage`
--

INSERT INTO `file_storage` (`storage_id`, `file_name`, `file`, `date_uploaded`, `document_type`, `project_id`, `user_id`) VALUES
(10, 'jytyrtfyjtfhf', 'Parking.pdf', '02-11-2020', 'Report', 5, 7),
(11, 'AHMED TAREK ABDELRAOUF BAHLOUL', 'login.php', '02-11-2020', 'Design', 1, 1),
(12, 'rertr54er', 'Test 2.pdf', '02-11-2020', 'Meeting', 5, 7),
(13, 'uityitiu', 'resume 16 2.jpg', '04-11-2020', 'Document', 12, 6),
(14, 'iouhuigghiu', 'resume 21 3.jpg', '04-11-2020', 'Design', 1, 6),
(15, 'fdyr', 'resume 19 H2 Sarawak - Miri Admin Page v2.pdf', '05-11-2020', 'Design', 1, 6),
(16, 'Test', 'resume 16 1.jpg', '15-11-2020', 'Design', 16, 2),
(17, 'Ahmed', 'user_created_project.sql', '15-11-2020', 'Testing', 17, 1),
(18, 'iouiuuy', 'Lec-07-Securing_Ent_App.pdf', '15-11-2020', 'Implementation', 16, 1),
(19, '1997', 'WhatsApp Video 2020-10-16 at 6.40.24 PM.mp4', '19-11-2020', '', 23, 11),
(20, 'projecttest', 'Screenshot (9).png', '20-11-2020', '', 21, 9),
(21, 'Test', 'Logo_of_Family_Feud.png', '20-11-2020', 'Implementation', 26, 14);

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
(16, 'Project 1', 'Test', 'Active'),
(17, 'Project 2', 'TESUJNHOIUJHOIUhbn iluuhiu', 'Active'),
(18, 'Project 3', 'oij iuuhnj\r\n', 'Active'),
(19, 'AJN', 'iuinkl', 'Active'),
(20, 'project Teo', 'testing', 'Active'),
(21, 'project test 2', 'test2', 'Active'),
(22, 'Project 1', 'iujhiu', 'Archive'),
(23, 'Simon9704', 'GG boy\r\n', 'Active'),
(24, '1997', '1998', 'Active'),
(25, 'Scrunchies ', 'How to make scrunchies ', 'Archive'),
(26, 'Test', 'Test Project\r\n', 'Active'),
(27, 'Housing', 'Project housing (urban design ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `report_issue`
--

CREATE TABLE `report_issue` (
  `issue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `desc` varchar(225) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_issue`
--

INSERT INTO `report_issue` (`issue_id`, `name`, `issue_name`, `desc`, `creation_date`) VALUES
(1, 'AHMED TAREK ABDELRAOUF BAHLOUL', 'TEST REORT ISSUE', 'TESTING REORT ISSUE', '2020-11-16 02:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(225) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `project_task_num` int(3) NOT NULL,
  `board_id` int(11) NOT NULL DEFAULT '0',
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
(29, 'Task 1', 'oukuhnsrf riujhi ', 1, 33, '2020-11-28', '2020-11-20', NULL, 1, 2),
(30, 'simon', '1997', 2, 35, '2020-11-25', '2020-11-18', NULL, 2, 11),
(31, 'aaaaa', 'aaa', 3, 33, '2020-11-21', '2020-11-20', NULL, 1, 2),
(32, 'Test', 'Test', 4, 36, '2020-11-21', '2020-11-20', NULL, 2, 14),
(33, 'ugoiuuy', 'uiguyuiguyui', 5, 32, '2021-01-06', '2020-11-25', NULL, 1, 1),
(34, 'bgcv', 'xfdsresrs', 6, 32, '2020-12-01', '2020-11-21', NULL, 1, 1),
(35, 'erqaqwazwqz', 'eatsrers', 7, 32, '2020-12-03', '2020-11-24', NULL, 1, 1);

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
(44, 2, 29),
(45, 11, 30),
(46, 3, 31),
(47, 1, 32),
(48, 1, 33),
(49, 1, 34),
(50, 1, 35);

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
(4, 'tarek', 'tarek@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'progect manager'),
(6, 'Mohamed', 'mohamed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(7, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(8, 'TEST 19', 'test5656@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member'),
(9, 'Bryan Teo', '101222274@students.swinburne.edu.my', '54321bb742b9665608350f885e200a6b', 'project manager'),
(10, 'Muhd Iqhmal', 'muhdiqhmal19@gmail.com', 'c5abe3f51400fbdd52588431aa3002c7', 'project member'),
(11, 'Simon Lu', 'simonlu_97@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 'project manager'),
(12, 'Ras Azlynna', 'rlynna99@gmail.com', '960adae782308e97e03097384ed0cbe1', 'project manager'),
(13, 'Nana', 'babestore87@gmail.com', '19e8f9bc55656b124aa7a28b92d7a3e0', 'project member'),
(14, 'Wahaj Qaisar', '100089009@students.swinburne.edu.my', 'd333cac96f9d26451dd37d04b4b4a42e', 'project manager'),
(15, 'Wahaj Caesar', 'wahajqr.qaiser610@gmail.com', 'd333cac96f9d26451dd37d04b4b4a42e', 'project member'),
(16, 'Marwa', 'marwatarek749@gmail.com', '43cc2a051b169d3e3dbfb3621684ba84', 'project manager'),
(17, 'Rick', 'rick@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project member'),
(18, 'Jackie Chin', 'jackiechin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(19, 'Saad', 'saads299@gmail.com', '40e65260212decf34ba9fd7c72552c38', 'project member'),
(20, 'Gabriel Chia', 'gabchia98@gmail.com', '51a0b3ae85bd27b99fbac454737eba04', 'project manager'),
(21, 'L', 'lesleylau05@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(22, 'Joy Amadea', 'joya8858@gmail.com', '7e089fb7923c1d018fe9740be768c547', 'project member'),
(23, 'Albert', 'albert@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager'),
(24, 'Yan Ting', '101209183@students.swinburne.edu.my', 'e8c84d741564f950d3f42c0334853eed', 'project manager'),
(25, 'Eric Kong Chung Hong', 'eric_kong11@hotmail.com', '86871b9b1ab33b0834d455c540d82e89', 'project member'),
(26, 'Eric', '101208805@students.swinburne.edu.my', 'cd87cd5ef753a06ee79fc75dc7cfe66c', 'project manager'),
(27, 'Mary ', 'mary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'project manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_created_project`
--

CREATE TABLE `user_created_project` (
  `created_proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_created_project`
--

INSERT INTO `user_created_project` (`created_proj_id`, `user_id`, `project_id`, `creation_date`) VALUES
(16, 1, 27, '2020-11-15 20:39:06'),
(17, 1, 29, '2020-11-15 20:48:11'),
(18, 1, 32, '2020-11-15 22:30:12'),
(19, 2, 35, '2020-11-16 02:26:29'),
(20, 9, 37, '2020-11-19 10:34:34'),
(21, 9, 39, '2020-11-19 10:48:58'),
(22, 1, 41, '2020-11-19 11:33:19'),
(23, 11, 42, '2020-11-19 12:55:45'),
(24, 11, 43, '2020-11-19 13:10:13'),
(25, 12, 44, '2020-11-19 14:19:34'),
(26, 14, 45, '2020-11-20 10:59:30'),
(27, 16, 47, '2020-11-20 12:21:53');

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
(27, 1, 16),
(29, 1, 17),
(30, 3, 17),
(31, 4, 16),
(32, 1, 18),
(33, 2, 16),
(34, 2, 18),
(35, 2, 19),
(36, 3, 19),
(37, 9, 20),
(38, 8, 20),
(39, 9, 21),
(40, 1, 21),
(41, 1, 22),
(42, 11, 23),
(43, 11, 24),
(44, 12, 25),
(45, 14, 26),
(46, 1, 26),
(47, 16, 27);

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
-- Indexes for table `report_issue`
--
ALTER TABLE `report_issue`
  ADD PRIMARY KEY (`issue_id`);

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
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
