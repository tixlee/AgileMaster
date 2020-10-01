<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_SESSION['user_id']))
{
	$userId = $_SESSION["user_id"];
}


if(isset($_POST['edit']))
{
	$cpassword = $_POST['c-password'];
	$npassword = $_POST['n-password'];
	$rpassword = $_POST['r-password'];
	$opassword = strtoupper(md5($cpassword));

	$user = get_userPwd();
	$uRow = mysqli_fetch_array($user);

	if($opassword == $uRow['password']){
		if($new == $rpassword){

		}
	}


}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Change Password</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
        include_once('../navigation/side_nav.php');
		?>

		<div class="form-content">
            <form method="POST" action="" enctype="multipart/form-data">
				<?php 
					$result = select_user($userId);
					while($row = mysqli_fetch_array($result))
					{
				?>

					<p class="form-info-title">Change Password</p>

					<span class="info-lable">Current Password : </span><input type="text" name="c-password" class="big-input" autocomplete="off"></br>
					<span class="info-lable">New Password : </span><input type="text" name="n-password" class="big-input" autocomplete="off"></br>
					<span class="info-lable">Re-type New Password : </span><input type="text" name="r-password" class="big-input" autocomplete="off"></br>
					
					<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='dashboard.php'">

					<input type="submit" name="edit" value="Edit" class="submit-btn">

				<?php
					}
				?>
			</form>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>