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
   
   
   if(isset($_POST['save'])){
       
   	$project_id = $_GET['project_id'];
       $board_name = strip_tags($_POST['board_name']);
       $board_name = mysqli_real_escape_string($conn, $board_name);
       insert_board($project_id, $board_name);
       
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }
                            
   
   if(isset($_POST['add'])){
       
       $user_id = $_POST['user_id'];
   	$project_id = $_GET['project_id'];
       insert_member_project($user_id, $project_id);
       
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }
   
   if(isset($_POST['switch'])){
       
       $user_id = $_POST['user_id'];
   	$project_id = $_GET['project_id'];
       update_user_created_project($project_id, $user_id);
       
       echo "<script>window.location.href ='../user/project_details.php?project_id=$project_id'</script>";
      
    
   
   }
   
   //$user_id = $_GET['user_id'];
   
   
   ?>
<?php include 'sendemail.php'; ?>
<!DOCTYPE html>
<html>
   <head>
      <title>AgileMaster | Project Details</title>
      <?php include('../navigation/head.php');?>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <?php include('../navigation/topbar.php');?>
         <?php include('../navigation/user/project_sidebar.php');?>
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
                           <ul class="nav nav-tabs nav-justified" id="myTabMD" role="tablist">
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link active text-lg font-weight-bold" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Project Description</a>
                              </li>
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link  text-lg font-weight-bold" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md" aria-selected="false">Team Members</a>
                              </li>
                              <li class="nav-item waves-effect waves-light">
                                 <a class="nav-link  text-lg font-weight-bold" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Boards</a>
                              </li>
                           </ul>
                           <div class="tab-content card pt-3" id="myTabContentMD">
                              <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                                 <p style="padding: 0 15px 0 15px;"><?php echo $cRow['project_description']; ?></p>
                              </div>
                              <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                                 <div class="col-md-6 pb-3" align="left">
                                    <?php
                                       $u_query = $conn->query("SELECT * FROM `user_created_project` WHERE `created_proj_id` = '$project_id'") or die(mysqli_error());
                                       $u_fetch = $u_query->fetch_array();
                                       if($u_fetch['user_id'] == $userId)
                                       {
                                       ?>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-plus"></i> ADD BOARD
                                    </button>
                                    <?php
                                       }
                                       ?>
                                    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Board</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                   <div class="form-group">
                                                      <label for="board_name" class="sr-only">Board Name</label>
                                                      <input type="text" name="board_name" id="board_name" class="form-control" placeholder="Board Name" required autocomplete="off">
                                                      <input type = "hidden" id = "project_id" value = "<?php echo $a_fetch['project_id'];?>" />
                                                   </div>
                                                   <br>
                                                   <div class="modal-footer">
                                                      <input type="button" name="submit" value="Close" id="back-fs" class="btn btn-danger" data-dismiss="modal">
                                                      <input type="submit" name="save" value="Create" id="submit-fs" class="btn btn-success" >
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    $a_query = $conn->query("SELECT * FROM `project` WHERE `project_id` = '$project_id'") or die(mysqli_error());
                                    $a_fetch = $a_query->fetch_array();
                                    $project = $a_fetch['project_id'];
                                    
                                    
                                        
                                    ?>
                                 <div class="card-body">
                                    <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                             <tr>
                                                <th >Board Name</th>
                                                <th >
                                                   <center>View Board</center>
                                                </th>
                                                <?php            
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                                   
                                                   ?>
                                                <th >
                                                   <center>Action</center>
                                                </th>
                                                <?php } ?>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $query = $conn->query("SELECT * FROM `board` WHERE `project_id` = '$a_fetch[project_id]'") or die(mysqli_error());
                                                
                                                while($b_query = $query->fetch_array()){
                                                    
                                                ?>
                                             <tr>
                                                <td > 
                                                   <?php echo $b_query['board_name']?>
                                                </td>
                                                <td >
                                                   <center>
                                                      <a  href="task.php?board_id=<?php echo $b_query['board_id']; ?>" class = "btn btn-success " >
                                                      View
                                                      </a>
                                                   </center>
                                                </td>
                                                <?php
                                                   $confirmation = "Are you sure about deleting member?";
                                                   
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                       
                                                   ?>
                                                <td >
                                                   <center>
                                                      <a  href = "delete_board.php?board_id=<?php echo $b_query['board_id']?>&project_id=<?php echo $b_query['project_id']?>" class = "btn btn-danger " onclick="return confirm('<?php echo $confirmation; ?>')">
                                                      <span class = "glyphicon glyphicon-trash"></span> <i class="fa fa-trash" aria-hidden="true"></i>
                                                      </a>
                                                   </center>
                                                </td>
                                                <?php
                                                   }	
                                                   ?>
                                             </tr>
                                             <?php
                                                }	
                                                ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
                                 <div class="col-md-6 pb-3" align="left">
                                    <!-- Button to Open the Modal -->
                                    <?php
                                       if($u_fetch['user_id'] == $userId)
                                       {
                                       ?>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                    <i class="fas fa-plus"></i>  ADD MEMBER
                                    </button>
                                    <?php
                                       }
                                       ?>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mySecondModal">
                                    <i class="far fa-envelope"></i> INVITE MEMBER
                                    </button>
                                    <?php echo $alert; ?>
                                    <div class="modal fade" id="mySecondModal" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h3>Send Invitation</h3>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             </div>
                                             <form class="contact" action="" method="post">
                                                <div class="modal-body">
                                                   <label class="col-md-12 col-xm-3" for="email">Email Address: 
                                                   <input text="email" id="email" name="email" class="form-control col-md-12" placeholder="mail@mail.com">
                                                   </label>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                   <button type="submit" name="submit" class="btn btn-success" id="basic-addon2">Send</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <!-- Modal Header -->
                                             <div class="modal-header">
                                                <h4 class="modal-title">Add Member</h4>
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
                                                            <option value="<?php echo $p['user_id']; ?>" <?php if ($user_id == $p['user_id']) {echo "selected";} ?> required><?php echo $p['name']; ?> <em style="font-style: italic;"> (<?php echo $p['email']; ?>)</em></option>
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
                                       <table class="table " id="table" width="100%" cellspacing="0">
                                          <thead>
                                             <tr>
                                                <th>Team Member</th>
                                                <?php 
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                   ?>
                                                <th >
                                                   <center>Action</center>
                                                </th>
                                                <th >
                                                   <center>Switch Project Manager To</center>
                                                </th>
                                                <?php 
                                                   }
                                                   ?>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '$c_fetch[project_id]' order by `name` ASC") or die(mysqli_error());
                                                
                                                
                                                
                                                while($f_query = $query->fetch_array()){
                                                    
                                                ?>
                                             <tr>
                                                <td class="no-bottom-border "  style="border: 0px;" value = "<?php echo $f_query['user_id'];?>"><?php echo $f_query['name']?>
                                                   <?php 
                                                      if($u_fetch['user_id'] == $f_query['user_id'])
                                                      {
                                                          echo ' <strong>(Project Manager)</strong>'; }
                                                      ?>
                                                </td>
                                                <?php
                                                   $confirmation = "Are you sure about deleting member?";
                                                   
                                                   if($u_fetch['user_id'] == $userId)
                                                   {
                                                   ?>
                                                <?php 
                                                   if($u_fetch['user_id'] != $f_query['user_id'])
                                                   {
                                                   ?>
                                                <td style="border: 0px;">
                                                   <center>
                                                      <a  href = "delete.php?user_id=<?php echo $f_query['user_id']?>&project_id=<?php echo $f_query['project_id']?>" class = "btn btn-danger " onclick="return confirm('<?php echo $confirmation; ?>')">
                                                      <span class = "glyphicon glyphicon-trash"></span> <i class="fa fa-trash" aria-hidden="true"></i>
                                                      </a>
                                                   </center>
                                                </td>
                                                <td style="border: 0px;">
                                                   <center>
                                                      <form method="POST"enctype="multipart/form-data">
                                                         <input type = "hidden" id = "user_id" name = "user_id" value = "<?php echo $f_query['user_id'];?>" />
                                                         <input type="submit" name="switch" value="Switch" id="submit-fs" class="btn btn-success" >
                                                      </form>
                                                   </center>
                                                </td>
                                                <?php } ?>
                                             </tr>
                                             <?php
                                                }
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
               </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark">
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
      <script src="../dependencies/navigation/js/adminlte.js"></script>
   </body>
</html>