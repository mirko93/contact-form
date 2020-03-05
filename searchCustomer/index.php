<?php
require_once("SearchCustomer.php");

$search = new SearchCustomer($con);
$data = $search->viewData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seach test</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body class="bg-dark text-info">

    <div class="container">
        <br> <br>

        <h2 align="center">Search using PHP MySql</h2>
        <br> <br>
        <form action="" method="POST">
            <input class="form-control" type="text" name="name" placeholder="Search..." id="searchBox" oninput=search(this.value)>
        </form>
<br>
        <?php foreach($data as $i): ?>
        <ul id="dataViewer">
            <li><?php echo $i["name"] ?></li>
            <hr>
        </ul>
        <?php endforeach ?>
    </div>

    <script src="app.js"></script>


</body>
</html>