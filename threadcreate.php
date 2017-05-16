<?php session_start();
$db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
//$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
if(!$db){
  echo "Error connecting to database.";
  exit;
}
$threadID = $_SESSION['threadID'];
$user = $_SESSION['user'];

if(isset($_REQUEST['submit'])!='')
{
    if($_REQUEST['title']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        $query="INSERT INTO Thread (forumNo, threadID, title, startUser) VALUES(?,?,?,?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssss", $_REQUEST['forumId'], $threadID, $_REQUEST['title'], $user);
        if ($stmt->execute()){
          $stmt->close();
          $db->close();
          header('Location: thread.php?id='.$_REQUEST['forumId'].'');
        }
        else
        {
          echo "Something went wrong, can not add the thread";
        }
    }
}
?>
