<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['create']))
{
	$datecreated = date('d-m-Y');

	$name = $_POST['name'];
	$code = $_POST['code'];

	insert_resumecat($name, $code, $datecreated);
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
				<input type="button" value="Resume Category" class="all-btn-top active-buttons">
				
				<input type="button" value="Claim Types" class="all-btn-top"  onclick="location.href='claim_settings.php'">
			</div>

			<div class="settings">
				<div id="data-table" class="table-display">
					<table class="table-content">
						<thead class="header">
							<th class="med-col">Category</th>
							<th class="big-col">Code</th>
							<th class="med-col">Date Created</th>
						</thead>
                        <tbody>
                            <?php 
                                $get_ResumeCat = get_ResumeCat();
                            
                                while($row = mysqli_fetch_array($get_ResumeCat))
                                {
                            ?>
                                    <tr class='tbl-link'>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['code']; ?></td>
                                        <td><?php echo $row['datecreated']; ?></td>
                                        <td>
                                            <?php
                                                $confirmation = "Are you sure about archiving the selected category?";
                                            ?>
                                            <a href='delete.php?catid=<?php echo $row['cat_id'];?>' onclick="return confirm('<?php echo $confirmation; ?>')">
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
					<p class="form-info-title">Add New Category</p>

					<form method="POST">
						<input type="text" name="name" class="med-input" placeholder="Category Name" autocomplete="off"></br>
						<input type="text" name="code" class="small-input" placeholder="Category Code" autocomplete="off"></br>

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