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
<div class="topButtons" >
    <a href="add_category_form.php"><button type="button" class="btn btn-primary">Add New Category</button></a>
    <a href="add_post_form.php"><button type="button" class="btn btn-primary">Add New Post</button></a>
</div>
<div class="container">
    <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $category_name; ?> 
        <form class="buttons" action="delete_category.php" method="post">
            <input type="hidden" name="category_id"value= <?php echo $currentID ?> >
            <button type="submit" class="btn btn-danger">X</button>
        </form>
        <form class="buttons" action="edit_category_form.php" method="post">
            <input type="hidden" name="category_id" value= <?php echo $currentID ?> >
            <button type="submit" class="btn btn-success">✎</button>
        </form>
    </h2>

<table>
<?php foreach ($records as $record) : ?>
<tr>
    <?php
        $currentUserID = $record['userID'];
        $getCurrentID = "SELECT * FROM users
        WHERE userID = :currentUserID";
        $statement2 = $db->prepare($getCurrentID);
        $statement2->bindValue(':currentUserID', $currentUserID);
        $statement2->execute();
        $currentUser = $statement2->fetch();
        $statement2->closeCursor();
    ?>

    <div class="subProfile">
        <img src="profile_pics/<?php echo $currentUser['profPic'] ?? 'default.jpg'; ?>"><br>
        <p><?php echo $currentUser['userName'] ?? '[User Deleted]';?></p>
        <p class="profileP">Joined Date: <?php echo $currentUser['dateOfCreation'] ?? 'Na';?></p>
        <p class="profileP">Posted On: <?php echo $record['postDate'];?></p>
    </div>

    <div class="subContent"> 
        <h5>
        &nbsp&nbsp&nbsp<a href="replies.php.?post_id=<?php echo $record['postID']; ?>"><?php echo $record['postTitle']; ?></a>
            <div class="buttonsDiv">
                <form class="buttons" action="delete_post.php" method="post">
                    <input type="hidden" name="post_id"value= <?php echo $record['postID'] ?> >
                    <button type="submit" class="btn btn-danger">X</button>
                </form>
                <form class="buttons" action="edit_post_form.php" method="post">
                    <input type="hidden" name="post_id" value= <?php echo $record['postID'] ?> >
                    <button type="submit" class="btn btn-success">✎</button>
                </form>
            </div>
        </h5>
        <p><?php echo $record['postContent']; ?></p>
        
    <div>
    
</tr>

<?php endforeach; ?>
</table>
<?php
include('includes/footer.php');
?>