<?php
if(! isset($_SESSION['UserID'])){
    header('location:login.php?page=' . str_replace("/","",basename(__FILE__)));
}
?>