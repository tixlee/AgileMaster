<?php

//prevent if not submit
if(!isset($_POST['objective'])) dir();

$request = array(
'title'=>$_POST['title'],
'objective'=>$_POST['objective'],
'date'=>$_POST['date'],
'time'=>$_POST['time'],
'location'=>$_POST['location'],
'called_by'=>$_POST['called_by'],
'note_taker'=>$_POST['note_taker'],
'time_keeper'=>$_POST['time_keeper'],
'attendees'=>$_POST['attendees'],
'agenda_items'=>$_POST['agenda_items'],
'decisions'=>$_POST['decisions'],
'new_action_items'=>$_POST['new_action_items'],
'notes_info'=>$_POST['notes_info']
);

//include template
ob_start();
require_once('data_meetminutes.php');
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
$dompdf->stream('Meeting Minutes Document');

//write pdf to directory
file_put_contents('pdfs/Meeting Minutes Document.pdf', $dompdf->output());

?>



