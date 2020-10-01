<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_GET['jobid']))
{
	$editJD = $_GET['jobid'];
}


if(isset($_POST['edit'])) 
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

	edit_job($editJD, $updated_date, $company, $state, $country, $phone_no, $office_no, $email, $address, $position, $job_type, $duration, $salary, $vacancy_no, $date_requested, $date_expected, $remarks, $description);
	echo"($editJD, $updated_date, $company, $state, $country, $phone_no, $office_no, $email, $address, $position, $job_type, $duration, $salary, $vacancy_no, $date_requested, $date_expected, $remarks, $description)";
	// header('location: ../admin/joblist.php');
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
                <?php 
                    $allJob = get_Job($editJD);
                    $row = mysqli_fetch_array($allJob);
                ?>
				
				<select class="big-dropdown" name="company">
					<option value="" selected disabled><?php echo $row['company'];?></option>

					<?php
						$get_AllCompany = get_AllCompany();
						while($comRow = mysqli_fetch_array($get_AllCompany)){
					?>
						<option value="<?php echo $comRow['name']; ?>"><?php echo $comRow['name']; ?></option>
					<?php
						}
					?>
					
				</select></br>
				
				<input type="text" name="phone_no" class="small-input" value="<?php echo $row['phone_no'];?>" autocomplete="off">

				<input type="text" name="office_no" class="small-input" value="<?php echo $row['office_no'];?>" autocomplete="off">

				<input type="text" name="email" class="v-big-input" value="<?php echo $row['email'];?>" autocomplete="off"></br>

				<textarea name="address" class="small-textarea" required><?php echo $row['address'];?></textarea></br>

				<input type="text" name="state" class="small-input" value="<?php echo $row['state'];?>" autocomplete="off">

				<input type="text" name="country" class="small-input" value="<?php echo $row['country'];?>" autocomplete="off">

				<div class="new-job-two">
                    <input type="text" name="position" class="small-input" value="<?php echo $row['position'];?>" required autocomplete="off">
                    
					<select id="select" class="med-dropdown" name="job_type">
						<option value="<?php echo $row['job_type'];?>" selected><?php echo$row['job_type']; ?></option>
                        <?php
                            if($row['job_type'] == "Permanent")
                            {
                                echo"<option value='Contract'>Contract</option>";
                            }
                            else
                            {
                                echo"<option value='Permanent'>Permanent</option>";
                            }
                        ?>
					</select>
                    <input type="text" id="cont" class="small-input" name="duration" value="<?php echo $row['duration'];?>"/>
                    
				</div>

				<input type="text" name="salary" class="small-input" value="<?php echo $row['salary'];?>" required autocomplete="off">
				<input type="text" name="vacancy_no" class="small-input"value="<?php echo $row['vacancy'];?>" required autocomplete="off">
				<input type="text" name="date_requested" class="small-input" value="<?php echo $row['date_requested'];?>" onfocus="(this.type='date')" onblur="(this.type='text')" required autocomplete="off">
				<input type="text" name="date_expected" class="small-input" value="<?php echo $row['date_expected'];?>" onfocus="(this.type='date')" onblur="(this.type='text')" required autocomplete="off">


			
				<textarea type="text" name="remarks" class="small-textarea" placeholder="Remarks" autocomplete="off"><?php echo $row['remarks'];?></textarea>
				<textarea type="text" name="description" class="small-textarea" placeholder="Job Description" autocomplete="off"><?php echo $row['description'];?></textarea></br>
			

				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='joblist.php'">
				<input type="submit" name="edit" value="Edit" class="submit-btn">
				
			</form>
		</div>
		<script src="../dependencies/scripts/jobtype.js"></script>
    </body>
</html>
