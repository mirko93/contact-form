<?php
require_once("config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = :id";
$query = $con->prepare($sql);
$query->execute([':id' => $id]);
$query->setFetchMode(PDO::FETCH_ASSOC);
$update_post = $query->fetch();

if (isset($_POST['edit'])) {
    $update_id = $_POST['update_id'];
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $body = htmlspecialchars($_POST['body']);

    $sql = "UPDATE posts SET title=:title, author=:author, body=:body WHERE id=:id";
    $query = $con->prepare($sql);
    $query->bindParam(':title', $title);
    $query->bindParam(':author', $author);
    $query->bindParam(':body', $body);
    $query->bindParam(':id', $update_id);
    $query->execute();

    if ($query) {
        echo 'Update success';
        header("Location: index.php"); 
    } else {
        echo "Not update";
    }  
}


?>



    <?php include("include/header.php") ?>
    <br>
    <br>
    <div class="container">
        <h1>Edit Post</h1>
        <form action="editpost.php" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $update_post['title'] ?>">
            </div>
            <div class="form-group">
                <input type="text" name="author" class="form-control" placeholder="Author" required value="<?php echo $update_post['author'] ?>">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Body" required><?php echo $update_post['body'] ?></textarea>
            </div>

            <input type="hidden" name="update_id" class="form-control" value="<?php echo $update_post['id'] ?>">
            <button class="btn btn-primary" name="edit" type="edit">Update</button>
            
        </form>
    </div>


    <?php include("include/footer.php") ?>
