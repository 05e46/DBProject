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
    $id = $_GET["id"];
    $stmt = $db->prepare("SELECT postID, postText, Poster FROM Post WHERE threadID = $id");
    $stmt->execute();
    $stmt->bind_result($postText, $poster);
    while ($stmt->fetch() == TRUE) {
    ?>

      <table width="1200px" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
          <tr>
              <td>
                  <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                  <tr>
                      <td bgcolor="#F8F7F1">
                          <?php echo '.$postText.' ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="70%">
                      <td width="10%" bgcolor="#F8F7F1">
                        <Strong>User: </strong>
                          <?php echo '$poster'?>
                      </td>
                      <td bgcolor="#F8F7F1"><strong>Post Time:</strong></td>
                      <td bgcolor="#F8F7F1">
                          <?php /*echo $rows['a_datetime'];*/?>
                      </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <br>

      <?php
      echo '
      <div class="post">
      <div class="poster">'.$poster.'</div>
      <div class="postText">'.$postText.'</div>
      </div>
      ';
    }
    $stmt->close();
    ?>
</body>
