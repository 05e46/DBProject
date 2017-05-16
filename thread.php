<?php
session_start();
include('header.php');
$status = $_SESSION['status'];
$user = $_SESSION['user'];
?>

<body>
  <div class="flex-container">
      <div class="pull-left">
        <button><a id="backToForum" href="/forum.php">Back to Forums</a></button>
        <h1>Forum Threads</h1>
      </div>
      <div>
      <?php
      if ($_SESSION['status'] == 'moderator' || $_SESSION['status'] == 'admin') {
        //show the request forum button on bottom of page
          echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#createthread" style="float: right">Add New Thread</button>';
      }
      ?>
    </div>
  <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Thread Title</th>
          <th>Rank</th>
          <th>Status</th>
          <th>Moderator</th>
          <?php
            if (($_SESSION['status'] == "admin") || ($_SESSION['status'] == "moderator")){
              echo '<th>Options</th>';
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
          $id = $_REQUEST['id'];
          //get the threadId, title, startuser and ranking from thread where the forumno is connect to number forum
          $stmt = $db->prepare("SELECT threadID, Title, StartUser, ranking, Status FROM Thread WHERE forumNo = ?");
          $stmt->bind_param("s", $id);
          $stmt->execute();
          $stmt->bind_result($threadID, $threadName, $starter, $rank, $status);

          while ($stmt->fetch() == TRUE) {
            echo '
            <tr>
            <td><a href="userPosts.php?id='.$threadID.'&forum='.$id.'"><strong>'.$threadName.'</strong></a></td>';
              if ($rank == 1) {
                  echo '<td><span class="glyphicon-class yellow"></span></td>';
                }
              else if ($rank == 2){
                  echo '<td>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '</td>';
                }
              else if ($rank == 3) {
                  echo '<td>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '</td>';
                }
              else if ($rank == 4) {
                  echo '<td>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '</td>';
                }
              else if ($rank == 5) {
                  echo '<td>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '<span class="glyphicon glyphicon-star yellow"></span>';
                  echo '</td>';
                }
              else {echo'<td>Not yet ranked</td>';}
              echo '
              <td>'.$status.'</td>
              <td>'.$starter.'</td>';
              if (($_SESSION['status'] == "admin") || ($_SESSION['status'] == "moderator")){
                echo '<td>';
                if ($status == "open"){
                  echo '<button><a href="threadRequests.php?id='.$threadID.'&action=closed&forum='.$_REQUEST['id'].'">Close Thread</a></button>';
                }
                else if ($status == "closed"){
                  echo '<button><a href="threadRequests.php?id='.$threadID.'&action=open&forum='.$_REQUEST['id'].'">Open Thread</a></button>';
                }
                echo '<button><a href="threadRequests.php?id='.$threadID.'&action=delete&forum='.$_REQUEST['id'].'">Delete Thread</a></button>';
                echo '</td>';
              }
              echo '</tr>';
          }
          $stmt->close();
          $db->close();
        ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="container">
    <div class="modal fade" id="createthread" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form class="modal-content" action="threadcreate.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title">New Thread</h4>
                </div>
                <div class="modal-body">
                  <input type="text" name="title" class="form-control" placeholder="Thread Name" required>
                    <br />
                  <label>Forum No:</label>
                  <input type="text" name="forumId" value="<?php echo $_REQUEST['id'] ?>" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">New Thread</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</body>
