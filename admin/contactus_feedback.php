<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';


if(isset($_POST['upload']))
{	

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date_uploaded = date('d-m-Y');

	$name = strip_tags($_POST['name']);
	$name = mysqli_real_escape_string($conn, $name);


	$fileCount = count($_FILES['file']['name']);
		for($i=0; $i<$fileCount; $i++){
		
			$fileName = $_FILES['file']['name'][$i];
			$target_dir = "../upload/file_storage/";


			$check_storagename= check_storagename($fileName);
			$rowcount=mysqli_num_rows($check_filename);

			if($rowcount == 0)

			{	
				insert_storage($date_uploaded, $name, $fileName);
				move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
				header('location: upload_files.php');
			}

			else
			{
				?>
					<script>
						alert("File name has been taken, please change file name and try again.");
					</script>
				<?php
			}		
		}
}

?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | User Contact Us Form</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar_admin.php');?>

  <?php include('../navigation/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	</br></br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Contact Us Feedback</h6>
                
            </div>
              
            <div class="card-body">
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >User Name</th>
				        <th >User Email</th>
						<th >Subject</th>
						<th >Comment</th>
                        <th ></th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                                $getAllFeedbackForm = getAllFeedbackForm();
                            if(mysqli_num_rows($getAllFeedbackForm) > 0) {
                                while($row = mysqli_fetch_array($getAllFeedbackForm))
                                {
                                    
						?>
                    <tr>

                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
							<td><?php echo $row['comment']; ?></td>
                            
                            <td >
                                    <a href='delete.php?storageid=<?php echo $row['storage_id'];?>'class="trash-button" onclick="return confirm('<?php echo $confirmation; ?>')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>

                                        </a>
                            </td>
                      
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
	  
	  
        
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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