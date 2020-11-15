<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';


?>

<!DOCTYPE html>
<html>
<head>
  
  <title>AgileMaster | Dashboard</title>
	<?php include('../navigation/head.php');?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar_admin.php');?>

  <?php include('../navigation/admin_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br > <br >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
	   
          <div class="card">
           <div class="card-header py-3">
               <h5 class="m-0 font-weight-bold " style="color: #990021;">Feedback Survey</h5>
           </div>
                            
                            <div class="card-body">
							<div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Email</th>
                                        <th >Role</th>
                                        <th >Major</th>
                                        <th >Understanding</th>
                                        <th >Experience</th>
                                        <th >Like UI</th>
                                        <th >Navigation Features</th>
                                        <th >Process Flow</th>
                                        <th >Tools Provided</th>
                                        <th >Linkage</th>
                                        <th >Rate System</th>
                                        <th >Recommend</th>
                                        <th >Like Most</th>
                                        <th >Like Least</th>
                                        <th >Improvement</th>
                                        <th >Proposed Feature</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $getAllFeedbackForm = getAllFeedbackForm();
                                        while($feedRow = mysqli_fetch_array($getAllFeedbackForm))
                                        {
                                            
                                            
                                    ?>
                                    <tr >
                                        
                                            <td > 
                                                <?php echo $feedRow['name'];?>
                                            </td>


                                            <td >
                                                <?php echo $feedRow['email'];?>
                                            </td>

                                            <td >
                                                <?php echo $feedRow['role'];?>
                                            </td>

                                            <td >
                                                <?php echo $feedRow['major'];?>
                                            </td>

                                            <td >
                                                <?php echo $feedRow['understanding'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                   echo $feedRow['experience'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['like_ui'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['navigation_feature'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['process_flow'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['tools_provided'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['linkage'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['rate'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['recommend'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['like_most'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['like_least'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['improve'];?>
                                            </td>
                                        
                                            <td >
                                               <?php
                                                    echo $feedRow['new_feature'];?>
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
