<?php
    include "Includes/book-config.inc.php";
    $userDB = new UserGateway($connection);
    $userLoginDB = new UsersLoginGateway($connection);
    $damn = false;
    if(isset($_POST['Username']) && isset($_POST['Password'])){
        $userLoginInfo = $userLoginDB->findByID($_POST['Username']);
        $userInfo = $userDB->findByID($userLoginInfo['UserID']);
        if (empty($userLoginInfo)){
            //Wrong UserName does not exist
        }
        else{
            $damn = true;
            if (md5($_POST['Password'] . $userLoginInfo['Salt']) == $userLoginInfo["Password"]){
                session_start();
                $_SESSION["UserID"] = $userInfo["UserID"];
                $_SESSION["FirstName"] = $userInfo["FirstName"];
                $_SESSION["LastName"] = $userInfo["LastName"];
                $_SESSION["Email"] = $userInfo["Email"];
                if(isset($_GET['page'])){
                    header('Location: '. $_GET['page']);
                }else{
                    header('Location: index.php');
                }
            } else{
                //password is wrong
                //Clear password field 
                //Highlight the password field
            }
        }
    }elseif(!isset($_POST['Password'])){
        //No password entered
        //Highlight the password field
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
<form method="POST" action="login.php">
    Username: <input type="text" name="Username"/>
    Password <input type="text" name="Password"/>
    <input type="submit">
</form>
<?php

?>
</body>