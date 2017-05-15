<?php session_start();

//$db = new mysqli('ecsmysql','cs431s25','ixupeijo','cs431s25');
$db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
//$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
if(!$db){
  echo "Error connecting to database.";
  exit;
}
//Make sure a form has been submitted
if(isset($_REQUEST['submit'])!='')
{
    //Make sure both of the fields are not empty
    if($_REQUEST['forumName']=='' || $_REQUEST['description']=='')
    {
        Echo "Please fill the empty field.";
    }
    else
    {
      //Instantly creates a forum that can be viewed if the user is an admin
      if ($_REQUEST['user'] == "admin") {
        $status = "open";
        $stmt = $db->prepare("INSERT INTO FORUM (forumName, description, StartModerator) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $_REQUEST['forumName'], $_REQUEST['description'], $_REQUEST['user'], $status);
        if ($stmt->execute()){
          $stmt->close();
          $db->close();
          header("Location: forum.php");
        }
        else {
          echo "Something went wrong, can not add the forum";
        }
      }


      //Instantly creates a forum that must be approved by an admin before being viewed
      if ($_REQUEST['user'] == "moderator"){
        $status = "request";
        $stmt = $db->prepare("INSERT INTO FORUM (forumName, description, StartModerator) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $_REQUEST['forumName'], $_REQUEST['description'], $_REQUEST['user'], $status);
        if ($stmt->execute()){
          $stmt->close();
          $db->close();
          header("Location: forum.php");
          alert("Forum awaiting approval from admin");
        }
        else {
          echo "Something went wrong, can not add the forum";
        }
      }

      
      //Something went wrong
      else {
        header("Location: forum.php");
        alert("Something has gone wrong. Unable to create forum");

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
