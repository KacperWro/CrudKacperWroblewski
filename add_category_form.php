<?php
    require_once('database.php');
    include('includes/header.php');
    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php

?>
<h2 style="margin-bottom:1em;">Add Category</h2>
<form action="add_category.php" method="post" id="add_category_form" name="categoryForm" onSubmit="return validateCategoryForm()">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Must be alphanumeric and 3-30 characters in length" onChange="return validateCategoryForm()">
            <p id="categoryNameError" style="font-weight:bold;"></p>
        </div>
    </div>
    <div class="form-group row" style="text-align:center;margin-top:1em;margin-left:8em;">
      <div class="col-sm-10">
          <button type="submit" class="btn btn-success" id="add_category_button">Add New Category</button>
      </div>
  </form>
<br><br>
    <?php
include('includes/footer.php');
?>