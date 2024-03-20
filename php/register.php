<?php
require_once('connection.php');

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

$email_check_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM register WHERE email = '$email'");
$email_count = mysqli_fetch_assoc($email_check_query)['count'];
$mobile_check_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM register WHERE mobile = '$mobile'");
$mobile_count = mysqli_fetch_assoc($mobile_check_query)['count'];


if ($email_count > 0) {
  echo "Email already exists in the database.";
} elseif ($mobile_count > 0) {
  echo "Mobile number already exists in the database.";
} else {
  $insert_query = mysqli_query($conn, "insert into register set name='$name', email='$email', pwd='$pwd', mobile='$mobile'");
  echo "Registration successfull!";
  exit;
}
