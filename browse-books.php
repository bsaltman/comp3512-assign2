<?php
    session_start();
    include 'Includes/loginCheck.inc.php';
    include "Includes/book-config.inc.php";
    $subDB = new SubCategoriesGateway($connection);
    $subResult = $subDB->findAllSorted(true);
    
    $impDB = new ImprintGateway($connection);
    $impResult = $impDB->findAllSorted(true);
    
    $bjDB = new bookJoinsGateway($connection);
    if(isset($_GET['sub'])){
		$bookJoinResult = $bjDB->subFilter($_GET['sub']);
    }elseif(isset($_GET['imp'])){
		$bookJoinResult = $bjDB->impFilter($_GET['imp']);
    }else{
        $bookJoinResult = $bjDB->findAllSortedLimit(true, 20);
    }
?>
<html>
    <head>
        <title>Employees</title>
        <meta charset="UTF-8">
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
                <button onclick="expandDiv()" id="buttonExpand" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  Show Filters
                </button>
                
                <button onclick="location.href='/browse-books.php';" id="filterClear" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  Clear filters
                </button>
                <div class="mdl-grid">

        		<div class="buttonDiv mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">
        		    
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Sub Category</h2>
        			</div>
        	  	<div class="filter-card mdl-card__supporting-text ">
        	  	        <ul id = 'SubCategories'>
        				<?php 
			                    foreach ($subResult as $row) {
					                echo "<li><a href=/browse-books.php?sub='".$row['SubcategoryID']."'>".$row['SubcategoryName']."</a></li>";
		                    	}
                        ?>
                        </ul>
                            

        				
        			</div>
        		</div>
        		
        		<div class=" buttonDiv mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Imprints</h2>
        			</div>
        	  	<div class="filter-card mdl-card__supporting-text">
        	  	        <ul>
        				<?php 
			                    foreach ($impResult as $row) {
					                echo "<li><a href=/browse-books.php?imp='".$row['ImprintID']."'>".$row['Imprint']."</a></li>";
		                    	}
                        ?>
                        </ul>
        				
        			</div>

        		</div>
        		</div>

                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                     <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                         
                         <!--  Need to add current filter with isset -->
                      <h2 id="bookTitle" class="mdl-card__title-text">Books</h2>
                    </div>
                    <div class="mdl-card__supporting-text">   
                        <table class="mdl-data-table">
                            <thead>
                                <th>ThumbNail</th>
                                <th>Title</th>
                                <th>Year</th>
                                <th>Sub Category</th>
                                <th>Imprint</th>
                            </thead>
                            
                            <tbody>
                                <?php 
			                    if(false){
			                        echo "<h3>No Books Match the Filter Records</h3>";
			                    }else{
			                    foreach ($bookJoinResult as $row) {
                                    echo "<tr>";
                                        echo "<td><a href=/single-book.php?ISBN10=".$row['ISBN10']."><img src='/book-images/thumb/".$row['ISBN10'].".jpg'></a></td>";
                                        echo "<td><a href=/single-book.php?ISBN10=".$row['ISBN10'].">".$row['Title']."</a></td>";
                                        echo "<td>".$row['CopyrightYear']."</td>";
                                        echo "<td><a href=browse-books.php?sub='".$row['SubcategoryID'] . "'>" .$row['SubcategoryName']."</a></td>";
                                        echo "<td><a href=browse-books.php?imp='".$row['ImprintID'] . "'>" .$row['Imprint']."</a></td>";
                                    echo "</tr>";
			                    }
		                    	}
                            
                        ?>
                            </tbody>
                        </table>
                    
                    </div>
                    
                </div>
                    
        		</div>  <!-- / mdl-grid -->





                
            
            
            
    </section>
    </main>
    </div>
    </body>