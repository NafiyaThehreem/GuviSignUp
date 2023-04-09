<?php
  // connect to mongodb
  header('Location: http://localhost/guvi/index.html');
  $m = new MongoDB\Driver\Manager("mongodb://localhost:27017");
  echo "Connection to database successfully";
  // select a database
  $db = $m->profiledb;
  echo "Database profiledb selected";
  $collection = $db->profile;
  echo "Collection selected successfully";
  $document = array(
  "name" =>$_POST["name"],
  "designation" => $_POST["designation"],
  "age" => $_POST["age"]
 );
$collection->insert($document);
echo "Document inserted successfully";
?>
