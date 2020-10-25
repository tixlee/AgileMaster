<?php

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
	$result = mysqli_query($conn, "SELECT * FROM `users`");

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

function getAllFeedbackForm()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `contactusform` ");

	return $result;
}


// Upload Files

function get_AllStorage()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM file_storage  order by 'name' ASC ");    

	return $result;
}


function insert_storage($date_uploaded, $name, $fileName)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `file_storage` (`date_uploaded`, `name`, `file`) VALUES ('$date_uploaded', '$name', '$fileName')");
     
	return $result;	
}

function check_storagename($fileName)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `file_storage` WHERE `file` = '".$fileName."'");

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


function deleteProject($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `project`  WHERE `project_id` = '".$project_id."'");
}


function deleteProjectFromUserProject($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `user_project`  WHERE `project_id` = '".$project_id."'");
}

function deleteProjectFromUserCreatedProject($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM `user_created_project`  WHERE `project_id` = '".$project_id."'");
}



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


function get_project($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `project` WHERE `project_id` = '".$project_id."'");
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
	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`");

	return $result;
}


function getAllProjects($project_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT project_name, project_description FROM `project`  WHERE `project_id` = '".$project_id."'");

	return $result;
}

function getProjectByUser($userId)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_project` WHERE `user_id` = '".$userId."'");

	return $result;
}




// User_Created_Project

function insert_user_created_project($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `user_created_project` (`user_id`, `project_id`) VALUES ('$user_id', LAST_INSERT_ID())");

	return $result;
}


function get_user_created_project($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `user_created_project` NATURAL JOIN `user_project` WHERE `user_id` = '$user_id'");

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


function get_board($board_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `board` WHERE `board_id` = '$board_id'");

	return $result;
}

// Task
function insert_task($task_name, $project_task_num, $board_id, $due_date, $state, $created_by)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `task` (`task_name`, `project_task_num`, `board_id`, `due_date`, `state`, `created_by`) VALUES ('$task_name', '$project_task_num', '$board_id', '$due_date', 1, '$created_by')");

	return $result;
}

function getTask($tn)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `task` WHERE `project_task_num` = '$tn'");

	return $result;
}

// Task Assignees
function insert_task_assignees($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `task_assignees` (`user_id`, `task_id`) VALUES ('$user_id', LAST_INSERT_ID())");

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
	$result = mysqli_query($conn, "SELECT * FROM `task_assignees` WHERE `task_id` = '$task_id'");

	return $result;
}

?>









