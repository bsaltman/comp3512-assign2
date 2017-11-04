<?php
    include 'Includes/databaseConnection.inc.php';
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
                <!-- mdl-cell + mdl-card -->
                    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-color--accent mdl-color-text--white">
                            <h2 class="mdl-card__title-text">Employees</h2>
                        </div>
                    <div class="mdl-card__supporting-text"> 
                        <ul class="mdl-list">
                        <?php 
                            try	{
			                    $sql = "SELECT * from Employees ORDER BY LastName";
                                $result = $pdo->query($sql);
                                $value = $result->fetch();
			                    foreach ($result as $row) {
					                echo '<li><a href=/browse-employees.php?empID='.$row['EmployeeID'].'>'.$row['FirstName']." ".$row['LastName']	.'</a></li><br>';
		                    	}
                                }
                                catch(PDOException	$e)	{
                                	die($e->getMessage());
                                }
                        ?>
                        </ul>
                  
                    </div>    
          </div>  <!-- / mdl-cell + mdl-card -->
          
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">

                    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Employee Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <div class="mdl-tabs__tab-bar">
                              <a href="#address-panel" class="mdl-tabs__tab is-active">Address</a>
                              <a href="#todo-panel" class="mdl-tabs__tab">To Do</a>
                              <a href="#messages-panel" class="mdl-tabs__tab">Messages</a>
                          </div>
                        
                          <div class="mdl-tabs__panel is-active" id="address-panel">
                              
                           <?php 
                           try{ 
                                if(isset($_GET['empID'])){
			                    $sql	=	"select	* from	Employees WHERE EmployeeID =".$_GET['empID'];
			                    $result	=	$pdo->query($sql);
			                    $value = $result->fetch();
			                    if(!$value){
			                        echo "<h3>No Employee Records</h3>";
			                    }
                                else{
			                    echo '<h3>'.$value['FirstName']." ".$value['LastName'].'</h3>';
			                    echo '<div>';
			                    echo  $value['Address'].'<br>';
			                    echo  $value['City'].', '.$value['Region']."<br>";
			                    echo  $value['Country'].', '.$value['Postal']."<br>";
			                    echo  $value['Email'];
			                    echo '</div>';

                                }
                                }
                                }
                                catch(PDOException	$e)	{
                                	die($e->getMessage());
                                }
                           ?>
                           
         
                          </div>
                          <div class="mdl-tabs__panel" id="todo-panel">
                              
                               <?php 
                                if(isset($_GET['empID'])){
                                    try{
        			                    $sql	=	'select	DateBy, Status, Priority, Description from	EmployeeToDo where EmployeeID ='.$_GET['empID']." Order by DateBy";
        			                    $result	=	$pdo->query($sql);
        			                    
                                    }
                                
                                catch(PDOException	$e)	{
                                	die($e->getMessage());
                                }
                                }
                                
                               ?>                                  
                            
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Date</th>
                                      <th class="mdl-data-table__cell--non-numeric">Status</th>
                                      <th class="mdl-data-table__cell--non-numeric">Priority</th>
                                      <th class="mdl-data-table__cell--non-numeric">Content</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   
                                    <?php
                                            if(isset($_GET['empID'])){
                                            $check = false;
                                            while($row	=	$result->fetch())	{
                                            $check = true;
                                            echo "<tr>";
                                            $DateBy = strtotime( $row['DateBy'] );
                                            echo "<td style ='text-align:left;'>".date("Y-M-d", $DateBy)."</td>";
                                            echo "<td style ='text-align:left;'>".$row['Status']."</td>";
                                            echo "<td style ='text-align:left;'>".$row['Priority']."</td>";
                                            echo "<td style ='text-align:left;'>".$row['Description']."</td>";
                                            echo "</tr>";
                                        }
                                        if(!$check){
                                            echo "<tr><td>no To Dos</td></tr>";
                                        }
                                            }
                                    ?>
                            
                                  </tbody>
                                </table>
                           
         
                          </div>
                          
                          <div class="mdl-tabs__panel" id="messages-panel">
                              
                               <?php 
                                if(isset($_GET['empID'])){
                                    try{
        			                    $sqlTEST	=	'select	* FROM EmployeeMessages where ContactID ='.$_GET['empID'].' Order by MessageDate';
        			                    $messageResult	=	$pdo->query($sqlTEST);
                                    }
                                
                                catch(PDOException	$e)	{
                                	die($e->getMessage());
                                }
                                }
                                
                               ?>                                  
                            
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Date</th>
                                      <th class="mdl-data-table__cell--non-numeric">Category</th>
                                      <th class="mdl-data-table__cell--non-numeric">From</th>
                                      <th class="mdl-data-table__cell--non-numeric">Message</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   
                                    <?php
                                        if(isset($_GET['empID'])){
                                            $check = false;
                                            while($row	=	$messageResult->fetch())	{
                                                $check = true;
                                                echo "<tr>";
                                                $DateBy = strtotime( $row['MessageDate'] );
                                                echo "<td style ='text-align:left;'>".date("Y-M-d", $DateBy)."</td>";
                                                echo "<td style ='text-align:left;'>".$row['Category']."</td>";
                                                try{
                    			                    $sqlSender	=	'select	FirstName,LastName FROM Employees WHERE EmployeeID = '.$row['EmployeeID'];
                    			                    $Sender	=	$pdo->query($sqlSender);
                    			                    $Sender = $Sender->fetch();
                                                }
                                                catch(PDOException	$e)	{
                                            	die($e->getMessage());
                                                }
                                                echo "<td style ='text-align:left;'>".$Sender['FirstName']." ".$Sender['LastName']."</td>";
                                                echo "<td style ='text-align:left;'>".$row['Content']."</td>";
                                                echo "</tr>";
                                            }
                                        $pdo    =	null;
                                        if(!$check){
                                            echo "<tr><td>No Messages</td></tr>";
                                        }
                                        }
                                    ?>
                            
                                  </tbody>
                                </table>
                          </div>
                        </div>                         
                    </div>    
  
                 
              </div>  <!-- / mdl-cell + mdl-card -->

                
            

            </div>  <!-- / mdl-grid -->
    </section>
    </main>
    </div>
    </body>
    