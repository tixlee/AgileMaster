
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
  


if(isset($_POST['save'])){
    $board_id = $_GET['board_id'];
    
    $completion_date = $_POST["completion_date"];
    $task_id = $_GET['task_id'];

    $tn = $_GET['tn'];
    
    insert_completion_date($tn, $completion_date);
    echo "<script>window.location.href ='../user/task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn'</script>";
   
 

}


if(isset($_POST['assign'])){
    $board_id = $_GET['board_id'];
 
    $user_id = $_POST["user_id"];
    $task_id = $_GET['task_id'];

    $tn = $_GET['tn'];
    
    insert_more_task_assignees($user_id, $task_id);
    echo "<script>window.location.href ='../user/task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn'</script>";
   
 

}



if(isset($_POST['post'])){
    $board_id = $_GET['board_id'];
     date_default_timezone_set("Asia/Kuala_Lumpur");
	$creation_date = date('d-m-Y');
    $user_id = $_SESSION['user_id'];
    $task_id = $_GET['task_id'];
    $comment = $_POST['comment'];
    $comment_id = $_POST['comment_id'];
    $tn = $_GET['tn'];
    insert_comment_task($user_id, $task_id, $comment);
    echo "<script>window.location.href ='../user/task_details.php?task_id=$task_id&board_id=$board_id&tn=$tn'</script>";
   
 

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
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center" style="font-weight: bold; color: #d6002f;">TASK DETAILS</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h1 class="card-title font-weight-bold" >Board Name:&nbsp;</h1><h1 class="card-title font-weight-bold" style=" color: #d6002f;"><?php echo $bRow['board_name']; ?> </h1>
                                <button onclick="location.href='task.php?board_id=<?php echo $board_id ?>'" class="btn btn-info " style="float: right;">BACK TO REQUIREMENTS</button>
                            </div>  
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class=" font-weight-bold" style="color: #d6002f;" >TASK DETAILS</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="text-lg font-weight-bold">
                                            Task Name:  <?php echo $row['task_name'];?>
                                        </div>
                                        <br>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group shadow-textarea">
                                                <label for="task_desc" class="text-lg">Description</label>
                                                <textarea class="form-control"  name="task_desc" id="task_desc" rows="3" readonly><?php echo $row['task_desc']; ?></textarea>
                                            </div>
                                        </form>
                                    </div>  
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="font-weight-bold" style="color: #d6002f;" >STATUS</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
                                        
                                        
                                        
                                         <div class="table-responsive">
                                            
                                            <table class="table " id="table" width="100%" cellspacing="0">
                                                    
                                                    <tbody>
                                                
                                                        <tr>
                                                            <td> <strong> Status:  </strong></td>
                                                            
                                                            <td>
                                                                    <?php
                                                    $status = $row['state'];

                                                    switch ($status) {
                                                        case 1:
                                                            echo "Pending";
                                                            break;
                                                        case 2:
                                                            echo "TO DO";
                                                            break;
                                                        case 3:
                                                            echo "DOING";
                                                            break;
                                                        case 4:
                                                            echo "TESTING";
                                                            break;
                                                        case 5:
                                                            echo "DONE";
                                                            break;
                                                    }
                                                ?>
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>
                                                                <strong> Due Date:  </strong>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $due_date = $row['due_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($due_date);

                                                                    // Creating new date format from that timestamp
                                                                    $new_format_date = date("d-m-Y", $timestamp);
                                                                    echo $new_format_date;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>
                                                                <strong> Start Date:  </strong>
                                                            </td>
                                                            <td>
                                                               <?php
                                                                    $start_date = $row['start_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($start_date);

                                                                    // Creating new date format from that timestamp
                                                                    $start_format_date = date("d-m-Y", $timestamp);
                                                                    echo $start_format_date;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>
                                                                <strong> Completion Date:  </strong>
                                                            </td>
                                                            <td>
                                                                <?php
                                                    
                                                                    $completion_date = $row['completion_date'];
                                                                    // Creating timestamp from given date
                                                                    $timestamp = strtotime($completion_date);

                                                                    // Creating new date format from that timestamp
                                                                    $completion_format_date = date("d-m-Y", $timestamp);

                                                                    if($row['completion_date'] != NULL){
                                                                        echo $completion_format_date;
                                                        
                                                                    }else{
                                                                        
                                                                ?>
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                 
                                                                        <input class="form-control col-md-10" type="date" name="completion_date" id="completion_date" required="" style="float: left;"/>
                                                                   
                                                                   <input type="submit" name="save" value="Save" id="submit-fs" class="btn btn-success" style="float: right;"> 
                                                                </form>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                        </div>
                                        
                                        
                                      
                                        
                                    </div>  
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class=" font-weight-bold"  style="color: #d6002f;" >ASSIGNEES</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
                                        <br>
                                        
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row col-md-6 col-xm-6 mb-3 ">
                                                <label for="exampleDropdown" ></label>
                                                <select data-live-search="true" title="Assign To....." name="user_id" class="form-control selectpicker col-sm-7">
                                                                    <?php
                                                                        $user_id = $_GET['user_id'];
                                                                        $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '$bRow[project_id]'") or die(mysqli_error());
                                                                        while($f_query = $query->fetch_array())
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $f_query['user_id']; ?>" <?php if ($user_id == $f_query['user_id']) {echo "selected";} ?> required><?php echo $f_query['name']; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                     <input type="submit" name="assign" value="Assign" id="submit-fs" class="btn btn-success" >  
                                               
                                            </div>
                                            
                                        </form>
                                        
                                        
                                       <br>
                                        
                                        <div class="table-responsive">
                                            
                                            <table class="table " id="table" width="100%" cellspacing="0">
                                                    
                                                    <tbody>
                                                        <?php 
                                                            $task_id = $row['task_id'];
                                                            $getAssignees = getAssignees($task_id);
                    //                                        $uRow = mysqli_fetch_array($getAssignees);
                                                            while($nRow = mysqli_fetch_array($getAssignees)){


                                                        ?>
                                                        <tr>
                                                            <td ><div class="" value = "<?php echo $nRow['user_id'];?>"><?php echo $nRow['name']?></div></td>
                                                            <?php
                                                                
                                                                $confirmation = "Are you sure to delete this member?";
                                                            ?>
                                                            <td><a  href = "delete_assignees.php?user_id=<?php echo $nRow['user_id']?>&task_id=<?php echo $row['task_id']?>&board_id=<?php echo $row['board_id']?>&tn=<?php echo $row['project_task_num']?>" class = "btn btn-danger " ><span class = "glyphicon glyphicon-trash"></span> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                                           
                                                        </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                        </div>
                                        
                                       
                                       <br>
                                       
                                        
                                        
                                    </div>  
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class=" font-weight-bold"  style="color: #d6002f;" >COMMENTS</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                       <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group" name="comment">
                                             <textarea name="comment" id="comment" class="form-control" placeholder="Write a Comment..." rows="3"></textarea>
                                            </div>
                                            <div class="form-group text-right" >
                                             <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                             <input type="submit" name="post" value="Post" id="submit-fs" class="btn btn-success"/>
                                            </div>

                                       </form>
                                        
                                        
                                        <hr>
                                        
                                        <?php
                                        
                                            $getCommentTask = getCommentTask($task_id);
                                            $total_projects = mysqli_num_rows($getCommentTask);
                                            if ($total_projects > 0){
                                            while($vRow = mysqli_fetch_array($getCommentTask)){
                                        ?>
                                        
                                        <div class="card">
                                            <div class="card-header">
                                                <?php echo $vRow['name'] ?>
                                            </div>
                                            
                                            <div class="card-body">
                                                <?php echo $vRow['comment']; ?>
                                            </div>
                                            <div class="card-footer font-weight-bold text-right">
                                                Posted on <?php echo $vRow['creation_date']; ?>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <?php 
                                                }
                                            }else{
                                                echo '<div class="text-center font-weight-bold">No Comment Found!</div>';
                                            }
                                        ?>
                                        
                                    </div>  
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        
                        
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
