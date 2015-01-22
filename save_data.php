<?php
require("config.php");
require("function.php");

echo 'loaded';
//Gets data from URL parameters
$name = $_GET['name']; 
$memo = $_GET['memo'];
$placeId = $_GET['placeId'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

//Connect to DB
$dbh = connectDb();
echo 'Connected';
console.log("db connected");

$stmt = $dbh->prepare("insert into places (name,memo,placeId,lat,lng) values (:name,:memo,:placeId,:lat,:lng)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":memo", $memo);
$stmt->bindParam(":placeId", $placeId);
$stmt->bindParam(":lat", $lat);
$stmt->bindParam(":lng", $lng);
$stmt->execute();

echo 'Added';
console.log("data added");
