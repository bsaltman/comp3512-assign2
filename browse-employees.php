<?php
include 'Includes/book-config.inc.php';
$empDB = new EmployeesGateway($connection );
$toDoDB = new EmployeeToDoGateway($connection);
$messDB = new EmployeeMessagesGateway($connection);

$cityList = $empDB->cityList();
?>
<html>
    <head>
        <title>Employees</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script></script>
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
                    <!-- Need to move style to css page-->
                    <div id="filterCard" class="mdl-cell mdl-cell--12-col mdl-card  mdl-shadow--2dp" style="min-height:0;">
                        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                            <!-- add a down arrow -->
                            <h2 class="mdl-card__title-text">Filter</h2>
                            <i id='menuDropdown' class="material-icons" role="presentation">arrow_drop_down</i>
                        </div>
                        <div class="mdl-card__supporting-text" style="display:none;">
                            <form method="GET" action="browse-employees.php">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" name="LastName" type="text" id="Lastname">
                                    <label class="mdl-textfield__label" for="Lastname">Employee LastName</label>
                                </div>
                                <div class="mdl-selectfield mdl-js-selectfield">
                                    <select class="mdl-selectfield__select" id="citySelect" name="city">
                                      <option value="" disabled selected>City</option>
                                        <?php
                                        foreach ($cityList as $row) {
                                            echo "<option>" . $row[City] ."</option>";
                                        }
                                        ?>
                                    </select>
                                    <input class="mdl-button" type="submit" value="Filter">
                                </div>
                            </form>
                            
                        </div>
                    </div>
                <!-- mdl-cell + mdl-card -->
                    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-color--accent mdl-color-text--white">
                            <h2 class="mdl-card__title-text">Employees</h2>
                        </div>
                    <div class="mdl-card__supporting-text"> 
                        <ul class="mdl-list">
                        <?php 
                                $query ="";
                                if(!empty($_GET["LastName"]) && isset($_GET["city"])){
                                    $result = $empDB->findByCityLastName($_GET['city'],$_GET['LastName']);
                                    $query= "LastName=" . $_GET["LastName"] . "&city=" . $_GET['city'];

                                }elseif (!empty($_GET["LastName"])) {
                                    $result = $empDB->findByLastName($_GET["LastName"]);
                                    $query= "LastName=" . $_GET["LastName"];
                                }elseif (isset($_GET["city"])) {
                                    $result = $empDB->findByCity($_GET['city']);
                                    $query= "city=" . $_GET['city'];
                                }else{
			                    $result = $empDB->findAllSorted(true);
                                }
			                    foreach ($result as $row) {
					                echo '<li><a href=/browse-employees.php?'.$query.'&empID='.$row['EmployeeID'].'>'.$row['FirstName']." ".$row['LastName']	.'</a></li><br>';
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
                                    
                                $result =  $empDB->findById($_GET["empID"]);
			                    if(!$result){
			                        echo "<h3>No Employee Records</h3>";
			                    }
                                else{
			                    echo '<h3>'.$result['FirstName']." ".$result['LastName'].'</h3>';
			                    echo '<div>';
			                    echo  $result['Address'].'<br>';
			                    echo  $result['City'].', '.$result['Region']."<br>";
			                    echo  $result['Country'].', '.$result['Postal']."<br>";
			                    echo  $result['Email'];
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
                                            $result	=  $toDoDB->findByFk($_GET['empID']);
                                            $check = false;
                                            foreach($result as $row)	{
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
                                        $messageResult = $messDB->findAllSorted(true);
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
                                            foreach($messageResult	as	$row)	{
                                                $check = true;
                                                echo "<tr>";
                                                $DateBy = strtotime( $row['MessageDate'] );
                                                echo "<td style ='text-align:left;'>".date("Y-M-d", $DateBy)."</td>";
                                                echo "<td style ='text-align:left;'>".$row['Category']."</td>";
                                                try{
                                                    $Sender = $empDB->findById($row['EmployeeID']);
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
    <script src="myscripts.js"></script>
    </body>
    