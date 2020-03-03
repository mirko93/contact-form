<?php
require_once('config.php');

// create query
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$query = $con->prepare($sql);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$posts = $query->fetchAll();



?>

<?php include("include/header.php") ?>

<br><br>

<?php include("include/main.php") ?>

<?php include("include/footer.php") ?>
