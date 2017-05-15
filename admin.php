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
                $stmt = $db->prepare("SELECT Username, FullName, Status FROM User WHERE NOT Username=?");
                $stmt->bind_param("s", $_SESSION['user']);
                $stmt->execute();
                $stmt->bind_result($user, $name, $status);
                while ($stmt->fetch() == TRUE) {
                  echo '
                  <tr>
                  <td>'.$user.'</td>
                  <td>'.$name.'</td>
                  <td>'.$status.'</td>
                  <td>
                    <button><a href="account.php?account='.$user.'&action=delete" class="glyphicon glyphicon-trash"> Delete</a></button>';
                    //Differing buttons appear based on user status
                    if ($status == "user") {
                      echo '
                      <button><a href="account.php?account='.$user.'&action=moderator" class="glyphicon glyphicon-knight"> Make Moderator</a></button>
                      <button><a href="account.php?account='.$user.'&action=admin" class="glyphicon glyphicon-king"> Make Admin</a></button>
                      ';
                    }
                    else if ($status == "moderator"){
                      echo '
                      <button><a href="account.php?account='.$user.'&action=user" class="glyphicon glyphicon-pawn"> Make User</a></button>
                      <button><a href="account.php?account='.$user.'&action=admin" class="glyphicon glyphicon-king"> Make Admin</a></button>
                      ';
                    }
                    else {
                      echo '
                      <button><a href="account.php?account='.$user.'&action=user" class="glyphicon glyphicon-pawn"> Make User</a></button>
                      <button><a href="account.php?account='.$user.'&action=moderator" class="glyphicon glyphicon-knight"> Make Moderator</a></button>
                      ';
                    }
                    echo '</td></tr>';
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
                  <th>Approve/Deny</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $stmt = $db->prepare("SELECT ForumId, ForumName, Description, StartModerator FROM Forum WHERE Status = 'request'");
                $stmt->execute();
                $stmt->bind_result($id, $forumName, $description, $startMod);
                while ($stmt->fetch() == TRUE) {
                  echo '
                  <tr>
                  <td>'.$forumName.'</td>
                  <td>'.$description.'</td>
                  <td>'.$startMod.'</td>
                  <td>
                    <button><a href="manageRequests.php?id='.$id.'&action=approve" class="glyphicon glyphicon-check"> Approve</a></button>
                    <button><a href="manageRequests.php?id='.$id.'&action=deny" class="glyphicon glyphicon-trash"> Deny</a></button>
                  </td>
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
