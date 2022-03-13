<?php

// Get the product data
$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$content = filter_input(INPUT_POST, 'content');

// Validate inputs
if ($post_id == null || $post_id == false || $user_id == null || $user_id == false || empty($content)) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} 
else 
{
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO forumReplies
                 (postID, userID, replyContent, replyDate )
              VALUES
                 (:post_id, :user_id, :content, current_timestamp)";
    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':content', $content);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    header("Location: replies.php.?post_id=".$post_id);
}