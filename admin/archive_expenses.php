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

				<input type="button" value="Current" class="all-btn-top" onclick="location.href='current_expenses.php'">
				
				<input type="button" value="Archive" class="all-btn-top active-buttons" onclick="location.href='archive_expenses.php'">	
			</div>

			<div id="data-table" class="table-display">
				<table class="table-content">
					<thead>
						<tr class="header">
							<th class="med-col">Date Created</th>
							<th class="med-col">Date on Invoice</th>
							<th class="med-col">Accounting Period</th>
							<th class="med-col">Account Code</th>
							<th class="med-col">Invoice No.</th>
							<th class="med-col">Supplier</th>
							<th class="big-col">Description</th>
							<th class="med-col">Amount(RM)</th>
							<th class="med-col">Payment Method</th>
							<th class="big-col">Invoice</th>
						</tr>
					</thead>

					<tbody>
						<?php
							$get_AllArchiveExpense = get_AllArchiveExpense();
							while($row = mysqli_fetch_array($get_AllArchiveExpense))
							{
								$get_PaymentMethod = get_PaymentMethod($row['method_id']);
								$methodRow = mysqli_fetch_array($get_PaymentMethod);
							?>
							
							<tr class="tbl-link" >
								<td><?php echo $row['expenses_date']; ?></td>
								<td><?php echo date('d-m-Y', strtotime($row['date_on_invoice'])); ?></td>
								<td><?php echo $row['acc_period']; ?></td>
								<td><?php echo $row['account_code']; ?></td>
								<td><?php echo $row['invoice_no']; ?></td>
								<td><?php echo $row['expenses_supplier']; ?></td>
								<td><?php echo $row['expenses_description']; ?></td>
								<td><?php echo number_format(str_replace(',', '', $row['expenses_amount']), 2); ?></td>
								<td><?php echo $methodRow['method']; ?></td>
								<?php
									echo "
											<td><a class='file-link mg' href='../upload/expenses/".$row['invoice']."' download>".$row['invoice']."</a></td>

										";
								?>

								<td>
                                    <?php
                                        $confirmation = "Are you sure about deleting the selected expense?";
                                    ?>
                                    <a href='delete.php?expenseid=<?php echo $row['expense_id'];?>' onclick="return confirm('<?php echo $confirmation; ?>')">
                                        <img src="../resources/images/bin.png" class='smicon'>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                        $restoreconfirmation = "Are you sure about restoring the selected expense?";
                                    ?>
                                    <a href='archive.php?expenseid=<?php echo $row['expense_id'];?>&status=Active' onclick="return confirm('<?php echo $restoreconfirmation; ?>')">
                                        <img src="../resources/images/restore.png" class='smicon'>
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