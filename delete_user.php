<?php

require_once('database.php');
// Get ID
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($user_id == null || $user_id == false) {
    $error = "Invalid User ID.";
    include('error.php');
}
else {

    $query1 = 'SET foreign_key_checks = 0';
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $statement1->closeCursor();

    $query2 = 'DELETE FROM users 
              WHERE userID = :user_id';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':user_id', $user_id);
    $statement2->execute();
    $statement2->closeCursor();

    $query3 = 'SET foreign_key_checks = 1';
    $statement3 = $db->prepare($query3);
    $statement3->execute();
    $statement3->closeCursor();


    include('users.php');
}
?>
