<?php
$username = $_POST["username"];
if($username == ""){
  echo "Could not create new user, no username was entered.";
}
else{

  $mysqli = new mysqli("https://mysql.eecs.ku.edu/index.php?db=gjurgensen&token=936225b36729182c75f8cd9e5109329d", "gjurgensen", "Password123!2", "gjurgensen");
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
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //echo "User " . $username . " successfully created.";
  }
  else
    echo "Could not create new user, username already taken.";
}





// $username = $_POST["username"];
//
// if($username == ""){
//   echo "Could not create new user, no username was entered.";
// }
// else {
//   echo "User " . $username . " successfully created.";
// }

/*
if($username == ""){
  echo "Could not create new user, no username was entered.";
}
//elseif ( username is already in table)
//  echo "Could not create new user, username already taken.";
else {
  //add user to table
  echo "User " . $username . " successfully created.";
}
*/

?>
