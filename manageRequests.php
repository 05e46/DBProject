<?php
  $db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
  //$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }

  $forum = $_REQUEST['id'];
  $action = $_REQUEST['action'];
  $status = "open";

  if ($action == "approve"){
    $stmt = $db->prepare("UPDATE Forum SET Status=? WHERE ForumId=?");
    $stmt->bind_param("ss", $status ,$forum);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header("Location: admin.php");
    }
    else {
      echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
    }
  }
  else if ($action == "deny"){
    $stmt = $db->prepare("DELETE FROM Forum WHERE ForumId=?");
    $stmt->bind_param("s", $forum);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header("Location: admin.php");
    }
    else {
      echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
    }
  }
  else if (($action == "closed") || ($action == "open")){
    $stmt = $db->prepare("UPDATE Forum SET Status=? WHERE ForumId=?");
    $stmt->bind_param("ss", $action, $forum);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header("Location: forum.php");
    }
    else {
      echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
    }
  }
  else if ($action == "delete") {
    $stmt = $db->prepare("DELETE FROM Forum WHERE ForumId=?");
    $stmt->bind_param("s", $forum);
    if ($stmt->execute()){
      $stmt->close();
      $db->close();
      header("Location: forum.php");
    }
    else {
      echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";
    }
  }
  else {
    echo "Something went wrong. Unable to change user <p><button><a href='/admin.php'>Back to admin settings</a></button>)";

  }

  ?>
