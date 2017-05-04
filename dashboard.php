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

<?php
include('header.php'); 
?>

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
