<?php
/*
 *  @autor Rainer Siebrandt
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 */

function GetPlaylists(){
    $mysqli = mysqli_connect("127.0.0.1", "root", "", "PHPVideoPlayer");
    if (!$stmt = $mysqli->prepare("
            SELECT *
            FROM playlist AS pl
            ORDER BY plname
        ")){
        die("Prepare failed: (" . $mysqli->errno . ") ".$mysqli->error);
    }
    
    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") ".$stmt->error);
    }
    $result = $stmt->get_result();
    
    return $result;
}

function GetFirstVideoOfPlaylist($pid){
    $mysqli = mysqli_connect("127.0.0.1", "root", "", "PHPVideoPlayer");
    if (!$stmt = $mysqli->prepare("
            SELECT pl.pid, video.vid, video.title, video.video, video.thumbnail, video.duration
            FROM playlist AS pl
            INNER JOIN playlist_has_video AS p2v
            ON pl.pid = p2v.pid
            INNER JOIN video
            ON p2v.vid = video.vid
            WHERE pl.pid=?
            ORDER BY video.title
            LIMIT 1
        ")){
        die("Prepare failed: (" . $mysqli->errno . ") ".$mysqli->error);
    }
    
    $escapeString = $mysqli->real_escape_string($pid);
    $stmt->bind_param("s", $escapeString);
    
    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") ".$stmt->error);
    }
    $result = $stmt->get_result();
    
    return mysqli_fetch_row($result);
}

?>