<?php
    session_start();
    /* Used in loginCheck so after a successful login the user is redirected to
    the page they initally tried to visit */
    $currentPage = str_replace("/","",basename(__FILE__));
    //checks whether a user is logged in
    include 'Includes/loginCheck.inc.php';
    include "Includes/book-config.inc.php";
    include 'Includes/functions.inc.php';
    
    //Gateways that faciliate interaction with DB tables
    $stateDB = new StateGateway($connection);
    $stateList = $stateDB->findAllSorted(true);
    
    $uniDB = new UniversitiesGateway($connection);
    
    //Queries DB's based on relevant query string values
    if(isset($_GET['uni'])){
        $chosenUni = $uniDB->findByID($_GET['uni']);
    }
    if(isset($_GET['State']) && $_GET['State'] != ""){
        $allUnis = $uniDB->findByFk($_GET['State']);
    }
    else{
        $allUnis = $uniDB->findAllSortedLimit(true,20);   
    }
?>
<html>
    <head>
        <title>Browse Univesities</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="js/myscripts.js"></script>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
            
            <!--Header and navigation PHP includes -->        
            <?php
                include 'Includes/header.inc.php';
                include 'Includes/navigation.inc.php';
            ?>

        <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
                <?php include 'Includes/searchBar.inc.php' ?>
                <div class="mdl-grid">   
                <!-- If a university is selected outputs two cards with the relevant information-->
                 <?php
                 if(isset($_GET['uni'])){
    			                generateCard($chosenUni['Name'], 'browse-universitie.php?uni='.urldecode($chosenUni['Name']),5,"Uni");
    			                generateLongCard($chosenUni['Name'], $chosenUni['Address'], $chosenUni['City'], $chosenUni['State'], 
    			                $chosenUni['Zip'], $chosenUni['Website'], $chosenUni['Latitude'], $chosenUni['Longitude']);
                 }
                ?>
                     
                  <div id="filterCard" class="mdl-cell mdl-cell--12-col mdl-card  mdl-shadow--2dp" style="min-height:0;">
                        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                            <!-- add a down arrow -->
                            <h2 class="mdl-card__title-text">Filter</h2>
                            <i id='menuDropdown' class="material-icons" role="presentation">arrow_drop_down</i>
                        </div>
                    <div class="mdl-card__supporting-text" style="display:none;">
                    <form  method="GET" action='browse-universities.php' id="UniFilter">
                        <div id="uniformFilters">
                        <select class="mdl-selectfield__select" id="stateSelect" name="State">
                                      <option value="" disabled selected>State</option>
                            <?php
                                foreach($stateList as $row){
                                    echo "<option>".$row['StateName']."</options>";
                                }
                            ?>
                            </select>
                            </div>
                             <input class="mdl-button mdl-color--primary mdl-color-text--white" type="submit" value="Filter">
   
                    </form>
                 </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              </div>
              <div class="mdl-grid">
                  <!-- Outputs cards based on universities that match the filter information--> 
                <?php
    			            foreach ($allUnis as $row) {
                                generateCard($row['Name'], 'browse-universities.php?uni='.urlencode($row['Name']),6,"Uni");
		                    }
 
                ?>
            </div>  <!-- / mdl-grid -->
        </section>
        </main>
        </div>
</body>








