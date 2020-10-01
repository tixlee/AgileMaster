<?php
if(isset($_POST["export"]))
{
    $conn = mysqli_connect("localhost", "root", "", "agensi_pekerjaan");

    $filename = "Expenses_" . date('Y-m-d') . ".csv";

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    $output = fopen("php://output", "w");
    fputcsv($output, array('Updated By', 'Payment Method', 'Expenses Date', 'Date on Invoice', 'Accounting Period', 'Account Code', 'Invoice No', 'Supplier', 'Description', 'Amount(RM)'));

    $query = "SELECT users.name, payment_method.method, expenses.expenses_date, expenses.date_on_invoice, expenses.acc_period, expenses.account_code, expenses.invoice_no, expenses.expenses_supplier, expenses.expenses_description, expenses.expenses_amount FROM ((expenses INNER JOIN users ON expenses.user_id = users.user_id) INNER JOIN payment_method ON expenses.method_id = payment_method.method_id)";


    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}
?>