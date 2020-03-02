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
        <a href="index.php" class="btn btn-outline-primary">Back</a>
        <h1><?php echo $single_post['title'] ?></h1>
        <small>Created on <?php echo $single_post['created_at'] ?> by <?php echo $single_post['author'] ?></small>
        <p><?php echo $single_post['body'] ?></p>
        <hr>
        <a href="editpost.php?id=<?php echo $single_post['id'] ?>" class="btn btn-success">Edit</a>
    </div>
    

    
</body>
</html>
