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


if(isset($_POST['upload']))
{	
    $project_id = $_POST['project_id'];
//    $user_id = $_POST['user_id'];
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date_uploaded = date('d-m-Y');

	$file_name = strip_tags($_POST['file_name']);
	$document_type = strip_tags($_POST['document_type']);
	$file_name = mysqli_real_escape_string($conn, $file_name);
	$document_type = mysqli_real_escape_string($conn, $document_type);


	$fileCount = count($_FILES['file']['name']);
		for($i=0; $i<$fileCount; $i++){
		
			$fileName = $_FILES['file']['name'][$i];
			$target_dir = "../upload/file_storage/";


			$check_storagename= check_storagename($fileName);
			$rowcount=mysqli_num_rows($check_filename);

			if($rowcount == 0)

			{	
				insert_storage($date_uploaded, $file_name, $fileName, $document_type, $project_id, $userId);
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
  
  <title>AgileMaster | Upload Files</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/user/upload_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br ><br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	   <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                  Upload File
                </button>
                <br><br>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
				    
                                <div class="row col-md-12 col-xm-3">
                                    <input type="text" name="file_name" id="file-name" class="form-control" placeholder="File Name" autocomplete="off" required>
                                </div>
                                <br>
                                
                                
                                
                                <div class="row col-lg-12">
                                            <label for="exampleDropdown">Select Project: </label>
                                                <select data-live-search="true" title="Please select member" name="project_id" class="form-control selectpicker col-sm-12 col-md-12">
                                                                  <?php
                                                    
                                    $getProjectByUser = getProjectByUser($userId);
                                    while($row = mysqli_fetch_array($getProjectByUser))
                                    {

                                        $getAllProjects = getAllProjects($row['project_id']);
                                        $rRow = mysqli_fetch_array($getAllProjects);
                                        $project_id = $row['project_id'];
                                ?>
                                                                    <option value="<?php echo $row['project_id']; ?>" <?php if ($project_id == $row['project_id']) {echo "selected";} ?> required><?php echo $rRow['project_name']; ?> </option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <input type = "hidden" id = "project_id" value = "<?php echo $c_fetch['project_id'];?>" />
                                                           
                                </div>     
                                 <input type = "hidden" id="user_id" name="user_id" value = "<?php echo $row['user_id'];?>" />
                                <br>
                                
                                <div class="row col-lg-12">
                                            <label for="exampleDropdown">Document Type:</label>
                                                <select data-live-search="true" title="Please select member" name="document_type" class="form-control selectpicker col-sm-12 col-md-12">
                                 
                                                                    <option value="Design" >Design</option>
                                                                    <option value="Implementation" >Implementation</option>
                                                                    <option value="Testing" >Testing</option>
                                                                    <option value="Reports" >Reports</option>
                                                                    <option value="Others" >Others</option>
                                                                    
                                                                </select>
                                                           
                                </div>    
                                
                                <br>
                                
                                <div class="row col-md-10 col-xm-6">
                                    <input type="file" name="file[]" class="custom-fs-input" id="custom-fs-input" required>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <input type="button" name="submit" value="Back" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                    <input type="submit" name="upload" value="Upload" id="submit-fs" class="btn btn-success" >
                                </div>
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
          
        <?php 
                        $getProjectByUser = getProjectByUser($userId);
                        
                        while($row = mysqli_fetch_array($getProjectByUser))
                        {
                            
                          $getAllProjects = getAllProjects($row['project_id']);
                          $rRow = mysqli_fetch_array($getAllProjects);
                          $project = $row['project_id'];
                    ?>
          
	   <div class="card shadow mb-4">
            <div class="card-header">
                                <h1 class="card-title font-weight-bold"  style="color: #990021;">Project Name: <?php echo $rRow['project_name']; ?></h1>
                                <input type = "hidden" id = "project_id" value = "<?php echo $a_fetch['project_id'];?>" />
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                            </div>
              
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >File Name</th>
				        <th >File</th>
						<th >Document Type</th>
						<th >Uploaded By</th>
						<th >Date Uploaded</th>
						<th >Download</th>
                        <th >Delete</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                                
//                            $getProjects = getProjects();
//                            $pRow = mysqli_fetch_array($getProjects);
//                            $project_id = $pRow['project_id'];
//                                        
//                     
//                            $getStorageInfo = getStorageInfo();
//                            $fRow = mysqli_fetch_array($getStorageInfo);
//                            $getStorageInfoProject = getStorageInfoProject($userId);
//                            
//                            while($oRow = mysqli_fetch_array($getStorageInfoProject))
//                            {
//                            $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$row[project_id]'") or die(mysqli_error());
//                            $u_fetch = $u_query->fetch_array();
//                            
                            $query = $conn->query("SELECT * FROM `file_storage` NATURAL JOIN `project` NATURAL JOIN `users` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
                            while($b_query = $query->fetch_array())
                            {
                                
                    ?>
                                    <tr class='tbl-link' href="../upload/file_storage/">
										
                                        <td><?php echo $b_query['file_name']?></td>
								        <td><?php echo $b_query['file']?></td>
										<td><?php echo $b_query['document_type']?></td>
										<td>
                                            <?php 
                                                if($b_query['user_id'] == $userId)
                                                {
                                                    echo 'You';
                                                }else{
                                                    echo $b_query['name']; 
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $b_query['date_uploaded']?></td>
                                        
                                        
										<?php
											echo "
											    
                                                <td> 
                                                    <center>
                                                        <a class='file-link mg btn btn-success' href='../upload/file_storage/".$b_query['file']."' download>Download</a>
                                                    </center>
                                                </td>
                                                
                                                   ";?> 
                                        <?php
                                            $confirmation = "Are you sure about deleting the selected file?";
                                        ?>
                                        <td >
                                            <?php 
                                                if($b_query['user_id'] == $userId)
                                                {
                                            ?>
                                            <center>
                                                <a href='delete_file_storage.php?storageid=<?php echo $fRow['storage_id'];?>'class="trash-button btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </center>
                                            <?php } ?>
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
	  
        <?php
                                }	
                            ?>
        
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
