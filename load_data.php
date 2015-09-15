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

$sql = "select * from locations order by lng asc";
$stmt = $dbh->query($sql);
$result = null;


foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
  $result[] = array(
    'id'=>$row['id'],
    'name'=>$row['name'],
    'memo'=>$row['memo'],
    'placeId'=>$row['placeId'],
    'lat'=>$row['lat'],
    'lng'=>$row['lng']
  );
}

echo json_encode($result);

?>
