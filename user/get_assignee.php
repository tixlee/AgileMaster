<?php

session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';
    

$sql = "SELECT * FROM `project` NATURAL JOIN `users`";
$result = $conn->query($sql);
$bRow = $result->fetch_assoc();
$result->free_result();
$project_id = mysql_real_escape_string($_POST['project_id']);
if($project_id!='')
{
$user_id = $_GET['user_id'];
$query = $conn->query("SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '$bRow[project_id]'") or die(mysqli_error());
while($u_query = $query->fetch_array())
{
?>
<option value="<?php echo $u_query['user_id']; ?>" <?php if ($user_id == $u_query['user_id']) {echo "selected";} ?> required><?php echo $u_query['name']; ?></option>
<?php
}
}
?>