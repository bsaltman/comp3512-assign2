<!DOCTYPE html>
<?php
    include 'Includes/functions.inc.php';
?>
<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
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
            
            <div class="mdl-grid">
                     
                <?php

                    generateCard('Browse Universities', 'browse-universities.php', 6,"Uni");
                    generateCard('Browse Employees', 'browse-employees.php', 6,"BEmp");
                    generateCard('Browse Books', 'browse-books.php',6,"BBooks");
                    generateCard('About us', 'aboutus.php', 6,"About");

                ?>

                
            

            </div>  <!-- / mdl-grid -->
    </section>
    </main>
    </div>
    </body>
    
</html>