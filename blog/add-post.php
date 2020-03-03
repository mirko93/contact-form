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

    $query = header('Location: index.php');
}


?>

<?php include("include/header.php") ?>
    <br>
    <br>

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

    
    <?php include("include/footer.php") ?>
