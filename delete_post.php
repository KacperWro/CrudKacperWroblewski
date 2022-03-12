<?php
require_once('database.php');

// Get IDs
$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($post_id != false) {
    $query0 = "DELETE FROM forumReplies
              WHERE postID = :post_id";
    $statement0 = $db->prepare($query0);
    $statement0->bindValue(':post_id', $post_id);
    $statement0->execute();
    $statement0->closeCursor();

    $query1 = "DELETE FROM forumPosts
              WHERE postID = :post_id";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':post_id', $post_id);
    $statement1->execute();
    $statement1->closeCursor();
}

// display the Product List page
include('index.php');
?>