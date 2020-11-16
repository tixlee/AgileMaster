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


if(isset($_POST['create'])){
    $board_id = $_GET['board_id'];
    $created_by = $_SESSION['user_id'];
//    $user_id = $_POST['user_id'];
	
    $task_name = strip_tags($_POST['task_name']);
    $task_desc = strip_tags($_POST['task_desc']);
    $due_date = strip_tags($_POST['due_date']);
    $start_date = strip_tags($_POST['start_date']);
    
    $task_name = mysqli_real_escape_string($conn, $task_name);
    $task_desc = mysqli_real_escape_string($conn, $task_desc);
    $due_date = mysqli_real_escape_string($conn, $due_date);
    $start_date = mysqli_real_escape_string($conn, $start_date);
    
    $user_id = $_POST["user_id"];

    $sqlCount = "SELECT * FROM `task`";
    if($result = $conn->query($sqlCount)){
        $project_task_num = $result->num_rows+1;
    insert_task($task_name, $task_desc, $project_task_num, $board_id, $due_date, $start_date, 1, $created_by);
    insert_task_assignees($user_id);
	insert_calendar($task_name, $due_date, $due_date);
    echo "<script>window.location.href ='../user/task.php?board_id=$board_id'</script>";
   
    }

}

$board_id = $_GET['board_id'];

?>



