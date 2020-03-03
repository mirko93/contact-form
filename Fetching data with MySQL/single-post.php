<?php
require_once('config.php');

$id = $_GET['id'];

// create query
$sql = "SELECT * FROM posts WHERE id = $id";
$query = $con->prepare($sql);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$single_post = $query->fetch();


?>

<?php include("include/header.php") ?>

<br>
<br>

    <div class="container">
        <a href="index.php" class="btn btn-outline-primary">Back</a>
        <h1><?php echo $single_post['title'] ?></h1>
        <small>Created on <?php echo $single_post['created_at'] ?> by <?php echo $single_post['author'] ?></small>
        <p><?php echo $single_post['body'] ?></p>
        <hr>
        <a href="editpost.php?id=<?php echo $single_post['id'] ?>" class="btn btn-success">Edit</a>
        <a href="deletepost.php?id=<?php echo $single_post['id'] ?>" class="btn btn-danger" name="delete" type="delete">Delete</a>
    </div>
    

    
    <?php include("include/footer.php") ?>