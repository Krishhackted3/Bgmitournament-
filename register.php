<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
    if ($conn->query($sql) === TRUE) { header("Location: login.php"); exit(); } 
    else { echo "Error: " . $conn->error; }
}
?>