<?php
require_once('../mongo-driver/vendor/autoload.php');

$databaseConnection = new MongoDB\Client; 
$database = $databaseConnection -> myDb;
$collection = $database -> profile;


if($collection)
{   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $data = array('name' => $name, 'email' => $email,'gender' => $gender, 'age' => $age, 'dob' => $dob, 'mobile' => $mobile, 'address' => $address);
    $inset= $collection->insertOne($data);
 
    if($inset){ echo "success";}
    else{echo "faild to inset";}
} 
    else{echo "faild to connect";}
?>