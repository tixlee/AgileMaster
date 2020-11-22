<?php
$hostname_dbconnection = "localhost"; 
$database_dbconnection = "am";
$username_dbconnection = "fyp";
$password_dbconnection = "aGile@2020Master";


$conn = mysqli_connect($hostname_dbconnection, $username_dbconnection, $password_dbconnection, $database_dbconnection); 


mysqli_select_db($conn, $database_dbconnection) or die (mysqli_error($conn)); 
?>