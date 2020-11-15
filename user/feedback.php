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
    $like_ui = strip_tags($_POST['like_ui']);
    $navigation_feature = strip_tags($_POST['navigation_feature']);
    $process_flow = strip_tags($_POST['process_flow']);
    $tools_provided = strip_tags($_POST['tools_provided']);
    $linkage = strip_tags($_POST['linkage']);
    $rate = strip_tags($_POST['rate']);
    $recommend = strip_tags($_POST['recommend']);
    
    
    $like_most = strip_tags($_POST['like_most']);
    $like_least = strip_tags($_POST['like_least']);
    $improve = strip_tags($_POST['improve']);
    $new_feature = strip_tags($_POST['new_feature']);
    
    
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $role = mysqli_real_escape_string($conn, $role);
    $major = mysqli_real_escape_string($conn, $major);
    $understanding = mysqli_real_escape_string($conn, $understanding);
    $experience = mysqli_real_escape_string($conn, $experience);
    $like_ui = mysqli_real_escape_string($conn, $like_ui);
    $navigation_feature = mysqli_real_escape_string($conn, $navigation_feature);
    $process_flow = mysqli_real_escape_string($conn, $process_flow);
    $tools_provided = mysqli_real_escape_string($conn, $tools_provided);
    $linkage = mysqli_real_escape_string($conn, $linkage);
    $rate = mysqli_real_escape_string($conn, $rate);
    $recommend = mysqli_real_escape_string($conn, $recommend);
    
    $like_most = mysqli_real_escape_string($conn, $like_most);
    $like_least = mysqli_real_escape_string($conn, $like_least);
    $improve = mysqli_real_escape_string($conn, $improve);
    $new_feature = mysqli_real_escape_string($conn, $new_feature);

    insert_feedback($name, $email, $role, $major, $understanding, $experience, $like_ui, $navigation_feature, $process_flow, $tools_provided, $linkage, $rate, $recommend, $like_most, $like_least, $improve, $new_feature);
    echo "<script>alert('Thank you for your time filling this feedback survey!');</script>";
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
					<div class="card  shadow mb-4">
						<div class="card-header">
							<h3 class="card-title font-weight-bold">Feedback Survey</h3>
                            <br><p></p>
                            <p><b>Note: </b><i class="font-weight-normal">This feedback survey is to collect the testing result in using Agile Master system (User Module). 
							User could access to all the functionalities in this system. Do give us more feedback so that the team could improve the system in future. Thank you for your participation.</i></p>
						</div>
				    </div>
						
				    
						
							<form method="POST" enctype="multipart/form-data">
							
