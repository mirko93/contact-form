<?php include("include/header.php") ?>

<br><br>

<div class="container">
        <h1>Search Users</h1>
        <br>
        <form action="">
            <input type="text" class="form-control" onkeyup="showSuggestion(this.value);" placeholder="Search Post...">
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
            xmlhttp.open("GET", "suggest-search.php?q=" + string, true);
            xmlhttp.send();
        }
    }
    </script>

<?php include("include/footer.php") ?>