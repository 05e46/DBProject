<?php
session_start();
include('header.php');
?>

<body>
    <div class="flex-container">
        <h1>Forums Page</h1>
        <div class="container">
          <?php
          if (($_SESSION['status'] == 'admin') or ($_SESSION['status'] == 'moderator')){
            echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#newForum" style="float: right">Create Forum</button>';
          }
          ?>
          <!-- Modal -->
          <div class="modal fade" id="newForum" role="dialog">
              <div class="modal-dialog">

                  <!-- Modal content-->
                  <form class="modal-content" action="forumcreate.php" method="POST">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"></button>
                          <h4 class="modal-title">New Forum</h4>
                      </div>
                      <div class="modal-body">
                          <input type="text" name="forumName" class="form-control" placeholder="Forum Name" required>
                          <br />
                          <input type="text" name="description" class="form-control" placeholder="Forum description" required>
                          <br />
                          <input type="text" name="user" class="form-control" value="<?php echo $_SESSION['user'] ?>" readonly>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Create Forum</button>
                      </div>
                  </form>
              </div>
          </div>
        </div>
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
              $stmt = $db->prepare("SELECT ForumId, ForumName, Description, StartModerator FROM Forum WHERE Status = 'open'");
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
        </tbody>
      </table>
</body>
