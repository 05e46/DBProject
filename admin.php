<?php
session_start();
include('header.php');
?>
<html>
  <head>
      <title>Admin Settings</title>
  </head>
  <body>
    <div class="flex-container">
      <h1>Admin Settings</h1>
      <div class="row">
        <div class="col-sm-12" id="accounts">
          <h3>Accounts</h3>
          <table class="table table-striped table-bordered table-hover" style="border: 2px solid black;">
            <!-- Table column names -->
            <thead>
              <tr>
                <th>Account</th>
                <th>Full Name</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
            </thead>
            <!-- Table data -->
            <tbody>
              <?php
                $stmt = $db->prepare("SELECT Username, FullName, Status FROM User");
                $stmt->execute();
                $stmt->bind_result($user, $name, $status);
                while ($stmt->fetch() == TRUE) {
                  echo '
                  <tr>
                  <td>'.$user.'</td>
                  <td>'.$name.'</td>
                  <td>'.$status.'</td>
                  <td>
                    <button><span href="remove.php?account="'.$user.'" class="glyphicon glyphicon-trash"></span></button>
                  </td>
                  </tr>
                  ';
                }
                $stmt->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12" id="requests">
          <div id="forumRequests" style="overflow:scroll; height:300px;border-style:solid;border-width:thin;border-color:lightgrey;">
            <h3>Forum Requests</h3>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Forum Name</th>
                  <th>Description</th>
                  <th>Requesting Moderator</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $stmt = $db->prepare("SELECT ForumName, Description, StartModerator FROM Forum WHERE Status = 'request'");
                $stmt->execute();
                $stmt->bind_result($forumName, $description, $startMod);
                while ($stmt->fetch() == TRUE) {
                  echo '
                  <tr>
                  <td>'.$forumName.'</td>
                  <td>'.$description.'</td>
                  <td>'.$starter.'</td>
                  <td></td>
                  </tr>
                  ';
                }
              ?>
            </tbody>
          </table>
          </div>
      </div>
    </div>
    </div>
  </body>
