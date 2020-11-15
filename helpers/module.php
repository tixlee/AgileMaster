
<?php

function getAllDueDate()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `events` ");

	return $result;
}

function getAllUpload($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `file_storage` WHERE `user_id` = '$userId'");

	return $result;
}

//USERS
function get_admin()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `admin`");

	return $result;
}

//USERS
function get_user($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '".$userId."'");

	return $result;
}

function getAllUser()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` order by `name` ASC");

	return $result;
}

function getUserRole($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT role FROM `users`  WHERE `user_id` = '".$userId."'");

	return $result;
}

function insert_user($name, $email, $password)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");

	return $result;
}

function getAllRegistered()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` != 'admin'");

	return $result;
}

function getAllProjectManagerAccounts()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` = 'project manager'");

	return $result;
}

function getAllProjectMemberAccounts()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` = 'project member'");

	return $result;
}


function delete_all_members($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `users` WHERE `user_id` = '".$user_id."'");
}


function update_role($userId, $role)
{
    global $conn;
    $result = mysqli_query($conn, "UPDATE `users` SET `role` = 'project manager' WHERE `user_id` = '".$userId."'");
    
    return $result;
}


//Contact Us Form


function insert_contactus($name, $email, $subject, $comment)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `contactusform` (`name`, `email`, `subject`, `comment`) VALUES ('$name', '$email', '$subject', '$comment')");

	return $result;
}

function getAllContactUsFeedbackForm()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `contactusform` ");

	return $result;
}


// Upload Files

function get_AllStorage()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM file_storage  NATURAL JOIN project NATURAL JOIN users order by 'name' ASC ");    

	return $result;
}


function insert_storage($date_uploaded, $file_name, $fileName, $document_type, $project_id, $userId)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `file_storage` (`date_uploaded`, `file_name`, `file`, `document_type`, `project_id`, `user_id`) VALUES ('$date_uploaded', '$file_name', '$fileName', '$document_type', '$project_id', '$userId')");
     
	return $result;	
}

function check_storagename($fileName)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `file_storage` WHERE `file` = '".$fileName."'");

	return $result;		
}

function getStorageInfo()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `file_storage`");

	return $result;		
}

function getStorageInfoProject($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `file_storage` NATURAL JOIN `project`  WHERE `user_id` = '".$userId."'");

	return $result;		
}


function delete_storage($storageid)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `file_storage` WHERE `storage_id` = '".$storageid."'");
}



// Project
function insert_project($project_name, $project_description)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `project` (`project_name`, `project_description`) VALUES ('$project_name', '$project_description')");

	return $result;
}


function updateProject($project_id, $project_name, $project_description)
{
	global $conn;
	$result = mysqli_query($conn, "UPDATE `project` SET `project_name` = '".$project_name."', `project_description` = '".$project_description."' WHERE `project_id` = '".$project_id."'");
}


function archive_project($project_id, $newstatus)
{
	global $conn;
	$result = mysqli_query($conn, "UPDATE `project` SET `status` = '".$newstatus."' WHERE `project_id` = '".$project_id."'");
}


//function deleteProjectFromUserProject($project_id)
//{
//	global $conn;
//	$result = mysqli_query($conn, "DELETE FROM `user_project`  WHERE `project_id` = '".$project_id."'");
//}
//
//function deleteProjectFromUserCreatedProject($project_id)
//{
//	global $conn;
//	$result = mysqli_query($conn, "DELETE FROM `user_created_project`  WHERE `project_id` = '".$project_id."'");
//}



// user_project
function insert_user_project($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `user_project` (`user_id`, `project_id`) VALUES ('$user_id', LAST_INSERT_ID())");

	return $result;
}

function insert_member_project($user_id, $project_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `user_project` (`user_id`, `project_id`) VALUES ('$user_id', '$project_id')");

	return $result;
}

