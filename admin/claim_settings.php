<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['create']))
{
	$date_created = date('d-m-Y');

	$type = $_POST['type'];
	$code = $_POST['code'];

	insert_claimtype($type, $code, $date_created);
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>Settings</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
			<div class="top-btn">
				<input type="button" value="Resume Category" class="all-btn-top"  onclick="location.href='resume_settings.php'">
				
				<input type="button" value="Claim Types" class="all-btn-top active-buttons">
			</div>

			<div class="settings">
				<div id="data-table" class="table-display">
					<table class="table-content">
						<thead class="header">
							<th class="med-col">Claim Types</th>
							<th class="big-col">Claim Code</th>
							<th class="med-col">Date Created</th>
						</thead>
                        <tbody>
                            <?php 
                                $get_AllClaimType = get_AllClaimType();
                            
                                while($row = mysqli_fetch_array($get_AllClaimType))
                                {
                            ?>
                                    <tr class='tbl-link'>
										<td><?php echo $row['type']; ?></td>
										<td><?php echo $row['code']; ?></td>

                                        <td><?php echo $row['date_created']; ?></td>
                                        <td>
                                            <?php
                                                $confirmation = "Are you sure about archiving the selected claim type?";
                                            ?>
                                            <a href='delete.php?typeid=<?php echo $row['type_id'];?>' onclick="return confirm('<?php echo $confirmation; ?>')">
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

				<div class="cat-settings">
					<p class="form-info-title">Add New Claim Type</p>

					<form method="POST">
						<input type="text" name="type" class="med-input" placeholder="Claim Type" autocomplete="off" required></br>
						<input type="text" name="code" class="small-input" placeholder="Claim Code" autocomplete="off" required></br>

						<input type="submit" name="create" class="submit-btn" value="Add">
						<input type="reset" class="back-btn" value="Clear">
					</form>
				</div>
			</div>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>