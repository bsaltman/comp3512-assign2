<?php
    function generateCard($name, $link, $size, $id){
    echo    '<div class="mdl-cell mdl-cell--'.$size.'-col demo-card-square mdl-card mdl-shadow--2dp mdl-color-text--white">
              <div class="mdl-card__title mdl-card--expand mdl-color--primary" id="'.$id.'">

              </div>
              <div class="mdl-card__actions mdl-card--border mdl-color-text--white mdl-color--accent">
                <a href ="'.$link.'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    '.$name.'
                </a>
              </div>
            </div>';
    }
    
    function generateLongCard($Name, $Address, $City, $State, $Zip, $Website, $Lat, $Long){
    echo    '<div class="mdl-cell mdl-cell--6-col demo-card-square mdl-card mdl-shadow--2dp">
               <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white"">
                    <h5> University Info </h5>
              </div>
              <div class="mdl-card__supporting-text">'
                .$Name.'<br>'.$Website.'<br>'
                .$City.', '.$State.'<br>' 
                .$Address.', '.$Zip.'<br>'
                .'<span id="Gone"> latitude: <span id="lati">'.$Lat.'</span><br>'.'Longitude: <span id="long">'.$Long.
                
              '</span></span></div>
            </div>';
    }
?>