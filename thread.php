<?php
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
      </tbody>
    </table>
</body>
