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
    date_default_timezone_set("Asia/Kuala_Lumpur");
	$creation_date = date('d-m-Y');
    $created_by = $_SESSION['user_id'];
    
    
    $bug_name = strip_tags($_POST['bug_name']);
    $bug_desc = strip_tags($_POST['bug_desc']);
    $priority = strip_tags($_POST['priority']);
    $state = strip_tags($_POST['state']);
    $due_date = strip_tags($_POST['due_date']);
    $start_date = strip_tags($_POST['start_date']);
    
    $bug_name = mysqli_real_escape_string($conn, $bug_name);
    $bug_desc = mysqli_real_escape_string($conn, $bug_desc);
    $priority = mysqli_real_escape_string($conn, $priority);
    $state = mysqli_real_escape_string($conn, $state);
    $due_date = mysqli_real_escape_string($conn, $due_date);
    $start_date = mysqli_real_escape_string($conn, $start_date);
    
    $assignee = $_POST["user_id"];
    $project_id = $_POST["project_id"];
    
    
    insert_bug_report($bug_name, $bug_desc, $created_by, $project_id, $assignee, $priority, $state, $due_date, $start_date);
    echo "<script>window.location.href ='../user/bug_report.php'</script>";
   
    

}

//$getCreatedBugByUserId = getCreatedBugByUserId($userId);
//$brRow = mysqli_fetch_array($getCreatedBugByUserId);
//
//if(isset($_POST['update'])){
//    $bug_id = $_GET['bug_id'];
//    $state = $_POST['status'];  
//    
//    update_status_bug($bug_id, $state);
//    
//    echo "<script>window.location.href ='../user/bug_report.php'</script>";
//   
//    
//
//}


?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Bugs</title>
	<?php include('../navigation/head.php');?>
    <script src="../dependencies/scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  		  <script>
