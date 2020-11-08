<?php
session_start();
ob_start();

include_once 'connection/dbconnection.php';
include_once 'helpers/module.php';

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];

    
    insert_contactus($name, $email, $subject, $comment);
        echo "<script>alert('Thank You..! Your Feedback is Valuable to Us');</script>";
        echo "<script>window.location.href ='index.php'</script>";
        

    
}



?>