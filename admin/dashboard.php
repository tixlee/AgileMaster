<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['admin_id']))
{
	$adminId = $_SESSION["admin_id"];
}


?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Dashboard</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar_admin.php');?>

  <?php include('../navigation/dashboard_adminsidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br ><br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
	   <div class="row">
	   
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php 
										$raccounts = getAllRegistered();
										echo mysqli_num_rows($raccounts); 
										?></h3>
									<p>Registered Accounts</p>
								</div>
								<div class="icon">
									<i class="fas fa-user user"></i>
								</div>
								<a href="members.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						<div class="col-lg-3 col-6">
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php 
											$allprojects = getAllProjectsAdmin();
											echo mysqli_num_rows($allprojects); 
											?></h3>
									<p>Total Projects Created</p>
								</div>
								<div class="icon">
									<i class="fas fa-project-diagram diagram"></i>
								</div>
								<a href="project.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

                        <div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php 
											$getAllBoardsAdmin = getAllBoardsAdmin();
											echo mysqli_num_rows($getAllBoardsAdmin); 
											?></h3>
									<p>Total Boards Created</p>
								</div>
								<div class="icon">
									<i class="fab fa-trello trello"></i>
								</div>
								<a href="board.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
           
						<div class="col-lg-3 col-6">
							<div class="small-box bg-warning ">
								<div class="inner">
									<h3><?php 
										$uploads = getAllUploads();
										echo mysqli_num_rows($uploads); 
										?></h3>
									<p>Total Uploads</p>
								</div>
								<div class="icon">
									<i class="fas fa-file-upload upload"></i>
								</div>
								<a href="upload_files.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
           
                        <div class="col-lg-3 col-6">
							<div class="small-box bg-pink-800 text-white">
								<div class="inner">
									<h3><?php 
										$getAssignedBugAdmin = getAssignedBugAdmin();
										echo mysqli_num_rows($getAssignedBugAdmin); 
										?></h3>
									<p>Bug To Be Fixed</p>
								</div>
								<div class="icon">
									<i class="fas fa-bug bug"></i>
								</div>
								<a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						<div class="col-lg-3 col-6">
							<div class="small-box bg-gray-800 text-white">
								<div class="inner">
									<h3><?php 
										$getAllFeedbackForm = getAllFeedbackForm();
										echo mysqli_num_rows($getAllFeedbackForm); 
										?></h3>
									<p>Total Feedback Survey Received</p>
								</div>
								<div class="icon">
									<i class="fas fa-comment comment"></i>
								</div>
								<a href="feedback_survey.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
	   
				        <div class="col-lg-3 col-6">
							<div class="small-box bg-orange-800 text-white">
								<div class="inner">
									<h3><?php 
										$getAllContactUsFeedbackForm = getAllContactUsFeedbackForm();
										echo mysqli_num_rows($getAllContactUsFeedbackForm); 
										?></h3>
									<p>Total Contact Us Feedback Received</p>
								</div>
								<div class="icon">
									<i class="fas fa-comment comment"></i>
								</div>
								<a href="contactus_feedback.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
	   
	                   <div class="col-lg-3 col-6">
							<div class="small-box bg-purple-800 ">
								<div class="inner">
									<h3><?php 
										$getHappyUsers = getHappyUsers();
										echo mysqli_num_rows($getHappyUsers); 
										?></h3>
									<p>Total Happy Users</p>
								</div>
								<div class="icon">
									<i class="icofont-simple-smile smile"></i>
								</div>
								<a href="#" class="small-box-footer" style="color: black;">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
	   
            </div>
				
		  <div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold">Feedback Survey</h6>
						</div>
              
						<div class="card-body">
							<div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Email</th>
                                        <th >Role</th>
                                        <th >Major</th>
                                        <th >Understanding</th>
                                        <th >Experience</th>
                                        <th >Like UI</th>
                                        <th >Navigation Features</th>
                                        <th >Process Flow</th>
                                        <th >Tools Provided</th>
                                        <th >Linkage</th>
                                        <th >Rate System</th>
                                        <th >Recommend</th>
                                        <th >Like Most</th>
                                        <th >Like Least</th>
                                        <th >Improvement</th>
                                        <th >Proposed Feature</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAllFeedbackForm = getAllFeedbackForm();
                                        while($feedRow = mysqli_fetch_array($getAllFeedbackForm))
                                        {
                                            
                                            
                                    ?>
                                    <tr >
                                        
                                            <td > 
                                                <?php echo $feedRow['name'];?>
                                            </td>


                                            <td >
                                                <?php echo $feedRow['email'];?>
                                            </td>

                                            <td >
                                                <?php echo $feedRow['role'];?>
                                            </td>

                                            <td >
                                                <?php echo $feedRow['major'];?>
                                            </td>

                                            <td >
                                                <?php echo $feedRow['understanding'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                   echo $feedRow['experience'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['like_ui'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['navigation_feature'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['process_flow'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['tools_provided'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['linkage'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['rate'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['recommend'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['like_most'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['like_least'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['improve'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['new_feature'];?>
                                            </td>

                                           
                                    </tr>
                                    <?php 
                                            
                                        }
                                    ?>
                                </tbody>
                                    
								</table>
							</div>
						</div>
					</div>
		  
    
        
        <!-- /.row (main row) -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


   <!-- Bootstrap core JavaScript-->

  <!-- Core plugin JavaScript-->
  <script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../dependencies/scripts/sb-admin-2.min.js"></script>
    
  <!-- Page level plugins -->
  <script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../dependencies/scripts/datatables-demo.js"></script>
    
<script src="../dependencies/scripts/scripts.js"></script>

<!-- jQuery -->
<!-- Bootstrap 4 -->


<!-- AdminLTE App -->
<script src="../dependencies/navigation/js/adminlte.js"></script>

</body>
</html>
