<?php
session_start();
include('header.php');
?>

<!-- go back to the thread page -->
<body>
  <div class="flex-container">
    <div class="pull-left">
      <a id="backToThread" href="/Thread.php">Back to Threads</a>
    <h1>Posts</h1>
  </div>


  <!-- Tables to display the posts -->
  <table width="800px" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tbody>
    <div id="postarea">
    <?php
    $stmt = $db->prepare("SELECT postId, postuser, postText, uploadDate FROM Post" );
    $stmt->execute();
    $stmt->bind_result($postId, $postuser, $postText, $uploadDate);
    while ($stmt->fetch() == TRUE) {
      echo '
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
              <td>
                <table width="100%" border="2" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                  <tr>
                    <td bgcolor="#F8F7F1">'.$postText.'</td>
                  </tr>
                    <td width="50%" bgcolor="#F8F7F1">User: '.$postuser.'</td>
                    <td width="50%" bgcolor="#F8F7F1">Datetime: '.$uploadDate.'</td>
                </table>
              </td>
          </td>
      </tr>
      <br>
      ';
    }
    $stmt->close();
    ?>
  </tbody>

  <!-- Where the user can enter their posts -->
  <table width="1200px" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <br>
      <tr>
          <form name="form1" method="post" action="add_post.php">
              <td>
                  <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                      <tr>
                          <td valign="top"><strong>Post</strong></td>
                          <td valign="top">:</td>
                          <td><textarea name="postText" cols="45" rows="3" id="postText"></textarea></td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                          <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
                          <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
                      </tr>
                  </table>
              </td>
          </form>
      </tr>
  </table>
