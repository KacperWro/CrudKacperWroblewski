<?php

require_once('database.php');
// Get ID
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement0 = $db->prepare($queryAllCategories);
$statement0->execute();
$categories = $statement0->fetchAll();
$statement0->closeCursor();

$count = 0;

foreach ($categories as $category)
{
    $count++;
}

// Validate inputs
if ($category_id == null || $category_id == false) {
    $error = "Invalid category ID.";
    include('error.php');
}
else if ($count <= 1){
    $error = "Cannot delete. Must have at least one category";
    include('error.php');
}
else {
    // Add the product to the database  
    $query0 = "SELECT postID FROM forumPosts 
              WHERE categoryID = :category_id";
    $statement3 = $db->prepare($query0);
    $statement3->bindValue(':category_id', $category_id);
    $statement3->execute();
    $records = $statement3->fetchAll();
    $statement3->closeCursor();

    foreach($records as $record)
    {
        $currentPostID = $record['postID'];
        $query1 = 'DELETE FROM forumReplies WHERE postID = :currentPostID';
        $statement1 = $db->prepare($query1);
        $statement1->bindValue(':currentPostID', $currentPostID);
        $statement1->execute();
        $statement1->closeCursor();
    }
    
    $query2 = 'DELETE FROM forumPosts 
    WHERE categoryID = :category_id';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':category_id', $category_id);
    $statement2->execute();
    $statement2->closeCursor();

    $query3 = 'DELETE FROM categories 
              WHERE categoryID = :category_id';
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(':category_id', $category_id);
    $statement3->execute();
    $statement3->closeCursor();

    $queryLowCategory = "SELECT MIN(categoryID), categoryID, categoryName FROM categories";
    $statementLowCategory = $db->prepare($queryLowCategory);
    $statementLowCategory->execute();
    $lowCategory = $statementLowCategory->fetch();
    $statementLowCategory->closeCursor();
    $category_id = $lowCategory['categoryID'];

    include('index.php');
}
?>
