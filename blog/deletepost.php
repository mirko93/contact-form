<?php

require_once('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = :id";
$query = $con->prepare($sql);
$query->execute([':id' => $id]);

header('Location: index.php');
