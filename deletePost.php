<?php
  $db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
  //$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }

  $forum = $_REQUEST['forum'];
  $action = $_REQUEST['action'];
  $post = $_REQUEST['id'];
  $thread = $_REQUEST['thread'];

  if ($action == "delete") {
    $stmt = $db->prepare("DELETE FROM Post WHERE PostID=?");
    $stmt->bind_param("s", $post);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header("Location: userPosts.php?id=$thread&forum=$forum");
    }
    else {
      echo "Something went wrong. Unable to delete post.";
    }
  }
  else {
    echo "Something went wrong. Unable to delete post.";
  }
  ?>
