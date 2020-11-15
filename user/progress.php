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
                        $total_projects = mysqli_num_rows($getProjectByUser);
                      
                        while($row = mysqli_fetch_array($getProjectByUser))
                        {
                            
                          $getAllProjects = getAllProjects($row['project_id']);
                          $rRow = mysqli_fetch_array($getAllProjects);
                          $project = $row['project_id'];
                    ?>
                    
                    <div class="col-md-12">
                        <div class="card">
                             
                            <div class="card-header">
                                <h1 class="card-title font-weight-bold"  style="color: #990021;">Project Name: <?php echo $rRow['project_name']; ?></h1>
                                <input type = "hidden" id = "project_id" value = "<?php echo $a_fetch['project_id'];?>" />
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                
                                 
                                <div class="table-responsive">
									<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
											<th>Board Name</th>
                                            <th >Backlog Item</th>
                                            <th >To Do</th>
                                            <th >Doing</th>
											<th >Testing</th>
                                            <th >Done</th>
											
                                        </tr>
                                      </thead>
                                            
                                      <tbody>
                                        <?php
                                            $query = $conn->query("SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                            while($b_query = $query->fetch_array()){
                                        ?>
                                                        <tr >
                                                            <td> <?php echo $b_query['board_name']; ?></td>


                                                            <td>
                                                                <?php
                                                                    $getBacklogitemTask = getBacklogitemTask($b_query['board_id']);
                                                                    $total_backlog= mysqli_num_rows($getBacklogitemTask);                
                                                                    echo $total_backlog;
                                                                ?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php
                                                                    $getToDoTask = getToDoTask($b_query['board_id']);
                                                                    $total_to_do = mysqli_num_rows($getToDoTask);                
                                                                    echo $total_to_do;
                                                                ?>
                                                            </td>
                                                            
                                                            <td >
                                                                <?php
                                                                    $getDoingTask = getDoingTask($b_query['board_id']);
                                                                    $total_doing = mysqli_num_rows($getDoingTask);                
                                                                    echo $total_doing;
                                                                ?>
                                                            </td>
															
															 <td >
                                                                <?php
                                                                    $getTestingTask = getTestingTask($b_query['board_id']);
                                                                    $total_testing = mysqli_num_rows($getTestingTask);                
                                                                    echo $total_testing;
                                                                ?>
                                                            </td>
															
															 <td >
                                                                <?php
                                                                    $getDoneTask = getDoneTask($b_query['board_id']);
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
									
									<br><br>
								
                                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                            <th >Board Name</th>
                                            <th >Total Tasks</th>
                                            <th >Tasks Left</th>
                                            <th >Completed Tasks</th>
                                        </tr>
                                      </thead>
                                            
                                      <tbody>
                                        <?php
                                            $query = $conn->query("SELECT * FROM `board` NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                            while($b_query = $query->fetch_array()){
                                        ?>
                                                        <tr >
                                                            <td> <?php echo $b_query['board_name']; ?></td>


                                                            <td>
                                                                <?php
                                                                    $getTaskByBoard = getTaskByBoard($b_query['board_id']);
                                                                    $total_tasks = mysqli_num_rows($getTaskByBoard);                
                                                                    echo $total_tasks;
                                                                ?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php
                                                                    $getNotDoneTask = getNotDoneTask($b_query['board_id']);
                                                                    $total_task_not_done = mysqli_num_rows($getNotDoneTask);                
                                                                    echo $total_task_not_done;
                                                                ?>
                                                            </td>
                                                            
                                                            <td >
                                                                <?php
                                                                    $getDoneTask = getDoneTask($b_query['board_id']);
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
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    
                    <?php 
                            } 
                        
                        ?>
					
					
                </div>
            </section>


          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
        </div> 
    </div>

<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/scripts/scripts.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>



</body>
</html>