function getMembersProjectInAdmin($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_project` NATURAL JOIN `users` WHERE `project_id` = '".$project_id."'");
	return $result;
}

function getBoardsProjectInAdmin($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `users` WHERE `project_id` = '".$project_id."'");
	return $result;
}


function get_project($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `project` WHERE `project_id` = '".$project_id."'");
	return $result;
}

function getProject()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `project`");
	return $result;
}


//function getAllProjects()
//{
//	global $conn;
//	$result = mysqli_query($conn, "SELECT project.project_name, project.project_description FROM `project` INNER JOIN `user_project` ON project.project_id=user_project.project_id");
//
//	return $result;
//}



function getAllProjectsAdmin()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `project`");

	return $result;
}


function getAllProjects($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."' order by 'project_name' ASC");

	return $result;
}

function getAllActiveProjects($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."' AND `status` = 'Active' order by 'project_name' ASC");

	return $result;
}

function getAllArchiveProjects($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."' AND `status` = 'Archive' order by 'project_name' ASC");

	return $result;
}

function getProjectByUser($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_project` WHERE `user_id` = '".$userId."'");

	return $result;
}

function getProjects()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_project`");

	return $result;
}

function getProjectUser($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_project` NATURAL JOIN `project` WHERE `user_id` = '".$user_id."'");

	return $result;
}




// User_Created_Project

function insert_user_created_project($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `user_created_project` (`user_id`, `project_id`) VALUES ('$user_id', LAST_INSERT_ID())");

	return $result;
}

function update_user_created_project($project_id, $user_id)
{
	global $conn;
	$result = mysqli_query($conn, "UPDATE `user_created_project` SET `user_id` = '".$user_id."' WHERE `project_id` = '".$project_id."'");
}



//function get_user_created_project($user_id)
//{
//	global $conn;
//	$result = mysqli_query($conn, "SELECT * FROM `user_created_project` NATURAL JOIN `user_project` WHERE `user_id` = '$user_id'");
//
//	return $result;
//}

function getUserCreatedProject($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_created_project` WHERE `user_id` = '$user_id'");

	return $result;
}

function delete_member($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `user_created_project` WHERE `user_id` = '".$user_id."'");
}

function deleteMemberFromUserProject($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `user_project` WHERE `user_id` = '".$user_id."'");
}




// Board
function insert_board($project_id, $board_name)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `board` (`project_id`, `board_name`) VALUES ('$project_id', '$board_name')");

	return $result;
}


function getBoardByProject($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '$project_id'");

	return $result;
}

function getBoardByProjectAdmin($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `users` WHERE `board_id` = '$board_id'");

	return $result;
}

function getAllBoardsAdmin()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `board` NATURAL JOIN `project`");

	return $result;
}


function get_board($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `board` WHERE `board_id` = '$board_id'");

	return $result;
}

function getBoard()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `board`");

	return $result;
}


function delete_board($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `board` WHERE `board_id` = '$board_id'");
}

function delete_board_task($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `task` WHERE `board_id` = '$board_id'");
}



// Task
function insert_task($task_name, $task_desc, $project_task_num, $board_id, $due_date, $start_date, $state, $created_by)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `task` (`task_name`, `task_desc`, `project_task_num`, `board_id`, `due_date`, `start_date`, `state`, `created_by`) VALUES ('$task_name', '$task_desc', '$project_task_num', '$board_id', '$due_date', '$start_date', 1, '$created_by')");

	return $result;
}

//Calendar
function insert_calendar($task_name, $start_date, $due_date)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `events` (`task_name`, `start_date`, `due_date`) VALUES ('$task_name', '$start_date', '$due_date')");
	
	return $result;
}

function insert_completion_date($tn, $completion_date)
{
	global $conn;
	$result = mysqli_query($conn, "UPDATE `task` SET `completion_date` = '$completion_date' WHERE `project_task_num` = '$tn'");

	return $result;
}


function getTask($tn)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `project_task_num` = '$tn'");

	return $result;
}

function getTaskDashBoard($task_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `task_id` = '$task_id'");

	return $result;
}


function getTaskByBoard($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id'");

	return $result;
}

function getTaskProgress($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id'  AND `state` > 0");

	return $result;
}

function getBacklogitemTask($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 1");

	return $result;
}

function getToDoTask($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 2");

	return $result;
}

function getDoingTask($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 3");

	return $result;
}

function getTestingTask($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 4");

	return $result;
}

function getNotDoneTask($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` != 5");

	return $result;
}

