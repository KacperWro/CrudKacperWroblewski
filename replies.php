<?php
require_once('database.php');

?>
<div class="container">
<?php
include('includes/header.php');
?>
<section>
<!-- display a table of records -->
<h2>Users</h2>
<table>
<?php foreach ($replies as $reply) : ?>
<tr>
    <td><?php echo $reply['replyContent']; ?></td>
    <td><?php echo $reply['replyDate']; ?></td>
</tr>
<?php endforeach; ?>
</table>

</section>
<?php
include('includes/footer.php');
?>