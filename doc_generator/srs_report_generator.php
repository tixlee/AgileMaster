<?php

//prevent if not submit
if(!isset($_POST['purpose'])) dir();

$request = array(
'project'=>$_POST['project'],
'team_name'=>$_POST['team_name'],
'team_member'=>$_POST['team_member'],
'purpose'=>$_POST['purpose'],
'scope'=>$_POST['scope'],
'definitions_acronyms_abbreviations'=>$_POST['definitions_acronyms_abbreviations'],
'business_rules'=>$_POST['business_rules'],
'system_perspective'=>$_POST['system_perspective'],
'system_features'=>$_POST['system_features'],
'user_classes_characteristics'=>$_POST['user_classes_characteristics'],
'design_implementation_constraints'=>$_POST['design_implementation_constraints'],
'assumptions'=>$_POST['assumptions'],
'operating_environment'=>$_POST['operating_environment'],
'use_case'=>$_POST['use_case'],
'user_interface'=>$_POST['user_interface'],
'software_interface'=>$_POST['software_interface'],
'communication_interface'=>$_POST['communication_interface'],
'usability'=>$_POST['usability'],
'reliability'=>$_POST['reliability'],
'security'=>$_POST['security'],
'portability'=>$_POST['portability'],
'maintainability'=>$_POST['maintainability'],
'availability'=>$_POST['availability'],
'management_process'=>$_POST['management_process']
);

//include template
ob_start();
require_once('data_srs.php');
$template = ob_get_clean();

//include dompdf library
require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;

//using pdf dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($template);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('SRS Document');

//write pdf to directory
file_put_contents('pdfs/SRS.pdf', $dompdf->output());

?>



