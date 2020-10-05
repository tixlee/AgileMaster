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
  
  <title>AgileMaster | Upload Files</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	</br></br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  
	   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upload Files</h6>
                
            </div>
              
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                  + ADD FILES
                </button>
                <br><br>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
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
                                    <input type="text" name="name" id="file-name" class="form-control" placeholder="File Name" autocomplete="off" required>
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
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >File Name</th>
				        <th >File</th>
						<th >Date Uploaded</th>
                        <th >Delete</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                                $get_AllStorage = get_AllStorage();
                            
                                while($row = mysqli_fetch_array($get_AllStorage))
                                {
                            ?>
                                    <tr class='tbl-link' href="../upload/file_storage/">
										<!--<td> <?php echo $row['name']; ?></td>-->
										
										<?php
											echo "
											    <td ><a class='file-link mg' href='../upload/file_storage/".$row['file']."' download>".$row['name']."</a></td>
												<td><a class='file-link mg' href='../upload/file_storage/".$row['file']."' download>".$row['file']."</a></td>
                                                <td> <a class='file-link mg' href='../upload/file_storage/".$row['file']."' download>".$row['date_uploaded']."</a></td>
                                                
                                                   ";?> 
                                        <?php
                                            $confirmation = "Are you sure about deleting the selected file?";
                                        ?>
                                        <td >
                                                <a href='delete.php?storageid=<?php echo $row['storage_id'];?>'class="trash-button" onclick="return confirm('<?php echo $confirmation; ?>')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>

                                        </a>
                                                </td>
											


                                        <!--<td><?php echo $row['date_uploaded']; ?></td>-->
                                        
                                        
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
<!-- AdminLTE App -->
<!-- <script src="../dependencies/navigation/js/adminlte.js"></script>

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
