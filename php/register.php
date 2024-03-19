<?php
  require_once('connection.php');
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));

  // $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  // $age = mysqli_real_escape_string($conn, $_POST['age']);
  // $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  // $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  // $address = mysqli_real_escape_string($conn, $_POST['address']);

  $insert_query = mysqli_query($conn,"insert into register set name='$name', email='$email', pwd='$pwd'");
  
  
  
  
  if($insert_query>0)
  {
    echo "Registration successfull!";
  }
  else
  {
    echo "Error!";
  }
?>