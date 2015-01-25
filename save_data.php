<?php
require("config.php");

//Connect to DB
try{
  $dbh =  new PDO(DSN, DB_USER, DB_PASSWORD);
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(PDOException $e){
  echo $e->getMessage();
  exit;
}


//$dbh = connectDb();
//$dbh = new PDO(DNS, DB_USER, DB_PASSWORD);
var_dump($dbh);


//Gets data from URL s
$name = $_GET['name']; 
$memo = $_GET['memo'];
$placeId = $_GET['placeId'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

/*
var_dump($name);
var_dump($memo);
var_dump($placeId);
var_dump($lat);
var_dump($lng);
*/

$stmt = $dbh->prepare("insert into places (name,memo,placeId,lat,lng) values (:name,:memo,:placeId,:lat,:lng)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":memo", $memo);
$stmt->bindParam(":placeId", $placeId);
$stmt->bindParam(":lat", $lat);
$stmt->bindParam(":lng", $lng);
$stmt->execute();

?>
