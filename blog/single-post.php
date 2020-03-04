<?php
require_once('config.php');

$id = $_GET['id'];

// create query
$sql = "SELECT * FROM posts WHERE id = $id";
$query = $con->prepare($sql);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$single_post = $query->fetch();


$sql = "SELECT * FROM comments WHERE parent_comment_id = $id ORDER BY comment_id DESC";
$query = $con->prepare($sql);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$comment_post = $query->fetchAll();

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

    <hr>

    <form action="add_comment.php" method="POST" id="comment_form">
        <div class="form-group">
            <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <textarea name="comment_content" id="comment_content" rows="5" class="form-control" placeholder="Enter Comment"></textarea>
        </div>

        <div class="form-group">
            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $single_post['id'] ?>">
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit">
        </div>
    </form>
    <span id="comment_message"></span>
    <br>

    <div id="display_comment">
        <?php foreach($comment_post as $comment): ?>
        <div class="card">
            <div class="card-header">
                <b> <?php echo $comment["comment_sender_name"] ?> </b> on <i><?php echo $comment["date"] ?></i>
            </div>
            <div class="card-body"><?php echo $comment["comment"] ?></div>
        </div>

        <hr>
        <?php endforeach ?>
    </div>
</div>


<?php include("include/footer.php") ?>


<script>
    $(document).ready(function() {

        $('#comment_form').on('submit', function(event) {
            event.preventDefault();
            let form_data = $(this).serialize();
            $.ajax({
                url: "add_comment.php",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success: function(data) {
                    if (data.error != '') {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val();
                        load_comment();
                    }
                }
            })
        });

        // load_comment();

        // function load_comment() {
        //     $.ajax({
        //         url: "fetch_comment.php",
        //         method: "POST",
        //         success: function(data) {
        //             $('#display_comment').html(data);
        //         }
        //     })
        // }

        // $(document).on('click', '.reply', function() {
        //     let comment_id = $(this).attr("id");
        //     $('#comment_id').val('id');
        //     $('#comment_name').focus();
        // });

    });
</script>