<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";
//include_once '../resources/links/require.php';



if(isset($_GET['task_id'])){
    $task_id = $_GET['task_id'];
    $board_id = $_GET['board_id'];
    delete_task($task_id);
    header("location: task.php?board_id=".$board_id."");
}

if(isset($_GET['task_id'])){
    $task_id = $_GET['task_id'];
    $board_id = $_GET['board_id'];
    delete_task_assignees($task_id);
    header("location: task.php?board_id=".$board_id."");
}

?>