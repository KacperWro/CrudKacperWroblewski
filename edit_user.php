<?php

// Get the record data
$name = filter_input(INPUT_POST, 'name');
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

// Validate inputs
if (empty($name)) {
$error = "Invalid record data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'profile_pics/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the record in the database
require_once('database.php');

$query = 'UPDATE users
SET userName = :name,
profPic = :image
WHERE userID = :user_id';
$statement = $db->prepare($query);
$statement->bindValue(':name', $name);
$statement->bindValue(':image', $image);
$statement->bindValue(':user_id', $user_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
header("Location: users.php");
}
?>