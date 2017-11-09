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
                            <?php
                                if(isset($_GET['ISBN10']))
                                echo "<img src=/book-images/medium/".$_GET['ISBN10'].".jpg>";
                                $sql = "SELECT Books.ISBN10, Books.ISBN13, Books.Title, Books.CopyrightYear, Books.TrimSize, Books.PageCountsEditorialEst, Books.Description,
                                        BindingTypes.BindingType, Subcategories.SubcategoryName, Imprints.Imprint, Statuses.Status
                                        FROM Books
                                        INNER JOIN Imprints 
        			                    ON Books.ImprintID = Imprints.ImprintID
        			                    INNER JOIN Subcategories
        			                    ON Books.SubcategoryID = Subcategories.SubcategoryID
        			                    INNER JOIN BindingTypes
        			                    ON Books.BindingTypeID = BindingTypes.BindingTypeID
        			                    INNER JOIN Statuses
        			                    ON Books.ProductionStatusID = Statuses.StatusID
        			                    WHERE Books.ISBN10='".$_GET['ISBN10']."'";
 
        			                   
        			                    
        			            $result = $pdo->query($sql);
        			            echo "<div>";
        			            foreach ($result as $row) {
        			               echo "<h5>".$row['Title']." (".$row['CopyrightYear'].")</h5>";
        			               echo  $row['Description']."<br><br>";
        			               echo  $row['PageCountsEditorialEst']." pages - ".$row['BindingType']." - ".$row['TrimSize']."<br>";
        			               echo "ISBN10: ".$row['ISBN10']."<br>";
        			               echo "ISBN13: ".$row['ISBN13']."<br>";
        			               echo "Subcategory: ".$row['SubcategoryName']."<br>";
        			               echo "Imprint: ".$row['Imprint']."<br>";
        			               echo "Production Status: ".$row['Status']."<br>";
        			            }
        			            echo "</div>";
                            ?>

        				
        		    </div>
        		</div>
        		
        	    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
        		    
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Authors</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
        		      <?php
        		        try{
        		        $sql = "SELECT Authors.FirstName, Authors.LastName
        		                FROM Authors
        		                INNER JOIN BookAuthors 
        		                ON Authors.AuthorID = BookAuthors.AuthorID
        		                INNER JOIN Books
        		                ON Books.BookID = BookAuthors.BookId
        		                WHERE Books.ISBN10='".$_GET['ISBN10']."' ".
        		                "ORDER BY BookAuthors.Order";
        		                
        		         $result = $pdo->query($sql);  

        		         foreach($result as $row){
        		             echo "<h5>".$row['FirstName']." ".$row['LastName']."</h5>";
        		         }

        		        }catch(PDOException	$e)	{
                            die($e->getMessage());
                        }
                        
        		        
        		      ?>
        		 </div>
        		</div>
        		
        		<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
        		    
        			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        				<h2 class="mdl-card__title-text">Universities Who Have Adopted This Book</h2>
        			</div>
        		 <div class="filter-card mdl-card__supporting-text ">
        		     <?php
        		     try{
        		        $sql = "SELECT Universities.Name
        		                FROM Universities
        		                INNER JOIN Adoptions 
        		                ON Universities.UniversityID = Adoptions.UniversityID
        		                INNER JOIN AdoptionBooks
        		                ON Adoptions.AdoptionID = AdoptionBooks.AdoptionID
        		                INNER JOIN Books
        		                ON Books.BookID = AdoptionBooks.BookID
        		                WHERE Books.ISBN10='".$_GET['ISBN10']."' ".
        		                "ORDER BY Universities.Name";
        		                
        		         $result = $pdo->query($sql);  
                         echo "<ul id='UniList'>";
        		         foreach($result as $row){
        		             echo "<li>".$row['Name']."</li>";
        		         }
        		         echo "</ul>";

        		        }catch(PDOException	$e)	{
                            die($e->getMessage());
                        }
        		     ?>
        		 </div>
        		</div>
        		
        		</div>  <!-- / mdl-grid -->
    </section>
    </main>
    </div>
    </body>