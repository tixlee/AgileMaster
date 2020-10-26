<?php

session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
                                                             
                                                               $board_id = $_GET['board_id'];
                                                                $taskNum = $_GET['tn'];
                                                                $sql = "SELECT * FROM `task` WHERE `board_id` = '$board_id' AND `project_task_num` = $taskNum";
                                                                 if($result = $conn->query($sql)){
                                                                    $rowsCount = $result->num_rows;
                                                                    if($rowsCount>0){
                                                                        $row = $result->fetch_assoc();
                                                                        $result->free_result();
                                                                        
                                                                    }
    }
                                                                
                                                                ?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Board</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('../navigation/topbar.php');?>

        <?php include('../navigation/user_sidebar.php');?>

        <div class="content-wrapper">
            
            <br > <br >

            <section class="content">
                
                <div class="container-fluid">
                    
                
                    
                    
                    
                    <?php 
                        $getProjectByUser = getProjectByUser($userId);
                        $row = mysqli_fetch_array($getProjectByUser);
                        
                        $board_id = $_GET['board_id'];
                        $sql = "SELECT * FROM `board` WHERE `board_id` = '$board_id'";
                        $result = $conn->query($sql);
		                $bRow = $result->fetch_assoc();
                        $result->free_result();
                    
                    ?>
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title font-weight-bold" >Board Name: <?php echo $bRow['board_name']; ?></h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               
                                 <div class="row">
                                                        <div class="col">
                                                            <h5 style="font-weight: bold; color: #d6002f;">Task Details</h5>
                                                            <hr style="width: 60%; margin-left: 0px; border: 1px solid black;">
                                                            
                                                            
                                                            <p><?php echo $row['task_name']; ?></p>
                                                            
                                                        </div>
                                                        <div class="col">
                                                            <h4 style="font-weight: bold; color: #d6002f;">Task Details</h4>
                                                            <hr style="width: 60%; margin-left: 0px; border: 1px solid black;">
                                                        </div>
                                                    </div>
                                
                            </div>  
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    
                    
                    
                </div>
            </section>


          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
        </div> 
    </div>
    
    

<script src="../dependencies/scripts/custom.js"></script>
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
