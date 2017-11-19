<?php
echo "<section class='page-content'>" .
            "<div id='searchInput' style='display:none;'>" .
                "<form id='searchForm' method='GET' action ='browse-employees.php'>" .
                "<input type='text' name='LastName' id='searchBar'></input>" .
                "<i id='executeSearch' class='material-icons' role='search'>search</i>" .
                "</form>" .
            "</div>";
?>