<!--							<div class="row">-->
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">Personal Information</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name" >Name </label>
                                                <input type="text" name="name" id="name" placeholder="Full Name"  class="form-control" required/>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email </label>
                                                <input type="email" placeholder="Email Address" name="email" id="email" class="form-control" required/>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="role">You Are? </label>
                                                <select class="form-control" style="width: 100%;" id="role" name="role" required>
                                                    <option selected="selected">Students</option>
                                                    <option>Lecturer</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="major">Which major are you working or studying in? </label>
                                                <select class="form-control" style="width: 100%;" id="major" name="major" required>
                                                    <option selected="selected">Computing</option>
                                                    <option>Science</option>
                                                    <option>Business</option>
                                                    <option>Design</option>
                                                    <option>Engineering</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
			                     </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">Understanding of Agile Software Development?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Not Understand">
                                                        <input type="radio" name="understanding" <?php if (isset($understanding) && $understanding=="Not Understand") echo "checked";?> value="Not Understand"> Not Understand
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="understanding" <?php if (isset($understanding) && $understanding=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Understand">
                                                        <input type="radio" name="understanding" <?php if (isset($understanding) && $understanding=="Understand") echo "checked";?> value="Good"> Understand  
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">Experience of using Agile Software Development before?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="experience" <?php if (isset($experience) && $experience=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
			                     
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">How do you like User the Interface (UI)?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="like_ui" <?php if (isset($like_ui) && $like_ui=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="like_ui" <?php if (isset($like_ui) && $like_ui=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="like_ui" <?php if (isset($like_ui) && $like_ui=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="like_ui" <?php if (isset($like_ui) && $like_ui=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="like_ui" <?php if (isset($like_ui) && $like_ui=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">How do you like the Navigation?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="navigation_feature" <?php if (isset($navigation_feature) && $navigation_feature=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="navigation_feature" <?php if (isset($navigation_feature) && $navigation_feature=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="navigation_feature" <?php if (isset($navigation_feature) && $navigation_feature=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="navigation_feature" <?php if (isset($navigation_feature) && $navigation_feature=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="navigation_feature" <?php if (isset($navigation_feature) && $navigation_feature=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">How do you like the Process Flow?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="process_flow" <?php if (isset($like_ui) && $like_ui=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="process_flow" <?php if (isset($like_ui) && $like_ui=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="process_flow" <?php if (isset($like_ui) && $like_ui=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="process_flow" <?php if (isset($like_ui) && $like_ui=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="process_flow" <?php if (isset($like_ui) && $like_ui=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">How do you like the Tools Provided?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="tools_provided" <?php if (isset($tools_provided) && $tools_provided=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="tools_provided" <?php if (isset($tools_provided) && $tools_provided=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="tools_provided" <?php if (isset($tools_provided) && $tools_provided=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="tools_provided" <?php if (isset($tools_provided) && $tools_provided=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="tools_provided" <?php if (isset($tools_provided) && $tools_provided=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">How do you find the linkage between the different tools, do you feels that they are linked together or stand alone?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="linkage" <?php if (isset($linkage) && $linkage=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="linkage" <?php if (isset($linkage) && $linkage=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="linkage" <?php if (isset($linkage) && $linkage=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="linkage" <?php if (isset($linkage) && $linkage=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="linkage" <?php if (isset($linkage) && $linkage=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">How would you rate your experience of using this system?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="rate" <?php if (isset($rate) && $rate=="Poor") echo "checked";?> value="Poor"> Poor
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="rate" <?php if (isset($rate) && $rate=="Average") echo "checked";?> value="Average"> Average
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Good">
                                                        <input type="radio" name="rate" <?php if (isset($rate) && $rate=="Good") echo "checked";?> value="Good"> Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Very Good">
                                                        <input type="radio" name="rate" <?php if (isset($rate) && $rate=="Very Good") echo "checked";?> value="Very Good"> Very Good  
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Excellent">
                                                        <input type="radio" name="rate" <?php if (isset($rate) && $rate=="Excellent ") echo "checked";?> value="Excellent "> Excellent   
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">Considering your complete experience with Agile Master, How likely would you be to recommend it to a friends or colleague?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="Poor">
                                                        <input type="radio" name="recommend" <?php if (isset($recommend) && $recommend=="Unlikely") echo "checked";?> value="Unlikely"> Unlikely
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-5">
                                                    <label class="form-check-label" for="Average">
                                                        <input type="radio" name="recommend" <?php if (isset($recommend) && $recommend=="Very Likely") echo "checked";?> value="Very Likely"> Very Likely
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">What did you like the most in the system?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="form-group">
                                             <textarea type="text" class="md-textarea form-control" id="like_most" name="like_most" rows="4" cols="50"></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">What did you like the least in the system?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="form-group">
                                             <textarea type="text" class="md-textarea form-control"  id="like_least" name="like_least" rows="4" cols="50"></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">Which part of the system could be improve and how?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="form-group">
                                             <textarea type="text" class="md-textarea form-control"  id="improve" name="improve" rows="4" cols="50"></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold" style="color: #990021;">Are there any features that you would like to proposed in this system?</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body font-weight-bold">
                                        <div class="form-group">
                                             <textarea type="text" class="md-textarea form-control"  id="new_feature" name="new_feature" rows="4" cols="50"></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <input type="submit" name="submit" value="Submit" id="submit-fs" class="btn btn-success" >
                                    </div>
                                    <div class="card-footer">
                                         Thank you for your time filling this feedback survey!
                                    </div>
                                </div>
                                
							</form>
						
          
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
