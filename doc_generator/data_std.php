<!DOCTYPE html>
<html>
	<head>
		<title>Show Data</title>
		<style>
			.section{
				margin-left:10%;
				margin-right: 10%;
			}
			.section p{
				text-align: justify;
				line-height: 1.4;
			}
			.section1{
				margin_left: 10%;
				margin-right: 10%;
				text-align: center;
				padding-bottom: 15%;
			}
			.section1 h2{
				margin-top: 10%;
				margin-bottom: 10%;
			}
			
		</style>
	</head>
	<body>
		<div class="section1">
			</br></br></br>
			<h1></br></br></br>Software Test Document</h1>
			</br></br>
			<h2><?php echo $request['project'] ?></h2>
		</div>
		
		</br></br></br></br></br>
		
		<div class="section1">
			<h2>Team Name</h2>
			</br></br>
			<h2><?php echo $request['team_name'] ?></h2>
		</div>
		
		</br></br></br></br></br>
		
		<div class="section1">
			<h2>Team Member</h2>
			</br></br>
			<h2><?php echo $request['team_member'] ?></h2>
		</div>
		
		</br></br></br></br></br>
	
		<div class="section">
			<h2><u>1. Introduction</u></h2>
			<h3>1.1 Purpose</h3>
			<p><?php echo $request['purpose'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>1.2 Scope</h3>
			<p><?php echo $request['scope'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2. Testing Strategy</u></h2>
			<h3>2.1 Aplha Testing(Unit Testing)</h3>
			<p><?php echo $request['alpha_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.2 System and Integration Testing</h3>
			<p><?php echo $request['system_and_integration_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.3 Performance and Stress Testing</h3>
			<p><?php echo $request['performance_and_stress_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2.4 User Acceptance Testing</u></h2>
			<p><?php echo $request['user_acceptance_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2.5 Batch Testing</u></h2>
			<p><?php echo $request['batch_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2.6 Automated Regression Testing</u></h2>
			<p><?php echo $request['automated_regression_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2.7 Beta Testing</u></h2>
			<p><?php echo $request['beta_testing'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>3. Hardware Requirements</u></h2>
			<p><?php echo $request['hardware_requirement'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>3. Environment Requirements</u></h2>
			<h3>3.1 Main Frame</h3>
			<p><?php echo $request['main_frame'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>3.2 Workstation</u></h2>
			<p><?php echo $request['workstation'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>7. Test Schedule</u></h2>
			<p><?php echo $request['test_schedule'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>8. Control Procedures</u></h2>
			<p><?php echo $request['control_procedures'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>9. Features to Be Tested</u></h2>
			<p><?php echo $request['features_to_be_tested'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>10. Features Not to Be Tested</u></h2>
			<p><?php echo $request['features_not_to_be_tested'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>11. Resoures/Roles & Responsibility</u></h2>
			<p><?php echo $request['resources_roles_responsibility'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>12. Schedules</u></h2>
			<p><?php echo $request['schedules'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>13. Significantly Impacted Departments (SIDs)</u></h2>
			<p><?php echo $request['significantly_impacted_departments'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>14. Dependencies</u></h2>
			<p><?php echo $request['dependencies'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>15. Risks/Assumptions</u></h2>
			<p><?php echo $request['risk_assumptions'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>16. Tools</u></h2>
			<p><?php echo $request['tools'] ?></p>
		</div>
		
		</br></br>
	</body>
</html>