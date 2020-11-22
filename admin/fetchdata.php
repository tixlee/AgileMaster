<?php

include_once '../connection/dbconnection.php';
include_once "../helpers/module.php";

mysqli_select_db($conn, $database_dbconnection) or die (mysqli_error($conn));

$sql = "SELECT * FROM feedback_survey";
$result = mysqli_query($conn,$sql);

$fetchdata = array('data'=>array());

while ($row=mysqli_fetch_array($result)){
  $fetchdata ['data'][]=array(
    'Name' => $row['name'],
    'Email' => $row["email"],
    'Role' => $row['role'],
    'Major' => $row['major'],
    'Understand' => $row['understanding'],
    'Experience' => $row['experience'],
    'Like_UI' => $row['like_ui'],
    'Navigation_feature' => $row['navigation_feature'],
    'Process_flow' => $row['process_flow'],
    'Tools_provided' => $row['tools_provided'],
    'Rate' => $row['rate'],
    'Recommend' => $row['recommend'],
    'Like_most' => $row['like_most'],
    'Like_least' => $row['like_least'],
    'Improve' => $row['improve'],
    'New_feature' => $row['new_feature'],
    'Creation_date' => $row['creation_date']
  );
}


echo json_encode($fetchdata);

?>
