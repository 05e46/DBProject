<?php session_start();
<<<<<<< Updated upstream
=======
$con = mysqli_connect('localhost', 'root', '', 'dbproject');
if(! $con)
{
die('Connection Failed'.mysql_error());
}

$user = $_SESSION['user'];
>>>>>>> Stashed changes

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
      if ($_SESSION['status'] == "admin") {

        $status = "open";
        $query = "INSERT INTO Forum (forumName, description, StartModerator, Status) VALUES (?,?,?,?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssss", $_REQUEST['forumName'], $_REQUEST['description'], $_REQUEST['user'], $status);
        if ($stmt->execute()){
          $stmt->close();
          $db->close();
          header("Location: forum.php");
        }
        else {
          echo "Something went wrong, can not add the forum ADMIN";
        }
      }


      //Instantly creates a forum that must be approved by an admin before being viewed
      else if ($_SESSION['status'] == "moderator"){
        $stmt = $db->prepare("INSERT INTO FORUM (ForumName, Description, StartModerator) VALUES (?,?,?)");
        $stmt->bind_param("sss", $_REQUEST['forumName'], $_REQUEST['description'], $_REQUEST['user']);
        if ($stmt->execute()){
          $stmt->close();
          $db->close();
          echo "Forum awaiting approval from admin.<p>";
          echo "<button><a href='/forum.php'>Back to Forums</a></button>";
        }
        else {
          echo "Something went wrong, can not add the forum MODERATOR";
        }
      }


      //Something went wrong
      else {
        echo "Something went wrong. Unable to create forum<p><button><a href='/forum.php'>Back</a></button>)";

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
