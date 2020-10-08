<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
}

if(isset($_POST['create'])){
    
    $user_id = $_SESSION['user_id'];
//    $project_id = $_SESSION['project_id'];
    $project_name = strip_tags($_POST['project_name']);
    $project_description = strip_tags($_POST['project_description']);
    
    $project_name = mysqli_real_escape_string($conn, $project_name);
    $project_description = mysqli_real_escape_string($conn, $project_description);
    
    
 
    insert_project($project_name, $project_description);
    insert_user_project($user_id);
        echo "<script>alert('PROJECT SUCCESSFULLY ADDED');</script>";
        echo "<script>window.location.href ='../user/project.php'</script>";

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

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/user_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br > <br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                  + ADD Project
                </button>
                <br><br>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                
                                    <input type="hidden" name="project_id" value="<?php $_SESSION['project_id']; ?>">
                                <div class="row col-md-12 col-xm-3">
                                   <label for="project_name" class="sr-only">Project Name</label>
                                    <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Project Name" required autocomplete="off">
                                </div>
                                <br>
                                <div class="row col-md-12 col-xm-6">
                                    <label for="project_description" class="sr-only">Project Description</label>
                                    <textarea class="form-control" name="project_description"  placeholder="Project Description" autocomplete="off" required></textarea>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <input type="button" name="submit" value="Back" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                    <input type="submit" name="create" value="Create" id="submit-fs" class="btn btn-success" >
                                </div>
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
          
	   <div class="row">

                <?php 

                     
                     $getProjectByUser = getProjectByUser($userId);
                     while($row = mysqli_fetch_array($getProjectByUser))
                        {
                          $getAllProjects = getAllProjects($row['project_id']);
                          $rRow = mysqli_fetch_array($getAllProjects);
                          ?>
                            <div class="box-wrap col-xl-3 col-md-6 mb-4">
                              <div class="card ">
                                  <img src="../resources/images/bg3.jpg" class="card-img-top" style="background: rgba(0, 0, 0, 0.5);"/>
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="h3 font-weight-bold text-uppercase mb-1"><?php echo $rRow['project_name']; ?></div>
                                      <div class="text-lg mb-0 text-gray-800">
                                          <?php echo $rRow['project_description']; ?>
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
