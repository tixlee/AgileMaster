<?php
session_start();
ob_start();


include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
	
date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if(isset($_GET['lid']))
		{	
			$statusid = $_GET['lid'];
			$newstatus = $_GET['status'];
			$reason = $_GET['reason'];

			
			update_leave_status($statusid,$newstatus,$reason);
			header('location: ../admin/leaveapplications.php');
		}

?>