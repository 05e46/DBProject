<?php
  $db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
  //$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }

  $thread = $_REQUEST['id'];
  $action = $_REQUEST['action'];
  $forum = $_REQUEST['forum'];
  $status = "open";

  if (($action == "closed") || ($action == "open")){
    $stmt = $db->prepare("UPDATE Thread SET Status=? WHERE threadID=?");
    $stmt->bind_param("ss", $action, $thread);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header('Location: thread.php?id='.$forum);
    }
    else {
      echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
    }
  }
  else if ($action == "delete") {
    $stmt = $db->prepare("DELETE FROM Thread WHERE threadID=?");
    $stmt->bind_param("s", $thread);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header('Location: thread.php?id='.$forum);
    }
    else {
      echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
    }
  }
  else {
    echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";

  }

  ?>
