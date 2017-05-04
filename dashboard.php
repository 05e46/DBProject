<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  $db = new mysqli('127.0.0.1','phpAdmin','password','practice'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }
?>
<head>
    <title>Home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- top bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="home.php">DBProject</a> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
<<<<<<< HEAD
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="thread.php">Threads</a></li>
                    <li><a href="chatroom.php">Chatrooms</a></li>
=======
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Chatrooms</a></li>
>>>>>>> 82dea91269346c2be01adabac3d17fa5618b1cfd

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
                    <li><a href="register.php">Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Mailbox-->
    <div class="flex-container" id="mailbox">
      <div class="col-sm-8" id="title">
          <?php
          $stmt = $db->prepare("SELECT Subject, Status, Sender, Receiver FROM Mailbox WHERE Receiver = ?");
          $stmt->bind_param("s", $_SESSION['user']);
          $stmt->execute();
          $stmt->bind_result($subject, $status, $sender, $receiver);

          while ($stmt->fetch() == TRUE) {
                  echo '<div class="row">
                  <button type="button" class="btn">
                  <div>Subject: ></div><div id="subject">' + $subject + '</div>
                  <div>From: </div><div id="sender">' + $sender + '</div>
                  </button></div>';
          }
          $stmt->close();
          ?>
      </div>
      <div class="col-sm-4" id="message">
      </div>
    </div>
    <!-- end of posts -->
</body>
</html>
