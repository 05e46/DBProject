<?php
session_start();
include('includes/chatCongif.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chatroom</title>
  <?php include('header.php') ?>
</head>
<body>
  <h1>Welcome to Chat</h1>
  <br>
  <h2>Send Message</h2>
  <form action = "index.php" method="post">
    <table>
      <tr>
        <td>Name:</td>
        <td>
          <input placeholder="Your name: " type="text"</input>
        </tr>
          <td>Message:</td>
          <td>
            <textarea required placeholder="Message"</textarea>
          </td>
        </table>
      </form>

      <?php
      //select previous chatmessages from db
      if(isset($_post['User'])&&isset($_post['Message'])){
        $sql = 'SELECT * FROM Chat ORDER BY Username';
        $result = mysqli_query($sql);
        while($data=mysql_fetch_array($result)){
          echo '<strong>ID:</strong> '.$data['User'].'<br/>';
          echo '<strong>Message:</strong> '.$data['Message'].'<br/>';
        }
      }
      mysql_close();
       ?>
