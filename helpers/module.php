<?php
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


// user_project
function insert_user_project($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `user_project` (`user_id`, `project_id`) VALUES ('$user_id', LAST_INSERT_ID())");

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




?>









