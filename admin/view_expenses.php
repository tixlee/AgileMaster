<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

if(isset($_GET['expenseid']))
{
	$editED = $_GET['expenseid'];
}


if(isset($_POST['edit']))
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
        
        $check_expenses = check_expenses($fileName);
        $rowcount = mysqli_num_rows($check_expenses);
        
        if($rowcount == 0 && $fileName !="")
		{
            $file_switch = true;
            edit_expense($editED,$expenses_date, $date_on_invoice, $expenses_acc_period, $expenses_acc_code, $expenses_invoice_no, $expenses_supplier, $expenses_description, $expenses_amount, $fileName, $method_id, $_SESSION['user_id'], $file_switch);
            move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir.$fileName);
            header('location: ../admin/current_expenses.php');
        }

        else if($rowcount == 0 && $fileName == "")
        {
            $file_switch = false;
            edit_expense($editED,$expenses_date, $date_on_invoice, $expenses_acc_period, $expenses_acc_code, $expenses_invoice_no, $expenses_supplier, $expenses_description, $expenses_amount, $fileName, $method_id, $_SESSION['user_id'], $file_switch);
            header('location: ../admin/current_expenses.php');

        }

        else
		{
			?>
			<script>
				alert("Dcoument name has been taken, please change your document's name and try again.");
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
            
                <?php 
                    $allExpenses = get_Expenses($editED);
                    $row = mysqli_fetch_array($allExpenses);
                ?>

				<p class="form-info-title">Expenses Details</p>

				<input type="date" name="date_on_invoice" class="small-input" value="<?php echo $row['date_on_invoice'];?>" required autocomplete="off">

				<input type="text" name="expenses_acc_period" class="small-input" value="<?php echo $row['acc_period'];?>" onfocus="(this.type='month')" onblur="(this.type='text')" required autocomplete="off"></br>
				
				<input type="text" name="expenses_acc_code" class="small-input" value="<?php echo $row['account_code'];?>" required autocomplete="off">

				<input type="text" name="expenses_invoice_no" class="small-input" value="<?php echo $row['invoice_no'];?>" required autocomplete="off"></br>

				<input type="text" name="expenses_supplier" class="small-input" value="<?php echo $row['expenses_supplier'];?>" autocomplete="off">
		
				<input type="number" name="expenses_amount" class="small-input" onchange="setTwoNumberDecimal" min="0" max="1000000000" step="0.01"  value="<?php echo $row['expenses_amount'];?>" autocomplete="off">

				<select class="med-dropdown" name="pay_method">
					<option value="" selected disabled><?php echo $row['method_id'];?></option>
					<?php
						$get_AllPaymentMethod = get_AllPaymentMethod();
						while($methodRow = mysqli_fetch_array($get_AllPaymentMethod)){
					?>
					<option value="<?php echo $methodRow['method_id']; ?>"><?php echo $methodRow['method']?></option>
					<?php
						}
					?>
				</select></br>
				
                <textarea type="text" name="expenses_description" class="v-big-textarea" placeholder="Description" autocomplete="off"><?php echo $row['expenses_description'];?></textarea></br>
                
                <label class="info-lable">Initial Doc : <input type="link-text" class="big-input" value="<?php echo $row['invoice'];?>" readonly></label></br>
                
				<input type="file" name="file[]" id="file" class="custom-leave-input" accept=".pdf,.doc,.docx,.xlsx,.csv,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></br>
	
				<input type="button" name="submit" value="Back" class="back-btn" onclick="location.href='current_expenses.php'">

				<input type="submit" name="edit" value="Edit" class="submit-btn">
			</form>
		</div>
    </body>
</html>

<?php 
include_once("../dependencies/scripts/scripts.js");
?>