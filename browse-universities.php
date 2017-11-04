<?php
    include 'Includes/databaseConnection.inc.php';
    include 'Includes/functions.inc.php';
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
                 if(isset($_GET['uni'])){
                    $sql = "SELECT * from Universities WHERE Name = '".$_GET['uni']."'";
                                try	{
    			                $result = $pdo->query($sql);
    			                $result = $result->fetch();
    			                generateCard($result['Name'], 'browse-universitie.php?uni='.urldecode($result['Name']),5,"Uni");
    			                generateLongCard($result['Name'], $result['Address'], $result['City'], $result['State'], 
    			                $result['Zip'], $result['Website'], $result['Latitude'], $result['Longitude']);
                                }
                                catch(PDOException	$e)	{
                                    die($e->getMessage());
                                }
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
                                try	{
                                $sql = "SELECT StateName, StateAbbr 
                                        FROM States";
                                $stateList = $pdo->query($sql);
                                foreach($stateList as $row){
                                    echo "<option>".$row['StateName']."</options>";
                                    
                                }
                                }
                                catch(PDOException	$e)	{
                                    die($e->getMessage());
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
                    try	{
                        if(isset($_GET['State']) && $_GET['State'] != ""){
    			            $sql = "SELECT * from Universities". 
    			                " WHERE State ='". $_GET['State'].
    			                "' ORDER BY Name LIMIT 21";
                        }else{
                            $sql = "SELECT * from Universities". 
    			                   " ORDER BY Name LIMIT 21";
                                    
                        }
                        $result = $pdo->query($sql);
                        $value = $result->fetch();
    			            foreach ($result as $row) {
    			                // A & M is a crap school and broke my query strings needed to encode
    			                // Styling is minimal the idea, would be in the future the default background image would be changed to school logos
                                generateCard($row['Name'], 'browse-universities.php?uni='.urlencode($row['Name']),6,"Uni");
		                    }
                        }
                        catch(PDOException	$e)	{
                            die($e->getMessage());
                        }


                        

    
                     
                ?>
                        
                 

             
                           
          
  
                 

            </div>  <!-- / mdl-grid -->
        </section>
        </main>
        </div>
</body>







