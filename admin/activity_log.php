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
		<title>Company</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">

			<div class="table-display-2">
				<table class="table-content">
					<thead>
						<tr class="header">
							<th class="log-col-1">Activity</th>
							<th class="log-col-2">Date/Time</th>
						</tr>
					</thead>

					<tbody>
						<?php 
			            	$get_AllActivityLog = get_AllActivityLog();
						
							while($row = mysqli_fetch_array($get_AllActivityLog))
							{
                                $get_user = get_user($row['user_id']);
                                $userRow = mysqli_fetch_array($get_user);
                                if($row['action'] == "Login"){
                                    echo "
                                    <tr>
                                        <td class='log-col-1 log-col-content'>Staff ".$userRow['name']." logged in</td>
                                        <td class='log-col-2'>".$row['date'].", ".$row['time']."</td>
                                    </tr>";
                                } else if ($row['action'] == "Add") {
                                    echo "
                                    <tr>
                                        <td class='log-col-1 log-col-content'>".ucfirst($row['role'])." ".$userRow['name']." added a new ".$row['section']." named ".$row['item']."</td>
                                        <td class='log-col-2'>".$row['date']."</td>
                                    </tr>";
                                }
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
