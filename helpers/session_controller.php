<?php

//$current_location = $_SERVER['REQUEST_URI'];

//if(!isset($_SESSION['user_id'])){
//		header("location: ../index.php");
//	}

//if ($current_location != "/agilemaster/index.php" && $current_location != "/agilemaster/main/login.php" && $current_location != "/agilemaster/main/register.php" && $current_location != "/agilemaster/main/forgot-password.php" && $current_location != "/agilemaster/main/reset-password.php")
//{
//    if (!isset($_SESSION['user_id']))
//    {
//        header("location: ../main/login.php");
//        exit();
//    }
//}

//if ($current_location != "/agilemaster/main/login.php" )
//{
//    if (isset($_SESSION['user_id']))
//    {
//        header("location: ../main/login.php");
//        exit();
//    }
//}


$current_location = $_SERVER['REQUEST_URI'];
if($current_location != "/agilemaster" && $current_location != "/agilemaster/main/login.php")
{
    if(!isset($_SESSION['user_id']))
    {
        header("location: ../main/login.php");
        exit();
    }
}
?>