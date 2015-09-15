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
$name = $_GET['name']; 
$memo = $_GET['memo'];
$placeId = $_GET['placeId'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

$stmt = $dbh->prepare("insert into locations (name,memo,placeId,lat,lng) values (:name,:memo,:placeId,:lat,:lng)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":memo", $memo);
$stmt->bindParam(":placeId", $placeId);
$stmt->bindParam(":lat", $lat);
$stmt->bindParam(":lng", $lng);
$stmt->execute();

?>
