<?php
//This will be where the admin approves /denies forums
session_start();
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

 ?>
