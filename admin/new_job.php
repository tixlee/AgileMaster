<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';



if(isset($_POST['create'])) 
{	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$updated_date = date('d-m-Y');

	$company = $_POST['company'];
	$state = $_POST['state'];
	$country = $_POST['country'];

	$phone_no = $_POST['phone_no'];
	$office_no = $_POST['office_no'];
	$email = $_POST['email'];

	$address = $_POST['address'];

	$position = $_POST['position'];
	$job_type = $_POST['job_type'];
	$duration = $_POST['duration'];

	$salary = $_POST['salary']; 
	$vacancy_no = $_POST['vacancy_no'];
	$date_requested = $_POST['date_requested'];
	$date_expected = $_POST['date_expected'];

	$remarks = $_POST['remarks'];
	$description = $_POST['description'];

	insert_job($updated_date, $company, $state, $country, $phone_no, $office_no, $email, $address, $position, $job_type, $duration, $salary, $vacancy_no, $date_requested, $date_expected, $remarks, $description);
	header('location: ../admin/joblist.php');
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>New Job</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="content">
			<form method="POST" action="" enctype="multipart/form-data">
			<p class="form-info-title">Job Details</p>
				
				<select class="big-dropdown" name="company" required>
					<option value="" selected disabled>Company</option>
					<?php
						$get_AllCompany = get_AllCompany();
						while($comRow = mysqli_fetch_array($get_AllCompany)){
					?>
						<option value="<?php echo $comRow['name']; ?>"><?php echo $comRow['name']; ?></option>
					<?php
						}
					?>
				</select></br>
				
				<input type="text" name="phone_no" class="small-input" placeholder="Phone No." autocomplete="off">

				<input type="text" name="office_no" class="small-input" placeholder="Office No." autocomplete="off">

				<input type="text" name="email" class="v-big-input" placeholder="Email" autocomplete="off"></br>

				<textarea name="address" class="small-textarea" placeholder="Address" required></textarea></br>

				<input type="text" name="state" class="small-input" placeholder="State" autocomplete="off">

				<input type="text" name="country" class="small-input" placeholder="Country" autocomplete="off">

				<div class="new-job-two">
					<input type="text" name="position" class="small-input" placeholder="Position" required autocomplete="off">
					<select id="select" class="med-dropdown" name="job_type">
						<option value="" selected disabled>Job Type</option>
						<option value="Permanent">Permanent</option>
						<option value="Contract">Contract</option>
					</select>
					<input type="text" id="cont" class="small-input" name="duration" placeholder="Duration(Months)"/>
				</div>

				<input type="text" name="salary" class="small-input" placeholder="Salary" required autocomplete="off">
				<input type="text" name="vacancy_no" class="small-input" placeholder="No Of Vacancies" required autocomplete="off">
				<input type="text" name="date_requested" class="small-input" placeholder="Date Requested" onfocus="(this.type='date')" onblur="(this.type='text')" required autocomplete="off">
				<input type="text" name="date_expected" class="small-input" placeholder="Date Expected" onfocus="(this.type='date')" onblur="(this.type='text')" required autocomplete="off">


			
				<textarea type="text" name="remarks" class="small-textarea" placeholder="Remarks" autocomplete="off"></textarea>
				<textarea type="text" name="description" class="small-textarea" placeholder="Job Description" autocomplete="off"></textarea></br>
			

				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='joblist.php'">
				<input type="submit" name="create" value="Submit" class="submit-btn">
				
			</form>
		</div>
		<script src="../dependencies/scripts/jobtype.js"></script>
    </body>
</html>
