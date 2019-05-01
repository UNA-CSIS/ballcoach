<?php
session_start(); 
   
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

$fname = $_POST['fname'];
$user = $_POST['uname'];
$pass = mysqli_real_escape_string($conn,$_POST['psw']);
$email = $_POST['email'];
$hash = password_hash($pass, PASSWORD_DEFAULT);

$check = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($check);

if ($result->num_rows == 0){
    $role = 1;
    $sql = "INSERT INTO users (first_name, username, password, email, role) VALUES ('$fname', '$user', '$hash', '$email', '$role' )";
    $sql2 = "INSERT INTO coach (first_name, user_id, email) VALUES ('$fname', '$user', '$email')";
    if ($conn->query($sql) === TRUE && $conn->query($sql2)===TRUE) {
        header("location:index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("location:signUp.html");
}
} else{
    $_SESSION['error'] = 'Username already exists';
    header("location:index.html");
}

$conn->close();

?>