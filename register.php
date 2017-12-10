<?php
    include "Includes/book-config.inc.php";
    $userDB = new UserGateway($connection);
    $userLoginDB = new UsersLoginGateway($connection);
    //Last Name is a required field
    if(isset($_POST['LastName'])){
        $salt = md5(microtime());
        $date = date("Y-m-d H:i:s");
        $UserIDCheck = $userDB->findAll();
        $UserID = 1;

        foreach($UserIDCheck as $row){
            //check for duplicat UserNames
            $UserID++;
        }

        $userDB->InsertUserSelectStatement($UserID,$_POST['FirstName'],$_POST['LastName'],$_POST['Address'],
        $_POST['City'],$_POST['Region'],$_POST['Country'],$_POST['Postal'],$_POST['Phone'],$_POST['Email']);
        
        $userLoginDB->InsertUsersLogin($UserID,$_POST['Email'],md5($_POST['Password'].$salt),$salt,$date);
        header('location:login.php');
    }
    
?>


<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="js/myscripts.js"></script>
        <script src="js/registerScript.js" type="text/javascript"></script>
    </head>
<body class="login">
    
    <div class="mdl-card regCard">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Register</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <form id="registerForm" method="POST" action="register.php" >
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" name="FirstName" type="text" id="FirstName">
                        <label class="mdl-textfield__label" for="FirstName">First Name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="required mdl-textfield__input" name="LastName" type="text" id="LastName">
                        <label class="mdl-textfield__label" for="LastName">Last Name *</label>
                    </div>
                </div>
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" name="Address" type="text" id="Address">
                        <label class="mdl-textfield__label" for="Address">Address</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="required mdl-textfield__input" name="City" type="text" id="City">
                        <label class="mdl-textfield__label" for="City">City *</label>
                    </div>
                </div>
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" name="Region" type="text" id="Region">
                        <label class="mdl-textfield__label" for="Region">Region</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="required mdl-textfield__input" name="Country" type="text" id="Country">
                        <label class="mdl-textfield__label" for="Country">Country *</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" name=" Postal" type="text" id=" Postal">
                        <label class="mdl-textfield__label" for=" Postal"> Postal</label>
                    </div>
                </div>
                <div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name=" Phone" type="text" id=" Phone">
                    <label class="mdl-textfield__label" for=" Phone"> Phone</label>
                </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="required mdl-textfield__input" name="Email" type="email" id=" Email">
                        <label class="mdl-textfield__label" for=" Email"> Email *</label>
                    </div>
                </div>
                <div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="required mdl-textfield__input" name="Password" type="Password" id="Password">
                    <label class="mdl-textfield__label" for="Password">Password *</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="required mdl-textfield__input" name="Re-Password" type="Password" id="Re-Password">
                    <label class="mdl-textfield__label" for="Re-Password">Re-Enter Password *</label>
                </div>
                </div>
                
                <input id="regSubmit" class="mdl-button mdl-color--primary mdl-color-text--white" type="submit" title="Submit" value="Register">
                <strong>(*) required field</strong>
                <div>
                    <span id="errorMessage"></span><br>
                    <span id="missingErrorMessage"></span>
                </div>
            </form>
        </div>
    </div>
</body>
