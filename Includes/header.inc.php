<?php
    /* outputs the header for CRM admin*/
    //need to add logout functionality (Delete session)
    //add search functionality
    echo "<header class='mdl-layout__header'>";
    echo "<div class='mdl-layout__header-row'>";
    echo "<h1 class='mdl-layout-title'><span>CRM</span> Admin</h1>";
    echo "<div class='mdl-layout-spacer'></div>";
    echo "<div class='mdl-textfield mdl-js-textfield mdl-textfield--expandable
                      mdl-textfield--floating-label mdl-textfield--align-right'>";
    echo "<label class='mdl-button mdl-js-button mdl-button--icon'
                   for='fixed-header-drawer-exp'>";
    echo "<i class='material-icons'>search</i>";
    echo "</label>";
    echo "<div class='mdl-textfield__expandable-holder'>";
    echo "<input class='mdl-textfield__input' type='text' name='sample'
                     id='fixed-header-drawer-exp'>";
    echo "</div>";
    echo "</div>";
    echo '<button id="logout" class="mdl-button mdl-js-button mdl-button--raised">Logout</button>';
    echo "</div>";
    echo "</header>";
?>