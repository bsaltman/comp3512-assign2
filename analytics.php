<?php
     session_start();
    //checks whether a user is logged in
    include 'Includes/loginCheck.inc.php';
    include "Includes/book-config.inc.php";
    $bookVisitsdb = new bookVisitsGateway($connection);
    $topFifteen = $bookVisitsdb->topfifteen();
    
    $bookjdb = new bookJoinsGateway($connection);
    $topAdoptedResult = $bookjdb->topAdopted();
    
    
    $countryCount = $bookVisitsdb->uniqueCountries();
    $totalVisits = $bookVisitsdb->uniqueVisits();
    
    
    
    $empMessagesdb = new EmployeeMessagesGateway($connection);
    $numMessages = $empMessagesdb->countMessages();
    
    $empToDodb = new EmployeeToDoGateway($connection);
    $toDoCount = $empToDodb->countToDos();
    
    $countryDB = new countriesGateway($connection);

?>

<html>
    <head>
        <title>Analytics</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="js/myscripts.js"></script>
        <script src="js/HandlingWebServices.js"></script>
        
        
        
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
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Top Visited Countries</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
                        <select id="analyticsCountrySelect">
                            
                        </select>
                        
                    </div>
                    </div>
                    
                    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h3 class="mdl-card__title-text">June Visits</h2>
        			</div>
        		 <div id="totalVisits" class="filter-card mdl-card__supporting-text ">
    
                    </div>
                    </div>
                    
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h3 class="mdl-card__title-text">Unique Countries</h2>
        			</div>
        		 <div id="Countries" class="filter-card mdl-card__supporting-text ">

                    </div>
                    </div>
                    
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h3 class="mdl-card__title-text">Employeee To-Dos</h2>
        			</div>
        		 <div id="ToDos" class="filter-card mdl-card__supporting-text ">
                 </div>
                 </div>
                    
                    
                    
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h3 class="mdl-card__title-text">Employee Message</h2>
        			</div>
        		 <div id="Messages" class="filter-card mdl-card__supporting-text ">
        		   
                </div>
                </div>
                    
                    
                    
                    <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                         
                         <!--  Need to add current filter with isset -->
                      <h2 id="bookTitle" class="mdl-card__title-text">Top Adopted Books</h2>
                    </div>
                    <div class="mdl-card__supporting-text">   
                        <table class="mdl-data-table">
                            <thead>
                                <th>ThumbNail</th>
                                <th>Title</th>
                                <th>Quantity</th>
                                
                            </thead>
                            
                            <tbody id="adoptionTable">

                            </tbody>
                        </table>
                    
                    </div>
                    
                </div>
                    
        		</div>  <!-- / mdl-grid -->
                    
                    
                    
                    
                    
                    
                    
                    
                </div>  <!-- / mdl-grid -->
        </section>
        </main>
        </div>
</body>