function getmember(val) {
	$.ajax({
	type: "POST",
	url: "get_member_bug.php",
	data:'member_id='+val,
	success: function(data){
		$("#member-list").html(data);
	}
	});
}
function selectProject(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/user/bug_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br > <br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	    <?php
                        $getProjectByUser = getProjectByUser($userId);
                        $iRow = mysqli_fetch_array($getProjectByUser);
                        
                        
                        $sql = "SELECT * FROM `project` NATURAL JOIN `users`";
                        $result = $conn->query($sql);
		                $bRow = $result->fetch_assoc();
                        $result->free_result();
                    
                    ?>
          
          <div class="col-md-6 " align="left">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                              <i class="fas fa-plus"></i> ADD BUG REPORT
                            </button>
                <br><br>
                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">BUG REPORT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>

                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data">
                                                
                                                <div class="row col-md-12 col-xm-3">
                                                   <label for="bug_name" >Bug Name</label>
                                                    <input type="text" name="bug_name" id="bug_name" class="form-control" placeholder="Bug Name" required autocomplete="off">
                                                    <input type="hidden" name="bug_id" value="<?php $_POST['bug_id']; ?>">
                                                </div>
                                                <br>
                                                <div class="row col-md-12 col-xm-3">
                                                    <label for="bug_desc" class="text-lg">Description</label>
                                                    <textarea class="form-control"  name="bug_desc" id="bug_desc" rows="3" placeholder="Add a more detailed description..."  required=""></textarea>
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
                                                    
                                                    <label for="exampleDropdown" >Priority</label>
                                                    <select data-live-search="true" title="Priority" name="priority" class="form-control selectpicker col-sm-12">
                                                        <option value="Low">Low</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="High">High</option>
                                                    </select>
                                                     
                                                </div>
                                                <br>
                                                <div class="row col-lg-12">
                                                    <label for="exampleDropdown">Select Project: </label>
                                                        <select onChange="getmember(this.value);" data-live-search="true" title="Please select project" name="project_id" id="project_id" class="form-control selectpicker col-sm-12 col-md-12">
                                                                          <?php

                                                                                $getProjectByUser = getProjectByUser($userId);
                                                                                while($row = mysqli_fetch_array($getProjectByUser))
                                                                                {

                                                                                    $getAllProjects = getAllProjects($row['project_id']);
                                                                                    $rRow = mysqli_fetch_array($getAllProjects);
                                                                                    $project_id = $row['project_id'];
                                                                            ?>
                                                                            <option value="<?php echo $row['project_id']; ?>"  required><?php echo $rRow['project_name']; ?> </option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                        <input type = "hidden" id = "project_id" value = "<?php echo $c_fetch['project_id'];?>" />

                                                </div>  
                                                <br>
                                                <div class="row col-md-12 col-xm-6 mb-3 ">
                                                    
                                                    <label for="exampleDropdown" >Assign To</label>
                                                            <select data-live-search="true" name="user_id" id="member-list" class="form-control  col-sm-12">
                                                                   <option value="" >Select Member</option>
                                                                </select>
                                                    <input type="hidden" name="assignee" value="<?php $_POST['assignee']; ?>">
                                                     
                                                </div>
                                                <br>
                                                <div class="row col-md-12 col-xm-6 mb-3 ">
                                                    
                                                    <label for="exampleDropdown" >Status</label>
                                                    <select data-live-search="true" title="Status" name="state" class="form-control selectpicker col-sm-12">
                                                        <option value="Open">Open</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Closed">Closed</option>
                                                    </select>
                                                     
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                    <input type="hidden" name="bug_id" id="bug_id" value="<?php $_POST['task_id']; ?>"/>
                                                    <input type="submit" name="create" value="Create" id="submit-fs" class="btn btn-success" >
                                                </div>
                                            </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
          
          <div class="col-md-12">
              <div class="card">

                   <div class="card-body">
                       <ul class="nav nav-tabs nav-justified" id="myTabMD" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                      <a class="nav-link active font-weight-bold" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Bug Reported By You</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                      <a class="nav-link   font-weight-bold" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Bug Assigned To You</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                      <a class="nav-link   font-weight-bold" id="resolve-tab-md" data-toggle="tab" href="#resolve-md" role="tab" aria-controls="resolve-md" aria-selected="false">Bug Resolved By You</a>
                                    </li>
                                  </ul>
                       
                       <div class="tab-content card pt-3" id="myTabContentMD">
                            <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                                
                                <div class="card-body">
                                <div class="table-responsive">

                            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th >Bug Name</th>
                                        <th >Bug Description</th>
                                        <th >Project Name</th>
                                        <th >Assigned To</th>
                                        <th >Priority</th>
                                        <th >Creation Date</th>
                                        <th >Due Date</th>
                                        <th >Start Date</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getCreatedBugByUserId = getCreatedBugByUserId($userId);
                                        while($bugRow = mysqli_fetch_array($getCreatedBugByUserId))
                                        {
                                            $assignee = $bugRow['assignee'];
                                            $project_id = $bugRow['project_id'];
                                            $getAssigneeBugByUserId = getAssigneeBugByUserId($assignee);
                                            $assigneeRow = mysqli_fetch_array($getAssigneeBugByUserId);
                                            
                                            $getProjectBugByUserId = getProjectBugByUserId($project_id);
                                            $projbugRow = mysqli_fetch_array($getProjectBugByUserId);
                                            
                                    ?>
                                    <tr>
                                        <td > 
                                            <?php echo $bugRow['bug_name'];?>
                                        </td>


                                        <td >
                                            <?php echo $bugRow['bug_desc'];?>
                                        </td>

                                        <td >
                                            <?php echo $projbugRow['project_name'];?>
                                        </td>

                                        <td >
                                            <?php echo $assigneeRow['name'];?>
                                        </td>
                                        
                                        <td >
                                            <?php echo $bugRow['priority'];?>
                                        </td>
                                        
                                        <td >
                                            <?php echo $bugRow['creation_date'];?>
                                        </td>
                                        
                                        <td >
                                            <?php echo $bugRow['due_date'];?>
                                        </td>
                                        
                                        <td >
                                            <?php echo $bugRow['start_date'];?>
                                        </td>
                                        
                                        <td >
                                            <?php echo $bugRow['state'];?>
                                        </td>
                                        
                                    </tr>
                                    <?php 
                                            
                                        }
                                    ?>
                                </tbody>

                            </table>

                        </div>    
                        </div>    
                            
                    </div>
                    
                    <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                        <div class="card-body">
                             <div class="table-responsive">

                            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th >Bug Name</th>
                                        <th >Bug Description</th>
                                        <th >Project Name</th>
                                        <th >Created By</th>
                                        <th >Priority</th>
                                        <th >Creation Date</th>
                                        <th >Due Date</th>
                                        <th >Start Date</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAssignedBugByUserId = getAssignedBugByUserId($userId);
                                        while($buugRow = mysqli_fetch_array($getAssignedBugByUserId))
                                        {
                                            $created_by = $buugRow['created_by'];
                                            $getBugByUserId = getBugByUserId($created_by);
                                            $assignedRow = mysqli_fetch_array($getBugByUserId);
                                            
                                            
                                    ?>
                                    <tr >
                                        
                                            <td > 
                                                <?php echo $buugRow['bug_name'];?>
                                            </td>


                                            <td >
                                                <?php echo $buugRow['bug_desc'];?>
                                            </td>
                                            
                                            <td >
                                                <?php echo $projbugRow['project_name'];?>
                                            </td>

                                            <td >
                                                <?php echo $assignedRow['name'];?>
                                            </td>

                                            <td >
                                                <?php echo $buugRow['priority'];?>
                                            </td>

                                            <td >
                                                <?php echo $buugRow['creation_date'];?>
                                            </td>

                                            <td >
                                                <?php echo $buugRow['due_date'];?>
                                            </td>

                                            <td >
                                                <?php echo $buugRow['start_date'];?>
                                            </td>

                                            <td >
                                                <select name="status" id="status" class="form-control changeStatusBug selectpicker" onchange='location = this.value'>
                                                    <option value="changeStatusBug.php?bug_id=<?php echo $buugRow['bug_id'];?>&state=Open" <?php if($buugRow['state']=="Open") echo 'selected="selected"'; ?>>Open</option>
                                                    <option value="changeStatusBug.php?bug_id=<?php echo $buugRow['bug_id'];?>&state=In Progress" <?php if($buugRow['state']=="In Progress") echo 'selected="selected"'; ?>>In Progress</option>
                                                    <option  value="changeStatusBug.php?bug_id=<?php echo $buugRow['bug_id'];?>&state=Closed" <?php if($buugRow['state']=="Closed") echo 'selected="selected"'; ?>>Closed</option>
                                                </select>
                                            </td>

                                           
                                    </tr>
                                    <?php 
                                            
                                        }
                                    ?>
                                </tbody>

                            </table>

                        </div>           
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="resolve-md" role="tabpanel" aria-labelledby="resolve-tab-md">
                        <div class="card-body">
                             <div class="table-responsive">

                            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th >Bug Name</th>
                                        <th >Bug Description</th>
                                        <th >Project Name</th>
                                        <th >Created By</th>
                                        <th >Priority</th>
                                        <th >Creation Date</th>
                                        <th >Due Date</th>
                                        <th >Start Date</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getResolvedBugByUserId = getResolvedBugByUserId($userId);
                                        while($buuggRow = mysqli_fetch_array($getResolvedBugByUserId))
                                        {
                                            $created_by = $buuggRow['created_by'];
                                            $getBugByUserId = getBugByUserId($created_by);
                                            $assignedRow = mysqli_fetch_array($getBugByUserId);
                                            
                                            
                                    ?>
                                    <tr >
                                        
                                            <td > 
                                                <?php echo $buuggRow['bug_name'];?>
                                            </td>


                                            <td >
                                                <?php echo $buuggRow['bug_desc'];?>
                                            </td>
                                            
                                            <td >
                                                <?php echo $projbugRow['project_name'];?>
                                            </td>

                                            <td >
                                                <?php echo $assignedRow['name'];?>
                                            </td>

                                            <td >
                                                <?php echo $buuggRow['priority'];?>
                                            </td>

                                            <td >
                                                <?php echo $buuggRow['creation_date'];?>
                                            </td>

                                            <td >
                                                <?php echo $buuggRow['due_date'];?>
                                            </td>

                                            <td >
                                                <?php echo $buuggRow['start_date'];?>
                                            </td>

                                            <td >
                                                <?php echo $buuggRow['state'];?>
                                            </td>

                                           
                                    </tr>
                                    <?php 
                                            
                                        }
                                    ?>
                                </tbody>

                            </table>

                        </div>           
                        </div>
                    </div>       
                           
                        
                  </div>
                </div>
            </div>
            </div>
      </div>
    </section>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 </div> </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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
<script>
$(document).ready(function() {
    $('table#dataTables').DataTable( {
        fixedHeader: {
            header: true,
            footer: true
        }
    } );
} );
</script>
</body>
</html>
