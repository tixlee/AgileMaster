<?php
session_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['create'])) 
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
        $target_dir = "../upload/claims/";
        
        $check_claims= check_claims($fileName);
        $rowcount=mysqli_num_rows($check_claims);
        
        if($rowcount == 0)

		{

            insert_claim($claim_date, $type_id, $claim_code, $other, $distance, $purpose, $date_on_receipt, $amount, $user_id, $fileName);
            move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
            header('location: ../admin/claims.php');

        }

        else
		{
			?>
			<script>
				alert("Dcoument name has been taken, please change your document's name and try again");
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
		<title>New Claims</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="form-content">
			<form method="POST" action="" enctype="multipart/form-data">
				<p class="form-info-title">Claim Details</p>

				<!-- <input type="text" name="claim_date" id="claim-date" placeholder="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo (date('d-m-Y'));?>" readonly> -->	

				<div class="claim-type">
					<select id="select" class="med-dropdown" name="claim_type" required>
						<option value="" selected disabled>Claim Type</option>
						<?php
							$get_AllClaimTypes = get_AllClaimTypes();
							while($typeRow = mysqli_fetch_array($get_AllClaimTypes)){
						?>
							<option value="<?php echo $typeRow['type_id']; ?>"><?php echo $typeRow['type']; ?></option>
						<?php
							}
						?>

					</select>

					<input type="text" id="txt" name="other_specification" class="small-input" placeholder="Please specify."/>

					<input type="text" id="tmt" name="distance" class="small-input" placeholder="Distance (KM)"/>
				</div>
				
				<input type="text" name="date_on_receipt" class="small-input" placeholder="Date on Receipt" onfocus="(this.type='date')" onblur="(this.type='text')" required autocomplete="off">

				<input type="text" name="claim_amount" class="small-input"  onchange="setTwoNumberDecimal" min="0" max="100000" step="0.01" onfocus="(this.type='number')" onblur="(this.type='text')" placeholder="Amount (RM)" autocomplete="off"/></br>

				<textarea type="text" name="claim_purpose" class="small-textarea" placeholder="Purpose"  autocomplete="off" required></textarea></br>

				<input type="file" name="file[]" id="file" class="custom-leave-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></br>
				
				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='claims.php'">

				<input type="submit" name="create" value="Save" class="submit-btn">

			</form>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>