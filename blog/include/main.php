<div class="container">
        <h1>Posts</h1>
        <?php foreach($posts as $post): ?>
            <div class="jumbotron">
                <h3><?php echo $post['title'] ?></h3>
                <small>Created on <?php echo $post['created_at'] ?> by <?php echo $post['author'] ?></small>
                <p><?php echo $post['body'] ?></p>
                <a href="single-post.php?id=<?php echo $post['id'] ?>">Read more</a>
            </div>
        <?php endforeach; ?>
    </div>
    

    
