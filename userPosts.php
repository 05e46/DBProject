<?php
session_start();
include('header.php');
?>

<!-- go back to the thread page -->
<body>
  <div class="flex-container">
    <a id="backToThread" href="/Thread.php?id=<?php echo $_REQUEST['forum']?>">Back to Threads</a>
    <h1>Posts</h1>
    <div class="row">
      <div id="postarea" class="col-sm-12">
        <?php
        $stmt = $db->prepare("SELECT threadNo, postId, postUser, postText, uploadDate FROM Post WHERE threadNo = ?" );
        $stmt->bind_param("s", $_REQUEST['id']);
        $stmt->execute();
        $stmt->bind_result($threadNo, $postId, $postUser, $postText, $uploadDate);
        //check threadId and threadNo, then display
        while ($stmt->fetch() == TRUE) {
          echo '
            <table class="table table-striped table-bordered table-hover">
              <tr>
              <td style="width:100px;"><strong>'.$postUser.'</strong></td>
              <td>'.$postText.'</td>
            </table>';
        }
        $stmt->close();
        $db->close();
        ?>
        <!-- Where the user can enter their posts -->
        <form method="post" action="add_post.php">
          <textarea name="postText" cols="45" rows="3" id="postText"></textarea>
          <input name="forum" type="hidden" value="<?php echo $_REQUEST['forum'] ?>">
          <input name="thread" type="hidden" value="<?php echo $_REQUEST['id'] ?>">
          <div class="pull-left">
            <input type="submit" name="submit" value="Add Post">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
