<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home page</title>
  <?php include('header.php');?>
</head>

<!--

CURRENTLY WORKING ON GETTING THE DELETE BUTTON TO WORK -RM

-->
<body>
  <div class="flex-container" id="mailbox">
    <?php
      echo '<h2 style="text-align:center;">'.$_SESSION['user'].'\'s dashboard</h2>';
    ?>
    <!--This row holds the columns-->
    <div class="row">
      <!--Mailbox-->
      <div class="col-sm-6" id="messages" style="overflow:scroll;border-style:solid;border-width:thin;">
        <h3>Mailbox</h3>
        <!--Unread Mail-->
        <div id="unread">
          <div style="text-align:left;border-bottom-style:solid;border-width:1px;100%;"><h4>Unread</h4></div>
          <?php
            $status = "unread";
            $stmt = $db->prepare("SELECT Subject, Sender, Receiver, msgDate, msgText, msgId FROM Mailbox WHERE Receiver = ? AND Status = ?");
            $stmt->bind_param("ss", $_SESSION['user'], $status);
            $stmt->execute();
            $stmt->bind_result($subject, $sender, $receiver, $date, $text, $id);
            while ($stmt->fetch() == TRUE) {
              echo '<p><div style="border-width:thin;border-style:solid;">
              <div id="messageInfo" style="background-color:lightgrey;width:100%;">
              <span class="pull-left"><span><strong>Subject:  </strong>'.$subject.'</span></span>
              <span><strong>From: </strong>'.$sender.'</span>
              </div>
              <div id="messageText" style="text-align:left;">
              <span><strong>Message: </strong>'.$text.'</span>
              <span><strong>Date: </strong>'.$date.'</span>
              <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span>  Delete</button>
              </div>
              </div>';
            }
            $stmt->close();
          ?>
        </div>
        <!--Read Mail-->
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
              <span class="pull-left"><span><strong>Subject:  </strong>'.$subject.'</span></span>
              <span><strong>From: </strong>'.$sender.'</span>
              </div>
              <div id="messageText" style="text-align:left;">
              <span><strong>Message: </strong>'.$text.'</span>
              <span><strong>Date: </strong>'.$date.'</span>
              <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span>  Delete</button>
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
      <!--Forums and Threads the User has created-->
      <div class="col-sm-6" id="forumContributions" style="border-style:solid;border-width:thin;">
        <div id="dashboardForums" style="overflow:scroll; height:300px;border-style:solid;border-width:thin;border-color:lightgrey;">
          <h3>Forums you have created</h3>
          <?php
            $stmt = $db->prepare("SELECT ForumName, ForumId FROM Forum WHERE StartModerator = ?");
            $stmt->bind_param("s", $_SESSION['user']);
            $stmt->execute();
            $stmt->bind_result($forumName, $id);
            while ($stmt->fetch() == TRUE) {
              echo '<div style="background-color:lightgrey;">'.$forumName.'</div>';
            }
            $stmt->close();
          ?>
        </div>
        <p>
        <div id="dashboardThreads" style="overflow:scroll; height:300px;border-style:solid;border-width:thin;border-color:lightgrey;">
          <h3>Threads you have created</h3>
          <?php
            $status = 'open';
            $stmt = $db->prepare("SELECT Title, ForumNo FROM Thread WHERE StartUser = ? AND Status = ?");
            $stmt->bind_param("ss", $_SESSION['user'], $status);
            $stmt->execute();
            $stmt->bind_result($title, $id);
            while ($stmt->fetch() == TRUE) {
              echo '<div style="background-color:lightgrey;">'.$title.'</div>';
            }
            $stmt->close();
            $db->close();
          ?>
        </div>
      </div>
  </div>
</body>
</html>
