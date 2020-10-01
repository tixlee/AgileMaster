<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

if(isset($_POST['upload']))
{	

	$date_uploaded = date('d-m-Y');

	$name = strip_tags($_POST['name']);
	$name = mysqli_real_escape_string($conn, $name);


	$fileCount = count($_FILES['file']['name']);
		for($i=0; $i<$fileCount; $i++){
		
			$fileName = $_FILES['file']['name'][$i];
			$target_dir = "../upload/dashboard_files/";


			$check_filename= check_filename($fileName);
			$rowcount=mysqli_num_rows($check_filename);

			if($rowcount == 0)

			{	
				insert_file($date_uploaded, $name, $fileName);
				move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
				header('location: current_dashboard_file.php');
			}

			else
			{
				?>
					<script>
						alert("File name has been taken, please change your file's name and try again.");
					</script>
				<?php
			}		
		}
}

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
                <input type="button" value="Current" class="all-btn-top active-buttons"  onclick="location.href='current_dashboard_file.php'">
                <input type="button" value="Archive" class="all-btn-top"  onclick="location.href='archive_dashboard_file.php'">
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
							$get_AllActiveDashboardfile = get_AllActiveDashboardfile();
							while($row = mysqli_fetch_array($get_AllActiveDashboardfile))
							{
							?>
							
							<tr class="tbl-link" >
								<td><?php echo $row['name']; ?></td>

								<?php
									echo "
											<td><a class='file-link mg' href='../upload/dashboard_files/".$row['file']."' download>".$row['file']."</a></td>

										";
								?>

								<td><?php echo date('d-m-Y', strtotime($row['date_uploaded'])); ?></td>

								<td>
									<?php
										$confirmation = "Are you sure about archiving the selected file?";
									?>
									<a href='archive.php?fileid=<?php echo $row['file_id'];?>&status=Archive' onclick="return confirm('<?php echo $confirmation; ?>')">
											<img src="../resources/images/cardboard-box.png" class='smicon'>
									</a>
								</td>
							</tr>
						<?php
							}
						?>
					</tbody>
					</table>
				</div>
		
				<input type="submit" value="Add Files" class="submit-btn" onclick="openFile()">
				<button type="submit" value="" class="back-btn" onclick="location.href='dashboard.php'">Back</button>

			

			<div class="fs-popup" id="fs-form">
				<form method="POST" enctype="multipart/form-data">
					
					<div class="fs-popup-one">
						<input type="text" name="name" id="file-name" placeholder="File Name" autocomplete="off" required>
					</div>

					<div class="fs-popup-three">
						<input type="file" name="file[]" class="custom-fs-input" id="custom-fs-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
					</div>

					<div class="fs-popup-two">
						<input type="submit" name="upload" value="Upload" id="submit-fs" class="submit-fs">
						<input type="button" name="submit" value="Back" id="back-fs" class="back-fs" onclick="closeFile()">
					</div>
					
				</form>
			</div>
		</div>
		<script src="../dependencies/scripts/file_upload.js"></script>
    </body>
</html>
