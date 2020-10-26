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
    $board_id = $_GET['board_id'];
    $created_by = $_SESSION['user_id'];
//    $user_id = $_POST['user_id'];
	
    $task_name = strip_tags($_POST['task_name']);
//    $project_task_num = strip_tags($_POST['project_task_num']);
    $due_date = strip_tags($_POST['due_date']);
//    $start_date = strip_tags($_POST['start_date']);
//    $completion_date = strip_tags($_POST['completion_date']);
    
    $task_name = mysqli_real_escape_string($conn, $task_name);
//    $project_task_num = mysqli_real_escape_string($conn, $project_task_num);
    $due_date = mysqli_real_escape_string($conn, $due_date);
//    $start_date = mysqli_real_escape_string($conn, $start_date);
//    $completion_date = mysqli_real_escape_string($conn, $completion_date);
    
    $user_id = $_POST["user_id"];

    $sqlCount = "SELECT * FROM `task`";
    if($result = $conn->query($sqlCount)){
        $project_task_num = $result->num_rows+1;
    insert_task($task_name, $project_task_num, $board_id, $due_date, 1, $created_by);
    insert_task_assignees($user_id);
    echo "<script>alert('Task SUCCESSFULLY ADDED');</script>";
    echo "<script>window.location.href ='../user/task.php?board_id=$board_id'</script>";
   
    }

}

