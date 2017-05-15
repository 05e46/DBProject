<?php
  $db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
  //$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }

  $user = $_REQUEST['account'];
  $action = $_REQUEST['action'];

  if ($action == "delete"){
    $query = 'DELETE FROM User WHERE Username=?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $user);
  }
  else {
    $query = 'UPDATE User SET Status=? WHERE Username=?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $action, $user);
  }
  if ($stmt->execute()){
    header("Location: admin.php");
  }
  else {
    echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
  }
  ?>
