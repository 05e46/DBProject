<?php
session_start();
include('header.php');
$status = $_SESSION['status'];
$user = $_SESSION['user'];
?>

<body>
  <div class="flex-container">
    <div class="pull-left">
      <a id="backToForum" href="/forum.php">Back to Forums</a>
    <h1>Threads</h1>
  </div>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Thread Title</th>
          <th>Rank</th>
          <th>Moderator</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $id = $_REQUEST['id'];
          //get the threadId, title, startuser and ranking from thread where the forumno is connect to number forum
          $stmt = $db->prepare("SELECT threadID, Title, StartUser, ranking FROM Thread WHERE forumNo = ?");
          $stmt->bind_param("s", $id);
          $stmt->execute();
          $stmt->bind_result($threadID, $threadName, $starter, $rank);

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
            <td>'.$starter.'</td>
            </tr>
            ';
          }
          $stmt->close();
        ?>

        <div class="container">

        <?php
        if ($_SESSION['status'] == 'moderator' || $_SESSION['status'] == 'admin') {
          //show the request forum button on bottom of page
            echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#createthread" style="float: right">Add New Thread</button>';
        }
        $_SESSION['threadID'] = $threadID;
        $_SESSION['id'] = $id;

        //$_SESSION['ranking'] = $rank;
        ?>

        <!-- Modal -->
        <div class="modal fade" id="createthread" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form class="modal-content" action="threadcreate.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Thread</h4>
                    </div>
                    <div class="modal-body">
                      <input type="text" name="title" class="form-control" placeholder="Thread Name" required>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">New Thread</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
      </tbody>
    </table>
</body>
