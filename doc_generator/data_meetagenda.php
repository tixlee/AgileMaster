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
			.section3{
				margin-left:10%;
				margin-right: 10%;
				text-align: center;
			}
			
		</style>
	</head>
	<body>
	
		<div class="section3">
			<h2><u>Meeting Agenda <?php echo $request['title'] ?></u></h2>
		</div>
		
		</br></br>
		
		<div class="section">
			<h3><u>Meeting Information</u></h3>
		</div>
		
		<div class="section">
			<p><b>Objectives </b><?php echo $request['objective'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Date </b><?php echo $request['date'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Time </b><?php echo $request['time'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Location </b><?php echo $request['location'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Called By </b><?php echo $request['called_by'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Note Taker </b><?php echo $request['note_taker'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Timer Keeper </b><?php echo $request['time_keeper'] ?></p> 
		</div>
		
		<div class="section">
			<p><b>Attendees </b><?php echo $request['attendees'] ?></p> 
		</div>
		
		<hr>
		
		<div class="section">
			<h3><u>Action Items From Previous Meeting</u></h3>
		</div>
		
		<div class="section">
			<p><?php echo $request['action_items_from_previous_meeting'] ?></p> 
		</div>
		
		<hr>
		
		<div class="section">
			<h3><u>Agenda Items</u></h3>
		</div>
		
		<div class="section">
			<p><?php echo $request['agenda_items'] ?></p> 
		</div>
		
		<hr>
		
		<div class="section">
			<h3><u>New Action Items</u></h3>
		</div>
		
		<div class="section">
			<p><?php echo $request['new_action_items'] ?></p> 
		</div>
		
		<hr>
		
		<div class="section">
			<h3><u>Other Notes & Informations</u></h3>
		</div>
		
		<div class="section">
			<p><?php echo $request['notes_info'] ?></p> 
		</div>

	</body>
</html>