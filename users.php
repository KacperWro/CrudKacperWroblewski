<?php
require_once('database.php');
include('includes/header.php');
?>

<div class="topButtons" >
    <a href="add_user_form.php"><button type="button" class="btn btn-primary">Add New User</button></a>
</div>
<div class="container">
<!-- display a table of records -->
<h2>Users</h2>
<?php foreach ($users as $user) : ?>
    
    <div id="userProfile">
        
        <img src="profile_pics/<?php echo $user['profPic']; ?>" width="100px" height="100px">
        <h3><?php echo $user['userName']; ?>
        <form class="buttons" action="delete_user.php" method="post">
            <input type="hidden" name="user_id"value= <?php echo $user['userID']?>> 
            <button type="submit" class="btn btn-danger">X</button>
        </form>
        <form class="buttons" action="edit_user_form.php" method="post">
            <input type="hidden" name="user_id" value= <?php echo $user['userID']?> >
            <button type="submit" class="btn btn-success">✎</button>
        </form></h3>
        <h3 style="margin-right:3em;">Joined Date: <?php echo $user['dateOfCreation']; ?></h3>
    </div>
</tr>
<?php endforeach; ?>

<?php
include('includes/footer.php');
?>