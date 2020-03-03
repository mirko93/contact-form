<?php

$msg = '';
$msgClass = '';

if (filter_has_var(INPUT_POST, 'submit')) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = $_POST['message'];


    if (!empty($email) && !empty($name) && !empty($message)) {
        // passed

        // check email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            // failed
            $msg = 'Please use a valid email';
            $msgClass = 'alert-danger';
        } else {
            // passed
            $toEmail = 'email@email.com';
            $subject = 'Contact Request From ' . $name;
            $body = '';

            // email headers
            $headers = 'From: ' . $name . "\r\n" .
                        'Reply-To: ' . $email . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

            if (mail($toEmail, $subject, $message, $headers)) {
                $msg = "Your email has been sent";
                $msgClass = "alert-success";
            } else {
                $msg = "Your email was not sent";
                $msgClass = "alert-danger";
            }
        }

    } else {
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
    }
}

?>

<?php include("include/header.php") ?>

<br><br>


    <div class="container">
        <h1>Contact Us</h1>
        <br>

        <?php 
        if ($msg != '') {
            echo "<div class='alert $msgClass'>
                    $msg
                </div>";
        }
        
        ?>
        <form action="#" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Message"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



<?php include("include/footer.php") ?>