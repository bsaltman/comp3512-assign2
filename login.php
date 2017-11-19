<?php
    session_start();
    include "Includes/book-config.inc.php";
    
    //Gateways that faciliate interaction with DB tables
    $userDB = new UserGateway($connection);
    $userLoginDB = new UsersLoginGateway($connection);
    
    //default value updated if user inputs inccorect info and tries to login
    $loginInfoWrong = false;
    
    //String for action of login form, query stringed concatanated fromr reference
    //page
    $locationString = "login.php";
    if(isset($_GET['page'])){
                    $locationString .= "?page=" . $_GET['page'];
                }

    //If the login form has been submited this session
    if(isset($_POST['Username']) && isset($_POST['Password'])){
        $userLoginInfo = $userLoginDB->findByID($_POST['Username']);
        $userInfo = $userDB->findByID($userLoginInfo['UserID']);
        
            //entered info matches a User in the database Session is created and
            //user is redirected to relevant page
            if (md5($_POST['Password'] . $userLoginInfo['Salt']) == $userLoginInfo["Password"]){
                $_SESSION["UserID"] = $userInfo["UserID"];
                $_SESSION["FirstName"] = $userInfo["FirstName"];
                $_SESSION["LastName"] = $userInfo["LastName"];
                $_SESSION["Email"] = $userInfo["Email"];
                if(isset($_GET['page'])){
                    header('Location:'. $_GET['page']);
                }else{
                    header('Location:index.php');
                    
                }
                
            }
                //Username or password inncorrect

                    $loginInfoWrong = true;
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
    </head>
<body class="login">
    <div class="mdl-card loginForm">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Login</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <form id="logForm" method="POST" action=<?php echo $locationString ?> >
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="Username" type="text" id="Username">
                    <label class="mdl-textfield__label" for="Username">Username</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="Password" type="password" id="Password">
                    <label class="mdl-textfield__label" for="Password">Password</label>
                </div>
                <?php
                    //error message if user inputed the wrong info
                    if($loginInfoWrong){
                        echo "<span id='Errormessage'>Incorrect Login Info!</span>";
                    }
                ?>
                
                <div>
                <input class="mdl-button mdl-color--primary mdl-color-text--white" type="submit" title="Submit" value="Log In">
                </div>
            </form>
        </div>
    </div>
                    
                     
<?php
    // script that updates the visuals to indicate the user entered incorrect info
    // would be more graceful to do this with a prevent default but its due in 15 minutes :/
    if($loginInfoWrong){
        echo "<script src='js/login.js'></script>";
    }

?>
</body>