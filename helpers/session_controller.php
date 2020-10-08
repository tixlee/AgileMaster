<?php

$current_location = $_SERVER['REQUEST_URI'];
if($current_location != "/agilemaster/main/register.php" && $current_location != "/agilemaster/main/login.php")
{
    if(!isset($_SESSION['user_id']))
    {
        header("location: ../main/login.php");
        exit();
    }
}

?>