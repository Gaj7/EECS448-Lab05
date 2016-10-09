<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}

if($result = $mysqli->query("SELECT post_id FROM Posts")){
  while ($row = $result->fetch_assoc()) {
    if($_POST[$row["post_id"]] == "y"){
      if($mysqli->query("DELETE FROM Posts WHERE post_id=" . $row['post_id']))
        echo "post_id: " . $row["post_id"] . "successfully deleted.";
      else
        echo "post_id: " . $row["post_id"] . " failed to delet.";
    }
  }
}
?>
