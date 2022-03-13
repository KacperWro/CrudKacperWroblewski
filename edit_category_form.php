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
<h2 style="margin-bottom:1em;">Edit <?php echo $category['categoryName'];?></h2>
<form action="edit_category.php" method="post" id="edit_category_form">
    <input type="hidden" name="category_id"
    value="<?php echo $category['categoryID']; ?>">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="<?php echo $category['categoryName']; ?>" required pattern="[A-Za-z0-9 ]{3,30}">
        </div>
    </div>
    <div class="form-group row" style="text-align:center;margin-top:1em;margin-left:8em;">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success">Save changes</button>
        </div>
</form>
<br><br>

    <?php
include('includes/footer.php');
?>