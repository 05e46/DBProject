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
          $stmt = $db->prepare("SELECT ForumNo, Title, StartUser, Ranking FROM Thread WHERE Status = 'open' AND ForumNo = 2");
          $stmt->execute();
          $stmt->bind_result($id, $threadTitle, $starter, $rank);
          while ($stmt->fetch() == TRUE) {
            echo '
            <tr class="thread-row" data-href="url:userPosts.php" data-id="'.$id.'">
            <td><strong>'.$threadTitle.'</strong></td>';
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
            else {echo'<td></td>';}
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
