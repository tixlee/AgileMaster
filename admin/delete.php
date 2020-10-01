<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("h:i:sa");
include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";


if(isset($_GET['rid'])){
    $rid = $_GET['rid'];
    archive_resume($rid, $date);
    header('location: resume.php');
}

if(isset($_GET['storageid'])){
    $storageid = $_GET['storageid'];
    delete_storage($storageid);
    header('location: archive_file_storage.php');
}

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
    delete_user($userid);
    header('location: users.php');
}

if(isset($_GET['companyid'])){
    $companyid = $_GET['companyid'];
    delete_company($companyid);
    header('location: archive_company.php');
}

if(isset($_GET['expenseid'])){
    $expenseid = $_GET['expenseid'];
    delete_expense($expenseid);
    header('location: archive_expenses.php');
}

if(isset($_GET['fileid'])){
    $fileid = $_GET['fileid'];
    delete_dashfile($fileid);
    header('location: archive_dashboard_file.php');
}

if(isset($_GET['catid'])){
    $catid = $_GET['catid'];
    delete_resumecat($catid);
    header('location: resume_settings.php');
}

if(isset($_GET['typeid'])){
    $typeid = $_GET['typeid'];
    delete_claimtype($typeid);
    header('location: claim_settings.php');
}
?>