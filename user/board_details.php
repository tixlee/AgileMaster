<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
}


                         

if(isset($_POST['add'])){
    
//    $userid = $_POST['user_id'];
//    $project_id = $_POST['project_id'];
//    insert_member_project($userid, $project_id);
    
    $user_id = $_POST['user_id'];
	$project_id = $_GET['project_id'];
//	$conn->query("INSERT INTO `user_project` VALUES('', '$user_id', '$project_id')") or die(mysqli_error());
    insert_member_project($user_id, $project_id);
    
    echo "<script>alert('Member SUCCESSFULLY ADDED');</script>";
    echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
   
 

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

        <?php include('../navigation/user_sidebar.php');?>

        <div class="content-wrapper">
            
            <br > <br >

            <section class="content">
                
                <div class="container-fluid">
                    
                
                    
                    <?php 
                        $project_id = $_GET['project_id'];
                        $get_project = get_project($project_id);
		                $cRow = mysqli_fetch_array($get_project);
                    ?>
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title font-weight-bold">Project Name: <?php echo $cRow['project_name']; ?></h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               
                             
                                <section class="board-tabs mx-2 pb-3">

                                  <ul class="nav nav-tabs nav-justified" id="myTabMD" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                      <a class="nav-link active font-weight-bold" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Project Description</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                      <a class="nav-link  font-weight-bold" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Boards</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                      <a class="nav-link  font-weight-bold" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md" aria-selected="false">Team Members</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content card pt-3" id="myTabContentMD">
                                    <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                                      <p style="padding: 0 15px 0 15px;"><?php echo $cRow['project_description']; ?></p>
                                    </div>
                                    <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                                      <p style="padding: 0 15px 0 15px;">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1
                                        labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                                        beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                        vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                                        helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                        anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party
                                        scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                    </div>
                                    <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
                                      
                                        <div class="col-md-6 pb-3" align="left">
                                              <!-- Button to Open the Modal -->
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                                Add Members
                                          </button>

                                          <!-- The Modal -->
                                          <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Add Members</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                  
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="POST"enctype="multipart/form-data">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleDropdown">Select your team member: </label>
                                                                <select data-live-search="true" title="Please select member" name="user_id" class="form-control selectpicker col-sm-6">
                                                                    <?php
                                                                        $users = getAllUser();
                                                                        $user_id = $_GET['user_id'];

                                                                        while ($p = mysqli_fetch_array($users))
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $p['user_id']; ?>" <?php if ($user_id == $p['user_id']) {echo "selected";} ?> required><?php echo $p['name']; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <input type = "hidden" id = "project_id" value = "<?php echo $c_fetch['project_id'];?>" />
                                                            </div> 
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                            <input type="submit" name="add" value="Add" id="submit-fs" class="btn btn-success" >
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <?php
                                                $c_query = $conn->query("SELECT * FROM `project` WHERE `project_id` = '$project_id'") or die(mysqli_error());
                                                $c_fetch = $c_query->fetch_array();
                                                $project = $c_fetch['project_id'];
                                            ?>
<!--                                            <table id = "table" class = "table-bordered">-->
                                            <table class="table " id="table" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Team Member</th>
                                                            <th ><center>Action</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '$c_fetch[project_id]'") or die(mysqli_error());
                                                            while($f_query = $query->fetch_array()){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $f_query['name']?></td>
                                                            <?php
                                                                $confirmation = "Are you sure about deleting member?";
                                                            ?>
                                                            <td><center><a  href = "delete.php?user_id=<?php echo $f_query['user_id']?>&project_id=<?php echo $f_query['project_id']?>" class = "btn btn-danger" onclick="return confirm('<?php echo $confirmation; ?>')"><span class = "glyphicon glyphicon-trash"></span> Remove</a></center></td>
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
