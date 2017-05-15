<?php session_start();
$con = mysqli_connect('localhost', 'root', '', 'dbproject');
if(! $con)
{
die('Connection Failed'.mysql_error());
}

$user = $_SESSION['user'];

if(isset($_REQUEST['submit'])!='')
{
    If($_REQUEST['title']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        $sql="INSERT INTO thread(title,status,StartUser,ranking) VALUES('".$_REQUEST['title']."' ,'open', '$user', '0')";
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
