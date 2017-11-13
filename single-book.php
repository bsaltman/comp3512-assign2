<?php
    include 'Includes/book-config.inc.php';
    $tjDB = new tableJoinsGateway($connection);
    $authorDB = new AuthorJoinGateway($connection);
    $uniJoinDB = new UniversityJoinGateway($connection);
    if(isset($_GET['ISBN10'])){
        $singleBook = $tjDB->byISBN($_GET['ISBN10']);
        $adoptionUni = $uniJoinDB->byISBN($_GET['ISBN10']);
        $authors = $authorDB->byISBN($_GET['ISBN10']);
    }
?>

<html>
    <head>
        <title>Employees</title>
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
        		<div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">
        		    
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Book Information</h2>
        			</div>
        	        <div class="filter-card mdl-card__supporting-text ">
        	            <div>
                            <?php
        			            /* ADD IMAGE */
        			            foreach ($singleBook as $row) {
        			               echo "<h5>".$row['Title']." (".$row['CopyrightYear'].")</h5>";
        			               echo  $row['Description']."<br><br>";
        			               echo  $row['PageCountsEditorialEst']." pages - ".$row['BindingType']." - ".$row['TrimSize']."<br>";
        			               echo "ISBN10: ".$row['ISBN10']."<br>";
        			               echo "ISBN13: ".$row['ISBN13']."<br>";
        			               echo "Subcategory: ".$row['SubcategoryName']."<br>";
        			               echo "Imprint: ".$row['Imprint']."<br>";
        			               echo "Production Status: ".$row['Status']."<br>";
                                }
                            ?>
        				</div>
        		    </div>
        		</div>
        		
        	    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
        		    
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Authors</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
        		      <?php
        		         foreach($authors as $row){
        		             echo "<h5>".$row['FirstName']." ".$row['LastName']."</h5>";
        		         }
        		      ?>
        		 </div>
        		</div>
        		
        		<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
        		    
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Universities Who Have Adopted This Book</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
        		     <ul id='UniList'>
        		     <?php
        		         foreach($adoptionUni as $row){
        		             echo "<li>".$row['Name']."</li>";
        		         }
        		     ?>
        		     </ul>
        		 </div>
        		</div>
        		
        		</div>  <!-- / mdl-grid -->
    </section>
    </main>
    </div>
    </body>