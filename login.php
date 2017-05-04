<!DOCTYPE html>

<html>

<head>
    <title>Log here!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    
<?php
  if (!isset($_POST)){
    echo "<p>No data was sent.<br>Please try again.</p>";
    exit;
  }
  $username = $_POST['username'];
  $password = $_POST['password'];

/*credentials for cs431s25 server
'ecsmysql','cs431s25','ixupeijo'
*/
  //$db = new mysqli('ecsmysql','cs431s25','ixupeijo','[project_databse]');
  $db = new mysqli('127.0.0.1','phpAdmin','password','practice'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }
  $stmt = $db->prepare("SELECT Username, Password FROM Users WHERE Username = ? AND Password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows == 0) {
    $stmt->close();
    $db->close();
    echo "<p>There are no users matching this username and password.<br>Please try again</p>";
    echo "<form action='index.html'><input type='submit' value='Go Back'>";
    exit;
  }
  else {
    $stmt->close();
    $db->close();
    session_start();
    $_SESSION['user'] = $username;
    $_SESSION['login'] = $password;
    header("Location: dashboard.php");
  }
?>

    <!-- top bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="dashboard.php">DBProject</a> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Threads</a></li>
                    <li><a href="#">Chatrooms</a></li>

                    <!-- <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tags<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">#yes</a></li>
                            <li><a href="#">#No</a></li>
                            <li><a href="#">#what</a></li>
                            <li><a href="#">more...</a></li>
                        </ul> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search"> </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                    <li><a href="login.php">Sign in</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="flex-container">
        <div id="wrapper">
            <div id="login">
                <form action="loginConfirm.php" , method="POST">
                    <h3>Already have an account?</h3>
                    <br>
                    <label for="Username" class="sr-only">Username</label>
                    <input type="text" name="Username" class="form-control" placeholder="User Name" required>
                    <br>
                    <br>
                    <label for="Password" class="sr-only">Password</label>
                    <input type="password" name="passWord" class="form-control" placeholder="Password" required>
                    <br>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>

            <div id="register">
                <form action="dashboard.php" method="POST">
                    <h3>Don't have an account? Sign up!</h3>
                    <br>
                    <label for="fullname" class="sr-only">New User</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                    <br>
                    <br>
                    <label for="newusername" class="sr-only">New Username</label>
                    <input type="text" name="newusername" class="form-control" placeholder="Username" required>
                    <br>
                    <br>
                    <label for="newpssw" class="sr-only">New Password</label>
                    <input type="password" name="newpssw" class="form-control" placeholder="Password" required>
                    <br>
                    <br>
                    <label for="chkpssw" class="sr-only">Check Password</label>
                    <input type="password" name="newpssw" class="form-control" placeholder="Re-enter Password" required>
                    <br>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>