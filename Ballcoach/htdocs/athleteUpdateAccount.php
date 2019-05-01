<?php

if (!isset($_SESSION['username'])) {
  header("location:../index.html");
    // Make sure that code below does not get executed when we redirect.
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballcoach";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$new_uid = 


$sql = "UPDATE users SET user_id";
?>