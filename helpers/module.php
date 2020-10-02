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

//Contact Us Form


function insert_contactus($name, $email, $subject, $comment)
{
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `contactusform` (`name`, `email`, `subject`, `comment`) VALUES ('$name', '$email', '$subject', '$comment')");

	return $result;
}


?>