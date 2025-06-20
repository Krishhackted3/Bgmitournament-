<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<body>
<h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>
<nav>
    <a href="home.php">Home</a> | 
    <a href="earn.php">Earn</a> | 
    <a href="rank.php">Rank</a> | 
    <a href="wallet.php">Wallet</a> | 
    <a href="profile.php">Profile</a> | 
    <a href="logout.php">Logout</a>
</nav>
</body>
</html>