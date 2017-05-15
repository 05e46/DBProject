<?php
session_start();
include('header.php');  

$con = mysqli_connect('localhost', 'root', '', 'dbproject');
if(! $con)
{
die('Connection Failed'.mysql_error());
}
$user = $_SESSION['user'];

if(isset($_REQUEST['submit'])!='')
{
    If($_REQUEST['postText']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        $sql="INSERT INTO post(postText,uploadDate,postUser) VALUES('".$_REQUEST['postText']."', NOW() , '$user')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            header("Location: userPosts.php");
            $sql->close();
            $con->close();
        }
        else
        {
          echo "Something went wrong, can not add the forum";
        }
    }
}





/*$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
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
  }*/
?>
