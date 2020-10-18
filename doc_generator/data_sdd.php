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
			<h1></br></br></br>Software Design Description</h1>
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
			<h3>1.3 Overview</h3>
			<p><?php echo $request['overview'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>1.4 Reference Material</h3>
			<p><?php echo $request['reference_material'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>1.5 Definitions, Acronyms and Abbreviations</h3>
			<p><?php echo $request['definitions_acronyms_abbreviations'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2. System Overview</u></h2>
			<p><?php echo $request['system_overview'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>3. System Architectre</u></h2>
			<p><?php echo $request['system_architecture'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>4. Data Design</u></h2>
			<h3>4.1 Data Description</h3>
			<p><?php echo $request['data_description'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>4.2 Data Dictionary</h3>
			<p><?php echo $request['data_dictionary'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>5. Component Design</u></h2>
			<p><?php echo $request['component_design'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>6. Human Interface Design</u></h2>
			<h3>6.1 Overview of User Interface</h3>
			<p><?php echo $request['overview_of_user_interface'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>6.2 Screen Objects and Actions</h3>
			<p><?php echo $request['screen_objects_and_actions'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>7. Requirement Matrix</u></h2>
			<p><?php echo $request['requirement_matrix'] ?></p>
		</div>

	</body>
</html>