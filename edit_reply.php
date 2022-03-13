<?php

// Get the product data
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$content = filter_input(INPUT_POST, 'content');
$reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($user_id == null || $user_id == false || $content == null || $reply_id == null || $reply_id == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} 
else 
{
    require_once('database.php');

    // Add the product to the database 
    $query = "UPDATE forumReplies
    SET userID = :user_id,
    replyContent = :content
    WHERE replyID = :reply_id;";

    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':content', $content);
    $statement->bindValue(':reply_id', $reply_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}

?>