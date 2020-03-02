<?php
require_once("config.php");

if (isset($_POST['submit'])) {
    $update_id = $_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $body = htmlspecialchars($_POST['body']);

    $sql = "UPDATE posts SET title = :title, author = :author, body = :body WHERE id = " . $update_id;
    $query = $con->prepare($sql);
    $query->bindParam(':title', $title);
    $query->bindParam(':author', $author);
    $query->bindParam(':body', $body);
    $query->execute();

    header("Location: single-post.php?id=" . $id);  
}

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = " . $id;
$query = $con->prepare($sql);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$update_post = $query->fetch();



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
        <h1>Edit Post</h1>
        <form action="editpost.php" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $update_post['title'] ?>" required>
            </div>
            <div class="form-group">
                <input type="text" name="author" class="form-control" placeholder="Author" value="<?php echo $update_post['author'] ?>" required>
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Body" value="<?php echo $update_post['body'] ?>"></textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $update_id['id']; var_dump($update_id); ?>">
            <button class="btn btn-success" name="submit" type="submit">Update</button>
            
        </form>
    </div>

    

    
</body>
</html>
