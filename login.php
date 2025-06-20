<?php
include 'db.php';
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = $conn->query($sql);
    if($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        if(password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: home.php"); 
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>