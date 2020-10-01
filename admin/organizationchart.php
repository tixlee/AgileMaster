<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['upload']))
{
	$target_dir = "../upload/charts/oc.png";
	move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);

	header('location: organizationchart.php');
}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Organization Chart</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="content">
			<div  class="oc-display">
				<img class="oc-photo" src="../upload/charts/oc.png">
			</div>

			<div class="oc-button">
				<div class="oc-button-one">
					<input type="button" name="submit" value="Update Chart" id="update-chart" class="update-chart" onclick="openForm()">
				</div>
			</div>

			<div class="oc-popup" id="oc-form">
				<form method="POST" enctype="multipart/form-data">
					<div class="oc-popup-one">
						<input type="file" name="image" class="custom-oc-input" id="custom-oc-input" accept="image/*" required>
					</div>

					<div class="oc-popup-two">
						<input type="button" name="submit" value="Back" id="back-oc" class="back-oc" onclick="closeForm()">
						<input type="submit" name="upload" value="Save" id="submit-oc" class="submit-oc">
					</div>
				</form>
			</div>

		</div>

    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
