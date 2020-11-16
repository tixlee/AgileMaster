<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';


?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | User Contact Us Form</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar_admin.php');?>

  <?php include('../navigation/systemissue_adminsidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold " style="color: #990021;">Report Issue</h5>
                
            </div>
              
            <div class="card-body">
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >Name</th>
				        <th >Issue</th>
						<th >Description</th>
						<th >Creation Date</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                                $getAllReportIssue = getAllReportIssue();
                            
                                while($row = mysqli_fetch_array($getAllReportIssue))
                                {
                                    
						?>
                    <tr>

                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['issue_name']; ?></td>
                            <td><?php echo $row['desc']; ?></td>
							<td><?php echo $row['creation_date']; ?></td>
                            
                            
                      
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
