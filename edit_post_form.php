<?php
require('database.php');
include('includes/header.php');

$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM forumPosts
          WHERE postID = :post_id';
$statement = $db->prepare($query);
$statement->bindValue(':post_id', $post_id);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php

?>
        <h2 style="margin-bottom:1em;">Edit <?php echo $post['postTitle'];?></h2>

    <form action="edit_post.php" method="post" enctype="multipart/form-data" id="edit_post_form" name="postForm" onSubmit="return validateForumPostForm()">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <div class="form-group">
            <label for="exampleFormControlInput1">Post Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $post['postTitle'];?>" name="title" pattern="[A-Za-z0-9,:- ]{3,30}"  onChange="return validateForumPostForm()">
            <p id="postTitleError" style="font-weight:bold;"></p>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Post Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" pattern="{20,800}" onChange="return validateForumPostForm()"><?php echo $post['postContent'];?></textarea>
            <p id="postContentError" style="font-weight:bold;"></p>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
            <?php foreach ($categories as $category) : ?>
             <?php 
                 echo '<option value="'.$category['categoryID'].'" '.(($category['categoryID']==$post['categoryID'] )?'selected="selected"':"").'>'.$category['categoryName'].'</option>';
             ?>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User</label>
            <select class="form-control" id="exampleFormControlSelect1" name="user_id">
            <?php foreach ($users as $user) : ?>
                <?php 
                 echo '<option value="'.$user['userID'].'" '.(($user['userID']==$post['userID'] )?'selected="selected"':"").'>'.$user['userName'].'</option>';
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