<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>AgileMaster | Meeting Minutes Generator</title>
	<?php include('../navigation/head.php');?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="../dependencies/summernote/summernote-bs4.css">
    <link href="css/style.css" rel="stylesheet" media="all">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/docgeneratorminutes_sidebar.php');?>

	<div class="content-wrapper">
		</br></br>
			<section class="content">
				<div class="container-fluid">
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="card-header py-3">
								<h4 class="m-4 font-weight-bold">Meeting Minutes Generator</h4>
								<h6 class="m-4 font-weight-bold">Meeting minutes serve as a record of what was discussed and decided in a meeting, what actions must be taken, who must take them and when.</h>
							</div>
					
							<form method="POST" name="createDoc" id="DocCreator" action="meetminutes_report_generator.php" enctype="multipart/form-data">
								
								<div class="form-row">
									<div class="name">
										<label for="title">Title</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="title" name="title" placeholder="Enter the title of meeting minutes."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="objective">Objective</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="objective" name="objective" placeholder="Enter the objective of meeting minutes."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="date">Date</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="date" name="date" placeholder="Enter the date."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="time">Time</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="time" name="time" placeholder="Enter the time."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="location">Location</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="location" name="location" placeholder="Enter the location of the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="called_by">Called By</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="called_by" name="called_by" placeholder="Enter the name of person who call the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="note_taker">Note Taker</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="note_taker" name="note_taker" placeholder="Enter the note taker name of the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="time_keeper">Time Keeper</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="time_keeper" name="time_keeper" placeholder="Enter the timer keeper name of the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="attendees">Attendees</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="attendees" name="attendees" placeholder="Enter the attendees name of the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="agenda_items">Agenda Items</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="agenda_items" name="agenda_items" placeholder="Enter the agenda items in the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="decisions">Decisions</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="decisions" name="decisions" placeholder="Enter the decisions made in the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="new_action_items">New Action Items</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="new_action_items" name="new_action_items" placeholder="Enter the new action items in the meeting."></textarea>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="name">
										<label for="notes_info">Other Notes & Informations</label>
									</div>
									<div class="value">
										<div class="input-group">
											<textarea class="textarea--style-6" id="notes_info" name="notes_info" placeholder="Enter the other notes and informations in the meeting."></textarea>
										</div>
									</div>
								</div>

								
								<div class="form-row">
									
									<button class="btn btn-success" type="submit" name="send">Generate</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	<aside class="control-sidebar control-sidebar-dark">
	</aside>
</div>

<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea--style-6').summernote()
  })
</script>
<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>
<script src="js/global.js"></script>

</body>
</html>

