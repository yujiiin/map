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

$sql = "select * from places";
$stmt = $dbh->query($sql);
$result = null;


$x=1;
foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
  $result[] = array(
    'id'=>$x,
    'name'=>$row['name'],
    'memo'=>$row['memo'],
    'placeId'=>$row['placeId'],
    'lat'=>$row['lat'],
    'lng'=>$row['lng']
  );
  $x++;
}

echo json_encode($result);

?>
