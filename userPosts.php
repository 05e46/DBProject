<?php
include('header.php');
?>
<body>
  <div class="flex-container">
    <div class="pull-left">
      <a id="backToThread" href="/Thread.php">Back to Threads</a>
    <h1>Posts</h1>
  </div>
    <?php
      $stmt = $db->prepare("SELECT postText, Poster FROM Post WHERE ThreadNo = 2 ORDER BY PostNo");
      $stmt->execute();
      $stmt->bind_result($text, $poster);
      while ($stmt->fetch() == TRUE) {
        echo '
        <div class="post">
        <div class="poster">'.$poster.'</div>
        <div class="postText">'.$text.'</div>
        </div>
        ';
      }
      $stmt->close();
    ?>
</body>
