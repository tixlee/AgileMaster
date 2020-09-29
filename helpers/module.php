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



?>