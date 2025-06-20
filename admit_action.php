<?php
include 'db.php';

$id = $_GET['id'];
$action = $_GET['action'];

if ($action == 'accept') {
    $status = 'accepted';
} elseif ($action == 'reject') {
    $status = 'rejected';
} else {
    $status = 'pending';
}

$stmt = $conn->prepare("UPDATE users SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

header("Location: admit.php");
exit;
?>
<?php
session_start();

// Admin login check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header(\"Location: login.php\");
    exit;
}
?>