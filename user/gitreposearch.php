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

?>

<!DOCTYPE html>
<html>
<head>
  
	<title>AgileMaster | GitHub Repo Search</title>
	<?php include('../navigation/head.php');?>
	<!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./github/style.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include('../navigation/topbar.php');?>
		<?php include('../navigation/user_sidebar.php');?>

		<div class="content-wrapper">
			<br>	
			<div class="container-fluid">
				<div class="container">
					<div class="searchContainer">
						<h2>Search Github Users</h2>
						<p class="lead">Enter a username to fetch a users profile info and repos</p>
						<input type="text" id="searchUser" class="form-control" placeholder="GitHub Username">
					</div>
					<br>
					<div id="profile"></div>
				</div>
			</div>
			<aside class="control-sidebar control-sidebar-dark">
			</aside>
		</div> 
	</div>
 
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
	<script src="./github/reposearch.js"></script>

	<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
	<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
	<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="../dependencies/scripts/datatables-demo.js"></script>   
	<script src="../dependencies/scripts/scripts.js"></script>
	<script src="../dependencies/navigation/js/adminlte.js"></script>

</body>
</html>
