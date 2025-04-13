<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\Post;

session_start();

// Usage example
$post = new Post();

if(empty($_SESSION['users'])) {
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/button-style.css">
    <title>My Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
        }
        li {
            list-style-type: none;
            padding: 10px;
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>All Blog Posts</h1>
    <h2>Welcome <?php echo $_SESSION['users']['first_name']; ?></h2>
    <a href="blog.php"><button class = "add-blog-button">Add a blog post</button></a>
    <a href="logout.php"><button>Logout</button></a>
    <?php
        // get all users from the database and return as an array then loop it inside foreach to create a list
        $posts = $post->getPosts();
        foreach ($posts as $key => $value) {
            echo '  <li><b>'. $value['title'] . '</b><small> Posted by: ' . $value['first_name'] . '</small> <p>' . $value['content'] . '</li>';
        }
    ?>
</body>
</html>