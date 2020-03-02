<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <h1>Search Users</h1>
        <br>
        <form action="">
            <input type="text" class="form-control" onkeyup="showSuggestion(this.value);" placeholder="Search User...">
        </form>
        <br>
        <p>Suggestions: <span id="output" style="font-weight: bold;"></span></p>
    </div>
    

    <script>
    function showSuggestion(string) {
        if (string.length == 0) {
            document.getElementById('output').innerHTML = '';
        } else {
            // ajax request
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('output').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "suggest.php?q=" + string, true);
            xmlhttp.send();
        }
    }
    </script>
</body>
</html>