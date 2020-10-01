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
		<title>Leave Applications</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
			
			<div class="top-btn">
				<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">
				
				<input type="button" value="+ Apply Leave" class="all-btn-top" onclick="location.href='new_leave.php'">
			</div>
			

			<div id="data-table" class="table-display">
				<table class="table-content">
					<thead>
						<tr class="header">
							<th class="small-col">Leave Type</th>
							<th class="med-col">From Date</th>
							<th class="med-col">To Date</th>
							<th class="med-col">Days</th>
							<th class="med-col">From Hour</th>
							<th class="med-col">To Hour</th>
							<th class="med-col">Hour</th>
							<th class="small-col">Status</th>
							<th class="big-col">Reason</th>
						</tr>
					</thead>

					<tbody>
						<?php 
			            $get_AllLeaves = get_AllLeaves();
						while($row = mysqli_fetch_array($get_AllLeaves))
						{
						$rj = "Rejected";
						$leave_id = $row['leave_id'];

			            echo "
			            <tr class='tbl-link'>
							<td>".$row['leave_type']."</td>
							
							<td>".date('d-m-Y', strtotime($row['from_date']))."</td>
							<td>".date('d-m-Y', strtotime($row['to_date']))."</td>
							<td>".$row['days']."</td>

							<td>".$row['from_hour']."</td>
							<td>".$row['to_hour']."</td>
							<td>".$row['hours']."</td>
							

							<td>".$row['status']."</td>
							<td>".$row['reason']."</td>";

							
						if($row['status'] == "Pending") {?>
						<div id="claimApproval" class="tabcontent2">
							<form method="POST" id="approvalForm">
								<div id="dialog-background">
								</div>

								<div id="dialog-box">
									<input type="hidden" name="to" id="send-to" />
									<div id="dialog-body">Reason for Rejection</div>
										<form method="POST">
											<textarea name="textReason" class="reason" id="boxReason"></textarea>

											<div id="dialog-footer">
												<a href='' onclick="this.href='leave_approval.php?status=<?php echo $rj;?>&lid='+document.getElementById('send-to').value +'&reason='+document.getElementById('boxReason').value" class='submit-approval' name='reject'>Reject</a>
												<a href='' onclick="close()" class='back-approval'>Back</a>
											</div>
										</form>
								</div>

								<td>
                    				<a href='leave_approval.php?lid=<?php echo $row['leave_id'];?>&status=Approved&reason=-'''><button class='approve-button '>Accept</button></a>
								</td>
								<td>
									<button type="button" id="opendlg" onclick="formDialog('<?php echo $leave_id;?>')" class="reject-button ">Reject</button>
								</td>
                            
							</form>
						</div>

						<?php 
							}
			            		echo "</tr>";
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
