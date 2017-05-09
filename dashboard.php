<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
  $db = new mysqli('127.0.0.1','phpAdmin','password','practice'); #(ip address, username, password, database)
  if(!$db){
    echo "Error connecting to database.";
    exit;
  }
?>
<head>
  <title>Home page</title>
  <?php include('header.php');?>
</head>
<body>
    <!--Mailbox-->
  <div class="flex-container" id="mailbox">
    <div class="row">
      <!-- All messges will appear here (without text) -->
      <div class="col-sm-6" id="messages" style="border-style:solid;border-width:thin;">
        <h3>Mailbox</h3>
        <div id="unread">
          <div style="text-align:left;border-bottom-style:solid;border-width:1px;100%;"><h4>Unread</h4></div>
          <?php
            $status = "unread";
            $stmt = $db->prepare("SELECT Subject, Sender, Receiver, msgDate, msgText FROM Mailbox WHERE Receiver = ? AND Status = ?");
            $stmt->bind_param("ss", $_SESSION['user'], $status);
            $stmt->execute();
            $stmt->bind_result($subject, $sender, $receiver, $date, $text);
            while ($stmt->fetch() == TRUE) {
              echo '<p><div style="border-width:thin;border-style:solid;">
              <div id="messageInfo" style="background-color:lightgrey;width:100%;">
              <span class="pull-left"><span><strong>Subject:  </strong>',$subject,'</span></span>
              <span><strong>From: </strong>',$sender,'</span>
              </div>
              <div id="messageText" style="text-align:left;">
              <span><strong>Message: </strong>',$text,'</span>
              <span><strong>Date: </strong>',$date,'</span>
              </div>
              </div>';
            }
            $stmt->close();
          ?>
        </div>
        <div id="read">
          <div style="text-align:left;border-bottom-style:solid;border-width:1px;100%;"><h4>Read</h4></div>
          <?php
            $status = "read";
            $stmt = $db->prepare("SELECT Subject, Sender, Receiver, msgDate, msgText FROM Mailbox WHERE Receiver = ? AND Status = ?");
            $stmt->bind_param("ss", $_SESSION['user'], $status);
            $stmt->execute();
            $stmt->bind_result($subject, $sender, $receiver, $date, $text);
            while ($stmt->fetch() == TRUE) {
              echo '<p><div style="border-width:thin;border-style:solid;">
              <div id="messageInfo" style="background-color:lightgrey;width:100%;">
              <span class="pull-left"><span><strong>Subject:  </strong>',$subject,'</span></span>
              <span><strong>From: </strong>',$sender,'</span>
              </div>
              <div id="messageText" style="text-align:left;">
              <span><strong>Message: </strong>',$text,'</span>
              <span><strong>Date: </strong>',$date,'</span>
              </div>
              </div>';
            }
            $stmt->close();
            $stmt = $db->prepare('UPDATE Mailbox SET Status="read" WHERE Status="unread"');
            $stmt->execute();
            $stmt->close();
          ?>
        </div>
      </div>
    <div class="col-sm-6" id="forumContributions" style="border-style:solid;border-width:thin;">
      <h3>Forum's you have created</h3>
      <?php
        $stmt = $db->prepare("SELECT ForumName, ForumId FROM Forum WHERE StartModerator = ?");
        $stmt->bind_param("s", $_SESSION['user']);
        $stmt->execute();
        $stmt->bind_result($forumName, $id);
        while ($stmt->fetch() == TRUE) {
          echo '<div style="background-color:lightgrey;>',$forumName,'</div>';
        }
        $stmt->close();
      ?>
    </div>
  </div>
    <!-- end of posts -->
</body>
</html>
