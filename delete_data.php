<?php
require("config.php");

//Connect to DB
try{
  $dbh = new PDO("mysql:host=$SERVER_NAME;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(PDOException $e){
  echo $e->getMessage();
  exit;
}

var_dump($dbh);


//Gets data from URL
$id = $_GET['id'];

$stmt = $dbh->prepare("delete from locations where id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();

?>
