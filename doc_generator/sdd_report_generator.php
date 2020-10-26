<?php

//prevent if not submit
if(!isset($_POST['purpose'])) dir();

$request = array(
'project'=>$_POST['project'],
'team_name'=>$_POST['team_name'],
'team_member'=>$_POST['team_member'],
'purpose'=>$_POST['purpose'],
'scope'=>$_POST['scope'],
'overview'=>$_POST['overview'],
'reference_material'=>$_POST['reference_material'],
'definitions_acronyms_abbreviations'=>$_POST['definitions_acronyms_abbreviations'],
'system_overview'=>$_POST['system_overview'],
'system_architecture'=>$_POST['system_architecture'],
'data_description'=>$_POST['data_description'],
'data_dictionary'=>$_POST['data_dictionary'],
'component_design'=>$_POST['component_design'],
'overview_of_user_interface'=>$_POST['overview_of_user_interface'],
'screen_objects_and_actions'=>$_POST['screen_objects_and_actions'],
'requirement_matrix'=>$_POST['requirement_matrix']
);

//include template
ob_start();
require_once('data_sdd.php');
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
$dompdf->stream('SDD Document');

//write pdf to directory
file_put_contents('pdfs/SDD.pdf', $dompdf->output());
?>



