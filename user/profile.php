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

        <?php include('../navigation/user/user_sidebar.php');?>

        <div class="content-wrapper">
            
            <br > <br >

            <section class="content">
                
                <div class="container-fluid">
                    
                
                    
                    <?php 
                        
                        $get_user = get_user($userId);
		                $uRow = mysqli_fetch_array($get_user);
                    ?>
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title font-weight-bold">Profile</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               
                                <section class="board-tabs mx-2 pb-3">
                                  <div class="table-responsive">
                                            
                                            <table class="table " id="table" width="100%" cellspacing="0" border="0" style="text-align: center;" >
                                                    <thead>
                                                        <tr><center><strong>Your Personal Information</strong></center></tr>
                                                        <br>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td><?php echo $uRow['name']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email:</td>
                                                            <td><?php echo $uRow['email']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Role:</td>
                                                            <td><?php echo $uRow['role']; ?></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                        </div>
                                </section>
                                
                            </div>  
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    
                    
                    
                </div>
            </section>


          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
        </div> 
    </div>

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
