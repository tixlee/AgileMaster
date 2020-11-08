<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=am', 'root', '');

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["task_name"],
  'start'   => $row["start_date"],
  'end'   => $row["due_date"]
 );
}

echo json_encode($data);

?>