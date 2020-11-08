<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>AgileMaster | Members</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('../navigation/topbar.php');?>
		<?php include('../navigation/user_sidebar.php');?>

		<div class="content-wrapper">
			</br></br>
			<section class="content">
				<div class="container-fluid">		
					<div class="card card-default">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Report Issue</h6>
						</div>
				
						<div class="card-body">
						
							<form action="">
							<div class="row">
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" class="form-control" required="required"/>
									</div>
								</div>
								
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="issue">Issue</label>
										<input type="text" name="issue" id="issue" class="form-control"/>
									</div>
								</div>
			  
			  
								<div class="col-md-6">
									<div class="form-group">
										<label for="description">Description</label>
										<br>
										<textarea id="description" name="description" rows="4" cols="120"></textarea>
									</div>
								</div>
			  
								
							</div>
								<button type="button" class="btn btn-info">Report</button>
							</form>
	
						</div>
						<div class="card-footer">
							Thank you for reporting the issue!
						</div>
					</div>
				</div>
			</section>
		</div>

		<aside class="control-sidebar control-sidebar-dark">
		</aside>
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
		
		