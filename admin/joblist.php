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
		<title>Job List</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
			
			<div>
				<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">
				<input type="button" value="+ New Job" class="all-btn-top" onclick="location.href='new_job.php'">
			</div>
			

			<div id="data-table" class="table-display">
				<table class="table-content" id="dataTable">
					
					<thead>
						<tr class="header">
							<th class="med-col">Company</th>
							<th class="med-col">Position</th>
							<th class="med-col">Phone No</th>
							<th class="big-col">Email</th>
							<th class="med-col">State</th>
							<th class="big-col">Remarks</th>
							<th class="med-col">Updated Date</th>
						</tr>
					</thead>

					<tbody class="t-body">
						<?php 
			            	$get_AllJobs = get_AllJobs();
						
							while($row = mysqli_fetch_array($get_AllJobs))
							{
						?>
								<tr class='tbl-link'>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['company']; ?></td>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['position']; ?></td>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['phone_no']; ?></td>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['email']; ?></td>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['state']; ?></td>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['remarks']; ?></td>
									<td onclick="location.href='view_job.php?jobid=<?php echo $row['job_id']; ?>'"><?php echo $row['updated_date']; ?></td>
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

<?php 
include_once("../dependencies/scripts/scripts.js");
?>



