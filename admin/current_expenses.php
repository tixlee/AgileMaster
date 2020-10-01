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
				<input type="button" value="Current" class="all-btn-top active-buttons" onclick="location.href='current_expenses.php'">

				<input type="button" value="Archive" class="all-btn-top" onclick="location.href='archive_expenses.php'">
				
				<input type="button" value="+ New Expenses" class="all-btn-top" onclick="location.href='new_expenses.php'">

				<form method="POST" action="export_expenses.php">
					<input type="submit" name="export" value="Export" class="all-btn-top">
				</form>
				
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
							$get_AllActiveExpense = get_AllActiveExpense();
							while($row = mysqli_fetch_array($get_AllActiveExpense))
							{
								$get_PaymentMethod = get_PaymentMethod($row['method_id']);
								$methodRow = mysqli_fetch_array($get_PaymentMethod);
							?>
							
							<tr class="tbl-link" >
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $row['expenses_date']; ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo date('d-m-Y', strtotime($row['date_on_invoice'])); ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $row['acc_period']; ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $row['account_code']; ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $row['invoice_no']; ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $row['expenses_supplier']; ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $row['expenses_description']; ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo number_format(str_replace(',', '', $row['expenses_amount']), 2); ?></td>
								<td onclick="location.href='view_expenses.php?expenseid=<?php echo $row['expense_id']; ?>'"><?php echo $methodRow['method']; ?></td>
								<?php
									echo "
											<td><a class='file-link mg' href='../upload/expenses/".$row['invoice']."' download>".$row['invoice']."</a></td>

										";
								?>

								<td>
									<?php
										$confirmation = "Are you sure about archiving the selected expense?";
									?>
									<a href='archive.php?expenseid=<?php echo $row['expense_id'];?>&status=Archive' onclick="return confirm('<?php echo $confirmation; ?>')">
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