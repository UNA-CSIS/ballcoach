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

$user = mysqli_real_escape_string($conn,$_POST['uname']);
$pass = $_POST['psw'];

$sql = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);


if($count > 0){
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $verified = password_verify($pass, trim($row['password']));
}


if ($verified){
    $_SESSION['username'] = $user;
    $_SESSION['error'] = '';
    if($row['role']=='2')
        header("location:dashboardAthlete.html");
    else
        header("location:dashboardCoach.html");
}else {
    $_SESSION['error'] = 'invalid username or password';
    header("location:index.html");
    
}
$conn->close();

?>