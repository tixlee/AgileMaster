<?php

$current_location = $_SERVER['REQUEST_URI'];

if(!ISSET($_SESSION['user_id'])){
		header("location: ../index.php");
	}
?>