<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";



if(isset($_GET['board_id'])){
    $board_id = $_GET['board_id'];
    $project_id = $_GET['project_id'];
    delete_board($board_id);
    header("location: project_details.php?project_id=".$project_id."");
}


if(isset($_GET['board_id'])){
    $board_id = $_GET['board_id'];
    $project_id = $_GET['project_id'];
    delete_board_task($board_id);
    header("location: project_details.php?project_id=".$project_id."");
}


?>