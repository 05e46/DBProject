<?php session_start();
$db = new mysqli('127.0.0.1','phpAdmin','password','practice'); #(ip address, username, password, database)
if(!$db){
  echo "Error connecting to database.";
  exit;
}
//mysql_select_db(dbpro,$con);

$user = $_SESSION['user'];

if(isset($_REQUEST['submit'])!='')
{
    If($_REQUEST['forumName']=='' || $_REQUEST['description']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        if ($_SESSION['status'] != "admin") {
          $stmt = $db->prepare("INSERT INTO FORUM (ForumName, Description, StartModerator) VALUES (?, ?, ?)");
          $stmt->bind_param("sss", $_REQUEST['forumName'], $_REQUEST['description'], $_SESSION['user']);
          if($stmt->execute())
          {
              $stmt->close();
              $db->close();
              echo '<h1>Forum submitted for approval</h1>';
              echo '<button><a href="forum.php">Back to Forums</a></button>';
          }
          else
          {
            echo "Something went wrong, can not add the forum";
          }
        }
        else {
          $status = "open";
          $stmt = $db->prepare("INSERT INTO FORUM (ForumName, Description, StartModerator, Status) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $_REQUEST['forumName'], $_REQUEST['description'], $_SESSION['user'], $status);
          if($stmt->execute()) {
            $stmt->close();
            $db->close();
            echo '<h1>Forum sucessfully created</h1>';
            echo '<button><a href="forum.php">Back to Forums</a></button>';
          }
        }
    }
}


/*$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="dbproject"; // Database name
$tbl_name="forum"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// get data that sent from form
$forumName=$_POST['forumName'];
$Description=$_POST['Description'];
$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(forumName, description, datetime)VALUES('$forumName', '$description', '$datetime')";
$result=mysql_query($sql);

if($result){
echo "Successful<BR>";
echo "<a href=forum.php>View your forum</a>";
}
else {
echo "ERROR";
}
mysql_close();*/
?>
