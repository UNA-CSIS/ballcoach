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

$edu = $_POST['education'];
$aXP = $_POST['athExp'];
$cXP = $_POST['cExp'];
$cPhil = $_POST['cPhil'];
$user = $_SESSION['username'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE coach SET education = '$edu', ath_exp = '$aXP', coach_exp = '$cXP', coach_phil = '$cPhil' WHERE user_id = '$user'";


if ($conn->query($sql) === TRUE) {
    $_SESSION['error'] = '';
} else {
    $_SESSION['error'] = "Error updating record: " . $conn->error;
}

$conn->close();
header("location:index.php");

?>
