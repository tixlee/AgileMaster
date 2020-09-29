<?php
session_start();
ob_start();



include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';


//Checking Details for reset password
if(isset($_POST['next'])){
    
    $email = strip_tags($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    
        $query=mysqli_query($conn,"select user_id from  users where email='$email'");
        $row=mysqli_num_rows($query);
        if($row>0){

        $_SESSION['email']=$email;
        header('location:../main/reset-password.php');
        } else {
            echo "<script>alert('Invalid details. Please try with valid details');</script>";
            echo "<script>window.location.href ='forgot-password.php'</script>";
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
            <img src="../resources/images/loginn.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
                
              <div class="logIn col-md-12 mr-auto">
                <img src="../resources/images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Please Enter your Email</p>
              <form method="post">
                  
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autocomplete="off">
                      
                  </div>
                  
                  <input type="submit" name="next" id="login" class="btn btn-block login-btn mb-4" value="NEXT">
                </form>
                <p class="login-card-footer-text">Already have anaccount? <a href="login.php" class="text-reset">Login here</a></p>
                
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
