<?php
header('Content-type: application/json');

include "Includes/book-config.inc.php";
$bookVisitsdb = new bookVisitsGateway($connection);
$countryCount = $bookVisitsdb->uniqueCountries();
$totalVisits = $bookVisitsdb->uniqueVisits();
    
    
$empMessagesdb = new EmployeeMessagesGateway($connection);
$numMessages = $empMessagesdb->countMessages();
    
$empToDodb = new EmployeeToDoGateway($connection);
$toDoCount = $empToDodb->countToDos();
    $count = 0;
foreach($countryCount as $row){
    $count++;
}
$returnArray = array("numMessages"=>$numMessages['numMessages'],"numToDos"=>$toDoCount['numToDos'],"totalVisits"=>$totalVisits['numVisits'],"uniqueCountries"=>$count);


echo json_encode($returnArray);
?>