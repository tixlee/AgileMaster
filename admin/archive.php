<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
	
if(isset($_GET['storageid']))
{
    $statusid = $_GET['storageid'];
    $newstatus = $_GET['status'];

    archive_storage($statusid, $newstatus);
    header('location: ../admin/current_file_storage.php');
}

if(isset($_GET['companyid']))
{
    $statusid = $_GET['companyid'];
    $newstatus = $_GET['status'];

    archive_company($statusid, $newstatus);
    header('location: ../admin/current_company.php');
}

if(isset($_GET['expenseid']))
{
    $statusid = $_GET['expenseid'];
    $newstatus = $_GET['status'];

    archive_expense($statusid, $newstatus);
    header('location: ../admin/current_expenses.php');
}

if(isset($_GET['fileid']))
{
    $statusid = $_GET['fileid'];
    $newstatus = $_GET['status'];

    archive_dashfile($statusid, $newstatus);
    header('location: ../admin/current_dashboard_file.php');
}
?>