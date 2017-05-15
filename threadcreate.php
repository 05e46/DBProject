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
    If($_REQUEST['title']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        $sql="INSERT INTO thread(title,StartUser) VALUES('".$_REQUEST['title']."', '$user')";
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
