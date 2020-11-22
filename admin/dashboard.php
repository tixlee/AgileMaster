<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

if(isset($_SESSION['admin_id']))
{
	$adminId = $_SESSION["admin_id"];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AgileMaster | Dashboard</title>
	<?php include('../navigation/head.php');?>
	<style>
	td.details-control {
		background: url('../resources/images/details_open.png') no-repeat center center;
		cursor: pointer;
	}
	tr.shown td.details-control {
		background: url('../resources/images/details_close.png') no-repeat center center;
	}
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<?php include('../navigation/topbar_admin.php');?>
	<?php include('../navigation/dashboard_adminsidebar.php');?>

	<div class="content-wrapper">
		<br><br>
		<section class="content">
			<div class="container-fluid">
	  
				<div class="row">
				
					<div class="col-lg-3 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3><?php 
									$raccounts = getAllRegistered();
									echo mysqli_num_rows($raccounts); 
									?></h3>
								<p>Registered Accounts</p>
							</div>
							<div class="icon">
								<i class="fas fa-user user"></i>
							</div>
							<a href="members.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
						
					<div class="col-lg-3 col-6">
						<div class="small-box bg-success">
							<div class="inner">
								<h3><?php 
									$allprojects = getAllProjectsAdmin();
									echo mysqli_num_rows($allprojects); 
									?></h3>
								<p>Total Projects Created</p>
							</div>
							<div class="icon">
								<i class="fas fa-project-diagram diagram"></i>
							</div>
							<a href="project.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>

					<div class="col-lg-3 col-6">
						<div class="small-box bg-danger">
							<div class="inner">
								<h3><?php 
									$getAllBoardsAdmin = getAllBoardsAdmin();
									echo mysqli_num_rows($getAllBoardsAdmin); 
									?></h3>
								<p>Total Boards Created</p>
							</div>
							<div class="icon">
								<i class="fab fa-trello trello"></i>
							</div>
							<a href="board.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
           
					<div class="col-lg-3 col-6">
						<div class="small-box bg-warning ">
							<div class="inner">
								<h3><?php 
									$uploads = getAllUploads();
									echo mysqli_num_rows($uploads); 
									?></h3>
								<p>Total Uploads</p>
							</div>
							<div class="icon">
								<i class="fas fa-file-upload upload"></i>
							</div>
							<a href="upload_files.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
           
					<div class="col-lg-3 col-6">
						<div class="small-box bg-pink-800 text-white">
							<div class="inner">
								<h3><?php 
									$getAssignedBugAdmin = getAssignedBugAdmin();
									echo mysqli_num_rows($getAssignedBugAdmin); 
									?></h3>
								<p>Bug To Be Fixed</p>
							</div>
							<div class="icon">
								<i class="fas fa-bug bug"></i>
							</div>
							<a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
						
					<div class="col-lg-3 col-6">
						<div class="small-box bg-gray-800 text-white">
							<div class="inner">
								<h3><?php 
									$getAllFeedbackForm = getAllFeedbackForm();
									echo mysqli_num_rows($getAllFeedbackForm); 
									?></h3>
								<p>Total Feedback Survey</p>
							</div>
							<div class="icon">
								<i class="fas fa-comment comment"></i>
							</div>
							<a href="feedback_survey.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
	   
					<div class="col-lg-3 col-6">
						<div class="small-box bg-orange-800 text-white">
							<div class="inner">
								<h3><?php 
									$getAllContactUsFeedbackForm = getAllContactUsFeedbackForm();
									echo mysqli_num_rows($getAllContactUsFeedbackForm); 
									?></h3>
								<p>Total Contact Us Feedback</p>
							</div>
							<div class="icon">
								<i class="fas fa-comment comment"></i>
							</div>
							<a href="contactus_feedback.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
	   
					<div class="col-lg-3 col-6">
						<div class="small-box bg-purple-800 ">
							<div class="inner">
								<h3><?php 
									$getHappyUsers = getHappyUsers();
									echo mysqli_num_rows($getHappyUsers); 
									?></h3>
								<p>Total Happy Users</p>
							</div>
							<div class="icon">
								<i class="icofont-simple-smile smile"></i>
							</div>
							<a href="#" class="small-box-footer" style="color: black;">More Info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
	   
				</div>
		
				<div class="row">
				
					<div class="col-md-6">
						<div class="card card-primary card-outline">
							<div class="card-header">
								 <h3 class="card-title">
									<i class="far fa-chart-bar"></i>
									System Overview
								</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<canvas class="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
							</div>
						</div>
					</div>
						
							
					
					<div class="col-md-6">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">
								<i class="far fa-chart-bar"></i>
								User System Rating
								</h3>

								<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								</div>
							</div>
							<div class="card-body">
								<div id="bar-chart-rating" style="height: 300px;"></div>
							</div>
						</div>
					</div>
				</div>
						
						

				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title"> <i class="far fa-chart-bar"></i>
						User Overall Rating</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="barChart" style="min-height: 300x; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>
			

				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold">Feedback Survey</h6>
					</div>
              
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="example" width="100%" cellspacing="0">
								<thead>
                                    <tr>
											<th></th>
											<th>Name</th>
											<th>Email</th>
											<th>Role</th>
											<th>Major</th>
											<th>Creation Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   
								</tbody>  
							</table>
						</div>
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
<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script> 
<script src="../dependencies/navigation/js/adminlte.js"></script>

<script src="../dependencies/chart.js/Chart.min.js"></script>
<script src="../dependencies/flot/flot/jquery.flot.js"></script>
<script src="../dependencies/flot/flot-old/jquery.flot.resize.min.js"></script>
<script src="../dependencies/flot/flot-old/jquery.flot.pie.min.js"></script>

<script>
/* Formatting function for row details - modify as you need */
function format ( d ) {
	// `d` is the original data object for the row
	return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
		'<tr>'+
			'<td>Understanding:</td>'+
			'<td>'+d.Understand+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Experience:</td>'+
			'<td>'+d.Experience+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Like UI:</td>'+
			'<td>'+d.Like_UI+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Navigation Feature:</td>'+
			'<td>'+d.Navigation_feature+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Process Flow:</td>'+
			'<td>'+d.Process_flow+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Tools Provided:</td>'+
			'<td>'+d.Tools_provided+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Rate:</td>'+
			'<td>'+d.Rate+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Recommendations:</td>'+
			'<td>'+d.Recommend+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Like Most:</td>'+
			'<td>'+d.Like_most+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Like Least:</td>'+
			'<td>'+d.Like_least+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>Improvement:</td>'+
			'<td>'+d.Improve+'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>New Feature:</td>'+
			'<td>'+d.New_feature+'</td>'+
		'</tr>'+
	'</table>';
}

$(document).ready(function() {
	var table = $('#example').DataTable( {
		"ajax": {
			"url":"fetchdata.php"
		},
		"columns": [
			{
				"className":      'details-control',
				"orderable":      false,
				"data":           null,
				"defaultContent": ''
			},
			{ "data": "Name" },
			{ "data": "Email" },
			{ "data": "Role" },
			{ "data": "Major" },
			{ "data": "Creation_date" }
		]
	} );

	// Add event listener for opening and closing details
	$('#example tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = table.row( tr );

		if ( row.child.isShown() ) {
			// This row is already open - close it
			row.child.hide();
			tr.removeClass('shown');
		}
		else {
			// Open this row
			row.child( format(row.data()) ).show();
			tr.addClass('shown');
		}
	} );
} );


	</script>

