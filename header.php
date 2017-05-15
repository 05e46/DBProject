<?php
  //$db = new mysqli('127.0.0.1', 'phpAdmin', 'password', 'practice');
  $db = new mysqli('127.0.0.1','root','','dbproject'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }

  $status = $_SESSION['status'];
  $user = $_SESSION['user'];
?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="login_register.html">DBProject</a> </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <?php
                          if (basename($_SERVER['PHP_SELF']) != "dashboard.php") {
                            echo '<li><a id= "dashboardButton" href="/dashboard.php">Dashboard</a></li>';
                          }
                          if (basename($_SERVER['PHP_SELF']) != "forum.php") {
                            echo '<li><a id="forumButton" href="/forum.php">Forums</a></li>';
                          }
                          if (basename($_SERVER['PHP_SELF']) != "chatroom.php") {
                            echo '<li><a id="chatroomButton" href="/chatroom.php">Chatrooms</a></li>';
                          }
                          if ($_SESSION['status'] == "admin") {
                            echo '<li><a id="adminSettings" href="/admin.php">Admin Settings</a></li>';
                          }
                    ?>
                            <!-- <li><a id="chatButton" href="#">Chatrooms</a></li> -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search"> </div>
                            <button type="submit" class="btn btn-default">Search</button>
                            <?php
                          if ($_SESSION["user"]){
                            echo '<a href="logout.php">Logout</a>';
                          }
                        ?>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </head>
