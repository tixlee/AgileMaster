<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>AgileMaster | Projects</title>
	<?php include('../navigation/head.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar_admin.php');?>

  <?php include('../navigation/project_adminsidebar.php');?>

	<div class="content-wrapper">
		<br><br>
		<section class="content">
			<div class="container-fluid">
          
				<div class="card">
					<div class="card-header py-3">
						<h5 class="m-0 font-weight-bold " style="color: #990021;">Projects</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
                                    <tr>
                                        <th >Project Name</th>
                                        <th >Project Description</th>
                                        <th >Project Members</th>
                                        <th >Project Manager</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAllProjectsAdmin = getAllProjectsAdmin();
                                        while($asRow = mysqli_fetch_array($getAllProjectsAdmin))
                                        {
                                            $project_id = $asRow['project_id'];
                                            $assignees_arr = array();
                                            
                                            $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$asRow[project_id]'") or die(mysqli_error());
                                            $u_fetch = $u_query->fetch_array();
                                            
//                                            $getBoardsProjectInAdmin = getBoardsProjectInAdmin($project_id);
                                            $getMembersProjectInAdmin = getMembersProjectInAdmin($project_id);
                                            while ($nRow = mysqli_fetch_array($getMembersProjectInAdmin)){
                                                array_push($assignees_arr, $nRow['name']);
                                                $assignees = implode($assignees_arr, ", ");
                                                
                                                $query = $conn->query("SELECT * FROM `users` NATURAL JOIN `user_project` NATURAL JOIN `project` WHERE `user_id` = '$u_fetch[user_id]'") or die(mysqli_error());
                                                $b_query = $query->fetch_array();
                                            }
                                            
                                            
                                    ?>
                                    <tr>
										<td> 
											<?php echo $asRow['project_name'];?>
										</td>

										<td> 
											<?php echo $asRow['project_description'];?>
										</td>

										<td>
											<?php echo $assignees;?>
										</td>
                                        
										<td>
											<?php echo $b_query['name'];?>
										</td>
                                        
										<td>
											<?php echo $asRow['status'];?>
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

<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>  
<script src="../dependencies/navigation/js/adminlte.js"></script>

</body>
</html>
