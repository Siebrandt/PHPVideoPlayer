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
                    if($videos != null)echo '<a href=../Controller/index.php?pid='.$playlist["pid"].'&vid='.$video["vid"].'>Ansehen</a>';
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
            if($video["vid"] == $_REQUEST["vid"])
                echo '<div class="card col-sm-4 bg-primary"><a href=../Controller/index.php?pid='.$pid.'&vid='.$video["vid"].'><img class="img-fluid" src="data:image/jpg;base64,'.base64_encode($video["thumbnail"]).'", alt="'.$video["title"].'.jpg"></a>'.$video["title"].'</div>';
            else
                echo '<div class="card col-sm-4"><a href=../Controller/index.php?pid='.$pid.'&vid='.$video["vid"].'><img class="img-fluid" src="data:image/jpg;base64,'.base64_encode($video["thumbnail"]).'", alt="'.$video["title"].'.jpg"></a>'.$video["title"].'</div>';
        }
    }
    echo '</div></div>';
}

function LoadPlayerSource($vid){
    $videos = GetVideo($vid);
    
    if($videos != null){
        foreach ($videos as $video) {
            echo base64_encode($video["video"]);
            IncreaseViewcount($vid);
            return;
        }
    }
}

function LoadVideoStats($vid){
    $videos = GetVideo($vid);
    
    if($videos != null){
        foreach ($videos as $video) {
            echo '<div class="col-sm-6 text-left h4">'.$video['title'].'</div><div class="col-sm-3 text-right h5">Aufrufe '.$video['views'].'</div><div class="col-sm-3 text-right h5">';
            echo '<i class="fa fa-thumbs-o-up like-btn" data-id="'.$video['likes'].'"></i><span class="likes">'.$video['likes'].'</span>   <i class="fa fa-thumbs-o-down dislikes-btn" data-id="'.$video['dislikes'].'"></i><span class="dislikes">'.$video['dislikes'].'</span></div>';
            echo '<script src ="../Controller/script.js"></script>';
            return;
        }
    }
}

function IncreaseViewcount($vid){
    $videos = GetVideo($vid);
    
    if($videos != null){
        foreach ($videos as $video) {
            $views = $video['views'] + 1;

            UpdateVideo($video['vid'],$video['likes'],$video['dislikes'],$views);
            return;
        }
    }
}

/*************/
/* TEMPLATES */
/*************/
function playlist(){
    if(isset($_REQUEST) && isset($_REQUEST["pid"])){
        return runTemplate("../View/Pages/player.htm.php");
    }
    else{
        return runTemplate("../View/Pages/playlists.htm.php");
    }
    
    $videos = GetVideo($_REQUEST["vid"]);
    
    if($videos != null){
        foreach ($videos as $video) {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                switch ($action) {
                    case 'like':
                        $likes = $video['likes'] + 1;
                        UpdateVideo($video['vid'],$video['likes'],$video['dislikes'],$likes);
                        break;
                    case 'dislike':
                        $dislikes = $video['likes'] + 1;
                        UpdateVideo($video['vid'],$video['likes'],$video['dislikes'],$dislikes);
                        break;
                    case 'unlike':
                        $likes = $video['likes'] - 1;
                        UpdateVideo($video['vid'],$video['likes'],$video['dislikes'],$likes);
                        break;
                    case 'undislike':
                        $dislikes = $video['likes'] - 1;
                        UpdateVideo($video['vid'],$video['likes'],$video['dislikes'],$dislikes);
                        break;
                    default:
                        break;
                }
            return;
        }
    }
}

function player(){
    return runTemplate("../View/Pages/player.htm.php");
}
?>

