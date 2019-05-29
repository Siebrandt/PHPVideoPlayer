<?php
/*
 *  @autor Rainer Siebrandt
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet sämtliche Applikationsfunktionen.
 */

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
        
        $videos = GetFirstVideoOfPlaylist($playlist['pid']);
        
        if($videos != null){
            foreach ($videos as $video) {
                echo '<img class="img-thumbnail" src="data:image/jpg;base64,'.base64_encode($video["thumbnail"]).'", alt="'.$video["title"].'.jpg">';
            }
        }
        else
        {
            echo '<img class="img-thumbnail" src="../Videos/NoVideo.jpg.", alt="NoVideo.jpg">';
        }
        // echo " Array Shit $video[0] $video[1]";
        
        //include("getImage.php");
        //echo '<img src="getImage.php?id='.$video['vid'].'"/>';
        
        echo '<div class="card-body">';
            echo '<p class="card-text">'.$playlist["plname"].'</p>';
            echo '<div class="d-flex justify-content-between align-items-center">';
                echo '<div class="btn-group">';
                    if($videos != null)echo '<a href=../Controller/index.php?pid='.$playlist["pid"].'>Ansehen</a>';
                    else echo 'Kein Video vorhanden';
                echo '</div>';
                echo '<small class="text-muted"></small>';
        echo '</div></div></div></div>';       
}

function CreateVideoList($pid){
    echo '<div class="scrolling-wrapper-flexbox">';
    
    $videos = GetVideosOfPlaylist($pid);
    
    if($videos != null){
        foreach ($videos as $video) {
            echo '<div class="card col-sm-4"><img class="img-fluid" src="data:image/jpg;base64,'.base64_encode($video["thumbnail"]).'", alt="'.$video["title"].'.jpg"></div>';
            
            /*<img class="img-fluid" src="data:image/jpg;base64,'.base64_encode($video["thumbnail"]).'", alt="'.$video["title"].'.jpg">*/
        }
    }
    echo '</div></div>';
    
    /*<div class="col-xs-4">1</div><!--
    --><div class="col-xs-4">2</div><!--
    --><div class="col-xs-4">3</div><!--
    --><div class="col-xs-4">4</div><!--
    --><div class="col-xs-4">5</div><!--
    --><div class="col-xs-4">6</div><!--
    --><div class="col-xs-4">7</div><!--
    --><div class="col-xs-4">8</div><!--
    --><div class="col-xs-4">9</div>
    </div>
    </div>*/
}

/*************/
/* TEMPLATES */
/*************/
function playlist(){
    if(isset($_REQUEST) && isset($_REQUEST["pid"])){
        echo runTemplate("../View/Pages/player.htm.php");
    }
    else{
        echo runTemplate("../View/Pages/playlists.htm.php");
    }
    
}

function player(){
    echo runTemplate("../View/Pages/player.htm.php");
}
?>

