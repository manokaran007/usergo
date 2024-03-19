<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "auths";
$conn = mysqli_connect("$server","$username","$password");
$select_db = mysqli_select_db($conn, $database);
if(!$select_db)
{
	echo("connection terminated");
}
?>