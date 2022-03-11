<!-- the head section -->

<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
}

if ($category_id == null || $category_id == false)
{
    $queryLowCategory = "SELECT MIN(categoryID), categoryID, categoryName FROM categories";
    $statementLowCategory = $db->prepare($queryLowCategory);
    $statementLowCategory->execute();
    $lowCategory = $statementLowCategory->fetch();
    $statementLowCategory->closeCursor();
    $category_id = $lowCategory['categoryID'];
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'] ?? 'default';

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

// Get post ID
if (!isset($post_id)) {
    $post_id = filter_input(INPUT_GET, 'post_id', 
    FILTER_VALIDATE_INT);
    if ($post_id == NULL || $post_id == FALSE) {

        $post_id = 1;
    }
    }
    
    // Get name for current post
    $queryPost = "SELECT * FROM forumPosts
    WHERE postID = :post_id";
    $statement5 = $db->prepare($queryPost);
    $statement5->bindValue(':post_id', $post_id);
    $statement5->execute();
    $post = $statement5->fetch();
    $statement5->closeCursor();
    $post_name = $post['postTitle'] ?? 'default';
    
    // Get all posts
    $queryAllPosts = 'SELECT * FROM forumPosts
    ORDER BY postDate DESC';
    $statement6 = $db->prepare($queryAllPosts);
    $statement6->execute();
    $posts = $statement6->fetchAll();
    $statement6->closeCursor();
    
    // Get replies for selected post
    $queryReplies = "SELECT * FROM forumReplies
    WHERE postID = :post_id
    ORDER BY replyDate DESC";
    $statement7 = $db->prepare($queryReplies);
    $statement7->bindValue(':post_id', $post_id);
    $statement7->execute();
    $replies = $statement7->fetchAll();
    $statement7->closeCursor();
?>
<?php
?>

<head>
<title>Kacper's Discussion Forum</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" type="image/x-icon" href="includes/favicon.png">
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
</ul>
</nav>
</div>
