<?php

// primer
$people[] = "Steve";
$people[] = "John";
$people[] = "Doe";
$people[] = "Tom";
$people[] = "Amanda";
$people[] = "Katie";
$people[] = "Mike";

// get query string
$q = $_REQUEST['q'];

$suggestion = "";

// get suggestions
if ($q !== "") {
    $q = strtolower($q);
    $lenght = strlen($q);

    foreach ($people as $person) {
        if (stristr($q, substr($person, 0, $lenght))) {
            if ($suggestion === "") {
                $suggestion = $person;
            } else {
                $suggestion = $suggestion . ", $person";
            }
        }
    }
}
echo $suggestion === "" ? "No Suggestion" : $suggestion;
