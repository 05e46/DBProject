<?php
/*Data from user is sent to this file for processing*/
//Set Variables for user input
    
$FullName=$_POST['fullname'];
$username=$_POST['newusername'];
$password=$_POST['newpssw'];


$link=mysql_connect('ecsmysql','cs431s25','ixupeijo');
//Test Connection
if(!link){
    die('Failed to connect to Database'.mysql_err());
}
else{
    echo'<p>Connected to Database</p>';
}

mysql_select_db("cs431s25",$link);
$sql="INSERT INTO USERS (fullname, username,passWd)
  VALUE('$FullName','$username','$password')";
$result=mysql_query($sql,$link);
if($result){
    echo'<p>Record added successfully</p>';
    echo'<p>You will be directed to the login page!</p>';
    include "login.php;
}
else{
    echo'Error: Record not added' .mysql_error($link);
}

mysql_close($link);
?>