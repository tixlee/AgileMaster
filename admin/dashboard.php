<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';



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

  <?php include('../navigation/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br ><br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
	   <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-primary text-uppercase  mb-1">Registered Accounts</div>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $raccounts = getAllRegistered();
                            echo mysqli_num_rows($raccounts); 
                          ?>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-success text-uppercase mb-1">Project Manager Accounts</div>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $pmccounts = getAllProjectManagerAccounts();
                            echo mysqli_num_rows($pmccounts); 
                          ?>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">Project Member Accounts</div>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $pmemccounts = getAllProjectMemberAccounts();
                            echo mysqli_num_rows($pmemccounts); 
                          ?>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Total Feedback Form</div>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $feedbackform = getAllFeedbackForm();
                            echo mysqli_num_rows($feedbackform); 
                          ?>
                     </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
		  
		  <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Total projects</div>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $allprojects = getAllProjectsAdmin();
                            echo mysqli_num_rows($allprojects); 
                          ?>
                     </div>
                    </div>
                    </div>
                </div>
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
