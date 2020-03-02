<?php
$user = [
    'name' => 'John',
    'email' => 'test@email.com',
    'age' => 30
];

$user = serialize($user);

setcookie('user', $user, time() + (86400 * 30));

$user = unserialize($_COOKIE['user']);

var_dump($user['name']);