<?php //session_start();

/*Data from user is sent to this file for processing*/
//Set Variables for user input
/*$username=$_POST['username'];
$fullName=$_POST['fullname'];
$password=$_POST['password'];*/

//Connect to database
/*$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
if(!$db){
  echo "Error connecting to database.";
  exit;
}*/


$con = mysqli_connect('localhost', 'root', '', 'dbproject');
if(! $con)
{
die('Connection Failed'.mysql_error());
}
//mysql_select_db(dbpro,$con);

if(isset($_REQUEST['submit'])!='')
{
    If($_REQUEST['fullname']=='' || $_REQUEST['username']=='' || $_REQUEST['password']=='')
    {
        Echo "please fill the empty field.";
    }
    else
    {
        $sql="INSERT INTO user(username,fullname,password) VALUES('".$_REQUEST['username']."', '".$_REQUEST['fullname']."', '".$_REQUEST['password']."')";
        $res=mysqli_query($con,$sql);
        $username = $_REQUEST['username'];
        if($res)
        {
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['login'] = $password;
            $_SESSION['status'] = $status;
            header("Location: dashboard.php");
            $sql->close();
            $con->close();
        }
        else
        {
          echo "Username is already taken";
        }
    }
}



//Check if username already exists
/*$stmt = $db->prepare("SELECT Username FROM Users WHERE Username = ?");
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
  $stmt = $db->prepare("INSERT INTO Users (username, fullname, password) VALUES ('".$username."',
                                '".$fullname."',
                                '".$password."')");
  //$stmt->bind_param("sss", $fullname, $username, $password);
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
}*/





/*session_start();
$_SESSION['message'] = '';
$msqli = new mysqli('localhost', 'root', '', 'dbproject');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//two passwords are equal to each other
	if($_POST['password'] == $_POST['confirmpassword']){
		$username = $mysqli->mysql_real_escape_string($_POST['username']);
		$password = md5($_POST['password']); //md5 for password security

		$sql = "INSERT INTO users(username, password"
			. VALUES('username', 'password');

		if($mysqli->query($sql) === true){
			$_SESSION['message'] = 'Registration successful';
			header("location: dashboard.php");
		}
		else {
			$_SESSION['message'] = 'Usern could not be added to the database';
		}
	}
}*/





?>
