<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>AgileMaster | SDD Document Generator</title>
	<?php include('../navigation/head.php');?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="../dependencies/summernote/summernote-bs4.css">
    <link href="css/style.css" rel="stylesheet" media="all">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/docgeneratorstd_sidebar.php');?>
	<div class="content-wrapper">
		<br><br>
		<section class="content">
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="card-header py-3">
							<h4 class="m-4 font-weight-bold">STD Document Generator</h4>
							<h6 class="m-4 font-weight-bold">STD document describes a set of basic software test information that covers test plan, test specification and test report. Test plan prescribes the scope, approach, resource and schedule of the testing activities. Test specification covers the test cases, test procedures and input/output assumptions. Test report identifies the test items, test log and summary report.</h6>
						</div>
					
						<form method="POST" name="createDoc" id="DocCreator" action="std_report_generator.php" enctype="multipart/form-data">
							
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
									<label for="alpha_testing">Alpha Testing(Unit Testing)</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="alpha_testing" name="alpha_testing" placeholder="Enter the Alpha Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="system_and_integration_testing">System and Integration Testing</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="system_and_integration_testing" name="system_and_integration_testing" placeholder="Enter the System and Integration Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="performance_and_stress_testing">Performance and Stress Testing</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="performance_and_stress_testing" name="performance_and_stress_testing" placeholder="Enter the System and Integration Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="user_acceptance_testing">User Acceptance Testing</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="user_acceptance_testing" name="user_acceptance_testing" placeholder="Enter the User Acceptance Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="batch_testing">Batch Testing</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="batch_testing" name="batch_testing" placeholder="Enter the Batch Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="automated_regression_testing">Automated Regression Testing</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="automated_regression_testing" name="automated_regression_testing" placeholder="Enter the Automated Regression Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="beta_testing">Beta Testing</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="beta_testing" name="beta_testing" placeholder="Enter the Beta Testing of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="hardware_requirement">Hardware Requirements</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="hardware_requirement" name="hardware_requirement" placeholder="Enter the Hardware Requirement of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="main_frame">Main Frame</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="main_frame" name="main_frame" placeholder="Enter the Main Frame of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="workstation">Workstation</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="workstation" name="workstation" placeholder="Enter the Workstation of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="test_schedule">Test Schedule</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="test_schedule" name="test_schedule" placeholder="Enter the Test Schedule of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="control_procedures">Control Procedures</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="control_procedures" name="control_procedures" placeholder="Enter the Control Procedures of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="features_to_be_tested">Features to Be Tested</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="features_to_be_tested" name="features_to_be_tested" placeholder="Enter the Features to Be Tested of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="features_not_to_be_tested">Features Not to Be Tested</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="features_not_to_be_tested" name="features_not_to_be_tested" placeholder="Enter the Features Not to Be Tested of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="resources_roles_responsibility">Resources/Roles & Responsibilities</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="resources_roles_responsibility" name="resources_roles_responsibility" placeholder="Enter the Resources, Roles and Responsiblity of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="schedules">Schedules</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="schedules" name="schedules" placeholder="Enter the Schedules of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="significantly_impacted_departments">Significantly Impacted Departments(SIDs)</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="significantly_impacted_departments" name="significantly_impacted_departments" placeholder="Enter the Schedules of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="dependencies">Dependencies</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="dependencies" name="dependencies" placeholder="Enter the Dependencies of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="risk_assumptions">Risks/Assumptions</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="risk_assumptions" name="risk_assumptions" placeholder="Enter the Dependencies of the project."></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="name">
									<label for="tools">Tools</label>
								</div>
								<div class="value">
									<div class="input-group">
										<textarea class="textarea--style-6" id="tools" name="tools" placeholder="Enter the Tools of the project."></textarea>
									</div>
								</div>
							</div>
							
							
							<div class="form-row">
								
								<button class="btn btn-success" type="submit" name="send">Generate</button>
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
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>
<script src="js/global.js"></script>

</body>
</html>

