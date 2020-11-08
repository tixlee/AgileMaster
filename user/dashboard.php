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
	<title>AgileMaster | Dashboard</title>
	<?php include('../navigation/head.php');?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('../navigation/topbar.php');?>
		<?php include('../navigation/user_sidebar.php');?>
		<div class="content-wrapper">
			<br><br>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
	   
						<div class="col-lg-3 col-6">
							<div class="small-box bg-primary">
								<div class="inner">
									<h3><?php 
											$accounts = getProjectByUser($userId);
											echo mysqli_num_rows($accounts); 
											?></h3>
									<p>Total Projects</p>
								</div>
								<div class="icon">
									<i class="fas fa-project-diagram"></i>
								</div>
								<a href="project.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						<div class="col-lg-3 col-6">
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php 
											$accounts = getProjectByUser($userId);
											echo mysqli_num_rows($accounts); 
											?></h3>
									<p>Total Boards</p>
								</div>
								<div class="icon">
									<i class="fab fa-trello"></i>
								</div>
								<a href="board.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<div class="col-lg-3 col-6" >
							<div class="small-box bg-danger">
								<div class="inner" style="color: white;">
									<h3><?php 
										$accounts = getProjectByUser($userId);
										echo mysqli_num_rows($accounts); 
										?></h3>
									<p>Total Due Dates</p>
								</div>
								<div class="icon">
									<i class="far fa-calendar-alt"></i>
								</div>
								<a href="../calendar/index.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						<div class="col-lg-3 col-6">
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?php 
										$accounts = getProjectByUser($userId);
										echo mysqli_num_rows($accounts); 
										?></h3>
									<p>Bug To Be Fixed</p>
								</div>
								<div class="icon">
									<i class="fas fa-bug"></i>
								</div>
								<a href="bug_report.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
			  <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-primary text-uppercase  mb-1">Total Projects</div>
					  <br>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $accounts = getProjectByUser($userId);
                            echo mysqli_num_rows($accounts); 
                          ?>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
			

            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-success text-uppercase mb-1">Total Boards</div>
					  <br>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $pmccounts = getAllProjectManagerAccounts();
                            echo mysqli_num_rows($pmccounts); 
                          ?>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">Project Member Accounts</div>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $pmemccounts = getAllProjectMemberAccounts();
                            echo mysqli_num_rows($pmemccounts); 
                          ?>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Total Bug To Be Fixed</div>
					  <br>
                      <div class="h2 mb-0 font-weight-bold text-right text-gray-800">
                          <?php 
                            $feedbackform = getAllFeedbackForm();
                            echo mysqli_num_rows($feedbackform); 
                          ?>
                     </div>
                    </div>
                    </div>
                </div>
              </div>
            </div> -->
			
			
					</div>
                    
                    
                    
                    
                    
                    <div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold">Tasks Assigned To You</h6>
						</div>
              
						<div class="card-body">
							<div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							
                                    <thead>
                                    <tr>
                                        <th >Task Name</th>
                                        <th >Task Description</th>
                                        <th >Board Name</th>
                                        <th >Project Name</th>
                                        <th >Assigned To</th>
                                        <th >Due Date</th>
                                        <th >Start Date</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAssigneesName = getAssigneesName($userId);
                                        while($asRow = mysqli_fetch_array($getAssigneesName))
                                        {
                                            $task_id = $asRow['task_id'];
                                            $assignees_arr = array();
                                            $getAssignees = getAssignees($task_id);
                                            while ($nRow = mysqli_fetch_array($getAssignees)){
                                                array_push($assignees_arr, $nRow['name']);
                                                $assignees = implode($assignees_arr, ", ");
                                            }
                                            
                                            
                                    ?>
                                    <tr >
                                        
                                            <td > 
                                                <?php echo $asRow['task_name'];?>
                                            </td>


                                            <td >
                                                <?php echo $asRow['task_desc'];?>
                                            </td>

                                            <td >
                                                <?php echo $asRow['board_name'];?>
                                            </td>

                                            <td >
                                                <?php echo $asRow['project_name'];?>
                                            </td>
                                        
                                            <td >
                                                <?php echo $assignees;?>
                                            </td>

                                            <td >
                                                <?php echo $asRow['due_date'];?>
                                            </td>

                                            <td >
                                                <?php echo $asRow['start_date'];?>
                                            </td>

                                            <td >
                                               <?php
                                                    $status = $asRow['state'];

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
                                    <?php 
                                            
                                        }
                                    ?>
                                </tbody>
                                    
								</table>
							</div>
						</div>
					</div>
                    
                    
                    
                    
		  
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold">Bug To Be Fixed</h6>
						</div>
              
						<div class="card-body">
							<div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							
                                    <thead>
                                    <tr>
                                        <th >Bug Name</th>
                                        <th >Bug Description</th>
                                        <th >Creayed By</th>
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
                                               <?php echo $buugRow['state'];?>
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
			</section>
  
			<aside class="control-sidebar control-sidebar-dark">
   
			</aside>
		</div> 
	</div>


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
