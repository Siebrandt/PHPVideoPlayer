<?php
/*
 *  @autor Rainer Siebrandt
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet sämtliche Applikationsfunktionen.
 */

function RunTemplate( $template ) {
    ob_start();
    include($template);
    $inhalt=ob_get_contents();
    ob_end_clean();
    return $inhalt;
}

function CreatePlaylistPanels(){
    $playlists = GetPlaylists();
    $cnt = 0;
    
    echo '<div class="row">';

    foreach ($playlists as $playlist) {
        if($cnt == 3){
            $cnt = 0;
            
            echo '</div><div class="row">';
        }
        else{
            $cnt ++;
        }
        
        CreatePlaylistPanel($playlist);
    }
    echo '</div>';
}

function CreatePlaylistPanel($playlist){
    echo '<div class="col-md-4">';
        echo '<div class="card mb-4 shadow-sm">';
        echo '<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>';
        echo '<div class="card-body">';
            echo '<p class="card-text">'.$playlist["plname"].'</p>';
            echo '<div class="d-flex justify-content-between align-items-center">';
                echo '<div class="btn-group">';
                    echo '<a href=index.php?pid='.$playlist["pid"].'>Ansehen</a>';
                echo '</div>';
                echo '<small class="text-muted"></small>';
        echo '</div></div></div></div>';       
}


?>

