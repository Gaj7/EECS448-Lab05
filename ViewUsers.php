<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}

$result = $mysqli->query("SELECT user_id FROM Users");
if($result->num_rows > 0){
  echo "<table><tr><td>user_id</td></tr><tr></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["user_id"] . "</td></tr>";
  }
  echo "</table>";
  $result->free();
}
else{
  echo "No users have been created.";
}
?>
