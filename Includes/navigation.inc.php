<?php

/* outputs the html for the navigation bar*/
echo  '<div class="mdl-layout__drawer mdl-color--blue-grey-800 mdl-color-text--blue-grey-50">';
echo       '<div class="profile">';
echo           '<img src="/Images/jaja.png" class="avatar">';
echo           '<h4>Ben Saltman</h4>';           
echo       '</div>';

echo    '<nav class="mdl-navigation mdl-color-text--blue-grey-300">';
echo        '<a href="index.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">dashboard</i> Index</a>';
echo        '<a href="aboutus.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">info</i> About us</a>';
echo        '<a href="browse-universities.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">school</i> Universities</a>';
echo        '<a href="browse-employees.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">person</i> Employees</a>';
echo        '<a href="browse-books.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">book</i> Books</a>';
echo        '<a href="login.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">book</i> Login</a>';
echo        '<a class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">timeline</i> Analytics</a>';
            
echo    '</nav>';
echo  '</div>';
?>