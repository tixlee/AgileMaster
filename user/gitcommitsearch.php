<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>AgileMaster | GitHub Commit Search</title>
	<?php include('../navigation/head.php');?>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css"> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>  
	
</head>
<body class="hold-transition sidebar-mini layout-fixed">

	<div class="wrapper">
		<?php include('../navigation/topbar.php');?>
		<?php include('../navigation/user_sidebar.php');?>

		<div class="content-wrapper">
			</br></br>
			<section class="content">
				<div class="container-fluid">
	
					<h2>Github Commit Search</h2>
					<input type="text" id="username"  placeholder="Username" required="required" style="padding-top: 0.3%; padding-bottom: 0.3%;"> /
					<input type="text" id="repos"  placeholder="Repository" required="required" style="padding-top: 0.3%; padding-bottom: 0.3%;">
					<button id = 'btnCommits' class="btn btn-success">Search</button>
					<br><br><br>

					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Commit List</h6>
							
						</div>
              
						<div class="card-body">
						
							<input type="button" id="demo" value="Image" onclick="downloadtable()" />
							<input type="button" value="Excel" onclick="exportTableToExcel('dataTable', 'GitHub_Commit_Report')" />
							<input type="button" onclick="generate()" value="PDF" /> 
							<br><br>
							
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Name</th>
											<th>Commit Message</th>
											<th>Date</th>
										</tr>
									</thead>
									
									<!-- <tbody id="divResult"> -->
									<tbody id="divResult">
									<!--<tr>
											<td></td>
											<td></td>
											<td></td>
										</tr> -->
									</tbody>
									
									<div id = 'divResult'>
									</div>
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

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src="github/commitsearch.js"></script>
	
	<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
	<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
	<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="../dependencies/scripts/datatables-demo.js"></script>
	<script src="../dependencies/scripts/scripts.js"></script>
	<script src="../dependencies/navigation/js/adminlte.js"></script>
	
	<!-- DataTables scripts
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
	} );
	</script> -->
	<script>

    function downloadtable() {
        var node = document.getElementById('dataTable');
        domtoimage.toPng(node)
            .then(function (dataUrl) {
                var img = new Image();
                img.src = dataUrl;
                downloadURI(dataUrl, "GitHub_Commit_Report.png")
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });
    }

    function downloadURI(uri, name) {
        var link = document.createElement("a");
        link.download = name;
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
    }

	function exportTableToExcel(tableID, filename = ''){
		var downloadLink;
		var dataType = 'application/vnd.ms-excel';
		var tableSelect = document.getElementById(tableID);
		var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
		// Specify file name
		filename = filename?filename+'.xls':'excel_data.xls';
    
		// Create download link element
		downloadLink = document.createElement("a");
    
		document.body.appendChild(downloadLink);
    
		if(navigator.msSaveOrOpenBlob){
			var blob = new Blob(['\ufeff', tableHTML], {
				type: dataType
			});
        navigator.msSaveOrOpenBlob( blob, filename);
		}else{
			// Create a link to the file
			downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
			// Setting the file name
			downloadLink.download = filename;
        
			//triggering the function
			downloadLink.click();
		}
	}

	function generate() {  
		var doc = new jsPDF('p', 'pt', 'letter');  
		var htmlstring = '';  
		var tempVarToCheckPageHeight = 0;  
		var pageHeight = 0;  
		pageHeight = doc.internal.pageSize.height;  
		specialElementHandlers = {  
			// element with id of "bypass" - jQuery style selector  
			'#bypassme': function(element, renderer) {  
				// true = "handled elsewhere, bypass text extraction"  
				return true  
			}  
		};  
		margins = {  
			top: 150,  
			bottom: 60, 
			left: 40,  
			right: 40,  
			width: 600  
		};  
		var y = 20;  
		doc.setLineWidth(2);  
		doc.text(250, y = y + 30, "GitHub Commit Report");  
		doc.autoTable({  
			html: '#dataTable',  
			startY: 70,  
			theme: 'grid',  
			columnStyles: {  
				0: {  
					cellWidth: 100,  
				},  
				1: {  
					cellWidth: 100,  
				},  
				2: {  
				cellWidth: 100,  
				},
				3: {  
					cellWidth: 100,  
				}
			},  
			styles: {  
				minCellHeight: 40  
			}  
		})  
		doc.save('GitHub_Commit_Report.pdf');  
	}  	

</script>

</body>
</html>