<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
	
date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if(isset($_GET['cid']))
		{	
			$statusid = $_GET['cid'];
			$newstatus = $_GET['status'];
			$reason = $_GET['reason'];

			
			update_claim_status($statusid,$newstatus,$reason);
			header('location: ../admin/claims.php');
		}

?>