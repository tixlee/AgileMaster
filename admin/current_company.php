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
		<title>Expenses</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
			<div class="top-btn">
				<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">

				<input type="button" value="Current" class="all-btn-top active-buttons" onclick="location.href='current_company.php'">

				<input type="button" value="Archive" class="all-btn-top" onclick="location.href='archive_company.php'">
				
				<input type="button" value="+ New Company" class="all-btn-top" onclick="location.href='new_company.php'">
			</div>

			<div id="data-table" class="table-display">
				<table class="table-content">
					<thead>
						<tr class="header">
							<th class="big-col">Company Name</th>
							<th class="med-col">Contact Person</th>
							<th class="med-col">Phone Number</th>
							<th class="med-col">Office Number</th>
							<th class="med-col">Email</th>
							<th class="big-col">Address</th>
							<th class="big-col">Remarks</th>
						</tr>
					</thead>

					<tbody>
						<?php 
			            	$get_AllActiveCompany = get_AllActiveCompany();
						
							while($row = mysqli_fetch_array($get_AllActiveCompany))
							{
						?>
								<tr class='tbl-link'>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['name']; ?></td>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['contact_person']; ?></td>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['phone_no']; ?></td>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['office_no']; ?></td>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['email']; ?></td>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['address']; ?></td>
									<td onclick="location.href='view_company.php?companyid=<?php echo $row['company_id']; ?>'"><?php echo $row['remarks']; ?></td>
									<td>
										<?php
											$confirmation = "Are you sure about archiving the selected company?";
										?>
										<a href='archive.php?companyid=<?php echo $row['company_id'];?>&status=Archive' onclick="return confirm('<?php echo $confirmation; ?>')">
                                                <img src="../resources/images/cardboard-box.png" class='smicon'>
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