<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST["username"];
$result = $mysqli->query("SELECT post_id, content, author_id FROM Posts WHERE author_id='$username'");
if($result->num_rows > 0){
  echo "<table cellpadding='5'>";
  echo "<tr><td>post_id</td><td>content</td><td>author_id</td></tr><tr></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td><td>" . $row["author_id"] ."</td></tr>";
  }
  echo "</table>";
  $result->free();
}
else{
  echo "No posts have been made by that user";
}
?>
