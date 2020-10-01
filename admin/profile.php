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
	
	$name = $_POST['name'];
	$ic = $_POST['ic'];
	$phone_no = $_POST['phone_no'];
	$email = $_POST['email'];

	edit_profile($userId, $name, $ic, $phone_no, $email);

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Profile</title>
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

                <p class="form-info-title">User Details</p>

                <input type="text" name="name" class="big-input" value="<?php echo $row['name'];?>" autocomplete="off"></br>

                <input type="text" name="ic" class="big-input" value="<?php echo $row['ic_no'];?>" autocomplete="off"></br>

                <input type="text" name="phone_no" class="big-input" value="<?php echo $row['phone_no'];?>"autocomplete="off"></br>

                <input type="text" name="email" class="big-input" value="<?php echo $row['email'];?>" autocomplete="off"></br>

                <input type="text" name="role" class="small-input" value="<?php echo $row['role'];?>" readonly></br>

                <input type="text" name="designation" class="small-input" value="<?php echo $row['designation'];?>" readonly></br>
	
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