<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';


    
if(isset($_POST['report'])){
   
    date_default_timezone_set("Asia/Kuala_Lumpur");
	$creation_date = date('d-m-Y');
    
    $name = strip_tags($_POST['name']);
    $issue_name = strip_tags($_POST['issue_name']);
    $desc = strip_tags($_POST['desc']);
    
    
    
    $name = mysqli_real_escape_string($conn, $name);
    $issue_name = mysqli_real_escape_string($conn, $issue_name);
    $desc = mysqli_real_escape_string($conn, $desc);

    insert_issue($name, $issue_name, $desc);
    echo "<script>alert('Thank you for reporting the issue!');</script>";
    echo "<script>window.location.href ='../user/reportissue.php'</script>";
   
}


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
			<br><br>
			<section class="content">
				<div class="container-fluid">		
					<div class="card shadow mb-4">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold" style="color: #990021;">Report Issue</h3>
                                        
                            </div>
                            <div class="card-body">
						
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" >Name </label>
                                                <input type="text" name="name" id="name" placeholder="Full Name"  class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="issue_name" >Issue </label>
                                                <input type="text" name="issue_name" id="issue_name" placeholder="Issue"  class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desc" >Description </label>
                                                <textarea type="text" class="md-textarea form-control"  id="desc" name="desc" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <input type="submit" name="report" value="Report" id="submit-fs" class="btn btn-success" >
                                    </div>
                                    
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
		
		