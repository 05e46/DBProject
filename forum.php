<?php
include('header.php');
?>
<body>
  <div class="flex-container">
    <h1>Forums Page</h1>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Forum Name</th>
          <th>Description</th>
          <th>Moderator</th>
        </tr>
      </thead>
      <tbody>
    <?php
      $stmt = $db->prepare("SELECT ForumId, ForumName, Description, StartModerator FROM Forum WHERE Status = 'open'");
      $stmt->execute();
      $stmt->bind_result($id, $forumName, $description, $starter);
      while ($stmt->fetch() == TRUE) {
        echo '
        <tr class="forum-row" data-href="url:thread.php" data-id="'.$id.'">
        <td><strong>'.$forumName.'</strong></td>
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
<footer>
  <script>
    jQuery(document).ready(function($) {
      $(".forum-row").click(function() {
          var forum = $(this).data("id");
          window.location = $(this).data("href");
      });
    });
  </script>
</footer>
