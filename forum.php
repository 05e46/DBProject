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
              $stmt = $db->prepare("SELECT ForumId, ForumName, Description, StartModerator FROM Forum");
              $stmt->execute();
              $stmt->bind_result($id, $forumName, $description, $starter);
              while ($stmt->fetch() == TRUE) {
                echo '
                <tr>
                <td><a href="thread.php?id='.$id.'"><strong>'.$forumName.'</strong></a></td>
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


        <!-- Buttons for the Modal -->
        <!-- Button for Admin -->
        <?php
        /*if $_SESSION['user'] == 'admin'{
          //show the create forum button on bottom of page
          <!-- Trigger the create forum Modal -->
          echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#newForum" style="float: right">Create Forum</button>';
        }*/
        ?>
        <div class="container">

            <!-- Modal -->
            <div class="modal fade" id="newForum" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">New Forum</h4>
                        </div>
                        <div class="modal-body">
                            <label>Name: </label>
                            <br />
                            <label>Description: </label>
                            <br />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            /*if $_SESSION['user'] == 'moderator'{
              //show the request forum button on bottom of page
              <!-- Trigger the request Modal -->
                echo '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#requestForum" style="float: right">Request Forum</button>';
            }*/
            ?>

            <!-- Modal -->
            <div class="modal fade" id="requestForum" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Request Forum</h4>
                        </div>
                        <div class="modal-body">
                            <label>Name: </label>
                            <br />
                            <label>Description: </label>
                            <br />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
</body>