<?php 
	$getAllSystemIssue = getAllSystemIssue(); 
?>

<?php 
	$getRatePoor = getRatePoor(); 
?>

<?php 
	$getRateAverage = getRateAverage(); 
?>

<?php 
	$getRateGood = getRateGood(); 
?>

<?php 
	$getRateVeryGood = getRateVeryGood(); 
?>

<?php 
	$getRateExcellent = getRateExcellent(); 
?>

<?php 
	$getExperiencePoor = getExperiencePoor(); 
?>

<?php 
	$getExperienceAverage = getExperienceAverage(); 
?>

<?php 
	$getExperienceGood = getExperienceGood(); 
?>

<?php 
	$getExperienceVeryGood = getExperienceVeryGood(); 
?>

<?php 
	$getExperienceExcellent = getExperienceExcellent(); 
?>

<?php 
	$getLikeUiPoor = getLikeUiPoor(); 
?>

<?php 
	$getLikeUiAverage = getLikeUiAverage(); 
?>

<?php 
	$getLikeUiGood = getLikeUiGood(); 
?>

<?php 
	$getLikeUiVeryGood = getLikeUiVeryGood(); 
?>

<?php 
	$getLikeUiExcellent = getLikeUiExcellent(); 
?>

<?php 
	$getNavigationPoor = getNavigationPoor(); 
?>

<?php 
	$getNavigationAverage = getNavigationAverage(); 
?>

<?php 
	$getNavigationGood = getNavigationGood(); 
?>

<?php 
	$getNavigationVeryGood = getNavigationVeryGood(); 
?>

<?php 
	$getNavigationExcellent = getNavigationExcellent(); 
?>

<?php 
	$getProcessFlowPoor = getProcessFlowPoor(); 
?>

<?php 
	$getProcessFlowAverage = getProcessFlowAverage(); 
?>

<?php 
	$getProcessFlowGood = getProcessFlowGood(); 
?>

<?php 
	$getProcessFlowVeryGood = getProcessFlowVeryGood(); 
?>

<?php 
	$getProcessFlowExcellent = getProcessFlowExcellent(); 
?>

<?php 
	$getToolsPoor = getToolsPoor(); 
?>

<?php 
	$getToolsAverage = getToolsAverage(); 
?>

<?php 
	$getToolsGood = getToolsGood(); 
