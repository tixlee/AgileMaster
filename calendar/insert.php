<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=am', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (task_name, start_date, due_date) 
 VALUES (:task_name, :start_date, :due_date)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':task_name'  => $_POST['title'],
   ':start_date' => $_POST['start'],
   ':due_date' => $_POST['end']
  )
 );
}

?>