$board_id = $_GET['board_id'];

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
                               
                                
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                  + ADD Task
                                </button>
                                <br><br>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">New Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>

                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data">

                                                <input type="hidden" name="task_id" value="<?php $_POST['task_id']; ?>">
                                                <input type="hidden" name="project_task_num" value="<?php $_POST['project_task_num']; ?>">
                                                
                                                <div class="row col-md-12 col-xm-3">
                                                   <label for="task_name" >Task Name</label>
                                                    <input type="text" name="task_name" id="task_name" class="form-control" placeholder="Task Name" required autocomplete="off">
                                                </div>
                                                <br>
                                                <div class="row col-md-12 col-xm-6">
                                                    <label for="due_date" >Due Date</label>
                                                    <input class="form-control" type="datetime-local" placeholder="Due Date" id="due_date" name="due_date" required=""/>
                                                </div>
                                                <br>
                                                <div class="row col-md-12 col-xm-6 mb-3 ">
                                                    
                                                    <label for="" >Assign To</label>
                                                        <select data-live-search="true" title="Please select member" name="user_id" class="form-control selectpicker col-sm-12">
                                                                    <?php
                                                                        $user_id = $_GET['user_id'];
                                                                        $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                                                        while($f_query = $query->fetch_array())
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $f_query['user_id']; ?>" <?php if ($user_id == $f_query['user_id']) {echo "selected";} ?> required><?php echo $f_query['name']; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                     
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                    <input type="submit" name="create" value="Create" id="submit-fs" class="btn btn-success" >
                                                </div>
                                            </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                
                                    <div class="task-list">
                                        <div class="lg-3 backlog ">
                                            <div>
                                                <div class="card-header text-center" style="background-color:#ededed;" >
                                                    <h5 class="font-weight-bold" >Backlog Items</h5>
                                                </div>
                                                
                                                <?php
    
                                                        $sql1 = "SELECT * FROM task WHERE board_id = '$board_id' AND state = '1'";
                                                        $sql2 = "SELECT * FROM task WHERE board_id = '$board_id' AND state = '2'";
                                                        $sql3 = "SELECT * FROM task WHERE board_id = '$board_id' AND state = '3'";
                                                        $sql4 = "SELECT * FROM task WHERE board_id = '$board_id' AND state = '4'";
                                                        $sql5 = "SELECT * FROM task WHERE board_id = '$board_id' AND state = '5'";

                                                        if($result = $conn->query($sql1)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){
                                                                
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                        <a href='task.php?board_id=$board_id&tn=$tn' class='task' data-toggle='modal' data-target='#myModal'
                                                                            <h4>" . ($row['task_name']) . "</h4>
                                                                            <div>
                                                                                <span class='task-id'>" . $row['project_task_num'] ."</span>
                                                                            </div>
                                                                        </a>
                                                                        <select data-live-search='true' class='form-control changeStatus col-sm-10' onchange='location = this.value'>
                                                                            <option class='no-display' selected='selected'>Status</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=4'>DONE</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=5'>TESTING</option>
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                    ";
                                                                }
                                                                $result->free_result();
                                                            }
                                                        }

                                                    ?>
                                                
                                            </div>
                                        </div>
                                        <div class="lg-3 todo">
                                            <div>
                                                <div class="card-header text-center"  style="background-color:#ededed;" >
                                                    <h5  class="font-weight-bold">TO DO</h5>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql2)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                        <a href='task.php?board_id=$board_id&tn=$tn' class='task' data-toggle='modal' data-target='#myModal'
                                                                            <h4>" . ($row['task_name']) . "</h4>
                                                                            <div>
                                                                                <span class='task-id'>" . $row['project_task_num'] ."</span>
                                                                            </div>
                                                                        </a>
                                                                        <select data-live-search='true' class='form-control changeStatus col-sm-10' onchange='location = this.value'>
                                                                            <option class='no-display' selected='selected'>Status</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=4'>DONE</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=5'>TESTING</option>
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                    ";
                                                                }
                                                                $result->free_result();
                                                            }
                                                        }
                                                    ?>
                                                    
                                            </div>
                                        </div>
                                        <div class="lg-3 doing">
                                            <div>
                                                <div class="card-header text-center"  style="background-color:#ededed;" >
                                                    <h5 class="font-weight-bold">DOING</h5>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql3)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                        <a href='task.php?board_id=$board_id&tn=$tn' class='task' data-toggle='modal' data-target='#myModal'
                                                                            <h4>" . ($row['task_name']) . "</h4>
                                                                            <div>
                                                                                <span class='task-id'>" . $row['project_task_num'] ."</span>
                                                                            </div>
                                                                        </a>
                                                                        <select data-live-search='true' class='form-control changeStatus col-sm-10' onchange='location = this.value'>
                                                                            <option class='no-display' selected='selected'>Status</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=4'>DONE</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=5'>TESTING</option>
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                    ";
                                                                }
                                                                $result->free_result();
                                                            }
                                                        }
                                                    ?>
                                                    
                                            </div>
                                        </div>
                                        <div class="lg-3 done">
                                            <div>
                                                <div class="card-header text-center"  style="background-color:#ededed;" >
                                                    <h5 class="font-weight-bold">DONE</h5>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql4)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                        <a href='task.php?board_id=$board_id&tn=$tn' class='task' data-toggle='modal' data-target='#myModal'
                                                                            <h4>" . ($row['task_name']) . "</h4>
                                                                            <div>
                                                                                <span class='task-id'>" . $row['project_task_num'] ."</span>
                                                                            </div>
                                                                        </a>
                                                                        <select data-live-search='true' class='form-control changeStatus col-sm-10' onchange='location = this.value'>
                                                                            <option class='no-display' selected='selected'>Status</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=4'>DONE</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=5'>TESTING</option>
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                    ";
                                                                }
                                                                $result->free_result();
                                                            }
                                                        }
                                                    ?>
                                                    
                                                    
                                            </div>
                                        </div>
                                        <div class="lg-3 testing">
                                            <div>
                                                <div class="card-header text-center"  style="background-color:#ededed;" >
                                                    <h5 class="font-weight-bold">TESTING</h5>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql5)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                        <a href='task.php?board_id=$board_id&tn=$tn' class='task' data-toggle='modal' data-target='#myModal'
                                                                            <h4>" . ($row['task_name']) . "</h4>
                                                                            <div>
                                                                                <span class='task-id'>" . $row['project_task_num'] ."</span>
                                                                            </div>
                                                                        </a>
                                                                        <select data-live-search='true' class='form-control changeStatus col-sm-10' onchange='location = this.value'>
                                                                            <option class='no-display' selected='selected'>Status</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=4'>DONE</option>
                                                                            <option value='changeStatus.php?board_id=$board_id&tn=$tn&status=5'>TESTING</option>
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                    ";
                                                                }
                                                                $result->free_result();
                                                            }
                                                        }
                                                    ?>
                                                    
                                                    
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h3 class="modal-title">Task Details</h3>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                  
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <?php
                                                                
                                                               $board_id = $_GET['board_id'];
                                                                $taskNum = $_GET['tn'];
                                                                $sql = "SELECT * FROM `task` WHERE `board_id` = '$board_id' AND `project_task_num` = $taskNum'";
                                                                 if($result = $conn->query($sql)){
                                                                    $rowsCount = $result->num_rows;
                                                                    if($rowsCount>0){
                                                                        $row = $result->fetch_assoc();
                                                                        $result->free_result();
                                                                    }
                                                                }
                                                                
                                                                ?>
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
                                              </div>
                                            </div>
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
