<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Register Users</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
			<div class="top-btn">
			<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">
			
				<input type="button" value="+ New User" class="all-btn-top" onclick="location.href='register_users.php'">
			</div>

			<div class="table-display">
				<table class="table-content">
					<thead>
						<tr class="header">
							<th class="big-col">Name</th>
							<th class="med-col">Designation</th>
							<th class="small-col">Role</th>
                            <th class="big-col">Email</th>
                            <th class="med-col">Phone No.</th>
							<th class="med-col">Date Created</th>
						</tr>
					</thead>

					<tbody>
                            <?php 
                                $get_AllUsers = get_AllUsers();
                            
                                while($row = mysqli_fetch_array($get_AllUsers))
                                {
                            ?>
                                    <tr class='tbl-link'>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['designation']; ?></td>
                                        <td><?php echo $row['role']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['phone_no']; ?></td>
										<td><?php echo $row['date_created']; ?></td>
                                        <td>
                                            <?php
                                                $confirmation = "Are you sure about deleting the selected user?";
                                            ?>
                                            <a href='delete.php?userid=<?php echo $row['user_id'];?>' onclick="return confirm('<?php echo $confirmation; ?>')">
                                                <img src="../resources/images/bin.png" class='smicon'>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }	
                            ?>
                        </tbody>
				</table>
			</div>
		</div>

    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>