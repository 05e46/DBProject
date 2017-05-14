<?php
session_start();
include('header.php');
?>

<body>
    <div class="flex-container">
        <h1>Forums Page</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <!-- titles at the top of the table -->
                    <th>Forum Name</th>
                    <th>Description</th>
                    <th>Moderator</th>
                </tr>
            </thead>
            <tbody>

              <?php
              // get ForumId, ForumName, Description, StartModerator from Forum table
              $stmt = $db->prepare("SELECT ForumId, ForumName, Description, StartModerator FROM Forum");
              $stmt->execute();
              $stmt->bind_result($id, $forumName, $description, $starter);
              while ($stmt->fetch() == TRUE) {
                echo '
                <tr>
                <td><a href="thread.php?id='.$id.'"><strong>'.$forumName.'</strong></a></td>
                <td>'.$description.'</td>
                <td>'.$starter.'</td>
                </tr>
                ';
              }
              $stmt->close();
              $db->close();
              ?>

        <!-- Buttons for the Modal -->
        <!-- Button for Admin -->
        <div class="container">

          <?php
          /*if $_SESSION['user'] == 'admin'{*/
            //show the create forum button on bottom of page
            echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#newForum" style="float: right">Create Forum</button>';
          //}
          ?>
            <!-- Modal -->
            <div class="modal fade" id="newForum" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form class="modal-content" action="forumcreate.php" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">New Forum</h4>
                        </div>
                        <div class="modal-body">
                          <input type="text" name="forumName" class="form-control" placeholder="Forum Name" required>
                            <br />
                            <input type="text" name="description" class="form-control" placeholder="Forum description" required>
                            <br />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="newforum_btn" class="btn btn-primary">New Forum</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            /*if $_SESSION['user'] == 'moderator'{
              //show the request forum button on bottom of page*/
                echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#requestForum" style="float: right">Request Forum</button>';
            //}
            ?>

            <!-- Modal -->
            <div class="modal fade" id="requestForum" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <form class="modal-content" action="forumRequests.php" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Request Forum</h4>
                        </div>
                        <div class="modal-body">
                          <input type="text" name="forumName" class="form-control" placeholder="Forum Name" required>
                            <br />
                            <input type="text" name="description" class="form-control" placeholder="Forum description" required>
                            <br />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="request_btn" class="btn btn-primary">Submit request</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </tbody>
      </table>
</body>
