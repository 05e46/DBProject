<?php
  if (!isset($_POST)){
    echo "<p>No data was sent.<br>Please try again.</p>";
    exit;
  }

  $username = $_POST['Username'];
  $password = $_POST['passWord'];

/*credentials for cs431s25 server
'ecsmysql','cs431s25','ixupeijo'
*/
  //$db = new mysqli('ecsmysql','cs431s25','ixupeijo','cs431s25');
  $db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
  //$db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }
  $stmt = $db->prepare("SELECT Username, Password, Status FROM User WHERE Username = ? AND Password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $stmt->bind_result($u, $p, $status);
  if ($stmt->fetch() == FALSE) {
    $stmt->close();
    $db->close();
    echo "<p>There are no users matching this username and password.<br>Please try again</p>";
    echo "<form action='login_register.html'><input type='submit' value='Go Back'>";
    exit;
  }
  else {
    session_start();
    $_SESSION['user'] = $username;
    $_SESSION['login'] = $password;
    $_SESSION['status'] = $status;
    $stmt->close();
    $db->close();
    header("Location: dashboard.php");
  }
?>
