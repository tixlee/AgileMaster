<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Time Tracker</title>
  <link href="css/timer.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/timer.js" type="text/javascript"></script>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/user_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br ><br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-black">Time Tracker</h6>
                
            </div>
              
            <div class="card-body">
                <!-- Button trigger modal -->
				<button type="button" class="btn btn-success" id="add-project-button" disabled="disabled" title="Restart your browser if button are disabled.">Add Task</button>
                <br><br>
                <!-- Modal -->
                
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead id="project-table">
                    <tr>
						<th style="text-align: center;">Project</th>
						<th style="text-align: center;">Time</th>
						<th style="text-align: center;">Actions</th>
                    </tr>
                  </thead>
				  
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
