<?php
header('Content-type: application/json');

include "Includes/book-config.inc.php";
if(isset($_GET['CountryCode'])){
    $bookVisitsdb = new bookVisitsGateway($connection);
    $countryVists = $bookVisitsdb->topfifteen();
    $choiceArray;
    foreach($countryVists as $row){
        if($row['CountryCode'] == $_GET['CountryCode']){
            $choiceArray = array("name"=>$row['CountryName'],"code"=>$row["CountryCode"],"quantity"=>$row["numVisits"]);
            break;
        }
    }

    
}
else{
    //error checking
}


echo json_encode($choiceArray);
?>