<?php
session_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('../head/head.php'); ?>
		<title>File Storage</title>
	</head>

	<body>

		<?php
		include_once('../navigation/top_nav.php');
		include_once('../navigation/side_nav.php');
		?>

		<div class="display-content">
            
			<div class="top-btn">
                <input type="text" id="search-input" class="search-input" placeholder="Search" onkeyup="searchTable()" onpaste="searchTable()">

                <input type="button" value="Current" class="all-btn-top" onclick="location.href='current_file_storage.php'">
                
                <input type="button" value="Archive" class="all-btn-top active-buttons" onclick="location.href='archive_file_storage.php'">
			</div>

        
				<div id="data-table" class="table-display file-width">
					<table class="table-content">
						<thead class="header">
							<th class="med-col">File Name</th>
							<th class="big-col">File</th>
							<th class="med-col">Date Uploaded</th>
						</thead>
                        <tbody>
                            <?php 
                                $get_AllArchiveStorage = get_AllArchiveStorage();
                            
                                while($row = mysqli_fetch_array($get_AllArchiveStorage))
                                {
                            ?>
                                    <tr class='tbl-link'>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['file']; ?></td>
                                        <td><?php echo $row['date_uploaded']; ?></td>
                                        <td>
                                            <?php
                                                $confirmation = "Are you sure about deleting the selected file?";
                                            ?>
                                            <a href='delete.php?storageid=<?php echo $row['storage_id'];?>' onclick="return confirm('<?php echo $confirmation; ?>')">
                                                <img src="../resources/images/bin.png" class='smicon'>
                                            </a>
                                        </td>
                                        <td>
                                            <?php
                                                $restoreconfirmation = "Are you sure about restoring the selected file?";
                                            ?>
                                            <a href='archive.php?storageid=<?php echo $row['storage_id'];?>&status=Active' onclick="return confirm('<?php echo $restoreconfirmation; ?>')">
                                                <img src="../resources/images/restore.png" class='smicon'>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }	
                            ?>
                        </tbody>
					</table>
				</div>
		
		</div>
    </body>
</html>
