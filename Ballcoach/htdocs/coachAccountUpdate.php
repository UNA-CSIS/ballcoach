<?php session_start(); 
   
//if (!isset($_SESSION['username'])) {
 //   header("location:../index.php");
    // Make sure that code below does not get executed when we redirect.
 //   exit;
//}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballcoach";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];


if($user != ''){
    $sql = "UPDATE users SET username='$user'";
}
if($email != ''){
    $sql = "UPDATE users SET email='$email'";
}
if($pwd != ''){
    $hash = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password='$hash'";
}
$conn->close();
header("location:coach-account.html");
?>