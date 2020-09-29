<?php
session_start();
ob_start();

$msg = "";
$msg2 = "";

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_POST['create'])){
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $password2 = strip_tags($_POST['password2']);
    
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $password2 = mysqli_real_escape_string($conn, $password2);
    
    $usr = mysqli_query($conn, "SELECT email FROM `users` WHERE `email` = '$email'");
    $rslt = mysqli_num_rows($usr);
    
    if($rslt >0){
        $msg = "Email is already exist! Please choose different email.";
        
    }else{
        
        if($password == $password2){
            $password = md5($password);
            insert_user($name, $email, $password);
            header('location: ../main/login.php');
        }else{
            $msg2 = "Password and Confirm Password Field do not match!!";
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
            <img src="../resources/images/register1.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
                
              <div class="logIn col-md-12 mr-auto">
                <img src="../resources/images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Create your account</p>
              <form method="post" action="register.php">
                  <div class="form-group">
                    <label for="name" class="sr-only">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autocomplete="off">
                      <div style="color: red;"><?php echo $msg; ?></div>
                  </div>
                  
                  
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"  required autocomplete="off">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password2" class="sr-only">Confirm Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password"  required autocomplete="off">
                      <div style="color: red;"><?php echo $msg2; ?></div>
                  </div>
                  <div class="checkbox checkbox-red">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                      <label for="agreeTerms">
                       I agree to Agile Master’s <a href="#!" class="text-register">Terms of Service</a>
                      </label>
                  </div>
                  
                  <input type="submit" name="create" id="login" class="btn btn-block login-btn mb-4" value="Create My Account">
                </form>
                <p class="login-card-footer-text">Already have an account? <a href="../main/login.php" class="text-reset">Login here</a></p>
                
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

