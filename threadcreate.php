<?php session_start();
$con = mysqli_connect('localhost', 'root', '', 'dbproject');
$id = $_SESSION['id'];
if(! $con)
{
die('Connection Failed'.mysql_error());
}
$threadID = $_SESSION['threadID'];
//$rank = $_SESSION['ranking'];
$user = $_SESSION['user'];

if(isset($_REQUEST['submit'])!='')
{
    If($_REQUEST['title']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        $sql="INSERT INTO thread(forumNo, threadID, Title, StartUser)
         VALUES('$id','$threadID','".$_REQUEST['title']."', '$user')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            header("Location: thread.php");
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
