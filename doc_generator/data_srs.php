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
			}
			.section1 h2{
				margin-top: 10%;
				margin-bottom: 5%;
			}
			
		</style>
	</head>
	<body>
		<div class="section1">

			<h1></br></br></br>Software Requirement Specification</h1>
			<h2>Project Name</h2>
			<p><?php echo $request['project'] ?></p>
		</div>
		
		
		<div class="section1">
			<h2>Team Name</h2>
			<p><?php echo $request['team_name'] ?></p>
		</div>
		
		
		<div class="section1">
			<h2>Team Member</h2>
			<p><?php echo $request['team_member'] ?></p>
		</div>
		
		</br></br></br></br>
	
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
			<h3>1.3 Definitions, Acronyms and Abbreviations</h3>
			<p><?php echo $request['definitions_acronyms_abbreviations'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>1.4 Business Rules</h3>
			<p><?php echo $request['business_rules'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>2. Overall Description</u></h2>
			<h3>2.1 System Specification</h3>
			<p><?php echo $request['system_perspective'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.2 System Features</h3>
			<p><?php echo $request['system_features'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.3 User Classes and Characteristics</h3>
			<p><?php echo $request['user_classes_characteristics'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.4 Design and implementation Constraints</h3>
			<p><?php echo $request['design_implementation_constraints'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.5 Assumptions</h3>
			<p><?php echo $request['assumptions'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>2.6 Operating Environment</h3>
			<p><?php echo $request['operating_environment'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>3. Use Cases Descriptions</u></h2>
			<h3>3.1 Use Cases</h3>
			<p><?php echo $request['use_case'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>4. External Interface Requirements</u></h2>
			<h3>4.1 User Interfaces</h3>
			<p><?php echo $request['user_interface'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>4.2 Software Interfaces</h3>
			<p><?php echo $request['software_interface'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>4.3 Communication Interfaces</h3>
			<p><?php echo $request['communication_interface'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>5. Non-functional Requirements</u></h2>
			<h3>5.1 Usability</h3>
			<p><?php echo $request['usability'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>5.2 Reliability</h3>
			<p><?php echo $request['reliability'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>5.3 Security</h3>
			<p><?php echo $request['security'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>5.4 Portability</h3>
			<p><?php echo $request['portability'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>5.5 Maintainability</h3>
			<p><?php echo $request['maintainability'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3>5.6 Availability</h3>
			<p><?php echo $request['availability'] ?></p>
		</div>
		
		</br></br>
		
		<div class="section">
			<h2><u>6. Change Management Process</u></h2>
			<h3>6.1 Management Process</h3>
			<p><?php echo $request['management_process'] ?></p>
		</div>
		
		
		
		
		
		
	</body>
</html>