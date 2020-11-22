<?php 
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';
include_once '../resources/links/require.php';


//	if(isset($_POST['aid'])) {
//
//		$stmt = $conn->prepare("SELECT * FROM books WHERE author_id = " . $_POST['aid']);
//		$stmt->execute();
//		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
//		echo json_encode($books);
//	}

//	function loadAuthors() {
		

//        $getProjectByUser = getProjectByUser($userId);
//        $row = mysqli_fetch_array($getProjectByUser);
//        $getAllProjects = getAllProjects($row['project_id']);
//        $rRow = mysqli_fetch_array($getAllProjects);
        
//		$query =  $conn->query("SELECT * FROM `project` WHERE `project_id` = '$row[project_id]'") or die(mysqli_error());
//		$projects = $query->fetch_array();
//		return $projects;
//	}



if(!empty($_POST["member_id"])) 
{
//     $user_id = $_GET['user_id'];
     $query = mysqli_query($conn,"SELECT * FROM `user_project` NATURAL JOIN `users` NATURAL JOIN `project` WHERE `project_id` = '" . $_POST["member_id"] . "'");
//     while($u_query = $query->fetch_array())
//     {

//    $query =mysqli_query($conn,"SELECT * FROM user_project WHERE project_id = '" . $_POST["project_id"] . "'");
?>
<option value="" >Select Member</option>
<?php
while($row = mysqli_fetch_array($query))  
{
?>
<!--<option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_id']; ?></option>-->
<option value="<?php echo $row['user_id']; ?>"  required><?php echo $row['name']; ?></option>
<?php
}
}

?>