<?php

require_once("SearchCustomer.php");

$name = $_POST['name'];
$search = new SearchCustomer($con);
$data = $search->searchData($name);

echo json_encode($data);

