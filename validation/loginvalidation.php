<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	if (isset($_POST['login'])) 
	{
		if(isset($_POST['email']) && isset($_POST['password'])) 
		{
			$email =  strip_tags($_POST['email']);
			$password = strip_tags($_POST['password']);

			$email = mysqli_real_escape_string($conn, $email);
			$password = mysqli_real_escape_string($conn, $password);

			//$password = strtoupper(md5($password));

			$checkEmail = mysqli_query($conn, "SELECT email FROM `users` WHERE email = '$email'") or exit(mysqli_error($conn));

			if(mysqli_num_rows($checkEmail) >= 1) 
			{
				$checkRole = mysqli_query($conn, "SELECT * FROM `users` WHERE  email = '".$_POST['email']."' AND password='".md5($_POST['password'])."' ") or exit(mysqli_error($conn));

				if(mysqli_num_rows($checkRole) >= 1) 
				{
					while($row = mysqli_fetch_array($checkRole)) 
						{ 
							$role = $row['role'];
							$userId = $row['user_id'];
                            $_SESSION["user_id"] = $userId;
							$_SESSION["role"] = $role;
							header("Location: ../user/dashboard.php");
						} 
				}
				else 
				{
				?>
					<script>alert('Wrong Password. Please Try Again.');</script>
				<?php
				}

			}else 
			{
				?>
					<script> alert('Account Does Not Exist. Please Try Again.'); </script>
				<?php
			}
		}
	}
}
?>

