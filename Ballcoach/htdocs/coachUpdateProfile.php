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

$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$email = $_POST['email'];
$zip = $_POST['zip'];
$fb = $_POST['facebook'];
$insta = $_POST['instagram'];
$twit = $_POST['twitter'];
$linked  = $_POST['linkedin'];
$user = $_SESSION['username'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE coach SET first_name = '$fname', last_name = '$lname', email = '$email', zip= '$zip', fb = '$fb', insta = '$insta', twit = '$twit', linked = '$linked' WHERE user_id = '$user'";


if ($conn->query($sql) === TRUE) {
    $_SESSION['error'] = '';
} else {
    $_SESSION['error'] = "Error updating record: " . $conn->error;
}

$conn->close();
header("location:coachProfile.php");

?>
