<?php

// Get the record data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$category_name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($category_id == NULL ||
$category_id == FALSE || empty($category_name)) {
$error = "Invalid record data. Check all fields and try again.";
include('error.php');
} 
else {

// If valid, update the record in the database
require_once('database.php');

$query = 'UPDATE categories
SET categoryName = :category_name
WHERE categoryID = :category_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':category_name', $category_name);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>