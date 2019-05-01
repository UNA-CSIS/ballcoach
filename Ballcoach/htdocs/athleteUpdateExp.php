<?php
session_start();
//if (!isset($_SESSION['username'])) {
 //   header("location:index.php");
    // Make sure that code below does not get executed when we redirect.
 //   exit;
//}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballcoach";

$edu = $_POST['edu'];

$user = $_SESSION['username'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE athlete SET edu = '$edu' WHERE user_id = '$user'";


if ($conn->query($sql) === TRUE) {
    $_SESSION['error'] = '';
} else {
    $_SESSION['error'] = "Error updating record: " . $conn->error;
}

$conn->close();
header("location:index.php");

?>
