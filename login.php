<?php

    include "Includes/book-config.inc.php";
    $userDB = new UserGateway($connection);
    $userLoginDB = new UsersLoginGateway($connection);
    $passWrong = false;
    $userWrong = false;


    if(isset($_POST['Username']) && isset($_POST['Password'])){
        $userLoginInfo = $userLoginDB->findByID($_POST['Username']);
        $userInfo = $userDB->findByID($userLoginInfo['UserID']);
        if (empty($userLoginInfo)){
            //Wrong UserName does not exist
            $userWrong = true;

        }
        else{
            if (md5($_POST['Password'] . $userLoginInfo['Salt']) == $userLoginInfo["Password"]){
                session_start();
                $_SESSION["UserID"] = $userInfo["UserID"];
                $_SESSION["FirstName"] = $userInfo["FirstName"];
                $_SESSION["LastName"] = $userInfo["LastName"];
                $_SESSION["Email"] = $userInfo["Email"];
                if(isset($_GET['page'])){
                    header('Location:'. $_GET['page']);
                }else{
                    session_start();
                    header('Location:index.php');
                    
                }
            } else{
                //password is wrong
                //Clear password field 
                //Highlight the password field
                $passWrong = false;
            }
        }
    }elseif(!isset($_POST['Password'])){
        //No password entered
        //Highlight the password field
        $passWrong = false;
    }
?>
<html>
    <head>
        <title>Employees</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <style>
            body {
                background:url("/Images/CRMLogo.png");
                background-repeat:no-repeat;
                background-position: center; 
                background-color:rgba(96,125,139,0.7);
            }
            
            .loginForm {
                position:absolute;
                left:50%;
                top:50%;
                transform: translate(-50%, -50%);
                
                height:40%;
                width:25%;
                min-height:280px;
                min-width:0px;
                
                background-color:rgb(255, 189, 102);
            }
            
            #logForm {
                padding:1%;
            }
        </style>
    </head>
<body class="login">
    <div class="mdl-card loginForm">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Login</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <form id="logForm" method="POST" action="login.php">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="Username" type="text" id="Username">
                    <label class="mdl-textfield__label" for="Username">Username</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="Password" type="password" id="Password">
                    <label class="mdl-textfield__label" for="Password">Password</label>
                </div>
                <div>
                <input class="mdl-button mdl-color--primary mdl-color-text--white" type="submit" title="Submit">
                </div>
            </form>
        </div>
    </div>
                    
                     
<?php
    if($passWrong){
        //js update form
    }
    if($userWrong){
        //js update form
    }

?>
</body>