<?php session_start();
$con = mysqli_connect('localhost', 'root', '', 'dbproject');
if(! $con)
{
die('Connection Failed'.mysql_error());
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
        $sql="INSERT INTO forum(forumName,description,StartModerator) VALUES('".$_REQUEST['forumName']."', '".$_REQUEST['description']."', '$user')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            header("Location: forum.php");
            $sql->close();
            $con->close();
        }
        else
        {
          echo "Something went wrong, can not add the forum";
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
