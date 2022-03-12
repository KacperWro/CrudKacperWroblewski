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
<div id="mini_menu">
    <p><a href="add_category_form.php">Add New Category</a></p>
    <p><a href="add_post_form.php">Add Post in Current Category</a></p>
</div>
<div class="container">
<!-- display a table of records -->
<h2><?php echo $category_name; ?> 
<form action="delete_category.php" method="post">
    <input type="hidden" name="category_id"value= <?php echo $currentID ?> >
    <input type="submit" value="X" id="delete" class="button">
</form>
<form action="edit_category_form.php" method="post">
    <input type="hidden" name="category_id" value= <?php echo $currentID ?> >
    <input type="submit" value="✎" id="edit" class="button">
</form></h2>
<table>
<?php foreach ($records as $record) : ?>
<tr>
    <td><a href="replies.php.?post_id=<?php echo $record['postID']; ?>">
    <?php echo $record['postTitle']; ?></a></td>
    <td><?php echo $record['postDate']; ?></td>
    <td>
        <form action="delete_post.php" method="post">
            <input type="hidden" name="post_id"value= <?php echo $record['postID'] ?> >
            <input type="submit" value="X" id="deletePost" class="button">
        </form>
        <form action="edit_category_form.php" method="post">
    <input type="hidden" name="category_id" value= <?php echo $currentID ?> >
    <input type="submit" value="✎" id="editPost" class="button">
</form>
    </td>
</tr>

<?php endforeach; ?>
</table>
<?php
include('includes/footer.php');
?>