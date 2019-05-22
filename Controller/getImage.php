<?php

  $id = $_GET['id'];

  $mysqli = mysqli_connect("127.0.0.1", "root", "", "PHPVideoPlayer");
  if (!$stmt = $mysqli->prepare("
            SELECT thumbnail
            FROM video 
            WHERE vid=?
        ")){
        die("Prepare failed: (" . $mysqli->errno . ") ".$mysqli->error);
  }
  $escapeString = $mysqli->real_escape_string($pid);
  $stmt->bind_param("s", $escapeString);
  
  if (!$stmt->execute()) {
      die("Execute failed: (" . $stmt->errno . ") ".$stmt->error);
  }
  $result = $stmt->get_result();
  $row = mysqli_fetch_assoc($result);

  header("Content-type: image/jpeg");
  echo $row['thumbnail'];
?>