
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

// Fetch teacher details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $teacher_query = "SELECT * FROM teachers WHERE id = $id";
    $teacher_result = $conn->query($teacher_query);
    $teacher = $teacher_result->fetch_assoc();
}

// Handle update
if (isset($_POST['update_teacher'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $update_query = "UPDATE teachers SET name='$name', email='$email' WHERE id=$id";
    $conn->query($update_query);
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
</head>
<body>

<h2>Edit Teacher</h2>
<form action="edit_teacher.php?id=<?php echo $id; ?>" method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($teacher['name']); ?>" required>
    <input type="email" name="email" value="<?php echo htmlspecialchars($teacher['email']); ?>" required>
    <button type="submit" name="update_teacher">Update Teacher</button>
</form>

</body>
</html>
