<?php
session_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Dashboard - Files</title>
	</head>

	<body>

		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">

            <div class="top-btn">     
                <input type="button" value="Current" class="all-btn-top"  onclick="location.href='current_dashboard_file.php'">
                <input type="button" value="Archive" class="all-btn-top active-buttons"  onclick="location.href='archive_dashboard_file.php'">
            </div>
            
            
			<div id="data-table" class="table-display file-width">
				<table class="table-content">
					<thead class="header">
						<th class="med-col">File Name</th>
						<th class="big-col">File</th>
						<th class="med-col">Date Uploaded</th>
					</thead>
					<tbody>
					<?php
						$get_AllArchiveDashboardfile = get_AllArchiveDashboardfile();
						while($row = mysqli_fetch_array($get_AllArchiveDashboardfile))
						{
						?>
						
						<tr class="tbl-link" >
							<td><?php echo $row['name']; ?></td>

							<td><?php echo $row['file']; ?></td>

							<td><?php echo date('d-m-Y', strtotime($row['date_uploaded'])); ?></td>

							<td>
								<?php
									$confirmation = "Are you sure about deleting the selected file?";
								?>
								<a href='delete.php?fileid=<?php echo $row['file_id'];?>' onclick="return confirm('<?php echo $confirmation; ?>')">
									<img src="../resources/images/bin.png" class='smicon'>
								</a>
							</td>
							<td>
								<?php
									$restoreconfirmation = "Are you sure about restoring the selected file?";
								?>
								<a href='archive.php?fileid=<?php echo $row['file_id'];?>&status=Active' onclick="return confirm('<?php echo $restoreconfirmation; ?>')">
									<img src="../resources/images/restore.png" class='smicon'>
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
		<script src="../dependencies/scripts/file_upload.js"></script>
    </body>
</html>
