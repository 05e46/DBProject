<?php
session_start();
include('header.php');
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
          $id = $_GET["id"];
          $stmt = $db->prepare("SELECT threadID, Title, StartUser, Ranking FROM Thread WHERE ForumNo = $id");
          $stmt->execute();
          $stmt->bind_result($threadID, $threadName, $starter, $rank);
          while ($stmt->fetch() == TRUE) {
            echo '
            <tr>
            <td><a href="userPosts.php?id='.$threadID.'"><strong>'.$threadName.'</strong></a></td>';
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

        <?php
        /*if $_SESSION['user'] == 'moderator' && $_SESSION['user'] == 'admin' {
          //show the request forum button on bottom of page
          <!-- Trigger the request Modal -->
            echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#requestForum" style="float: right">Request Forum</button>';
        }*/
        ?>

        <!-- Modal -->
        <div class="modal fade" id="requestForum" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Request Forum</h4>
                    </div>
                    <div class="modal-body">
                        <label>Name: </label>
                        <br />
                        <label>Description: </label>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

      </tbody>
    </table>
</body>
