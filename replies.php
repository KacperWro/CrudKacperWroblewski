<?php
require_once('database.php');

?>
<?php
include('includes/header.php');
?>
<div class="container">
<!-- display a table of records -->
<h2><?php echo $post_name; ?></h2>
<table>
<?php foreach ($replies as $reply) : ?>
<tr>
    <td><?php echo $reply['replyContent']; ?></td>
    <td><?php echo $reply['replyDate']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="add_record_form.php">Add Record</a></p>
<p><a href="category_list.php">Manage Categories</a></p>
<?php
include('includes/footer.php');
?>