function getDoneTask($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` WHERE `board_id` = '$board_id' AND `state` = 5");

	return $result;
}

function delete_task($task_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `task` WHERE `task_id` = '".$task_id."'");
}

function delete_task_assignees($task_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `task_assignees`  WHERE `task_id` = '".$task_id."'");
}

function deleteTaskAssignees($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `task_assignees`  WHERE `user_id` = '".$user_id."'");
}


// Task Assignees
function insert_task_assignees($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `task_assignees` (`user_id`, `task_id`) VALUES ('$user_id', LAST_INSERT_ID())");

	return $result;
}

function insert_more_task_assignees($user_id, $task_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `task_assignees` (`user_id`, `task_id`) VALUES ('$user_id', '$task_id')");

	return $result;
}

function get_task($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `board_id` = '$board_id'");

	return $result;
}

function getAssignees($task_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task_assignees` NATURAL JOIN `users` NATURAL JOIN `task` WHERE `task_id` = '$task_id'");

	return $result;
}

function getAssigneesName($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task_assignees` NATURAL JOIN `task` NATURAL JOIN `board` NATURAL JOIN `project`  WHERE `user_id` = '$userId'");

	return $result;
}


function getAllDetailsAdmin()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` NATURAL JOIN `board` NATURAL JOIN `project`");

	return $result;
}

function getDueDate($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT due_date FROM `task` NATURAL JOIN `task_assignees` NATURAL JOIN `board` NATURAL JOIN `project`  WHERE `user_id` = '$userId'");

	return $result;
}


//CVomment Section in Task Details Page


function insert_comment_task($user_id, $task_id, $comment)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `comment_task` (`user_id`, `task_id`, `comment`) VALUES ('$user_id', '$task_id', '$comment')");

	return $result;
}



function getCommentTask($task_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `comment_task` NATURAL JOIN `task` NATURAL JOIN `users` WHERE `task_id` = '$task_id'");

	return $result;
}

function getAllUploads()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `file_storage`");

	return $result;
}



// Bug Report

function insert_bug_report($bug_name, $bug_desc, $created_by, $project_id, $assignee, $priority, $state, $due_date, $start_date)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `bug_report` (`bug_name`, `bug_desc`, `created_by`, `project_id`, `assignee`, `priority`, `state`, `due_date`, `start_date`) VALUES ('$bug_name', '$bug_desc', '$created_by', '$project_id', '$assignee', '$priority', '$state', '$due_date', '$start_date')");

	return $result;
}

function getBug()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `bug_report`");

	return $result;
}

function getCreatedBugByUserId($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `bug_report` WHERE `created_by` = '$userId'");

	return $result;
}

function getAssignedBugByUserId($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `bug_report` WHERE `assignee` = '$userId'");

	return $result;
}

function getProjectBugByUserId($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `bug_report` NATURAL JOIN `project` WHERE `project_id` = '$project_id'");

	return $result;
}

function getResolvedBugByUserId($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `bug_report` WHERE `assignee` = '$userId' AND `state` = 'Closed'");

	return $result;
}

function getAssignedBugAdmin()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `bug_report`");

	return $result;
}

function getAssigneeBugByUserId($assignee)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$assignee'");

	return $result;
}

function getBugByUserId($created_by)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$created_by'");

	return $result;
}

function update_status_bug($bug_id, $state)
{
	global $conn;
	$result = mysqli_query($conn, "UPDATE `bug_report` SET `state` = '$state' WHERE `bug_id` = '$bug_id'");

	return $result;
}


// Feedback Survey

function insert_feedback($name, $email, $role, $major, $understanding, $experience, $like_ui, $navigation_feature, $process_flow, $tools_provided, $linkage, $rate, $recommend, $like_most, $like_least, $improve, $new_feature)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `feedback_survey` (`name`, `email`, `role`, `major`, `understanding`, `experience`,  `like_ui`,  `navigation_feature`,  `process_flow`,  `tools_provided`,  `linkage`, `rate`, `recommend`, `like_most`, `like_least`, `improve`, `new_feature`) VALUES ('$name', '$email', '$role', '$major', '$understanding', '$experience', '$like_ui', '$navigation_feature',  '$process_flow',  '$tools_provided',  '$linkage', '$rate',  '$recommend',  '$like_most', '$like_least', '$improve', '$new_feature')");

	return $result;
}

function getAllFeedbackForm()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey`");

	return $result;
}


function getHappyUsers()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `feedback_survey` WHERE `rate` >= 4");

	return $result;
}


// Report Issue

function insert_issue($name, $issue_name, $desc)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `report_issue` (`name`, `issue_name`, `desc`) VALUES ('$name', '$issue_name', '$desc')");

	return $result;
}

function getAllReportIssue()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `report_issue`");

	return $result;
}



?>
















