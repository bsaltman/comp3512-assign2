<!-- Logs the user out by deleting the current session and redirecting
    to the login page with the relevant information. If you wanted to change the 
    page a user is directed to after a login to just index you would remove the
    query string concatanation in the header call-->
<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    header("location:login.php?page=". $_GET['page'])
?>