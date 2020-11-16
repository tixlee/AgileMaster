<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>AgileMaster | SRS Document Generator</title>
	<?php include('../navigation/head.php');?>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="../dependencies/summernote/summernote-bs4.css">
	
    <!-- Main CSS-->
    <link href="css/style.css" rel="stylesheet" media="all">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/user/docgeneratorsrs_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	</br></br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  <div class="card shadow mb-4">
		<div class="card-body">
		
			<div class="card-header py-3">
              <h4 class="m-4 font-weight-bold">SRS Document Generator</h4>
			  <h6 class="m-4 font-weight-bold">SRS document describes recommended approaches for the software requirements. The purpose is to explain the scope of the project, references made to other standards, definitions of specific terms used, background information and essential parts of the system.</h6>
            </div>
					
                    <form method="POST" name="createDoc" id="DocCreator" action="srs_report_generator.php" enctype="multipart/form-data">
                        
						
						
						<div class="form-row">
                            <div class="name">
								<label for="project">Project Name</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="project" name="project" placeholder="Enter the project name."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="team_name">Team Name</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="team_name" name="team_name" placeholder="Enter the team name."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="team_member">Team Member</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="team_member" name="team_member" placeholder="Enter the team member."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="purpose">Purpose</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="purpose" name="purpose" placeholder="Enter the purposes of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-row">
                            <div class="name">
								<label for="scope">Scope</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="scope" name="scope" placeholder="Enter the scope of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-row">
                            <div class="name">
								<label for="definitions_acronyms_abbreviations">Definitions, Acronyms and Abbreviations</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="definitions_acronyms_abbreviations" name="definitions_acronyms_abbreviations" placeholder="Enter the Definitions, Acronyms and Abbreviations of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="business_rules">Business Rules</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="business_rules" name="business_rules" placeholder="Enter the Business Rules of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="system_perspective">System Perspective</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="system_perspective" name="system_perspective" placeholder="Enter the System Specification of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="system_features">System Features</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="system_features" name="system_features" placeholder="Enter the System Features of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="user_classes_characteristics">User Classes and Characteristics</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="user_classes_characteristics" name="user_classes_characteristics" placeholder="Enter the User Classes Characteristics of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="design_implementation_constraints">Design and implementation Constraints</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="design_implementation_constraints" name="design_implementation_constraints" placeholder="Enter the Design and Implementation Constraints of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="assumptions">Assumptions</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="assumptions" name="assumptions" placeholder="Enter the Assumptions of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="operating_environment">Operating Environment</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="operating_environment" name="operating_environment" placeholder="Enter the Operating Environment of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="use_case">Use Cases</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="use_case" name="use_case" placeholder="Enter the use case details."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="user_interface">External Interface Requirements - User Interfaces</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="user_interface" name="user_interface" placeholder="Enter the User Interface of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="software_interface">External Interface Requirements - Software Interface</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="software_interface" name="software_interface" placeholder="Enter the Software Interface of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="communication_interface">External Interface Requirements - Communication Interface</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="communication_interface" name="communication_interface" placeholder="Enter the Communication Interface of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="usability">Non-functional Requirements - Usability</label>
								</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="usability" name="usability" placeholder="Enter the Non Functional Requirements - usability of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="reliability">Non-functional Requirements - Reliability</label>
								</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="reliability" name="reliability" placeholder="Enter the Non Functional Requirements - reliability of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="security">Non-functional Requirements - Security</label>
								</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="security" name="security" placeholder="Enter the Non Functional Requirements - security of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="portability">Non-functional Requirements - Portability</label>
								</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="portability" name="portability" placeholder="Enter the Non Functional Requirements - portability of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="maintainability">Non-functional Requirements - Maintainability</label>
								</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="maintainability" name="maintainability" placeholder="Enter the Non Functional Requirements - maintainability of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="availability">Non-functional Requirements - Availability</label>
								</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="availability" name="availability" placeholder="Enter the Non Functional Requirements - availability of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="management_process">Management Process</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="management_process" name="management_process" placeholder="Enter the Management Process of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
							
							<button class="btn btn-info" type="submit" name="send">Generate</button>
						</div>
						
                    </form>
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
<script src="../dependencies/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea--style-6').summernote()
  })
</script>

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


<script src="js/global.js"></script>

</body>
</html>

