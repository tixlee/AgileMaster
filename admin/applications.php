<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['save']))
{
	$status = $_POST['status'];
	$remarks = $_POST['remarks'];
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Applications</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>
		<div class="display-content">

			<div class="top-btn">
				<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">
			</div>

			<div class="table-display">
				<table id="data-table" class="table-content">
					<thead>
						<tr class="header">
							<th class="big-col">Applicant</th>
							<th class="med-col">Vacancy</th>
							<th class="med-col">Company</th>
							<th class="med-col">Assigned To</th>
							<th class="med-col">Status</th>
							<th class="big-col">Remarks</th>
						</tr>
					</thead>

					<tbody>
					<?php
						$get_AllApplications = get_AllApplications();
						while($aRow = mysqli_fetch_array($get_AllApplications)){
							$resume = get_resume($aRow['resume_id']);
							$rRow = mysqli_fetch_assoc($resume);
							$job = get_Job($aRow['job_id']);
							$jRow = mysqli_fetch_assoc($job);
							$get_PersonalInfo = get_PersonalInfo($rRow['resume_id']);
							$piRow = mysqli_fetch_assoc($get_PersonalInfo);
							$get_user = get_user($rRow['assigned_to']);
							$uRow = mysqli_fetch_array($get_user);
					?>
						<tr>
							<td>
								<?php echo $piRow['full_name']; ?>
							</td>

							<td>
								<?php echo $jRow['vacancy']; ?>
							</td>

							<td>
								<?php echo $jRow['company']; ?>
							</td>

							<td>
								<?php echo $uRow['name']; ?>
							</td>

							<td>
								<select class="med-dropdown-table" name="status">
									<option value="" selected><?php echo $aRow['status']; ?></option>
									<option value="">Called for Interview</option>
									<option value="">Hired</option>
									<option value="">Rejected</option>
									<option value="">KIV</option>
								</select>
							</td>

							<td>
								<input type="text" name="remarks" class="big-input-table" value="<?php echo $aRow['remarks']; ?>">
							</td>

							<td>
								<input type="submit" name="save" class="submit-btn" value="Save">
							</td>

						</tr>
					<?php
						}
					?>
<!-- 
					<?php
					$get_AllJobs = get_AllJobs();
					while($jRow = mysqli_fetch_array($get_AllJobs)){
						$get_ResumeMatchingJob = get_ResumeMatchingJob($jRow['position'], $jRow['state']);
						while($rRow = mysqli_fetch_array($get_ResumeMatchingJob)){
							$get_ResumeFile = get_ResumeFile($rRow['resume_id']);
							$get_file = get_file($rRow['resume_id']);
					?>

					<tr>
						<td>
							<?php echo $rRow['position_applied']; ?>
						</td>
						<td>
							<?php echo $rRow['full_name']; ?>
						</td>
						<td>
							<?php echo $jRow['company']; ?>
						</td>
						<td>
							<?php echo $jRow['assigned_to']; ?>
						</td>
						<td>
							<?php
								$rCount = mysqli_num_rows($get_ResumeFile);
								if($rCount > 0){
									$count = 1;
									while($resume = mysqli_fetch_array($get_ResumeFile)){
							?>
							<a class="link-text" href="../upload/resume/<?php echo $resume['filename']; ?>" download>
								Resume <?php echo $count; ?>
							</a>&nbsp;
							<br>
							<?php
									$count++;
									}
								} else {
							?>
								No resume uploaded
							<?php                        
								}
							?>
						</td>
						<td>
							<?php echo $jRow['status']; ?>
						</td>
						<td>
							<?php echo $jRow['remarks']; ?>
						</td>
						<td>
							<?php echo $jRow['updated_date']; ?>
						</td>
						<td>
							
						</td>
					</tr>

					<?php
						}
					}
					?> -->
					
					</tbody>		
				</table>
			</div>
		</div>

    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>