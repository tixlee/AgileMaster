<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
    
    $bug_id = $_GET['bug_id'];
    $state = $_GET['state'];

    $sql = "UPDATE `bug_report` SET `state` = '$state' WHERE `bug_id` = '$bug_id'";
    
     if($result = $conn->query($sql)){
        header("Location: bug_report.php");
    }



?>