<?php
session_start();
include('header.php');

$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
if(!$db){
  echo "Error connecting to database.";
  exit;
}

//check to see if the user is logged in
if(isset($_SESSION['user']) == FALSE){
  echo "Please login to post";
}

  $stmt = $db->prepare("INSERT INTO post (postText, postUser, uploadDate) VALUES (?,?,?)");
  $stmt->bind_param("sss", $postText, $postUser, $uploadDate);
  if ($stmt->execute()) {
    $stmt->close();
    $db->close();
    session_start();
    $_SESSION['user'] = $username;
    header("Location: userPosts.php");
  }
  else {
    echo "<h1>Error entering post</h1>";
    echo "<form action='userPosts.php'><input type='submit' value='Go Back'>";
  }
?>
