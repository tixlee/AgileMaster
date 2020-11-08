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
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('../navigation/topbar.php');?>
		<?php include('../navigation/user_sidebar.php');?>

		<div class="content-wrapper">
			</br></br>
			<section class="content">
				<div class="container-fluid">
	  
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Members List</h6>
						</div>
              
						<div class="card-body">
						<!-- 	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
							Invite
							</button>
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
									
									<div class="modal-content">
										<div class="modal-header">
											<h3>Send Invitation</h3>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form method="post" action="invitation.php" name="sendinvitation">
												<label for="email">Email Address: 
													<input text="email" id="email" name="email" class="form-control">
												</label>
												<button type="submit" name="submit" class="input-group-text btn_2" id="basic-addon2">Invite</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div> 
							<br><br> -->
							
							<div class="table-responsive">
								<table class="table table-bordered" id="example" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th >Member Name</th>
											<th >Member Email</th>
											<th >Role</th>
										</tr>
									</thead>
                  
									<tbody>
										<?php 
											$getAllRegistered = getAllRegistered();
											if(mysqli_num_rows($getAllRegistered) > 0) {
												while($row = mysqli_fetch_array($getAllRegistered))
												{
														
												?>
										<tr>
											<td>
												<?php echo $row['name']; ?>
											</td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['role']; ?></td>
                            
											<?php
												$confirmation = "Are you sure about deleting the user?";
											?>
                      
										</tr>
											<?php
												}
											} else
												{ ?>
													<tr>
														<td colspan="9" style="text-align: center;">No records found.</td>
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


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
	} );
	</script>

</body>
</html>
