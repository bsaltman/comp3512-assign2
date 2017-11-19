<?php
    /* outputs the header for CRM admin*/
    //need to add logout functionality (Delete session)
    //add search functionality
    echo "<header class='mdl-layout__header'>";
    echo "<div class='mdl-layout__header-row'>";
    echo "<h1 class='mdl-layout-title'><span>CRM</span> Admin</h1>";
    echo "<div class='mdl-layout-spacer'></div>";
    echo '<button id="search" class="mdl-button mdl-js-button mdl-button--raised">Search</button>';
    echo '<button id="logout" class="mdl-button mdl-js-button mdl-button--raised">Logout</button>';
    echo "</div>";
    echo "</header>";
    
?>