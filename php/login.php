<?php

require_once('connection.php');
require_once('redis.php');
require_once('mongo.php');


    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $checkEmailQuery = "SELECT * FROM register WHERE email = '$email' AND pwd = '$pwd'";
    $result = $conn->query($checkEmailQuery);


    if ($result->num_rows > 0) {

        if ($redis->exists($email)) {
            $userDataSerialized = $redis->get($email);
            $userData = unserialize($userDataSerialized);
            echo json_encode($userData);
            // echo "login successfull!";
        } else {
            $filter = array("email" => $email);
            $res = $collection->findOne($filter);
            if ($res) {
                $userDataSerialized = serialize($res);
                $redis->set($email, $userDataSerialized);

                $var = $redis->get($email);

                $userData = unserialize($var);

                echo json_encode($userData);
                // echo "login successfull!";
            }
        }
    }

    $conn->close();

