<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date("d/m/Y");
	$time = date("h:i:sa");
	include_once '../connection/dbconnection.php';
	include_once "../helpers/module.php";


	if(isset($_GET['storageid'])){
		$storageid = $_GET['storageid'];
		delete_storage($storageid);
		header('location: upload_files.php');
	}

	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		delete_all_members($user_id);
		header('location: all_members.php');
	}

?>