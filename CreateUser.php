<?php
$username = $_POST["username"];
if($username == ""){
  echo "Could not create new user: no username was entered.";
}
else{

  $mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $ins = "INSERT INTO Users(user_id) VALUES('$username')";
  if ($mysqli->query($ins) === TRUE) {
    echo 'User "' . $username . '" successfully created.';
  }
  else {
    echo "Could not create new user: username " . $username ." already taken";
  }
}

//   $nameIsUnique = true;
//   if($result = $mysqli->query("SELECT user_id FROM Users")){
//     while ($row = $result->fetch_assoc()) {
//         if($username == $row["user_id"])
//           $nameIsUnique = false;
//       }
//     $result->free();
//   }
//
//   if($nameIsUnique){
//     $ins = "INSERT INTO Users(user_id) VALUES('$username')";
//     if ($mysqli->query($ins) === TRUE) {
//       echo 'User "' . $username . '" successfully created.';
//     }
//     else {
//       echo "Error: " . $mysqli->error;
//     }
//   }
//   else
//     echo "Could not create new user, username already taken.";
// }
?>
