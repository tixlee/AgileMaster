<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
}

if(isset($_SESSION['role']))
{
	$role = $_SESSION["role"];
}

if(isset($_POST['create'])){
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
	$creation_date = date('d-m-Y');
    
    $user_id = $_SESSION['user_id'];
//    $project_id = $_SESSION['project_id'];
    $role = $_SESSION["role"];
    $project_name = strip_tags($_POST['project_name']);
    $project_description = strip_tags($_POST['project_description']);
    
    $project_name = mysqli_real_escape_string($conn, $project_name);
    $project_description = mysqli_real_escape_string($conn, $project_description);
    
    $proj = mysqli_query($conn, "SELECT project_name FROM `project` WHERE `project_name` = '$project_name'");
    $reslt = mysqli_num_rows($proj);
    
    if($reslt >0){
        echo "<script>alert('Project Name is already exist! Please choose a different name.');</script>";
        
    }else{
        
       insert_project($project_name, $project_description);
        insert_user_project($user_id);
        insert_user_created_project($user_id);
        update_role($user_id, $role);
        echo "<script>window.location.href ='../user/project.php'</script>";
        
    }

}


?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Projects</title>
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
	  
          <button type="button" class="btn btn-success" onclick="location.href='project.php'"> ACTIVE PROJECT(s)</button>
                <br><br>
             
          
	   <div class="row">

                <?php 

                     
                     $getProjectByUser = getProjectByUser($userId);
                     while($row = mysqli_fetch_array($getProjectByUser))
                        {
                         
                            $getAllProjects = getAllArchiveProjects($row['project_id']);
                            $rRow = mysqli_fetch_array($getAllProjects);
                            $project_id = $row['project_id'];
                            if(mysqli_num_rows($getAllProjects) > 0) {
                          ?>
                            <div class="box-wrap col-xl-3 col-md-4 mb-4">
                              <div class="card shadow " >
                                  <img src="../resources/images/bg6.jpg" class="" style="filter: brightness(90%); color: #990021;"/>
                                    
                                  <?php
                                                $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$project_id'") or die(mysqli_error());
                                                $u_fetch = $u_query->fetch_array();
                                                if($u_fetch['user_id'] == $userId)
                                                {
                                                
                                            ?>
                                  <div class="item-action dropdown" align="right" style="position: absolute; right: 5px; top: 5px; z-index: 1;" > 
                                        <a id="board-id" href="#" data-toggle="dropdown" class="text-muted" data-abc="true" > 
                                            <svg xmlns="http://www.w3.org/2000/svg"  color="white" width="25" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                <circle cx="16" cy="12" r="1"></circle>
                                                <circle cx="16" cy="5" r="1"></circle>
                                                <circle cx="16" cy="19" r="1"></circle>
                                            </svg> 
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right bg-black" role="menu"> 
                                            <?php
                                                    $confirmation = "Are you sure about restoring the selected project?";
                                            ?>
                                            
                                            <a href = "archive.php?project_id=<?php echo $row['project_id']?>&status=Active" class="dropdown-item trash" data-abc="true"  onclick="return confirm('<?php echo $confirmation; ?>')">
                                                Active Project</a>
                                            
                                        </div>
                                    </div>
                                  <?php } ?>
                                  <div class="card-body">
                                      <a href="project_details.php?project_id=<?php echo $row['project_id']; ?>" class="h4 font-weight-bold text-uppercase mb-1"  style="color: #d6002f;">
                                        <?php echo $rRow['project_name']; ?>
                                      </a>

                                </div>                                 
                              </div>
                            </div>
                <?php 
                     }
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
