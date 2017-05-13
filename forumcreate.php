<?php

$host="localhost"; // Host name
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
mysql_close();
?>
