
<html>
    <head>
        <title>Employees</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="myscripts.js"></script>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
                    mdl-layout--fixed-header">
                
            <?php
                include 'Includes/header.inc.php';
                include 'Includes/navigation.inc.php';
            ?>

        <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            <?php include 'Includes/searchBar.inc.php' ?>
            <div class="mdl-grid">
          
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">About me</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
                    <h5>Ben Saltman - Solo</h5>
                    201219703<br>
                    bsalt703@mtroyal.ca
                    
  
                 </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
              <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">The Assignment</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
                    <div>
                        Comp 3512<br>
                        Assignment 2: Elaborating on Data-Driven PHP<br>
                        Last Edited: Saturday, November 12th, 2017
                    </div>
                      

                    
  
                 </div>
              </div>  <!-- / mdl-cell + mdl-card -->

              
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">References</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
                    <div>
                        <h4>Images</h4>
                        <ul>
                            <li>Icons: https://material.io/icons/#ic_account_circle</li>
                            <li>Blue University: https://www.flaticon.com/free-icon/university_169857</li>
                            <li>Orange Employees: https://quincycollege.edu/about/human-resources/</li>
                            <li>Books: https://clipartfest.com/download/14tsMJv</li>
                            <li>Question Mark: https://housing.umn.edu/files/help-icon</li>
                        </ul>
                        <h4>Code Examples</h4>
                        <ul>
                            <li>https://github.com/rconnolly</li>
                            <li>https://codepen.io/ericrasch/pen/zjDBx</li>
                            <li>https://getmdl.io/components/</li>
                            <li>Overlay reference code: https://codepen.io/bradtraversy/pen/zEOrPp</li>
                            
                        </ul>
                        
                    </div>
                      

                    
  
                 </div>
              </div>  <!-- / mdl-cell + mdl-card -->

                
            

            </div>  <!-- / mdl-grid -->
    </section>
    </main>
    </div>
    </body>