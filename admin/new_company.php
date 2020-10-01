<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';



if(isset($_POST['create']))  
{
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date_created = date('d-m-Y');
    
    $name = $_POST['name'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $office_no = $_POST['office_no'];
    $address = $_POST['address'];
    $remarks = $_POST['remarks'];

    $fileCount = count($_FILES['file']['name']);
	for($i=0; $i<$fileCount; $i++){
		
		$fileName = $_FILES['file']['name'][$i];
        $target_dir = "../upload/company/";
        
        $check_company= check_company($fileName);
        $rowcount=mysqli_num_rows($check_company);
        
        if($rowcount == 0)

		{

            insert_company($date_created, $name, $contact_person, $email, $mobile_no, $office_no, $address, $remarks, $fileName);
            move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
            header('location: ../admin/current_company.php');

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
		<title>Company</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="form-content">
        <form method="POST" action="" enctype="multipart/form-data">
				<p class="form-info-title">Company Details</p>

                <!-- <input type="text" name="date_created" class="tdy-date" placeholder="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo (date('d-m-Y'));?>" readonly></br> -->

                <input type="text" name="name" class="big-input" placeholder="Company Name" autocomplete="off">

                <input type="text" name="contact_person" class="big-input" placeholder="Contact Person" autocomplete="off"></br>

                <input type="text" name="mobile_no" class="big-input" placeholder="Mobile No." autocomplete="off">

                <input type="text" name="office_no" class="big-input" placeholder="Office No." autocomplete="off"></br>

                <input type="text" name="email" class="big-input" placeholder="Email" autocomplete="off"></br>

                <textarea name="address" class="big-textarea" placeholder="Address" required></textarea></br>

				<textarea name="remarks" class="big-textarea" placeholder="Remarks" required></textarea></br>

				<input type="file" name="file[]" id="file" class="custom-company-file-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></br>

				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='current_company.php'">
				<input type="submit" name="create" value="Submit" class="submit-btn">
			</form>
		</div>

    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
