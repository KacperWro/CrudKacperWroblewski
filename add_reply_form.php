<?php
require('database.php');
include('includes/header.php');

$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);

?>
<!-- the head section -->
<div class="container">
    <?php

    ?>
    <h2 style="margin-bottom:1em;">Add New Reply</h2>
    <form action="add_reply.php" method="post" enctype="multipart/form-data" id="add_reply_form">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Reply Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Please keep reply under 800 characters" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User</label>
            <select class="form-control" id="exampleFormControlSelect1" name="user_id">
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user['userID']; ?>">
                    <?php echo $user['userName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group row" style="text-align:center;margin-top:1em;margin-left:8em;">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success" id="add_category_button">Add New Reply</button>
        </div>
    </form>
</div>
<br><br>

        
    <?php
include('includes/footer.php');
?>