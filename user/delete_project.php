<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";
//include_once '../resources/links/require.php';



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
    deleteProjectFromUserCreatedProject($project_id);
    header("location: project.php");
}

?>