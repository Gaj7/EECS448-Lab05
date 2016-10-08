<?php
$username = $_POST["username"];
$post = $_POST["post"];
if($username == ""){
  echo "Could not create new post: no username was entered.";
}
elseif($post == ""){
  echo "Could not create new post: no username was entered.";
}
else{
  $mysqli = new mysqli("mysql.eecs.ku.edu", "gjurgensen", "Password123!2", "gjurgensen");
  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $userExists = false;
  if($result = $mysqli->query("SELECT user_id FROM Users")){
    while ($row = $result->fetch_assoc()) {
        if($username == $row["user_id"]){
          $userExists = true;
          break;
        }
      }
    $result->free();
  }

  if($userExists){
    $ins = "INSERT INTO Posts(content, author_id) VALUES('$post', '$username')";
    if ($mysqli->query($ins) === TRUE) {
      echo "Post successfully created.";
    }
    else {
      echo "Could not create new post.";
    }
  }
  else{
    echo "Could not create new post: no user found for that username.";
  }
}

?>
