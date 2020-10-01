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
		<title>Claims</title>

	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
			
			<div class="top-btn">

				<input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">

				<input type="button" value="+ New Claims" class="all-btn-top" onclick="location.href='new_claims.php'">

				<form method="POST" action="export_claims.php">
					<input type="submit" name="export" value="Export" class="all-btn-top">
				</form>
				
			</div>

			<div id="data-table" class="table-display">
				<table class="table-content">
					<thead>
						<tr class="header">
							<th class="med-col">Claim Id</th>
							<th class="big-col">Name</th>
							<th class="med-col">Date Created</th>
							<th class="med-col">Claim Type</th>
							<th class="big-col">Claim Purpose</th>
							<th class="med-col">Amount(RM)</th>
							<th class="big-col">Receipt</th>
							<th class="small-col">Status</th>
							<th class="big-col">Reason</th>
						</tr>
					</thead>

					<tbody>
						<?php 
			            $get_AllCLaims = get_AllCLaims();
						while($row = mysqli_fetch_array($get_AllCLaims))
						{

						$get_OneClaim = get_OneClaim($row['type_id']);
						$claimRow = mysqli_fetch_array($get_OneClaim);

						$get_Assignee = get_Assignee($row['user_id']);
						$assigneeRow = mysqli_fetch_array($get_Assignee);

						$rj = "Rejected";
						$claim_id = $row['claim_id'];
						?>
			            <tr class='tbl-link'>
							
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo $row['claim_code']; ?></td>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo $assigneeRow['name']; ?></td>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo date('d-m-Y', strtotime($row['date_on_receipt'])); ?></td>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo $claimRow['type']; ?></td>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo $row['claim_purpose']; ?></td>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo number_format(str_replace(',', '', $row['claim_amount']), 2); ?></td>
							
							
							<?php
								echo "
										<td><a class='file-link mg' href='../upload/claims/".$row['receipt']."' download>".$row['receipt']."</a></td>

									";
							?>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo $row['status']; ?></td>
							<td onclick="location.href='view_claims.php?claimid=<?php echo $row['claim_id']; ?>'"><?php echo $row['reason']; ?></td>

						<?php	
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
												<a href='' onclick="this.href='claim_approval.php?status=<?php echo $rj;?>&cid='+document.getElementById('send-to').value +'&reason='+document.getElementById('boxReason').value" class='submit-approval'>Reject</a>
												<a href='' onclick="close()" class='back-approval'>Back</a>
											</div>
										</form>
								</div>

								<td>
                    				<a href='claim_approval.php?cid=<?php echo $row['claim_id'];?>&status=Approved&reason=-'''><button class='approve-button '>Approve</button></a>
								</td>
								<td>
									<button type="button" id="opendlg" onclick="formDialog('<?php echo $claim_id;?>')" class="reject-button ">Reject</button>
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

