<!-- the head section -->

<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryPosts = "SELECT * FROM forumPosts
WHERE categoryID = :category_id
ORDER BY postDate DESC";
$statement3 = $db->prepare($queryPosts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();

// Get all users
$queryUsers = 'SELECT * FROM users
ORDER BY dateOfCreation DESC';
$statement4 = $db->prepare($queryUsers);
$statement4->execute();
$users = $statement4->fetchAll();
$statement4->closeCursor();

// Get all replies
$queryReplies = 'SELECT * FROM forumReplies
ORDER BY replyID DESC';
$statement5 = $db->prepare($queryReplies);
$statement5->execute();
$replies = $statement5->fetchAll();
$statement5->closeCursor();

?>
<?php
?>

<head>
<title>Kacper's Discussion Forum</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
<header><h1>Kacper's Discussion Forum</h1>
    
</header>
<div id="nav">
    <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
            <?php echo $category['categoryName']; ?>
            </a>
            </li>
            
            <?php endforeach; ?>
            <li><a href="users.php">Users</a></li>
            <li><a href="replies.php">Replies (Temporary)</a></li>
</ul></nav>
</div>
