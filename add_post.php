<?php

// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title');
$content = filter_input(INPUT_POST, 'content');

// Validate inputs
if ($category_id == null || $category_id == false ||
    $title == null || $content == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {

    
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO forumPosts
                 (categoryID, userID, postTitle, postContent, postDate )
              VALUES
                 (:category_id, :user_id, :title, :content, current_timestamp)";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':content', $content);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}