?>

<?php 
	$getToolsVeryGood = getToolsVeryGood(); 
?>

<?php 
	$getToolsExcellent = getToolsExcellent(); 
?>

<?php 
	$getLinkagePoor = getLinkagePoor(); 
?>

<?php 
	$getLinkageAverage = getLinkageAverage(); 
?>

<?php 
	$getLinkageGood = getLinkageGood(); 
?>

<?php 
	$getLinkageVeryGood = getLinkageVeryGood(); 
?>

<?php 
	$getLinkageExcellent = getLinkageExcellent(); 
?>

<script>
  $(function () {

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('.donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Registered Acc', 
          'Total Projects',
          'Total Boards', 
          'Total Uploads', 

      ],
      datasets: [
        {
          data: [<?php echo mysqli_num_rows($raccounts);  ?>,
				 <?php echo mysqli_num_rows($allprojects);  ?>,
				 <?php echo mysqli_num_rows($getAllBoardsAdmin);  ?>,
				 <?php echo mysqli_num_rows($uploads);  ?>,
],
				 
          backgroundColor : ['#00c0ef', '#00a65a', '#f56954', '#FFA500'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })
    
  })
  

$(function () {
    

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,<?php echo mysqli_num_rows($getRatePoor); ?>], [2,<?php echo mysqli_num_rows($getRateAverage);  ?>], [3,<?php echo mysqli_num_rows($getRateGood);  ?>], [4,<?php echo mysqli_num_rows($getRateVeryGood);  ?>], [5,<?php echo mysqli_num_rows($getRateExcellent);  ?>]],
      bars: { show: true }
    }
    $.plot('#bar-chart-rating', [bar_data], {
      grid  : {
        borderWidth: 0.5,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Poor'], [2,'Average'], [3,'Good'], [4, 'Very Good'], [5, 'Excellent']]
      }
    })
    /* END BAR CHART */

   

  })

</script>

<script>
  $(function () {
    

    var areaChartData = {
      labels  : [ 'Experience', 'Like UI', 'Navigation Features', 'Process Flow', 'Tools Provided', 'linkage'],
      datasets: [
        {
          label               : 'Average',
          backgroundColor     : '#eba234',
          borderColor         : '#eba234',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo mysqli_num_rows($getExperienceAverage); ?>, <?php echo mysqli_num_rows($getLikeUiAverage); ?>, <?php echo mysqli_num_rows($getNavigationAverage); ?>, <?php echo mysqli_num_rows($getProcessFlowAverage); ?>, <?php echo mysqli_num_rows($getToolsAverage); ?>, <?php echo mysqli_num_rows($getLinkageAverage); ?>]
        },
        {
          label               : 'Poor',
          backgroundColor     : '#eb3434',
          borderColor         : '#eb3434',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo mysqli_num_rows($getExperiencePoor); ?>, <?php echo mysqli_num_rows($getLikeUiPoor); ?>, <?php echo mysqli_num_rows($getNavigationPoor); ?>, <?php echo mysqli_num_rows($getProcessFlowPoor); ?>, <?php echo mysqli_num_rows($getToolsPoor); ?>, <?php echo mysqli_num_rows($getLinkagePoor); ?>]
        },
		{
          label               : 'Good',
          backgroundColor     : '#dfeb34',
          borderColor         : '#dfeb34',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo mysqli_num_rows($getExperienceGood); ?>, <?php echo mysqli_num_rows($getLikeUiGood); ?>, <?php echo mysqli_num_rows($getNavigationGood); ?>, <?php echo mysqli_num_rows($getProcessFlowGood); ?>, <?php echo mysqli_num_rows($getToolsGood); ?>, <?php echo mysqli_num_rows($getLinkageGood); ?>]
        },
		{
          label               : 'Very Good',
          backgroundColor     : '#34eb3a',
          borderColor         : '#34eb3a',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo mysqli_num_rows($getExperienceVeryGood); ?>, <?php echo mysqli_num_rows($getLikeUiVeryGood); ?>, <?php echo mysqli_num_rows($getNavigationVeryGood); ?>, <?php echo mysqli_num_rows($getProcessFlowVeryGood); ?>, <?php echo mysqli_num_rows($getToolsVeryGood); ?>, <?php echo mysqli_num_rows($getLinkageVeryGood); ?>]
        },
		{
          label               : 'Excellent',
          backgroundColor     : '#008000',
          borderColor         : '#008000',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo mysqli_num_rows($getExperienceExcellent); ?>, <?php echo mysqli_num_rows($getLikeUiExcellent); ?>, <?php echo mysqli_num_rows($getNavigationExcellent); ?>, <?php echo mysqli_num_rows($getProcessFlowExcellent); ?>, <?php echo mysqli_num_rows($getToolsExcellent); ?>, <?php echo mysqli_num_rows($getLinkageExcellent); ?>]
        },
      ]
    }

    
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

  })
</script>

</body>
</html>
