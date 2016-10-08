<?php
$username = $_POST["username"];
if($username == ""){
  echo "Could not create new user, no username was entered.";
}
else{

  $mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
  }

  //$query = "SELECT user_id FROM Users";
  $nameIsUnique = true;
  if($result = $mysqli->query("SELECT user_id FROM Users")){
    while ($row = $result->fetch_assoc()) {
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
        echo $row["user_id"] . "<br>";
        $nameIsUnique = false;
      }
    $result->free();
  }

  if($nameIsUnique){
    if ($mysqli->query("INSERT INTO Users (user_id) VALUES ($username)") === TRUE) {
      echo "User " . $username . " successfully created.";
    }
    else {
      echo "Error: " . $mysqli->error;
    }
    //echo "User " . $username . " successfully created.";
  }
  else
    echo "Could not create new user, username already taken.";
}
?>
