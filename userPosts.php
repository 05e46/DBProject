<?php
session_start();
include('header.php');
$threadID = $_REQUEST['threadID'];
?>

<!-- go back to the thread page -->
<body>
  <div class="flex-container">
    <a id="backToThread" href="/Thread.php?id=<?php echo $_REQUEST['forum']?>">Back to Threads</a>
      <!-- <a id="backToThread" href="/Thread.php?id=<?php $_REQUEST['forum']?>">Back to Threads</a> -->
    <h1>Posts</h1>
    <div class="row">
      <div id="postarea" class="col-sm-12">
        <?php
        $stmt = $db->prepare("SELECT threadNo, postId, postUser, postText, uploadDate, Status FROM Post JOIN User WHERE threadNo = ?" );
        $stmt->bind_param("s", $threadID);
        $stmt->execute();
        $stmt->bind_result($threadNo, $postId, $postUser, $postText, $uploadDate, $status);

        //check threadId and threadNo, then display
        while ($stmt->fetch() == TRUE) {
          echo '<div class="row">
          <div class="col-sm-12">
            <div id="tb-testimonial" class="testimonial testimonial-default">
              <div class="testimonial-section">'.$postText.'</div>
                      <div class="testimonial-desc">
                          <div class="testimonial-writer">
                          	<div class="testimonial-writer-name">'.$postUser.'</div>
                          	<div class="testimonial-writer-designation">'.$status.'</div>
                          </div>
                      </div>
              </div>
            </div>
          </div>';
        }
        $stmt->close();
        $db->close();
        ?>
        <!-- Where the user can enter their posts -->
        <form method="post" action="add_post.php">
          <textarea name="postText" cols="45" rows="3" id="postText"></textarea>
          <input name="forum" type="hidden" value="<?php echo $_REQUEST['forum'] ?>">
          <input name="thread" type="hidden" value="<?php echo $threadID ?>">
          <div class="pull-left">
            <input type="submit" name="submit" value="Add Post">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
