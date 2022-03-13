<?php
require('database.php');
include('includes/header.php');

$reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM forumReplies
          WHERE replyID = :reply_id';
$statement = $db->prepare($query);
$statement->bindValue(':reply_id', $reply_id);
$statement->execute();
$reply = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php

?>
        <h2 style="margin-bottom:1em;">Edit Reply</h2>

        <form action="edit_reply.php" method="post" enctype="multipart/form-data" id="edit_reply_form" name="replyForm" onSubmit="return validateReplyForm()">
    <input type="hidden" name="reply_id" value="<?php echo $reply_id; ?>">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Post Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" onChange="return validateReplyForm()"><?php echo $reply['replyContent'];?></textarea>
            <p id="replyContentError" style="font-weight:bold;"></p>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User</label>
            <select class="form-control" id="exampleFormControlSelect1" name="user_id">
            <?php foreach ($users as $user) : ?>
                <?php 
                 echo '<option value="'.$user['userID'].'" '.(($user['userID']==$reply['userID'] )?'selected="selected"':"").'>'.$user['userName'].'</option>';
              ?>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group row" style="text-align:center;margin-top:1em;margin-left:8em;">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success" id="add_category_button">Save Changes</button>
        </div>
    </form>
    <br><br><br><br>
     
    <?php
include('includes/footer.php');
?>