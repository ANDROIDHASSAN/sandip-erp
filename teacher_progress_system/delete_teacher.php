
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'teacher_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM teachers WHERE id = $id";
    $conn->query($delete_query);
    header("Location: admin_dashboard.php");
    exit();
}
?>
