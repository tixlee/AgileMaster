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
	<title>Register</title>
    <link href="../resources/images/logo_small.png" rel="icon">
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
							<form method="post" enctype="multipart/form-data">
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
										I agree to Agile Master’s <a href="#!" class="text-register" data-target="#myModal" data-toggle="modal">Terms of Service</a>
									</label>
								</div>

								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog">

										<div class="modal-content">
											<div class="modal-header" style="color: black;">
												<h3>Terms of Service</h3>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
                                                                
											<div class="modal-body" style="color: black;">
																
												<h4>1. Introduction</h4>
												<p style="text-align: justify;">These Terms of Service govern the use of Agile Master Services. 
												By using Agile Master a user accepts these Terms of Service. These Terms of Service constitute a 
												legally user. You do not agree to these Terms of Service, do not use any of Agile Master Services.</p>
																		
												<h4>2. Services</h4>
												<p style="text-align: justify;">We provide a variety of Services, including:</p>
												<p style="text-align: justify;">a. Create Project in Project Page.</p>
												<p style="text-align: justify;">b. Create Description, Add Team Member and Boards.</p>
												<p style="text-align: justify;">c. Add Task in Board Page and Assign Members for the task.</p>
												<p style="text-align: justify;">d. View Members Page per projects.</p>
												<p style="text-align: justify;">e. View Progress for each projects</p>
												<p style="text-align: justify;">f. Uploads Files for each Projects</p>
												<p style="text-align: justify;">g. Create Bug Reports</p>
												<p style="text-align: justify;">h. Others Tools</p>
																		
												<h4>3. Privacy and Data Security</h4>
												<p style="text-align: justify;">User data elicitation, procession and transmission if necessary if
												subject to data protection regulations. Data protection and privacy regulations can be found under
												Data Privacy.</p>
																		
												<h4>4. Responsibilities of Us</h4>
												<p style="text-align: justify;">The User is obliged to check whether the Software can be used for his
												purposes before ordering the Services. The user binds himself not to exploit found errors for own purposes
												and, for example, not to access the data of third parties or manipulate the invoices or payment perio
												</p>
											</div>
											
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								
				  
								<input type="submit" name="create" id="login" class="btn btn-block login-btn mb-4" value="Create My Account">
							</form>
							<p class="login-card-footer-text">Already have an account? <a href="../main/login.php" class="text-reset"><strong>Login here</strong></a></p>
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