<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Task</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('../navigation/topbar.php');?>

        <?php include('../navigation/user/project_sidebar.php');?>

        <div class="content-wrapper">
            
            <br > <br >

            <section class="content">
                
                <div class="container-fluid">
                    
                
                    
                    
                    
                    <?php
                        $getProjectByUser = getProjectByUser($userId);
                        $iRow = mysqli_fetch_array($getProjectByUser);
                        
                        $board_id = $_GET['board_id'];
                        $sql = "SELECT * FROM `board` NATURAL JOIN `users`  NATURAL JOIN `project`  WHERE `board_id` = '$board_id'";
                        $result = $conn->query($sql);
		                $bRow = $result->fetch_assoc();
                        $result->free_result();
                    
                    ?>
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center" style="font-weight: bold; color: #d6002f;">REQUIREMENTS</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h1 class="card-title font-weight-bold">Project Name:&nbsp;</h1><h1 class="card-title font-weight-bold" style=" color: #d6002f;"><?php echo $bRow['project_name']; ?> </h1><p>&nbsp;   </p>
                                <h1 class="card-title font-weight-bold">Board Name:&nbsp;</h1><h1 class="card-title font-weight-bold" style=" color: #d6002f;"><?php echo $bRow['board_name']; ?> </h1>
                                <button onclick="location.href='project_details.php?project_id=<?php echo $bRow['project_id']; ?>'" class="btn btn-info " style="float: right;">BACK TO PROJECT DETAILS</button>
                            </div>  
                          <!-- /.card-body -->
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body" style="background-image: url('../resources/images/task-background5.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center; min-height: 600px; background-attachment: fixed;">
                               
                                
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                  <i class="fas fa-plus"></i> ADD TASK
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
                                                <div class="form-group shadow-textarea">
                                                    <label for="task_desc" class="text-lg">Description</label>
                                                    <textarea class="form-control"  name="task_desc" id="task_desc" rows="3" placeholder="Add a more detailed description..."  required=""></textarea>
                                                </div>
                                                <br>
												<div class="row col-md-12 col-xm-6">
                                                    <label for="due_date" >Start Date</label>
                                                    <input class="form-control" type="date" placeholder="Start Date" id="start_date" name="start_date" required=""/>
                                                </div>
												<br>
                                                <div class="row col-md-12 col-xm-6">
                                                    <label for="due_date" >Due Date</label>
                                                    <input class="form-control" type="date" placeholder="Due Date" id="due_date" name="due_date" required=""/>
                                                </div>
                                                <br>
                                                
                                                <div class="row col-md-12 col-xm-6 mb-3 ">
                                                    
                                                    <label for="exampleDropdown" >Assign To</label>
                                                            <select data-live-search="true" title="Please select member" name="user_id" class="form-control selectpicker col-sm-12">
                                                                    <?php
                                                                        $user_id = $_GET['user_id'];
                                                                        $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '$bRow[project_id]'") or die(mysqli_error());
                                                                        while($u_query = $query->fetch_array())
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $u_query['user_id']; ?>" <?php if ($user_id == $u_query['user_id']) {echo "selected";} ?> required><?php echo $u_query['name']; ?></option>
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
                                                    <h4 class="font-weight-bold" >BACKLOG ITEMS</h4>
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
                                                                    $assignees_arr = array();
                                                                    $getAssignees = getAssignees($task_id);
//                                                                    $nRow = mysqli_fetch_array($getAssignees);
                                                                    while ($nRow = mysqli_fetch_array($getAssignees)){
                                                                    array_push($assignees_arr, $nRow['name']);
                                                                    $assignees = implode($assignees_arr, ", ");}
                                                                    $confirmation = "Are you sure about deleting task?";
                                                                    
                                                                    $due_date = $row['due_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($due_date);

                                                                    // Creating new date format from that timestamp
                                                                    $new_format_date = date("d-m-Y", $timestamp);
                                                                    
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                            <div class='item-action dropdown' align='right' style='position: absolute; right: 5px; top: 5px; z-index: 1;' > 
                                                                                <a id='task-optn' href='#' data-toggle='dropdown' class='text-muted' data-abc='true' > 
                                                                                    <svg xmlns='http://www.w3.org/2000/svg'  color='black' width='25' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-vertical'>
                                                                                        <circle cx='16' cy='12' r='1'></circle>
                                                                                        <circle cx='16' cy='5' r='1'></circle>
                                                                                        <circle cx='16' cy='19' r='1'></circle>
                                                                                    </svg> 
                                                                                </a>
                                                                                <div class='dropdown-menu dropdown-menu-right bg-black' role='menu'> 
                                                                                   
                                                                                    <a href = 'delete_task.php?task_id=".$row['task_id']."&board_id=".$row['board_id']."' class='dropdown-item trash' data-abc='true'>
                                                                                        Delete Task</a>

                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <a href='task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn' class='task'>
                                                                                <h5 class='font-weight-bold'>" . ($row['task_name']) . "</h5>
                                                                                <input type = 'hidden' id = 'task_id' value = ". $row["task_id"] ." />
                                                                                <div>
                                                                                    <span class='task-id' style='color: #404040;'>Assigned to " . $assignees ."</span>
                                                                                    <br>
                                                                                    <span class='task-id' style='color: #404040;'>Due Date: " . $new_format_date ."</span>
                                                                                    <br>
                                                                                    <p class='text-right'>See Details</p>
                                                                                </div>
                                                                            </a>
                                                                            <select data-live-search='true' class='form-control changeStatus col-sm-8' onchange='location = this.value'>
                                                                                <option class='no-display' selected='selected'>Status</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=4'>TESTING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=5'>DONE</option>
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
                                                    <h4  class="font-weight-bold">TO DO</h4>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql2)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    $assignees_arr = array();
                                                                    $getAssignees = getAssignees($task_id);
//                                                                    $nRow = mysqli_fetch_array($getAssignees);
                                                                    while ($nRow = mysqli_fetch_array($getAssignees)){
                                                                    array_push($assignees_arr, $nRow['name']);
                                                                    $assignees = implode($assignees_arr, ", ");}
                                                                    $confirmation = "Are you sure about deleting task?";
                                                                    
                                                                    $due_date = $row['due_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($due_date);

                                                                    // Creating new date format from that timestamp
                                                                    $new_format_date = date("d-m-Y", $timestamp);
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                            <div class='item-action dropdown' align='right' style='position: absolute; right: 5px; top: 5px; z-index: 1;' > 
                                                                                <a id='task-optn' href='#' data-toggle='dropdown' class='text-muted' data-abc='true' > 
                                                                                    <svg xmlns='http://www.w3.org/2000/svg'  color='black' width='25' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-vertical'>
                                                                                        <circle cx='16' cy='12' r='1'></circle>
                                                                                        <circle cx='16' cy='5' r='1'></circle>
                                                                                        <circle cx='16' cy='19' r='1'></circle>
                                                                                    </svg> 
                                                                                </a>
                                                                                <div class='dropdown-menu dropdown-menu-right bg-black' role='menu'> 
                                                                                   
                                                                                    <a href = 'delete_task.php?task_id=".$row['task_id']."&board_id=".$row['board_id']."' class='dropdown-item trash' data-abc='true'>
                                                                                        Delete Task</a>

                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <a href='task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn' class='task'>
                                                                                <h5 class='font-weight-bold'>" . ($row['task_name']) . "</h5>
                                                                                <input type = 'hidden' id = 'task_id' value = ". $row["task_id"] ." />
                                                                                <div>
                                                                                    <span class='task-id' style='color: #404040;'>Assigned to " . $assignees ."</span>
                                                                                    <br>
                                                                                    <span class='task-id' style='color: #404040;'>Due Date: " . $new_format_date ."</span>
                                                                                    <br>
                                                                                    <p class='text-right'>See Details</p>
                                                                                </div>
                                                                            </a>
                                                                            <select data-live-search='true' class='form-control changeStatus col-sm-8' onchange='location = this.value'>
                                                                                <option class='no-display' selected='selected'>Status</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=4'>TESTING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=5'>DONE</option>
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
                                                    <h4 class="font-weight-bold">DOING</h4>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql3)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    $assignees_arr = array();
                                                                    $getAssignees = getAssignees($task_id);
//                                                                    $nRow = mysqli_fetch_array($getAssignees);
                                                                    while ($nRow = mysqli_fetch_array($getAssignees)){
                                                                    array_push($assignees_arr, $nRow['name']);
                                                                    $assignees = implode($assignees_arr, ", ");}
                                                                    $confirmation = "Are you sure about deleting task?";
                                                                    
                                                                    $due_date = $row['due_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($due_date);

                                                                    // Creating new date format from that timestamp
                                                                    $new_format_date = date("d-m-Y", $timestamp);
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                            <div class='item-action dropdown' align='right' style='position: absolute; right: 5px; top: 5px; z-index: 1;' > 
                                                                                <a id='task-optn' href='#' data-toggle='dropdown' class='text-muted' data-abc='true' > 
                                                                                    <svg xmlns='http://www.w3.org/2000/svg'  color='black' width='25' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-vertical'>
                                                                                        <circle cx='16' cy='12' r='1'></circle>
                                                                                        <circle cx='16' cy='5' r='1'></circle>
                                                                                        <circle cx='16' cy='19' r='1'></circle>
                                                                                    </svg> 
                                                                                </a>
                                                                                <div class='dropdown-menu dropdown-menu-right bg-black' role='menu'> 
                                                                                   
                                                                                    <a href = 'delete_task.php?task_id=".$row['task_id']."&board_id=".$row['board_id']."' class='dropdown-item trash' data-abc='true'>
                                                                                        Delete Task</a>

                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <a href='task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn' class='task'>
                                                                                <h5 class='font-weight-bold'>" . ($row['task_name']) . "</h5>
                                                                                <input type = 'hidden' id = 'task_id' value = ". $row["task_id"] ." />
                                                                                <div>
                                                                                    <span class='task-id' style='color: #404040;'>Assigned to " . $assignees ."</span>
                                                                                    <br>
                                                                                    <span class='task-id' style='color: #404040;'>Due Date: " . $new_format_date ."</span>
                                                                                    <br>
                                                                                    <p class='text-right'>See Details</p>
                                                                                </div>
                                                                            </a>
                                                                            <select data-live-search='true' class='form-control changeStatus col-sm-8' onchange='location = this.value'>
                                                                                <option class='no-display' selected='selected'>Status</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=4'>TESTING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=5'>DONE</option>
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
                                                    <h4 class="font-weight-bold">TESTING</h4>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql4)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    $assignees_arr = array();
                                                                    $getAssignees = getAssignees($task_id);
//                                                                    $nRow = mysqli_fetch_array($getAssignees);
                                                                    while ($nRow = mysqli_fetch_array($getAssignees)){
                                                                    array_push($assignees_arr, $nRow['name']);
                                                                    $assignees = implode($assignees_arr, ", ");}
                                                                    $confirmation = "Are you sure about deleting task?";
                                                                    
                                                                    $due_date = $row['due_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($due_date);

                                                                    // Creating new date format from that timestamp
                                                                    $new_format_date = date("d-m-Y", $timestamp);
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                            <div class='item-action dropdown' align='right' style='position: absolute; right: 5px; top: 5px; z-index: 1;' > 
                                                                                <a id='task-optn' href='#' data-toggle='dropdown' class='text-muted' data-abc='true' > 
                                                                                    <svg xmlns='http://www.w3.org/2000/svg'  color='black' width='25' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-vertical'>
                                                                                        <circle cx='16' cy='12' r='1'></circle>
                                                                                        <circle cx='16' cy='5' r='1'></circle>
                                                                                        <circle cx='16' cy='19' r='1'></circle>
                                                                                    </svg> 
                                                                                </a>
                                                                                <div class='dropdown-menu dropdown-menu-right bg-black' role='menu'> 
                                                                                   
                                                                                    <a href = 'delete_task.php?task_id=".$row['task_id']."&board_id=".$row['board_id']."' class='dropdown-item trash' data-abc='true'>
                                                                                        Delete Task</a>

                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <a href='task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn' class='task'>
                                                                                <h5 class='font-weight-bold'>" . ($row['task_name']) . "</h5>
                                                                                <input type = 'hidden' id = 'task_id' value = ". $row["task_id"] ." />
                                                                                <div>
                                                                                    <span class='task-id' style='color: #404040;'>Assigned to " . $assignees ."</span>
                                                                                    <br>
                                                                                    <span class='task-id' style='color: #404040;'>Due Date: " . $new_format_date ."</span>
                                                                                    <br>
                                                                                    <p class='text-right'>See Details</p>
                                                                                </div>
                                                                            </a>
                                                                            <select data-live-search='true' class='form-control changeStatus col-sm-8' onchange='location = this.value'>
                                                                                <option class='no-display' selected='selected'>Status</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=4'>TESTING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=5'>DONE</option>
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
                                                    <h4 class="font-weight-bold">DONE</h4>
                                                </div>
                                                
                                                    <?php
                                                        if($result = $conn->query($sql5)){
                                                            $projectsCount = $result->num_rows;
                                                            if($projectsCount>0){

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                                    $assignees_arr = array();
                                                                    $getAssignees = getAssignees($task_id);
//                                                                    $nRow = mysqli_fetch_array($getAssignees);
                                                                    while ($nRow = mysqli_fetch_array($getAssignees)){
                                                                    array_push($assignees_arr, $nRow['name']);
                                                                    $assignees = implode($assignees_arr, ", ");}
                                                                    $confirmation = "Are you sure about deleting task?";
                                                                    
                                                                    $due_date = $row['due_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($due_date);

                                                                    // Creating new date format from that timestamp
                                                                    $new_format_date = date("d-m-Y", $timestamp);
                                                                    echo "
                                                                    <div class='card'>
                                                                    <div class='card-body'>
                                                                            <div class='item-action dropdown' align='right' style='position: absolute; right: 5px; top: 5px; z-index: 1;' > 
                                                                                <a id='task-optn' href='#' data-toggle='dropdown' class='text-muted' data-abc='true' > 
                                                                                    <svg xmlns='http://www.w3.org/2000/svg'  color='black' width='25' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-vertical'>
                                                                                        <circle cx='16' cy='12' r='1'></circle>
                                                                                        <circle cx='16' cy='5' r='1'></circle>
                                                                                        <circle cx='16' cy='19' r='1'></circle>
                                                                                    </svg> 
                                                                                </a>
                                                                                <div class='dropdown-menu dropdown-menu-right bg-black' role='menu'> 
                                                                                   
                                                                                    <a href = 'delete_task.php?task_id=".$row['task_id']."&board_id=".$row['board_id']."' class='dropdown-item trash' data-abc='true'>
                                                                                        Delete Task</a>

                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <a href='task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn' class='task'>
                                                                                <h5 class='font-weight-bold'>" . ($row['task_name']) . "</h5>
                                                                                <input type = 'hidden' id = 'task_id' value = ". $row["task_id"] ." />
                                                                                <div>
                                                                                    <span class='task-id' style='color: #404040;'>Assigned to " . $assignees ."</span>
                                                                                    <br>
                                                                                    <span class='task-id' style='color: #404040;'>Due Date: " . $new_format_date ."</span>
                                                                                    <br>
                                                                                    <p class='text-right'>See Details</p>
                                                                                </div>
                                                                            </a>
                                                                            <select data-live-search='true' class='form-control changeStatus col-sm-8' onchange='location = this.value'>
                                                                                <option class='no-display' selected='selected'>Status</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=1'>Backlog Items</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=2'>TO DO</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=3'>DOING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=4'>TESTING</option>
                                                                                <option value='changeStatus.php?task_id=$task_id&board_id=$board_id&tn=$tn&status=5'>DONE</option>
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
                                        
                                        
                                    </div>
                                    
                                    
                                
<!--                                <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModal" aria-hidden="true">-->
<!--
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                
-->
                                                <!-- Modal Header -->
<!--
                                                <div class="modal-header">
                                                  <h3 class="modal-title">Task Details</h3>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                  
-->
                                                <!-- Modal body -->
<!--
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 style="font-weight: bold; color: #d6002f;">Task Details</h5>
                                                            <hr style="width: 60%; margin-left: 0px; border: 1px solid black;">
-->
<!--
                                                            
                                                            <?php
                                                                
                                                                $getTask = getTask($tn);   
                                                                while ($row = mysqli_fetch_array($getTask)) 
                                                                {
                                                                            $tn = $row['project_task_num'];
                                                                    $task_id = $row['task_id'];
                                                            ?>
                                                                <p><?php echo $row['task_name']; ?></p>
                                                            <?php 
                                                                        }
                                                                    
                                                                
                                                                ?>
                                                            
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
-->
                                 
                                
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
