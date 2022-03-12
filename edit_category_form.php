<?php
require('database.php');
include('includes/header.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM categories
          WHERE categoryID = :category_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$category = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php

?>
        <h2>Edit <?php echo $category['categoryName'];?></h2>
        <form action="edit_category.php" method="post" enctype="multipart/form-data"
              id="edit_category_form">

            <input type="hidden" name="category_id"
                   value="<?php echo $category['categoryID']; ?>">
            <br>

            <label>Category Name:</label>
            <input type="input" name="name"
                   value="<?php echo $category['categoryName']; ?>">
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>