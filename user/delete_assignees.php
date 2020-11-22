<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";



if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $task_id = $_GET['task_id'];
    $board_id = $_GET['board_id'];
    $tn = $_GET['tn'];
    deleteTaskAssignees($user_id);
    header("location: task_details.php?task_id=".$task_id."&board_id=".$board_id."&tn=".$tn."");
}

?>