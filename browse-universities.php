<?php
    include "Includes/book-config.inc.php";
    include 'Includes/functions.inc.php';
    
    $stateDB = new StateGateway($connection);
    $stateList = $stateDB->findAllSorted(true);
    
    $uniDB = new UniversitiesGateway($connection);
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
        <title>Universities</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
                
            <?php
                include 'Includes/header.inc.php';
                include 'Includes/navigation.inc.php';
            ?>

        <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
              
                <div class="mdl-grid">   
                 <?php
                 if(isset($_GET['uni'])){
    			                generateCard($chosenUni['Name'], 'browse-universitie.php?uni='.urldecode($chosenUni['Name']),5,"Uni");
    			                generateLongCard($chosenUni['Name'], $chosenUni['Address'], $chosenUni['City'], $chosenUni['State'], 
    			                $chosenUni['Zip'], $chosenUni['Website'], $chosenUni['Latitude'], $chosenUni['Longitude']);
                 }
                ?>
                     
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Filter States</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
                    <form method="GET" action='browse-universities.php' id="UniFilter">
                        <div class="styled-select">
                        <select name="State">
                            <option value ="" id="Clear">All States</option>
                            <?php
                                foreach($stateList as $row){
                                    echo "<option>".$row['StateName']."</options>";
                                }
                            ?>
                            </select>
                            </div>
                            <input type="submit" value="Filter">
   
                    </form>
                 </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              </div>
              <div class="mdl-grid">
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







