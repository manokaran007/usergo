<?php
require_once('redis.php');
require_once('mongo.php');

// Fetch data from MongoDB
$email = $_POST['email'];
$data = [];

if ($redis->exists($email)) {
    $userDataSerialized = $redis->get($email);
    $userData = unserialize($userDataSerialized);
    echo json_encode($userData);
} 

