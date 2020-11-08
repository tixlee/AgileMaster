<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
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
	<br > <br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
	   <div class="row">

                <?php 

                     
                     $getAllProjectsAdmin = getAllProjectsAdmin();
                     while($row = mysqli_fetch_array($getAllProjectsAdmin))
                        {
                          ?>
                            <div class="box-wrap col-xl-3 col-md-6 mb-4">
                              <div class="card ">
                                  <img src="../resources/images/bg3.jpg" class="card-img-top" style="background: rgba(0, 0, 0, 0.5);"/>
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="h3 font-weight-bold text-uppercase mb-1"><?php echo $row['project_name']; ?></div>
                                      <div class="text-lg mb-0 text-gray-800">
                                          <?php echo $row['project_description']; ?>
                                       </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                <?php 
                     } 
                ?>
        
        <!-- /.row (main row) -->
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 </div> </div>
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
