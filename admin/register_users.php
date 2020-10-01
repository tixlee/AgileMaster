<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

if(isset($_POST['create']))  
{

    $date_created = date('d-m-Y');
    
    $name = strip_tags($_POST['name']);
    $ic = strip_tags($_POST['ic']);
    $email = strip_tags($_POST['email']);
    $role = strip_tags($_POST['role']);
    $phone_no = strip_tags($_POST['phone_no']);
    $designation = strip_tags($_POST['designation']);

    $name = mysqli_real_escape_string($conn, $name);
    $ic = mysqli_real_escape_string($conn, $ic);
    $email = mysqli_real_escape_string($conn, $email);
    $role = mysqli_real_escape_string($conn, $role);
    $phone_no = mysqli_real_escape_string($conn, $phone_no);
    $designation = mysqli_real_escape_string($conn, $designation);

    $fileCount = count($_FILES['file']['name']);
	for($i=0; $i<$fileCount; $i++){
		
		$fileName = $_FILES['file']['name'][$i];
        $target_dir = "../upload/users/";
        
        $check_company= check_company($fileName);
        $rowcount=mysqli_num_rows($check_company);
        
        if($rowcount == 0)

		{

            insert_user($date_created, $name, $ic, $email, $role, $phone_no, $fileName, $designation);
            move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
            header('location: ../admin/users.php');

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
		<title>User Registeration</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="form-content">
            <form method="POST" action="" enctype="multipart/form-data">

                <p class="form-info-title">User Details</p>

                <input type="text" name="name" class="big-input" placeholder="Full Name" autocomplete="off" required></br>

                <input type="text" name="ic" class="big-input" placeholder="IC Number" autocomplete="off" required></br>

                <input type="text" name="email" class="big-input" placeholder="Email" autocomplete="off" required></br>
                
                <input type="text" name="phone_no" class="big-input" placeholder="Phone No." autocomplete="off" required></br>

                <input type="text" name="designation" class="big-input" placeholder="Designation" autocomplete="off" required></br>

                <select class="med-dropdown" name="role">
                    <option value="" selected disabled>Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Accounts">Accounts</option>
                    <option value="Staff">Staff</option>
                </select></br>

                <input type="file" name="file[]" id="file" class="custom-icon-input" accept="image/*" required></br>

                <input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='users.php'">

                <input type="submit" name="create" value="Save" class="submit-btn"  onclick="location.href='users.php'">
                
            </form>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>
