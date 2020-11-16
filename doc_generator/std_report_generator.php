<?php

//prevent if not submit
if(!isset($_POST['purpose'])) dir();

$request = array(
'project'=>$_POST['project'],
'team_name'=>$_POST['team_name'],
'team_member'=>$_POST['team_member'],
'purpose'=>$_POST['purpose'],
'scope'=>$_POST['scope'],
'alpha_testing'=>$_POST['alpha_testing'],
'system_and_integration_testing'=>$_POST['system_and_integration_testing'],
'performance_and_stress_testing'=>$_POST['performance_and_stress_testing'],
'user_acceptance_testing'=>$_POST['user_acceptance_testing'],
'batch_testing'=>$_POST['batch_testing'],
'automated_regression_testing'=>$_POST['automated_regression_testing'],
'beta_testing'=>$_POST['beta_testing'],
'hardware_requirement'=>$_POST['hardware_requirement'],
'main_frame'=>$_POST['main_frame'],
'workstation'=>$_POST['workstation'],
'test_schedule'=>$_POST['test_schedule'],
'control_procedures'=>$_POST['control_procedures'],
'features_to_be_tested'=>$_POST['features_to_be_tested'],
'features_not_to_be_tested'=>$_POST['features_not_to_be_tested'],
'resources_roles_responsibility'=>$_POST['resources_roles_responsibility'],
'schedules'=>$_POST['schedules'],
'significantly_impacted_departments'=>$_POST['significantly_impacted_departments'],
'dependencies'=>$_POST['dependencies'],
'risk_assumptions'=>$_POST['risk_assumptions'],
'tools'=>$_POST['tools']
);

//include template
ob_start();
require_once('data_std.php');
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
$dompdf->stream('STD Document');

//write pdf to directory
file_put_contents('pdfs/STD.pdf', $dompdf->output());
?>



