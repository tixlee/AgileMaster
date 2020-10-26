<?php
session_start();
ob_start();

$msg = "";

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';


// Code for updating Password
if(isset($_POST['change']))
{
    $email=$_SESSION['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($password != $password2){
        echo "<script>alert('Password Failed updated.');</script>";
        
    }else{
        $newpassword=md5($_POST['password']);
        $query=mysqli_query($conn,"UPDATE `users` SET password = '$newpassword' WHERE `email` = '$email'");
        if ($query) {

                echo "<script>alert('Password successfully updated.');</script>";
                echo "<script>window.location.href ='login.php'</script>";

        }
    }

}


?>


<!DOCTYPE html>
<html>
<head>
    <?php include_once('../head/head.php');?>
	<title>Login</title>
    <!-- Favicons -->
    <link href="../resources/images/logo_small.png" rel="icon">
        <!-- Template Main CSS File -->
    <link href="dependencies/css/style.css" rel="stylesheet">
</head>
    
<body id="login">
    
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0 section-bg">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../resources/images/forgot.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
                
              <div class="logIn col-md-12 mr-auto">
                <img src="../resources/images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Please Enter your Email</p>
              <form method="post">
                  
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"  required autocomplete="off">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password2" class="sr-only">Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password"  required autocomplete="off">
                  </div>
                  
                  <input type="submit" name="change" id="login" class="btn btn-block login-btn mb-4" value="Change">
                </form>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>   
            

            
</body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
