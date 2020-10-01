<?php
if(isset($_POST["export"]))
{
    $conn = mysqli_connect("localhost", "root", "", "agensi_pekerjaan");

    $filename = "Claims_" . date('Y-m-d') . ".csv";

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    $output = fopen("php://output", "w");
    fputcsv($output, array('Claim Code', 'Claim By', 'Claim Type', 'Claim Date', 'Date on Receipt', 'Amount(RM)', 'Purpose', 'Others', 'Distance(KM)', 'Status'));

    $query = "SELECT claims.claim_code, users.name, claim_types.type, claims.claim_date, claims.date_on_receipt, claims.claim_amount, claims.claim_purpose, claims.other_specifications, claims.distance, claims.status FROM ((claims INNER JOIN users ON claims.user_id = users.user_id) INNER JOIN claim_types ON claims.type_id = claim_types.type_id)";


    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}
?>