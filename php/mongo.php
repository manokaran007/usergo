<?php
require_once('../assets/mongo-driver/vendor/autoload.php');
$databaseConnection = new MongoDB\Client; 
$database = $databaseConnection -> myDb;
$collection = $database -> profile;
?>