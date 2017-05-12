<?php
include('header.php');
?>

<!-- go back to the thread page -->
<body>
  <div class="flex-container">
    <div class="pull-left">
      <a id="backToThread" href="/Thread.php">Back to Threads</a>
    <h1>Posts</h1>
  </div>

<div id="postarea">
    <?php
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT postId, postuser, postText FROM Post WHERE threadNo = '$id' ORDER BY postId" );
    $stmt->execute();
    $stmt->bind_result($postId, $postuser, $postText);
    while ($stmt->fetch() == TRUE) {
      echo '<div class="post">
      <div class="poster">'.$postuser.'</div>
      <div class="postText">'.$postText.'</div>
      </div>
      ';
    }
    $stmt->close();
    ?>

    <!-- Name of the forum/header -->
    <table width="1000px" border="2" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td>
                <table width="100%" border="2" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
                    <tr>
                        <td bgcolor="#F8F7F1">
                            <h1><strong>Forum Name: <?php echo $threadName; ?></strong></h1>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#F8F7F1"><strong>By :</strong>
                            <?php echo $postuser; ?>
                        </td>
                        <td bgcolor="#F8F7F1"><strong>Date/time : </strong>
                            <?php echo $datetime; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <BR>


    <!-- Display the current posts here -->
    <table width="1000px" border="2" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td>
                <table width="100%" border="2" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                      <tr>
                        <td bgcolor="#F8F7F1"><strong>Post:</strong>
                            <?php echo $postText; ?>
                        </td>
                      </tr>
                      <tr>
                        <td width="70%">
                        <td width="10%" bgcolor="#F8F7F1">
                          <Strong>User: </strong>
                            <?php echo $postuser; ?>
                        </td>

                        <td bgcolor="#F8F7F1"><strong>Post Time:</strong></td>
                        <td bgcolor="#F8F7F1">
                            <?php echo $datetime; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br>

    <!-- Post box to enter your own post -->
    <BR>
    <table width="1000px" border="2" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <form name="form1" method="post" action="add_post.php">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                            <td><textarea name="posttext" cols="45" rows="3" id="posttext"></textarea></td>
                        </tr>
                        <tr>
                            <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
                            <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
                        </tr>
                    </table>
                </td>
            </form>
        </tr>
    </table>
  </div>
</body>
