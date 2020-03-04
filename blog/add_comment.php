<?php

require_once("config.php");

$error = "";
$comment_name = "";
$comment_content = "";

if (empty($_POST['comment_name'])) {
    $error = $error . "<p class='text-danger'>Name is required</p>";
} else {
    $comment_name = $_POST["comment_name"];
}

if (empty($_POST["comment_content"])) {
    $error = $error . "<p class='text-danger'>Comment is required</p>";
} else {
    $comment_content = $_POST['comment_content'];
}

if ($error == '') {
    $sql = "INSERT INTO comments (parent_comment_id, comment, comment_sender_name) 
            VALUES (:parent_comment_id, :comment, :comment_sender_name)";
    $query = $con->prepare($sql);
    $query->bindParam(":parent_comment_id", $_POST["comment_id"]);
    $query->bindParam(":comment", $comment_content);
    $query->bindParam(":comment_sender_name", $comment_name);
    $query->execute();

    $error = '<label class="text-success">Comment Added</label>';
}

$data = ['error' => $error];

echo json_encode($data);

