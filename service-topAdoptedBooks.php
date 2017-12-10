<?php
header('Content-type: application/json');
include "Includes/book-config.inc.php";

$bookjdb = new bookJoinsGateway($connection);
$topAdoptedResult = $bookjdb->topAdopted();

$adoptedArray = array();

foreach($topAdoptedResult as $row){
    $adoptedArray[] = array("ISBN10"=>$row['ISBN10'],"Title"=>$row["Title"],"Quantity"=>$row['quant']);
}

echo json_encode($adoptedArray);
?>