<?php
require('database.php');
include('includes/header.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$query1 = 'SELECT *
          FROM users
          ORDER BY userID';
$statement1 = $db->prepare($query1);
$statement1->execute();
$users = $statement1->fetchAll();
$statement1->closeCursor();

?>
<!-- the head section -->
<div class="container">
    <?php

    ?>
    <h2 style="margin-bottom:1em;">Add Forum Post</h2>
    <form action="add_post.php" method="post" enctype="multipart/form-data" id="add_post_form" name="postForm" onSubmit="return validateForumPostForm()">
        <div class="form-group">
            <label for="exampleFormControlInput1">Post Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Should be between 3 and 30 characters in length" name="title" pattern="[A-Za-z0-9,:- ]{3,30}" onChange="return validateForumPostForm()">
            <p id="postTitleError" style="font-weight:bold;"></p>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Post Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Post should be between 20 and 800 characters in length" name="content" onChange="return validateForumPostForm()"></textarea>
            <p id="postContentError" style="font-weight:bold;"></p>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
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
            <button type="submit" class="btn btn-success" id="add_category_button">Add New Post</button>
        </div>
    </form>
</div>
<br><br>

        
    <?php
include('includes/footer.php');
?>