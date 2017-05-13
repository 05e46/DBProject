<?php session_start();

/*
<?php
/*Data from user is sent to this file for processing*/
//Set Variables for user input
/*$fullName=$_POST['fullname'];
$username=$_POST['newusername'];
$password=$_POST['newpssw'];

//Connect to database
$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
if(!$db){
  echo "Error connecting to database.";
  exit;
}

//Check if username already exists
$stmt = $db->prepare("SELECT Username FROM Users WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

//If username already exists
if ($stmt->num_rows == 0) {
  echo "<p>Username already exists</p>";
  echo "<form action='login_register.html'><input type='submit' value='Go Back'>";
}
//Username does NOT already exists and can be created in the database
else {
  $stmt->close();
  $stmt = $db->prepare("INSERT INTO Users (Username, Password, FullName) VALUES (?,?,?)");
  $stmt->bind_param("sss", $username, $password, $fullName);
  if ($stmt->execute()) {
    $stmt->close();
    $db->close();
    session_start();
    $_SESSION['user'] = $username;
    $_SESSION['login'] = $password;
    header("Location: dashboard.html");
  }
  else {
    echo "<h1>Error creating username</h1>";
    echo "<form action='login_register.html'><input type='submit' value='Try Again'>";
  }
}
?>*/

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbdatabase = "dbproject";


$db = mysql_connect($dbhost, $dbuser, $dbpassword);

//check to see if the submit button has been pressed
mysql_select_db($dbdatabase, $db);
if($_POST['submit']){
  if($_POST['password1'] == $_POST['password2']){
    $checksql = "SELECT * FROM users WHERE username = '".$_POST['username']."';";
    $checkresult = mysql_query($checksql);
    $checknumrows = mysql_num_rows($checkresult);
    if($checknumrows == 1){
      header("Location: login_register.html")
      echo "username already exits or passwords do not match";
    }
  }
}


?>
