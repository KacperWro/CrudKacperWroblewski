<?php
require_once('database.php');

?>
<?php
include('includes/header.php');
?>

<div class="topButtons" >
<form action="add_reply_form.php" method="post" style="margin-left:-1em;">
            <input type="hidden" name="post_id" value= <?php echo $post['postID'];?>>
            <button type="submit" class="btn btn-primary">Add New Reply</button>
        </form>
</div>
<div class="container">
<!-- display a table of records -->
<table>
<?php
    $posterID = $post['userID'];

    $getCurrentID = "SELECT * FROM users
    WHERE userID = :posterID";
    $statement2 = $db->prepare($getCurrentID);
    $statement2->bindValue(':posterID', $posterID);
    $statement2->execute();
    $poster = $statement2->fetch();
    $statement2->closeCursor();
?>



<div class="subProfile">
    <img src="profile_pics/<?php echo $poster['profPic']; ?>"><br>
        <p><?php echo $poster['userName'];?></p>
        <p class="profileP">Joined Date: <?php echo $poster['dateOfCreation'];?></p>
        <p class="profileP">Posted On: <?php echo $post['postDate'];?></p>
    </div>

<div class="subContent"> 
    <h5><?php echo $post['postTitle']; ?>    </h5>
    <p><?php echo $post['postContent']; ?></p>
<?php foreach ($replies as $reply) : ?>
<tr>
    <?php
        $currentUserID = $reply['userID'];

        $getCurrentID = "SELECT * FROM users
        WHERE userID = :currentUserID";
        $statement2 = $db->prepare($getCurrentID);
        $statement2->bindValue(':currentUserID', $currentUserID);
        $statement2->execute();
        $currentUser = $statement2->fetch();
        $statement2->closeCursor();
    ?>
    

    <div class="subProfile">
    <img src="profile_pics/<?php echo $currentUser['profPic']; ?>" width="100px" height="100px" style="margin-top:1em;"><br>
        <p><?php echo $currentUser['userName'];?></p>
        <p class="profileP" style="margin-top:-1em;">Joined Date: <?php echo $currentUser['dateOfCreation'];?></p>
        <p class="profileP" >Posted On: <?php echo $reply['replyDate'];?></p>
    </div>
    <div class="subContent"> 
        <div class="buttonsDiv" id="replyButtons">
        <form class="buttons" action="delete_reply.php" method="post">
            <input type="hidden" name="reply_id" value= <?php echo $reply['replyID'];?> >
            <button type="submit" class="btn btn-danger">X</button>
        </form>
        <form class="buttons" action="edit_reply_form.php" method="post">
            <input type="hidden" name="reply_id" value= <?php echo $reply['replyID'];?>>
            <button type="submit" class="btn btn-success">✎</button>
        </form>
</div>
    <p style="margin-top:1em;"><?php echo $reply['replyContent']; ?></p>
</div>
    
<?php endforeach; ?>
</table>
<?php
include('includes/footer.php');
?>