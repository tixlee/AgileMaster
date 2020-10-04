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
<html lang="en">

<head>
  
    <?php include('../head/head.php'); ?>
    <title>Dashboard</title>
</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<?php include('../navigation/side_nav.php');?>
      <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
<?php include('../navigation/top_nav.php');?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <br><br>
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Members</h6>
                
            </div>
              
            <div class="card-body">
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >Member Name</th>
				        <th >Member Email</th>
						<th >Role</th>
                        <th ></th>
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
            
           
            
        </div>
        </div>
        </div>
    </div>
    
        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
    
    <!-- Bootstrap core JavaScript-->
  <script src="../dependencies/vendor/jquery/jquery.min.js"></script>
  <script src="../dependencies/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
    
</body>
</html>
