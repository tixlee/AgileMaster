<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $project_id = $_GET['project_id'];
    delete_member($user_id);
    header("location: project_details.php?project_id=".$project_id."");
}


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $project_id = $_GET['project_id'];
    deleteMemberFromUserProject($user_id);
    header("location: project_details.php?project_id=".$project_id."");
}

if(isset($_GET['project_id'])){
    $project_id = $_GET['project_id'];
    deleteProject($project_id);
    header("location: project.php");
}

if(isset($_GET['project_id'])){
    $project_id = $_GET['project_id'];
    deleteProjectFromUserProject($project_id);
    header("location: project.php");
}


if(isset($_GET['project_id'])){
    $project_id = $_GET['project_id'];
    deleteProjectFromUserCreatedProject($project_id)($project_id);
    header("location: project.php");
}




?>