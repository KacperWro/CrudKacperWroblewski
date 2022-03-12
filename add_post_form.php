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
        <h2>Add Record</h2>
        <form action="add_post.php" method="post" enctype="multipart/form-data" id="add_post_form">
            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>User:</label>
            <select name="user_id">
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user['userID']; ?>">
                    <?php echo $user['userName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Post Title:</label>
            <input type="input" name="title">
            <br>

            <label>Post Content:</label>
            <textarea name="content" rows="4" cols="50">Enter post content here</textarea>
            <br>        
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Record">
            <br><br>
        </form>
    <?php
include('includes/footer.php');
?>