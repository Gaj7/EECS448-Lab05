<?php
$username = $_POST["username"];

if($username = "")
  echo "Could not create new user, no username was entered.";
//elseif ( username is already in table)
//  echo "Could not create new user, username already taken.";
else {
  //add user to table
  echo "User " . $username . " successfully created.";
}

echo $username;
?>
