<?php
session_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

$claimid = $_GET['claimid'];
$get_claim = get_claim($claimid);
$cRow = mysqli_fetch_array($get_claim);

if(isset($_GET['claimid']))
{
	$editC = $_GET['claimid'];
}

if(isset($_POST['edit']))
{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$claim_date = date('d-m-Y');

	$type_id = $_POST['claim_type'];

	$get_ClaimType = get_ClaimType($type_id);
	$typeRow = mysqli_fetch_array($get_ClaimType);
	$claim_code = $typeRow['code'] .'-'. $typeRow['count'];

	$other = $_POST['other_specification'];
	$distance = $_POST['distance'];

	$purpose = $_POST['claim_purpose'];
	$date_on_receipt = $_POST['date_on_receipt'];
	$amount = $_POST['claim_amount'];

	$fileCount = count($_FILES['file']['name']);
	for($i=0; $i<$fileCount; $i++){
		
		$fileName = $_FILES['file']['name'][$i];
		$target_dir = "..upload/claims/";

		$check_claims = check_claims($fileName);
		$rowcount = mysqli_num_rows($check_claims);

		if($rowcount == 0 && $fileName !="")
		{
			$file_switch = true;
			edit_claim($editC, $claim_date, $type_id, $claim_code, $other, $distance, $purpose, $date_on_receipt, $amount, $_SESSION['user_id'], $fileName, $file_switch);
			move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
			header('location: ../admin/claims.php');
		}

		else if($rowcount == 0 && $fileName =="")
		{
			$file_switch = false;
			edit_claim($editC, $claim_date, $type_id, $claim_code, $other, $distance, $purpose, $date_on_receipt, $amount, $_SESSION['user_id'], $fileName, $file_switch);
			header('location: ../admin/claims.php');
		}

		else
		{
			?>
				<script>
					alert("Dcoument name has been taken, please change your document's name and try again.");
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
		<title>View Claim</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');

		$get_claim = get_claim($claimid);
		$cRow = mysqli_fetch_array($get_claim);

		$get_OneClaim = get_OneClaim($cRow['type_id']);
		$tRow = mysqli_fetch_array($get_OneClaim);

		$get_Assignee = get_Assignee($cRow['user_id']);
		$aRow = mysqli_fetch_array($get_Assignee);
		?>

		<div class="form-content">
			<form method="POST" action="" enctype="multipart/form-data">
			<p class="form-info-title">Edit Claim Details</p>


				<div>
					<select id="select" class="med-dropdown" name="claim_type" required>
						<option value="" selected disabled>Claim Type</option>
						<?php
							$selectedType = $cRow['type_id'];
							$get_AllClaimTypes = get_AllClaimTypes();
							while($typeRow = mysqli_fetch_array($get_AllClaimTypes)){
						?>
							<option value="<?php echo $typeRow['type_id']; ?>" <?php if($selectedType== $typeRow['type_id']) echo 'selected'; ?>><?php echo $typeRow['type']; ?></option>
						<?php
							}
						?>

					</select>

					<input type="text" id="txt" name="other_specification" class="small-input"/>
					<input type="text" id="tmt" name="distance" class="small-input"/>
				</div>

					<input type="date" name="date_on_receipt" class="small-input" value="<?php echo $cRow['date_on_receipt'];?>"  required autocomplete="off">

					<input type="number" name="claim_amount"class="small-input"  onchange="setTwoNumberDecimal" min="0" max="100000" step="0.01" value="<?php echo $cRow['claim_amount'];?>" autocomplete="off"/></br>

					<textarea type="text" name="claim_purpose" class="small-textarea" autocomplete="off" required><?php echo $cRow['claim_purpose']; ?></textarea></br>

					<label class="info-lable">Initial Doc : <input type="text" class="med-input" value="<?php echo $cRow['receipt'];?>" readonly></label></br>

					<input type="file" name="file[]" id="file" class="custom-leave-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></br>

					<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='claims.php'">

					<input type="submit" name="edit" value="Edit" class="submit-btn">
			</form>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>