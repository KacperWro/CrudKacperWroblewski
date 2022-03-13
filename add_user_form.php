<?php
    require_once('database.php');
    include('includes/header.php');
    
?>
<!-- the head section -->
<div class="container">
<?php

?>
<h2 style="margin-bottom:1em;">Add New User</h2>
<form action="add_user.php" method="post" id="add_user_form" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Username must be alphanumeric and 3-20 characters in length. It must not contain spaces" required pattern="[A-Za-z0-9]{3,20}">
        </div>
    </div>
    <div class="form-group row" style="margin-top:0.5em;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Picture</label>
        <div class="col-sm-10">
            <input type="file" name="image" accept="image/*" required/>
        </div>
    </div>
    <div class="form-group row" style="text-align:center;margin-top:1em;margin-left:8em;">
      <div class="col-sm-10">
          <a href="user.php"><button type="submit" class="btn btn-success" id="add_category_button">Add New User</button></a>
      </div>
  </form>
<br><br>
    <?php
include('includes/footer.php');
?>