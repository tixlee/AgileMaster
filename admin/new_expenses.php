<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_POST['create']))
{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$expenses_date = date('d-m-Y');

	$method_id = $_POST['pay_method'];

	$date_on_invoice = $_POST['date_on_invoice'];
	$expenses_acc_period = $_POST['expenses_acc_period'];
	$expenses_acc_code = $_POST['expenses_acc_code'];
	$expenses_invoice_no = $_POST['expenses_invoice_no'];
	$expenses_supplier = $_POST['expenses_supplier'];
	$expenses_description = $_POST['expenses_description'];
	$expenses_amount = $_POST['expenses_amount'];

	$fileCount = count($_FILES['file']['name']);
	for($i=0; $i<$fileCount; $i++){
		
		$fileName = $_FILES['file']['name'][$i];
        $target_dir = "../upload/expenses/";
        
        $check_expenses= check_expenses($fileName);
        $rowcount=mysqli_num_rows($check_expenses);
        
        if($rowcount == 0)

		{

            insert_expense($expenses_date, $date_on_invoice, $expenses_acc_period, $expenses_acc_code, $expenses_invoice_no, $expenses_supplier, $expenses_description, $expenses_amount, $fileName, $method_id, $_SESSION['user_id']);
			move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
			header('location: ../admin/current_expenses.php');

        }

        else
		{
			?>
			<script>
				alert("Dcoument name has been taken, please change your document's name and try again");
			</script>
			<?php
		}
		
	}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>New Expenses</title>
	</head>

	<body>
		
		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="form-content">
			<form method="POST" action="" enctype="multipart/form-data">
				<p class="form-info-title">Expenses Details</p>

				<input type="text" name="date_on_invoice" class="small-input" placeholder="Date on Invoice" onfocus="(this.type='date')" onblur="(this.type='text')" required autocomplete="off">

				<input type="text" name="expenses_acc_period" class="small-input" placeholder="Accounting Period" onfocus="(this.type='month')" onblur="(this.type='text')" required autocomplete="off"></br>
				
				<input type="text" name="expenses_acc_code" class="small-input" placeholder="Account Code" required autocomplete="off">

				<input type="text" name="expenses_invoice_no" class="small-input" placeholder="Invoice No" required autocomplete="off"></br>

				<input type="text" name="expenses_supplier" class="small-input" placeholder="Supplier" autocomplete="off">
		
				<input type="text" name="expenses_amount" class="small-input" onchange="setTwoNumberDecimal" min="0" max="1000000" step="0.01" onfocus="(this.type='number')" onblur="(this.type='text')" placeholder="Amount (RM)" autocomplete="off">

				<select class="med-dropdown" name="pay_method">
					<option value="" selected disabled>Payment Method</option>
					<?php
						$get_AllPaymentMethod = get_AllPaymentMethod();
						while($methodRow = mysqli_fetch_array($get_AllPaymentMethod)){
					?>
					<option value="<?php echo $methodRow['method_id']; ?>"><?php echo $methodRow['method']?></option>
					<?php
						}
					?>
				</select></br>
				
				<textarea type="text" name="expenses_description" class="v-big-textarea" placeholder="Description" autocomplete="off"></textarea></br>
				
				<input type="file" name="file[]" id="file" class="custom-leave-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required></br>
	
				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='current_expenses.php'">

				<input type="submit" name="create" value="Save" class="submit-btn">
			</form>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>