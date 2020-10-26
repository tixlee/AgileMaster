<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

    
    $board_id = $_GET['board_id'];
    $taskNum = $_GET['tn'];
    $newStatus = $_GET['status'];

    $sql = "UPDATE task SET state = '$newStatus' WHERE project_task_num = '$taskNum'";
    
     if($result = $conn->query($sql)){
        header("Location: task.php?board_id=$board_id");
    }



?>