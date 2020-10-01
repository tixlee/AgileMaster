<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Resume</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">

				<div class="top-btn">
					<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">

					<input type="button" value="All" class="all-btn-top">

					<input type="button" value="Current" class="all-btn-top">

					<input type="button" value="Archive" class="all-btn-top">

					<input type="button" value="+ New Resume" class="all-btn-top" onclick="location.href='new_resume.php'">
				</div>


			<div class="table-display">
				<table id="data-table" class="table-content">
					<thead>
						<tr class="header">
							<th class="small-col">Resume ID</th>
							<th class="big-col">Name</th>
							<th class="small-col">Gender</th>
							<th class="small-col">Age</th>
							<th class="med-col">Phone No.</th>
							<th class="big-col">Email</th>
							<th class="med-col">Position</th>
							<th class="small-col">State</th>
							<th class="big-col">Remarks</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php
							$get_AllActiveResume = get_AllActiveResume();
							while($rRow = mysqli_fetch_array($get_AllActiveResume)){
								$get_PersonalInfo = get_PersonalInfo($rRow['resume_id']);
								$piRow = mysqli_fetch_array($get_PersonalInfo);
						?>
						<tr class="tbl-link" >
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $rRow['resume_code']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['full_name']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['gender']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['age']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['mobile_no']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['email']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['position_applied']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $piRow['pa_state']; ?>
							</td>
							<td onclick="location.href='view_resume.php?rid=<?php echo $rRow['resume_id']; ?>'">
								<?php echo $rRow['remarks']; ?>
							</td>
							<td>
							<?php
								$delConfirm = "Are you sure you want to delete product ".$rRow['resume_code']."?";
							?>
							<a href="delete.php?rid=<?php echo $rRow['resume_id']; ?>" onclick="return confirm('<?php echo $delConfirm; ?>')">
								<img src="../resources/images/trash.png">
							</a>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>

    </body>
</html>
