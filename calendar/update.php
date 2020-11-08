<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=am', 'root', '');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET task_name=:task_name, start_date=:start_date, due_date=:due_date 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':task_name'  => $_POST['title'],
   ':start_date' => $_POST['start'],
   ':due_date' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>