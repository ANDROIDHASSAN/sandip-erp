
<?php
// Start the session if not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify login credentials
    $login_query = "SELECT * FROM teachers WHERE email='$email' AND password='$password'";
    $login_result = $conn->query($login_query);

    if ($login_result->num_rows > 0) {
        $_SESSION['teacher'] = $email;  // Store teacher's email in session
        header("Location: teacher_dashboard.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <header>
        <h1>Teacher Progress System - Login</h1>
    </header>

    <!-- Login Form -->
    <h2>Login</h2>

    <form action="login.php" method="POST">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register Now</a></p> <!-- Link to the registration page -->

</div>

<footer>
    <p>© 2024 Teacher Progress System</p>
</footer>

</body>
</html>
