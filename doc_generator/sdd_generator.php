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
    <title>SDD Document Generator</title>
	<?php include('../navigation/head.php');?>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../navigation/topbar.php');?>

  <?php include('../navigation/user_sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	</br></br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  <div class="card shadow mb-4">
		<div class="card-body">
		
			<div class="card-header py-3">
              <h3 class="m-4 font-weight-bold">SDD Document Generator</h3>
			  <h5 class="m-4 font-weight-bold">SDD document describes the necessary design information including high level and low level designs. The practice is not limited to specific methodologies for design, configuration management or quality assurance. It can be applied to paper documents, automated database, design description languages or other means of description.</h5>
            </div>
					
                    <form method="POST" name="createDoc" id="DocCreator" action="sdd_report_generator.php" enctype="multipart/form-data">
                        
						
						
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
								<label for="overview">Overview</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="overview" name="overview" placeholder="Enter the overview of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="reference_material">Reference Material</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="reference_material" name="reference_material" placeholder="Enter the reference material of the project."></textarea>
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
								<label for="system_overview">System Overview</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="system_overview" name="system_overview" placeholder="Enter the System Overview of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="system_architecture">System Architecture</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="system_architecture" name="system_architecture" placeholder="Enter the System Architecture of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="data_description">Data Description</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="data_description" name="data_description" placeholder="Enter the Data Description of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="data_dictionary">Data Dictionary</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="data_dictionary" name="data_dictionary" placeholder="Enter the Data Dictionary of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="component_design">Component Design</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="component_design" name="component_design" placeholder="Enter the Component Design of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="overview_of_user_interface">Overview of User Interface</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="overview_of_user_interface" name="overview_of_user_interface" placeholder="Enter the Overview of User Interface of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="screen_objects_and_actions">Screen Objects and Actions</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="screen_objects_and_actions" name="screen_objects_and_actions" placeholder="Enter the Screen Objects and Actions of the project."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
                            <div class="name">
								<label for="requirement_matrix">Requirement Matrix</label>
							</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" id="requirement_matrix" name="requirement_matrix" placeholder="Enter the Requirement Matrix details."></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-row">
							
							<button class="btn btn--radius-2 btn--blue-2" type="submit" name="send">Generate</button>
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

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/global.js"></script>

</body>
</html>

