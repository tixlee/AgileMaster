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

  <?php include('../navigation/admin_sidebar.php');?>

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
									<i class="fas fa-user"></i>
								</div>
								<a href="all_members.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
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
									<i class="fas fa-project-diagram"></i>
								</div>
								<a href="project.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<div class="col-lg-3 col-6">
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?php 
										$uploads = getAllUploads();
										echo mysqli_num_rows($uploads); 
										?></h3>
									<p>Total Uploads</p>
								</div>
								<div class="icon">
									<i class="fas fa-file-upload"></i>
								</div>
								<a href="upload_files.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						<div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php 
										$feedbackform = getAllFeedbackForm();
										echo mysqli_num_rows($feedbackform); 
										?></h3>
									<p>Total Feedback Survey Received</p>
								</div>
								<div class="icon">
									<i class="fas fa-comment"></i>
								</div>
								<a href="bug.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
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
