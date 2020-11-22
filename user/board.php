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
	<?php include('../navigation/user/board_sidebar.php');?>

	<div class="content-wrapper">
		<br><br>
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
                            </div>
                            <div class="card-body">
                                <?php
                                    $query = $conn->query("SELECT * FROM `board`NATURAL JOIN `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                    while($b_query = $query->fetch_array())
                                    {
                                ?>
								
                                <div class="table-responsive">
									<table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Board Name</th>
												<th><center>View Board</center></th>
											</tr>
										</thead>
                                            
										<tbody>
											<?php
                                                $query = $conn->query("SELECT * FROM `board` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                                                while($b_query = $query->fetch_array()){
                                                    
											?>
											<tr>
												<td> 
													<?php echo $b_query['board_name']?>
												</td>
                                                                
												<td>
													<center>
														<a  href="task.php?board_id=<?php echo $b_query['board_id']; ?>" class = "btn btn-success " >
															View
														</a>
													</center>
												</td>          
											</tr> 
											<?php
												}	
                                            ?>
										</tbody>
									</table>
                                 </div>
                                           
                                <?php
									}
                                ?>
                            </div>  
                        </div>
                    </div>
                    
                    <?php 
                            
                        }
                    ?>
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
