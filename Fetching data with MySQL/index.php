<?php
require_once('config.php');

// create query
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$query = $con->prepare($sql);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$posts = $query->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Blog</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

    <nav>
        <ul>
            <li><a href="add-post.php">Add Post</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Posts</h1>
        <?php foreach($posts as $post): ?>
            <div class="jumbotron">
                <h3><?php echo $post['title'] ?></h3>
                <small>Created on <?php echo $post['created_at'] ?> by <?php echo $post['author'] ?></small>
                <p><?php echo $post['body'] ?></p>
                <a href="single-post.php?id=<?php echo $post['id'] ?>">Read more</a>
            </div>
        <?php endforeach; ?>
    </div>
    

    
</body>
</html>
