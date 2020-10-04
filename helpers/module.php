<?php
//USERS
function get_user($user_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '".$user_id."'");

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

?>