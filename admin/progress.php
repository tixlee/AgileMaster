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

  <?php include('../navigation/admin_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br > <br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
	   
          <div class="card">
           <div class="card-header py-3">
               <h5 class="m-0 font-weight-bold " style="color: #990021;">Progress</h5>
           </div>
           <div class="card-body">
							<div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							
                                    <thead>
                                    <tr>
                                        <th >Project Name</th>
                                        <th >Board Name</th>
                                        <th >Total Tasks</th>
                                        <th >Tasks Left</th>
                                        <th >Completed Tasks</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAllBoardsAdmin = getAllBoardsAdmin();
                                        while($asRow = mysqli_fetch_array($getAllBoardsAdmin))
                                        {
                                            $board_id = $asRow['board_id'];
                                            
                                            $getBoardByProjectAdmin = getBoardByProjectAdmin($board_id);
                                            
                                            
                                            
                                    ?>
                                    <tr class='tbl-link' href="../upload/file_storage/">
										
                                        <td><?php echo $asRow['project_name']?></td>
								        <td><?php echo $asRow['board_name']?></td>
										<td>
                                            <?php
                                                $getTaskByBoard = getTaskByBoard($asRow['board_id']);
                                                $total_tasks = mysqli_num_rows($getTaskByBoard);                
                                                echo $total_tasks;
                                            ?>
                                        </td>
                                        
										<td>
                                           <?php
                                                $getNotDoneTask = getNotDoneTask($asRow['board_id']);
                                                $total_task_not_done = mysqli_num_rows($getNotDoneTask);                
                                                echo $total_task_not_done;
                                            ?>
                                        </td>
                                        
                                        <td>
                                            <?php
                                                $getDoneTask = getDoneTask($asRow['board_id']);
                                                $total_task_done = mysqli_num_rows($getDoneTask);                
                                                echo $total_task_done;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php 
                                            
                                        }
                                    ?>
                                </tbody>
                                    
								</table>
							</div>
						</div>
        <!-- /.row (main row) -->
      </div>
          
          
      </div>
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
