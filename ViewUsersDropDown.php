<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $result = $mysqli->query("SELECT user_id FROM Users");
  if($result->num_rows > 0){
    echo "<select>";
    while ($row = $result->fetch_assoc()) {
      echo "<option name='username' value='" . $row["user_id"] . "'>" . $row["user_id"] . "</option>";
    }
    echo "</select>";
    $result->free();
  }
?>
