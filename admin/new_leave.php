<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['create'])) 
{
	date_default_timezone_set("Asia/Kuala_Lumpur");

	$application_date = $_POST['application_date'];
	$leave_type = $_POST['leave_type'];
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$days = $_POST['days'];
	$from_hours = $_POST['from_hour'];
	$to_hours = $_POST['to_hour'];
	$hours = $_POST['hours'];
	$reason = $_POST['reason'];

	insert_leave($application_date, $leave_type, $from_date, $to_date, $days, $from_hours, $to_hours, $hours, $reason);
	header("Location: leaveapplications.php");
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Apply Leave</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

	<div class="form-content">
			<form method="POST" action="" enctype="multipart/form-data">
				<p class="form-info-title">Leave Application Form</p>

				<input type="text" name="applicalition_date" class="tdy-date" placeholder="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo (date('d-m-Y'));?>" readonly> </br>

				<select class="med-dropdown" name="leave_type" required>
					<option value="" selected disabled>Leave Type</option>
					<option value="Annual">Annual Leave</option>
					<option value="Sick">Sick Leave</option>
					<option value="Unpaid">Unpaid Leave</option>
				</select>
				
				<select class="med-dropdown" name="leave_period" id="select" required>
					<option value="" selected disabled>Leave Period</option>
					<option value="Full Day">Full Day</option>
					<option value="Half Day">Half Day</option>
				</select></br>

				<div id="dys">
					<!-- <span class="info-lable">Date:</span> -->
					<input type="text" name="from_date" class="small-input" placeholder="From :" onfocus="(this.type='date')" onblur="(this.type='text')"  autocomplete="off">
					<input type="text" name="to_date" class="small-input" placeholder="To :" onfocus="(this.type='date')" onblur="(this.type='text')"  autocomplete="off">
					<input type="number" name="days" class="v-small-input" placeholder="Day(s)"  autocomplete="off"></br>
				</div>

				<div id="hrs">
					<!-- <span class="info-lable">Hour:</span> -->
					<input type="text" name="from_hour" class="small-input" placeholder="From :" onfocus="(this.type='time')" onblur="(this.type='text')"  autocomplete="off">
					<input type="text" name="to_hour" class="small-input" placeholder="To :" onfocus="(this.type='time')" onblur="(this.type='text')"  autocomplete="off">
					<input type="number" name="hours" class="v-small-input" placeholder="Hour(s)"  autocomplete="off"></br>
				</div>

				<textarea name="reason" class="big-textarea" placeholder="Reason" required></textarea></br>

				<input type="file" name="file[]" id="file" class="custom-leave-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></br>

				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='leaveapplications.php'">
				<input type="submit" name="create" value="Submit" class="submit-btn">
			</form>
			 
		</div>
		<script src="../dependencies/scripts/leaveperiod.js"></script>
    </body>
</html>