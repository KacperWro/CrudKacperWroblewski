<?php
    require_once('database.php');
    include('includes/header.php');
    // Get all categories
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $query = 'SELECT *
            FROM users
            WHERE userID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
?>
<!-- the head section -->
<div class="container">
<?php

?>
<h2 style="margin-bottom:1em;">Edit <?php echo $user['userName']?></h2>
<form action="edit_user.php" method="post" id="edit_user_form" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="<?php echo $user['userName']?>" required pattern="[A-Za-z0-9]{3,20}">
        </div>
    </div>
    <div class="form-group row" style="margin-top:0.5em;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Picture</label>
        <div class="col-sm-10">
            <input type="hidden" name="original_image" value="<?php echo $user['profPic']; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="file" name="image" accept="image/*"/>
            <?php if ($user['profPic'] != "") { ?>
            <p style="margin-top:1em;"><img src="profile_pics/<?php echo $user['profPic']; ?>" height="150" /></p>
            <?php } ?>
        </div>
    </div>
    <div class="form-group row" style="text-align:center;margin-top:1em;margin-left:8em;">
      <div class="col-sm-10">
          <a href="user.php"><button type="submit" class="btn btn-success">Save Changes</button></a>
      </div>
  </form>
<br><br>
    <?php
include('includes/footer.php');
?>