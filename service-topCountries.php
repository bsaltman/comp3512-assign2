<?php
header('Content-type: application/json');

include "Includes/book-config.inc.php";
$bookVisitsdb = new bookVisitsGateway($connection);
$topFifteen = $bookVisitsdb->topfifteen();
$topFifteenArray = array();
foreach($topFifteen as $row){
    $topFifteenArray[] = array("name"=>$row['CountryName'],"code"=>$row["CountryCode"],"quantity"=>$row["numVisits"]);
}

echo json_encode($topFifteenArray);
?>