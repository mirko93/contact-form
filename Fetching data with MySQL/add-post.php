<?php
require_once('config.php');

if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $body = htmlspecialchars($_POST['body']);

    $sql = "INSERT INTO posts(title, author, body) VALUES (:title, :author, :body)";
    $query = $con->prepare($sql);
    $query->bindParam(':title', $title);
    $query->bindParam(':author', $author);
    $query->bindParam(':body', $body);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $query->fetchAll();

    $query = header('Location: index.php');
}


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

    <div class="container">
        <h1>Add Post</h1>
        <form action="add-post.php" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="form-group">
                <input type="text" name="author" class="form-control" placeholder="Author" required>
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Body" required></textarea>
            </div>

            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
            
        </form>
    </div>

    

    
</body>
</html>
