<?php
require_once('database.php');

?><?php
include('includes/header.php');
?>
<div class="container">
<!-- display a table of records -->
<h2>Users</h2>
<table>
<?php foreach ($users as $user) : ?>
<tr>
    <td><img src="profile_pics/<?php echo $user['profPic']; ?>" width="100px" height="100px"></td>
    <td><?php echo $user['userName']; ?></td>
    <td><?php echo $user['dateOfCreation']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php
include('includes/footer.php');
?>