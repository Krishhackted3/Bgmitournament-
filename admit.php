<?php
include 'db.php';

// Get all users
$result = $conn->query("SELECT id, username, email, status FROM users");
?>
<!DOCTYPE html>
<html>
<body>
<h2>Admit Panel</h2>
<table border="1">
<tr><th>ID</th><th>Username</th><th>Email</th><th>Status</th><th>Action</th></tr>
<?php while($user = $result->fetch_assoc()): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['username'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['status'] ?></td>
    <td>
        <a href="admit_action.php?id=<?= $user['id'] ?>&action=accept">Accept</a> |
        <a href="admit_action.php?id=<?= $user['id'] ?>&action=reject">Reject</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
<?php
session_start();

// Admin login check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header(\"Location: login.php\");
    exit;
}
?>
$password = $_POST['password'];  
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Store $hashed_password in database
if (password_verify($_POST['password'], $stored_hashed_password)) {
    // Password sahi hai
    $_SESSION['admin_logged_in'] = true;
    header(\"Location: admit.php\");
    exit;
} else {
    echo \"Invalid username or password.\";
}