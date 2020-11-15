<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';




if(isset($_POST['submit'])){
   
    date_default_timezone_set("Asia/Kuala_Lumpur");
	$creation_date = date('d-m-Y');
    
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $role = strip_tags($_POST['role']);
    $major = strip_tags($_POST['major']);
    $understanding = strip_tags($_POST['understanding']);
    $experience = strip_tags($_POST['experience']);
    $like_most = strip_tags($_POST['like_most']);
    $like_least = strip_tags($_POST['like_least']);
    $attracted = strip_tags($_POST['attracted']);
    $improve = strip_tags($_POST['improve']);
    $new_feature = strip_tags($_POST['new_feature']);
    $rate = strip_tags($_POST['rate']);
    
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $role = mysqli_real_escape_string($conn, $role);
    $major = mysqli_real_escape_string($conn, $major);
    $understanding = mysqli_real_escape_string($conn, $understanding);
    $experience = mysqli_real_escape_string($conn, $experience);
    $like_most = mysqli_real_escape_string($conn, $like_most);
    $like_least = mysqli_real_escape_string($conn, $like_least);
    $attracted = mysqli_real_escape_string($conn, $attracted);
    $improve = mysqli_real_escape_string($conn, $improve);
    $new_feature = mysqli_real_escape_string($conn, $new_feature);
    $rate = mysqli_real_escape_string($conn, $rate);

    insert_feedback($name, $email, $role, $major, $understanding, $experience, $like_most, $like_least, $attracted, $improve, $new_feature, $rate);
    echo "<script>alert('Thank You!');</script>";
    echo "<script>window.location.href ='../user/feedback.php'</script>";
   
    

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>AgileMaster | Feedback Survey</title>
	<?php include('../navigation/head.php');?>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('../navigation/topbar.php');?>
		<?php include('../navigation/user_sidebar.php');?>

		<div class="content-wrapper">
			<br>
			<section class="content">
				<div class="container-fluid">
					<div class="card card-default">
						<div class="card-header">
							<h3 class="card-title font-weight-bold">Feedback Survey</h3>
                            <br><p></p>
                            <p><b>Note: </b><i class="font-weight-normal">This feedback survey is to collect the testing result in using Agile Master system (User Module). 
							User could access to all the functionalities in this system. Do give us more feedback so that the team could improve the system in future. Thank you for your participation.</i></p>
						</div>
						
						<div class="card-body">
						
							<form method="POST" enctype="multipart/form-data">
							
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="name" class="required-field">Name </label>
										<input type="text" name="name" id="name" placeholder="Full Name"  class="form-control" required/>
									</div>
								</div>
								
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="email" class="required-field">Email </label>
										<input type="email" placeholder="Email Address" name="email" id="email" class="form-control" required/>
									</div>
								</div>
			  
		
								<div class="col-md-6">
									<div class="form-group">
										<label for="role" class="required-field">You Are? </label>
										<select class="form-control" style="width: 100%;" id="role" name="role" required>
											<option selected="selected">Students</option>
											<option>Lecturer</option>
											<option>Others</option>
										</select>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="major" class="required-field">Which major are you working or studying in? </label>
										<select class="form-control" style="width: 100%;" id="major" name="major" required>
											<option selected="selected">Computing</option>
											<option>Science</option>
											<option>Business</option>
											<option>Design</option>
											<option>Engineering</option>
										</select>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="understanding" class="required-field">Understanding of Agile Software Development? </label>
										<p>Not Understand - Understand Well (1 - 5): <input type="range" id="understanding" name="understanding" min="1" max="5" required><p>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="experience" class="required-field">Experience of using Agile Software Development before?</label>
										<p>Never - Always (1 - 5): <input type="range" id="experience" name="experience" min="1" max="5" required><p>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="likemost">What did you like the most in the system?</label>
										<br>
										<textarea type="text" class="md-textarea form-control" id="like_most" name="like_most" rows="4" cols="50"></textarea>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="likeleast">What did you like the least in the system?</label>
										<br>
										<textarea type="text" class="md-textarea form-control"  id="like_least" name="like_least" rows="4" cols="50"></textarea>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="attracted">Which part of the system attracted you the most and why?</label>
										<br>
										<textarea type="text" class="md-textarea form-control"  id="attracted" name="attracted" rows="4" cols="50"></textarea>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="improvement">Which part of the system could be improve and how?</label>
										<br>
										<textarea type="text" class="md-textarea form-control"  id="improve" name="improve" rows="4" cols="50"></textarea>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="proposedfeatures">Are there any features that you would like to proposed in this system?</label>
										<br>
										<textarea type="text" class="md-textarea form-control"  id="new_feature" name="new_feature" rows="4" cols="50"></textarea>
									</div>
								</div>
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="rateexperience" class="required-field">On a scale of 1 - 5, how would you rate your experience of using this system? </label>
										<p>Poor - Excellent (1 - 5): <input type="range" id="rate" name="rate" min="1" max="5" required><p>
									</div>
								</div>
								
							</div>
<!--								<button type="button" class="btn btn-success">Submit</button>-->
                                <input type="submit" name="submit" value="Submit" id="submit-fs" class="btn btn-success" >
							</form>
							
            <!-- /.row -->
					</div>
          <!-- /.card-body -->
          <div class="card-footer">
			Thank you for your time filling this feedback survey!
					</div>
				</div>
					
				</div>
			</section>
		</div>

		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>



<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/scripts/scripts.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>

<script src="../dependencies/select/select2/js/select2.full.min.js"></script>
</body>
</html>
