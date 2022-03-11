<?php
require_once('database.php');

?>
<?php
include('includes/header.php');

$getCurrentID = "SELECT categoryID FROM categories
WHERE categoryName = :category_name";
$statement1 = $db->prepare($getCurrentID);
$statement1->bindValue(':category_name', $category_name);
$statement1->execute();
$currentCategory = $statement1->fetch();
$statement1->closeCursor();
$currentID = $currentCategory['categoryID'];


?>
<div class="container">
<!-- display a table of records -->
<h2><?php echo $category_name; ?> </h2>
<form action="delete_category.php" method="post">
                    <input type="hidden" name="category_id"
                           value= <?php echo $currentID ?> >
                    <input type="submit" value="X" id="delete">
                </form>
<table>
<?php foreach ($records as $record) : ?>
<tr>
    <td><a href="replies.php.?post_id=<?php echo $record['postID']; ?>">
    <?php echo $record['postTitle']; ?></a></td>
    <td><?php echo $record['postDate']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="add_record_form.php">Add Record</a></p>
<p><a href="category_list.php">Manage Categories</a></p>
<?php
include('includes/footer.php');
?>