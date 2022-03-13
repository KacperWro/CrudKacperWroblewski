<?php
require_once('database.php');

// Get IDs
$reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($reply_id != false) {
    $query0 = "DELETE FROM forumReplies
              WHERE replyID = :reply_id";
    $statement0 = $db->prepare($query0);
    $statement0->bindValue(':reply_id', $reply_id);
    $statement0->execute();
    $statement0->closeCursor();

    
}

// display the Product List page
include('index.php');
?>